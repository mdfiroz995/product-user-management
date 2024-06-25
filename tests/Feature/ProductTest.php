<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_product()
    {
        $data = [
            'name' => 'Test Product',
            'description' => 'This is a test product',
            'price' => 99.99,
            'quantity' => 10
        ];

        $response = $this->postJson('/api/products', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'name' => 'Test Product',
                     'description' => 'This is a test product',
                     'price' => 99.99,
                     'quantity' => 10,
                 ]);

        $this->assertDatabaseHas('products', $data);
    }

    /** @test */
    public function it_can_list_all_products()
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_show_a_product()
    {
        $product = Product::factory()->create();

        $response = $this->getJson('/api/products/' . $product->id);

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $product->id,
                     'name' => $product->name,
                     'description' => $product->description,
                     'price' => $product->price,
                     'quantity' => $product->quantity,
                 ]);
    }

    /** @test */
    public function it_can_update_a_product()
    {
        $product = Product::factory()->create();

        $data = [
            'name' => 'Updated Product',
            'description' => 'Updated description',
            'price' => 199.99,
            'quantity' => 20
        ];

        $response = $this->putJson('/api/products/' . $product->id, $data);

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $product->id,
                     'name' => 'Updated Product',
                     'description' => 'Updated description',
                     'price' => 199.99,
                     'quantity' => 20,
                 ]);

        $this->assertDatabaseHas('products', $data);
    }

    /** @test */
    public function it_can_delete_a_product()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson('/api/products/' . $product->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
