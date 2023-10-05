@extends("templates")
@section("content")
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Pendaftaran</h1>
  </div>
</div>
<!-- Inner Heading End -->

<!-- Inner Content Start -->
<div class="innerContent-wrap">
@if (session('status'))
  <div class="container login-wrap">
      <div class="alert {{session('status')}}" role="alert">
        <p>{{ session('message') }}</p>
      </div>
@endif
    <!-- Register Start -->
    <div class="login-wrap ">
      <div class="contact-info login_box">
        <div class="contact-form loginWrp registerWrp">
          <form id="contactForm" method="post" action="">
            <div class="form_set">
              <h3>Pendaftaran</h3>
              <div class="form-group">
                <input type="email" required name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" required name="password" class="form-control" placeholder="Password">
                <div class="passnote">Note:  Password must be a minimum of 8 characters</div>
              </div>
              <div class="form-group">
                <input type="password" required name="password" class="form-control" placeholder="Confirm Password">
              </div>
            </div>
            <h3>Orang Tua / Wali</h3>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" required name="nama_ayah" value="{{old('nama_ayah')}}" class="form-control" placeholder="Nama Ayah">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" required name="pekerjaan_ayah" value="{{old('pekerjaan_ayah')}}" class="form-control" placeholder="Pekerjaan Ayah">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" name="tempat_lahir_ayah" value="{{old('tempat_lahir_ayah')}}"  class="form-control" placeholder="Tempat Lahir Ayah">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="date" name="tgl_lahir_ayah" value="{{old('tgl_lahir_ayah')}}"  class="form-control date" placeholder="Tgl lahir ayah">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" required name="nama_ibu" value="{{old('nama_ibu')}}"  class="form-control" placeholder="Nama Ibu">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" required name="pekerjaan_ibu" value="{{old('pekerjaan_ibu')}}"  class="form-control" placeholder="Pekerjaan Ibu">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" name="tempat_lahir_ibu" value="{{old('tempat_lahir_ibu')}}"  class="form-control" placeholder="Tempat Lahir Ibu">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="date" name="tgl_lahir_ibu" value="{{old('tgl_lahir_ibu')}}"  class="form-control date" placeholder="Tgl lahir Ibu">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" name="No_hp" autocomplete="false" required  value="{{old('No_hp')}}"  class="form-control date" placeholder="No Hp (+62)">
                </div>
              </div>
            </div>
            <h3>Peserta Didik</h3>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" name="nama_lengkap"  value="{{old('nama_lengkap')}}"  class="form-control" placeholder="Nama Lengkap">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" name="tempat_lahir"  value="{{old('tempat_lahir')}}" class="form-control" placeholder="Tempat Lahir">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="date" name="tgl_lahir"  value="{{old('tgl_lahir')}}" class="form-control" placeholder="Tanggal Lahir">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" name="agama"  value="{{old('agama')}}" class="form-control" placeholder="Agama">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" name="jenis_kelamin"  value="{{old('Jenis_kelamin')}}" class="form-control" placeholder="Jenis kelamin">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <textarea class="form-control" name="alamat" placeholder="Alamat">{{old('alamat')}}</textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <button type="submit" class="default-btn btn send_btn"> Submit <span></span></button>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="already_account">Already Have Account? <a href="{{url('login')}}">Login</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Register End -->

  </div>
</div>
<!-- Inner Content Start -->
@endsection
