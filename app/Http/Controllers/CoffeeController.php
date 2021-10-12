<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoffeeRequest;
use App\Models\Category;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\assertGreaterThanOrEqual;

class CoffeeController extends Controller
{
    function index()
    {
        $coffees = Coffee::all();
        $categories = Category::all();
        return view('backend.coffees.list', compact('coffees', 'categories'));
    }

    function create()
    {
        $categories = Category::all();
        return view('backend.coffees.create', compact('categories'));
    }

    function store(CoffeeRequest $request)
    {
        $coffee = new Coffee();
        $coffee->name = $request->name;
        $coffee->price = $request->price;
        $coffee->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $coffee->image = $path;
        } else {
            $coffee->image = 'images/image.png';
        }
        $coffee->save();
        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('coffees.index');
    }

    function edit($id)
    {
        $coffee = coffee::findOrFail($id);
        $categories = Category::all();
        return view('backend.coffees.update', compact('coffee', 'categories'));
    }

    function update(CoffeeRequest $request, $id)
    {
        $coffee = coffee::findOrFail($id);
        $coffee->name = $request->name;
        $coffee->price = $request->price;
        $coffee->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $coffee->image = $path;
        }
        $coffee->save();
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('coffees.index');
    }

    function destroy($id)
    {
        $coffee = coffee::findOrFail($id);
        $coffee->delete();
        return response()->json('Xóa thành công');
    }

    function searchPrice(Request $request)
    {
        $upPrice = $request->upPrice;
        $toPrice = $request->toPrice;
        $coffees = Coffee::where('price', '>', $upPrice)->and('price', '<', $toPrice)->get();
        return response()->json($coffees);
    }
}
