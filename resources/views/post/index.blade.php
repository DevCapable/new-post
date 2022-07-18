@extends('/layouts.app')
@section('content')
    <div class="container">
        <?php $no = 0?>
        <a style="text-decoration: none" href="{{route('create')}}"> <button class="btn btn-info float-left">Create</button></a>
            <br><br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">TITLE</th>
                <th scope="col">CONTENT</th>
                <th scope="col" width="250px">ACTION</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                @can('view', $post)
            <tr>
                <th scope="row">{{++$no}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td><button class="btn btn-info float-right">Edit</button>
                    <form action="user/delete/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-right">Delete</button>
                    </form>

                    <button class="btn btn-primary float-right">View</button>
                </td>
            </tr>
                @endcan
            @endforeach
            </tbody>
        </table>
    </div>
@stop
