<?php

use App\Message;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 50)->create();

        $users->each(function(App\User $user) use ($users) {
            $message = factory(App\Message::class)
            	->times(20)
                ->create([
                    'user_id' => $user->id,
                ]);

                    $message->each(function(Message $message) use ($users){
                        factory(App\Response::class, random_int(1,10))->create([
                            'message_id' => $message->id,
                            'user_id' => $users->random(1)->first()->id,
                        ]);
                    });

            $user->follows()->sync(
                $users->random(10)
            );
        });
    }
}
