@extends('/layouts.app')
@section('content')
    <div class="container">

        <form action="{{url('/register')}}" method="POST">
            @csrf
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="addon-wrapping">#</span>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder=" Enter Email" aria-label="email" aria-describedby="addon-wrapping"
                >
            </div>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="addon-wrapping">#</span>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder=" Enter name" aria-label="name" aria-describedby="addon-wrapping"
                >
            </div>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="addon-wrapping">*</span>
                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" aria-label="password" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">*</span>
                <input type="text" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm password" aria-label="password" aria-describedby="addon-wrapping">
            </div>
            <br><br>
            <button class="btn btn-info" type="submit">Submit</button>
        </form>
    </div>
@stop
