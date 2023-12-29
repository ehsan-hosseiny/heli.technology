<?php

namespace App\Rules;


use App\Models\Task;
use Illuminate\Contracts\Validation\Rule;

class ValidateTaskId implements Rule
{


    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(private int $taskId)
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
         return Task::where(['id'=>$this->taskId,'user_id'=>auth()->user()->id])->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('common.not_exists',['name'=>'id']);
    }
}
