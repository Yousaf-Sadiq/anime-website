<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_anime_category;
use App\Models\AnimeSettings;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

// MVC
class Anime_setting_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $all_data["category"] = add_anime_category::all();


        return view("Admin.add_product", $all_data);
    }


    public function show_data()
    {
        //

        $all_data["product"] = AnimeSettings::join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")

            ->paginate(5, array("anime_setting.*", "add_anime_category.*"));


        return view("Admin.all_products", $all_data);
    }



    public function anime_description($flid)
    {
        //
        $all_data["description"] = AnimeSettings::where("flid",$flid)->get();
        if (is_null($all_data)) {
            # code...
            return redirect('all-anime')->with('fetching_error', 'description fecthing error occur');

         }
         else{
            // $url =url("Edit-anime-category")."/".$id;

            $description=json_decode(json_encode($all_data["description"] ), true);
            $contents["data_description"] = Storage::get($description[0]["anime_description"]);

            return view("Admin.anime_description", $contents);
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
        $rules = $request->validate([
            'title' => 'required',
            'flid' => 'required',
            'season' => 'required',
            't_season' => 'required',
            'anime_category' => 'required',
            'description' => 'required',
            'episode_status' => 'required',
            'main_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'anime_status' => 'required',

        ], [
            'title.required' => 'The Anime title  is required.',
            'flid.required' => 'The Anime folder id is required.',
            'season.required' => 'The Anime season  is required.',
            't_season.required' => 'The Anime total season  is required.',
            'anime_category.required' => 'The Anime category  is required.',
            'description.required' => 'The Anime description  is required.',
            'episode_status.required' => 'The Anime episode status  is required.',
            'main_image.required' => 'The Anime Thumbnail image  is required.',
            'anime_status.required' => 'The Anime status  is required.',
        ]);

        $file_name = rand(1, 100) . "_" . "anime_desc.txt";


        Storage::disk('local')->put($file_name, $request->description);

        $image_name = rand(1, 100) . "_" . $request->file('main_image')->getClientOriginalName();

        $image_path = $request->file('main_image')->storeAs('public/img/anime', $image_name);

        $insert = new AnimeSettings;
        $insert->title = $request->title;
        $insert->flid = $request->flid;
        $insert->anime_image = $image_name;
        $insert->season = $request->season;
        $insert->total_season = $request->t_season;
        $insert->anime_description = $file_name;
        $insert->episodes_status = $request->episode_status;
        $insert->anime_status = $request->anime_status;
        $insert->anime_category = $request->anime_category;
        $insert->save();

        return redirect('All-anime')->with('insert_status', 'Form Data Has Been validated and insert');
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

        try {
            $show_datas=AnimeSettings::select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","add_anime_category.*","add_anime_category.id as cat_id ")
            ->join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")
            ->where("flid",$id)
            ->get();
            $all_data= add_anime_category::all();
            $description=json_decode(json_encode($show_datas),true);
            // $edit_data=json_decode(json_encode($edit_product),true);
            $contents["data_description"] = Storage::get($description[0]["anime_description"]);

            // $url =url("Edit-anime-category")."/".$id;


            $show_dat["edit_product"]=[$show_datas,$all_data,$contents];

               return view("Admin.edit_product",$show_dat);


          } catch (\Exception $e) {

            return redirect('All-anime')->with('error_edit', 'Error in function show() in updation due to invalid data ');

          }
    //  if (is_null($show_datas)) {
    //     # code...

    //  }
    //  else{

    //  }


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
  //
  $rules = $request->validate([
    'title' => 'required',
    'flid' => 'required',
    'season' => 'required',
    't_season' => 'required',
    // 'anime_category' => 'required',
    'description' => 'required',
    // 'episode_status' => 'required',
    // 'main_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
    // 'anime_status' => 'required',

], [
    'title.required' => 'The Anime title  is required.',
    'flid.required' => 'The Anime folder id is required.',
    'season.required' => 'The Anime season  is required.',
    't_season.required' => 'The Anime total season  is required.',
    // 'anime_category.required' => 'The Anime category  is required.',
    'description.required' => 'The Anime description  is required.',
    // 'episode_status.required' => 'The Anime episode status  is required.',
    // 'main_image.required' => 'The Anime Thumbnail image  is required.',
    // 'anime_status.required' => 'The Anime status  is required.',
]);

try {
    // combine two tabel
    $show_datas=AnimeSettings::select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","add_anime_category.*","add_anime_category.id as cat_id ")
    ->join("add_anime_category", "anime_setting.anime_category", "=", "add_anime_category.id")
    ->where("flid",$id)
    ->get();

// =-===========================================7
$description=json_decode(json_encode($show_datas), true);

$file_desc_check="/". $description[0]["anime_description"];
//  $file_image_check="/". $description[0]["anime_description"];
$isExists = Storage::exists($file_desc_check);
// $isExists = Storage::exists($file_desc_check);
// check if description is exist
if ($isExists) {
//    $abc= Storage::delete("public/app/img/anime/".$description[0]["anime_image"]);
    // echo $image_pat2=storage_path("app/img/anime/".$description[0]["anime_image"]);
//  delete previous description
    Storage::disk('local')->delete($description[0]["anime_description"]);
    // $abc=File::delete($image_pat2);
    // $abc=;
    // dd($abc);
    // create random name for description
    $file_name = rand(1, 100) . "_" . "anime_desc.txt";

// check image field
    if (!empty($request->hasFile("main_image"))) {
        # code...
        // echo $url;
        // http://127.0.0.1:8000/storage/img/anime/
        // echo $a=$url.'/storage/img/anime/'.$description[0]["anime_image"];
        // echo $a=storage_path('/img/anime/'.$description[0]["anime_image"]);

        $filename = public_path().'/storage/img/anime/'.$description[0]["anime_image"];
// Storage::delete()
        $abc= File::delete($filename);
        // dd($abc);
        $image_name = rand(1, 100) . "_" . $request->file('main_image')->getClientOriginalName();

        $image_path = $request->file('main_image')->storeAs('public/img/anime', $image_name);
    } else {
        $image_name =$description[0]["anime_image"];
    }
// check all optional fields
    if (!empty($request->input("episode_status"))) {
        $episode_status=$request->episode_status;
    } else {
        $episode_status=$description[0]["episodes_status"];
    }

    if (!empty($request->input("anime_status")) || $request->input("anime_status") =="0") {
        $anime_status=$request->anime_status;
    } else {
        $anime_status=$description[0]["anime_status"];
    }


    if (!empty($request->input("anime_category"))) {
        $anime_category=$request->anime_category;
    } else {
        $anime_category=$description[0]["anime_cat"];
    }


// create new description
    Storage::disk('local')->put($file_name, $request->description);
// data updating
    $update= AnimeSettings::find($description[0]["anime_id"]);
    $update->title = $request->title;
    $update->flid = $request->flid;
    $update->anime_image = $image_name;
    $update->season = $request->season;
    $update->total_season = $request->t_season;
    $update->anime_description = $file_name;
    $update->episodes_status =$episode_status;
    $update->anime_status =  $anime_status;
    $update->anime_category =$anime_category;
    $update->save();

    return redirect('All-anime')->with('update_status', 'Anime Data Has Been updated');
}
 else {
    return redirect('All-anime')->with('updating_anime_data', 'Anime details not valid or impr0per');
}

  } catch (\Exception $e) {

    return redirect('All-anime')->with('data_invalid', 'Error in (edit) updation due to invalid data');

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
        try {
            $delete= AnimeSettings::where("flid",$id)->get();
            $deletes=json_decode(json_encode($delete), true);
        $delete_2=AnimeSettings::find($deletes[0]["id"]);
            // print_r($deletes);
        $file_desc_check="/". $deletes[0]["anime_description"];
        //  $file_image_check="/". $description[0]["anime_description"];

        $isExists = Storage::exists($file_desc_check);

        if ($isExists) {
            Storage::disk('local')->delete($deletes[0]["anime_description"]);
            $filename = public_path().'/storage/img/anime/'.$deletes[0]["anime_image"];

        $abc= File::delete($filename);
        $delete_2->delete();
            # code...


    return redirect('All-anime')->with('deleted', 'successfully deleted data');

        }

        } catch (\Throwable $th) {
            //throw $th;
// echo $th;
    return redirect('All-anime')->with('delete_invalid', 'Error in (destroy) due to invalid data Error is:'.$th);


        }

        // print_r ($delete);
    }
}
