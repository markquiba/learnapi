<?php

namespace App\Http\Controllers;

use App\Acme\Transformers\LessonTransformer;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class LessonsController extends ApiController
{

    protected $lessonTransformer;

    function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 1. All is bad
        // 2. No way to attach meta data
        // 3. Linking db structure to the API output
        // 4. No way to signal headers/response codes
        // return Lesson::all(); really bad practice

        $lessons = Lesson::all();
        return $this->respond([
            'data' => $this->lessonTransformer->transformCollection($lessons)
        ]);
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
        if (! Input::get('title') or ! Input::get('body'))
        {
            // return some kind of response
            // 422
            // provide a message
            return $this->setStatusCode(422)
                        ->respondWithError('Parameters failed validation for a lesson.');
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
        $lesson = Lesson::find($id);

        if (!$lesson)
        {
            return $this->respondNotFound('Lesson does not exist.');
            // return Response::json([
            //     'error' => [
            //         'message' => 'Lesson does not exist'
            //     ]
            // ], 404);
        }

        return $this->respond([
            'data' => $this->lessonTransformer->transform($lesson)
        ]);
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
