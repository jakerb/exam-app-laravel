<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExamRequest extends FormRequest
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
            'start' => 'required|date_format:Y-m-d\TH:i',
            'end' => 'required|date|after:start|date_format:Y-m-d\TH:i',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'minimum_score' => 'required|integer|min:0|max:100',
            'status' => 'required|in:active,inactive',
        ];
    }
}
