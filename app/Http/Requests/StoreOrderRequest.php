<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreOrderRequest extends Request
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
            // client
            'name'          => 'required|max:200',
            'address'       => 'max:250',
            'nip'           => 'max:15',
            'telephone'     => 'required|max:50',
            // car
            'make'          => 'required|max:100',
            'model'         => 'required|max:100',
            'license_number' => 'required|max:10',
            'year'          => 'max:10',

            'engine_size'   => 'max:5',
            'radio_code'    => 'max:4',
            'vin'           => 'required|max:17',
            //'odometer' => 'max:10',
            // order
            'number'        => 'required|unique:orders|max:20',
            'date'          => 'date_format:Y-m-d',
            'symptoms'      => 'max:5000',
        ];
    }
}
