<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceSpeaker extends Model
{
    /** @use HasFactory<\Database\Factories\ConferenceSpeakerFactory> */
    use HasFactory;

    public $table = 'conference_speakers';

    public $guarded = null;

    public function conference()
    {
        return $this->belongsToMany(AnnualConference::class, 'speakers_conferences', 'conference_speaker_id', 'annual_conference_id');
    }
}
