<p>
    你收到了来自 {{ config('blog.title') }} 重置密码的请求：</p><p>
</p>
<ul>
    <li> <a href="{{ url('password/reset/'.$token) }}">重置密码</a></li>
    <li>单击或者复制到浏览器中：{{ url('password/reset/'.$token) }}</li>
</ul>
<hr>
