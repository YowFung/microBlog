@extends('layouts._master')

@section('title', '首页')

@section('content')
    <!-- 栅格开始 -->
    <div class="row">
        <!-- 左边栅格 -->
        <div class="col-md-8">
            @yield('col-left')
        </div>

        <!-- 右边栅格 -->
        <div class="col-md-4">

            {{--搜索栏--}}
            <form action="{{ route('search.index') }}" method="GET">
                <br>

                <div class="input-group">
                    <input name="keyword" type="text" class="form-control" placeholder="昵称/邮箱">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">搜索用户</button>
                </span>
                </div>
                <br>
            </form>

            <!-- 关注人列表 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">关注用户</h3>
                </div>
                <div class="panel-body fans-panel-body">
                    @if (!Auth::check())
                        <p class="tips">
                            <a href="{{ route('login') }}">登录</a> 后才能显示关注人列表哦~
                        </p>
                    @elseif (!count($data['followers']))
                        <p class="tips">你还没有关注过任何人哦~</p>
                    @else
                        @for($i = 0; $i < count($data['followers']); $i += 6)
                            <div class="row">
                                @for($j = $i; $j < $i+6 && $j < count($data['followers']); $j++)
                                    <div class="col-md-2 fans-list" title="{{ $data['followers'][$j]->name }}">
                                        <a href="{{ route('users.show', $data['followers'][$j]->id) }}" class="thumbnail">
                                            <img alt="{{ $data['followers'][$j]->name }}" src="{{ $data['followers'][$j]->gravatar('64') }}">
                                        </a>
                                    </div>
                                @endfor
                            </div>
                        @endfor
                    @endif
                </div>
            </div>

            <!-- 站点通知 -->
            <div class="alert alert-warning" role="alert">
                <b style="font-size: 15px">站点通知:</b>&nbsp;&nbsp; 本站广告位招租，欢迎 <a href="mailto::xxx@example.com" class="alert-link">联系站长</a>！
            </div>

            <!-- 关于本站 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">关于本站</h3>
                </div>
                <div class="panel-body  about-panel-body">
                    <p>本站是「Han'」的毕业设计项目，采用 PHP Laravel 5.5 后端框架和 BootStrap v3 前端框架开发，含表单验证、路由过滤、授权策略、响应式布局等，开发架构遵循RESTFul和PSR规范。</p>
                    <img src="/img/sign/QRCode.png">
                    <p>扫二维码访问移动端测试站点</p>
                </div>
            </div>

        </div>

    </div>
    <!-- 栅格结束 -->
@stop