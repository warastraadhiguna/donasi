<?php

namespace App\Models;

use App\Policies\ContactMessagePolicy;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[UsePolicy(ContactMessagePolicy::class)]
#[Fillable([
    'first_name',
    'last_name',
    'whatsapp',
    'email',
    'message',
    'is_read',
    'handled_note',
    'handled_at',
    'handled_by',
])]
class ContactMessage extends Model
{
    protected function casts(): array
    {
        return [
            'is_read' => 'boolean',
            'handled_at' => 'datetime',
        ];
    }

    public function handler(): BelongsTo
    {
        return $this->belongsTo(User::class, 'handled_by');
    }

    public function getFullNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
