<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link rel="shortcut icon" href="{{asset('pic/smkn4.png')}}">
	@include('layout/link')
</head>
<body>
	<body class="hold-transition layout-fixed header-collapse sidebar-collapse ">
  
  <div class="content mt-3">
    <div class="">
      @yield('konten2')
    </div>

     @include('layout/footer')
   </div>
	@include('layout/scripts')

</body>
</html>