<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Message::truncate();

        for ($i=1; $i < 100; $i++) { 
            Message::create([
                "nombre" => "Usuario ${i}",
                "email" => "usuario${i}@mail.com",
                "mensaje" => "Este es el mensaje del usuario ${i}"
            ]);
        }
    }
}
