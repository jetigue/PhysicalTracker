<?php

namespace Tests\Feature;

use App\Models\Athlete;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ManageAthletesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    protected $athlete;
    protected $attributes;
    protected $newAttributes;

    public function setUp(): void {

        parent::setUp();

        $this->athlete = factory(Athlete::class)->create();

        $this->attributes = [
            'first_name' => 'Roger',
            'last_name' => 'Bannister',
            'sex' => 'm',
            'dob' => $this->faker->date($format = 'Y-m-d'),
            'grad_year' => 2024
        ];

        $this->newAttributes = [
            'first_name' => 'Suzy',
            'last_name' => 'Hamilton',
            'sex' => 'f',
            'dob' => $this->faker->date($format = 'Y-m-d'),
            'grad_year' => 2020
        ];
    }

    /** @test */
    public function a_user_can_create_an_athlete()
    {
        $this->post('/athletes', $this->attributes)->assertStatus(201);

        $this->assertDatabaseHas('athletes', $this->attributes);
    }

    /** @test */
    public function athletes_table_is_searchable()
    {
        factory(Athlete::class)->create(['last_name' => 'Prefontaine']);
        factory(Athlete::class)->create(['last_name' => 'Viren']);

        Livewire::test('athletes-table')
            ->assertSee('Prefontaine')
            ->assertSee('Viren')
            ->set('search', 'Prefontaine')
            ->assertSee('Prefontaine')
            ->assertDontSee('Viren');

    }
}
