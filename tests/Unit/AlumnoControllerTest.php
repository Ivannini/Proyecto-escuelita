<?php

namespace Tests\Feature;

use App\Models\Alumno;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlumnoControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_listan_alumnos()
    {
        Alumno::factory()->count(2)->create();
        $response = $this->get(route('alumnos.index'));
        $response->assertStatus(200);
        $response->assertSeeText('Listado de Alumnos');
    }

    /** @test */
    public function se_muestra_formulario_de_creacion()
    {
        $response = $this->get(route('alumnos.create'));
        $response->assertStatus(200);
        $response->assertSeeText('Crear Alumno');
    }

    /** @test */
    public function se_muestra_formulario_de_edicion()
    {
        $alumno = Alumno::factory()->create();
        $response = $this->get(route('alumnos.edit', $alumno));
        $response->assertStatus(200);
        $response->assertSeeText('Editar Alumno');
    }

    /** @test */
    public function se_muestra_detalle_del_alumno()
    {
        $alumno = Alumno::factory()->create();
        $response = $this->get(route('alumnos.show', $alumno));
        $response->assertStatus(200);
        $response->assertSeeText($alumno->nombre);
    }

    /** @test */
    public function se_puede_crear_un_alumno()
    {
        $data = [
            'nombre'           => 'Test Alumno',
            'correo'           => 'test@example.com',
            'fecha_nacimiento' => '2000-01-01',
            'ciudad'           => 'Ciudad Test',
        ];

        $response = $this->post(route('alumnos.store'), $data);
        $response->assertRedirect(route('alumnos.index'));
        $this->assertDatabaseHas('alumnos', ['correo' => 'test@example.com']);
    }

    /** @test */
    public function se_puede_editar_un_alumno()
    {
        $alumno = Alumno::factory()->create();
        $data = [
            'nombre'           => 'Alumno Editado',
            'correo'           => 'editado@example.com',
            'fecha_nacimiento' => '1990-01-01',
            'ciudad'           => 'Ciudad Editada',
        ];

        $response = $this->put(route('alumnos.update', $alumno), $data);
        $response->assertRedirect(route('alumnos.index'));
        $this->assertDatabaseHas('alumnos', ['correo' => 'editado@example.com']);
    }

    /** @test */
    public function se_puede_eliminar_un_alumno()
    {
        $alumno = Alumno::factory()->create();
        $response = $this->delete(route('alumnos.destroy', $alumno));
        $response->assertRedirect(route('alumnos.index'));
        $this->assertDatabaseMissing('alumnos', ['id' => $alumno->id]);
    }
}
