<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;


    protected $table = 'profiles';

    protected $fillable = ['user', 'name', 'surname', 'gender', 'dob'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'user');
    }
}
