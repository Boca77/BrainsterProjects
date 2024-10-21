<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    /** @use HasFactory<\Database\Factories\AgendaFactory> */
    use HasFactory;

    public $guarded = null;

    public function agenda_contents()
    {
        return $this->hasMany(AgendaContent::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function conference()
    {
        return $this->belongsTo(AnnualConference::class, 'annual_conference_id');
    }
}
