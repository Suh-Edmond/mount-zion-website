<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Constant\ProgramType;

class CreateProgramRequest extends FormRequest
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
             'name'      => 'required|string|min:5|max:255',
            'about'     => 'required|string|min:100|max:5000',
            'tag'       => ['required',  Rule::in([ProgramType::HND, ProgramType::BACHELOR, ProgramType::SPECIAL_CARE]) ],
            'duration'  => ['required', 'min:1', 'max:5', 'numeric'],
            'image'     => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'school_slug'  => ['required', 'string', Rule::exists('schools', 'slug')]
        ];
    }
}
