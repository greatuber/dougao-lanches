<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' =>['required'],
            'description' => ['required'],
            'price' => ['required'],
            'category_id' => []
        ];

   
    }
    public function messages()
    {
       return [
            'name.required' => 'O campo produto é obrigatorio',
            'description.required'=> 'O campo Descrição é obrigatorio',
            'price.required' => 'O campo preço é obrigatorio',
            'category_id.required' => 'Escolha uma categoria'
    
           ];
    }

}
