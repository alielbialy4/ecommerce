<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = ['كراسي' , 'سرائر' , 'الوسائد', 'الإضائة' , 'ادوات المطبخ'];
        foreach($sections as $section){
             Section::create([
                'name' => $section,
            ]);
        };
    }
}
