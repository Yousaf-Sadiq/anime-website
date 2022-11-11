<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use App\Models\AnimeSettings;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class SliderSetting extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $image_gallery["image_gallery"] = gallery::orderBy("id","DESC")->paginate(3);
        $image_gallery2["anime_Setting"] = AnimeSettings::select('flid',"title")->get();
        $image_gallery["show_data"] = gallery:: orderBy("id","DESC")->paginate(3);

        $image_gallery["image_gallery"]=[$image_gallery["image_gallery"],$image_gallery2["anime_Setting"],$image_gallery["show_data"]];

        return view("Admin.add_slider",$image_gallery);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store_flid(Request $request)
    {
        //
        $rules = $request->validate([
            'checkbox_name' => 'required',
            'flid_image' => 'required'

        ], [
            'checkbox_name.required' => 'Any one Anime image is required.',
            'flid_image.required' => 'The Anime  id/name is required.'

        ]);

        $insert = gallery::where("image_name",$request->checkbox_name)->update(["folder_name"=>$request->flid_image]);

        // $insert->folder_name = $request->flid_image;
        // $insert->save();

        return redirect('Slider-setting')->with('insert_status', 'Form Data Has Been validated and insert');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $fileInfo = $image->getClientOriginalName();

            $image_name = rand(1, 100) . "_" . $request->file('file')->getClientOriginalName();

            $image_path = $request->file('file')->storeAs('public/img/anime', $image_name);

            // $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            // $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            // $file_name= $filename.'-'.time().'.'.$extension;
            // $image->move(public_path('uploads/gallery'),$file_name);

            $imageUpload = new gallery;
            // $imageUpload->original_filename = $fileInfo;
            $imageUpload->image_name = $image_name;
            $imageUpload->save();

            return response()->json(['success'=>$image_name]);
                # code...
        }
        return response()->json(['error'=>"File not found"]);
    }

    public function getImages()
    {
        $images = gallery::all()->sortByDesc("id")->toArray();

try {
    foreach($images as $image){
        $tableImages[] = $image['image_name'];
    }
    $storeFolder = public_path().'/storage/img/anime/';
    // $storeFolder = public_path('uploads/gallery');
    // $file_path = public_path('uploads/gallery/');
    $files = scandir($storeFolder);

    foreach ( $files as $file ) {
        if ($file !='.' && $file !='..' && in_array($file,$tableImages)) {
            $obj['name'] = $file;
            $file_path = public_path().'/storage/img/anime/'.$file;
            $obj['size'] = filesize($file_path);
            $obj['path'] = url('/storage/img/anime/'.$file);
            $data[] = $obj;
        }

    }
    //dd($data);
    return response()->json($data);


} catch (\Throwable $th) {
    return response()->json(["Error"=>"not FOund"]);
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
        try {
            $show_datas=AnimeSettings::select("title","flid")->get();
            $show_data=gallery::find($id);


            // $url =url("Edit-anime-category")."/".$id;


            $show_dat["edit_product"]=[$show_datas,$show_data];

               return view("Admin.edit-slider",$show_dat);


          } catch (\Exception $e) {

            return redirect('All-anime')->with('error_edit', 'Error in function show() in updation due to invalid data ');

          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {


        try {
            // combine two tabel
            $show_datas=gallery::
            select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","anime_gallery.*","anime_gallery.id as gallery_id ")
            ->join("anime_setting", "anime_setting.flid", "=", "anime_gallery.folder_name")
            ->where("anime_gallery.id","=",$id)
            ->get();

        // =-===========================================7
        $slider_update=json_decode(json_encode($show_datas), true);
// pre($slider_update);


        // // check image field
            if (!empty($request->hasFile("main_image"))) {
        //         # code...
        //         // echo $url;
        //         // http://127.0.0.1:8000/storage/img/anime/
        //         // echo $a=$url.'/storage/img/anime/'.$slider_update[0]["image_name"];
        //         // echo $a=storage_path('/img/anime/'.$slider_update[0]["image_name"]);

                $filename = public_path().'/storage/img/anime/'.$slider_update[0]["image_name"];

                $abc= File::delete($filename);
        //         // dd($abc);
                $image_name = rand(1, 100) . "_" . $request->file('main_image')->getClientOriginalName();

                $image_path = $request->file('main_image')->storeAs('public/img/anime', $image_name);
            } else {
                $image_name =$slider_update[0]["image_name"];
            }
        // check all optional fields
            if (!empty($request->input("folder_name"))) {
                $folder_name=$request->folder_name;
            } else {
                $folder_name=$slider_update[0]["folder_name"];
            }

            if (!empty($request->input("gallery_status")) || $request->input("gallery_status") =="0") {
                $gallery_status=$request->gallery_status;
            } else {
                $gallery_status=$slider_update[0]["status"];
            }


        //


        // // data updating
            $update= gallery::find($slider_update[0]["id"]);
            $update->image_name=$image_name;
            $update->folder_name=$folder_name;
            $update->status=$gallery_status;
            $update->save();

            return redirect('Slider-setting')->with('update_status', 'Anime Gallery Data Has Been updated');

          } catch (\Exception $e) {

            return redirect('Slider-setting')->with('data_invalid', 'Error in (edit) updation due to invalid data');
            // return $e;

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
    public function destroy(Request $request)
    {

        $filename =  $request->get('filename');
// echo $filename;
        Gallery::where('image_name',$filename)->delete();
        $path =  public_path().'/storage/img/anime/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return response()->json(['success'=>$filename]);
    }

    public function destroy_record(Request $request,$id)
    {

        $show_datas=gallery::
        select("anime_setting.id as anime_id","anime_setting.anime_category as anime_cat","anime_setting.flid","anime_setting.title as anime_title","anime_setting.anime_image","anime_setting.season","anime_setting.total_season","anime_setting.anime_description","anime_setting.episodes_status","anime_setting.anime_status","anime_gallery.*","anime_gallery.id as gallery_id ")
        ->join("anime_setting", "anime_setting.flid", "=", "anime_gallery.folder_name")
        ->where("anime_gallery.id","=",$id)
        ->get();

    // =-===========================================7
    $slider_update=json_decode(json_encode($show_datas), true);
        $filename = public_path().'/storage/img/anime/'.$slider_update[0]["image_name"];


// echo $filename;

        $path =  public_path().'/storage/img/anime/'.$filename;
        if (file_exists($filename)) {
            // unlink($path);
            $abc= File::delete($filename);
            Gallery::find($id)->delete();

            return redirect('Slider-setting')->with('delete_success', 'Anime Gallery Data Has Been Deleted');

        }
else{
    return redirect('Slider-setting')->with('error_delete', 'Anime Gallery Data delete error');

}
    }
}

