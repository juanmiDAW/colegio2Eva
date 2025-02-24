<?php

use App\Models\User;

test('welcome de la pagina', function () {
    $response = $this->get('/');

    $response->assertStatus(200);

    $response->assertViewIs('welcome');
});

test('index de alumnos', function (){

    $user = User::factory()->create();
    $this->actingAs($user);
    
    $response = $this->get('/alumnos');

    $response->assertStatus(200);

    $response->assertViewIs('alumnos.index');
});
