<?php

namespace Database\Seeders;

use App\Models\MemorialPage;
use Illuminate\Database\Seeder;

class DiniCarolinaPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemorialPage::query()->updateOrCreate(
            ['slug' => 'dini-carolina'],
            [
                'person_name' => 'Margareta Dini Carolina Vrisaba',
                'birth_date' => null,
                'death_date' => '2026-05-24',
                'subtitle' => 'Anak dan saudara kami tercinta',
                'verse_reference' => '2 Timotius 4:7',
                'verse_text_id' => 'Aku telah mengakhiri pertandingan yang baik, aku telah mencapai garis akhir dan aku telah memelihara iman.',
                'verse_text_en' => 'I have fought the good fight, I have finished the race, I have kept the faith.',
                'description_id' => 'Telah berpulang ke rumah Bapa dengan tenang pada hari Minggu, 24 Mei 2026 Pk. 16:20 WIB',
                'description_en' => "She has peacefully returned to the Father's house on Sunday, 24 May 2026 at 16:20 WIB.",
                'wife_name' => null,
                'children' => null,
                'father_in_law' => 'Imanuel Yudianto Wibowo (Tjeng Swan Tjhing) (†)',
                'mother_in_law' => 'Maria Yulistyaningsih (Tan Pek Liu) (†)',
                'funeral_resting_place' => 'Rumah Duka Adi Jasa'."\n".'Ruang VVIP 18',
                'burial_information' => 'Wire Tuban',
                'schedule_closing_coffin' => 'Senin, 25 Mei 2026 Pk. 14:00 WIB',
                'schedule_comfort_service' => 'Selasa, 26 Mei 2026 Pk. 19:00 WIB',
                'schedule_departure_service' => 'Rabu, 27 Mei 2026 Pk. 08:00 WIB',
                'support_intro_id' => 'UNGKAPAN KASIH DAN BELASUNGKAWA DARI KELUARGA & SAHABAT DAPAT DISAMPAIKAN MELALUI REKENING BERIKUT',
                'support_intro_en' => 'Expressions of love and condolences from family and friends may be shared through the following account.',
                'support_account_placeholder' => '',
                'is_active' => true,
            ]
        );
    }
}
