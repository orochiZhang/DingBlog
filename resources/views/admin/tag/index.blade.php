@extends('layouts.admin')

@section('content')
    <main>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>标签管理</h2>
                <div class="col-md-4">
                    <form class="form-horizontal" method="POST" action="/admin/tag/create">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label">TagName</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">添加标签</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-12"></div>

                <div class="col-md-6">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>tag_name</th>
                            <th>count</th>
                            <th>option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                        <tr>
                            <th scope="row">{{$tag->id}}</th>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->count}}</td>
                            <td>
                                <button class="btn btn-danger"
                                        data-toggle="modal"
                                        data-target="#delete">
                                    删除
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('script')
    <script>
        window.onload = function () {
            active_item("标签管理");
        }
    </script>
@endsection