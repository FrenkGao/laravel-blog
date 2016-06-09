@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">修改帐号信息</div>
                    <div class="panel-body">

                        @include('admin.partials.errors')

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{url("/admin/modify")}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">邮箱</label>
                                <div class="col-md-6">
                                    <p class="form-control-static">{{ $email }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">管理员</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{$name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">密码</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">重复密码</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">确定修改</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection