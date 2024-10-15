<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $guarded = null;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
