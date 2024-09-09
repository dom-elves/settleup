<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use App\Models\Debt;
use App\Models\UserDebt;
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
        $this->createDebts();
        $this->createUserDebts();
    }

    public function createUsers()
    {
        User::factory()->create([
            'first_name' => 'Dom',
            'last_name' => 'Elves',
            'email' => 'dom_elves@hotmail.co.uk',
            'password' => 'password',
            'total_value' => 00.00,
        ]);

        User::factory(100)->create(); 
    }

    public function createGroups()
    {
        $group = Group::factory(10)->create();     
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

    public function createDebts()
    {
        $faker = Faker::create();

        $group_ids = Group::pluck('id')->toArray();
        
        foreach ($group_ids as $group_id) {
    
            $total_amount = random_int(1,999) + round(100/random_int(100,1000), 2);
            $group_user = GroupUser::where('group_id', $group_id)->first();
            $user = User::findOrFail($group_user->user_id);

            Debt::create([
                'group_id' => $group_id,
                'name' => $faker->word(),
                'total_amount' => $total_amount,
                'group_user_id' => $group_user->user_id,
                // todo: update this to not always split even, but find a way to randomly chunk debts
                'split_even' => 1,
                // todo: update this to eventually have some cleared debts
                'cleared' => 0,
            ]);
            
            dump("Debt added for group ${group_id} for ${total_amount} by " . $user->first_name . " " . $user->last_name);
        } 
    }

    public function createUserDebts()
    {
        $debts = Debt::all();
        
        foreach ($debts as $debt) {
            // todo: refactor all this when relationships are written
            $group_id = $debt->group_id;
            $group_users = GroupUser::where('group_id', $group_id)->get();   
            $split = $debt->total_amount / $group_users->count();
            // this isn't perfect but will serve the purpose of messing around for now
            $rounded_split = ceil($split * 100) / 100;
            $formatted_split = number_format($rounded_split, 2);           
            
            foreach ($group_users as $group_user) {
        
                $paid = rand(0,1);

                UserDebt::create([
                   'user_id' => $group_user->id,
                   'group_id' => $group_user->group_id,
                   'debt_id' => $debt->id,
                    // todo: update these as mentioned above, ranomly chunking debts
                   'original_amount' => $formatted_split,
                   'paid_amount' => $paid ? $formatted_split : 0,
                   'cleared' => $paid ? 1 : 0, //for now we'll pretend all paid debts are cleared
                ]);
            }
        }
    }
}   
 
