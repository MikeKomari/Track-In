<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $STOCK_LOW = 0;
    private $STOCK_MEDIUM = 5;
    private $STOCK_READY = 20;
    public function addForm(){
        $types = Product::pluck('type')->unique()->values();
        // $product = Product::findOrFail($id);

        // return view('pages.ProductForm.index', compact('types', 'product'));
        return view('pages.ProductForm.index', compact('types'));
    }

    public function inventory() {
      $type = request()->query("type") ?? "materials";
      $filter = request()->query("active");

      $products = Product::where("type", $type)
        ->when($filter == "stock-low", function($p) {
          return $p->where("quantity", "<=", $this->STOCK_LOW);
        })
        ->when($filter == "stock-medium", function($p) {
          return $p->whereBetween("quantity", [$this->STOCK_LOW, $this->STOCK_MEDIUM]);
        })
        ->when($filter == "stock-ready", function($p) {
          return $p->where("quantity", ">=", $this->STOCK_READY);
        })
        ->paginate(20);

      return view("pages.Inventory.index", compact("products"));
    }
}
