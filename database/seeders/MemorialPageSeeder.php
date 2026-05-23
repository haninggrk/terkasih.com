<?php

namespace Database\Seeders;

use App\Models\MemorialPage;
use Illuminate\Database\Seeder;

class MemorialPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemorialPage::query()->updateOrCreate(
            ['slug' => 'ericpramono'],
            [
                'person_name' => 'Eric Pramono',
                'birth_date' => '1978-01-12',
                'death_date' => '2026-05-23',
                'subtitle' => 'Suami, Papa, Menantu, Kakak Tercinta',
                'verse_reference' => '2 Timotius 4:7',
                'verse_text_id' => 'I have fought the good fight, I have finished the race, I have kept the faith.',
                'verse_text_en' => 'I have fought the good fight, I have finished the race, I have kept the faith.',
                'description_id' => 'Telah berpulang ke rumah Bapa dengan tenang pada hari Sabtu, 23 Mei 2026 Pk. 07:28 WIB',
                'description_en' => 'He has peacefully returned to the Father’s house on Saturday, 23 May 2026 at 07:28 WIB.',
                'wife_name' => 'Sofia Linawaty',
                'children' => ['Philip Sidney Pramono', 'Noah Griffith Pramono', 'Hugo Faith Pramono', 'Xavier Joy Pramono'],
                'father_in_law' => 'Ong Tjing Fong (Edi Yongki)',
                'mother_in_law' => null,
                'funeral_resting_place' => 'Rumah Duka Adi Jasa' . "\n" . 'Ruang VIP-A',
                'burial_information' => 'Eka Praya',
                'schedule_closing_coffin' => 'Minggu, 24 Mei 2026 Pk. 15:00 WIB',
                'schedule_comfort_service' => '',
                'schedule_departure_service' => 'Rabu, 27 Mei 2026 Pk. 10:00 WIB',
                'support_intro_id' => 'UNGKAPAN KASIH DAN BELASUNGKAWA DARI KELUARGA & SAHABAT DAPAT DISAMPAIKAN MELALUI REKENING BERIKUT',
                'support_intro_en' => 'Expressions of love and condolences from family and friends may be shared through the following account.',
                'support_account_placeholder' => 'BCA 8220364977' . "\n" . 'a.n. Sofia Linawaty',
                'is_active' => true,
            ]
        );
    }
}
