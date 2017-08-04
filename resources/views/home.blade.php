@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <home></home>
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

                                {{--<div class="icon github" aria-hidden="true">--}}
                                {{--<a href="https://github.com/orochizzzzzzz">--}}
                                {{--dingding</a>--}}
                                {{--</div>--}}
                                {{--<div class="icon location" aria-hidden="true">云浮</div>--}}
                                {{--<div class="icon mortar-board" aria-hidden="true">广东海洋大学</div>--}}
                            </div>
                        </div>

                        <div class="col-md-12 col-xs-12 text-center">
                            <p>博客正在重构中……</p>
                            <p>一个用萌妹子头像的死宅</p>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">My github repositories</div>
                    <div class="panel-body">
                        <ul>
                            <li>
                                <div class="icon repo" aria-hidden="true">
                                    <a href="content.html">广东海洋大学团委老师联系方式</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon repo" aria-hidden="true">
                                    <a href="content.html">温馨提示（校团委办事流程介绍）</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon repo" aria-hidden="true">
                                    <a href="content.html">
                                        2015年广东海洋大学优秀志愿服务项目与先进集体、个人名单公示
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="icon repo" aria-hidden="true">
                                    <a href="content.html">
                                        2015年广东海洋大学星级志愿者名单公示
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="icon repo" aria-hidden="true">
                                    <a href="content.html">
                                        广东海洋大学第十七届“精品团日”活动获奖名单公示
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection