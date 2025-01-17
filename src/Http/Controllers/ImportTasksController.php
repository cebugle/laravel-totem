<?php

namespace Cebugle\Totem\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Cebugle\Totem\Contracts\TaskInterface;
use Cebugle\Totem\Http\Requests\ImportRequest;

class ImportTasksController extends Controller
{
    /**
     * @var TaskInterface
     */
    private TaskInterface $tasks;

    /**
     * ImportTasksController constructor.
     *
     * @param  TaskInterface  $tasks
     */
    public function __construct(TaskInterface $tasks)
    {
        parent::__construct();

        $this->tasks = $tasks;
    }

    /**
     * Import tasks from a json file.
     *
     * @param  ImportRequest  $request
     *
     * @throws FileNotFoundException
     */
    public function index(ImportRequest $request)
    {
        $this->tasks->import($request->validated());
    }
}
