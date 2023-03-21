<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $datas = Category::paginate(25);
        return response()->json(['success' => $datas]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'is_publish' => 'required|integer'
        ]);

        $datas = Category::create([
            'name' => $request->input('name'),
            'is_publish' => $request->input('is_publish'),
        ]);

        return response()->json(['success' => $datas]);
    }

    public function update_(Request $request, $id)
    {
        $datas = Category::where('id', $id)->first();
        $datas->update([
            'name' => $request->input('name'),
            'is_publish' => $request->input('is_publish'),
        ]);
        return response()->json(['success' => $datas]);
    }

    public function destroy($id)
    {
        $datas = Category::where('id', $id)->first();
        $datas->delete();
        return response()->json(['success']);
    }
}
