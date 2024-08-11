<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyJobRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'salary' => ['required', 'integer'],
            'company_id' => ['required', 'integer'],
            'category_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'skill_level' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'thumbnail' => ['required', 'image', 'mimes:png, jpg, jpeg'],
            'responsibilities .* ' => 'required|string |max:255',
            'qualifications .* ' => 'required|string|max:255',
            'about' => ['required', 'string', 'max:65535'],
        ];
    }
}
