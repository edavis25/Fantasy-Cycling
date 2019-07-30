<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RaceTeam extends Model
{
    /**
     * The table associated with this model
     *
     * @var string
     */
    protected $table = 'race_teams';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'race_id', 'team_id'
    ];

    /**
     * The relationships that should always be loaded
     *
     * @var array
     */
    protected $with = [
        'riders'
    ];

    /**
     * Relationship: Race
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    /**
     * Relationship: Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Relationship: Race Rider
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function riders()
    {
        return $this->hasMany(RaceRider::class, 'race_team_id');
    }
}
