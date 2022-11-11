<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\userPanel;
use function PHPUnit\Framework\isNull;

class mailSend extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($email)
    {
        try {
            //code...

            if (is_null($email)) {
                return redirect('/login')->with('fetch_error', 'email is note correct');

            }else{
                $sql["fetcher"]=userPanel::where("email",$email)->get();
                $data=['name'=>"Vishal", "data"=>"Hello world"];
                $user["to"]=$email;
                $details = [
                    'title' => 'Mail from ItSolutionStuff.com',
                    'body' => 'This is for testing email using smtp',
                    'email'=>$email,
                    'getter'=>$sql
                ];

                Mail::to($user["to"])->send(new \App\Mail\test_mail($details));
                // Mail::send('mail',$data,function($messages) use ($user){
                // $messages->to($user["to"]);
                // $messages->subject( 'Hello Dev');
                // });

                return redirect('/login')->with('login_success', 'we have send you the mail for recovering your password');

            }


        } catch (\Throwable $th) {
            throw $th;
            // return redirect('/login')->with('fetch_error', 'email is not correct');

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
   public function form()
    {
        return view("forget_user");
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
            'email_login' => 'required',

        ], [
            'email_login.required' => 'To forget password email is required.',
        ]);

return redirect("mail-send/".$request->email_login);
        //email_login
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email,)
    {
        if (is_null($email)) {
            # code...
        }else
        {

            $sql["forget_pass"] = userPanel::where("email",$email);


            // $sql["forget_pass"] =[$email] ;
if ($sql["forget_pass"]->exists()) {
    $sql["forget_pass"] = userPanel::where("email",$email)->get()->toArray();
    return view("forget-password",$sql);

    # code...
}
else{
    return redirect('/login')->with('fetch_error', 'You are not registor,or maybe you deleted your account');


}
            // pre($sql);


        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $sql = userPanel::where("email",$request->email_login)->get()->toArray();
        $sql_check = userPanel::where([
            "email"=>$request->email_login,
            "status"=>"1"
            ]);

            if ($sql_check->exists()) {

                if (isset($request->password) && !empty($request->password)) {

                    $rules2 = $request->validate(
                        [
                            'password' => 'required|required_with:confirmPassword|same:confirmPassword',
                            'confirmPassword' => 'required',
                            // 'profile_pic' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        ],
                        [
                            'password.required' => 'Password is not same.',
                            // 'profile_pic.required' => 'The Anime Thumbnail image  is required.',

                        ]
                    );
                    $password = Hash::make($request->password);
                }


                $update = userPanel::find($sql[0]["id"]);

                $update->email = $request->email_login;
                $update->password = $password;


                $update->save();

                $session_name = "user_email";
                $session_value = $request->email_login;
                $request->session()->put($session_name, $session_value);

                return redirect('/user-setting')->with('login_success', 'Your data has been updated');

            }
            else{

                return redirect('/login')->with('fetch_error', 'You are not registor,or maybe you deleted');

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
    }
}
