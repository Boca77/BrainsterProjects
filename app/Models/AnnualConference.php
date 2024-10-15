<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualConference extends Model
{
    use HasFactory;

    public $guarded = null;

    public function speakers()
    {
        return $this->belongsToMany(ConferenceSpeaker::class, 'speakers_conferences', 'annual_conference_id', 'conference_speaker_id');
    }
}
