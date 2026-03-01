<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
public function index()
{
    return to_route('depenses.index');
}

public function store(StoreCategoryRequest $request)
{
    // dd($request->all());
    Category::create($request->validated());
    return to_route('categories.index');
}

public function show($id)
{
    return Category::findOrFail($id);
}

public function update(UpdateCategoryRequest $request, $id)
{
    $category = Category::findOrFail($id);
    $category->update($request->all());
    return $category;
}

public function destroy($id)
{
    Category::destroy($id);
    return to_route('categories.index');
}

}
