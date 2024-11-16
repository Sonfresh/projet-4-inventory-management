<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\InventoryTransaction;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_belong_to_category()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $this->assertEquals($category->id, $product->category->id);
    }

    public function test_product_has_many_inventory_transactions()
    {
        $product = Product::factory()->create();
        $transaction = InventoryTransaction::factory()->create(['product_id' => $product->id]);

        $this->assertTrue($product->inventoryTransactions->contains($transaction));
    }
}
