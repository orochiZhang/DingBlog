@extends('layouts.admin')

@section('content')
    <main>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>修改文章</h2>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-body" style="padding: 20px 40px">
                            <form class="form-horizontal" method="POST" action="/admin/article/update/{{$article->id}}}">
                                <input type="hidden" name="_method" value="PUT">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$article->title}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Content</label>
                                    <textarea name="content" class="form-control" id="md" onKeyUp="keyup(event)"
                                              style="height: 300px">{{$article->content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" style="padding-left:0px;">tag</label>
                                    <select name="tag_id" id="tag" class="form-control">
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">type</label>
                                    <select name="type_id" id="type" class="form-control">

                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">完成修改</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default" id="content"
                         style="height: 500px;padding: 10px">

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('script')
    <link rel="stylesheet" href="/css/github-markdown.css">
    <script src="/js/marked.js"></script>
    <script src="/js/getData.js"></script>
    <script>
        window.onload = function () {
            getTags({{$article->tag_id}});
            getTypes({{$article->type_id}});
            document.getElementById('content').innerHTML = marked(document.getElementById('md').value);
        }

        function keyup(event) {
            //console.log("The new content: " + event.target.value);
            //document.getElementById('content').innerHTML = marked(event.srcElement.value);
            document.getElementById('content').innerHTML = marked(document.getElementById('md').value);
        };
    </script>
@endsection