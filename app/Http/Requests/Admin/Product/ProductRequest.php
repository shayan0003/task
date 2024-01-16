<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if($this->isMethod('post')){
            return [
                'name' => 'required|max:120|min:2',
                'description' => 'required|max:300|min:5',
                'category_id' => 'required|min:1|regex:/^[0-9]+$/u|exists:categories,id',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'price' => 'required|numeric',
                'status' => 'required|numeric|in:0,1',

            ];
        }
        else{
            return [
                'name' => 'required|max:120|min:2',
                'description' => 'required|max:300|min:5',
                'category_id' => 'required|min:1|regex:/^[0-9]+$/u|exists:categories,id',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'price' => 'required|numeric',
                'status' => 'required|numeric|in:0,1',
            ];
        }

    }
}
