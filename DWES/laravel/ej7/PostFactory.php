<?php


use App\Models\Post;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory {
    protected $model = Post::class;

    public function definition() {
        return [
            'titulo' => $this->faker->sentence(),
            'contenido' => $this->faker->text(500),
            'usuario_id' => Usuario::factory(),
        ];
    }
}
