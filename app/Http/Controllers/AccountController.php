<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

namespace App\Http\Controllers;



use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
                    'email' => ['required', 'email'],
                    'password' => ['required', 'confirmed', 'min:8',],
                    'password_confirmation' => ['required', 'min:8'],
                ]);
                if ($validator->fails())
                    return json_encode($validator->errors());


                if (request('tel')) {
                    $login = Auth::attempt([
                        'tel' => request('tel'),
                        'password' => request('password')
                    ]);
                } else {
                    $login = Auth::attempt([
                        'email' => request('email'),
                        'password' => request('password')
                    ]);
                }
                if ($login) {
                    return json_encode([
                        'link' => route(auth()->user()->role->role . '_home'),
                        'msg' => 'connected'
                    ]);
                }


                //fonctionalité d'inscription individuelle à gérer plus tard

                // } elseif (request()->getRequestUri() == '/logup') {
                //     $validator = Validator::make(request()->all(), [
                //         "nom" => ['required'],
                //         "prenom" => ['required'],
                //         'tel' => ['required', 'numeric', 'min:8'],
                //         'email' => ['required', 'email'],
                //         'password' => ['required', 'confirmed', 'min:8',],
                //         'password_confirmation' => ['required', 'min:8'],
                //         'date' => ['required', 'date'],
                //         'role' => ['required']
                //     ]);
                //     if ($validator->fails())
                //         return json_encode($validator->errors());
                //     else {
                //         $alreadyInDB = User::where('email', null, request('email'), 'or')->where('tel', str_replace(' ', '', request('tel')))->first();
                //     }
            } elseif (request()->getRequestUri() == '/admin') {
                if ($this->existSuperAdmin())
                    return 'errors.unauthorized';
                $validator = Validator::make(request()->all(), [
                    "nom" => ['required'],
                    "prenom" => ['required'],
                    'tel' => ['required', 'numeric', 'min:8'],
                    'email' => ['required', 'email'],
                    'password' => ["required", 'confirmed', 'min:8',],
                    'password_confirmation' => ['required', 'min:8'],
                    'date' => ['required', 'date'],
                ]);
                if ($validator->fails())
                    return json_encode($validator->errors());
                else {
                    User::create([
                        "nom" => request('nom'),
                        "prenom" =>  request('prenom'),
                        'email' =>  request('email'),
                        'password' =>  bcrypt(request('password')),
                        'date_naissance' =>  request('date'),
                        'tel' => str_replace(' ', '', request('tel')),
                        'role_id' => "1"
                    ]);
                    return json_encode([
                        "link" => route('login'),
                        "msg" => 'saved'
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
