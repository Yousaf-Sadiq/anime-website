<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_anime_category;
use App\Models\AnimeSettings;
class animeFilter extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $name=null;$order_by=null;
        if ($name=="ASC" || $name=="DESC") {
            $anime_cat["anime_cat"]=AnimeSettings::select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","add_anime_category.*","add_anime_category.id as cat_id ")
            ->join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")
            ->orderBy('anime_setting.title', $name)->paginate(15, array("anime_setting.*", "add_anime_category.*"));
            $anime_cat["anime_cat2"]=$anime_cat["anime_cat"][0]["title"];
            return view("categories",$anime_cat);
        }
        elseif ($order_by=="ASC" || $order_by=="DESC") {
            $category_name=add_anime_category::where("add_anime_title",$name)->get();
            //         echo "<pre>";
            //         print_r($category_name[0]["id"]);
            // echo "</pre>";
            $anime_cat["anime_cat"]=AnimeSettings::select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","add_anime_category.*","add_anime_category.id as cat_id ")
            ->join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")
            ->where("anime_setting.anime_category",$category_name[0]["id"])->where("anime_setting.anime_status","1")->orderBy('title', $order_by)->paginate(15);
                    return view("categories",$anime_cat);

        }
        else{

            // $category_name=add_anime_category::where("add_anime_title",$request->search)->get();
        //         echo "<pre>";
        //         print_r($category_name[0]["id"]);
        // echo "</pre>";
        // $anime_cat["anime_cat"]=AnimeSettings::select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","add_anime_category.*","add_anime_category.id as cat_id ")
        // ->join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")
        // ->where("anime_setting.anime_category",$category_name[0]["id"])
        // ->where('anime_setting.title', 'Like', '%' . $request->search . '%')
        // ->where("anime_setting.anime_status","1")
        // ->paginate(15);

        $anime_cat["anime_cat"]=AnimeSettings::select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status")
        ->where('anime_setting.title', 'Like', '%' . $request->search . '%')
        ->where("anime_setting.anime_status","1")
        ->paginate(15);

                return view("anime_filter",$anime_cat);

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
