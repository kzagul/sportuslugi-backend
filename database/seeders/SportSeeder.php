<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sport;
use File;

class SportSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $sports = json_decode(file_get_contents(public_path() . "/sports.json"));
  
        foreach ($sports as $key => $value) {
            Sport::create([
                "name" => $value->name,
            ]);
        }
    }
}