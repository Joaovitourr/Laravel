<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    //

    use HasFactory; 

    protected $table = 'userstickets';

    protected $fillable = ['user_id', 'description', 
    'created_at', 'updated_at', 'closed_at'];
    

    public function user() {  // Nome do relacionamento: 'user' (singular)
        return $this->belongsTo(User::class, 'user_id'); // Tipo: belongsTo, Model relacionado: User::class, Chave estrangeira: 'user_id'
    }

}
