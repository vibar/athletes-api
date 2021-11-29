<?php

namespace App\Http\Requests;

use App\Rules\NIFRule;

class UserRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public static function rules()
    {
        $rules =  [
            'name' => 'required',
            'email' => 'nullable|unique:users,email',
            'document' => ['nullable', 'integer', 'digits:9', 'unique:users,document', new NIFRule],
            'address' => 'nullable',
            'phone' => 'nullable|integer|digits:9',
            'birthdate' => 'nullable|date',
            'height' => 'nullable|integer|min:1|max:300',
            'weight' => 'nullable|integer|min:1|max:500',
            'notes' => 'nullable',
            'properties' => 'nullable|array',
            'category_id' => 'required|exists:categories,id',
        ];

        if ($id = request()->route('id')) {
            $rules['email'] .= ','.$id;
            $rules['document'][3] .= ','.$id;
        }

        return $rules;
    }
}
