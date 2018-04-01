<?php

use App\Group;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Class GroupSeeder
 */
class GroupSeeder extends Seeder
{
    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * GroupSeeder constructor.
     */
    public function __construct()
    {
        $this->faker = Faker::create();
    }

    /**
     * Generate fake groups.
     */
    public function run()
    {
        foreach (range('A', 'P') as $i) {
            Group::create(
                [
                    'name' => 'Group ' . $i
                ]
            );
        }
    }
}