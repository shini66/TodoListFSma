<?php

use App\Models\Manager;
use App\Models\User;

test('managers index can be rendered', function () {
    $user = User::factory()->create();

    Manager::factory(3)->create();

    $response = $this->actingAs($user)->get('/managers');

    $response->assertStatus(200);
});

test('managers create page can be rendered', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/managers/create');

    $response->assertStatus(200);
});

test('manager can be created', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/managers', [
        'name' => 'Carlos Pérez',
        'email' => 'carlos@example.com',
    ]);

    $response->assertRedirect(route('managers.index'));
    $this->assertDatabaseHas('managers', [
        'name' => 'Carlos Pérez',
        'email' => 'carlos@example.com',
    ]);
});

test('manager creation validates required fields', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/managers', [
        'name' => '',
        'email' => 'not-an-email',
    ]);

    $response->assertSessionHasErrors(['name', 'email']);
});

test('manager can be shown', function () {
    $user = User::factory()->create();
    $manager = Manager::factory()->create();

    $response = $this->actingAs($user)->get("/managers/{$manager->id}");

    $response->assertStatus(200);
});

test('manager edit page can be rendered', function () {
    $user = User::factory()->create();
    $manager = Manager::factory()->create();

    $response = $this->actingAs($user)->get("/managers/{$manager->id}/edit");

    $response->assertStatus(200);
});

test('manager can be updated', function () {
    $user = User::factory()->create();
    $manager = Manager::factory()->create();

    $response = $this->actingAs($user)->put("/managers/{$manager->id}", [
        'name' => 'Nuevo Nombre',
        'email' => 'nuevo@example.com',
    ]);

    $response->assertRedirect(route('managers.index'));
    $this->assertDatabaseHas('managers', [
        'id' => $manager->id,
        'name' => 'Nuevo Nombre',
        'email' => 'nuevo@example.com',
    ]);
});

test('manager update validates unique email', function () {
    $user = User::factory()->create();
    Manager::factory()->create(['email' => 'existe@example.com']);
    $manager = Manager::factory()->create();

    $response = $this->actingAs($user)->put("/managers/{$manager->id}", [
        'name' => 'Test',
        'email' => 'existe@example.com',
    ]);

    $response->assertSessionHasErrors(['email']);
});

test('manager can be deleted', function () {
    $user = User::factory()->create();
    $manager = Manager::factory()->create();

    $response = $this->actingAs($user)->delete("/managers/{$manager->id}");

    $response->assertRedirect(route('managers.index'));
    $this->assertDatabaseMissing('managers', ['id' => $manager->id]);
});

test('unauthenticated user cannot access managers', function () {
    $response = $this->get('/managers');

    $response->assertRedirect('/login');
});
