<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Alumno;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlumnoControllerTest extends TestCase
{
    use RefreshDatabase; // Limpia la base de datos antes de cada prueba

    /** @test */
    public function se_pueden_listar_alumnos()
    {
        Alumno::factory()->count(2)->create(); // Crea dos registros de prueba

        $response = $this->get(route('alumnos.index'));

        $response->assertStatus(200);
        $response->assertSeeText('Listado de Alumnos');
    }

    /** @test */
    public function se_muestra_el_formulario_de_creacion_de_alumno()
    {
        $response = $this->get(route('alumnos.create'));

        $response->assertStatus(200);
        $response->assertSeeText('Crear Alumno');
    }

    /** @test */
    public function se_muestra_el_formulario_de_edicion_de_alumno()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->get(route('alumnos.edit', $alumno->id));

        $response->assertStatus(200);
        $response->assertSeeText('Editar Alumno');
    }

    /** @test */
    public function se_muestra_el_detalle_de_un_alumno()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->get(route('alumnos.show', $alumno->id));

        $response->assertStatus(200);
        $response->assertSee($alumno->nombre);
        $response->assertSee($alumno->correo);
    }

    /** @test */
    public function se_puede_crear_un_alumno()
    {
        $data = [
            'nombre' => 'Juan Pérez',
            'correo' => 'juan@example.com',
            'fecha_nacimiento' => '2000-05-15',
            'ciudad' => 'Ciudad de México',
        ];

        $response = $this->post(route('alumnos.store'), $data);

        $response->assertRedirect(route('alumnos.index'));
        $this->assertDatabaseHas('alumnos', $data);
    }

    /** @test */
    public function se_puede_editar_un_alumno()
    {
        $alumno = Alumno::factory()->create();

        $data = [
            'nombre' => 'Juan Editado',
            'correo' => 'juan.edited@example.com',
            'fecha_nacimiento' => '2001-06-20',
            'ciudad' => 'Guadalajara',
        ];

        $response = $this->put(route('alumnos.update', $alumno->id), $data);

        $response->assertRedirect(route('alumnos.index'));
        $this->assertDatabaseHas('alumnos', $data);
    }

    /** @test */
    public function se_puede_eliminar_un_alumno()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->delete(route('alumnos.destroy', $alumno->id));

        $response->assertRedirect(route('alumnos.index'));
        $this->assertDatabaseMissing('alumnos', ['id' => $alumno->id]);
    }
}
