<?php

namespace Afnan\Package;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class PasswordValidator implements Rule
{
    public function passes($attribute, $value)
    {
        // Define the validation rules for the password
        $rules = [
            'min:8',          // Minimum length of 8 characters
            'regex:/[A-Z]/', // At least one uppercase letter
            'regex:/[a-z]/', // At least one lowercase letter
            'regex:/[0-9]/', // At least one digit
            'regex:/[@$!%*#?&]/', // At least one special character
            //'uncompromised', // Check against Have I Been Pwned database
        ];

        // Create a validation instance and check if the password passes all the rules
        $validator = Validator::make([$attribute => $value], [
            $attribute => $rules,
        ]);

        return !$validator->fails();
    }

    public function message()
    {
        return 'The :attribute must be at least 8 characters,upper case,lowercase,digit,special character.';
    }
}
