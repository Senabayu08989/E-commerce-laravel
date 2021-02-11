@extends('master');
@section('content')
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="login" method="POST">
                
                <div class="form-group">
                    @csrf
                    <label for="Input Email">Email Address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail">
                </div>
                <div class="form-group">
                    <label for="Input Password">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword">
                </div>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
        </div>
    </div>
</div>

@endsection

