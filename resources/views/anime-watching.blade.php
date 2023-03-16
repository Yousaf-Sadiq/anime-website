<x-header />
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
    href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
{{-- rel="stylesheet" --}}

<style>
    .note-group-select-from-files {
        display: none;
    }

    .item-overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;

        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        overflow: hidden;
        text-align: center;
        /* fix text transition issue for .left and .right but need to overwrite left and right properties in .right */
        width: 100%;
        border-radius: 25px;
        -moz-transition: top 0.3s, right 0.3s, bottom 0.3s, left 0.3s;
        -webkit-transition: top 0.3s, right 0.3s, bottom 0.3s, left 0.3s;
        transition: top 0.3s, right 0.3s, bottom 0.3s, left 0.3s;
    }

    .hover1:hover .item-overlay.bottom {
        bottom: 0;
    }

    .item-overlay.bottom {
        bottom: 100%;
    }

    .hover {
        box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
        ;
    }

    body {
        overflow-x: hidden;
        height: 100%;
    }

    #overlay-back {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        /* height     : 100%; */
        background: #000;
        opacity: 0.9;
        filter: alpha(opacity=60);
        z-index: 5;
        display: none;
    }

    #overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10;
        display: none;
    }


    .player-controls {
        background: #08090b;
        position: relative;
        padding: 5px;
    }

    .pc-item,
    .toggle-lang,
    .toggle-onoff {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .player-controls .pc-item {
        float: left;
        margin: 5px;
        position: relative;
    }

    @media screen and (min-width: 1401px) {
        .pc-resize {
            display: block;
        }

    }

    .pc-resize {
        display: none;
    }

    .pc-item,
    .toggle-lang,
    .toggle-onoff {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .player-controls .pc-item {
        float: left;
        margin: 5px;
        position: relative;
    }

    .player-controls .pc-right {
        float: right;
    }

    .clearfix::after {
        display: block;
        clear: both;
        content: "";
    }

    .toggle-basic {
        position: relative;
        font-size: 12px;
        cursor: pointer;
        line-height: 30px;
    }

    .toggle-basic .tb-result {
        color: #ffef00;
        font-weight: 500;
        margin-left: 3px;
        width: 19px;
    }


    .box {
        --border-size: 3px;
        --border-angle: 0turn;

        background-image: conic-gradient(from var(--border-angle), #213, #112 50%, #213), conic-gradient(from var(--border-angle), transparent 20%, #08f, #f03);
        background-size: calc(100% - (var(--border-size) * 2)) calc(100% - (var(--border-size) * 2)), cover;
        background-position: center center;
        background-repeat: no-repeat;
        -webkit-animation: bg-spin 3s linear infinite;
        animation: bg-spin 3s linear infinite;
    }

    @-webkit-keyframes bg-spin {
        to {
            --border-angle: 1turn;
        }
    }

    @keyframes bg-spin {
        to {
            --border-angle: 1turn;
        }
    }

        {
            {
            -- .box:hover {
                -webkit-animation-play-state: paused;
                animation-play-state: paused;
            }

            --
        }
    }

    @property --border-angle {
        syntax: "<angle>";
        inherits: true;
        initial-value: 0turn;
    }
</style>
<!-- Css Styles -->
<link href="{{ url('css/pagination_style.css') }}" rel="stylesheet">

<?php
$anime_flids = json_decode(json_encode($anime_flid), true);
// pre($anime_flids);
//   echo "<pre>";
//         print_r($anime_flid[0][0]["flid"]);
// echo "</pre>";

$Api_key = '18269ngt2czq81cjo3uir';
// pre($anime_flid)
?>
<div id="overlay-back"></div>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    {{-- <i class="fa fa-home"></i> --}}
                    <a href="./index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        aria-controls="offcanvasExample">GENRE</a>
                    <a href="{{url("/category/")}}/{{$anime_flids[0][0]['add_anime_title']}}">{{$anime_flids[0][0]['add_anime_title']
                        }}</a>
                    <span>{{$anime_flids[0][0]['anime_title']}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<?php
  try {
?>
<div id="api">
    <?php

    $curl = curl_init();
    // key by default 948324jkl3h45h
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://api.streamsb.com/api/folder/list?key=' . $Api_key . '&fld_id=' . $anime_flids[0][0]['flid'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ]);

    $response = curl_exec($curl);

    $full_data = json_decode($response, true);
    // $length_full_data=(count($full_data)-1);
    if (count($full_data['result']['files']) == 1) {
        # code...
        $length_full_data_file = count($full_data['result']['files']);
    } else {
        $length_full_data_file = count($full_data['result']['files']) - 1;
    }

    curl_close($curl);

    // echo sizeof($full_data["result"]["files"]);
    // foreach($full_data as $data )
    // {
    //     $b=0;

    //     echo $data["status"];
    // $b++;
    // }

    ?>
</div>

<!-- Anime Section Begin -->
<style>
    @media (min-width: 992px) {
        .col-md-center {
            float: none;
            margin-left: auto;
            margin-right: auto;
        }
    }
</style>
<section class="anime-details spad d-flex flex-column align-content-center  flex-wrap justify-content-center ">
    <div class="container-fluid  " style="width:85%" >
        <div class="row  box ">
            <style>
                .scroller {
                    max-height: 400px;
                    overflow-y: scroll;
                    text-align: center;
                }
            </style>
            <div class="col-md-3 col-lg-3 col-xl-3 box p-3 " id="order_2">
                <div class="section-title">
                    <h4>Episode List</h4>
                    <br>
                    <h5 style="font-size: 1.1rem"> click on numbers to show more episode</h5>
                    <style>
                        #pagin li {
                            cursor: pointer;
                            color: white;
                            font-size: 2rem
                        }
                    </style>


                    <ul id="pagin" class="pagination modal-5">
                        {{-- <li><a href="#" class="prev fa fa-arrow-left"> </a></li> --}}
                        {{-- <li><a href="#" class="next fa fa-arrow-right"></a></li> --}}
                    </ul>
                </div>

                <div class="anime__details__episodes scroller">

                    <style>
                        .anime__details__episodes a {
                            display: inline-block;
                            font-size: 0.7rem;
                            color: #ffffff;
                            text-align: center;
                            background: rgba(255, 255, 255, 0.2);
                            padding: 10px 8px;
                            border-radius: 4px;
                            margin-right: 4px;
                            margin-bottom: 8px;
                            -webkit-transition: all, 0.3s;
                            -o-transition: all, 0.3s;
                            transition: all, 0.3s;
                        }
                        .episode{
                            width: 97%;
                            font-size: 1.3rem !important;
                            text-decoration: none !important;

                        }
                        @media screen and (max-width:768px){
                            .episode{
                                width: 35%;
                                font-size: 1.3rem !important;
                                text-decoration: none !important;

                            }

                        }
                    </style>
                    <?php
        $count=1;

                    for ($b=0; $b <=   $length_full_data_file ; $b++) {
                    // for ($b=0; $b <= 1000; $b++) {

                        // echo  "file===".$b.$full_data["result"]["files"][$b]["link"]."<br>";
                        // echo $full_data["result"]["files"][$b]["file_code"]."<br>";
                        // $replace=substr($full_data["result"]["files"][$b]["link"], 21);
                        // $new_video_url="https://sblanh.com/e/".$replace;


                        // array_push($myArr,$new_video_url);
                        ?>
                    @if ((Session::get("episode2")-1) >= $b )


                    <a class="episode" style="cursor: pointer; background-color:white; color:black;" data-id={{ $count
                        }}>
                        @if ($count <= 10) LECTURE-0{{ $count }} @else LECTURE-{{ $count }} @endif </a>
                            @else

                            <a class="episode" style="cursor: pointer;" data-id={{ $count }}>
                                @if ($count <= 10) LECTURE-0{{ $count }} @else LECTURE-{{ $count }} @endif </a>


                                    @endif
                                    <?php

$count++;
}

                        ?>

                                    {{-- <a href="#">Ep 02</a>
                                    <a href="#">Ep 03</a>
                                    <a href="#">Ep 04</a>
                                    <a href="#">Ep 05</a>
                                    <a href="#">Ep 06</a>
                                    <a href="#">Ep 07</a>
                                    <a href="#">Ep 08</a>
                                    <a href="#">Ep 09</a>
                                    <a href="#">Ep 10</a>
                                    <a href="#">Ep 11</a>
                                    <a href="#">Ep 12</a>
                                    <a href="#">Ep 13</a>
                                    <a href="#">Ep 14</a>
                                    <a href="#">Ep 15</a>
                                    <a href="#">Ep 16</a>
                                    <a href="#">Ep 17</a>
                                    <a href="#">Ep 18</a>
                                    <a href="#">Ep 19</a> --}}
                </div>
            </div>
            <div class="col-lg-9 col-md-9      text-center " id="order_1">
                <div class="">
                    <?php
                         if (isset($_GET["Ep"])|| !empty($_GET["Ep"])) {
                            $check_episode=($_GET["Ep"]-1);
                            Session::put("episode",$_GET["Ep"] );
                            // Session::forget("increament");
Session::put("episode2",$_GET["Ep"] );


                                                    }
                        else{
                            $check_episode=0;
                        }
pre(Session::get($anime_flids[0][0]['anime_title']));

                       // Session::put(["episode",($_GET["Ep"]-1)]);


// $full_data=array_sorts($full_data, )

                        $save_url_episode["link"]=[];

                        $file_uploaded["uploaded"]=[];
                        for ($b=0; $b <=$length_full_data_file ; $b++) {

                        // echo  "file===".$b.$full_data["result"]["files"][$b]["link"]."<br>";
                        // echo $full_data["result"]["files"][$b]["file_code"]."<br>";
                        $replace=substr($full_data["result"]["files"][$b]["link"], 21);

                        $new_video_url="https://sblanh.com/e/".$replace;

                        array_unshift($save_url_episode["link"],$new_video_url);
                        array_unshift($file_uploaded["uploaded"],$full_data["result"]["files"][$b]["uploaded"]);

?>



                    <?php
                        }

                        // ===============================

function array_sorts($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

function group_by($key, $data) {
    $result = array();

    foreach($data as $val) {
        if(array_key_exists($key, $val)){
            $result[$val[$key]][] = $val;
        }else{
            $result[""][] = $val;
        }
    }

    return $result;
}

                        $new_full_data[]=["links"=>$save_url_episode["link"],"uploaded"=>$file_uploaded["uploaded"]];



// $new_full_data2=group_by($new_full_data[],);

                        ?>
                    {{--
                    <pre>  --}}
    {{-- {{print_r($new_full_data)}} --}}
    {{--  </pre> --}}


                    {{-- ======================= --}}
                    <?php
// $save_url_episode=[];
for ($b=0; $b <=$length_full_data_file ; $b++) {

// echo  "file===".$b.$full_data["result"]["files"][$b]["link"]."<br>";
// echo $full_data["result"]["files"][$b]["file_code"]."<br>";
// $replace=substr($full_data["result"]["files"][$b]["link"], 21);

// $new_video_url="https://sblanh.com/e/".$replace;

// array_unshift($save_url_episode,$new_video_url);

?>


                    @if ($check_episode === $b)

                    {{-- {{$b." ".$save_url_episode["link"][$b]}} --}}
                    <input type="hidden" disabled id="iframe_value"
                        value="<?php echo $save_url_episode['link'][$b]; ?>">
                    <style>
                        .video_thumbnail .play-btn {
                            background: white;
                            background: #E63334;
                            display: inline-block;
                            padding: 25px;
                            position: absolute;
                            top: 50%;
                            border-radius: 50px;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            cursor: pointer;
                            animation: pulse 2s infinite;
                        }

                        #thumbnail {
                            box-shadow: 0 0 11px rgba(33, 33, 33, .2);
                        }

                        @-webkit-keyframes pulse {
                            0% {
                                -webkit-box-shadow: 0 0 0 0 rgba(204, 169, 44, 0.4);
                            }

                            70% {
                                -webkit-box-shadow: 0 0 0 10px rgba(204, 169, 44, 0);
                            }

                            100% {
                                -webkit-box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
                            }
                        }

                        @keyframes pulse {
                            0% {
                                -moz-box-shadow: 0 0 0 0 rgba(204, 169, 44, 0.4);
                                box-shadow: 0 0 0 0 rgba(204, 169, 44, 0.4);
                            }

                            70% {
                                -moz-box-shadow: 0 0 0 10px rgba(204, 169, 44, 0);
                                box-shadow: 0 0 0 10px rgba(204, 169, 44, 0);
                            }

                            100% {
                                -moz-box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
                                box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
                            }
                        }

                        .video_thumbnail .play-btn:after {
                            content: "";
                            display: block;
                            position: relative;
                            left: 2px;
                            width: 0;
                            height: 0;
                            border-style: solid;
                            cursor: pointer;
                            border-width: 10px 0 10px 20px;
                            border-color: transparent transparent transparent white;


                        }
                        .anime__details__pic{
                            height: 535px !important;
                        }
                        span{
                            color: whitesmoke
                        }
                    </style>
                    <div id="iframe">

                        <div class="row" id="thumbnail">
                            <div class="col-lg-12 col-md-12 h-100">
                                <div style="  box-shadow: rgba(31, 31, 137, 0.48) 6px 2px 16px 0px, rgba(30, 33, 101, 0.8) -6px -2px 16px 0px;
                                    ;" class="  video_thumbnail anime__details__pic set-bg"
                                    data-setbg="{{ Storage::url('/') }}/img/anime/{{ $anime_flids[0][0]['anime_image'] }}">

                                    <span class="play-btn"></span>
                                </div>
                            </div>
                        </div>
                        {{-- <IFRAME class="lazyload embed-responsive-item"
                            data-src="<?php echo $save_url_episode['link'][$b]; ?>" FRAMEBORDER=0 MARGINWIDTH=0
                            MARGINHEIGHT=0 SCROLLING=NO allowfullscreen></IFRAME> --}}
                    </div>


                    {{-- -===========================================player
                    controll====================================== --}}
                    <div class="player-controls" id="light_dark">
                        {{-- <div class="pc-item pc-resize">
                            <a href="javascript:;" id="media-resize" class="btn btn-sm"><i
                                    class="fas fa-expand mr-1"></i>Expand</a>
                        </div> --}}
                        <div class="pc-item pc-toggle pc-light">
                            <div id="turn-off-light" class="toggle-basic">
                                <span class="tb-name" style="color: whitesmoke"><i class="fas fa-lightbulb mr-2"></i>Light</span>
                                <span class="tb-result">ON</span>
                            </div>
                        </div>

                        <div class="pc-item pc-toggle pc-light">
                            @if (Session::get('user_email') == null && $anime_flids[2]['whishlist'] == '0')
                            <div class="toggle-basic" id="favrt_login">
                                <i class="fa fa-star fa-1x" style="font-size: 1rem;" aria-hidden="true"></i>
                                <span> Add to Favorite</span>
                            </div>
                            @elseif (Session::has('user_email') && $anime_flids[2]['whishlist'][0] != '0')
                            <div class="toggle-basic" id="favrt_delete" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Added to Favorite">
                                <i class="fa fa-star fa-1x" style="font-size: 1rem; color:#E53637"
                                    aria-hidden="true"></i> <span> Delete from Favorite</span>
                            </div>
                            @elseif (Session::has('user_email') && $anime_flids[2]['whishlist'][0] == '0')
                            <div class="toggle-basic" id="favrt" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="click to add into Favorite">
                                <i class="fa fa-star fa-1x" style="font-size: 1rem;" aria-hidden="true"></i>
                                <span> Add to Favorite</span>
                            </div>
                            @else
                            <div class="toggle-basic" id="favrt_login" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="login to add favorite">
                                <i class="fa fa-star fa-1x" style="font-size: 1rem;" aria-hidden="true"></i>
                                <span> Add to Favorite</span>
                            </div>
                            @endif


                        </div>

                        <div class="pc-right">

                            @if (isset($_GET['Ep']) && $_GET['Ep'] > 1)
                            <a href="<?php

                                    echo '?Ep=' . ($_GET['Ep'] - 1);

                                    ?>"><button class="btn btn-secondary" type="button"
                                    style="float:left;height: 32px;font-size: 14px;font-weight: normal;display: block;"><i
                                        class="fa fa-step-backward"></i> Previous</button>
                            </a>&nbsp;
                            @endif

                            @if (isset($_GET['Ep']) && $_GET['Ep'] <= $length_full_data_file) <a href="<?php

                                    echo '?Ep=' . ($_GET['Ep'] + 1);
                                    ?>"><button class="btn btn-secondary" type="button"
                                    style="float:right;height: 32px;font-size: 14px;font-weight: normal;display: block;">Next
                                    <i class="fa fa-step-forward"></i></button></a>
                                @endif
                                <div class="pc-item pc-fav" id="watch-list-content"></div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    @endif

                    <?php
}


?>


                    {{-- <video id="player" playsinline controls data-poster="./videos/anime-watch.jpg">
                        <source src="<?php echo $save_url_episode['link'][$b]; ?>" type="video/mp4" />
                        <!-- Captions are optional -->
                        <track kind="captions" label="English captions" src="#" srclang="en" default />
                    </video> --}}



                    {{-- {{print_r($myArr)}} --}}



                </div>

            </div>
        </div>
        {{-- 404 anime --}}
        <?php

    } catch (Throwable $th) {
        // throw $th;


            ?>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                <div class="product__item">
                    <div class="product__item__pic set-bg" style="height:300px background:cover; !important; width:100%"
                        data-setbg="{{ Storage::url('img/anime') }}/error_404.gif">
                        {{-- <div class="ep">18 / 18</div>
                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div> --}}
                    </div>
                    <div class="product__item__text">
                        <ul>
                            <li>nothing found</li>
                            <li>NONE</li>
                        </ul>
                        <h3 style="color: whitesmoke"> Nothing Found</h3>
                        <h5 style="color: rgb(219, 162, 162)">Error occur due to In-Correct URL or internet conncetion
                            Problem</h5>
                    </div>
                </div>
            </div>
        </div>
        <?php
 }
?>
        {{-- ================================ --}}
        <section class="anime-details spad">
            <div class="container">
                <div class="anime__details__content">
                    <div class="row">
                        <style>
                            #div1 {

                                width: 100% !important;
                                height: 100%;
                                position: absolute;
                                top: 0;
                                left: 0;
                                z-index: 10;
                                background-color: #15191c;
                                opacity: 0.5;
                            }

                            #div1:hover {
                                /* width: 0% !important; */
                                display: none;
                            }

                            .color {
                                color: white;
                                z-index: 99999;
                            }

                            .color:hover {
                                /* color: white;z-index:99999; */
                                font-weight: bolder;
                            }

                            h1 {
                                text-align: center;
                            }
                        </style>
                        {{-- pre($anime_flid[4]["season"]) --}}
                        @if ($anime_flid[4]["season"]!="0")


                        <?php
$count_season=1;
?>
                        @foreach ($anime_flid[4]["season"] as $season )

                        @if ($anime_flids[0][0]['anime_title']==$season->title)
                        <?php
$class="hover";
?>
                        @else
                        <?php
$class="";
?>
                        @endif
                        <div class="col-lg-3 ">
                            <div class="{{$class}} hover1 anime__details__pic set-bg d-flex justify-content-center align-items-center"
                                style="height:136px !important; position: relative;border-radius: 25px;"
                                data-setbg="{{ Storage::url('/')}}/img/anime/{{$season->anime_image }}">


                                <a class="nav-link" style="z-index: 9999999999999999999" href="{{url("/Watch-Anime")}}/{{$season->flid}}/{{$season->title}}?Ep=1">
                                    {{-- <div id="div1" class="d-flex justify-content-center align-items-center"> </div>
                                    --}}
                                    <div class="item-overlay bottom d-flex flex-wrap justify-content-center align-items-center"
                                        style="z-index: 999999">
                                        <h2 class="color">

                                            <?php
      echo "Season"."-".$count_season;
        $myString = $season->title;

         $strArray = explode('-',$myString);
        //  if (array_key_exists(1,$strArray)) {

        //      echo $strArray[1];

        //   }
        //   else{
        //     echo $strArray[0];
        //   }

$count_season++;
     ?>
                                        </h2>
                                </a>

                            </div>
                            {{-- <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div> --}}
                            {{--
                        </div> --}}

                    </div>
                </div>

                @endforeach
            </div>
            <br>
            <br>
            <br>
            @else

            <div class="row ">
                <div class="col-lg-3 ">
                    <div class="hover anime__details__pic set-bg d-flex justify-content-center align-items-center"
                        data-setbg="{{ Storage::url('img/anime') }}/error_404.gif"
                        style="height:136px !important; position: relative;">
                        <div id="div1" class="d-flex justify-content-center align-items-center"> </div>
                        <h4 style="color:whitesmoke;z-index:99999">No Season Found</h4>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>

            @endif

            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg"
                        data-setbg="{{ Storage::url('/') }}/img/anime/{{ $anime_flids[0][0]['anime_image'] }}">
                        {{-- <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div> --}}
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3>{{ $anime_flids[0][0]['anime_title'] }} </h3>
                            {{-- <span>フェイト／ステイナイト, Feito／sutei naito</span> --}}
                        </div>
                        {{-- <div class="anime__details__rating">
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                            <span>1.029 Votes</span>
                        </div> --}}

                        @php
                        echo print_r($anime_flids[1]['data_description'],true);

                        @endphp


                        {{-- <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Type:</span> TV Series</li>
                                        <li><span>Studios:</span> Lerche</li>
                                        <li><span>Date aired:</span> Oct 02, 2019 to ?</li>
                                        <li><span>Status:</span> Airing</li>
                                        <li><span>Genre:</span> Action, Adventure, Fantasy, Magic</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Scores:</span> 7.31 / 1,515</li>
                                        <li><span>Rating:</span> 8.5 / 161 times</li>
                                        <li><span>Duration:</span> 24 min/ep</li>
                                        <li><span>Quality:</span> HD</li>
                                        <li><span>Views:</span> 131,541</li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>


            {{-- @endforeach --}}

    </div>
</section>
<div class="row">
    <div class="col-lg-8">
        <div class="anime__details__form">
            <div class="section-title">
                <h5>Your Comment</h5>
            </div>
            <form action="{{ url('/anime-comments') }}" method="POST">
                @csrf
                <?php
                        {{--  session()->flush();  --}}
                        $actual_link2 = "$_SERVER[REQUEST_URI]";
                        ?>
                <input type="hidden" name="anime_id" value=" {{ $anime_flids[0][0]['anime_id'] }}">
                <input type="hidden" name="user_id" value="{{ Session::get('user_email') }}">
                <input type="hidden" name="current_url" value="{{ $actual_link2 }}">
                <textarea placeholder="Your Comment" style="color: black" class="summernote" id="summernote"
                    name="comments"></textarea>
                @if (session('status'))
                <div class="alert alert-success mt-1 mb-1">{{ session('status') }}</div>
                @endif
                @error('comments')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                @if (Session::has('user_email'))
                <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                @else
                <button id="comment" type="button"><i class="fa fa-location-arrow"></i> Review</button>

                @endif



            </form>
        </div>
        <br>
        <br>
        <br>
        <div class="anime__details__review">
            <div class="section-title">
                <h5>Reviews</h5>
            </div>

            {{-- {{pre($anime_flid[3]["comments"])}} --}}
            @foreach ($anime_flid[3]["comments"] as $anime_comments )

            {{-- {{$anime_comments["user_id"] }} --}}


            <div class="anime__review__item" style="position: relative !important;">
                <div class="anime__review__item__pic">
                    <img src="{{ Storage::url('profile/') }}{{$anime_comments->profile  }}" alt="">
                </div>
                {{-- {{date("Y-m-d h:i:s")}} --}}
                <div class="anime__review__item__text">

                    <h6>{{ $anime_comments->user_name}} - <span>
                            <?php
                                echo  dateDiff($anime_comments->created_at)

                    ?>
                        </span></h6>
                    @if (Session::get("user_email")==$anime_comments->email)

                    <h6
                        style="float: right !important;position: absolute;top: 11%;right: 3%;font-size: 1.1rem;z-index: 99999999999999999 !important;">


                        <span class="edit" data-id-span={{$anime_comments->comment_id}} style="cursor: pointer; float:
                            right !important;"> ⋮</span>
                    </h6>
                    @endif

                    </h6>
                    <?php
                                $actual_link2 = "$_SERVER[REQUEST_URI]";
                                ?>
                    <input type="hidden" name="anime_id" id="anime_id" value=" {{ $anime_flids[0][0]['anime_id'] }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ Session::get('user_email') }}">
                    <input type="hidden" name="current_url" id="current_url" value="{{ $actual_link2 }}">
                    <input type="hidden" name="comment_id" id="comment_id" value="{{$anime_comments->comment_id}}">
                    <p class="click2edit" data-id={{$anime_comments->comment_id}} >
                        @if (Storage::has($anime_comments->comments))
                        @php
                        echo print_r(Storage::get($anime_comments->comments),true)
                        @endphp

                        @else
                        {{$anime_comments->comments }}
                        @endif
                    </p>




                    <div>
                        <style>
                            .edit_btn {
                                font-size: 11px;
                                color: #ffffff;
                                font-weight: 700;
                                letter-spacing: 2px;
                                text-transform: uppercase;
                                background: #e53637;
                                border: none;
                                padding: 10px 15px;
                                border-radius: 2px;
                            }
                        </style>
                        <button class="edit_btn edite_button" style="display: none"
                            id="edit_{{$anime_comments->comment_id}}" type="button"><i class="fa fa-location-arrow"></i>
                            Review</button>
                        <button class="edit_btn  close" style="display: none" id="close_{{$anime_comments->comment_id}}"
                            type="submit"><i class="fa fa-times" aria-hidden="true"></i></i> close</button>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
        {{ $anime_flid[3]["comments"]->links('vendor.pagination.custom') }}
        <?php
                function dateDiff($date)
                {
                    $mydate= date("Y-m-d H:i:s");
                    $theDiff="";
                    //echo $mydate;//2014-06-06 21:35:55
                    $datetime1 = date_create($date);
                    $datetime2 = date_create($mydate);
                    $interval = date_diff($datetime1, $datetime2);
                    //echo $interval->format('%s Seconds %i Minutes %h Hours %d days %m Months %y Year    Ago')."<br>";
                    $min=$interval->format('%i');
                    $sec=$interval->format('%s');
                    $hour=$interval->format('%h');
                    $mon=$interval->format('%m');
                    $day=$interval->format('%d');
                    $year=$interval->format('%y');
                    if($interval->format('%i%h%d%m%y')=="00000") {
                        //echo $interval->format('%i%h%d%m%y')."<br>";
                        return $sec." Seconds";
                    } else if($interval->format('%h%d%m%y')=="0000"){
                        return $min." Minutes";
                    } else if($interval->format('%d%m%y')=="000"){
                        return $hour." Hours";
                    } else if($interval->format('%m%y')=="00"){
                        return $day." Days";
                    } else if($interval->format('%y')=="0"){
                        return $mon." Months";
                    } else{
                        return $year." Years";
                    }
                }
                ?>

    </div>
</div>
</div>
</section>
<input type="hidden" id="dark" value="">
<!-- Anime Section End -->
<x-footer />
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    // <input type="hidden" name="anime_id" id="anime_id" value=" {{ $anime_flid[0][0]['anime_id'] }}">
//                                 <input type="hidden" name="user_id" id="user_id" value="{{ Session::get('user_email') }}">
//                                 <input type="hidden" name="current_url" id="current_url" value="{{ $actual_link2 }}">

$(".edite_button").on("click",function(e){
    e.preventDefault()
var anime_id=$("#anime_id").val();
var user_id=$("#user_id").val();
var current_url=$("#current_url").val();
var comment_id=$("#comment_id").val();
var text_area= $("#"+comment_id).summernote('code');
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$.ajax({
 type: "POST",
    url: "{{url('/anime-comments-edit')}}",
    data: {
        anime_id:anime_id,
        user_id:user_id,
        current_url:current_url,
        comments:text_area,
        comment_id:comment_id
    },

    success: function (response) {
        // alert(response)
        $("#close_"+comment_id).after('<p id="msg" class="alert text-white" >'+response+'</p>')
// $("#msg").html(response)
        console.log(response)
setTimeout(() => {
    location.reload()
}, 700);

    }
});
})

</script>
<script>
    // edit  comment editor
$(".edit").on("click",function(){
    var id=$(this).attr("data-id-span")
    var id_p= $(this).parent().siblings("p").attr("data-id")
    if (id==id_p) {
        $("#edit_"+id).css({
            "display":"inline-block"
        })
        $("#close_"+id).css({
            "display":"inline-block"
        })


        $(this).parent().siblings("p").attr("id",id_p)
        {{--  alert(id)  --}}
        $("#"+id).summernote({
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ["fontNames", ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', [ 'paragraph']],
    ['height', ['height']]
  ]
});
        $('.note-editor').css({
            "background-color":"white",
            "color":"black"
        })

    }
// $('').on("change",function() {
// alert("ok")
//     // var dInput = this.value;
//     // console.log(dInput);
//     // $(".dDimension:contains('" + dInput + "')").css("display","block");
// });
})

// close comment editor
$(".close").on("click",function(){

    var id=$(this).parent().siblings("h6").children("span").attr("data-id-span")
var id_p= $(this).parent().siblings("p").attr("data-id")
// alert(id_p)

    $("#"+id_p).summernote('code');
  $("#"+id_p).summernote('destroy');

  $("#edit_"+id_p).css({
            "display":"none"
        })
        $("#close_"+id_p).css({
            "display":"none"
        })


})

</script>
<script>
    $(document).ready(function() {

        $("#favrt_login").on("click", function() {
            alert('Kindly login to save anime ')


        })


        $("#comment").on("click", function() {
            alert('Kindly login to Comment ')


        })

        // add to fvrt
        $("#favrt").on("click", function() {
            // alert('{{ $anime_flid[0][0]['anime_id'] }}')
            $.ajax({
                type: "GET",
                url: "{{ url('/add-fvrt') }}?anime_id={{ $anime_flid[0][0]['anime_id'] }}&&user_id={{ Session::get('user_email') }}",
                data: {
                    anime_id: '{{ $anime_flid[0][0]['anime_id'] }}',
                    user_id: '{{ Session::get('user_email') }}'
                },
                dataType: "json",
                success: function(response) {

                    $("#favrt_added").attr("title", response[0])
                    location.reload();
                    // console.log(response)
                    // alert(response)
                }
            });

        })

        //   delete fvrt from db
        $("#favrt_delete").on("click", function() {

            if (confirm("are You Sure")) {
                // ========================start=============
                $.ajax({
                    type: "GET",
                    url: "{{ url('/Delete_fvrt') }}/{{ $anime_flid[0][0]['anime_id'] }}",
                    data: {
                        anime_id: '{{ $anime_flid[0][0]['anime_id'] }}',
                        user_id: '{{ Session::get('user_email') }}'
                    },
                    dataType: "json",
                    success: function(response) {

                        // $("#favrt_added").attr("title",response[0])
                        alert(response)
                        location.reload();
                        // console.log(response)
                        // alert(response)
                    }
                });
                // ======================ajax end==================
                // alert('{{ $anime_flid[0][0]['anime_id'] }}')
            }



        })


        // dark mode on and off
        $("#turn-off-light").on("click", function() {
            vpw = $(window).width();
            vph = $(window).height();


            var iScrollHeight = $("body").prop("scrollHeight");
            $('#overlay-back').css({
                "height": iScrollHeight + "px"
            }).fadeIn(500);
            $("#iframe").css({
                "z-index": "9999999"
            })
            $("#thumbnail").css({
                "z-index": "9999999"
            })
             $(".video_thumbnail").css({
                "z-index": "9999999"
            })
            $("#dark").val("1")
        })

        $(document).on("click", function() {
            $("#dark").val("0")
            // the click event for outside of the container.
            if ($(event.target).closest("#light_dark").length === 0) {
                if ($('#overlay-back').css('display') == 'block') {
                    vpw = $(window).width();
                    vph = $(window).height();

                    var iScrollHeight = $("body").prop("scrollHeight");
                    $('#overlay-back').fadeOut(500);
                    $("#iframe").css({
                        "z-index": "1"
                    })
                    $("#thumbnail").css({
                        "z-index": "1"
                    })
                    $(".video_thumbnail").css({
                        "z-index": "1"
                    })
                } else {
                    console.log('It did not equal block');
                }

            }
        })
        // ===========================================================

        // load screen check
        document.addEventListener('readystatechange', event => {
            switch (document.readyState) {
                case "loading":
                    console.log("document.readyState: ", document.readyState,
                        `- The document is still loading.`
                    );
                    break;
                case "interactive":
                    console.log("document.readyState: ", document.readyState,
                        `- The document has finished loading DOM. `,
                        `- "DOMContentLoaded" event`
                    );
                    break;
                case "complete":
                    console.log("document.readyState: ", document.readyState,
                        `- The page DOM with Sub-resources are now fully loaded. `,
                        `- "load" event`
                    );



                    $("#thumbnail").on("click", function() {

                        var iframe_val = $("#iframe_value").val();
                        if (iframe_val == null || iframe_val == " " || iframe_val == "") {

                        } else {

                            var iframe = document.createElement('iframe');
                            iframe.src = iframe_val;
                            // iframe.classList.add("embed-responsive-item")
                            iframe.classList.add("lazy")
                            iframe.setAttribute("allowfullscreen", "allowfullscreen")
                            // iframe.style.width = '85%';
                            // iframe.style.height = '75%';
                            $("#thumbnail").hide();
                            $('#iframe').addClass('ratio ratio-16x9')

                            $("#iframe").append(iframe);

                        }

                    })

                    break;
            }
        });
        // ==========================

        // ready state ===============
        $(document).ready(function() {


            // }
            //Pagination
            pageSize = 150;
            incremSlide = 5;
            startPage = 0;
            numberPage = 0;

            var pageCount = $(".episode").length / pageSize;
            var totalSlidepPage = Math.floor(pageCount / incremSlide);

            for (var i = 0; i < pageCount; i++) {
                $("#pagin").append('<li ><a  >' + (i + 1) + '</a></li> ');
                if (i > pageSize) {
                    $("#pagin li").eq(i).hide();
                }
            }

            var prev = $("<li/>").addClass("page-item").html(" ").click(function() {
                startPage -= 5;
                incremSlide -= 5;
                numberPage--;
                slide();
            });

            prev.hide();

            var next = $("<li/>").addClass("page-item").html(" ").click(function() {
                startPage += 5;
                incremSlide += 5;
                numberPage++;
                slide();
            });

            $("#pagin").prepend(prev).append(next);

            $("#pagin li").first().find("a").addClass("active");

            slide = function(sens) {
                $("#pagin li").hide();

                for (t = startPage; t < incremSlide; t++) {
                    $("#pagin li").eq(t + 1).show();
                }
                if (startPage == 0) {
                    next.show();
                    prev.hide();
                } else if (numberPage == totalSlidepPage) {
                    next.hide();
                    prev.show();
                } else {
                    next.show();
                    prev.show();
                }


            }

            showPage = function(page) {
                $(".episode").hide();
                $(".episode").each(function(n) {
                    if (n >= pageSize * (page - 1) && n < pageSize * page)
                        $(this).show();
                });
            }

            showPage(1);
            $("#pagin li ").eq(0).addClass("active");

            $("#pagin li a").click(function() {
                $("#pagin li a").removeClass("active");
                $(this).addClass("active");
                showPage(parseInt($(this).text()));
            });

            if ($(window).width() < 768) {
                $("#order_1").addClass("order-1")
                $("#order_2").addClass("order-2")
            } else {

                if ($("#order_1").hasClass('order-1')) {
                    $("#order_1").removeClass('order-1');
                } else if ($("#order_2").hasClass('order-2')) {
                    // alert("ok")
                    $("#order_2").removeClass('order-2');

                }


            }
            $(window).resize(function() {
                if ($(window).width() < 768) {
                    $("#order_1").addClass("order-1")
                    $("#order_2").addClass("order-2")
                } else {

                    if ($("#order_1").hasClass('order-1')) {
                        $("#order_1").removeClass('order-1');
                    } else if ($("#order_2").hasClass('order-2')) {
                        // alert("ok")
                        $("#order_2").removeClass('order-2');

                    }


                }
            })





        })
        // ===================================
        function removeParams(sParam)
{
            var url = window.location.href.split('?')[0]+'?';
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] != sParam) {
                    url = url + sParameterName[0] + '=' + sParameterName[1] + '&'
                }
            }
            return url.substring(0,url.length-1);
}
        // episode url changer======================
        $('.episode').click(function(e) {

            var abc = "";
            //         var url = document.URL.split('?')[0]
            // location = url
            // alert(location)

            // let params = new URLSearchParams(url.search);
            // Delete the foo parameter.
            // params.delete("Ep")


            // alert(removeParams("Ep"))
            // window.location.href = " ";
            // alert($(this).attr('data-id'))
            // $(this).attr('data-id');
            abc = $(this).attr('data-id');
            var field = 'page';


function check_urls(field) {
    let url = window.location.href;

    if(url.indexOf('?' + field + '=') != -1)
{    return true;
}
    else if(url.indexOf('&' + field + '=') != -1)
 {
    return true;
 }
    return false

  }

if (check_urls(field)) {
    window.location.href = removeParams("Ep") + '&Ep=' + $(this).attr('data-id');

}
else{
    window.location.href = removeParams("Ep") + '?Ep=' + $(this).attr('data-id');

}
            // location.reload();


            return abc;

        })
        // =========================



        // =======================end==========

    })
</script>
