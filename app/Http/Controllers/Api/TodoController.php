<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = Todo::create($request->all());
        return response()->json(['message' => 'Record created successfully', 'todo' => $todo], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::find($id);
        if ($todo) {
            return response()->json($todo);
        } else {
            return response()->json(['message' => 'List not found'], 404);
            // return response('List not found', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $todo = Todo::findOrFail($id);
        if ($todo) {
            $todo->update($request->all());
            return response()->json(['message' => 'Record updated successfully', 'todo' => $todo]);
        } else {
            return response()->json(['message' => 'List not found'], 404);
        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        if ($todo) {
            $todo->delete();
            return response()->json("Record deleted successfully", 200);
        } else {
            return response()->json(['message' => 'List not found'], 404);
        }

    }
}
