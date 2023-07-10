<!doctype html>
<html lang="en">

<!-- Mirrored from entiretimes.com/html/school/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jun 2023 03:52:27 GMT -->
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Fav Icon -->
<link rel="shortcut icon" href="favicon.ico">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{url('')}}/css/bootstrap.min.css">
<link href="{{url('')}}/css/all.css" rel="stylesheet">
<link href="{{url('')}}/css/owl.carousel.css" rel="stylesheet">

<!-- <link rel="stylesheet" href="css/switcher.css"> -->
<link rel="stylesheet" href="{{url('')}}/rs-plugin/css/settings.css">
<!-- Jquery Fancybox CSS -->
<link rel="stylesheet" type="text/css" href="{{url('')}}/css/jquery.fancybox.min.css" media="screen" />
<link href="{{url('')}}/css/animate.css" rel="stylesheet">
<link href="{{url('')}}/css/style.css" rel="stylesheet"  id="colors">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
<title>TK Al Bahri</title>
</head>
<body>
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
            </tr>
            @endforeach
        </table>
