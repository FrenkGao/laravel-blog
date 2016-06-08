<p>
  你收到了来自 {{ config('blog.title') }} 的信息</p><p>
  以下是信息详情：
</p>
<ul>
  <li>昵称： <strong>{{ $name }}</strong></li>
  <li>邮箱地址： <strong>{{ $email }}</strong></li>
  <li>手机号： <strong>{{ $phone }}</strong></li>
</ul>
<hr>
<p>
  @foreach ($messageLines as $messageLine)
    {{ $messageLine }}<br>
  @endforeach
</p>
<hr>