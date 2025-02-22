<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Model
{
    
    public function openTicket(Request $req){
    
        $titleTicket = $req->title_Ticket; 
        $descriptionTicket = $req->description_Ticket;
        $urgencyTicket = $req->urgency_Ticket;

        $validated = $req->validate([
            'title_Ticket' => 'required|min:20|max:200',
            'description_Ticket' => "required|min:50|max:400",
            'urgency_Ticket' => "required|min:1|max:1",
             

        ], [
            'title_Ticket.required' => "O titulo é obrigatorio",
            'title_Ticket.min' => "Titulo deve ter no minimo :min caracteres",
            'title_Ticket.max' => "Titulo deve ter no minimo :max caracteres",
            'description_Ticket.required' => "A descrição é obrigatoria",
            'description_Ticket.min' => "A descrição deve ter no minimo :min caracteres",
            'description_Ticket.max' => "A descrição deve ter no maximo :max caracteres",
            'urgency_Ticket' => "Digite um valor de 1 a 5"


        ]);

        $min = 100000; 
        $max = 2000000;

        $protocolo = rand($min, $max);

        DB::table('userstickets')->insert([
            'user_id' => session('id'),
            'title' => $titleTicket,
            'description' => $descriptionTicket,
            'priority' => $urgencyTicket,
            'created_at' => Carbon::now(),
            'protocolo' => $protocolo

            
        ]);

  
    
        return redirect()->to('/')->with('success', 'Sucesso');

    }


    public function setTicketsInfo(){

        $userTicketsInfo = DB::table('userstickets')->select('user_id', 'protocolo')
        ->where('closed_at', "!=", "")->get();

        return view('home', compact($userTicketsInfo));

    }
    
    public function called(Request $req){

        $userId = session('id');
        $protocolo = $req->protocolo; 

        $user = DB::table('userstickets')->select
        ('user_id','title', 'description', 'protocolo', 
        'priority', 'created_at', 'updated_at', 'closed_at')->
        where('user_id', '=', $userId)->get();

        // $user = UserTicket::with('user_id', 'title', 'description')->where('user_id', $userId);

        
       

        return view('user.statusChamado',['data'=> $user, 'protocolo' => $protocolo]);
        



    }
   


}
