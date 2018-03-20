<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
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
            'guest_name' => 'required|min:2',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
            'checkin_time' => 'required',
            'checkout_time' => 'required',
        ];
    }
}
