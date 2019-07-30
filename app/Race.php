<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'country', 'number_stages', 'start_date', 'year'
    ];

    /**
     * Mutator: Create a URL-safe slug for the race
     *
     * @param null $value
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = strtolower(str_replace(' ', '-', $value));
    }

    /**
     * Relationship: Stages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    /**
     * Relationship: RaceTeam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
//    public function teams()
//    {
//        return $this->belongsToMany(Team::class, 'race_teams');
//    }

    public function teams()
    {
        return $this->hasMany(RaceTeam::class);
    }

    /**
     * Relationship: RaceRider
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function raceRiders()
    {
        return $this->hasMany(RaceRider::class);
    }

    public function riders()
    {
        return $this->hasManyThrough(Rider::class, RaceRider::class, 'rider_id', 'id', null, 'rider_id');
        //return $this->belongsToMany(Rider::class);
    }
}
