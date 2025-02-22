<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required', 'string', 'min:6', 'confirmed'], 
        ], 
        [  
            'name.required' => 'O campo nome é obrigatorio',
            'name.string' => 'o nome nao é valido',
            'email.required' => 'Email obrigatorio',
            'email.email' => 'O campo de email deve ser valido',
            'email.uniqure' => 'o email informado ja esta em uso',
            'password.required' => 'A senha é obrigatoria',
            'password.min' => 'O campo senha deve ter no minimo :min caracteres',
            'password.confirmed' => 'As senhas sao diferentes'
        
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
