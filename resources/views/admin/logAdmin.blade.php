@extends('admin.main2')
@section('content')
    <div class="login-main p-5 mt-5" style="display:flex; justify-content:center; flex-direction:column; align-items:center">
        <div class="inner-login bg-white mt-5 rounded p-5" style="width:50%;">
            <div class="logo-admin d-flex justify-content-center align-items-center mt-3">
                <img src="{{ asset('front/images/logo.png') }}" class="rounded" alt="logo" width="280px">
            </div>
            <form action="{{ route('admin.login') }}" method="POST" class="admin-login-form d-flex  flex-column">
            @csrf
                <label for="username" class="label-class" style="font-weight: 600; font-size:1.2rem">Email</label>
                <input class="adminlogin-input" type="text" id="email" name="email" placeholder="Enter Email"
                    required />
                <span class="error text-danger username_err"></span><br />

                <label for="password" class="label-class" style="font-weight: 600; font-size:1.2rem">Password</label>
                <input class="adminlogin-input" type="password" id="password" name="password"
                    placeholder="Enter Password" />


                <button type="submit" class="btn btn-primary submit-btn submit-admin p-2 mt-5"
                    style="font-weight: 600; font-size:1.2rem">Login</button>
            </form>

        </div>
    </div>
@endsection
