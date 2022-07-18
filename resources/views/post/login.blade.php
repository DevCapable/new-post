@extends('/layouts.app')
@section('content')
    <div class="container">

        <form action="{{url('/post/login')}}" method="POST">
            @csrf
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">#</span>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder=" Enter Email" aria-label="email" aria-describedby="addon-wrapping"
                >
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">#</span>
                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" aria-label="password" aria-describedby="addon-wrapping">
            </div>
            <br><br>
            <button class="btn btn-info" type="submit">Submit</button>
        </form>
    </div>
@stop
