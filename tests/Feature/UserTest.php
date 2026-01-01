<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('puede ver lista de usuarios', function () {
    $admin = User::factory()->create();
    User::factory()->count(3)->create();

    $response = $this->actingAs($admin)->get(route('users.index'));

    $response->assertStatus(200);
    $response->assertViewIs('user.index');
});

test('puede crear un usuario', function () {
    $admin = User::factory()->create();
    $data = [
        'name' => 'Nuevo Usuario',
        'email' => 'nuevo@example.com',
        'password' => 'password123',
        'admin' => '1'
    ];

    $response = $this->actingAs($admin)->post(route('users.store'), $data);

    $response->assertRedirect(route('users.index'));

    $user = User::where('email', 'nuevo@example.com')->first();
    expect($user)->not->toBeNull();
    expect($user->name)->toBe('Nuevo Usuario');
    expect(Hash::check('password123', $user->password))->toBeTrue();
    expect($user->admin)->toBe(1);
});

test('falla validacion al crear usuario con email duplicado', function () {
    $admin = User::factory()->create();
    User::factory()->create(['email' => 'duplicado@example.com']);

    $response = $this->actingAs($admin)->post(route('users.store'), [
        'name' => 'Otro Usuario',
        'email' => 'duplicado@example.com',
        'password' => 'password123'
    ]);

    $response->assertSessionHasErrors(['email']);
});

test('puede actualizar un usuario', function () {
    $admin = User::factory()->create();
    $user = User::factory()->create();

    $newData = [
        'name' => 'Usuario Actualizado',
        'email' => $user->email, // Same email should be allowed
        'admin' => 'on'
    ];

    $originalPassword = $user->password;

    $response = $this->actingAs($admin)->put(route('users.update', $user), $newData);

    $response->assertRedirect(route('users.index'));
    $user->refresh();
    expect($user->name)->toBe('Usuario Actualizado');

    // Check if password remains unchanged if not provided
    expect($user->password)->toBe($originalPassword);
});

test('puede actualizar contraseña de usuario', function () {
    $admin = User::factory()->create();
    $user = User::factory()->create(['password' => Hash::make('oldpassword')]);

    $newData = [
        'name' => $user->name,
        'email' => $user->email,
        'password' => 'newpassword123'
    ];

    $response = $this->actingAs($admin)->put(route('users.update', $user), $newData);

    $user->refresh();
    expect(Hash::check('newpassword123', $user->password))->toBeTrue();
});

test('puede eliminar un usuario', function () {
    $admin = User::factory()->create();
    $user = User::factory()->create();

    $response = $this->actingAs($admin)->delete(route('users.destroy', $user));

    $response->assertRedirect(route('users.index'));
    expect(User::find($user->id))->toBeNull();
});

test('redirige al login si usuario no autenticado intenta acceder a usuarios', function () {
    $response = $this->get(route('users.index'));
    $response->assertRedirect('/login');
});

test('retorna 404 al intentar ver usuario inexistente', function () {
    $admin = User::factory()->create();

    $response = $this->actingAs($admin)->get(route('users.show', 99999));

    $response->assertStatus(404);
});
