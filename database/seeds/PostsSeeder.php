<?php


use Phinx\Seed\AbstractSeed;

class PostsSeeder extends AbstractSeed
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
        $faker = \Faker\Factory::create();

        $data=[];

        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                "title"=>"Post " . $i,
                "description"=>$faker->text,
                "creator"=>1,
                "created_at"=>date('Y-m-d H:i:s')
            ];
        }

        $this -> insert('posts', $data);
    }
}
