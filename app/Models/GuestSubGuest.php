<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['name', 'attending', 'position'])]
class GuestSubGuest extends Model
{
    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }

    protected function casts(): array
    {
        return [
            'attending' => 'boolean',
            'position' => 'integer',
        ];
    }
}
