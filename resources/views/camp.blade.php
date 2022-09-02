@extends('theme1.layouts.master')
@php
    $lang=session('lang')??'ar';
@endphp
@section('content')

    <section>
        @if(!empty($campaign->vedio_url))
        <div class="d-block d-flex justify-content-center embed-responsive-16by9">
{{--            <iframe allowfullscreen="" frameborder="0" src="https://www.youtube.com/embed/5Bryh9T8qCU" class="embed-responsive-item w-100"  height="315"></iframe>--}}
       {!! $campaign->vedio_url !!}
        </div>
        @endif
        <div class="container">
            <h1 class="my-4">{{$campaign->title->$lang}}<br></h1>
            <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid w-100" src="{{asset('public/images/camping/'.$campaign->image_url->$lang  )}}" alt="Image">
                </div>
                <div class="col-md-4">
                    <h3 class="my-3">{{__('lang.description')}}</h3>
                    <p>{!!$campaign->description->$lang!!}</p>
                    <h3 class="my-3">{{__('lang.details')}} </h3>
                    <ul class="list-unstyled">
                        <li><span class="green-color">{{__('lang.target')}} : </span>{{$campaign->total_amount}}</li>
                        <li><span class="green-color">{{__('lang.current')}} : </span>{{$campaign->current_amount}}</li>
                        <li><span class="green-color">{{__('lang.num_donate')}} : </span>{{$campaign->number_of_donors}}</li>
                        <li><span class="green-color">{{__('lang.section')}} : </span>{{$campaign->section->name->$lang}}</li>
                        <li><span class="green-color">{{__('lang.state')}} : </span>@if($campaign->status){{__('lang.active_pro')}} @else {{__('lang.unactive_pro')}} @endif</li>
                          <li><span class="green-color">{{__('lang.country')}} : </span>


                              @foreach($campaign->nations as $key=> $nation)
                              <span > {{ $nation->name->$lang }} @if($key+1 <count($campaign->nations))<span style="font-weight: bold"> ,</span> @endif </span>
                               @endforeach



                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><br></div>
            </div>
        </div>
    </section>
    @stop
