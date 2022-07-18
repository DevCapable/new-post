@extends('/layouts.app')
@section('content')
    <div class="container">

        <form action="{{url('/user/createPost')}}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">#</span>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="title" aria-label="Username" aria-describedby="addon-wrapping"
                >
            </div>
            <br>
            <div class="input-group flex-nowrap">
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="10">
                </textarea>

            </div><br>
            <button class="btn btn-info" type="submit">Submit</button>
        </form>
    </div>
@stop
