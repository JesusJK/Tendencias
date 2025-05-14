<?php

namespace Database\Seeders;

use App\Models\Prestamo; 
use App\Models\Persona; 
use App\Models\Multa;
use App\Models\MultaPrestamo;
use App\Models\TipoDocumento;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
      $this->call([
        PersonaSeeder::class,
        TipoDocumentoSeeder::class,
        PrestamoSeeder::class,
        MultaSeeder::class,
        MultaPrestamoSeeder::class,
    ]);
        // User::factory(10)->create();

        /**User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);  **/

         /**Clasificacion::factory(10)->create([
            'nombre' => 'Ejemplo de clasificacion',
            'descripcion' => 'Descripción de prueba',
            'estado' => 'activo', 
            'registradoPor' => 'admin',

         ]); **/

          /**Autor::factory(2)->create([
            'nombre' =>'ejemplo autor',
            'apellido' =>'apellido prueba',
            'bibliografia' =>'bibliografia prueba',
          ]);**/
         
        // Categoria::factory(10)->create();
         
        // Estante::factory(10)->create();
        
        // Material::factory(10)->create();

        // MaterialAutor::factory(10)->create();
 
        
    }
}
