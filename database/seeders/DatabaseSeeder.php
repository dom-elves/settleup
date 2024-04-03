<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use App\Models\Debt;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::factory()->create([
            'first_name' => 'Dom',
            'last_name' => 'Elves',
            'email' => 'dom_elves@hotmail.co.uk',
            'password' => 'password',
        ]);

        for ($i = 0; $i < 100; $i++) {
            User::factory()->create([
                'first_name' => $faker->unique()->firstName,
                'last_name' => $faker->unique()->country,
            ]);
        }

        $random = random_int(0, 10);
        
        for ($i = 0; $i < 10; $i++) {

            // get between 2 and 10 user ids
            $user_ids_array = User::pluck('id')
                ->shuffle()
                ->take(random_int(2,10))
                ->toArray();
            
            // if $random matches and self not already in the ids array, add self
            if ($random === $i && !in_array(1, $user_ids_array)) {
                $user_ids_array[] = 1;
                dump('adding self to group ' . $i );
            } elseif (in_array(1, $user_ids_array)) {
                // log if i am in the array, no real reason
                dump('self in group ' . $i);
            }

            // column is json so ids array needs to be encoded
            $group = Group::factory()->create([
                'user_ids' => json_encode($user_ids_array),
            ]);

            // generate a random decimal, not perfect
            $decimal = round(100 / random_int(100,1000), 2);

            Debt::factory()->create([
                'group_id' => $group->id,
                // add that decimal to a random integer to make it look like money
                'amount' => random_int(1, 999) + $decimal,
            ]);
        }        
    }
}
