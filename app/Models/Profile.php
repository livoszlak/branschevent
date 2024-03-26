<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    public function thisorthats(): HasMany
    {
        return $this->hasMany(ThisOrThat::class);
    }

    protected $fillable = [
        'user_id',
        'street_name',
        'post_code',
        'city',
        'about',
        'has_LIA',
        'contact_LinkedIn',
        'contact_url',
    ];
}
