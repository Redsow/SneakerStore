<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ProductControllerTest extends TestCase
{
    use DatabaseTransactions; // or use RefreshDatabase; if you prefer

    /**
     * @test
     */
    public function it_can_return_products_page()
    {
        $response = $this->get('/products');

        $response->assertStatus(200)
            ->assertViewIs('products')
            ->assertViewHas('categories')
            ->assertViewHas('products');
    }

    /**
     * @test
     */
    public function it_can_filter_products_by_category()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $response = $this->post('/filter-products', ['category' => $category->name]);

        $response->assertStatus(200)
            ->assertViewIs('products')
            ->assertViewHas('categories')
            ->assertViewHas('products')
            ->assertViewHas('product_id', $product->id);
    }

    /**
     * @test
     */
    public function it_cannot_create_product_if_not_admin()
    {
        $response = $this->get('/admin/products/create');

        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function it_can_create_product_if_admin()
    {
        $this->actingAs($admin = User::factory()->create(['is_admin' => true]));

        $response = $this->get('/admin/products/create');

        $response->assertStatus(200)
            ->assertViewIs('admin.products.create')
            ->assertViewHas('categories');
    }

    /**
     * @test
     */
    public function it_cannot_create_category_if_not_admin()
    {
        $response = $this->get('/admin/categories/create');

        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function it_can_create_category_if_admin()
    {
        $this->actingAs($admin = User::factory()->create(['is_admin' => true]));

        $response = $this->get('/admin/categories/create');

        $response->assertStatus(200)
            ->assertViewIs('admin.products.create_category');
    }

    /**
     * @test
     */
    public function it_can_store_product_if_admin()
    {
        $this->actingAs($admin = User::factory()->create(['is_admin' => true]));

        $category = Category::factory()->create();

        $response = $this->post('/products', [
            'name' => 'Test Product',
            'price' => 10,
            'description' => 'Test Description',
            'category_id' => $category->id,
        ]);

        $response->assertStatus(302)
            ->assertRedirect('/products')
            ->assertSessionHas('success', 'Product created successfully.');
    }

    /**
     * @test
     */
    public function it_can_store_category_if_admin()
    {
        $this->actingAs($admin = User::factory()->create(['is_admin' => true]));

        $response = $this->post('/categories', [
            'name' => 'Test Category',
            // Add other required fields here
        ]);

        $response->assertStatus(302)
            ->assertRedirect('/categories')
            ->assertSessionHas('success', 'Category created successfully.');
    }
}
