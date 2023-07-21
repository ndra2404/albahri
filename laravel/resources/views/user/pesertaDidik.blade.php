@extends("templates")
@section("content")
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Peserta Didik</h1>
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
    <div class="col-md-12">
    @if((Auth::user()->level==1 || Auth::user()->level==3) && Request::segment(2)=="pendaftaran")
        <a href="{{url('cetakPdf')}}" target="_blank" class="btn btn-info pull-right">Cetak Pdf</a>
    @endif
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nomor Pendaftaran</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tgl Lahir</th>
                <th>Agama</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Action</th>
            </tr>
            @foreach($pesertas as $peserta)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$peserta->no_pendaftaran}}</td>
                <td>{{$peserta->nama_lengkap}}</td>
                <td>{{$peserta->tempat_lahir}}</td>
                <td>{{$peserta->tgl_lahir}}</td>
                <td>{{$peserta->agama}}</td>
                <td>{{$peserta->jenis_kelamin}}</td>
                <td>{{$peserta->kelas}}</td>
                <td>

                        @if(Auth::user()->level==1)
                            @if($peserta->status==2)
                                    <a href="{{route('verification',$peserta->id_pendaftaran)}}" class="btn btn-primary">Verifikasi data</a>
                            @endif
                            @if(Request::segment(2)=="pendaftaran")
                                @if($peserta->status==3)
                                    Jadwal Interview
                                @elseif($peserta->status==1)
                                    New
                                @elseif($peserta->status==4)
                                @elseif($peserta->status==5)
                                    Kirim Invoice
                                @elseif($peserta->status==5)
                                    Cek pembayaran
                                @else
                                    -
                                @endif
                            @else
                                @if($peserta->status==3)
                                    <a href="{{route('jadwalInterview',$peserta->id_pendaftaran)}}" class="btn btn-primary">Jadwal Interview</a>
                                @endif
                                @if($peserta->status==5)
                                    <a target="_blank" href="{{route('invoice',$peserta->id_pendaftaran)}}" class="btn btn-primary">Kirim Invoice</a>
                                @endif
                                @if($peserta->status==7)
                                    <a href="{{route('pembayaran',$peserta->id_pendaftaran)}}" class="btn btn-primary">Cek pembayaran</a>
                                @endif
                                @if($peserta->status==1)
                                    Menunggu upload Persyaratan
                                @endif
                                @if($peserta->status==6)
                                    Menunggu Pembayaran
                                @endif
                            @endif
                        @endif
                        @if(Auth::user()->level==2)
                            @if($peserta->status==1)
                                <a href="{{route('uploadDocument',$peserta->id_pendaftaran)}}" class="btn btn-primary">Upload Document</a>
                            @elseif($peserta->status==2||$peserta->status==5)
                                Menunggu Validasi
                            @elseif($peserta->status==6)
                                <a href="{{route('confirmation',$peserta->id_pendaftaran)}}" class="btn btn-primary">Konfirmasi pembayaran</a>
                            @elseif($peserta->status==8)
                                Pendaftaran Berhasil sekolah akan dimulai pada {{$mulai}}
                            @endif
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
