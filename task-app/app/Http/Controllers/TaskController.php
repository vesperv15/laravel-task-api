<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // tüm görevlerin listelenmesi
    public function index()
    {
        return response()->json(Task::latest()->get());
    }

    // yeni görev ekleme
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required/string/max:255',
            'description' => 'nullable/string',
        ]);

        $task = Task::create($validated);

        return response()->json($task, 201);
    }

    // tek bir görevi getir

    public function show(Task $task)
    {
        return response()->json($task);
    }

    // görevi guncelle tamamlandı ya da baslıgı değiştirir
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'sometimes|boolean',
        ]);

        $task->update($validated);

        return response()->json($task);
    }

    //görevi sil
    public function destroy( Task $task)
    {
        $task->delete();

        return response()->json([ 'message' => 'görev silindi']);
    }
}
