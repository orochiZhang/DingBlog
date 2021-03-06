@extends('layouts.admin')

@section('content')
    <main>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>文章管理</h2>
                <tag-select tag_id="{{$tag_id}}"></tag-select>
                {{--<p>blade:{{Auth::user()->api_token}}</p>--}}
                <article-manger api_token="{{Auth::user()->api_token}}"
                                api="{{$api}}"
                                page="{{$page}}"
                                url="{{$url}}">
                </article-manger>
            </div>
        </div>
    </main>

@endsection

@section('script')
    <script>
        window.onload=function(){
            active_item("文章管理");
        }
    </script>
@endsection