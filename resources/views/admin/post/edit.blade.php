@extends('admin.layout')

@section('styles')


    <link href="//cdn.bootcss.com/pickadate.js/3.5.6/compressed/themes/default.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/pickadate.js/3.5.6/compressed/themes/default.date.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/pickadate.js/3.5.6/compressed/themes/default.time.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/selectize.js/0.12.0/css/selectize.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/selectize.js/0.12.0/css/selectize.bootstrap3.min.css" rel="stylesheet">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>文章
                    <small>» 编辑文章</small>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">文章编辑区</h3>
                    </div>
                    <div class="panel-body">

                        @include('admin.partials.errors')
                        @include('admin.partials.success')

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('admin.post.update', $id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">

                            @include('admin.post._form')

                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary btn-lg" name="action"
                                                value="continue">
                                            <i class="fa fa-floppy-o"></i>
                                            保存->继续编辑
                                        </button>
                                        <button type="submit" class="btn btn-success btn-lg" name="action"
                                                value="finished">
                                            <i class="fa fa-floppy-o"></i>
                                            保存->返回文章列表
                                        </button>
                                        <button type="button" class="btn btn-danger btn-lg" data-toggle="modal"
                                                data-target="#modal-delete">
                                            <i class="fa fa-times-circle"></i>
                                            删除
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        {{-- 确认删除 --}}
        <div class="modal fade" id="modal-delete" tabIndex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            ×
                        </button>
                        <h4 class="modal-title">请确认</h4>
                    </div>
                    <div class="modal-body">
                        <p class="lead">
                            <i class="fa fa-question-circle fa-lg"></i>
                            你确定删除此文章？
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route('admin.post.destroy', $id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-times-circle"></i> 确定
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')


    <script src="//cdn.bootcss.com/pickadate.js/3.5.6/compressed/picker.js"></script>
    <script src="//cdn.bootcss.com/pickadate.js/3.5.6/compressed/picker.date.js"></script>
    <script src="//cdn.bootcss.com/pickadate.js/3.5.6/compressed/picker.time.js"></script>
    <script src="//cdn.bootcss.com/selectize.js/0.12.0/js/standalone/selectize.min.js"></script>
    <script>
        $(function () {
            $("#publish_date").pickadate({
                format: "yyyy-m-d",
                labelMonthNext: "上一月",
                labelMonthPrev: "下一月",
                monthsFull: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
                weekdaysShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"],
                today: "今天",
                clear: "清除",
                close: "关闭"
            });
            $("#publish_time").pickatime({
                format: "H:i",
                clear: "清除"
            });
            $("#tags").selectize({
                create: true
            });
        });
    </script>
@stop