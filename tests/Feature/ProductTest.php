<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_product()
    {
        // Arrange: Create a product instance using the factory
        $productData = Product::factory()->make()->toArray();

        // Act: Create a product
        $product = Product::create($productData);

        // Assert: Check if the product was created successfully
        $this->assertDatabaseHas('products', [
            'name' => $productData['name'],
            'description' => $productData['description'],
            'category' => $productData['category'],
            'image' => $productData['image'],
            'size' => $productData['size'],
            'quantity' => $productData['quantity'],
            'price' => $productData['price'],
        ]);
    }

    /** @test */
    public function it_requires_a_name_to_create_a_product()
    {
        // This should throw a validation exception since the name is required
        $this->expectException(ValidationException::class);

        // Attempt to create a product without a name should fail
        Product::create([
            'description' => 'Test description',
            'category' => 'Test category',
            'image' => 'Test image',
            'size' => 'M',
            'quantity' => 10,
            'price' => 100.00,
        ]);
    }

    /** @test */
    public function it_can_delete_a_product()
    {
        // Arrange: Create a product instance
        $product = Product::factory()->create();

        // Act: Delete the product
        $product->delete();

        // Assert: Check if the product was deleted successfully
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }

    /** @test */
    public function it_can_update_a_product()
    {
        // Arrange: Create a product instance
        $product = Product::factory()->create();

        // Act: Update the product's name
        $product->update(['name' => 'Updated Product']);

        // Assert: Check if the product was updated successfully
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Product',
        ]);
    }
}
