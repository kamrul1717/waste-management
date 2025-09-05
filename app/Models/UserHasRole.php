<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasRole extends Model
{
    use HasFactory;
    protected $table = 'user_has_role';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
