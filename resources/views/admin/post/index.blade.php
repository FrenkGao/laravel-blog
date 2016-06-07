@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>文章 <small>» 列表</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/post/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> 增加文章
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table id="posts-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>发布日期</th>
                        <th>标题</th>
                        <th>副标题</th>
                        <th data-sortable="false">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td data-order="{{ $post->published_at->timestamp }}">
                                {{ $post->published_at->format('Y年n月j日 H:i') }}
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->subtitle }}</td>
                            <td>
                                <a href="/admin/post/{{ $post->id }}/edit" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i>编辑
                                </a>
                                <a href="/blog/{{ $post->id }}" class="btn btn-xs btn-warning">
                                    <i class="fa fa-eye"></i> 预览
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $("#posts-table").DataTable({
                order: [[0, "desc"]],
                "language": {
                    "sProcessing":   "处理中...",
                    "sLengthMenu":   "显示 _MENU_ 项结果",
                    "sZeroRecords":  "没有匹配结果",
                    "sInfo":         "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                    "sInfoEmpty":    "显示第 0 至 0 项结果，共 0 项",
                    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                    "sInfoPostFix":  "",
                    "sSearch":       "搜索:",
                    "sUrl":          "",
                    "sEmptyTable":     "表中数据为空",
                    "sLoadingRecords": "载入中...",
                    "sInfoThousands":  ",",
                    "oPaginate": {
                        "sFirst":    "首页",
                        "sPrevious": "上页",
                        "sNext":     "下页",
                        "sLast":     "末页"
                    },
                    "oAria": {
                        "sSortAscending":  ": 以升序排列此列",
                        "sSortDescending": ": 以降序排列此列"
                    }
                }
            });
        });
    </script>
@stop