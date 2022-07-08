<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('Users.index', [
            'User' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Roles = Role::all();
        return view('Users.create', [
            'Roles' => $Roles
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
        $validData = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|min:3|unique:users,email'.$request->id,
            'password' => 'required|min:6',
            // 'role' => 'required|min:2'
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->roles()->sync($request->role);

        $user->save();  
        return redirect('/users')->with('info', 'El usuario fue creado correctamente.');
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
        $user = User::findOrfail($id);
        $roles = Role::all();

        return view('Users.edit', [
            'User' => $user,
            'Roles' => $roles
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
        $validData = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|min:3',
            'password' => 'required|min:6',
            // 'role' => 'required|min:2'
        ]);

        $user = User::findOrfail($id);
        $user->name = $request->get('name');
        $user->password = bcrypt($request->get('password'));
        $user->roles()->sync($request->roles);

        $user->save();
        return redirect('/users')->with('info', 'El usuario fue actualizado correctamente.');
    }


    public function confirmdelete($id)
    {
        $user = User::findOrfail($id);

        return view('Users.confirmdelete', [
            'User' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();

        return redirect('/users');
    }

    public function edit_password($id)
    {
        $user = User::findOrfail($id);

        return view('Users.editpassword', [
            'User' => $user,
        ]);
    }

    public function edit_password_confirm(Request $request, $id)
    {
        $validData = $request->validate([
            'password' => 'required|min:6',
        ],[
            'password.required' => 'La contraseña debe contener mínimo 6 dígitos.',
            'password.min' => 'La contraseña debe contener mínimo 6 dígitos.'
        ]);

        $user = User::findOrfail($id);

        if($request->password != $request->confirm_password)
        {
            $Message = 'La confirmación de contraseñas no coincide, inténtelo de nuevo.';

            return view('Users.editpassword', [
                'User' => $user,
                'Message' => $Message
            ]);
        }
        else
        {
            $user->password = bcrypt($request->get('password'));
            $user->save();
            return redirect('/users')->with('info_password', 'La contraseña fue actualizada correctamente.');
        }

    }


}
