<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice Pembayaran</title>
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

        table th,
        table td {
            padding: 20px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;        
            font-weight: normal;
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
            font-size: 1.6em;
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
        table td.qty,
        table td.total {
            font-size: 1.2em;
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
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h1 class="name">{{$data->anak_nama}}</h1>
          <div class="address">{{$jekel}}</div>
          <div class="address">{{$data->anak_tmp_lahir}}, {{$tgl_lahir}}</div>
          <div class="address">{{$data->ortu_ayah}} (Ayah) - {{$data->ortu_ibu}} (Ibu)</div>
          <div class="email">{{$data->ortu_ayah_hp}} (Ayah) - {{$data->ortu_ibu_hp}} (Ibu)</div>
          <div class="email">{{$data->ortu_alamat}}</div>
        </div>
        <div id="invoice">
          <h2>{{$data->bayar_kode}}</h2>
          <div class="date">Tanggal Bayar : {{$tgl_bayar}}</div>
          <div class="date">Jatuh Tempo : {{$jatuh_tempo}}</div>
          <h3>Kode Tagihan : </h3><div id="kode">{{$tagihan->trs_kode}}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
          <tr>
            <th class="no"  width="10%"> <b> # </b></th>
            <th class="unit" width="10%"> <b> KODE </b></th>
            <th class="desc" width="100%"> <b> DESKRIPSI </b></th>
            <th class="total" width="40%" > <b> TOTAL </b></th>
          </tr>
        </thead>
        <tbody>
          {{ $no=1 }}
          @foreach($tagihan_detail as $row)
            <tr>
                <td class="no" style="text-align:center;">{{ $no++ }}</td>
                <td class="unit">{{$row->detail_kode}}</td>
                <td class="desc"><h3>{{$row->jenis_nama}}</h3>{{$row->item_nama}}</td>
                <td class="total">{{$row->detail}}</td>
            </tr>
          @endforeach 
       
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="1">TOTAL TAGIHAN</td>
            <td>{{$sub_total}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="1">PEMBAYARAN</td>
            <td>{{$bayar}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="1">SISA TAGIHAN</td>
            <td>{{$sisa}}</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div><b>Status :</b></div>
        <div class="notice">{{$status}}, Sisa tagihan : <b>{{$sisa}}</b></div>
        <br>
        <div><b> Keterangan : </b></div>
        <div class="notice"> {{ $bayar_ket }}</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>