<?php

namespace App\Console\Commands;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateCompletedTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update tasks to completed status if 2 days have passed since creation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tasks = Task::where('status', '!=', 'complete')
            ->whereDate('created_at', '<=', Carbon::now()->subDays(2)->toDateString())
            ->get();

        foreach ($tasks as $task) {
            $task->update(['status' => 'complete']);
        }

        $this->info('Task statuses updated successfully.');
    }
}
