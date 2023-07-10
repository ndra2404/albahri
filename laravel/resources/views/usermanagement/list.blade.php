@extends("templates")
@section("content")
<div class="innerHeading-wrap">
  <div class="container">
    <h1>User</h1>
  </div>
</div>
<!-- Inner Heading End -->

<!-- Inner Content Start -->
<div class="innerContent-wrap">

    <!-- Register Start -->
    <div class="container">
    @if (session('status'))
      <div class="alert {{session('status')}}" role="alert">
        <p>{{ session('message') }}</p>
      </div>
@endif
<a href="{{url('user/create')}}" class="btn btn-info pull-right">Add User</a>
    <div class="col-md-12">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Level</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->level==1?'Administrator':($user->level==2?'User':'')}}</td>
                    <td>{{$user->status?'Active':'Not Active'}}</td>
                    <td>
                        <a href="{{url('user/'.$user->id)}}" class="btn btn-info">Update</a>
                        @if($user->level!=2)
                        <form action="{{url('user/'.$user->id)}}" method="post">
                             {{ method_field('delete') }}
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
    <!-- Register End -->

  </div>
</div>
<!-- Inner Content Start -->
@endsection
