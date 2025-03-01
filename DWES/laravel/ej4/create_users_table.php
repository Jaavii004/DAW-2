
<?php

/**
 * @Author: Javier Puertas
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuarios extends Migration {
    public function up() {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('login');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('usuarios');
    }
}


?>