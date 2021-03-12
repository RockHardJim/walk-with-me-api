<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $fillable = ['user', 'latitude', 'longitude'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'user');
    }
}
