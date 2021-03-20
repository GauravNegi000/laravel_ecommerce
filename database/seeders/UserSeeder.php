<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserDetail;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'                  =>  'Gaurav Admin',
                'email'                 =>  'gaurav@admin.com',
                'email_verified_at'     =>  now(),
                'password'              =>  Hash::make('admin'),
                'status'                =>  1,
            ],
            [
                'name'                  =>  'Gaurav Customer',
                'email'                 =>  'gaurav@customer.com',
                'email_verified_at'     =>  now(),
                'password'              =>  Hash::make('customer'),
                'status'                =>  1,
            ],
            [
                'name'                  =>  'Gaurav Seller',
                'email'                 =>  'gaurav@seller.com',
                'email_verified_at'     =>  now(),
                'password'              =>  Hash::make('seller'),
                'status'                =>  1,
            ],
        ];
        
        // admin user
        $newUser = User::create($users[0]);
        UserDetail::create([
            'user_id' => $newUser->id,
            'first_name' => 'Gaurav',
            'last_name' => 'Admin',
        ]);
        $newUser->roles()->attach(1,['created_at' => now(), 'updated_at' => now()]);
        $newUser->roles()->attach(2,['created_at' => now(), 'updated_at' => now()]);
        $newUser->roles()->attach(3,['created_at' => now(), 'updated_at' => now()]);

        // customer user
        $newUser = User::create($users[1]);
        UserDetail::create([
            'user_id' => $newUser->id,
            'first_name' => 'Gaurav',
            'last_name' => 'Customer',
        ]);
        $newUser->roles()->attach(2,['created_at' => now(), 'updated_at' => now()]);

        // seller user
        $newUser = User::create($users[2]);
        UserDetail::create([
            'user_id' => $newUser->id,
            'first_name' => 'Gaurav',
            'last_name' => 'Seller',
        ]);
        $newUser->roles()->attach(2,['created_at' => now(), 'updated_at' => now()]);
        $newUser->roles()->attach(3,['created_at' => now(), 'updated_at' => now()]);
    }
}
