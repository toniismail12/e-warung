<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'excert' =>$this->faker->paragraph(mt_rand(3,5)),
            //'body' => $this->faker->paragraphs(mt_rand(3,7)),
            'body' => collect($this->faker->paragraphs(mt_rand(5,20)))->map(fn($p)=>"<p>$p</p>")->implode(''),
            'category_id' => mt_rand(1,2),
            'user_id' => mt_rand(1,3)
        ];
    }
}
