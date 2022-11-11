<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_anime_category;
use App\Models\AnimeSettings;
class categoryHandling extends Controller
{
    public function index($name,$order_by="ASC"){
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

    $category_name=add_anime_category::where("add_anime_title",$name)->get();
//         echo "<pre>";
//         print_r($category_name[0]["id"]);
// echo "</pre>";
$anime_cat["anime_cat"]=AnimeSettings::select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","add_anime_category.*","add_anime_category.id as cat_id ")
->join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")
->where("anime_setting.anime_category",$category_name[0]["id"])->where("anime_setting.anime_status","1")->paginate(15);
        return view("categories",$anime_cat);

}

        }

    public function show_all(){

//         echo "<pre>";
//         print_r($category_name[0]["id"]);
// echo "</pre>";
$anime_cat["anime_cat"]=AnimeSettings::select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","add_anime_category.*","add_anime_category.id as cat_id ")
->join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")

->orderBy('anime_setting.title', 'ASC')->paginate(15, array("anime_setting.*", "add_anime_category.*"));

return view("categories",$anime_cat);
    }
}
