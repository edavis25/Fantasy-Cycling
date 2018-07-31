<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stage_number', 'start_location', 'end_location', 'distance'
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
}
