<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FooterSetting;
class FooterSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    FooterSetting::create([
        'studio_name'   => 'Ning Beauty',
        'description'   => 'Private home-based beauty studio providing professional makeup, nails, and eyelash services.',
        'phone'         => '+62 812-3456-789',
        'working_hours' => '09.00 – 20.00',
        'location_label'=> 'Private Home Studio',
        'location_note' => 'Location details will be shared after booking confirmation',
        'instagram' => 'https://instagram.com/@_ningbeauty',
        'tiktok'    => 'https://www.tiktok.com/@ningbeauty',

    ]);
}
}
