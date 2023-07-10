@extends("templates")
@section("content")
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Add / Update User</h1>
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
@php
    if(Request::Segment(2)=='create'){
        $url = url('user');
    }else{
        $url = url('user/'.$data->id);
    }

@endphp
    <div class="col-md-12">
    <form method="post" action="{{$url}}" enctype="multipart/form-data">
        @if(isset($data))
        {{ method_field('put') }}
        @endif
        <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" {{isset($data)?'readonly':''}} name="username" value="{{isset($data)?$data->username:''}} " class="form-control" placeholder="Email">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password"  name="password" value="" class="form-control" placeholder="password">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control"  name="level">
                        @if(isset($data))
                            @if($data->level=="2")
                                <option value="2"selected>User</option>
                            @else
                                <option value="1" {{$data->level==1?'selected':''}}>Administrator</option>
                                <option value="3" {{$data->level==3?'selected':''}}>Owner</option>
                            @endif
                        @else
                        <option value="1">Administrator</option>
                        <option value="3">Owner</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="box-footer">
                <button type="submit" class="btn btn-info pull-left">Submit</button>
                <a href="{{url('user')}}" class="btn btn-warning pull-right">Cancel</a>
            </div>
    </form>
    </div>
    </div>
    <!-- Register End -->

  </div>
</div>
<!-- Inner Content Start -->
@endsection
