<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_anime_category;

class add_category extends Controller
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

    public function Add_anime_category()
    {
        //
        $all_data["all_datas"]=add_anime_category::paginate(5);

        return view("Admin.add_category",$all_data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function messages()
    {
        return [
            'title.required' => 'The Anime category name is required.'

        ];
    }

    public function store(Request $request)
    {
        //
        $rules = $request->validate([
            'cat_name' => 'required',

          ],[
            'cat_name.required' => 'The Anime category name is required.'
        ]);


        // $customMessages = [
        //     'cat_name' => 'The Anime category name is required.'
        // ];

        // $this->validate($request, $rules, $customMessages);
        //
$insert= new add_anime_category;
$insert->add_anime_title=$request->cat_name;
$insert->save();

return redirect('Add-anime-category')->with('status', 'Form Data Has Been validated and insert');


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
        $show_datas=add_anime_category::find($id);
     if (is_null($show_datas)) {
        # code...
        return redirect('Add-anime-category')->with('error_edit', 'Form Data Has Been validated and insert');

     }
     else{
        // $url =url("Edit-anime-category")."/".$id;


        $show_dat["show_data"]=$show_datas;

           return view("Admin.edit_category",$show_dat);

     }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {

        $rules = $request->validate([
            'cat_name' => 'required',

          ],[
            'cat_name.required' => 'The Anime category name is required.'
        ]);


        //
        $update=add_anime_category::find($id);


        $update->add_anime_title=$request->cat_name;
        $update->save();

        return redirect('Add-anime-category')->with('update_success', 'Form Data Has Been Updated ');


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
        $show_datas=add_anime_category::find($id);
        if (is_null($show_datas)) {
           # code...
           return redirect('Add-anime-category')->with('error_delete', 'ther is no such id existed');

        }
        else{
           // $url =url("Edit-anime-category")."/".$id;


           $update=add_anime_category::find($id);
// echo $update;
           $update->delete();
           return redirect('Add-anime-category')->with('delete_success', 'Record has been deleted');

        }

    }
}
