<?php

namespace App\Http\Requests;

use App\Models\Task;
use App\Rules\ValidateTaskId;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
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
        $statuses = implode(',', [Task::STATUS_IN_PROGRESS, Task::STATUS_COMPLETE]);
        $taskId = $this->route('id');

        $rules["status"] = ['required','in:' . $statuses,new ValidateTaskId($taskId)];


        return $rules;


    }

    public function messages()
    {
        return [
            'task.required' => __('common.is_required', ['name' => __('fields.task')]),
            'task.in' => __('common.invalid', ['name' => __('fields.task')]),
            'id.exists' =>  __('common.not_exists', ['name' => __('fields.id')]),
        ];
    }
}
