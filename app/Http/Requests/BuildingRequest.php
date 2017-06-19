<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
{
    /*
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /*
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'building_name'  => 'required|min:5|max:100',
            'building_price' => 'required|integer|min:3',
            'building_rent' => 'required|integer',
            'building_area' => 'required|integer|min:2|max:2500',
            'building_type' => 'required|integer',
//            'building_small_description' => 'required|min:5|max:160',
            'building_meta' => 'required|min:5|max:200',
            'building_longitude' => 'required|numeric',
            'building_latitude'  => 'required|numeric',
            'building_large_description' => 'required|min:5',
            'rooms'  => 'required|integer',
//            'status' => 'required|integer',
            'image' => 'mimes:png,jpg,jpeg',
        ];
    }
}
