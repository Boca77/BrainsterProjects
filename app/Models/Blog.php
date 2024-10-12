<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function blog_body()
    {
        return $this->hasOne(Blog_body::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
