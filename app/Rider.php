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
     * Get Rider's Full Name
     *
     * @return string
     */
    public function getFullName() : string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
