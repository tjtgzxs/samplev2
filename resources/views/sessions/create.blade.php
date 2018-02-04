@extends('layouts.default')
@section('title','登陆')
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>登陆</h5>
            </div>
            <div class="panel-body">
                @include('shared._errors')
            </div>
            <form action="{{route('login')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">邮箱</label>
                    <input type="text"  name="email" id="email" class="form-control" value="{{old('email')}}" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">请填写邮箱</small>
                </div>
                <div class="form-group">
                    <label for="password">密码</label>
                    <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">请填写密码</small>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remeber">记住我

                    </label>
                </div>
                <button type="submit" class="btn btn-primary">登陆</button>
            </form>
            <hr />
            <p>还没账号？</p><a href="{{route('signup')}}">注册</a>
       </div>
    </div>
@stop