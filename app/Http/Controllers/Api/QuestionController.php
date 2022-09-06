<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest\QuestionRequest\StoreQuestionRequest;
use App\Http\Requests\ApiRequest\QuestionRequest\UpdateQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = QuestionResource::collection(Question::all());

        if (empty($questions))
            return response()->json([
                'error' => true,
                'message' => 'something went wrong'
            ],404);
        else
            return response()->json([
                'status' => true,
                'message' => 'All questions',
                'questions' => $questions
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Question created successfully',
            'question' => $question,
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
        $question = new QuestionResource(Question::findOrFail($id));

        if (empty($question))
            return response()->json([
                'error' => true,
                'message' => 'something went wrong'
            ],404);

        else
            return response()->json([
                'status' => true,
                'message' => 'Single request successful',
                'question' => $question,
            ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Question update successfully',
            'question' => $question,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return response()->json([
            'status' => true,
            'message' => 'Question deleted successfully'
        ],200);
    }
}
