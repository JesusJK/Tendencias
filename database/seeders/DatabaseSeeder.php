<?php

namespace Database\Seeders;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Clasificacion;
use App\Models\Estante;
use App\Models\MAterial;
use App\Models\MaterialAutor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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
