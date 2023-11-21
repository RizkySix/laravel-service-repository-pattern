<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnimeFanArtRequest extends FormRequest
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
            'character_name' => 'required|string',
            'preview_image' => 'required|array',
            'preview_image.*' => 'required|array',
            'preview_image.*.image' => 'required|file|mimes:jpg,jpeg,png,gif|max:5100',
            'preview_image.*.short_description' => 'required|string',
            'complete_file' => 'required|string',
            'categories' => 'required|array',
            'categories.*' => 'required|numeric'
        ];
    }
}
