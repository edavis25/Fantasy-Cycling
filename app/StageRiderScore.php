<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StageRiderScore extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stage_id', 'race_rider_id', 'stage_scoring_category_id', 'points'
    ];

    /**
     * Relationship: Stage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    /**
     * Relationship: RaceRider
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rider()
    {
        return $this->belongsTo(RaceRider::class);
    }

    /**
     * Relationship: StageScoringCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scoringCategory()
    {
        return $this->belongsTo(StageScoringCategory::class);
    }
}
