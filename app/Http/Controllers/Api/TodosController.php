<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Filter\Api\OrdenationTodo;
use App\Rules\TodoContent;
use App\Rules\TodoType;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $ordenationTodo = new OrdenationTodo();
        $sortingCriterion = $ordenationTodo->getOrdenation($request);
        if (!empty($sortingCriterion)) {
            $list = \App\Todo::orderBy($sortingCriterion[0], $sortingCriterion[1])
                    ->paginate();
        } else {
            $list = \App\Todo::paginate();
        }

        if( !empty($list["items"])) {
            return response()->json($list);
        } else {
            return response()->json(["data" => [], "message" => "Wow. You have nothing else to do. Enjoy the rest of your day!"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationInput = [
            "content" => new TodoContent(), 
            "type" => new TodoType(), 
            "sort_order" => "required|numeric", 
            "done" => "required|numeric"
        ];
        $validator = \Validator::make($request->all(), $validationInput);
        if (!$validator->fails()) { 
            $todo = \App\Todo::create($request->all());
            return response()->json($todo);
        } else {
            $errors = $validator->errors();
            return response()->json($errors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = \App\Todo::findOrFail($id);
        return response()->json($todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validationInput = [
            "content" => new TodoContent(), 
            "type" => new TodoType(), 
            "sort_order" => "required|numeric", 
            "done" => "required|numeric"
            ];
            $todo = \App\Todo::find($id);
            if (!empty($todo)) {
                $validator = \Validator::make($request->all(), $validationInput);
                if (!$validator->fails()) { 
                    $todo->update($request->all());
                    return response()->json($todo);
                } else {
                    $errors = $validator->errors();
                    return response()->json($errors);
                }
            } else {
                return response()->json(["data" => [], "message" => "Invalid todo."]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = \App\Todo::find($id);
        if (!empty($todo)) {
            $todo->delete();
            return response()->json($todo);
        } else {
            return response()->json(["data" => [], "message" => "Are you a hacker or something? The task you were trying to edit doesn't exist."]);
        }
    }
}
