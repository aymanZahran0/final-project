<?php

namespace App\Http\Requests;

use HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class RestaurantBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
//            'tourist_id' => 'required|integer',
            'restaurant_id' => 'required|integer',
            'people_count' => 'required|integer',
            'booking_date' => 'required|date|date_format:Y-m-d H:i:s'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'validation error',
            'errors' => $validator->errors(),
        ]));
    }
}
