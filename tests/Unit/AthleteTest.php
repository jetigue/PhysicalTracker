<?php

namespace Tests\Unit;

use App\Models\Athlete;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AthleteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $athlete = factory(Athlete::class)->create();

        $this->assertEquals('/athletes/' . $athlete->id, $athlete->path());
    }
}
