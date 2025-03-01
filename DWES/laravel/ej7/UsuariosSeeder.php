<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder {
    public function run(): void {
        Usuario::factory(3)->create();
    }
}
