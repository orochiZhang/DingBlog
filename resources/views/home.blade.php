@extends('layouts.app')

@section('title')
    DingBlog
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <article-list url="{{$url}}" page="{{$page}}" api="{{$api}}"></article-list>

            <div class="col-md-4">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="col-md-6 col-xs-6">
                            <img class="avatar" src="https://avatars2.githubusercontent.com/u/16440767?v=4&s=460">
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="info">
                                <h3>dingding</h3>

                                <div class="icon male" aria-hidden="true"></div>
                            </div>
                        </div>

                        <div class="col-md-12 col-xs-12 text-center">
                            <p>博客正在重构中……</p>
                            <p>一个用萌妹子头像的死宅</p>
                        </div>

                    </div>
                </div>

                <tag-list></tag-list>

            </div>
        </div>
    </div>
@endsection