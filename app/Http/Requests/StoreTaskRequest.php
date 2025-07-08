<?php

namespace App\Http\Requests;

use App\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
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
            'title' => ['required'],
            'description' => ['required'],
            'deadline' => ['required', 'date','after:yesterday'],
            'status' => ['required', Rule::enum(TaskStatusEnum::class)],
            'user_id' => ['required', Rule::exists('users','id')],
            'client_id' =>['required', Rule::exists('clients','id')],
            'project_id'=>['required', Rule::exists('projects','id')],
        ];
    }
}
