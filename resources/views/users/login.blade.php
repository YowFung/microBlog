@extends('layouts._master')

@section('title', '用户登录')

@section('content')
    <br/><br/>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="text-center mb-4">
                    <img class="mb-4" src="/img/sign/login.jpg" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">用户登录</h1>
                    <br/>
                </div>

                <hr/><br/>

                <div class="form-label-group">
                    <label for="inputEmail">邮箱</label>
                    <input type="email" id="inputEmail" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-mail" autofocus>
                </div>

                <br/>

                <div class="form-label-group">
                    <label for="inputPassword">密码</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" name="remember"> 记住我
                    </label>
                </div>
                <br/>

                @include('shared._msgs', ['show_all' => false, 'title' => '登录失败', 'msg_type' => 'danger'])

                <br/>
                <p>没有账号？赶紧去<a href="{{ route('users.create') }}">注册</a>！</p>
                <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
            </form>
        </div>
    </div>

    <br/><br/>
@stop