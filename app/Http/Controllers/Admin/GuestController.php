<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\GuestSubGuest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class GuestController extends Controller
{
    public function index(): View
    {
        return view('admin.invite', [
            'guests' => Guest::query()->with('subGuestResponses')->latest()->get(),
            'confirmedAttendeeCount' => Guest::query()->where('confirmed', true)->count()
                + GuestSubGuest::query()
                    ->where('attending', true)
                    ->whereHas('guest', fn ($query) => $query->where('confirmed', true))
                    ->count(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('guests', 'name')],
            'sub_guests' => ['required', 'integer', 'min:0', 'max:99'],
        ]);

        Guest::query()->create($validated);

        return redirect()->route('admin.invite')->with('status', 'Guest added successfully.');
    }
}
