<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'email' => 'skillsHub@skills.com',
            'phone' => '011111111111',
            'facebook' => 'https//www.facebook.com',
            'X' => 'https//www.x.com',
            'instrgram' => 'https//www.instagram.com',
            'youtube' => 'https//www.youtube.com',
            'linkedin' => 'https//www.linkedin.com',
        ]);
    }
}
