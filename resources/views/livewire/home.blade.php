@section('head')
    <style>
        swiper-container {
            width: 100%;
            padding-top: 10px;
            padding-bottom: 50px;
        }

        swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 350px;
            border: 1px solid #9f9e9e;
            box-shadow: 3px 3px 3px;
            padding: 3px;
        }

        swiper-slide img {
            display: block;
            width: 100%;
        }

        .bg-body-tertiary {
            background-color: transparent!important;
        }
    </style>
@endsection
<div >
    <div class="card" style="box-shadow: white 5px 5px 10px 10px">
        <div class="card-body">
            <h2>Latest 10 Artists</h2>
            <swiper-container
                keyboard-control="true"
                class="mySwiper"
                pagination="true"
                effect="coverflow"
                grab-cursor="true"
                centered-slides="true"
                slides-per-view="auto"
                coverflow-effect-rotate="50"
                coverflow-effect-stretch="0"
                coverflow-effect-depth="100"
                coverflow-effect-modifier="1"
                coverflow-effect-slide-shadows="true"
            >
                @foreach($artists as $artist)
                    <swiper-slide>
                        <div>
                            <h4>{{$artist->user->name}}</h4>
                            <img src=" https://swiperjs.com/demos/images/nature-1.jpg" />
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>
        </div>

    </div>

    <div class="card" style="margin-top: 60px; box-shadow: white 5px 5px 10px 10px">
        <div class="card-body" >
            <h2>Best 5 Albums sold</h2>
            <swiper-container
                keyboard-control="true"
                class="mySwiper"
                pagination="true"
                effect="coverflow"
                grab-cursor="true"
                centered-slides="true"
                slides-per-view="auto"
                coverflow-effect-rotate="50"
                coverflow-effect-stretch="0"
                coverflow-effect-depth="100"
                coverflow-effect-modifier="1"
                coverflow-effect-slide-shadows="true"
            >
                @foreach($albums as $album)
                    <swiper-slide>
                        <div>
                            <h4>{{$album->name}}</h4>
                            <img src=" https://swiperjs.com/demos/images/nature-1.jpg" />
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>
        </div>
    </div>
</div>



@section('foot')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
@endsection
