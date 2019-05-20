<?php

namespace App\Http\Controllers;

use App\Model\Question;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show a bunch of data => use collection
        return QuestionResource::collection(Question::latest()->get());
    }

    public function show(Question $question)
    {
        //show single => use new
        return new QuestionResource($question);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // auth()->user()->questions()->create($request->all());
        Question::create($request->all());
        return response('Created question successfully', 201);// 201 = HTTP_CREATED
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response('Updated question successfully', 202);// 202 = HTTP_ACCEPTED
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return response(null, 204);// 204 = HTTP_NO_CONTENT
    }
}
