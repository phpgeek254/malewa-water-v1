<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Malewa West Water Project') }}</title>

    <!-- Styles -->
    {{ Html::style('/css/materialize.css') }}
    {{ Html::style('/css/animate.css') }}
    {!! Html::style('css/materialize.clockpicker.css') !!}
    {!! Html::style('/css/font_awesome/css/font_awesome.css') !!}
    {{ Html::style('/css/style.css') }}
    {{ Html::style('/css/print.css') }}

    {{--scripts--}}
     {!! Charts::assets() !!}
    {{ Html::script('js/jquery.js') }}
    {{ Html::script('js/materialize.js') }}
    {{ Html::script('js/vue.js') }}
    {{ Html::script('js/axios.js') }}
    {{ Html::script('js/clockpicker.js') }}
    {{ Html::script('js/script.js') }}
</head>
<body>
    <header class="noPrint">
    <div class="col s12">
            
    <ul id="nav-mobile" class="left side-nav white-text fixed">

        @include('partials.navbar')
      </ul>
      <!-- navbar for mobile -->
      <ul class="side-nav" id="mobile-demo">
         @include('partials.navbar')
      </ul>
    </div>
</header>
    <main>
        <a href="#" data-activates="nav-mobile"
           style='padding:6px; background:blue; font-size: 16px; width: 100%; color:white;'
           class="noPrint button-collapse top-nav waves-effect waves-light hide-on-large-only">MWWP MENU </a>
           @if (Session::has('message'))
            <div class="message" style="display: none">
               {{ Session::get('message') }}
           </div>
           @endif
           
        @yield('content')
    </main>
</body>
</html>