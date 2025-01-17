<?php

namespace Cebugle\Totem\Tests\Feature;

use Cebugle\Totem\Task;
use Cebugle\Totem\Tests\TestCase;

class ViewTaskTest extends TestCase
{
    /** @test */
    public function user_can_view_task()
    {
        $this->signIn();
        $task = Task::factory()->create();
        $response = $this->get(route('totem.task.view', $task));
        $response->assertStatus(200);
        $response->assertSee($task->description);
        $response->assertSee('Cebugle\Totem\Console\Commands\ListSchedule');
        $response->assertSee($task->expression);
    }

    /** @test */
    public function guest_can_not_view_task()
    {
        $task = Task::factory()->create();
        $response = $this->get(route('totem.task.view', $task));
        $response->assertStatus(403);
    }
}
