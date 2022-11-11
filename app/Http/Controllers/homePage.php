<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use App\Models\AnimeSettings;
use App\Models\add_anime_category;

class homePage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $anime_data["all_data"]= gallery::
        select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","anime_gallery.*","anime_gallery.id as gallery_id","add_anime_category.*","add_anime_category.id as cat_id ")
        ->join("anime_setting", "anime_setting.flid", "=", "anime_gallery.folder_name")
        ->join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")
        ->where("anime_gallery.status","1")
        ->where("anime_gallery.folder_name","!=","0")
        ->get(array("anime_setting.*", "add_anime_category.*","anime_gallery.*"))
        ->toArray();



        // $anime_data["all_data2"]= AnimeSettings::where("anime_status","1")->get()->toArray();
        // $anime_data["all_data3"]= add_anime_category::all()->toArray();


        // view all anime
        $anime_data["all_data4"]= AnimeSettings::select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","add_anime_category.*","add_anime_category.id as cat_id ")
        ->join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")
        ->where("anime_setting.anime_status","=","1")
        ->orderBy("title","ASC")
        ->paginate(15);





        //    merging array
        $anime_data["all_data"]=[
            // "animeSetting"=>$all_data["details"]
            "gallery"=>$anime_data["all_data"]
            // ,"cateory"=> $anime_data["all_data3"]
            ,"paginate_anime"=> $anime_data["all_data4"]];
        return view("index", $anime_data);

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
    public function destroy($id)
    {
        //
    }
}
