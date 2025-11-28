<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    public function run(): void
      {
        $users = User::all();
        $products = Product::where("quantity", ">", 0)->get();

        Transaction::factory(50)->make()->each(function($transaction) use ($users, $products) {
            // 1. Assign random user
            $user = $users->random();
            $transaction->user_id = $user->id;
            $transaction->save();

            // 2. Assign random product (max 5 items)
            $itemAmount = rand(1, 5);
            for($i = 0; $i < $itemAmount; $i++) {

                // Filter product that are out of stock
                $availableProducts = $products->where("quantity", ">", 0);
                if($availableProducts->isEmpty()) {
                    break;
                }


            }
        });
    }
}
