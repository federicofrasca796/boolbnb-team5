<?php

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $messages = [
            [
                'name'=>'Valerio Corda',
                'mail'=>'pinkopallino@example.com',
                'body'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quisquam corporis recusandae iste eaque, doloribus nostrum mollitia eius sint adipisci nobis aliquid odit optio sequi pariatur? Officia facilis magni tenetur?'
            ],
            [
                'name'=>'Chandra Rota',
                'mail'=>'chandra@example.com',
                'body'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quisquam corporis recusandae iste eaque, doloribus nostrum mollitia eius sint adipisci nobis aliquid odit optio sequi pariatur? Officia facilis magni tenetur?'
            ],
            [
                'name'=>'Federico Frascà',
                'mail'=>'graphicDesigner@example.com',
                'body'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quisquam corporis recusandae iste eaque, doloribus nostrum mollitia eius sint adipisci nobis aliquid odit optio sequi pariatur? Officia facilis magni tenetur?'
            ],
            
        ];

        foreach ($messages as $message) {
            $_message = new Message();
            $_message->name = $message['name'];
            $_message->mail = $message['mail'];
            $_message->body = $message['body'];
            $_message->save();
        }
    }
}
