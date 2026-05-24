<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreSupportContributionRequest extends FormRequest
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
            'phone' => ['required', 'string', 'max:20'],
            'nominal' => ['required', 'integer', 'min:1'],
            'proof_image' => ['nullable', File::image()->max(4 * 1024)],
        ];
    }

    protected function prepareForValidation(): void
    {
        $nominal = preg_replace('/[^0-9]/', '', (string) $this->nominal);

        $this->merge([
            'name' => trim((string) $this->name),
            'phone' => trim((string) $this->phone),
            'nominal' => $nominal === '' ? null : (int) $nominal,
        ]);
    }
}
