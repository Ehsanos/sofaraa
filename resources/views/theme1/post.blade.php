@extends('theme1.layouts.master')
@php
    $lang=session('lang')??'ar';
@endphp
@section('content')

    <section>

<style>
    /*.video_post{*/
    /*    display:flex;*/
    /*    width:100%;*/
    /*    justify-content:center;*/
    /*    margin: 20px 0;*/

    /*}*/
    iframe{
        width:100%;
        /*height:100%;*/
    }
</style>
        <div class="container">
            <h1 class="my-4">{{$post->title->$lang}}<br></h1>
            <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid w-100" src="{{asset('public/images/post/'.$post->image)}}" alt="Image">
                </div>
                <div class="col-md-4">
                    <h3 class="my-3">{{__('lang.description')}}</h3>
                    <p>{!!$post->description->$lang!!}</p>
                    <!--<h3 class="my-3">{{__('lang.details')}} </h3>-->
                </div>
            </div>
            <div class="row justify-content-md-center">

            <div class="row justify-content-md-center">

                <div class="col col-sm-12  col-xs-12 col-md-8">
                 {!!$post->video!!}
                </div>

              </div>

                <!--<div class="col-md-12 col-lg-6 "><br></div>-->
                <!--<div class="col col-lg-2">{!!$post->video!!}</div>-->
            </div>

        </div>
    </section>
    @stop
