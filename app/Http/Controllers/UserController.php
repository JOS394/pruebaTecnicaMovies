<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::select('id','name','email',
        'type_user')
        ->get();
        return view('usuarios.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $userDB = new User;
        $userDB->name = $request->name;
        $userDB->email = $request->email;
        $userDB->password = Hash::make($request->password);
        $userDB->type_user = false;
        $userDB->save();

            $userDB->assignRole('Usuario registrado');
            $userDB->givePermissionTo('ver pelicula');
            $userDB->givePermissionTo('comprar pelicula');
            $userDB->givePermissionTo('alquilar pelicula');
        
           
         return redirect('users')->with('agregado','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user=User::findOrfail($id);
        return view('usuarios.edit',compact('user'));
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
        $userDB = User::find($id);
        $userDB->name = $request->name;
        $userDB->email = $request->email;
        $userDB->password = Hash::make($request->password);
        $userDB->type_user = $request->type_user;
        $userDB->save();
    
        return redirect('users')->with('editado','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDB = User::find($id);
        User::destroy($id);
         return redirect('users')->with('eliminar','ok');
    }

}
