<?php
$lang = session('lang') ?? 'ar';

?>

    <!DOCTYPE html>
<html lang="{{$lang}}" dir="{{$lang=='ar'?'rtl':'ltr'}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{$setting->name}}</title>
    <link rel="icon"  href="{{asset('public/logo.ico')}}"/>
    <style>
        .bg-green-light{
            background:#52b69a !important;
        }
        .bg-blue-light{
            background:#184e77 !important;
        }
        .snip1527 figcaption:before{
            background:#184e77 !important;
        }
        #myFooter .row{
            margin-bottom:0px !important;
        }
        #fixed-social{
        top:70% !important;
        left:0 !important;
        }
    </style>
    @if($lang=='ar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css">
    @else
        <link rel="stylesheet" href="{{asset('public/assets/bootstrap/css/bootstrap.min.css')}}">
    @endif
    <link rel="stylesheet" href="{{asset('public/assets/css/styles.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700">
    <link rel="stylesheet" href="{{asset('public/assets/fonts/font-awesome.min.css')}}">
    
    
    
    <!-- font cdn  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    @if($lang=='ar')
    <style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@600&display=swap');
</style>
    <style>
        @font-face {
            font-face-name: 'cairo';
            src:'{{asset('public/assets/fonts/cairo.ttf')}}',
           
        }
        *{
            font-family: 'Noto Kufi Arabic', sans-serif;
            font-size:16px !important;
        }
       
        body{
            min-height: 100vh;
            font-family: 'Noto Kufi Arabic', sans-serif;
        }
      
        
    </style>
   
   
    @else
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@200&family=Oswald:wght@200&display=swap" rel="stylesheet"> 

<style>
      
        *{
             font-size:18px !important;
             /*font-family: 'Oswald', sans-serif;*/
             font-family: 'cairo', sans-serif;
        }
        body{
            min-height: 100vh;
            /*font-family: 'Oswald', sans-serif;*/
             font-family: 'cairo', sans-serif;
        }
    </style>
    <style>
         iframe{
           width:100% !important;
            min-height:500px;
        }
    </style>
    @endif
    
    <style>
        .flip-card {
  background-color: transparent;
  width: 300px;
  height: 300px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}
    </style>
</head>
<body>
<section class="bg-blue-light">
    <div class="container">
        <div class="row">
            <div class="col col-12 py-1 ">
                <div class="text-center d-xl-flex d-flex flex-row justify-content-between" style="margin: auto;">
                    <div class="d-flex flex-row justify-content-between d-md-block d-none">
                        <a class="text-decoration-none" href="mailto: {{$setting->email}}"><span class="mx-4 text-white" style="font-weight:100;font-size=10px !important">{{__('lang.email')}} : <span style="font-weight:bold">{{$setting->email}}</span></span></a>
                         <a class="text-decoration-none" style="font-weight:100;font-size=10px !important" href="tel: {{$setting->phone}}"><span class="mx-4 text-white" style="font-weight:100">{{__('lang.phone')}} : <span>{{$setting->phone}}</span></a>
                        <span class="mx-4 text-white" style="font-weight:100;font-size=10px !important">{{__('lang.address')}} : {{$setting->address->$lang}}</span>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <a class="mx-2 text-decoration-none text-white" href="{{route('setLang',['lang'=>'ar'])}}"><!--<img width="30" src="{{asset('public/assets/img/ksa.png')}}" alt=""
                                                                                     class="img-fluid">-->AR</a>
                        <a class="mx-2 text-decoration-none text-white" href="{{route('setLang',['lang'=>'en'])}}"><!--<img width="30" src="{{asset('public/assets/img/usa.png')}}" alt=""
                                                                                        class="img-fluid">-->EN</a>
                        <a class="mx-2 text-white text-decoration-none" href="{{route('setLang',['lang'=>'tr'])}}"><!--<img width="30" src="{{asset('public/assets/img/turk.webp')}}" alt=""
                                                                                        class="img-fluid">-->TR</a>
                    </div>
                </div>
            </div>
            <div class="col col-12">
                <div>
                    <a class="btn btn-md my-1 text-white bg-green-light btn-block d-block d-md-none"
                       href="{{route('payment')}}">{{__('lang.donate')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<nav class="navbar navbar-expand-lg navbar-light bg-white " >
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('public/assets/img/logo.png')}}" class="img-fluid" width="150" height="75" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">{{__('lang.home')}}</a>
                </li>
                
               <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{__('lang.projects_us')}}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown02">
                     @forelse($sections as $section)
                        <div class="dropdown dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$section->name->$lang}}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                @forelse($section->projects as $project)
                                    <a class="dropdown-item" href="{{route('projects.show',$project)}}">{{$project->title->$lang}}</a>
                                @empty
                                    <a class="dropdown-item" href="#">{{__('lang.no_project')}}</a>
                                @endforelse

                            </div>
                        </div>
                      @empty
                            <a class="dropdown-item" href="#">{{__('lang.no_project')}}</a>
                        @endforelse
                    </div>
                </li>

               
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('lang.office_us')}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @forelse($ofs as $of)
                            <li><a href="{{route('office.show',['office'=>$of])}}" class="dropdown-item" href="#">{{$of->name->$lang}}</a></li>
                        @empty
                            <li><a class="dropdown-item" href="#">{{__('lang.no_office')}}</a></li>
                        @endforelse

                    </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{route('campaigns')}}">{{__('lang.campaigns')}}</a>
                </li>




 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('lang.archive')}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                         @forelse($nations as $nation)
                            <li><a class="dropdown-item" href="{{route('archives',$nation)}}">{{$nation->name->$lang}}</a></li>
                        @empty
                            <li><a class="dropdown-item" href="#">{{__('lang.no_project')}}</a></li>
                        @endforelse

                    </ul>
                </li>


               <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{__('lang.archive')}}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown02">

                      
                            <div class="dropdown dropend">
                                
                                <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                     @forelse($nations as $nation)
                                        <a class="dropdown-item" href="{{route('archives',$nation)}}">{{$nation->name->$lang}}</a>
                                    @empty
                                        <a class="dropdown-item" href="#">{{__('lang.no_project')}}</a>
                                    @endforelse

                                </div>
                            </div>
                      
                    </div>
                </li>-->

<li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{route('posts')}}">{{__('lang.news')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">{{__('lang.about_us')}}</a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="#">{{__('lang.connect_us')}}</a>
                </li>-->
 

            </ul>
            <div class="d-flex">

                <a class="btn bg-green-light text-white d-none d-md-block" href="{{route('payment')}}">{{__('lang.donate')}}</a>
            </div>
        </div>
    </div>
</nav>
@yield('content',)

<div id="fixed-social">
    <div>
        <a class="fixed-facebook" href="{{$setting->face_book}}" target="_blank"><i
                class="fa fa-facebook"></i><span>&nbsp;Facebook</span></a>
    </div>
    <div>
        <a class="fixed-instagram" href="{{$setting->instagram}}" target="_blank">
            <i class="fa fa-instagram"></i>
            <span>&nbsp;Instagram</span>
        </a>

    </div>
    <div>
        <a class="fixed-twitter" href="{{$setting->twitter}}" target="_blank"><i class="fa fa-twitter"></i><span>&nbsp;Twitter</span>
        </a>
    </div>
    <div>
        <a class="fixed-linkedin" href="{{$setting->linkedin}}" target="_blank"><i
                class="fa fa-linkedin"></i><span>&nbsp;Linkedin</span></a>
    </div>
    <div style="color: rgb(73,208,51);background: #37c345;">
        <a class="fixed-instagram" href="{{$setting->youtube}}" target="_blank" style="background: rgb(90,191,55);">
            <i class="fa fa-whatsapp"></i><span style="background: rgb(90,191,55);">&nbsp;WhatsApp</span>
        </a>
    </div>
</div>
<a href="{{route('payment')}}" class="float bg-blue-light">
{{--    <img src="{{asset('public/assets/img/don.png')}}" class="my-float img-fluid pb-2 d-inline-block" style="direction: ltr" alt="">--}}
    <!--<i class="fa fa-dollar my-float" style="color: rgb(255,255,255)"></i>-->
   
  @if($lang =="tr")
  <span style="font-size: 0.7rem !important;" class="py-3 d-inline-block">{{__('lang.donate')}}</span>
@else
    <span  class="py-3 d-inline-block">{{__('lang.donate')}}</span>
    @endif
</a>
<section>
    <footer id="myFooter" class="bg-blue-light">
        <div class="container-fluid">
            <div class="row text-center">
               
                <div class=" col-md-3">
                   <ul class="">
                        <li class=""><a  href="{{route('home')}}">{{__('lang.home')}}</a></li>
                        <li class=""><a  href="{{route('campaigns')}}">{{__('lang.campaigns')}}<br></a></li>
                        <li class=""> <a   href="{{route('about')}}">{{__('lang.about_us')}}</a></li>
                        
                    </ul>
                    
                </div>
                <div class=" col-md-3">
                   <ul class="">
                        <li class=""><a  href="{{route('posts')}}">{{__('lang.news')}}</a></li>
                        <li class=""><a  href="{{route('projects')}}">{{__('lang.projects_us')}}<br></a></li>
                        <li class=""> <a   href="{{route('archives')}}">{{__('lang.archive')}}</a></li>
                        
                    </ul> 
                </div>
                <div class=" col-md-3">
                  <p class="text-small">{{__('lang.sufara')}} </p>
 <p class="text-small" style="font-size:12px !important;">
{{__('lang.info')}}
                </p>
                </div>
                <div class="col-md-3 social-networks">
                    <div>
                        
                    </div>
                    <a class="facebook" href="{{$setting->face_book}}"><i class="fa fa-facebook"></i></a>
                    <a class="twitter" href="{{$setting->twitter}}"><i
                            class="fa fa-twitter"></i></a>

                    <a class="linkedin" href="{{$setting->linkedin}}"><i
                            class="fa fa-linkedin"></i></a>
                    <!--<a href="#" class="btn btn-primary" style="margin-top:20px; width: 150px ;font-size: 16px !important;" type="button">Contact us</a>-->
                </div>
            </div>
            <div class="row footer-copyright bg-green-light">
                <div class="col">
                    <p class="text-white">{{__('lang.copy_right')}}</a></p>
                    <!--<p class="float-left">الشركة المطورة :<a class="" href="https://mada-dev.tech">Mada</a></p>-->
                </div>
            </div>
        </div>
    </footer>
</section>
<script src="{{asset('public/assets/js/popper.min.js')}}"></script>
<script src="{{asset('public/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/js/script.min.js')}}"></script>
<script src="{{asset('public/assets/js/bootstrap5-dropdown-ml-hack.js')}}"></script>
</body>

</html>
