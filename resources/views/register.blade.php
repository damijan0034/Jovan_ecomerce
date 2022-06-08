@extends('master')
@section("content")
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <h1 class="mb-5">Registration</h1>
            <form action="register" method="POST" >
                @csrf
                <div class="form-group">
                    {{-- <label for="name">Name</label> --}}
                    <input type="text" name="name" class="form-control"  placeholder="Name">
                    @error('name')
                        {{ $message}}
                            
                        
                    @enderror
                    </div>
                <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control"  placeholder="Email">
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control"  placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary form-control">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection