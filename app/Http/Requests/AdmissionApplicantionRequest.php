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
            'last_name' => ['required', 'string', 'max:255', 'min:3'],
            'first_name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'telephone' => ['required', 'string'],
            'region'   =>  ['required', 'string'],
            'pob' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'program_id' => ['required', Rule::exists('programs', 'id')],
            'school_id' => ['required', Rule::exists('schools', 'id')],
            'has_agreed' => ['required'],
            'id_card' => 'required|max:4096',
            'hnd_cert' => 'max:4096',
            'hnd_cert' => 'max:4096'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'The first name field is required!',
            'first_name.string' => 'The first name field must be a string!',
            'first_name.max' => 'The first name field is must have at most :max characters!',
            'first_name.min' => 'The first name field is must have at least :min characters!',
            'last_name.required' => 'The last name field is required!',
            'last_name.string' => 'The last name field must be a string!',
            'last_name.max' => 'The last name field is must have at most :max characters!',
            'last_name.min' => 'The last name field is must have at least :min characters!',
            'pob.required' => 'The place of birth is required!',
            'pob.string' => 'The place of birth must be a string!',
            'pob.max' => 'The place of birth must have at most :max characters!',
            'dob.required' => 'The date of birth is required!',
            'dob.date' => 'The date of birth must be a valid date!',
            'program_id.required' => 'The program field is required!',
            'school_id.required' => 'The school field is required!',
            'has_agreed.required' => 'You must agreed to our privacy policy',
            'id_card.required' => 'The ID Card/Passport field is required!',
            'id_card.max' => 'The ID Card/Passport field must be at most 3MB in size!',
            'hnd_cert.max' => 'The HND Certificate file field must be at most 3MB in size!',
            'hnd_cert.max' => 'The GCE AL Certificate file field must be at most 3MB in size!'
            
        ];
    }
}
