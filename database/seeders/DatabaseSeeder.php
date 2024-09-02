<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use App\Models\Debt;
use App\Models\GroupUser;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->createUsers();
	    $this->createGroups();
		$this->createGroupUsers();
    }

    public function createUsers()
    {
        $faker = Faker::create();

        User::factory()->create([
            'first_name' => 'Dom',
            'last_name' => 'Elves',
            'email' => 'dom_elves@hotmail.co.uk',
            'password' => 'password',
            'total_value' => 00.00,
        ]);

        for ($i = 0; $i < 100; $i++) {
            User::factory()->create([
                'first_name' => $faker->unique()->firstName,
                'last_name' => $faker->unique()->country,
            ]);
        }
    }

    public function createGroups()
    {
        $faker = Faker::create();
	    
        for ($i = 0; $i < 10; $i++) {
            $group = Group::factory()->create([
                // not perfect in terms of being unique but will do for now
                'name' => $faker->word() . "_" . $faker->word(),
            ]);     
        }
    }

    public function createGroupUsers()
    {
		$group_ids = Group::pluck('id')->toArray();

        foreach ($group_ids as $group_id) {
            
            // get some random user ids, iterate
            $random_users = User::pluck('id')->shuffle()->take(random_int(2,10));

            foreach ($random_users as $random_user) {

                if ($random_user === 1) {
                    dump('adding self to group ' . $group_id);
                }

                GroupUser::create([
                  'group_id' => $group_id,
                  'user_id' => $random_user
                ]);
            }  
        }

        // if i don't exist in any group, add self
        if (!GroupUser::where('user_id', 1)->exists()) {

            $random_group = Arr::random($group_ids);

            GroupUser::create([
                'group_id' => $random_group,
                'user_id' => 1,
            ]);
            
            dump('appending self to group '. $random_group);
        }
    }

    public function createDebt($user_ids, $group)
    {
        $faker = Faker::create();

        $user_ids_array = $user_ids->toArray();

        // generate a random decimal, not perfect
        $decimal = round(100 / random_int(100,1000), 2);

        // pick some random users to be involved in the debt
        // again, array in a separate step to be used later
        $involved_users = $user_ids->take(random_int(2, count($user_ids_array)));
        $involved_users_array = $involved_users->toArray();

        // don't need to make an array separately since it's the end of the chain
        $paid_users_array = $involved_users->take(random_int(1, count($involved_users_array)))->toArray();
        
        // pick a random user to be the one that created the debt
        $created_by_user_id = $paid_users_array[array_rand($paid_users_array)];
        
        Debt::factory()->create([
            'group_id' => $group->id,
            // add the decimal to a random integer to make it look like money
            'amount' => random_int(1, 999) + $decimal,
            // add the randomly selected involved usersn then paid users from that
            'involved_users' => json_encode($involved_users_array),
            'paid_by' => json_encode($paid_users_array),
            'created_by_user_id' => $created_by_user_id,
            'name' => $faker->word(),
        ]);

        dump('added debt for group ' . $group->id
         . ' created by user ' . $created_by_user_id 
         . ' paid by users ' . json_encode($paid_users_array) 
         . ' involved users: ' . json_encode($involved_users_array)
        );
    }
}
