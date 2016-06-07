<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('blog.title') }} 后台管理</title>

{{--  <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">--}}


  <link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  <link href="//cdn.bootcss.com/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">

  @yield('styles')

</head>
<body>

{{-- Navigation Bar --}}
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">{{ config('blog.title') }} 后台管理</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-menu">
      @include('admin.partials.navbar')
    </div>
  </div>
</nav>

@yield('content')
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.bootcss.com/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>

{{--<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap.min.js"></script>--}}

@yield('scripts')

</body>
</html>