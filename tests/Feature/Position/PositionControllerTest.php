<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PositionControllerTest extends TestCase
{
    use RefreshDatabase;

    private function saveFileToDebugView($response)
    {
        file_put_contents('dump.html', $response->getContent());
    }

    public function test_list_screen_can_be_rendered()
    {
        $user = User::factory()->create();
        $uri = route('position.index');
        $response = $this->actingAs($user)->get($uri);

        $response->assertStatus(200)
            ->assertViewIs('position.index');
    }

    public function test_search_method_returns_positions_view_with_search_results()
    {
        Position::factory()->create(['name' => 'Test Position']);
        $user = User::factory()->create();
        $uri = route('position.search', ['search' => 'Test']);
        $response = $this->actingAs($user)->get($uri);

        $response->assertStatus(200)
            ->assertViewIs('position.index')
            ->assertSee('Test Position');
    }

    public function test_create_method_returns_create_view()
    {
        $user = User::factory()->create();
        $uri = route('position.create');
        $response = $this->actingAs($user)->get($uri);

        $response->assertStatus(200)
        ->assertViewIs('position.create');
    }

    public function test_store_method_creates_position_and_redirects_to_index()
    {
        $user = User::factory()->create();
        $data = Position::factory()->raw();
        $uri = route('position.store');
        $response = $this->actingAs($user)->post($uri, $data);

        $response->assertRedirect(route('position.index'));
        $this->assertDatabaseHas('positions', $data);
    }

    public function test_edit_method_returns_edit_view()
    {
        $user = User::factory()->create();
        $position = Position::factory()->create();
        $uri = route('position.edit', $position->id);
        $response = $this->actingAs($user)->get($uri);

        $this->saveFileToDebugView($response);

        $position->refresh();

        $response->assertStatus(200)
            ->assertViewIs('position.edit')
            ->assertSee($position->name);
    }

    public function test_update_method_updates_position_and_redirects_to_index()
    {
        $user = User::factory()->create();
        $position = Position::factory()->create();
        $uri = route('position.update', $position->id);
        $response = $this
            ->actingAs($user)
            ->patch($uri, [
                'name' => 'Test name',
                'shortName' => 'sgt',
                'priority' => 666,
            ]);

        $redirectUri = route('position.index');
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect($redirectUri);

        $position->refresh();

        $this->assertSame('Test name', $position->name);
        $this->assertSame('sgt', $position->shortName);
        $this->assertSame(666, $position->priority);
    }

    public function test_destroy_method_deletes_position_and_redirects_to_index()
    {
        $user = User::factory()->create();
        $position = Position::factory()->create();
        $uri = route('position.destroy', $position->id);
        $response = $this->actingAs($user)->delete($uri, [
            'password' => 'password',
        ]);

        $redirectUri = route('position.index');

        $response
        ->assertSessionHasNoErrors()
        ->assertRedirect($redirectUri);

        $this->assertDatabaseMissing('positions', [
            'id' => $position->id,
        ]);
    }
}
