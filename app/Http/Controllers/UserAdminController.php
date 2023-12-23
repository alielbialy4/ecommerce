<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function changeStatus(Request $request)
    {
        $section = User::findOrFail($request->id);
        switch ($section->status) {
            case 1:
                $section->update(['status' => '0']);
                break;
            case 0:
                $section->update(['status' => '1']);
                break;
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id)->first();
        if($user){
            $user->delete();
            Alert::success('تم الحذف', '  تم حذف المستخدم بنجاح');
            return redirect()->route('users.admin.index');
        } else {
            return redirect()->route('users.admin.index');
        }
        
    }
 
}
