@extends("templates")
@section("content")
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Cek Pembayaran</h1>
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
        <form method="post" target="_blank" action="" enctype="multipart/form-data">
        <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Nomor Pendaftaran</label>
                    <span class="form-control">{{$data->no_pendaftaran}}</span>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                    <label>Status</label>
                    <span class="form-control">Menunggu Verifikasi data </span>
                </div>
                </div>
                <div class = "col-lg-2">
                    <img width="120" src="{{url($document->pas_photo)}}" />
                </div>
        </div>
        <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Nama Ayah</label>
                    <input type="text" readOnly name="email" value="{{$data->nama_ayah}}" class="form-control" placeholder="Email">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label>Nama Ibu</label>
                    <input type="text" readOnly name="email" value="{{$data->nama_ibu}}" class="form-control" placeholder="Email">
                </div>
            </div>
        </div>
        <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Tempat, tgl lahir Ayah</label>
                    <input type="text" readOnly name="email" value="{{$data->tempat_lahir_ayah}}, {{date('d-m-Y',strtotime($data->tgl_lahir_ayah))}}" class="form-control" placeholder="Email">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label>Tempat, tgl lahir Ibu</label>
                    <input type="text" readOnly name="email" value="{{$data->tempat_lahir_ibu}}, {{date('d-m-Y',strtotime($data->tgl_lahir_ibu))}}" class="form-control" placeholder="Email">
                </div>
            </div>
        </div>
        <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Pekerjaan Ayah</label>
                    <input type="text" readOnly name="email" value="{{$data->pekerjaan_ayah}}" class="form-control" placeholder="Email">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label>Pekerjaan Ibu</label>
                    <input type="text" readOnly name="email" value="{{$data->pekerjaan_ibu}}" class="form-control" placeholder="Email">
                </div>
            </div>
        </div>

        <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" readOnly name="email" value="{{$data->nama_lengkap}}" class="form-control" placeholder="Email">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label>Tempat, tgl lahir</label>
                    <input type="text" readOnly name="email" value="{{$data->tempat_lahir}}, {{date('d-m-Y',strtotime($data->tgl_lahir))}}" class="form-control" placeholder="Email">
                </div>
            </div>
        </div>
        <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Agama</label>
                    <input type="text" readOnly name="email" value="{{$data->agama}}" class="form-control" placeholder="Email">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" readOnly name="email" value="{{$data->jenis_kelamin}}" class="form-control" placeholder="Email">
                </div>
            </div>
        </div>
        <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" readOnly name="email" value="{{$data->kelas}}" class="form-control" placeholder="Email">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" readOnly name="email" value="{{$data->alamat}}" class="form-control" placeholder="Email">
                </div>
            </div>
        </div>
            <div class="form-group">
                <label>Akte Kelahiran</label>
                <a target='_blank' href="{{url($document->akte_kelahiran)}}">{{$document->akte_kelahiran}}</a>
            </div>
            <div class="form-group">
                <label>Kartu Keluarga</label>
                <a target='_blank' href="{{url($document->kartu_keluarga)}}">{{$document->kartu_keluarga}}</a>
            </div>
            <div class="form-group">
                <label>Ktp Wali</label>
                <a target='_blank' href="{{url($document->ktp_wali)}}">{{$document->ktp_wali}}</a>
            </div>
            <div class="form-group">
                <label>Pas Photo</label>
                <a target='_blank' href="{{url($document->pas_photo)}}">{{$document->pas_photo}}</a>
            </div>
        <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                    <label>No Rekening pendaftar</label>
                    <input type="text"  name="no_rek" readOnly value="{{$pembayaran->no_rekening}}" class="form-control">
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                    <label>Nominal</label>
                    <input type="text" readOnly name="nominal"  value="{{number_format($pembayaran->nominal)}}" class="form-control" >
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Bukti bayar</label>
                    <a target='_blank' class="form-control" href="{{url($pembayaran->bukti_bayar)}}">Lihat bukti bayar</a>
                </div>
            </div>
        </div>
            <div class="box-footer">
            @if($data->status==7)
                <button type="submit" class="btn btn-info pull-left">Submit</button>
            @endif
                <a href="{{url('data/pembayaran')}}" class="btn btn-warning pull-right">Cancel</a>
            </div>
        </form>
    </div>
    </div>
    <!-- Register End -->

  </div>
</div>
<!-- Inner Content Start -->
@endsection
