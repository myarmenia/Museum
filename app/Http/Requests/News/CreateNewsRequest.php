<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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


            'description.*' => 'required',
            'title.*' => 'required',
            'photo' => 'nullable|image',
        ];
    }
    public function messages(): array
    {
        return [
          'title.*'=>'Վերնագրի դաշտը պարտադիր է:',
          'description.*'=>'Տեքստի դաշտը պարտադիր է:',
          'photo'=>'Լուսանկարի դաշտը պարտադիր է:'
        ];
    }

}
