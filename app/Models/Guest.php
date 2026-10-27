<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[Fillable(['name', 'sub_guests'])]
class Guest extends Model
{
    public function subGuestResponses(): HasMany
    {
        return $this->hasMany(GuestSubGuest::class);
    }

    protected static function booted(): void
    {
        static::creating(function (Guest $guest): void {
            if (blank($guest->code)) {
                $guest->code = self::generateUniqueCode();
            }
        });
    }

    private static function generateUniqueCode(): string
    {
        do {
            $code = Str::upper(Str::random(3));
        } while (self::query()->where('code', $code)->exists());

        return $code;
    }

    protected function casts(): array
    {
        return [
            'sub_guests' => 'integer',
            'confirmed' => 'integer',
        ];
    }
}
