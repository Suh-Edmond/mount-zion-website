<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdmissionApplicantionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'telephone' => ['required', 'string'],
            'region'   =>  ['required', 'string'],
            'address' => ['required', 'string'],
            'admission_year_id' => ['required', Rule::exists('admission_years', 'id')],
            'program_id' => ['required', Rule::exists('programs', 'id')],
            'school_id' => ['required', Rule::exists('schools', 'id')],
            'has_agreed' => 'required'
        ];
    }
}
