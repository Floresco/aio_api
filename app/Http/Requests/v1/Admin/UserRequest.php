<?php

namespace App\Http\Requests\v1\Admin;

use Illuminate\Validation\Rule;

class UserRequest extends \App\Http\Requests\UserRequest
{
    public function rules(): array
    {
        $old_rules = parent::rules();
         $old_rules['user_profil_id'] = ['required', 'uuid', Rule::exists('user_profils', 'id')];
         return $old_rules;
    }

    public function authorize(): bool
    {
        return true;
    }
}
