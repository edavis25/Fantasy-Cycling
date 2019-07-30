<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceRider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cost', 'rider_id', 'race_team_id', 'role_id'
    ];

    /**
    * The relationships that should always be loaded.
    *
    * @var array
    */
    protected $with = [
        'rider'
    ];

    /**
     * Relationship: Rider
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rider()
    {
        return $this->belongsTo(Rider::class);
    }

    /**
     * Relationship: Race Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function raceTeam()
    {
        return $this->belongsTo(RaceTeam::class, 'race_team_id');
    }

    /**
     * Relationship: Race
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function race()
    {
        return $this->belongsTo(Race::class);
    }
}
