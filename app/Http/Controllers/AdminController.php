<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\User;
use Illuminate\Support\Facades\Hash;

//Controller per le funzionalità dell'utente Admin

class AdminController extends Controller
{
    protected $_adminModel;
    public function __construct() {

        //attivazione del middleware
        $this->middleware('can:isAdmin');

        //instanziazione del Application Model
        $this->_adminModel = new Admin;
    }


    //Action del controller che ritorna la vista con l'elenco degli utenti per l'eliminazione
    public function usersToDelete() {
        $users = $this->_adminModel->getUsers();
        return view('admin.usersList')
                        ->with('users', $users);

    }


    //Action del controller per cancellare gli utenti selezionati
    public function deleteUsers(Request $request) {

        //validiamo la richiesta
        $request->validate([
            'id' => 'required'
        ]);

        $ids = $request->id;
        foreach($ids as $id)
        {
            User::find($id)->delete(); //cancellazione dell'utente
        }

        return redirect('/');
    }


    //Action per salvare l'utente staff inserito
    public function storeStaff(Request $request) {

        //validazione della richiesta
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max: 255'],
            'username' => ['required', 'string', 'min:8', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = "staff";

        $user->save();

        return redirect('/');
    }


    //Action che restituisce la lista con gli utenti Staff per l'eventuale cancellazione
    public function staffToDelete() {
        $staff = $this->_adminModel->getStaff();
        return view('admin.staffListToDelete')
                        ->with('staff', $staff);

    }


    //Action per la cancellazione dell'utente Staff selezionato
    public function deleteStaff(Request $request) {

        //La validazione viene effettuata anche lato client, manteniamo comunque la validazione lato server
        $request->validate([
            'id' => 'required'
        ]);

        User::find($request->get('id'))->delete();
        return redirect('/');
    }


    //Action che restituisce la lista con gli utenti Staff per l'eventuale modifica
    public function staffToModify() {
        $staff = $this->_adminModel->getStaff();
        return view('admin.staffListToModify')
                        ->with('staff', $staff);
    }


    //Action che resituisce la vista con la form per la modifica dell'utente Staff selezionato
    public function modifyStaff(Request $request) {

        //La validazione viene effettuata anche lato client, manteniamo comunque la validazione lato server
        $request->validate([
            'id' => 'required'
        ]);

        $staff = User::find($request->get('id'));

        return view('admin.modifystaff') //View da aggiungere!
                        ->with('staff', $staff);
    }


    //Action che salva le modifiche effettuate all'utente Staff
    public function storeModifiedStaff(Request $request)
    {

        //validazione della richiesta
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max: 255'],
        ]);

        $user = User::find($request->get('id'));

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->save();

        return redirect('/');
    }


    //Action  per salvare la password modificata dell'utente Staff
    public function updateStaffPassword(Request $request)
    {
        //validazione della richiesta
        $this->validate($request, [
            'newPassword' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find($request->get('id'));
        $user->password = Hash::make($request->newPassword);
        $user->save();

        return redirect('/');
    }

}
