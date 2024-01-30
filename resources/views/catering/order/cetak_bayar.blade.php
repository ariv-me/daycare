<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Laporan Pembayaran</title>
    <link rel="stylesheet" href="style.css" media="all" />
    <style>

        @page {
			size: A4 potrait;
			margin: 1cm 1cm 1cm 1cm;
		}

        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            margin: 0 auto; 
            color: #555555;
            background: #FFFFFF; 
            font-family: Arial, sans-serif; 
            font-size: 11px; 
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 100px;
        }

        #company {
            float: right;
            text-align: right;
            margin-top:25px;
        }


        #details {
         margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        #client h1 {
          color: #0087C3;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0  0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table td {
            padding: 5px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;        
            font-weight: bold;
            padding: 10px;
            background: #ff8000;
            text-align: center;
            color: #FFFFFF;
            border-bottom: 1px solid #FFFFFF;
        }

        table td {
            text-align: right;
        }

        table td h3{
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.2em;
            background: #57B223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {
        }

        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty{
            font-size: 1.0em;
        }

        table td.total {
            font-size: 1.2em;
            font-weight: bold;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap; 
            border-top: 1px solid #AAAAAA; 
        }

        table tfoot tr:first-child td {
            border-top: none; 
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223; 

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks{
            font-size: 2em;
            margin-bottom: 50px;
        }

        #kode{
            font-size: 2em;
        }

        #notices{
            padding-left: 6px;
            border-left: 6px solid #0087C3;  
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }


    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('resources/sources/assets/images/logo.jpg') }}">
      </div>
      <div id="company">
        <h2 class="name">Yayasan Semen Padang Daycare</h2>
        <div>Jl. Komplek Graha Sang Pakar, No.7 RT.02 RW.01</div>
        <div>Kelurahan Pisang, Kecamatan Pauh, Kota Padang</div>
        <div>081228181005</div>
        <div><a href="https://www.instagram.com/daycare_yayasansemenpadang/" target="_blank">daycare_yayasansemenpadang</a></div>
      </div>
      </div>
    </header>
    <main>
      <h1 style="text-align: center">Laporan Catering</h1>
      <span>
        Periode : <b>{{ $tanggal_awal }} s/d {{ $tanggal_akhir }}</b> <br>        
        Status &nbsp;&nbsp;: <b>Sudah di Bayar</b>
      </span>
      <br>
      <br>
      <table border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
          <tr>
            <th width="1%"> <b> NO </b></th>
            <th width="20%"> <b> MENU </b></th>
            <th width="40%"> <b> ANAK </b></th>
            <th width="10%" > <b> STATUS </b></th>
            <th width="5%" > <b> HARGA </b></th>
            <th width="1%" > <b> QTY </b></th>
            <th width="30%" > <b> TOTAL </b></th>
          </tr>
        </thead>
        <tbody>
          {{ $no=1 }}
          @foreach($data as $row)
            <tr>
                <td class="no" style="text-align:center;">{{ $no++ }}</td>
                <td style="text-align:left;"><b>{{$row->menu_nama}}</b> <br> {{ $row->kat_nama }}</td>
                <td style="text-align:left;">{{$row->anak_nama}}</td>
                <td style="text-align:center;">Order</td>
                <td style="text-align:center;">{{$row->detail_harga}}</td>
                <td style="text-align:center;">{{$row->detail_qty}}</td>
                <td style="text-align:center;"><b> {{$row->detail_total}}</b></td>
            </tr>
          @endforeach 
       
        </tbody>
        <thead>
            <th colspan="6" style="text-align:center; ">TOTAL</th>
            <td style="text-align:center; "><b>{{ $total_tagihan }}</b></td>
        </thead>
  
      </table>
    
  </body>
</html>