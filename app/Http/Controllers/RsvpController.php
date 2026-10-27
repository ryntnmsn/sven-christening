<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RsvpController extends Controller
{
    public function lookup(Request $request): JsonResponse
    {
        $request->session()->forget(['rsvp.guest_id', 'rsvp.guest_name', 'rsvp.guest_code']);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'regex:/^[A-Za-z0-9]{3}$/'],
        ]);
        $name = trim($validated['name']);
        $matches = Guest::query()
            ->whereRaw('LOWER(TRIM(name)) LIKE ?', ['%'.Str::lower($name).'%'])
            ->whereRaw('UPPER(code) = ?', [Str::upper($validated['code'])])
            ->limit(2)
            ->get();

        if ($matches->count() !== 1) {
            return response()->json([
                'eligible' => false,
                'message' => "We couldn't find an eligible invitation for that name. Please enter it as it appears on the invitation.",
            ]);
        }

        $guest = $matches->first();

        if ($guest->confirmed !== 0) {
            return response()->json([
                'eligible' => false,
                'message' => 'Your RSVP has already been recorded. Thank you!',
            ]);
        }

        $request->session()->put([
            'rsvp.guest_id' => $guest->id,
            'rsvp.guest_name' => Str::lower($name),
            'rsvp.guest_code' => Str::upper($validated['code']),
        ]);

        return response()->json([
            'eligible' => true,
            'message' => 'Invitation found. Confirm your seat below.',
            'full_name' => $guest->name,
            'sub_guests' => $guest->sub_guests,
        ]);
    }

    public function confirm(Request $request): JsonResponse
    {
        $identity = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'regex:/^[A-Za-z0-9]{3}$/'],
        ]);

        if (! $request->session()->has('rsvp.guest_id')
            || $request->session()->get('rsvp.guest_name') !== Str::lower(trim($identity['name']))
            || $request->session()->get('rsvp.guest_code') !== Str::upper($identity['code'])) {
            $request->session()->forget(['rsvp.guest_id', 'rsvp.guest_name', 'rsvp.guest_code']);

            return response()->json([
                'confirmed' => false,
                'message' => 'Please check your invitation name again before confirming.',
            ], 422);
        }

        $guest = Guest::query()->find($request->session()->get('rsvp.guest_id'));

        if (! $guest) {
            $request->session()->forget(['rsvp.guest_id', 'rsvp.guest_name', 'rsvp.guest_code']);

            return response()->json([
                'confirmed' => false,
                'message' => 'We could not find that invitation. Please check your name and code again.',
            ], 422);
        }

        $response = (int) $request->validate([
            'response' => ['required', 'integer', Rule::in([1, 2])],
        ])['response'];
        if ($response === 1) {
            $request->validate(['guest_attending' => ['required', 'boolean']]);
        }

        $guestAttending = $response === 1 && $request->boolean('guest_attending');

        if ($response === 2 && $guest->sub_guests > 0) {
            return response()->json([
                'confirmed' => false,
                'message' => 'Please respond using the guest options on your invitation.',
            ], 422);
        }

        if ($response === 1) {
            $validator = Validator::make($request->all(), [
                'sub_guests' => ['present', 'array', 'size:'.$guest->sub_guests],
                'sub_guests.*.name' => ['nullable', 'string', 'max:255'],
                'sub_guests.*.attending' => ['required', 'boolean'],
            ]);
            $validator->after(function ($validator) use ($request): void {
                foreach ($request->input('sub_guests', []) as $position => $subGuest) {
                    if (is_array($subGuest)
                        && filter_var($subGuest['attending'] ?? false, FILTER_VALIDATE_BOOLEAN)
                        && blank($subGuest['name'] ?? null)) {
                        $validator->errors()->add("sub_guests.{$position}.name", 'Enter the name of each sub guest who will attend.');
                    }
                }
            });
            $validated = $validator->validate();
        } else {
            $validated = ['sub_guests' => []];
        }

        $result = DB::transaction(function () use ($request, $validated, $response, $guestAttending): array {
            $guest = Guest::query()->lockForUpdate()->find($request->session()->get('rsvp.guest_id'));

            if (! $guest) {
                return ['confirmed' => false, 'message' => 'We could not find that invitation. Please check your name and code again.'];
            }

            if ($guest->confirmed !== 0) {
                return ['confirmed' => false, 'message' => 'Your RSVP has already been recorded. Thank you!'];
            }

            if ($response === 2 && $guest->sub_guests > 0) {
                return ['confirmed' => false, 'message' => 'Please respond using the guest options on your invitation.'];
            }

            $guest->confirmed = $guestAttending ? 1 : 2;
            $guest->save();

            foreach ($validated['sub_guests'] as $position => $subGuest) {
                if (blank($subGuest['name'] ?? null)) {
                    continue;
                }

                $guest->subGuestResponses()->create([
                    'position' => $position + 1,
                    'name' => trim($subGuest['name']),
                    'attending' => filter_var($subGuest['attending'], FILTER_VALIDATE_BOOLEAN),
                ]);
            }

            return [
                'confirmed' => true,
                'response' => $guestAttending ? 1 : 2,
                'message' => $guestAttending
                    ? 'Your seat is confirmed. We look forward to celebrating with you!'
                    : 'Your response has been recorded. Thank you for letting us know.',
            ];
        });

        $request->session()->forget(['rsvp.guest_id', 'rsvp.guest_name', 'rsvp.guest_code']);

        return response()->json($result);
    }
}
