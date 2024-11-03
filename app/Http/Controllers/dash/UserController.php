<?php

namespace App\Http\Controllers\dash;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::forUser("admin")->allows('view.user')) {
            $admins=Admin::all();
            return view('DashUsers.view',compact('admins'));
        }
           return  abort(403);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DashUsers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    
    {
       Admin::create($request->toArray());
       return to_route("user.index");
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return $id;
      $data =Admin::findOrfail($id);
      return view("DashUsers.edit",["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $request["permission"]=implode("+",$request->permission);
     Admin::where("id",$id)->update($request->except("_token","_method"));
     return to_route("user.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Admin::where("id",$id)->delete();
        return to_route("user.index");
    }
}
