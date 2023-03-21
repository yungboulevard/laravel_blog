<?php

namespace App\Http\Controllers\Admin\Category;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category as Categoria;
use App\Http\Requests\Admin\Category\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Categoria $category)
    {
        $data = $request->validated();
        $category->update($data);
        return view('admin.category.show', compact('category'));
    }
}
