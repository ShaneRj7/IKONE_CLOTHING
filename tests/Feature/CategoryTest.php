<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_category()
    {
        // Arrange: Create a category instance
        $category = Category::create(['category_name' => 'New Category']);

        // Assert: Check if the category was created successfully
        $this->assertDatabaseHas('categories', [
            'category_name' => 'New Category',
        ]);
    }

    /** @test */
    public function it_requires_a_name_to_create_a_category()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        // Attempt to create a category without a name should fail
        Category::create([]);
    }

    /** @test */
    public function it_can_delete_a_category()
    {
        // Arrange: Create a category instance
        $category = Category::create(['category_name' => 'Delete Category']);

        // Act: Delete the category
        $category->delete();

        // Assert: Check if the category was deleted successfully
        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }

    /** @test */
    public function it_can_update_a_category()
    {
        // Arrange: Create a category instance
        $category = Category::create(['category_name' => 'Old Category']);

        // Act: Update the category's name
        $category->update(['category_name' => 'Updated Category']);

        // Assert: Check if the category was updated successfully
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'category_name' => 'Updated Category',
        ]);
    }
}
