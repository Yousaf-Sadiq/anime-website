<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_anime_category;
use App\Models\AnimeSettings;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class AnimeDetail extends Controller
{
    //
    public function index($id){
        $all_data["details"] = AnimeSettings::select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","add_anime_category.*","add_anime_category.id as cat_id ")
        ->join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")
        ->where("anime_setting.id","=",$id)
        ->get(array("anime_setting.*", "add_anime_category.*"));
// echo "<pre>";
//       print_r(json_decode(json_encode($all_data["details"]),true)) ;
// echo "</pre>";
$description=json_decode(json_encode($all_data["details"]),true);
            // $edit_data=json_decode(json_encode($edit_product),true);
            $contents["data_description"] = Storage::get($description[0]["anime_description"]);

            // $url =url("Edit-anime-category")."/".$id;


            $show_dat["all_detail"]=[$all_data,$contents];

    return view("anime-details",  $show_dat);
    }
}
