<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'nationality',
        'birthdate'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'name'
    ];

    /**
     * Get Rider's Full Name
     *
     * @return string
     */
    public function getFullName() : string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    /**
     * Accessor for appending name property
     *
     * @return string
     */
    public function getNameAttribute() : string
    {
        return $this->getFullName();
    }
}
