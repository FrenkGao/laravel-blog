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
                    <small>» 添加新文章</small>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">新文章</h3>
                    </div>
                    <div class="panel-body">

                        @include('admin.partials.errors')

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('admin.post.store') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('admin.post._form')

                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fa fa-disk-o"></i>
                                            保存新文章
                                        </button>
                                    </div>
                                </div>
                            </div>

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
                weekdaysShort: ["日", "一", "二", "三", "四", "五", "六"],
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