<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DingBlog</title>

    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
    <link href="{{elixir('/css/app.css')}}" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid" id="app">
    <nav class="navbar navbar-default background-white">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">DingBlog's Admin</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav" id="menu">

                <li><a href="/">返回首页</a></li>
                <li><a href="/admin/article">文章管理</a></li>
                <li><a href="/admin/article/create">添加文章</a></li>
                <li><a href="/admin/profile/">个人信息</a></li>
                <li><a href="/admin/setting/">网站设置</a></li>
                <li data-toggle="modal" data-target="#exit">
                    <a href="#">退出登录</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="exit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">警告</h4>
                </div>
                <div class="modal-body">
                    是否确定要退出账号？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <button type="button" class="btn btn-primary">Confirm</button>
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>


    @yield('content')

</div>
</body>

<script src="{{elixir('/js/app.js')}}"></script>
<script>
    function active_item(name){
        var li = document.getElementById('menu').getElementsByTagName('li');
        for(i=0;i<li.length;i++){

            if(li[i].getElementsByTagName('a')[0].outerText===name){
                li[i].className="active-li";
            }
        }
    }
</script>
@yield('script')
</html>