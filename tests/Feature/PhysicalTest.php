<?php

namespace Tests\Feature;

use App\Models\Athlete;
use App\Models\Physical;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhysicalTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_physical()
    {
        $athlete = factory(Athlete::class)->create();

        $attributes = [
            'athlete_id' => $athlete->id,
            'consent_form' => $this->faker->boolean($chanceOfGettingTrue = 80),
            'concussion_form' => $this->faker->boolean($chanceOfGettingTrue = 80),
            'evaluation_form' => $this->faker->boolean($chanceOfGettingTrue = 80),
            'cardiac_form' => $this->faker->boolean(80),
            'exam_date' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
        ];

        $this->post('/physicals', $attributes);

        $this->assertDatabaseHas('physicals', $attributes);
    }

    /** @test */
    public function a_physical_requires_an_athlete()
    {
        $attributes = factory(Physical::class)->raw(['athlete_id' => null]);

        $this->post('/physicals', $attributes)
            ->assertSessionHasErrors('athlete_id');
    }

    /** @test */
    public function a_physical_requires_an_exam_date()
    {
        $attributes = factory(Physical::class)->raw(['exam_date' => '']);

        $this->post('/physicals', $attributes)
            ->assertSessionHasErrors('exam_date');
    }

    /** @test */
    public function a_user_can_view_an_physical()
    {

        $this->withoutExceptionHandling();
        $athlete = factory(Athlete::class)->create();

        $physical = factory(Physical::class)->create(['athlete_id' => $athlete->id]);

        $this->get($physical->path())
            ->assertSee($physical->exam_date);
    }
}
