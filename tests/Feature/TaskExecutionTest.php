<?php

namespace Cebugle\Totem\Tests\Feature;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Event;
use Cebugle\Totem\Events\Executed;
use Cebugle\Totem\Events\Executing;
use Cebugle\Totem\Providers\ConsoleServiceProvider;
use Cebugle\Totem\Result;
use Cebugle\Totem\Task;
use Cebugle\Totem\Tests\TestCase;

class TaskExecutionTest extends TestCase
{
    /** @test */
    public function it_runs_a_scheduled_task()
    {
        $task = Task::factory()->create();

        Event::fake();

        $scheduler = $this->app->get(Schedule::class);
        $this->app->resolveProvider(ConsoleServiceProvider::class)
            ->schedule($scheduler);

        $scheduler->events()[0]
            ->run($this->app);

        $this->assertEquals(1, Result::count());

        $result = Result::first();
        $this->assertEquals($task->id, $result->task_id);

        Event::assertDispatched(Executing::class);
        Event::assertDispatched(Executed::class);
    }

    /** @test */
    public function it_executes_a_scheduled_task()
    {
        $task = Task::factory()->create();

        Event::fake();

        $this->signIn()
            ->get(route('totem.task.execute', $task->id))
            ->assertSuccessful();

        $this->assertEquals(1, Result::count());

        $result = Result::first();
        $this->assertEquals($task->id, $result->task_id);

        Event::assertDispatched(Executed::class);
    }
}
