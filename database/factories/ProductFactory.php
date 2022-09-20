<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name =$this->faker->unique()->words($nb=4,$astext=true);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(100),
            'description' => $this->faker->text(200),
            'reguler_price' => $this->faker->numberBetween(10,500),
            'sale_price' => $this->faker->numberBetween(8,450),
            'SKU' => 'DIGI'.$this->faker->unique()->numberBetween(100,500),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(100,200),
            'image' => 'digital_' . $this->faker->unique()->numberBetween(1,22).'.png',
            'category_id' => $this->faker->numberBetween(1,5)
            //
        ];
    }
}
