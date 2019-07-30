<?php

use App\StageScoringCategory;
use Illuminate\Database\Seeder;

class StageScoringCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Stage Result',
            'General Classification',
            'Points Classification',
            'Mountains Classification',
            'Young Rider Classification',
            'Intermediate Sprint',
            'First Category Summit',
            'Second Category Summit',
            'Breakaway',
            'Team Stage Result Assist',
            'Team General Classification Assist'
        ];

        foreach ($categories as $category) {
            StageScoringCategory::firstOrCreate([
                'category' => $category
            ]);
        }
    }
}
