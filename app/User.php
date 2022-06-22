<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'occupation', 'street', 'city', 'cap', 'number', 'date', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'username'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRole($role) {          //metodo che aggiungiamo noi, lo usiamo nei gati di authproviders (prende come parametro il valore di un ruolo)
        $role = (array)$role;  //lo trasformiamo in un array (perchè gli passiamo anche un array)
        return in_array($this->role, $role); //verifica se l'attributo role dell'utente corrente è contenuto tra i ruoli che sono quelli che chi ha attivato la funzione hasRole ha passato
    }
}
