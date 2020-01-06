<?php

use App\User;
use App\TodoList;
use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'admin@gmail.com',
        ]);

        factory(TodoList::class, 20)->create();
    }
}
