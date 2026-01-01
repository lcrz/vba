<?php

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('puede ver lista de categorias', function () {
    $user = User::factory()->create();
    Categoria::factory()->count(3)->create();

    $response = $this->actingAs($user)->get(route('categorias.index'));

    $response->assertStatus(200);
    $response->assertViewIs('categoria.index');
});

test('puede ver formulario de crear categoria', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('categorias.create'));

    $response->assertStatus(200);
    $response->assertViewIs('categoria.create');
});

test('puede crear una categoria', function () {
    $user = User::factory()->create();
    $data = [
        'nombre' => 'Nueva Categoria',
        'slug' => 'nueva-categoria',
        'descripcion' => 'Descripcion de prueba',
        'activa' => 1
    ];

    $response = $this->actingAs($user)->post(route('categorias.store'), $data);

    $response->assertRedirect(route('categorias.index'));
    expect(Categoria::count())->toBe(1);
    expect(Categoria::first()->nombre)->toBe('Nueva Categoria');
});

test('no puede crear categoria con nombre duplicado', function () {
    $user = User::factory()->create();
    Categoria::factory()->create(['nombre' => 'Existente']);

    $response = $this->actingAs($user)->post(route('categorias.store'), [
        'nombre' => 'Existente'
    ]);

    $response->assertSessionHasErrors(['nombre']);
});

test('puede ver una categoria especifica', function () {
    $user = User::factory()->create();
    $categoria = Categoria::factory()->create();

    $response = $this->actingAs($user)->get(route('categorias.show', $categoria));

    $response->assertStatus(200);
    $response->assertViewIs('categoria.show');
});

test('puede ver formulario de editar categoria', function () {
    $user = User::factory()->create();
    $categoria = Categoria::factory()->create();

    $response = $this->actingAs($user)->get(route('categorias.edit', $categoria));

    $response->assertStatus(200);
    $response->assertViewIs('categoria.edit');
});

test('puede actualizar una categoria', function () {
    $user = User::factory()->create();
    $categoria = Categoria::factory()->create();
    $newData = [
        'nombre' => 'Nombre Actualizado',
        'slug' => 'nombre-actualizado',
        'descripcion' => 'Nueva descripcion',
        'activa' => 0
    ];

    $response = $this->actingAs($user)->put(route('categorias.update', $categoria), $newData);

    $response->assertRedirect(route('categorias.index'));
    $categoria->refresh();
    expect($categoria->nombre)->toBe('Nombre Actualizado');
    expect($categoria->activa)->toBe(0);
});

test('puede eliminar una categoria', function () {
    $user = User::factory()->create();
    $categoria = Categoria::factory()->create();

    $response = $this->actingAs($user)->delete(route('categorias.destroy', $categoria));

    $response->assertRedirect(route('categorias.index'));
    expect(Categoria::find($categoria->id))->toBeNull();
});

test('redirige al login si usuario no autenticado intenta acceder', function () {
    $response = $this->get(route('categorias.index'));
    $response->assertRedirect('/login');
});

test('retorna 404 al intentar ver categoria inexistente', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('categorias.show', 99999));

    $response->assertStatus(404);
});
