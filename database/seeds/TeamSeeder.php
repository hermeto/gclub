<?php

use App\Team;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Class TeamSeeder
 */
class TeamSeeder extends Seeder
{
    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * TeamSeeder constructor.
     */
    public function __construct()
    {
        $this->faker = Faker::create();
    }

    /**
     * Generate fake teams.
     */
    public function run()
    {
        foreach (range(1, 80) as $i) {
            Team::create(
                [
                    'name' => ucfirst($this->faker->numerify("{$this->faker->word} {$i}##"))
                ]
            );
        }
    }
}