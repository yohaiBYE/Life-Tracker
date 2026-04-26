<?php

namespace App\Http\Controllers;

use App\Models\HomeworkTask;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHomeworkTaskRequest;
use App\Http\Requests\UpdateHomeworkTaskRequest;

class HomeworkTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homeworkTasks = auth()->user()
            ->homeworkTasks()
            ->latest('due_date')
            ->paginate(20);

        return view('homework_tasks.index', compact('homeworkTasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('homework_tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeworkTaskRequest $request)
    {
        auth()->user()->homeworkTasks()->create(
            $request->validated()
        );

        return redirect()
            ->route('homework_tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeworkTask $homeworkTask)
    {
        $this->authorize('view', $homeworkTask);

        return view('homework_tasks.show', compact('homeworkTask'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeworkTask $homeworkTask)
    {
        $this->authorize('update', $homeworkTask);

        return view('homework_tasks.edit', compact('homeworkTask'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeworkTaskRequest $request, HomeworkTask $homeworkTask)
    {
        $this->authorize('update', $homeworkTask);

        $homeworkTask->update(
            $request->validated()
        );

        return redirect()
            ->route('homework_tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeworkTask $homeworkTask)
    {
        $this->authorize('delete', $homeworkTask);

        $homeworkTask->delete();

        return redirect()
            ->route('homework_tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
