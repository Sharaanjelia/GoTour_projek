<?php

namespace App\Http\Controllers;

use App\Models\Discount;

class DiscountController extends Controller
{
    public function index()
    {
        $items = Discount::where('is_active', true)->where(function($q){
            $now = now();
            $q->whereNull('starts_at')->orWhere('starts_at','<=',$now);
        })->where(function($q){
            $now = now();
            $q->whereNull('ends_at')->orWhere('ends_at','>=',$now);
        })->orderByDesc('created_at')->get();

        if ($items->isEmpty()) {
            $items = collect([
                (object)[
                    'code' => 'PROMO50',
                    'percent' => 50,
                    'description' => 'Diskon 50% untuk semua paket wisata!',
                ],
                (object)[
                    'code' => 'HEMAT20',
                    'percent' => 20,
                    'description' => 'Diskon 20% untuk destinasi pilihan.',
                ],
            ]);
        }

        return view('discounts_index', compact('items'));
    }
}
