<?php

use Illuminate\Database\Seeder;

class DomainsTableSeeder extends Seeder
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
            $domain = [
                'fields_id' => $i/2 + 1,
                'name' => 'domain'.$i,
                'order' => $i,
                'created_at' => $now,
                'updated_at' => $now
            ];
            DB::table('domains')->insert($domain);
        }

    }
}
