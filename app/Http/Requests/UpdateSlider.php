<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSlider extends FormRequest
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
            'description1'=>'required|min:4|max:200|string',
            'description2'=>'required|min:4|max:200|string',
            'slider_image'=>'image|max:3000',
            'status'=>'required|in:1,0',
        ];
    }
}
