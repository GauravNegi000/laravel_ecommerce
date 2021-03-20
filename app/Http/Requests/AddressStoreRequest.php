<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
            'city' => 'required',
            'name'    => 'required|alpha|max:100',
            'address'    => 'required|max:100',
            'postal_code'    => 'required|alpha_dash|max:50',
            'mobile'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:20',
            'landmark'    => 'required|alpha|max:50',
        ];
    }
}
