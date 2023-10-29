@extends("templates")
@section("content")
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Verifikasi Data</h1>
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
        <div class="row">
              <div class="col-lg-10">
                <div class="form-group">
                    <label>Nomor Pendaftaran</label>
                    <span class="form-control">{{$data->no_pendaftaran}}</span>
                </div>
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
        <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                    <label>No Rekening pendaftar</label>
                    <input type="text"  name="no_rek" class="form-control">
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                    <label>Nominal</label>
                    <input type="text" name="nominal" value="{{$bayar->param_value}}" class="form-control" >
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Bukti bayar</label>
                    <input type="file" required name="bukti_bayar" class="form-control-file border">
                </div>
            </div>
        </div>
        <div class="row">
              <div class="col-lg-12">
                <table class="table">
                    <tr>
                        <th width="10">No</th>
                        <th>Item</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Pendaftaran</td>
                        <td>Rp. {{number_format(150000)}}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Baju Seragam (muslim,batik,olahraga)</td>
                        <td>Rp. {{number_format(195000)}}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tas</td>
                        <td>Rp. {{number_format(30000)}}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Alat tulis dan buku sekolah 2 semester</td>
                        <td>Rp. {{number_format(300000)}}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Sumbangan Bangunan</td>
                        <td>Rp. {{number_format(410000)}}</td>
                    </tr>
                    <tfooter>
                    <tr style="font-weight: bold;">
                        <td></td>
                        <td style="text-align: right;">Grand total</td>
                        <td>Rp. {{number_format($bayar->param_value)}}</td>
                    </tr>
                    </tfooter>
                </table>
            </div>
        </div>
        <div class="row">
              <div class="col-lg-12">
                Mohon melakukan pembayaran ke rekening {{$norek->param_value}}
              </div>
            </div>
        </div>
        &nbsp;
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-left">Submit</button>
                <a href="{{url('data/jadwal')}}" class="btn btn-warning pull-right">Cancel</a>
            </div>
        </form>
    </div>
    </div>
    <!-- Register End -->

  </div>
</div>
<!-- Inner Content Start -->
@endsection
