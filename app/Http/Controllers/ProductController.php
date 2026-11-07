<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function indexByCategory($id)
    {
        $categorias = Category::all();
        if ($id == 0) {
            $produtos = Product::all();
        } else {
            $categoria = Category::find($id);
            $produtos = $categoria->products;
        }
        return view('products.index', [
            'produtos' => $produtos,
            'categorias' => $categorias,
            'idCategoriaAtiva' => $id
        ]);
    }

    public function index()
    {
        return $this->indexByCategory(0);
    }

    public function create()
    {
        if (!Auth::user()->isAdmin) {
            return back();
        }
        $categorias = Category::all();
        return view('products.create', ['categorias' => $categorias]);
    }

    public function store(StoreProductRequest $request)
    {
        $produto = new Product();
        $produto->Name = $request->name;
        $produto->Description = $request->desc;
        $produto->img = $request->img;
        $produto->Cost = $request->cost;
        $produto->category_id = $request->cat;
        $produto->owner_id = Auth::user()->id;
        $produto->save();

        return redirect(route('products.show', $produto->id));
    }

    public function show($id)
    {
        $produto = Product::find($id);
        $categoria = Category::find($produto->category_id);
        return view('products.show', ['produto' => $produto, 'categoria' => $categoria]);
    }

    public function edit($id)
    {
        if (!Auth::user()->isAdmin) {
            return back();
        }
        $produto = Product::find($id);
        $categorias = Category::all();
        return view('products.create', ['categorias' => $categorias, 'produto' => $produto]);
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        $produto = Product::find($id);
        $produto->Name = $request->name;
        $produto->Description = $request->desc;
        $produto->img = $request->img;
        $produto->Cost = $request->cost;
        $produto->category_id = $request->cat;
        $produto->owner_id = Auth::user()->id;
        $produto->save();

        return redirect(route('products.show', $produto->id));
    }

    public function destroy($id)
    {
        if (!Auth::user()->isAdmin) {
            return back();
        }
        $produto = Product::find($id);
        $produto->delete();

        return redirect(route('products.index'));
    }
}
