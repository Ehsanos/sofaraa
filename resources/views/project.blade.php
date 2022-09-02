@extends('layouts.master')
@php
    $lang=session('lang')??'ar';
@endphp
@section('content')

    <section>
     
        <div class="container">
           
            <div class="row">
                <div class="col-md-12">
                         <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($project['images_'.$lang]  as $key=>$slider)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}"
                        class="active" aria-current="true" aria-label="Slide {{$key+1}}"></button>
            @endforeach
        </div>
        <div class="carousel-inner my-2 px-2" style="max-height: 600px !important">
            @foreach($project['images_'.$lang] as $img)

                <div class="carousel-item @if($loop->first) active @endif">
                        
                     <img class="img-fluid w-100" src="{{asset('public/images/project/'.$img)}}" alt="Image">
                    
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
               
                    
                    
                    
                    
                    
                    
                  
                </div>
                <div class="col-md-4">
                     <h1 class="my-4">{{$project->title->$lang}}<br></h1>
                    <h3 class="my-3">{{__('lang.description')}}</h3>
                    <p>{!!$project->description->$lang!!}</p>
                    <h3 class="my-3">{{__('lang.details')}} </h3>
                    <ul class="list-unstyled">
                        <li><span class="green-color">{{__('lang.target')}} : </span>{{$project->total_amount}}</li>
                        <li><span class="green-color">{{__('lang.current')}} : </span>{{$project->current_amount}}</li>
                        <li><span class="green-color">{{__('lang.num_donate')}} : </span>{{$project->number_of_donors}}</li>
                        <li><span class="green-color">{{__('lang.section')}} : </span>{{$project->section->name->$lang}}</li>
                        <li><span class="green-color">{{__('lang.state')}} : </span>@if($project->finish_state){{__('lang.active_pro')}} @else {{__('lang.unactive_pro')}} @endif</li>


                    </ul>
                </div>
                <div class="col-md-8">
                       @if(!empty($project->vedio_url))
        <div class="d-block d-flex justify-content-center embed-responsive-16by9">
{{--            <iframe allowfullscreen="" frameborder="0" src="https://www.youtube.com/embed/5Bryh9T8qCU" class="embed-responsive-item w-100"  height="315"></iframe>--}}
       {!! $project->vedio_url !!}
        </div>
        @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><br></div>
            </div>
        </div>
    </section>
    @stop
