<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin) {
            return back();
        }
        $user = Auth::user();
        $vendas = $user->sales;

        return view('sales.index', ['compras' => $vendas]);
    }

    public function store($p_id)
    {
        if (Auth::user()->isAdmin) {
            return back();
        }
        $cliente = Auth::user();

        $venda = new Sale();
        $venda->client_id = $cliente->id;
        $venda->product_id = $p_id;
        $venda->date = now();
        $venda->save();

        return redirect(route('sales.index'));
    }
}
