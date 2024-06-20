<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Classes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Users::where('roles', 'STUDENT')->get();

        return view('pages.admin.student.index', [
            'items' => $items
        ]);
    }


    // Untuk validation

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::pluck('class_name');

        return view('pages.admin.student.create', [
            'classes' => $classes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric|unique:users,nisn',
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string',
            'phone_number' => 'required|numeric',
            'class' => 'required',
        ]);
        $data = $request->all();

        Users::create($data);

        return redirect()->route('data-siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Users::findOrFail($id);

        return view('pages.admin.student.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Users::findOrFail($id);

        return view('pages.admin.student.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => [
                'required',
                'numeric',
                Rule::unique('users', 'nisn')->ignore($id),
            ],
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($id),
            ],
            'password' => 'nullable|min:6',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
            'address' => 'required|string',
            'phone_number' => 'required|numeric',
            'class' => 'required',
        ]);
    
        $data = $request->all();
        $item = Users::findOrFail($id);
        $item->update($data);
    
        return redirect()->route('data-siswa.index');
        // $data = $request->all();
        // $item = Users::findOrFail($id);
        // $item->update($data);

        // return redirect()->route('data-siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Users::findOrFail($id);
        $item->delete();
        return redirect()->route('data-siswa.index');
    }
}
