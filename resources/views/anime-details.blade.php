<?php
$all_detail = (array) json_decode(json_encode($all_detail), true);
// print_r($all_detail[1]['data_description']);

// pre($all_detail);
$count_id = 0;

if (count($all_detail[2]['meta_tag']) > 0) {
    $title = $all_detail[2]['meta_tag'][0]['meta_title'];
    $meta_desc = Storage::get('meta_tag/' . $all_detail[2]['meta_tag'][0]['meta_description']);
    $meta_key = $all_detail[2]['meta_tag'][0]['meta_keywords'];
    $abc=(array)json_decode($meta_key,true);

} else {
    $title = 'Anime | template';
    $meta_desc = 'anime website free';
    $meta_key = 'anime, website, free Anime Website';
}
?>

{{-- {{$all_detail[2]["meta_tag"][0]["meta_title"]}} --}}

{{-- <x-header title="abc" /> --}}
<?php


// pre( $abc[0]["value"]);
?>

<x-header title="{{ $title }}" desc="{{ $meta_desc }}" :keys="$meta_key" />

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    {{-- <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">Categories</a>
                        <span>Romance</span> --}}
                    <a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        aria-controls="offcanvasExample">GENRE</a>
                    <a
                        href="{{ url('/category/') }}/{{ $all_detail[0]['details'][0]['add_anime_title'] }}">{{ $all_detail[0]['details'][0]['add_anime_title'] }}</a>
                    <span>{{ $all_detail[0]['details'][0]['anime_title'] }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

{{-- @foreach ($all_detail[0]['details'][0] as $detail) --}}

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg"
                        data-setbg="{{ Storage::url('/') }}/img/anime/{{ $all_detail[0]['details'][0]['anime_image'] }}">
                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3>{{ $all_detail[0]['details'][0]['anime_title'] }}</h3>
                            {{-- <span>フェイト／ステイナイト, Feito／sutei naito</span> --}}
                        </div>
                        {{--  <div class="anime__details__rating">
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                            <span>1.029 Votes</span>
                        </div>  --}}

                      @php

                      echo print_r($all_detail[1]['data_description'],true)
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
                        <div class="anime__details__btn">
                            {{-- <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a> --}}
                            <a href="{{ url('/') }}/Watch-Anime/{{ $all_detail[0]['details'][0]['flid'] }}/{{ $all_detail[0]['details'][0]['anime_title'] }}?Ep=1"
                                class="watch-btn"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- @endforeach --}}
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="anime__details__review">

                </div>
                {{--  <div class="anime__details__form">
                    <div class="section-title">
                        <h5>Your Comment</h5>
                    </div>
                    <form action="#">
                        <textarea placeholder="Your Comment"></textarea>
                        <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                    </form>
                </div>  --}}
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="anime__details__sidebar">
                    <div class="section-title">
                        <h5>you might like...</h5>
                    </div>
                    {{--  <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-1.jpg">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Boruto: Naruto next generations</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-2.jpg">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-3.jpg">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-4.jpg">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                    </div>  --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Anime Section End -->
<x-footer />
