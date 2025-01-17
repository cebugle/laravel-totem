<?php

namespace Cebugle\Totem\Tests\Feature;

use Cebugle\Totem\Task;
use Cebugle\Totem\Tests\TestCase;

class EditTaskTest extends TestCase
{
    /** @test */
    public function user_can_view_edit_task_form()
    {
        $this->disableExceptionHandling()->signIn();
        $task = Task::factory()->create();
        $response = $this->get(route('totem.task.edit', $task));
        $response->assertStatus(200);
        $response->assertSee($task->description);
        $response->assertSee($task->expression);
    }

    /** @test */
    public function guest_can_not_view_edit_task_form()
    {
        $task = Task::factory()->create();
        $response = $this->get(route('totem.task.edit', $task));
        $response->assertStatus(403);
    }

    /** @test */
    public function user_can_edit_task()
    {
        $this->disableExceptionHandling()->signIn();
        $task = Task::factory()->create();
        $response = $this->post(route('totem.task.edit', $task), [
            'description'         => 'List All Scheduled Commands',
            'command'             => 'Cebugle\Totem\Console\Commands\ListSchedule',
            'type'                => 'cron',
            'expression'          => '5 * * * *',
        ]);

        $response->assertSessionHas('task');
        $response->assertRedirect(route('totem.task.view', $task));
    }
}
