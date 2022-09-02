@extends('layouts.master')
@php
    $lang=session('lang')??'ar';
@endphp
@section('content')

    <section>

        <div class="container">
            <h1 class="my-4">{{$office->name->$lang}}<br></h1>
            <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid w-100" src="{{asset('public/images/office/'.$office->image_url)}}" alt="Image">
                </div>
                <div class="col-md-4">
                    <h3 class="my-3">{{__('lang.description')}}</h3>
                    <p>{{$office->description->$lang}}</p>
                    <ul class="list-inline">
                        @foreach($office->areas as $area)
                        <li class="list-inline-item mx-1"><a href="{{route('projects.area',$area->id)}}">{{$area->name->$lang}}</a></li>
                        @endforeach
                    </ul>
                    <!--<h3 class="my-3">{{__('lang.details')}} </h3>-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     
                </div>
            </div>
        </div>
    </section>
    @stop
