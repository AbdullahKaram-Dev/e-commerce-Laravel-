<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'product_name'=>'required|min:4|max:200|string',
            'product_image'=>'required|image|max:3000',
            'product_price'=>'required|min:1|max:1000000|numeric',
            'category_id'=>'required|exists:categories,id',
            'status'=>'required|in:1,0',
        ];
    }
}
