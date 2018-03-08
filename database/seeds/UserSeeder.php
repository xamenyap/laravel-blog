<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 1)
            ->states('admin')
            ->create()
            ->each(function($user) {
                for ($i = 0; $i < 5; $i++) {
                    $user->posts()->save(factory(App\Models\Post::class)->states('published')->make());
                }
            });

        factory(App\Models\User::class, 1)
            ->states('demo_user')
            ->create()
            ->each(function($user) {
                for ($i = 0; $i < 10; $i++) {
                    $user->posts()->save(factory(App\Models\Post::class)->make());
                }
            });

        factory(App\Models\User::class, 10)
            ->create()
            ->each(function($user) {
                for ($i = 0; $i < 10; $i++) {
                    $user->posts()->save(factory(App\Models\Post::class)->make());
                }
            });
    }
}
