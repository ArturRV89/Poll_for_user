<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest\PollRequest\StorePollRequest;
use App\Http\Requests\ApiRequest\PollRequest\UpdatePollRequest;
use App\Http\Requests\ApiRequest\UserAnswersRequest\StoreRequest;
use App\Http\Resources\PollResourse;
use App\Models\Poll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $polls = PollResourse::collection(Poll::all());

        if (empty($polls))
            return response()->json([
                'error' => true,
                'message' => 'something went wrong'
            ],404);

        else
            return response()->json([
               'status' => true,
               'message' => 'All polls',
                'polls' => $polls
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePollRequest $request)
    {
        $poll = Poll::create($request->validated());

        return response()->json([
           'status' => true,
           'message' => 'Poll created successfully',
           'poll' => $poll,
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
        $poll = new PollResourse(Poll::findOrFail($id));

        if (empty($poll))
            return response()->json([
                'error' => true,
                'message' => 'something went wrong'
            ],404);
        else
            return response()->json([
                'status' => true,
                'message' => 'Single request successful',
                'poll' => $poll,
            ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePollRequest $request, Poll $poll)
    {
        $pollItem = $poll->update($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Poll update successfully',
            'pollItem' => $pollItem,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        $poll->delete();

        return response()->json([
            'status' => true,
            'message' => 'Poll deleted successfully'
        ],200);
    }
}
