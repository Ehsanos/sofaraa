@extends('theme1.layouts.master')
@php
    $lang=session('lang')??'ar';
@endphp
@section('content')
    <section>
        <h1 class=" text-center my-5  text-dark px-4" style="font-size:32px !important">{{__('lang.campaigns')}}</h1>
        <div class="container">
            <div class="row justify-content-center">
                @foreach($campaings as $com)
                    <div class="col-md-6 col-lg-4 col-xl-3">

                        <figure class="snip1527" style="min-height: 320px; max-height: 400px">
                            <div class="image">
                                <img src="{{asset('public/images/camping/'.$com->image_url->$lang)}}" class="w-100"  height="320px"  alt="pr-sample25"/>
                            </div>
                            <figcaption class="w-100">
                                @if($com->status)
                                <i class="fa fa-star fa-2x green-color"></i>
                                @endif
                                <div class="date">
                                    <span class="day">{{$com->total_amount}}</span>
                                    <span class="month">$</span>
                                </div>
                                <h4>{{\Illuminate\Support\Str::substr($com->title->$lang,0,30)}}..</h4>
                               <!-- <p>
                                    {{\Illuminate\Support\Str::substr($com->description->$lang,0,100)}}...
                                </p>-->
                            </figcaption>
                            <a href="{{route('campaigns.show',['campaign'=>$com])}}"></a>
                        </figure>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12"></div>
                {{$campaings->links()}}
            </div>
        </div>
    </section>

@stop
