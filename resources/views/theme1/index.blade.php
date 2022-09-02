@extends('theme1.layouts.master')
@php
    $lang=session('lang')??'ar';
@endphp
@section('content')
    <section id="carousel" class="mt-2">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
                @foreach($sliders as $key=>$slider)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <div class="jumbotron pulse animated hero-nature carousel-hero">
                            @if($slider->title->$lang!='')
                                <h1 class="hero-title">{{$slider->title->$lang}}</h1>
                            @endif
                                @if($slider->description->$lang!='' &&$slider->description->$lang!=null &&$slider->description->$lang!="null")
                                    <p class="hero-subtitle">{!!$slider->description->$lang!!}</p>
                                @endif

                        </div>
                    </div>
                @endforeach
            </div>
            <div>
                <a class="carousel-control-prev" href="#carousel-1" role="button" @if($lang=='ar')  data-slide="next" @else data-slide="prev"  @endif>
                    <i class="fa @if($lang=='ar')  fa-chevron-right @else fa-chevron-left @endif"></i><span class="sr-only">Previous</span></a>
                <a class="carousel-control-next" href="#carousel-1" role="button" @if($lang=='ar')  data-slide="prev" @else  data-slide="next" @endif><i
                        class="fa @if($lang=='ar')  fa-chevron-left @else fa-chevron-right @endif"></i><span class="sr-only">Next</span>
                </a>
            </div>
            <ol class="carousel-indicators">
                @foreach($sliders as $key=>$slider)
                    <li data-target="#carousel-1" data-slide-to="{{$key}}" @if($loop->first) class="active" @endif></li>
                @endforeach


            </ol>
        </div>
    </section>
    <section class="pt-5">
        <div class="container mt-2">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center text-uppercase" data-aos="fade-up" data-aos-duration="400">Featured Causes<br></h2>
                    <div class="d-flex flex-row justify-content-center align-items-center" data-aos="fade-up" data-aos-duration="600">
                        <div class="divider"></div><svg xmlns="http://www.w3.org/2000/svg" viewBox="-64 0 512 512" width="1em" height="1em" fill="currentColor" class="mx-2">
                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M16 319.1C16 245.9 118.3 89.43 166.9 19.3C179.2 1.585 204.8 1.585 217.1 19.3C265.7 89.43 368 245.9 368 319.1C368 417.2 289.2 496 192 496C94.8 496 16 417.2 16 319.1zM112 319.1C112 311.2 104.8 303.1 96 303.1C87.16 303.1 80 311.2 80 319.1C80 381.9 130.1 432 192 432C200.8 432 208 424.8 208 416C208 407.2 200.8 400 192 400C147.8 400 112 364.2 112 319.1z"></path>
                        </svg>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel slide" data-ride="carousel" id="carousel-4">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <section class="card-section-imagia" style="color: white;background: rgba(0,0,0,0);">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div data-aos="fade-up" data-aos-duration="900" class="card-container-imagia">
                                        <div class="card-imagia">
                                            <div class="flex-column front-imagia">
                                                <div class="cover-imagia cover-gradient"></div>
                                                <div class="content-imagia">
                                                    <h3 class="text-left name-imagia text-uppercase text-dark my-2">Omama Sariya Alrefaie<br></h3>
                                                    <p class="text-left subtitle-imagia my-4">The good is in my nation until the day of judgment <br>Sufraa Alkhayr blessed your efforts.<br></p>
                                                    <div class="progres-bar my-2">
                                                        <div class="progres"></div>
                                                    </div>
                                                    <p class="text-left subtitle-imagia mt-3">100 , 2000 , 15200<span class="mx-3 text-danger">75%</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div data-aos="fade-up" data-aos-duration="900" class="card-container-imagia">
                                        <div class="card-imagia">
                                            <div class="flex-column front-imagia">
                                                <div class="cover-imagia"></div>
                                                <div class="content-imagia">
                                                    <h3 class="text-left name-imagia text-uppercase text-dark my-2">Omama Sariya Alrefaie<br></h3>
                                                    <p class="text-left subtitle-imagia my-4">The good is in my nation until the day of judgment <br>Sufraa Alkhayr blessed your efforts.<br></p>
                                                    <div class="progres-bar my-2">
                                                        <div class="progres"></div>
                                                    </div>
                                                    <p class="text-left subtitle-imagia mt-3">100 , 2000 , 15200<span class="mx-3 text-danger">50%</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div data-aos="fade-up" data-aos-duration="900" class="card-container-imagia">
                                        <div class="card-imagia">
                                            <div class="flex-column front-imagia">
                                                <div class="cover-imagia cover-gradient"></div>
                                                <div class="content-imagia">
                                                    <h3 class="text-left name-imagia text-uppercase text-dark my-2">Omama Sariya Alrefaie<br></h3>
                                                    <p class="text-left subtitle-imagia my-4">The good is in my nation until the day of judgment <br>Sufraa Alkhayr blessed your efforts.<br></p>
                                                    <div class="progres-bar my-2">
                                                        <div class="progres-1"></div>
                                                    </div>
                                                    <p class="text-left subtitle-imagia my-3">100 , 2000 , 15200<span class="mx-3 text-danger">20%</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="carousel-item">
                    <section class="card-section-imagia" style="color: white;background: rgba(0,0,0,0);">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div data-aos="fade-up" data-aos-duration="900" class="card-container-imagia">
                                        <div class="card-imagia">
                                            <div class="flex-column front-imagia">
                                                <div class="cover-imagia cover-gradient"></div>
                                                <div class="content-imagia">
                                                    <h3 class="text-left name-imagia text-uppercase text-dark my-2">Omama Sariya Alrefaie<br></h3>
                                                    <p class="text-left subtitle-imagia my-4">The good is in my nation until the day of judgment <br>Sufraa Alkhayr blessed your efforts.<br></p>
                                                    <div class="progres-bar my-2">
                                                        <div class="progres"></div>
                                                    </div>
                                                    <p class="text-left subtitle-imagia mt-3">100 , 2000 , 15200<span class="mx-3 text-danger">75%</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div data-aos="fade-up" data-aos-duration="900" class="card-container-imagia">
                                        <div class="card-imagia">
                                            <div class="flex-column front-imagia">
                                                <div class="cover-imagia"></div>
                                                <div class="content-imagia">
                                                    <h3 class="text-left name-imagia text-uppercase text-dark my-2">Omama Sariya Alrefaie<br></h3>
                                                    <p class="text-left subtitle-imagia my-4">The good is in my nation until the day of judgment <br>Sufraa Alkhayr blessed your efforts.<br></p>
                                                    <div class="progres-bar my-2">
                                                        <div class="progres"></div>
                                                    </div>
                                                    <p class="text-left subtitle-imagia mt-3">100 , 2000 , 15200<span class="mx-3 text-danger">50%</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div data-aos="fade-up" data-aos-duration="900" class="card-container-imagia">
                                        <div class="card-imagia">
                                            <div class="flex-column front-imagia">
                                                <div class="cover-imagia cover-gradient"></div>
                                                <div class="content-imagia">
                                                    <h3 class="text-left name-imagia text-uppercase text-dark my-2">Omama Sariya Alrefaie<br></h3>
                                                    <p class="text-left subtitle-imagia my-4">The good is in my nation until the day of judgment <br>Sufraa Alkhayr blessed your efforts.<br></p>
                                                    <div class="progres-bar my-2">
                                                        <div class="progres-1"></div>
                                                    </div>
                                                    <p class="text-left subtitle-imagia my-3">100 , 2000 , 15200<span class="mx-3 text-danger">20%</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-4" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-4" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-4" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-4" data-slide-to="1"></li>
            </ol>
        </div>
    </section>



@stop
