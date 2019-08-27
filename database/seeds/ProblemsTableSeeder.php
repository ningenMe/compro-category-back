<?php

use Illuminate\Database\Seeder;

class ProblemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        for($i = 1; $i <= 10; $i++){
            $problem = [
                'domains_id' => $i/2 + 1,
                'name' => 'problems'.$i,              
                'url' => 'url'.$i,              
                'score' => 100*$i,
                'estimation' => 100*$i,
                'created_at' => $now,
                'updated_at' => $now            
            ];
            DB::table('problems')->insert($problem);
        }
    }
}
