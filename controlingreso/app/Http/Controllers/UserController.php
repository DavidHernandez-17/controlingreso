<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:user.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('Users.index', [
            'User' => $users
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
            'role' => 'required',
            'area' => 'required'
        ],[
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe contener mínimo 5 caracteres',
            'email.required' => 'El correo electrónico es requerido',
            'email.unique' => 'El correo electrónico ya existe, inténtelo de nuevo',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La clave debe contener mínimo 6 caracteres',
            'role.required' => 'El rol es obligatorio',
            'area.required' => 'El área es obligatoria'
        ]);

        $date = Carbon::now('America/Bogota');

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->created_at = $date;
        $user->updated_at = $date;
        $user->area = strtoupper($request->get('area'));
        $user->assignRole($request->role);
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
            'role' => 'required',
            'area' => 'required'
        ],[
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe contener mínimo 5 caracteres',
            'email.required' => 'El correo electrónico es requerido',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La clave debe contener mínimo 6 caracteres',
            'role.required' => 'El rol es obligatorio',
            'area.required' => 'El área es obligatoria'
        ]);

        $date = Carbon::now('America/Bogota');

        $user = User::findOrfail($id);
        $user->name = $request->get('name');
        $user->updated_at = $date;
        $user->area = strtoupper($request->get('area'));
        $user->roles()->sync($request->role);
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

        return redirect('/users')->with('info', 'El usuario fue eliminado correctamente');
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
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña debe contener mínimo 6 dígitos.'
        ]);

        $user = User::findOrfail($id);

        if($request->password != $request->confirm_password)
        {
            $Message = 'Las contraseñas no coinciden, inténtelo de nuevo.';

            return view('Users.editpassword', [
                'User' => $user,
                'Message' => $Message
            ]);
        }
        else
        {
            $user->password = bcrypt($request->get('password'));
            $user->save();
            return redirect('/users')->with('info', 'La contraseña fue actualizada correctamente.');
        }

    }


}
