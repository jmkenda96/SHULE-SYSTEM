<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['getRecord'] = User::getAdmin();
        return view('admin.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return view('admin.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(Request $request)
    {

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->user_type = 1;
        $admin->save();
        return redirect('admin/list')->with('success', 'Admin added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['getRecord'] = User::getSingle($id);
        return view('admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = User::getSingle($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->user_type = 1;
        $admin->save();
        return redirect('admin/list')->with('success', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $admin = User::getSingle($id);
        $admin->delete();
        return redirect('admin/list')->with('success', 'Admin deleted successfully');
    }
}
