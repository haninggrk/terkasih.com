<?php

namespace Database\Seeders;

use App\Models\MemorialPage;
use Illuminate\Database\Seeder;

class BudiSantosoPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemorialPage::query()->updateOrCreate(
            ['slug' => 'budi-santoso'],
            [
                'person_name' => 'Budi Santoso',
                'birth_date' => '1981-05-30',
                'death_date' => '2026-07-01',
                'subtitle' => 'Suami, Ayah, dan Putra tercinta',
                'verse_reference' => '2 Timotius 4:7',
                'verse_text_id' => 'I have fought the good fight, I have finished the race, I have kept the faith.',
                'verse_text_en' => 'I have fought the good fight, I have finished the race, I have kept the faith.',
                'description_id' => 'Telah berpulang ke rumah Bapa dengan tenang pada hari Rabu, 1 Juli 2026 Pk. 06:44 WIB',
                'description_en' => 'He has peacefully returned to the Father\'s house on Wednesday, 1 July 2026 at 06:44 WIB.',
                'wife_name' => 'Christina Purnama Dewi',
                'children' => ['Kenedy Nicholas', 'Naomi Katrina'],
                'father_in_law' => 'Irwan Purnomo',
                'mother_in_law' => 'Wulan Sari',
                'funeral_resting_place' => 'Rumah Duka Adijasa',
                'burial_information' => '—',
                'schedule_closing_coffin' => '—',
                'schedule_comfort_service' => '—',
                'schedule_departure_service' => '—',
                'support_intro_id' => 'UNGKAPAN KASIH DAN BELASUNGKAWA DARI KELUARGA & SAHABAT DAPAT DISAMPAIKAN MELALUI REKENING BERIKUT',
                'support_intro_en' => 'Expressions of love and condolences from family and friends may be shared through the following account.',
                'support_account_placeholder' => 'BCA 0101 512991'."\n".'a.n. Christina Purnama Dewi',
                'is_active' => true,
            ]
        );
    }
}
