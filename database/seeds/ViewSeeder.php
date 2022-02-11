<?php

use App\Models\View;

use Illuminate\Database\Seeder;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $examples = [
            [
                'user_ip' => '87.8.81.4',
            ],
            [
                'user_ip' => '87.8.81.8',
            ],
            [
                'user_ip' => '87.8.84.4',
            ],
            [
                'user_ip' => '87.8.84.9',
            ],
        ];
        foreach ($examples as $example) {
            $_view = new View();
            $_view->user_ip = $example['user_ip'];
            $_view->save();
        }
    }
}
