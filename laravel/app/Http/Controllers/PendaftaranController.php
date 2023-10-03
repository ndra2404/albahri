<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\PendaftaranModel;
use App\Http\Models\User;
use App\Http\Models\OrangtuaModel;
use App\Http\Models\DocumentModel;
use App\Http\Models\InterviewModel;
use App\Http\Models\MasterParamModel;
use App\Http\Models\ConfirmationModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

class PendaftaranController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('register');
    }
    public function store(Request $request){
        $now = Carbon::now(); // Tanggal sekarang
        $b_day = Carbon::parse($request->input('tgl_lahir')); // Tanggal Lahir
        $age = $b_day->diffInYears($now);
        if($age<=3){
            redirect('pendaftaran')
            ->with([
                'status'=>'alert-danger',
                'message' => 'Umur kurang dari 3 tahun',
            ]);
        }else if($age>=5){
            redirect('pendaftaran')
            ->with([
                'status'=>'alert-danger',
                'message' => 'Umur Lebih dari 5 tahun',
            ]);
        }
        $kelas = $age==3?'A':($age==4?'B':'');
        DB::beginTransaction();
        try {
            $code = $this->invoiceNumber();
            $dataUser = array(
                'username'=>$request->input('email'),
                'password'=>\Hash::make($request->input('password')),
                'level'=>2,
                'status'=>1
            );
            $user = User::create($dataUser);

            $orangtua = new OrangtuaModel();
            $orangtua->nama_ayah=$request->input('nama_ayah');
            $orangtua->tempat_lahir_ayah=$request->input('tempat_lahir_ayah');
            $orangtua->tgl_lahir_ayah=date('Ymd',strtotime($request->input('tgl_lahir_ayah')));
            $orangtua->pekerjaan_ayah=$request->input('pekerjaan_ayah');
            $orangtua->nama_ibu=$request->input('nama_ibu');
            $orangtua->tempat_lahir_ibu=$request->input('tempat_lahir_ibu');
            $orangtua->tgl_lahir_ibu=date('Ymd',strtotime($request->input('tgl_lahir_ibu')));
            $orangtua->pekerjaan_ibu=$request->input('pekerjaan_ibu');
            $orangtua->no_telp=$request->input('no_hp');
            $orangtua->email=$request->input('email');
            $orangtua->id_users = $user->id;
            $orangtua->save();

            $dataSiswa = new PendaftaranModel();
            $dataSiswa->no_pendaftaran=$code;
            $dataSiswa->nama_lengkap=$request->input('nama_lengkap');
            $dataSiswa->tempat_lahir=$request->input('tempat_lahir');
            $dataSiswa->tgl_lahir=date('Ymd',strtotime($request->input('tgl_lahir')));
            $dataSiswa->jenis_kelamin=$request->input('jenis_kelamin');
            $dataSiswa->agama=$request->input('agama');
            $dataSiswa->alamat=$request->input('alamat');
            $dataSiswa->id_orangtua = $orangtua->id;
            $dataSiswa->status=1;
            $dataSiswa->kelas=$kelas;

            $dataSiswa->save();
            DB::commit();
            return redirect('pendaftaran')
                ->with([
                    'status'=>'alert-success',
                    'message' => 'Pendaftaran berhasil silahkan login',
                ]);
        } catch (\Exception $th) {
            //throw $th;
            print_r($th->getMessage());
            return redirect('pendaftaran')
            ->with([
                'status'=>'alert-danger',
                'message' => $th->getMessage(),
            ]);
            DB::rollback();
        }

       // print_r($request->all());

    }
    public function pesertaDidik(){
        $tgl = MasterParamModel::where('param_code','MULAI')->first();
        $mulai = date('d M Y',strtotime($tgl->param_value));
        if(Auth::user()->level==1||Auth::user()->level==3){
            $pesertas = PendaftaranModel::all();
        }else{
            $orangtua = OrangtuaModel::where('id_users',Auth::user()->id)->firstOrFail();
            $pesertas = PendaftaranModel::where('id_orangtua',$orangtua->id_orangtua)->get();
        }
        return view('user.pesertadidik',compact('pesertas','mulai'));
    }
    public function Jadwal(){
        $pesertas = PendaftaranModel::whereIn('status',[3,5])->get();
        return view('user.pesertadidik',compact('pesertas'));
    }
    public function pembayaran(){
        $pesertas = PendaftaranModel::whereIn('status',[7])->get();
        return view('user.pesertadidik',compact('pesertas'));
    }

    public function verification(REQUEST $reg,$id){

        if($reg->isMethod('post')){
            $dataUpdate = PendaftaranModel::where('id_pendaftaran',$id)->update(['status'=>$reg->input('status')]);
        }
        $data = PendaftaranModel::leftJoin('tbl_orangtua as b','b.id_orangtua','=','tbl_pendaftaran.id_orangtua')
        ->where('id_pendaftaran',$id)->firstOrFail();
        $document = DocumentModel::where('id_pendaftaran',$id)->firstOrFail();
        return view('user.verification',compact('data','document'));
    }
    public function cekPembayaran(REQUEST $reg,$id){
        $data = PendaftaranModel::leftJoin('tbl_orangtua as b','b.id_orangtua','=','tbl_pendaftaran.id_orangtua')
        ->where('id_pendaftaran',$id)->firstOrFail();

        if($reg->isMethod('post')){
            $dataUpdate = PendaftaranModel::where('id_pendaftaran',$id)->update(['status'=>'8']);
            $tgl = MasterParamModel::where('param_code','MULAI')->first();
            echo $message ="Dear Ibu/Bapak,\n\nPembayaran anda dengan nomor Pendaftaran ".$data->no_pendaftaran." telah kami terima, Pembelajaran dimulai pada ".date('d M Y',strtotime($tgl->param_value));
            return redirect()->away('https://wa.me/'.$data->no_telp.'?text='.urlencode($message));
        }

        $document = DocumentModel::where('id_pendaftaran',$id)->firstOrFail();
        $pembayaran = ConfirmationModel::where('id_pendaftaran',$id)->firstOrFail();
        return view('user.pembayaran',compact('data','document','pembayaran'));
    }
    public function jadwalInterview(REQUEST $reg,$id){

        if($reg->isMethod('post')){
            $dataInv = new InterviewModel();
            $dataInv->tgl_interview=$reg->input('tgl_interview');
            $dataInv->jam_interview=$reg->input('jam');
            $dataInv->note=$reg->input('note');
            $dataInv->id_pendaftaran = $id;
            $dataInv->save();
            $dataUpdate = PendaftaranModel::where('id_pendaftaran',$id)->update(['status'=>5]);
        }
        $data = PendaftaranModel::leftJoin('tbl_orangtua as b','b.id_orangtua','=','tbl_pendaftaran.id_orangtua')
        ->where('id_pendaftaran',$id)->firstOrFail();
        $document = DocumentModel::where('id_pendaftaran',$id)->firstOrFail();
        $interview = InterviewModel::where('id_pendaftaran',$id)->first();

        $notifWa = DB::table('tbl_notif')->where('code','VIEW')->first();
        $notifWa = $notifWa->content;
        $change = array('[nodaftar]','[tgl]','[jam]','[catatan]');
        $new = array($data->no_pendaftaran,'','','');

        if(isset($interview->tgl_interview)){
            $new = array($data->no_pendaftaran,date('d M Y',strtotime($interview->tgl_interview)),$interview->jam_interview,$interview->note);
        }

        $notifWa = str_replace($change,$new,$notifWa);
        return view('user.jadwalInterview',compact('data','document','interview','notifWa'));
    }
    public function invoice(REQUEST $reg,$id){
        $data = PendaftaranModel::leftJoin('tbl_orangtua as b','b.id_orangtua','=','tbl_pendaftaran.id_orangtua')
        ->where('id_pendaftaran',$id)->firstOrFail();
        PendaftaranModel::where('id_pendaftaran',$id)->update(['status'=>'99']);
        $bayar = MasterParamModel::where('param_code','BAYAR')->first();
        $norek = MasterParamModel::where('param_code','NOREK')->first();
        $notifWa = DB::table('tbl_notif')->where('code','DTOL')->first();
        $notifWa = $notifWa->content;
        $change = array('[nodaftar]','[norek]','[nominal]');
        $new = array($data->no_pendaftaran,$norek->param_value,number_format($bayar->param_value));
        return redirect()->away('https://wa.me/'.$data->no_telp.'?text='.urlencode($message));
    }
    public function tolak(REQUEST $reg,$id){
        $data = PendaftaranModel::leftJoin('tbl_orangtua as b','b.id_orangtua','=','tbl_pendaftaran.id_orangtua')
        ->where('id_pendaftaran',$id)->firstOrFail();
        PendaftaranModel::where('id_pendaftaran',$id)->update(['status'=>'6']);
        $bayar = MasterParamModel::where('param_code','BAYAR')->first();
        $notifWa = DB::table('tbl_notif')->where('code','DTOL')->first();
        $notifWa = $notifWa->content;
        $change = array('[nodaftar]');
        $new = array($data->no_pendaftaran);
        $notifWa = str_replace($change,$new,$notifWa);
        return redirect()->away('https://wa.me/'.$data->no_telp.'?text='.urlencode($notifWa));
    }
    public function uploadDocument(Request $reg,$id){
        $destinationPath = 'upload/document';
        if($reg->isMethod('post')){
            DB::beginTransaction();
            $no_pendaftaran = PendaftaranModel::where('id_pendaftaran',$id)->firstOrFail();

            //Akte
            $fileAkta =$reg->file('akte_kelahiran');
            $extension = $fileAkta->getClientOriginalExtension();
            $fileNameAkte = $no_pendaftaran->no_pendaftaran.'_akte_kelahiran'. '.' . $extension;
            $fileAkta->move($destinationPath, $fileNameAkte);

            $fileKK =$reg->file('kartu_keluarga');
            $extension = $fileKK->getClientOriginalExtension();
            $fileNameKK = $no_pendaftaran->no_pendaftaran.'_kartu_keluarga'. '.' . $extension;
            $fileKK->move($destinationPath, $fileNameKK);


            $fileKW =$reg->file('ktp_wali');
            $extension = $fileKW->getClientOriginalExtension();
            $fileNameKW = $no_pendaftaran->no_pendaftaran.'_ktp_wali'. '.' . $extension;
            $fileKW->move($destinationPath, $fileNameKW);

            $filePP =$reg->file('pas_photo');
            $extension = $filePP->getClientOriginalExtension();
            $fileNamePP = $no_pendaftaran->no_pendaftaran.'_pas_photo'. '.' . $extension;
            $filePP->move($destinationPath, $fileNamePP);

            $document = new DocumentModel();
            $document->id_pendaftaran = $id;
            $document->akte_kelahiran = $destinationPath."/".$fileNameAkte;
            $document->kartu_keluarga = $destinationPath."/".$fileNameKK;
            $document->ktp_wali= $destinationPath."/".$fileNameKW;
            $document->pas_photo = $destinationPath."/".$fileNamePP;
            if($document->save()){
                PendaftaranModel::where('id_pendaftaran',$id)->update([
                    'status'=>'2'
                ]);
                DB::commit();
                return redirect('pesertadidik')
                ->with([
                    'status'=>'alert-success',
                    'message' => 'document berhasil diupload',
                ]);
            }else{
                DB::rollback();
                return redirect('pesertadidik')
                ->with([
                    'status'=>'alert-danger',
                    'message' => 'document gagal terupload',
                ]);
            }

            //exit;
        }
        return view('user.uploadDoc');
    }
    public function confirmation(REQUEST $reg,$id){
        $destinationPath = 'upload/pembayaran';
        if($reg->isMethod('post')){
            $no_pendaftaran = PendaftaranModel::where('id_pendaftaran',$id)->firstOrFail();
            $bukti_bayar =$reg->file('bukti_bayar');
            $extension = $bukti_bayar->getClientOriginalExtension();
            $fileNamebukti_bayar = $no_pendaftaran->no_pendaftaran.'-buktiBayar'. '.' . $extension;
            $bukti_bayar->move($destinationPath, $fileNamebukti_bayar);
            $success=false;
            $adaKonfirmasi = ConfirmationModel::where('id_pendaftaran',$id)->first();
            if(!$adaKonfirmasi){
                $buktiBayar = new ConfirmationModel();
                $buktiBayar->id_pendaftaran=$id;
                $buktiBayar->no_rekening=$reg->input('no_rek');
                $buktiBayar->nominal=$reg->input('nominal');
                $buktiBayar->bukti_bayar=$destinationPath."/".$fileNamebukti_bayar;
                $buktiBayar->save();
                $success=true;
            }else{
                ConfirmationModel::where('id_pendaftaran',$id)->update([
                    'no_rekening'=>$reg->input('no_rek'),
                    'nominal'=>$reg->input('nominal'),
                    'bukti_bayar'=>$destinationPath."/".$fileNamebukti_bayar,
                ]);
                $success=true;
            }
                if($success){
                    PendaftaranModel::where('id_pendaftaran',$id)->update([
                    'status'=>'7'
                ]);
                    return redirect('pesertadidik')
                    ->with([
                        'status'=>'alert-success',
                        'message' => 'Konfirmasi pembayaran berhasil',
                    ]);
                }else{
                    return redirect('pesertadidik')
                    ->with([
                        'status'=>'alert-danger',
                        'message' => 'Konfirmasi pembayaran gagal',
                    ]);
                }
        }
        $data = PendaftaranModel::leftJoin('tbl_orangtua as b','b.id_orangtua','=','tbl_pendaftaran.id_orangtua')
        ->where('id_pendaftaran',$id)->firstOrFail();
        $bayar = MasterParamModel::where('param_code','BAYAR')->first();
        $norek = MasterParamModel::where('param_code','NOREK')->first();
        return view('user.confirmation',compact('data','bayar','norek'));
    }
    public function cetakPdf() {
        // retreive all records from db
        $data = PendaftaranModel::all();
        $pesertas = $data;
        $pdf = PDF::loadView('laporan.view', ['pesertas'=>$data]);
        //return view('laporan.view',compact('pesertas'));
        return $pdf->stream('laporan.pdf');
      }
    function invoiceNumber()
    {
        $latest = PendaftaranModel::latest()->first();
        if (! $latest) {
            return 'AL'.date('ymd').'00001';
        }
        $string = preg_replace("/[^0-9\.]/", '',$latest->no_pendaftaran);
        return 'AL' . sprintf('%04d', $string+1);
    }
}
