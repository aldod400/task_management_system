<?php

namespace App\Http\Controllers;

use App\Traits\GeneralResponse;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    use GeneralResponse;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'status'      => 'nullable | in:completed,pending',
            'priority'    => 'nullable | in:low,medium,high',
            'category' => 'nullable | exists:categories,name',
        ]);

        $query = Task::with('category');

        if ($request->has('status')) {
            $query->where('completed', $request->status === 'completed' ? true : false);
        }

        if ($request->has('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->has('category') && $request->category !== 'all') {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->category);
            });
        }
        if ($request->has('sort') && in_array($request->sort, ['asc', 'desc'])) {
            $query->orderBy('due_date', $request->sort);
        }

        $tasks = $query->paginate(10)->items();

        return $this->returnSuccess(200, 'Success', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::with('category')->find($id);
        if (!$task)
            return $this->returnError(404, 'Not Found');
        return $this->returnSuccess(200, 'Success', ["tasks" => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
