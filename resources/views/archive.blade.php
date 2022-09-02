@extends('layouts.master')
@php
    $lang=session('lang')??'ar';
@endphp
@section('content')
    <section> 
        <h1 class="green-color m-auto text-center text-light px-4 text-dark my-4" style="font-size:35px !important">{{__('lang.archive')}}</h1>
        <div class="container">
            <div class="row justify-content-center">
                @forelse($projects as $project)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <figure class="snip1527" style="min-height: 320px; max-height: 400px">
                       
                            
                                                
                             <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    @foreach($project->image_url as $key=>$slider)
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}"
                                                class="active" aria-current="true" aria-label="Slide {{$key+1}}"></button>
                                    @endforeach
                                </div>
                                <div class="carousel-inner my-2 px-2" style="max-height: 600px !important">
                                    @foreach($project->image_url as $img)
                        
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
                            
                            
                            
                            
                            
                            
                            
                            
                            <figcaption class="w-100">
                                <div class="date">
                                    <span class="day">{{$project->total_amount}}</span>
                                    <span class="month">$</span>
                                </div>
                                <h4>{{\Illuminate\Support\Str::substr($project->title->$lang,0,30)}}..</h4>
                                <p>
                                    {{\Illuminate\Support\Str::substr($project->description->$lang,0,100)}}...
                                </p>
                            </figcaption>
                            <a href="{{route('projects.show',$project)}}"></a>
                        </figure>
                    </div>
                    @empty
                    <h3>{{__('lang.no_project')}}</h3>
                @endforelse
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12"></div>
                {{$projects->links()}}
            </div>
        </div>
    </section>

@stop
