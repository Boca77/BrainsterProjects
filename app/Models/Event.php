<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $guarded = null;

    public function speakers()
    {
        return $this->belongsToMany(EventSpeaker::class, 'speakers_events', 'event_id', 'event_speaker_id');
    }
}
