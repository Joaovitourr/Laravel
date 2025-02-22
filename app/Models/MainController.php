<?php

namespace App\Models;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Model
{
    
    public function index(){


       $idUserSession = session('id');

       if(!$idUserSession){
        return redirect()->route('login')->with('error', 'Usuario nao autenticado');
       }

       $tickets = UserTicket::where('user_id', $idUserSession)
       ->with('user')->get();


       

       return view('user.dashboard', ['tickets' => $tickets]);


    }

    
    public function chamadoView(): View{

        

        return view('user.statusChamado');
    }

    public function dashboardAdmin(){
        return view('admin.dashboard');
    }



}
