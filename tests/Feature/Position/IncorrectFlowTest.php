<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IncorrectFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_method_fails_with_invalid_shortName()
    {
        $user = User::factory()->create();
        $invalidData = [
            'shortName' => '', // Empty shortName
            'name' => 'Test Position',
            'priority' => 1,
        ];

        $uri = route('position.store');
        $response = $this->actingAs($user)->post($uri, $invalidData);

        $response->assertSessionHasErrors('shortName');
    }

    public function test_store_method_fails_with_invalid_name()
    {
        $user = User::factory()->create();
        $invalidData = [
            'shortName' => 'Test',
            'name' => '', // Empty name
            'priority' => 1,
        ];

        $uri = route('position.store');
        $response = $this->actingAs($user)->post($uri, $invalidData);

        $response->assertSessionHasErrors('name');
    }

    public function test_store_method_fails_with_invalid_priority()
    {
        $user = User::factory()->create();
        $invalidData = [
            'shortName' => 'Test',
            'name' => 'Test Position',
            'priority' => 'abc', // Invalid priority (not an integer)
        ];

        $uri = route('position.store');
        $response = $this->actingAs($user)->post($uri, $invalidData);

        $response->assertSessionHasErrors('priority');
    }

    public function test_store_method_fails_with_duplicate_shortName()
    {
        $existingPosition = Position::factory()->create();
        $user = User::factory()->create();
        $duplicateData = [
            'shortName' => $existingPosition->shortName, // Existing shortName
            'name' => 'New Position',
            'priority' => 1,
        ];

        $uri = route('position.store');
        $response = $this->actingAs($user)->post($uri, $duplicateData);

        $response->assertSessionHasErrors('shortName');
    }

    public function test_update_method_fails_with_duplicate_shortName()
    {
        $existingPosition = Position::factory()->create();
        $otherPosition = Position::factory()->create();
        $user = User::factory()->create();
        $updateData = [
            'shortName' => $otherPosition->shortName, // Existing shortName
            'name' => 'Updated Position',
            'priority' => 1,
        ];

        $uri = route('position.update', $existingPosition->id);
        $response = $this->actingAs($user)->patch($uri, $updateData);

        $response->assertSessionHasErrors('shortName');
    }

    public function test_destroy_method_fails_with_incorrect_password()
    {
        $position = Position::factory()->create();
        $user = User::factory()->create();
        $wrongPassword = 'wrong_password';

        $uri = route('position.destroy', $position->id);
        $response = $this->actingAs($user)->delete($uri, [
            'password' => $wrongPassword, // Incorrect password
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_store_method_fails_with_invalid_data()
    {
        $user = User::factory()->create();
        $invalidData = [
            'shortName' => '', // Invalid shortName (empty)
            'name' => 'New Position',
            'priority' => 'abc', // Invalid priority (not an integer)
        ];

        $uri = route('position.store');
        $response = $this->actingAs($user)->post($uri, $invalidData);

        $response->assertSessionHasErrors(['shortName', 'priority']);
    }

    public function test_update_method_fails_with_invalid_data()
    {
        $position = Position::factory()->create();
        $user = User::factory()->create();
        $invalidData = [
            'shortName' => '', // Invalid shortName (empty)
            'name' => 'Updated Position',
            'priority' => 'abc', // Invalid priority (not an integer)
        ];

        $uri = route('position.update', $position->id);
        $response = $this->actingAs($user)->patch($uri, $invalidData);

        $response->assertSessionHasErrors(['shortName', 'priority']);
    }
}
