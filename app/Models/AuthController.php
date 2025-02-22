<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Model
{
    public function showLoginForm()
    {
        if(session('name') && session('email')){
            return redirect()->to('/');
        }
        
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function rules(Request $req){

    $name = $req->name; 
    $email = $req->email;
    $password = $req->password;


        
    $validated = $req->validate([ 
        'name' => "required|min:10|max:200",
        'email' => "required|min:10|max:100",
        'password' => "required|min:15|max:50"
      ], [
          'name.required' => "O nome é obrigatorio",
          'name.min' => "Minimo de :min caracteres",
          'name.max' => "Maximo de :max caracteres",
          'email.required' => "O email obrigatorio",
          'email.min' => "O email é curto",
          'password.min' => "Senha curta. Minimo de :min caracteres",
          'password.max' => "Senha muito grande. Maximo de :max caracteres",
  
  
      ]);

      DB::table('users')->insert([
        'name' => $name,
        'email' => $email, 
         'password' => bcrypt($password),
          'active' => 1,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),

      ]);

      return redirect('login')->with('success', 'Usuario cadastrado');

    }

    public function authLogin(Request $req){

  
      
        $email = $req->email;
        $password = $req->password; 

      
        $user = DB::table('users')->select('id','name', 'email', 'password')->where('email', '=', $email)->first();
   
  



        if ($user && $user->email === $email && Hash::check($password, $user->password)) {


            $req->session()->put([
                'name' => $user->name,
                'email' => $user->email,
                'id' => $user->id

            ]);          

           
        
           session()->put('logged', true);
        

        
           return redirect()->to('/')->with('logged', 'login with success');

        } else{

            return redirect()->to('/login')->with('erorr', 'Error');

        }



    }

   
 
}
