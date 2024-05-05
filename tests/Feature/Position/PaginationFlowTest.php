<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaginationFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method_displays_correct_number_of_positions()
    {
        Position::factory(15)->create(); // Create 15 positions
        $user = User::factory()->create();
        $uri = route('position.index');
        $response = $this->actingAs($user)->get($uri);

        $response->assertStatus(200)
        ->assertViewIs('position.index')
        ->assertSeeInOrder([
            'Showing',
            '1',
            'to',
            '8',
            'of',
            '15',
            'results'
        ]);
    }

    public function test_search_method_displays_correct_number_of_positions()
    {
        // Create positions with 'Test' in their name
        for ($i = 0; $i < 15; $i++) {
            Position::factory()->create(['name' => 'Test : ' . $i]);
        }

        // Create positions with 'another' in their name
        for ($i = 0; $i < 20; $i++) {
            Position::factory()->create(['name' => 'another : ' . $i]);
        }

        $user = User::factory()->create();

        // Test search for positions with 'Test' in their name
        $searchTerm = 'Test';
        $response = $this->actingAs($user)->get(route('position.search', ['search' => $searchTerm]));
        $response->assertStatus(200)
            ->assertViewIs('position.index')
            ->assertSeeInOrder([
                'Showing',
                '1',
                'to',
                '8',
                'of',
                '15',
                'results'
            ]);

        // Test search for positions with 'another' in their name
        $searchTerm = 'another';
        $response = $this->actingAs($user)->get(route('position.search', ['search' => $searchTerm]));
        $response->assertStatus(200)
            ->assertViewIs('position.index')
            ->assertSeeInOrder([
                'Showing',
                '1',
                'to',
                '8',
                'of',
                '20',
                'results'
            ]);
    }
}
