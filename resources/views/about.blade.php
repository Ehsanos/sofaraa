@extends('layouts.master')
@php
    $lang=session('lang')??'ar';
@endphp
@section('content')



 <section>
      <div class="container"> 
     <div class="row justify-content-center">
         
         <div class="col-12"> <div class="ratio ratio-16x9"> {!! $about->video !!} </div>
         </div>
     </div> 
      </div>
    <div class="row">
        
         <div class="col-lg-6 col-sm-12 px-5 py-5">
                 {!! $about->description->$lang !!} 
         </div>
          <div class="col-md-6 col-sm-12">
                @foreach($about->images as $image)
                <center >
                    <img  class=" img-fluid  w-50 h-70" src="{{asset('public/images/aboutUs/'.$image)}}" alt="Image">
                </center>
                @endforeach
         </div>
    </div>
    
    
    @stop
