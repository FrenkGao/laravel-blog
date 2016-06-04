<html>
<head>
    <title>{{ config('blog.title') }}</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>{{ config('blog.title') }}</h1>
    <h5>第 {{ $posts->currentPage() }} / {{ $posts->lastPage() }}页</h5>
    <hr>
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                <em>({{ $post->published_at }})</em>
                <p>
                    {{ str_limit($post->content) }}
                </p>
            </li>
        @endforeach
    </ul>
    <hr>
    {!! $posts->render() !!}
</div>
</body>
</html>