<?php

namespace App\Http\Requests\ApiRequest\PollRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePollRequest extends FormRequest
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
        return [
            'id' => 'integer',
            'title' => 'required|unique:polls|max:100',
            'description' => 'required',
            'date_start' => 'required|date',
            'user_id' => 'required|integer|exists:users,id'
        ];

    }
}
