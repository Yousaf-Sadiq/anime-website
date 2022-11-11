<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_anime_category;
use App\Models\AnimeSettings;
use App\Models\userPanel;
use App\Models\whishlist;
use App\Models\comments;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
class AnimeWatch extends Controller
{
    public function index($id,$name)
    {

        $all_data = AnimeSettings::select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","add_anime_category.*","add_anime_category.id as cat_id ")
        ->join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")
        ->where("anime_setting.flid","=",$id)
        ->get(array("anime_setting.*", "add_anime_category.*"));
        $description=json_decode(json_encode($all_data),true);
        //   pre($description);
        $whislists=whishlist::where("user_id",Session::get("user_email"))->where("anime_id",$description[0]["anime_id"])->get();

        $myString = $description[0]["anime_title"];

        $strArray = explode('-',$myString);

// if (array_key_exists(1,$strArray)) {
// echo  "%".trim($strArray[0])."%";
    $all_data_check_season["season"]=AnimeSettings::
    where('title', 'Like',  "%".trim($strArray[0])."%")
    ->where("anime_status","1")
    ->get()->toArray();


    $all_data_check_season["season"]=AnimeSettings::
    where('title', 'Like',  "%".trim($strArray[0])."%")
    ->where("anime_status","1")
    ->get();
    // pre( $all_data_check_season);
    // echo   $name = $strArray[1];
    // // }
    // // else{
    // //     $all_data_check_season["season"]=0;
    // }


        $comment["comments"]=comments::select("comments.id as comment_id","comments.comments")
        // ->join("comments", "anime_setting.id", "=", "comments.anime_id")
        // ->rightJoin("user_panels", "comments.user_id", "=", "user_panels.email")
        ->where("comments.anime_id",$description[0]["anime_id"])
        ->get() ;

        if (count($whislists)>0) {

            $whislist["whishlist"]=whishlist::where("user_id",Session::get("user_email"))->where("anime_id",$description[0]["anime_id"])->get();

        }
        else{
            $whislist["whishlist"]=[0];
        }

        if (count($comment)>0) {

            // $comment["comments"]=comments::select("user_panels.id as user_id","user_panels.profile","user_panels.user_name","comments.id as comment_id","comments.comments")
            // // ->join("comments", "anime_setting.id", "=", "comments.anime_id")
            // ->join("user_panels", "comments.user_id", "=", "user_panels.email")
            // ->where("comments.anime_id",$description[0]["anime_id"])
            // ->get();
            $comment["comments"]= comments::select("user_panels.id as user_id","user_panels.profile","user_panels.email","user_panels.user_name","comments.updated_at as created_at","comments.id as comment_id","comments.comments")
                // ->join("comments", "anime_setting.id", "=", "comments.anime_id")
            ->rightJoin("user_panels", "comments.user_id", "=", "user_panels.email")
            ->where("comments.anime_id",$description[0]["anime_id"])
            ->orderBy('comments.id', "desc")
            ->paginate(17) ;
        }
        else{
            $comment["comments"]=[0];
        }
        // $edit_data=json_decode(json_encode($edit_product),true);
            $contents["data_description"] = Storage::get($description[0]["anime_description"]);

            // $url =url("Edit-anime-category")."/".$id;


            $show_dat["anime_flid"]=[$all_data,$contents,$whislist,$comment,$all_data_check_season];


    return view("anime-watching", $show_dat);
    // return view("anime-watching");

    }
}
