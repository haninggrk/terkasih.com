<?php

namespace Tests\Feature;

use App\Models\MemorialPage;
use App\Models\Rsvp;
use App\Models\SupportContribution;
use App\Models\Tribute;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemorialPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        MemorialPage::query()->create([
            'slug' => 'eric-pramono',
            'person_name' => 'Eric Pramono',
            'subtitle' => 'Love left behind...',
            'verse_reference' => 'Yohanes 14:1-2',
            'verse_text_id' => 'Ayat',
            'verse_text_en' => 'Verse',
            'description_id' => 'Desc ID',
            'description_en' => 'Desc EN',
            'wife_name' => 'Sofia Linawaty',
            'children' => ['Philip Sidney', 'Noah', 'Hugo', 'Xavier Joy'],
            'father_in_law' => 'Ong Tjing Fong (Edi Yongki)',
            'mother_in_law' => 'Lie Kwik Djin (deceased)',
            'funeral_resting_place' => 'Disemayamkan di Rumah Duka Adi Jasa (ruangan menyusul)',
            'burial_information' => 'Dimakamkan (informasi menyusul)',
            'schedule_closing_coffin' => 'Ibadah Tutup Peti (informasi menyusul)',
            'schedule_comfort_service' => 'Ibadah Penghiburan (informasi menyusul)',
            'schedule_departure_service' => 'Ibadah Pemberangkatan (informasi menyusul)',
            'support_intro_id' => 'ID Intro',
            'support_intro_en' => 'EN Intro',
            'support_account_placeholder' => 'Bank XXXX',
            'is_active' => true,
        ]);
    }

    public function test_memorial_page_is_accessible(): void
    {
        $this->get('/eric-pramono')
            ->assertOk()
            ->assertSee('Rest in Peace')
            ->assertSee('Eric Pramono');
    }

    public function test_support_page_is_accessible(): void
    {
        $this->get('/eric-pramono/dukungan')
            ->assertOk()
            ->assertSeeText('Tanda Kasih');
    }

    public function test_user_can_submit_tribute(): void
    {
        $this->post('/eric-pramono/tributes', [
            'name' => 'Andi',
            'relations' => ['Teman'],
            'message' => 'Selamat jalan, kami mengenangmu.',
        ])->assertRedirect('/eric-pramono#memories');

        $this->assertDatabaseCount('tributes', 1);
        $tribute = Tribute::query()->first();

        self::assertNotNull($tribute);
        self::assertSame('Andi', $tribute->name);
    }

    public function test_user_can_submit_support_contribution(): void
    {
        $this->post('/eric-pramono/support-contributions', [
            'name' => 'Budi',
            'nominal' => '250000',
        ])->assertRedirect('/eric-pramono/dukungan#support-form');

        $this->assertDatabaseCount('support_contributions', 1);
        $supportContribution = SupportContribution::query()->first();

        self::assertNotNull($supportContribution);
        self::assertSame(250000, $supportContribution->nominal);
    }

    public function test_user_can_submit_rsvp(): void
    {
        $this->post('/eric-pramono/rsvps', [
            'name' => 'Cindy',
            'attendance' => 'yes',
            'guest_count' => 2,
            'note' => 'Kami akan hadir.',
        ])->assertRedirect('/eric-pramono#rsvp');

        $this->assertDatabaseCount('rsvps', 1);
        $rsvp = Rsvp::query()->first();

        self::assertNotNull($rsvp);
        self::assertSame('yes', $rsvp->attendance);
    }
}
