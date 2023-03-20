<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $datas = Category::paginate(25);

        return view('welcome', compact('datas'));
    }

    public function create()
    {
        return view('tambah.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'nama kamu wajib diisi cuy!!!',
            'alpha' => 'Mohon maaf anda harus mengisi ini denga huru',
            'integer' => 'Mohon maaf anda lupa untuk mengisi ini'
        ];

        $this->validate($request, [
            'name' => 'required',
            'is_publish' => 'required|integer'
        ], $messages);

        Category::create([
            'name' => $request->input('name'),
            'is_publish' => $request->input('is_publish'),
        ]);
        return redirect()->route('index');
    }

    public function edit(Request $request, $id)
    {
        $datas = Category::where('id', $id)->first();
        return view('tambah.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $datas = Category::where('id', $id)->first();

        // $messages = [
        //     'required' => 'nama kamu wajib diisi cuy!!!',
        //     'alpha' => 'Mohon maaf anda harus mengisi ini denga huru',
        //     'integer' => 'Mohon maaf anda lupa untuk mengisi ini'
        // ];

        // $this->validate($request, [
        //     'name' => 'required',
        //     'is_publish' => 'required|integer'
        // ], $messages);

        $datas->update([
            'name' => $request->input('name'),
            'is_publish' => $request->input('is_publish'),
        ]);
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $datas = Category::where('id', $id)->first();
        $datas->delete();
        return redirect()->route('index');
    }
}
