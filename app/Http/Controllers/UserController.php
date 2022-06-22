<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

//Controller per le funzionalità dell'utente User

class UserController extends Controller
{
    public function __construct() {
        //attivazione del middleware
        $this->middleware('can:isUser');
    }

    //Action per la modifica del profilo
    public function updateProfile(Request $request)
    {
        $user = User::find($request->get('id'));

        //validazione della richiesta
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max: 255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
        ]);

        //aggiornamento degli attributi dello User
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->city = $request->city;
        $user->street = $request->street;
        $user->number = $request->number;
        $user->date = $request->date;
        $user->email = $request->email;
        $user->occupation = $request->occupation;
        $user->cap = $request->cap;

        $user->save();

        return redirect('/profile');
    }


    //Action per la modifica della password
    public function updatePassword(Request $request)
    {
        $user = User::find($request->get('id'));

        //validazione della richiesta
        $this->validate($request, [
            'newPassword' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = Hash::make($request->newPassword); //aggiornamento dell'attributo password
        $user->save();

        return redirect('/');
    }
}
