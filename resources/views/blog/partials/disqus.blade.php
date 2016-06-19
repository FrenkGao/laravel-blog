

<style>
  .ds-sync{display:none !important;}
  #ds-thread #ds-reset .ds-powered-by{display:none;}
</style>
<div class="ds-thread" data-thread-key="{{$post->id }}" data-title="{{$post->title }}" data-url="http://hifrenk.cn/blog/{{ $post->id  }}"></div>


<script type="text/javascript">
  var duoshuoQuery = {short_name:"hifrenk"};
  (function() {
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0]
    || document.getElementsByTagName('body')[0]).appendChild(ds);
  })();
</script>
