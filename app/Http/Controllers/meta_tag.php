<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\meta_Setting;
use App\Models\AnimeSettings;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class meta_tag extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql["all_datas"]=meta_Setting::select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","meta_settings.*")
       -> join("anime_setting","anime_setting.flid","=","meta_settings.anime_id")
       ->orderBy("meta_settings.id","DESC")
       -> paginate(7);

        $sql["anime_data"]=AnimeSettings::all();

        return view("Admin.meta_tag_setting",$sql);
    }

    public function meta_description($flid)
    {
        //
    $all_data["description"] = meta_Setting::where("id", $flid)->get();
    if (is_null($all_data)) {
        # code...
        return redirect('meta-tag-setting')->with('fetching_error', 'description fecthing error occur');
    } else {
        // $url =url("Edit-anime-category")."/".$id;

        $description=json_decode(json_encode($all_data["description"]), true);
        $contents["data_description"] = Storage::get("meta_tag/".$description[0]["meta_description"]);

        return view("Admin.meta_description", $contents);
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
        $rules = $request->validate([
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'anime_page' => 'required',

        ], [
            'meta_title.required' => 'The Anime meta title  is required.',
            'meta_description.required' => 'The Anime meta description is required.',
            'meta_keyword.required' => 'The Anime meta key words  is required.',
            'anime_page.required' => 'The Anime title  is required.',

        ]);

        $file_name = rand(1, 100) . "_" . "meta_description.txt";


        Storage::disk('local')->put("meta_tag/".$file_name, $request->meta_description);


        // $meta_key =(array)json_decode($request->meta_keyword,true);

        // foreach($meta_key as $key=>$value){
        //     $meta_keys=$value ;
        // }

// for ($i=0; $i < count($meta_key); $i++) {
//         echo $meta_keys=$meta_key[$i]["value"];
// }
        // pre( $meta_keys);

        $insert = new meta_Setting;

        $insert->meta_title=$request->meta_title;
        $insert->meta_keywords=$request->meta_keyword;
        $insert->meta_description=$file_name;
        $insert->anime_id=$request->anime_page;
        $insert->save();

        return redirect('meta-tag-setting')->with('insert_status', 'Form Data Has Been validated and insert');

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
        if (is_null($id)) {
            return redirect('meta-tag-setting')->with('error_edit', 'Updating error');

        }
        else{
            $sql["edit_data"]=meta_Setting::find($id);
            $sql["anime_data"]=AnimeSettings::all();
            return view("Admin.edit_meta_tag",$sql);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = $request->validate([
            'meta_title' => 'required',

            'meta_keyword' => 'required',


        ], [
            'meta_title.required' => 'The Anime meta title  is required.',

            'meta_keyword.required' => 'The Anime meta key words  is required.',


        ]);
    $check_file=meta_Setting::find($request->meta_id);

    if (!empty($request->input("anime_page"))) {
        # code...
        $anime_page=$request->anime_page;
    }
    else{
        $anime_page=$check_file->anime_id;
    }

    $file_desc_check="meta_tag/". $check_file->meta_description;
    //  $file_image_check="/". $description[0]["anime_description"];
    $isExists = Storage::exists($file_desc_check);
    if (!empty($request->input("meta_description"))) {
        Storage::disk('local')->delete("meta_tag/".$check_file->meta_description);

        $file_name = rand(1, 100) . "_" . "meta_description.txt";


        Storage::disk('local')->put("meta_tag/".$file_name, $request->meta_description);

    }

    else{
        $file_name=$check_file->meta_description;
    }


    $insert=meta_Setting::find($request->meta_id);
    $insert->meta_title=$request->meta_title;
    $insert->meta_keywords=$request->meta_keyword;
    $insert->meta_description=$file_name;
    $insert->anime_id=$anime_page;
    $insert->save();


    return redirect('meta-tag-setting')->with('insert_status', 'Form Data Has Been validated and updated');


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
