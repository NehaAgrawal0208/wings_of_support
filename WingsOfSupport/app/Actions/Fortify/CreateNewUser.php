<?php

namespace App\Actions\Fortify;

use App\Models\Homeowner;
use App\Models\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            'phone' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $registeras = $input['registeras'] == 'provider' ? 'provider':'customer';



        $user = User::create([
            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'utype' => $registeras
        ]);

        if($registeras == 'provider')
        {
            ServiceProvider::create([
                'user_id' => $user->id
            ]);
        }
        elseif($registeras == 'customer')
        {
            Homeowner::create([
                'user_id' => $user->id
            ]);
        }

        return $user;
    }
}
