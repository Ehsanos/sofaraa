@extends('theme1.layouts.master')
@php
    $lang=session('lang')??'ar';
@endphp
@section('content')
    <section>
        <h1 class="green-color m-auto text-center text-dark text-light px-4 my-4" style="font-size:35px !important;">{{__('lang.news')}}</h1>
        <div class="container">
            <div class="row justify-content-center">
                @foreach($posts as $post)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <figure class="snip1527" style="min-height: 320px; ">
                            <div class="image">
                                <img src="{{asset('public/images/post/'.$post->image)}}" class="w-100"  height="320px"  alt="pr-sample25"/>
                            </div>
                            <figcaption class="w-100">
                               {{-- <div class="date">
                                    <span class="day">{{$project->total_amount}}</span>
                                    <span class="month">$</span>
                                </div>--}}
                                <h4>{{\Illuminate\Support\Str::substr($post->title->$lang,0,30)}}..</h4>
                              <!--  <p>
                                    {{\Illuminate\Support\Str::substr($post->description->$lang,0,100)}}...
                                </p>-->
                            </figcaption>
                            <a href="{{route('posts.show',$post)}}"></a>
                        </figure>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12"></div>
                {{$posts->links()}}
            </div>
        </div>
    </section>

@stop
