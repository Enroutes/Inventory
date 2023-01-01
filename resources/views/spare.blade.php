<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>INV-EXTRA</title>

        <!-- Fonts -->

        
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css2?family=Unica+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
             
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <!--Import Google Icon Font-->


     <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">

     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{asset('css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection" />


    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css2?family=Unica+One&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">

  
<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">


<link rel="icon" type="image/png" href="{{ asset('favicon.jpg') }}">


<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300;500&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    @livewireScripts
    @livewireStyles
    <title>INV-EXTRA</title>
</head>
<body style="background-color:#F8F8F8; ;">
<main>



  <ul style="border-bottom-right-radius:400px; opacity: 0.9;" id="slide-out" class="sidenav black">

    @auth
    @if(Auth::user()->shopId)
    <div style="height:10px;"></div>
    
  	<li>
      <div class="container">
        <img class="circle" width="50px" height="50px" src="storage/{{Auth::user()->logo}}" alt="">
    </div>
    </li>

    <div style="height:20px;"></div>
    <li><a class="waves-effect grey-text text-lighten-3" href="/dashboard">Dashboard</a></li>


    @can('isSuperadmin')
     <li><a class="waves-effect grey-text text-lighten-3" href="/stockmanager">Stock Manager</a></li>
    <li><a class="waves-effect grey-text text-lighten-3" href="/stockavailable">Stock Available</a></li>
    <li><a class="waves-effect grey-text text-lighten-3" href="/addcategory">Stock Categories</a></li>
    @endcan

    @can('isAdmin')
     <li><a class="waves-effect grey-text text-lighten-3" href="/stockmanager">Stock Manager</a></li>
    <li><a class="waves-effect grey-text text-lighten-3" href="/stockavailable">Stock Available</a></li>
    <li><a class="waves-effect grey-text text-lighten-3" href="/addcategory">Stock Categories</a></li>
 
    @endcan
  
    <li><a class="waves-effect grey-text text-lighten-3" href="/addsales">Add Sales</a></li>
    <li><a class="waves-effect grey-text text-lighten-3" href="/viewsales">View Sales</a></li>
    <li><a class="waves-effect grey-text text-lighten-3" href="/addlaybuy">Place Laybuy</a></li>
    <!--li><a class="waves-effect grey-text text-lighten-3" href="/viewlaybuy">View Laybuy Items</a></li-->
    <li><a class="waves-effect grey-text text-lighten-3" href="/addlaybuypayment">Laybuy Payments</a></li>

@can('isSuperadmin')
    <li><a class="waves-effect grey-text text-lighten-3" href="/addmembers">Manage Team</a></li>
    <li><a class="waves-effect grey-text text-lighten-3" href="/earnings">Earnings</a></li>
    <li><a class="waves-effect grey-text text-lighten-3" href="/payments">Expenses</a></li>
    @endcan
  
    @endif
    @endauth

    @if (Route::has('login'))
      
      @auth
          <a style="display:inline;" href="/" class="text-sm text-gray-700 underline"></a>
          <li>
        <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button style="margin-left:7px;" class="tooltipped btn btn-floating black waves" data-position="left" data-tooltip="sign out"  type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                      width="26" height="24"
                      viewBox="0 0 172 172"
                      style=" fill:#000000; margin-top:3px"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e67e22"><path d="M86,6.88c-43.6552,0 -79.12,35.4648 -79.12,79.12c0,43.6552 35.4648,79.12 79.12,79.12c26.17935,0 49.42112,-12.74611 63.81469,-32.36422c0.77173,-0.98775 0.94516,-2.31706 0.4527,-3.46975c-0.49247,-1.15269 -1.57289,-1.94631 -2.82011,-2.0715c-1.24722,-0.12519 -2.46382,0.43787 -3.17555,1.46969c-13.14707,17.91917 -34.32338,29.55578 -58.27172,29.55578c-39.9368,0 -72.24,-32.3032 -72.24,-72.24c0,-39.9368 32.3032,-72.24 72.24,-72.24c23.94833,0 45.12464,11.63661 58.27172,29.55578c0.71174,1.03182 1.92834,1.59488 3.17555,1.46969c1.24722,-0.12519 2.32764,-0.91881 2.82011,-2.0715c0.49247,-1.15269 0.31903,-2.482 -0.4527,-3.46975c-14.39357,-19.61811 -37.63534,-32.36422 -63.81469,-32.36422zM134.1264,55.0064c-1.39982,0.00037 -2.65984,0.84884 -3.18658,2.14577c-0.52674,1.29693 -0.21516,2.7837 0.78799,3.76001l21.64781,21.64781h-74.25563c-1.24059,-0.01754 -2.39452,0.63425 -3.01993,1.7058c-0.62541,1.07155 -0.62541,2.39684 0,3.46839c0.62541,1.07155 1.77935,1.72335 3.01993,1.7058h74.25563l-21.64781,21.64781c-0.89867,0.86281 -1.26068,2.14404 -0.94641,3.34956c0.31427,1.20552 1.2557,2.14696 2.46122,2.46122c1.20552,0.31427 2.48675,-0.04774 3.34956,-0.94641l27.21766,-27.21765c0.85429,-0.65168 1.35506,-1.66508 1.35374,-2.73956c-0.00132,-1.07448 -0.50457,-2.08664 -1.36046,-2.73623l-27.21094,-27.21094c-0.64765,-0.66575 -1.53698,-1.04135 -2.46578,-1.04141z"></path></g></g></svg>
              </button>
</a>
          </form>
</li>
      @else
          
          <li><a href="{{ route('login') }}" class="white-text" href="/home">Sign in</a></li>
          @if (Route::has('register'))
                 <li><a href="{{ route('register') }}" class="white-text" href="/home">Register</a></li>
           
          @endif
      @endauth

@endif
  </ul>

  <a style="margin-left: 12px;" href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons medium black-text">menu</i></a>



    
       @yield('content')

<div style="height:50px;"></div>
       </main>

       <footer class="page-footer black" style="z-index:-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 style="font-family: 'Monoton', cursive;" class="white-text">INV-EXTRA</h5>
                <p class="grey-text text-lighten-4"></p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text"></h5>
                <ul>
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2021 INV-EXTRA All Rights Reserved.
            <a class="grey-text text-lighten-4 right" href="#!">Developed And Designed By Build and Prosper.</a>
            </div>
          </div>
        </footer>

<style>


body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }

</style>

<script>

/*$(document).bind("contextmenu",function(e){
  return false;
    });*/

</script>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/materialize.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
</body>
</html>

                         <h1 class="center">INV-EXTRA</h1>

                  <div class="container">
                     <img   src="{{asset('storage/images/banner1.jpg')}}" alt="">
                  </div>
                  
        </div>
    </body>
</html>
