@extends('client.layout.app')

@section('title.page')
    ثبت نام در
@endsection

@section('content')


    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="{{route('index.page')}}"><i class="fa fa-home"></i></a></li>
            <li><a href="login.html">حساب کاربری</a></li>
            <li><a href="register.html">ثبت نام</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-9" id="content">
                <h1 class="title">ثبت نام حساب کاربری</h1>
                <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="login.html">صفحه لاگین</a> مراجعه کنید.</p>
                <h3>برای ارسال کد تایید ایمیل خود را وارد کنید </h3>
                <form class="form-horizontal" method="post" action="{{route('register.sendmail')}}">

                    @csrf
                    <fieldset id="account">
                        <div class="form-group required">
                            <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="" name="email">
                            </div>
                         </div>
                    </fieldset>
                    <div style="margin: 15px">
                        @include('admin.layout.errors')
                    </div>
                    <div class="buttons">
                        <div class="pull-right">

                            <input type="submit" class="btn btn-primary" value="ادامه">
                        </div>
                    </div>
                </form>
            </div>
            <!--Middle Part End -->
        </div>
    </div>
@endsection
