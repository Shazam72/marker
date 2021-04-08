<?php

namespace App\Http\Controllers;

extension_loaded('pdo_pgsql');

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function formsHandler()
    {
        if (request()->method() == 'GET') {
            if (request()->getRequestUri() == '/login') {
                return view('general.form')->with([
                    'login' => true
                ]);
            } elseif (request()->getRequestUri() == '/logup') {
                $existSuperAdmin = $this->existSuperAdmin();
                if ($existSuperAdmin == true)
                    return  view('general.form')->with([
                        'logup_form' => true,
                        'roles' => Role::all()->toArray()
                    ]);
                else
                    return view('general.form')->with([
                        'admin_form' => true
                    ]);
            }
        } else if (request()->method() == "POST") {
            if (request()->getRequestUri() == '/login') {
                $validator = Validator::make(request()->all(), [
                    'email' => 'email|required',
                    'password' => 'password|confirmed|min:8|required',
                    'password_confirmation' => 'password|min:8|required',
                ]);
                if ($validator->fails())
                    return json_encode($validator->errors());
            } elseif (request()->getRequestUri() == '/logup') {
                $validator = Validator::make(request()->all(), [
                    "nom" => 'required',
                    "prenom" => 'required',
                    'email' => 'email|required',
                    'password' => 'password|confirmed|min:8|required',
                    'password_confirmation' => 'password|min:8|required',
                    'date' => 'date|required',
                    'role' => 'required'
                ]);
                if ($validator->fails())
                    return json_encode($validator->errors());
                else {
                    
                }
            } elseif (request()->getRequestUri() == '/admin') {
                if (!$this->existSuperAdmin())
                    return 'errors.unauthorized';
                $validator = Validator::make(request()->all(), [
                    "nom" => 'required',
                    "prenom" => 'required',
                    'email' => 'email|required',
                    'password' => 'password|confirmed|min:8|required',
                    'password_confirmation' => 'password|min:8|required',
                    'date' => 'date|required',
                ]);
                if ($validator->fails())
                    return json_encode($validator->errors());
                else {
                    User::create([
                        "nom" => request('nom'),
                        "prenom" =>  request('prenom'),
                        'email' =>  request('email'),
                        'password' =>  bcrypt(request('password')),
                        'date' =>  request('date'),
                    ]);
                    return json_encode([
                        "links"=>route('login'),
                        "msg"=>'saved'
                    ]);
                }
            }
        }
    }

    public function existSuperAdmin()
    {
        if (User::where('role_id', "1")->first() == null)
            return false;
        else
            return true;
    }
}
