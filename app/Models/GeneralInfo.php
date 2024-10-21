<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInfo extends Model
{
    use HasFactory;

    public $guarded = null;

    public function social_media()
    {
        return $this->hasMany(SocialMedia::class);
    }

    public function employees()
    {
        return $this->hasMany(GeneralMembers::class);
    }
}
