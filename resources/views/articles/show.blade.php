@extends('layouts.app')

@section('title')
    {{$article->title}}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4>{{$article->title}}</h4>
                    </div>
                    <div class="panel-body">
                        <article>
                            <div class="panel-body">
                                <li><i class="fa fa-eye"></i>{{ $article->reading }} 浏览</li>
                                <div id="content">{!! $article->content !!}</div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <link rel="stylesheet" href="/css/github-markdown.css">
    <script src="/js/marked.js"></script>
    <script>
        window.onload=function(){
//            console.log(document.getElementById('content').innerHTML);
//            console.log(document.getElementById('content').value);
//            document.getElementById('content').innerHTML = marked(document.getElementById('content').innerHTML);
            document.getElementById('spinner').style.display="none";
            document.getElementById('app').style.display="block";
        }
    </script>
@endsection