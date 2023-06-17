<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'hotel_id' => 'required|integer|exists:hotels,id',
            'room_id' => 'required|integer|exists:rooms,id',
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
            'type' => 'required|string',
        ];
    }
}
