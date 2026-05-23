<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreTributeRequest extends FormRequest
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
     * @return array<string, array<int, File|string>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'relations' => ['required', 'array', 'min:1'],
            'relations.*' => ['required', 'string', 'in:Teman,Saudara,Rekan kerja,Tetangga,Lainnya'],
            'relation_other' => ['nullable', 'string', 'max:80'],
            'message' => ['required', 'string', 'max:2000'],
            'photos' => ['nullable', 'array', 'max:3'],
            'photos.*' => ['nullable', File::image()->max(4 * 1024)],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => trim((string) $this->name),
            'message' => trim((string) $this->message),
        ]);
    }
}
