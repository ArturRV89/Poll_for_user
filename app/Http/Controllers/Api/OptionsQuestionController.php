<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest\OptionsQuestionRequest\StoreOptionsQuestionRequest;
use App\Http\Requests\ApiRequest\OptionsQuestionRequest\UpdateOptionsQuestionRequest;
use App\Http\Requests\ApiRequest\QuestionRequest\StoreQuestionRequest;
use App\Http\Resources\OptionsQuestionResourse;
use App\Models\OptionsQuestion;
use Illuminate\Http\Request;

class OptionsQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = OptionsQuestionResourse::collection(OptionsQuestion::all());

        if (empty($options))
            return response()->json([
               'error' => true,
               'message' => 'something went wrong'
            ],404);
        else
            return response()->json([
                'status' => true,
                'message' => 'All options of questions',
                'options' => $options
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOptionsQuestionRequest $request, OptionsQuestion $option)
    {
        $result = $option->create($request->validated());

        if (empty($result))
            return response()->json([
                'error' => true,
                'message' => 'Something went wrong'
            ],404);
        else
            return response()->json([
                'status' => true,
                'message' => 'Option of question created',
            ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = new OptionsQuestionResourse(OptionsQuestion::findOrFail($id));

        if (empty($result))
            return response()->json([
                'error' => true,
                'message' => 'something went wrong'
            ],404);
        else
            return response()->json([
                'status' => true,
                'message' => 'Single request successful',
                'result' => $result,
            ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOptionsQuestionRequest $request, OptionsQuestion $option)

    {
        $result = $option->update($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Option of question update successfully',
            'result' => $result
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OptionsQuestion $option)
    {
        $result = $option->delete();

        return response()->json([
            'status' => true,
            'message' => 'Option of question deleted successfully',
            'result' => $result
        ],200);
    }
}
