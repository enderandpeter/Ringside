<?php

namespace Tests\Unit;

use App\Models\Event;
use App\Models\Title;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TitleTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function can_get_all_valid_titles_for_an_event()
    {
        $validTitleA = factory(Title::class)->create(['introduced_at' => Carbon::parse('3 weeks ago')]);
        $validTitleB = factory(Title::class)->create(['introduced_at' => Carbon::parse('2 weeks ago')]);
        $invalidTitle = factory(Title::class)->create(['introduced_at' => Carbon::parse('next week')]);
        $event = factory(Event::class)->create(['date' => Carbon::parse('tomorrow')]);

        $validTitles = Title::valid($event->date)->get();

        $this->assertTrue($validTitles->contains($validTitleA));
        $this->assertTrue($validTitles->contains($validTitleB));
        $this->assertFalse($validTitles->contains($invalidTitle));
    }
}
