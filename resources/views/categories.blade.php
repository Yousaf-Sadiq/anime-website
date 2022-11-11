<x-header />
    <!-- Breadcrumb Begin -->

    <?php
//     echo "<pre>";
//         print_r($anime_cat);
// echo "</pre>";

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (request()->id=="ASC" || request()->id=="DESC" ) {

    $actual_link = url("/")."/category/";
}
else{
// echo $actual_link;
$strArray = explode('/',$actual_link);
$name = $strArray[1];
$something = $strArray[2];
}
// echo $actual_link;
// echo $name;
if (request()->id !="ASC" && request()->id !="DESC" ) {
// echo request()->id;
    // unset($_COOKIE['request_id']);
    $cookie_name = "request_id";
// $cookie_value =request()->id;
if (!empty($strArray[4])&& !empty($strArray[5]) ) {
    Session::put($cookie_name, array($strArray[4],$strArray[5]));
// print_r(Session::get($cookie_name));
// echo is_array(Session::get($cookie_name));
}
else{
    Session::put($cookie_name, request()->id);
// dd($_COOKIE["request_id"]);
// Session::get($cookie_name);

}
// setcookie($cookie_name,$cookie_value, time(), "/");


}
else{
    $cookie_name = "request_id";
    Session::forget("request_id");
}

?>
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">Categories </a>
                        <span>@if (!empty(Session::get($cookie_name)))
                        @if (is_array(Session::get($cookie_name))==1)
                            {{Session::get("request_id.0")}}
                            <input type="hidden" id="cat_name" value="{{Session::get("request_id.0")}}">
                        @else

{{-- {{Session::get($cookie_name)}} --}}
<input type="hidden" id="cat_name" value="{{Session::get($cookie_name)}}">
                        @endif



                        @else

                                All Category anime

                        @endif
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
<div id="error">
</div>
    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <input type="hidden"  id="order" value="<?php
if (!empty($_GET["order_by"])&& isset($_GET["order_by"]) ) {
    echo $_GET["order_by"];
}
?>">
<input type="hidden" id="category_name" value="<?php
if (!empty($_GET["name"])&& isset($_GET["name"]) ) {
    echo $_GET["name"];
}
?>
">
                                        <h4 id="category_name">@if (!empty(Session::get($cookie_name)))
                                            @if (is_array(Session::get($cookie_name))==1)
                                                {{Session::get("request_id.0")}}
                                                <input type="hidden" id="cat_name" value="{{Session::get("request_id.0")}}">
                                            @else

                    {{Session::get($cookie_name)}}
                    <input type="hidden" id="cat_name" value="{{Session::get($cookie_name)}}">
                                            @endif



                                            @else

                                                    All Category anime

                                            @endif</h4>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="product__page__filter">
                                        <p>Order by:</p>
                                        <select id="order_by" name="order_by">
                                            <option  value="" class="disabled">Select anyone</option>
                                            <option value="ASC">A-Z</option>
                                            <option value="DESC">Z-A</option>
                                            {{-- <option value="">10-50</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
if (empty($anime_cat[0]) || !isset($anime_cat[0])) {


                                ?>

<div class="col-lg-8 col-md-8 col-sm-8 ">
    <div class="product__item">
        <div class="product__item__pic set-bg" style="height:235px !important;" data-setbg="{{Storage::url('img/anime')}}/not_found.gif">
            {{-- <div class="ep">18 / 18</div>
            <div class="comment"><i class="fa fa-comments"></i> 11</div>
            <div class="view"><i class="fa fa-eye"></i> 9141</div> --}}
        </div>
        <div class="product__item__text">
            <ul>
                <li>nothing found</li>
                <li>NONE</li>
            </ul>
            <h3 style="color: whitesmoke"> NO Anime Found</h3>
        </div>
    </div>
</div>

<?php
}
else{



?>
                            @foreach ($anime_cat as $anime )


                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <a href="{{url("/")}}/anime-detail/{{$anime->anime_id}}?{{$anime->anime_title}}">
                                    <div class="product__item__pic set-bg" style="height:235px !important;" data-setbg="{{Storage::url('img/anime')}}/{{$anime->anime_image}}">
                                        {{-- <div class="ep">18 / 18</div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> 9141</div> --}}
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{$anime->episodes_status}}</li>
                                            {{-- <li>Movie</li> --}}
                                        </ul>
                                        <h5 style="color: white"><a href="{{url("/")}}/anime-detail/{{$anime->anime_id}}?{{$anime->anime_title}}">{{$anime->anime_title}}</a></h5>

                                    </a>
                                    </div>
                                </div>
                            </div>


                        @endforeach


                        </div>
                    </div>

                  {{ $anime_cat->links('vendor.pagination.custom') }}
                  <?php
                }
                    ?>

                  {{-- @if ($anime_cat->hasPages())

                    {{-- <a href="#">{{ $anime_cat->links() }}</a> --}}


{{--
                  <div class="product__pagination">
                        <a href="#" class="current-page">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#"><i class="fa fa-angle-double-right"></i></a>
                    </div> --}}
              <?php
              if (empty($anime_cat[0]) || !isset($anime_cat[0])) {

              ?>

<?php
              }
              else{
                echo " </div>";
              }
?>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Top Views</h5>
                            </div>
                            <ul class="filter__controls">
                                <li class="active" data-filter="*">Day</li>
                                <li data-filter=".week">Week</li>
                                <li data-filter=".month">Month</li>
                                <li data-filter=".years">Years</li>
                            </ul>
<br>
                            <div class="filter__gallery">
                                <div class="product__sidebar__view__item set-bg mix day years"
                                data-setbg="img/sidebar/tv-1.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Boruto: Naruto next generations</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg mix month week"
                            data-setbg="img/sidebar/tv-2.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg mix week years"
                        data-setbg="img/sidebar/tv-3.jpg">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg mix years month"
                    data-setbg="img/sidebar/tv-4.jpg">
                    <div class="ep">18 / ?</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix day"
                data-setbg="img/sidebar/tv-5.jpg">
                <div class="ep">18 / ?</div>
                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                <h5><a href="#">Fate stay night unlimited blade works</a></h5>
            </div>
        </div>
    </div>
    <div class="product__sidebar__comment">
        <div class="section-title">
            <h5>New Comment</h5>
        </div>
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
                <img src="img/sidebar/comment-1.jpg" alt="">
            </div>
            <div class="product__sidebar__comment__item__text">
                <ul>
                    <li>Active</li>
                    <li>Movie</li>
                </ul>
                <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
            </div>
        </div>
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
                <img src="img/sidebar/comment-2.jpg" alt="">
            </div>
            <div class="product__sidebar__comment__item__text">
                <ul>
                    <li>Active</li>
                    <li>Movie</li>
                </ul>
                <h5><a href="#">Shirogane Tamashii hen Kouhan sen</a></h5>
                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
            </div>
        </div>
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
                <img src="img/sidebar/comment-3.jpg" alt="">
            </div>
            <div class="product__sidebar__comment__item__text">
                <ul>
                    <li>Active</li>
                    <li>Movie</li>
                </ul>
                <h5><a href="#">Kizumonogatari III: Reiket su-hen</a></h5>
                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
            </div>
        </div>
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
                <img src="img/sidebar/comment-4.jpg" alt="">
            </div>
            <div class="product__sidebar__comment__item__text">
                <ul>
                    <li>Active</li>
                    <li>Movie</li>
                </ul>
                <h5><a href="#">Monogatari Series: Second Season</a></h5>
                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>

<!-- Product Section End -->
<x-footer />

<script>
 function  changeurl2() {

var order_by2=$("#order").val();
var cat_name2=$("#category_name").val();



// var cat_name2=$("#category_name").val();
// alert(order_by2)

if ($.trim(cat_name2).length !== 0 &&  $.trim(order_by2).length !== 0 ) {
ChangeUrl("Anime| template","{{url('category/')}}/"+cat_name2+"/"+order_by2)

// check_url(cat_name2,order_by2)

location.reload();

// ChangeUrl2("Anime| template","{{url('category/')}}")

// location.reload();
// $(window.location)[0].replace("{{url('category/')}}");
;
}
else{
ChangeUrl("Anime| template","{{url('category/')}}/"+order_by2)
location.reload();
// check_url2(order_by2)

}

}

// =============================================
function ChangeUrl(page, url) {
        if (typeof (history.pushState) != "undefined") {
            var obj = { Page: page, Url: url };
            history.pushState(obj, obj.Page, obj.Url);
// console.log(lastSegment);


            // changeurl2();

        } else {
            alert("Browser does not support HTML5.");
        }
    }

$("select#order_by").on("change",function(){



var order_by=$(this).val();

var cat_name=$("#cat_name").val();

var order_by2=$("#order").val(order_by);
var cat_name2=$("#category_name").val(cat_name);

// alert(order_by)





// ========================

if ($.trim(cat_name2).length == 0 &&  $.trim(order_by2).length !== 0 ) {
    ChangeUrl("Anime| template","{{url('category/')}}/"+order_by+"?order_by="+order_by)


    // changeurl2()
    // ChangeUrl("Anime| template","{{url('category/')}}")

    // ChangeUrl2("Anime| template","{{url('category/')}}")


    // $(window.location)[0].replace("{{url('category/')}}");
;
}
else{

ChangeUrl("Anime| template","{{url('category/')}}/"+cat_name+"?name="+cat_name+"&order_by="+order_by)
changeurl2()





}





})

</script>
