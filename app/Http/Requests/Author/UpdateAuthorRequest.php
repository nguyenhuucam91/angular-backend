<?php

namespace App\Http\Requests\Author;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdateAuthorRequest extends BaseFormRequest
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
            'name' => ['required', Rule::unique('authors', 'name')->ignore($this->id)]
        ];
    }
}
