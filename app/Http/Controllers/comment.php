<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comments;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class comment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $rules = $request->validate([
            'comments' => 'required',

          ],[
            'comments.required' => 'The Anime comment is required.'
        ]);

       //
       $file_name = rand(1, 100) . "_" . "comments.txt";


       Storage::disk('local')->put($file_name, $request->comments);
       $insert= new comments;
       $insert->user_id=$request->user_id;
       $insert->anime_id=$request->anime_id;
       $insert->comments=$file_name;
       $insert->save();

       return redirect($request->current_url)->with('status', 'comment has been submit');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $rules = $request->validate([
            'comments' => 'required',

          ],[
            'comments.required' => 'The Anime comment is required.'
        ]);

$check_file=comments::find($request->comment_id);

$file_desc_check="/". $check_file->comments;
//  $file_image_check="/". $description[0]["anime_description"];
$isExists = Storage::exists($file_desc_check);
if ($isExists) {

    Storage::disk('local')->delete($check_file->comments);
    $file_name = rand(1, 100) . "_" . "comment.txt";
    Storage::disk('local')->put($file_name, $request->comments);

    $insert=comments::find($request->comment_id);
    $insert->user_id=$request->user_id;
    $insert->anime_id=$request->anime_id;
    $insert->comments=$file_name;
    $insert->save();

    return response()->json(["your comment has been updated"]);
    # code...
}else{

    return response()->json(["not done"]);
}

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
