<?php
namespace App\Http\Controllers;
extension_loaded('pdo_pgsql');

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
            }
        } else if (request()->method() == "POST") {
            if (request()->getRequestUri() == '/login') {
                $validator = Validator::make(request()->all(), [
                    'email' => 'email|required',
                    'password' => 'password|confirmed|min:8|required',
                    'password_confirmation' => 'password|min:8|required',
                ]);
                if($validator->fails())
                    return json_encode($validator->errors());

                
                
            }
        }
    }
}
