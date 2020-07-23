<?php

namespace Tests\Feature;

use App\Models\Athlete;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AthleteTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_an_athlete()
    {
        $attributes = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'sex' => $this->faker->randomElement(['m', 'f']),
            'dob' => $this->faker->date('Y-m-d', 'now'),
            'grad_year' => $this->faker->randomElement($array = [2020, 2021, 2022, 2023, 2024])
        ];

        $this->post('/athletes', $attributes);

        $this->assertDatabaseHas('athletes', $attributes);
    }

    /** @test */
    public function a_user_can_view_an_athlete()
    {
        $athlete = factory(Athlete::class)->create();

        $this->get($athlete->path())
            ->assertSee($athlete->first_name)
            ->assertSee($athlete->last_name);
    }

    /** @test */
    public function an_athlete_requires_a_first_name()
    {
        $attributes = factory(Athlete::class)->raw(['first_name' => '']);

        $this->post('/athletes', $attributes)
            ->assertSessionHasErrors('first_name');
    }

    /** @test */
    public function an_athlete_requires_a_last_name()
    {
        $attributes = factory(Athlete::class)->raw(['last_name' => '']);

        $this->post('/athletes', $attributes)
            ->assertSessionHasErrors('last_name');
    }

    /** @test */
    public function an_athlete_requires_a_sex()
    {
        $attributes = factory(Athlete::class)->raw(['sex' => '']);

        $this->post('/athletes', $attributes)
            ->assertSessionHasErrors('sex');
    }

    /** @test */
    public function an_athlete_requires_a_dob()
    {
        $attributes = factory(Athlete::class)->raw(['dob' => '']);

        $this->post('/athletes', $attributes)
            ->assertSessionHasErrors('dob');
    }

    /** @test */
    public function an_athlete_requires_a_grad_year()
    {
        $attributes = factory(Athlete::class)->raw(['grad_year' => '']);

        $this->post('/athletes', $attributes)
            ->assertSessionHasErrors('grad_year');
    }

}
