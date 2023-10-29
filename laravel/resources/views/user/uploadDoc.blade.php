@extends("templates")
@section("content")
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Upload document</h1>
  </div>
</div>
<!-- Inner Heading End -->

<!-- Inner Content Start -->
<div class="innerContent-wrap">
@if (session('status'))
      <div class="alert {{session('status')}}" role="alert">
        <p>{{ session('message') }}</p>
      </div>
@endif
    <!-- Register Start -->
    <div class="container">
    <div class="col-md-12">
        <form method="post" action="" enctype="multipart/form-data">

            <div class="form-group">
                <label>Akte Kelahiran</label>
                <input type="file" required name="akte_kelahiran" class="form-control-file border">
            </div>
            <div class="form-group">
                <label>Kartu Keluarga</label>
                <input type="file" required name="kartu_keluarga" class="form-control-file border">
            </div>
            <div class="form-group">
                <label>Ktp Wali</label>
                <input type="file" required name="ktp_wali" class="form-control-file border">
            </div>
            <div class="form-group">
                <label>Pas Photo</label>
                <input type="file" required name="pas_photo" class="form-control-file border">
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-left">Submit</button>
                <a href="{{url('data/pesertadidik')}}" class="btn btn-warning pull-right">Cancel</a>
            </div>
        </form>
    </div>
    </div>
    <!-- Register End -->

  </div>
</div>
<!-- Inner Content Start -->
@endsection
