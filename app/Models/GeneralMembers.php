<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GeneralMembers extends Model
{
    use HasFactory;

    public $guarded = null;

    public function generalInfo(): BelongsTo
    {
        return $this->belongsTo(GeneralInfo::class);
    }
}
