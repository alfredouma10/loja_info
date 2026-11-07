<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if (!Auth::user()->isAdmin) {
            return back();
        }
        $categorias = Category::all();
        return view('categories.index', ['categorias' => $categorias]);
    }

    public function create()
    {
        if (!Auth::user()->isAdmin) {
            return back();
        }
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'Name' => $request->name,
        ]);
        return redirect(route('categories.index'));
    }

    public function edit($id)
    {
        if (!Auth::user()->isAdmin) {
            return back();
        }
        $categoria = Category::find($id);
        return view('categories.create', ['categoria' => $categoria]);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $categoria = Category::find($id);
        $categoria->Name = $request->name;
        $categoria->save();

        return redirect(route('categories.index'));
    }

    public function destroy(int $id)
    {
        if (!Auth::user()->isAdmin) {
            return back();
        }
        $category = Category::find($id);
        $category->delete();

        return redirect(route('categories.index'));
    }
}
