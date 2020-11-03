<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class BaseTodoRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required|min:5'
        ];
    }

}
