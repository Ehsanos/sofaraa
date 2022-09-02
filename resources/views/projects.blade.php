@extends('layouts.master')
@php
    $lang=session('lang')??'ar';
@endphp
@section('content')
    <section>
         <h1 class=" text-center my-5  text-dark px-4" style="font-size:32px !important">{{__('lang.projects_us')}}</h1>
        <div class="container">
            <div class="row justify-content-center">
                @foreach($projects as $project)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <figure class="snip1527" style="min-height: 320px; max-height: 400px">
                            <div class="image">
                                @if(isset($project['images_'. $lang]))
                                <img src="{{asset('public/images/project/'.$project['images_'.$lang][0])}}" class="w-100"  height="320px"  alt="pr-sample25"/>
                                @endif
                            </div>
                            <figcaption class="w-100">
                                <div class="date">
                                    <span class="day">{{$project->total_amount}}</span>
                                    <span class="month">$</span>
                                </div>
                                <h4>{{\Illuminate\Support\Str::substr($project->title->$lang,0,30)}}..</h4>
                                <!--<p>
                                    {{\Illuminate\Support\Str::substr($project->description->$lang,0,100)}}...
                                </p>-->
                            </figcaption>
                            <a href="{{route('projects.show',$project)}}"></a>
                        </figure>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12"></div>
                {{$projects->links()}}
            </div>
        </div>
    </section>

@stop
