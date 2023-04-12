<?php

namespace App\Http\Requests\Api;

class CreateService extends ApiRequest
{
    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    // protected function validationData()
    // {
    //     return $this->get('service') ?: [];
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            // 'description' => 'required|string|max:255',
            // 'body' => 'required|string',
            'sports' => 'sometimes|array',
        ];
    }
}