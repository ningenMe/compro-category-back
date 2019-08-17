<?php

use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $now = \Carbon\Carbon::now();
        for($i = 1; $i <= 12; $i++){
            $field = [
                'name' => 'fields'.$i,               
                'key' => 'fields'.$i,               
                'order' => $i,
                'created_at' => $now,
                'updated_at' => $now            
            ];
            DB::table('fields')->insert($field);
        }
    }
}
