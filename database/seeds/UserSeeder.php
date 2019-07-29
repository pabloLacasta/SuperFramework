<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
    $faker = \Faker\Factory::create();//factory va a crear una fábrica de objetos
    $data = [];
    for($i = 0; $i < 50 ; $i++){
        $data[] =[ 
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => sha1($faker->password),//sha1 es un método de php que encripta
        'created_at'=>date('Y-m-d H:i:s')
    ];
    }
    }
}
