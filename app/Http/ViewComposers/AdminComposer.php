<?php

namespace App\Http\ViewComposers;

use App\Race;
use Illuminate\View\View;

class AdminComposer
{
    /**
     * @var \App\Races
     */
    protected $all_races;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        $this->all_races = Race::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('all_races', $this->all_races);
    }
}