<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    public function attributes(): array
    {
        return [
            'title' => 'Sarlavha',
            'short_content' => 'Qisqa sarlavha',
            'content' => 'Maqola',
            'photo' => 'Rasm',
        ];
    }
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required",
            "user_id" => "required",
            "category" => "required",
            "short_content" => "required",
            "content" => "required",
            "photo" => "nullable|image|max:2048"
        ];
    }
}
