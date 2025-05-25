<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateEventRequest extends FormRequest
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
            'about'       => 'required|string|max:500',
            'title'       => 'required|string|max:255|min:10',
            'location'    => 'required|string|max:255',
            'venue'       => 'required|string|max:255',
            'phone'       => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'website'     => 'string',
            'event_time'    => 'required|date_format:H:i:s',
            'event_date'    => 'required|date'
        ];
    }
}
