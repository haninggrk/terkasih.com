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
                'birth_date' => null,
                'death_date' => null,
                'subtitle' => 'Love left behind...',
                'verse_reference' => '2 Timotius 4:7',
                'verse_text_id' => 'I have fought the good fight, I have finished the race, I have kept the faith.',
                'verse_text_en' => 'I have fought the good fight, I have finished the race, I have kept the faith.',
                'description_id' => 'Berita duka akan menyusul.',
                'description_en' => 'Obituary details to follow.',
                'wife_name' => 'Christina Purnama Dewi',
                'children' => null,
                'father_in_law' => null,
                'mother_in_law' => null,
                'funeral_resting_place' => '—',
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
