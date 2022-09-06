<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest\UserAnswersRequest\StoreRequest;
use App\Http\Resources\UserAnswersResource;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAnswers;
use Illuminate\Support\Facades\DB;


class UserAnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $answers = UserAnswersResource::collection(UserAnswers::all());

        if (empty($answers))
            return response()->json([
                'error' => true,
                'message' => 'something went wrong',
            ],404);
        else
            return response()->json([
                'status' => true,
                'message' => 'All answers',
                'answers' => $answers
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Question $question)
    {
        $data = $request->validated();
//        все ответы складываются в массив
//        если осуществлен выбор между предложенными вариантами ответа,
//        то записываем в переменную ответ(ы),
//        если не указан ответ то пользователь пишет свой, так же складывем в массив
//        прогоняем массив через цикл и записываем в БД
        if (($data['answer'])){
            $answers = $data['answer'];
            $questionId = $data['question_id'];
            unset($data['answer'], $data['question_id']);

            if (isset (Auth::user()->id))
                session()->push('user_id', Auth::user()->id);
            else
                session()->push('user_id', session()->getId());

                session()->push('answers', $answers);

            foreach ((session('answers')) as $answer) {
                UserAnswers::create([
                    'user_id' => session('user_id'),
                    'answer' => $answer,


// ????????????????????????????????????????????????????????????????????
//                не могу понять,как установить ID вопроса на который отвечаешь????????
                    'question_id' => $questionId->question->id,
                

                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Response was received'
            ],200);
        }
        else return response()->json([
            'error' => true,
            'massage' => 'Select answer or will write'
        ], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
