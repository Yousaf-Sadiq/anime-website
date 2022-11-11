<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\whishlist;
use App\Models\AnimeSettings;
use App\Models\add_anime_category;
use App\Models\userPanel;
class AddWhishlist extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$sql["whislist_data"]=AnimeSettings::select("whishlists.user_id","whishlists.id as whislist_id","whishlists.anime_id as whislist_anime_id","anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","add_anime_category.*","add_anime_category.id as cat_id ")
->join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")
->join("whishlists", "whishlists.anime_id", "=", "anime_setting.id")
->paginate(1);

return view("whislist",$sql);
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
        //
$sql=whishlist::where("user_id",$request->user_id)->where("anime_id",$request->anime_id)->get();
if (count($sql) > 0) {
    # code...
    return  response()->json(["already added to favorite"]);
}
else{
    $insert=new whishlist;
    $insert->user_id=$request->user_id;
    $insert->anime_id=$request->anime_id;

    $insert->save();
    return  response()->json(["added to favorite"]);

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
        //
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
    // ?anime_id={{$anime_flid[0][0]['anime_id']}}&&user_id={{Session::get('user_email')}}
    public function destroy($id, Request $request)
    {
        //

$delete=whishlist::where("user_id",$request->user_id)->where("anime_id",$id)->get();
$delete=whishlist::find($delete[0]["id"]);

$delete->delete();

return response()->json(["favorite anime deleted successfully"]);
// return response()->json($delete);

    }
}
