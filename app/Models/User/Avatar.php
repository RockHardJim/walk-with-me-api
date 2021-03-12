<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    protected $fillable = ['user', 'avatar'];

    public function user(){
        return $this->belongsTo(User::class, 'user', 'user');
    }

}
