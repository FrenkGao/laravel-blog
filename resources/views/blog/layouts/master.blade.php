<!DOCTYPE html>
<html lang="zn-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $meta_description }}">
    <meta name="author" content="{{ config('blog.author') }}">

    <title>{{ $title or config('blog.title') }}</title>
    <link rel="alternate" type="application/rss+xml" href="{{ url('rss') }}"
          title="RSS Feed {{ config('blog.title') }}">
    {{-- Styles --}}
    <link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/startbootstrap-clean-blog/1.0.4/css/clean-blog.min.css" rel="stylesheet">
    <style>
        .intro-header .post-heading .meta a, article a {
            text-decoration: underline;
        }

        h2 {
            padding-top: 22px;
        }

        h3 {
            padding-top: 15px;
        }

        h2 + p, h3 + p, h4 + p {
            margin-top: 5px;
        }

        .caption-title {
            margin-bottom: 5px;
        }

        .caption-title + p {
            margin-top: 0;
        }

        dt {
            margin-bottom: 5px;
        }

        dd {
            margin-left: 30px;
            margin-bottom: 10px;
        }
    </style>
    @yield('styles')

  {{-- HTML5 Shim and Respond.js for IE8 support --}}
  <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@include('blog.partials.page-nav')

@yield('page-header')
@yield('content')

@include('blog.partials.page-footer')

{{-- Scripts --}}
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/startbootstrap-clean-blog/1.0.4/js/clean-blog.min.js"></script>

@yield('scripts')

</body>
</html>