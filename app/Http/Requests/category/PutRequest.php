<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        //dd($this->o-route("post")->id);
        return [
            'title' =>'required|min:5|max:500',
            'slug' =>'required|min:5|max:500|unique:categories,slug,'.$this->route("category")->id,
        ];
    }
}
