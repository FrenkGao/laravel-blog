@if(isset($isArticles))
    <hr>
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @include('blog.partials.disqus')
        </div>
    </div>
@endif
<hr>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    <li>
                        <a href="{{ url('rss') }}" data-toggle="tooltip"
                           title="RSS feed">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-rss fa-stack-1x fa-inverse"></i>
              </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright" style="color:#ccc;">Copyright © <a style="color:#ccc;"
                                                                        href="http://hifrenk.cn">{{ config('blog.author') }}</a>
                    | <a style="color:#ccc;" href="http://www.miitbeian.gov.cn">闽ICP备16014386号-1</a>
                </p>
            </div>
        </div>
    </div>
</footer>