<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required",
            "category" => "required",
<<<<<<< HEAD
=======
            // "image" => "required",
>>>>>>> 4d8ad6bf2cefafe93aa4e7674aa245c2b0635100
            "price" => "required",
            "language" => "required",
            "duration" => "required",
            "description" => "required"
        ];
    }
}
