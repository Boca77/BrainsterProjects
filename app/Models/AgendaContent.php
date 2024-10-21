<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgendaContent extends Model
{
    /** @use HasFactory<\Database\Factories\AgendaContentFactory> */
    use HasFactory;

    public $guarded = null;

    public function agenda(): BelongsTo
    {
        return $this->belongsTo(Agenda::class);
    }
}
