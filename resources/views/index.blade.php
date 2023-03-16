<x-header />
<style>
    .arrow_carrot-left:before {
        content: "←	" !important;
    }

    .arrow_carrot-right:before {
        content: "→	" !important;
    }
</style>
<?php
$gallery_length = count($all_data['gallery']) - 1;
// $animeSetting_length = count($all_data['animeSetting']) - 1;
// $cateory_length = count($all_data['cateory']) - 1;
?>
{{-- {{pre($all_data)}} --}}
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container-fluid " style="width:90%  !important">
        <div class="hero__slider owl-carousel">
            @for ($i = 0; $i <= $gallery_length; $i++)

                <div class="hero__items set-bg lazy"
                    data-setbg="{{ Storage::url('/img/anime') }}/{{ $all_data['gallery'][$i]['image_name'] }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                {{-- ============================================ --}}

                                <div class="label">{{ $all_data['gallery'][$i]['add_anime_title'] }}
                                </div>

                                <h2>{{ $all_data['gallery'][$i]['anime_title'] }}</h2>

                                {{-- ========================== --}}

                                <a href="{{ url('Watch-Anime/') }}/{{ $all_data['gallery'][$i]['folder_name'] }}/{{ $all_data['gallery'][$i]['anime_title'] }}">
                                    <span>Watch Now</span> <i class="fa fa-angle-right"></i>
                                    </a>
                                {{-- <p>After 30 days of travel across the world...</p> --}}


                            </div>
                        </div>
                    </div>
                </div>

            @endfor


        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">


        <div class="row">
            <div class="col-lg-12">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>All Anime</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                {{-- <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($all_data['paginate_anime'] as $anime_data)
                            {{-- {{$anime_data->anime_image}} --}}

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                 <a href="{{ url('anime-detail/') }}/{{ $anime_data->anime_id}}?{{$anime_data->anime_title}}">
                                    <div class="product__item__pic set-bg lazy"
                                        data-setbg="{{ Storage::url('/img/anime') }}/{{ $anime_data->anime_image }}">
                                        {{-- <div class="ep">18 / 18</div> --}}
                                        {{-- <div class="comment"><i class="fa fa-comments"></i> 11</div> --}}
                                        {{-- <div class="view"><i class="fa fa-eye"></i> 9141</div> --}}
                                    </div>
                                 </a>
                                    <div class="product__item__text">
                                        <ul>

                                            @if ($anime_data->anime_status == 1)
                                                <li>Active</li>
                                            @else
                                                <li>non-Active</li>
                                            @endif
                                            <li>{{$anime_data->add_anime_title}}</li>


                                        </ul>
                                        <h5><a href="{{ url('anime-detail/') }}/{{ $anime_data->anime_id}}?{{$anime_data->anime_title}}">
                                            {{ $anime_data->anime_title }}
                                        </a>
                                    </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                {{ $all_data["paginate_anime"]->links('vendor.pagination.custom') }}
            </div>


            {{--  <div class="col-lg-4 col-md-6 col-sm-8">
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
                            <div class="product__sidebar__view__item set-bg mix day" data-setbg="img/sidebar/tv-5.jpg">
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
            </div>  --}}
        </div>


    </div>
</section>
<!-- Product Section End -->
<x-footer />
<script src="{{ url('js/owl.carousel.min.js') }}"></script>
<?php
// $documents = json_decode('https://api.streamsb.com/api/folder/list?key=18269ngt2czq81cjo3uir&fld_id=240412');

?>

<script>
  $('.owl-carousel').owlCarousel({
    items:4,
    lazyLoad:true,
    loop:true,
    margin:10
});

$(function() {
        $('.lazy').lazy();
    });
    // $(document).ready(function(){

    // $.ajax({
    //     type: "GET",
    //     url: "https://api.streamsb.com/api/folder/list",
    //     data: {
    //         key:"18269ngt2czq81cjo3uir",
    //         fld_id:240412
    //     },

    //     success: function (response) {
    // console.log(response);
    //     }
    // });
    // })
</script>
