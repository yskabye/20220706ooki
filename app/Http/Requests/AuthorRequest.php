<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == '/' || $this->path() == 'add' ||
            $this->path() == 'get' || $this->path() == 'put' ||
            $this->path() == 'edit'  || $this->path() == 'delete') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
			'age' => 'integer|min:0|max:150',
			'nationality' => 'required'
        ];
    }
}
