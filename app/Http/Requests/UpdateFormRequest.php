<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|min:1',
            'lastname' => 'required|min:1',
            'address' => 'required',
            'passportNumber' => 'required',
            'nationality' => 'required',
            'dob' => 'required|date',
            'checkInDate' => 'required|date',
            'checkOutDate' => 'required|date',
        ];
    }
}
