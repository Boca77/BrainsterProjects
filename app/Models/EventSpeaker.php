<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSpeaker extends Model
{
    /** @use HasFactory<\Database\Factories\EventSpeakerFactory> */
    use HasFactory;

    public $guarded = null;

    public function events()
    {
        return $this->belongsToMany(Event::class, 'speakers_events', 'event_speaker_id', 'event_id');
    }
}
