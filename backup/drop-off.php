<?php
$mysqli = new mysqli("localhost","trab1447_prabu","7Ac6M5M4Xjcb23Zb","trab1447_prabu");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT *, master_kecamatan.nama as nama, master_kota.nama as kota FROM master_kecamatan LEFT JOIN master_kota ON master_kecamatan.kota_id = master_kota.id ORDER BY master_kecamatan.nama ASC";
$result = $mysqli->query($sql);
$result2 = $mysqli->query($sql);

$sql = "SELECT * FROM master_bandara ORDER BY nama ASC";
$result3 = $mysqli->query($sql);
$result4 = $mysqli->query($sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="assets/css/custom.css" rel="stylesheet">

    <title>Travel Prabu</title>
    <style>
        .medium{
        	font-family: Poppins;
        	font-size: 14px;
        	font-weight: 600;
        	line-height: 24px;
        	letter-spacing: 0.04em;
        	text-align: left;
        }
        .small{
            font-family: Poppins;
            font-size: 12px;
            font-weight: 500;
            line-height: 18px;
            letter-spacing: -0.01em;
            text-align: left;
        }
    </style>
  </head>
  <body>
  	<div class="header">
	  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
		    <a class="navbar-brand ms-3" href="#"><img src="assets/images/logo.png"></a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#">Beranda</a>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            Layanan
		          </a>
		          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		            <li><a class="dropdown-item" href="order.php">Door to Door</a></li>
		            <li><a class="dropdown-item" href="drop-off.php">Carter/Drop</a></li>
		            <li><a class="dropdown-item" href="#">Shuttle Regular</a></li>
		            <li><a class="dropdown-item" href="#">City Tour</a></li>
		            <li><a class="dropdown-item" href="#">Rental Mobil</a></li>
		            <li><a class="dropdown-item" href="#">Rental Bus</a></li>
		          </ul>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Jadwal Keberangkatan</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Tentang Kami</a>
		        </li>
		      </ul>
		      <div class="d-flex">
		      	<div class="me-4">
		      		<img src="assets/images/icons/sign-in.png">
		      		<span class="ms-2 f-12">Sign In</span>
			    </div>
		        <button class="btn btn-success f-12" type="submit">Daftar</button>
		      </div>
		    </div>
		  </div>
		</nav>
	</div>

    <div class="row" style="width:1176px; margin:0px auto;">
        <div class="col-sm-12">
        	<div class="orders mb-3">
        		<div class="title-orders">
        			Reservasi Online <b>Drop Off</b>
        		</div>
        		<div class="subtitle-orders">
        			Isi data diri anda untuk melanjutkan pemesanan
        		</div>
        	</div>
    	</div>
	</div>
	<form action="drop-off-process.php" method="post" enctype="multipart/form-data">
    	<div class="row" style="width:1176px; margin:0px auto; margin-bottom:100px;">
    		<div class="col-sm-7">
    		    <div class="order2">
				    <input type="hidden" name="tipe" value="Drop Off">
				    <input type="hidden" name="dari_text" id="dari_text" value="">
				    <input type="hidden" name="ke_text" id="ke_text" value="">
        			<table width="100%">
        				<tr>
        					<td width="48%">
        						<div class="fs-14">Dari</div>
        						<div>
        						    <?php if($_GET['from']=="kecamatan" || $_GET['from'] == ""){ ?>
        						    <input type="hidden" name="dari_tipe" value="kecamatan">
        						    <select id="from" name="from" class="form-control mt-2 fs-14 p-10" onchange="calculate()">
        						        <?php
        						        while ($row = $result->fetch_assoc()) {
        						            ?>
        						            <option value="<?= $row['id']; ?>"><?= $row['nama']; ?>, <?= $row['kota']; ?></option>
        						            <?php
                                        }
                                        ?>
        						    </select>
        						    <?php } else { ?>
        						    <input type="hidden" name="dari_tipe" value="bandara">
        						    <select id="from" name="from" class="form-control mt-2 fs-14 p-10" onchange="calculate()">
        						        <?php
        						        while ($row = $result3->fetch_assoc()) {
        						            ?>
        						            <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
        						            <?php
                                        }
                                        ?>
        						    </select>
        						    <?php } ?>
        						</div>
        					</td>
        					<td width="40px" style="padding: 10px;">
        					    <?php if($_GET['from']=="kecamatan" || $_GET['from'] == ""){ ?>
        						<a href="/drop-off.php?from=bandara">
        						<?php } else { ?>
        						<a href="/drop-off.php?from=kecamatan">
        						<?php } ?>
        						    <img src="assets/images/icons/switch.png" style="margin-top:30px;">
        						</a>
        					</td>
        					<td width="48%">
        						<div class="fs-14">Ke</div>
        						<div>
        						    <?php if($_GET['from']=="bandara"){ ?>
        						    <select id="to" name="to" class="form-control mt-2 fs-14 p-10" onchange="calculate()">
        						        <?php
        						        while ($row = $result->fetch_assoc()) {
        						            ?>
        						            <option value="<?= $row['id']; ?>"><?= $row['nama']; ?>, <?= $row['kota']; ?></option>
        						            <?php
                                        }
                                        ?>
        						    </select>
        						    <?php } else { ?>
        						    <select id="to" name="to" class="form-control mt-2 fs-14 p-10" onchange="calculate()">
        						        <?php
        						        while ($row = $result3->fetch_assoc()) {
        						            ?>
        						            <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
        						            <?php
                                        }
                                        ?>
        						    </select>
        						    <?php } ?>
        						</div>
        					</td>
        				</tr>
        				<tr>
        					<td colspan="3">
        						<hr>
        					</td>
        				</tr>
        				<tr>
        					<td colspan="3">
        						<div style="font-size:22px;" class="mb-4 mt-2">Detail Perjalanan</div>
        					</td>
        				</tr>
        				<tr>
        					<td colspan="3">
        						<div class="fs-14">Alamat Penjemputan</div>
        						<div><textarea name="alamat" class="form-control mt-2 fs-14 mb-3 p-10" id="alamat" placeholder="Alamat Lengkap.." rows="5" onchange="fillData()"></textarea>
        					</td>
        				</tr>
					    <?php if($_GET['from']=="bandara"){ ?>
        				<tr>
        					<td colspan="3">
        						<div class="row">
            						<div class="col-sm-6">
        						        <div class="fs-14">Nama Maskapai</div>
            						    <input type="text" name="nama_maskapai" id="nama_maskapai" class="form-control mt-2 fs-14 mb-3 p-10" placeholder="Nama Maskapai">
            						</div>
            						<div class="col-sm-6">
        						        <div class="fs-14">Nomor Penerbangan</div>
            						    <input type="text" name="nomor_maskapai" id="nomor_maskapai" class="form-control mt-2 fs-14 mb-3 p-10" placeholder="Nomor Penerbangan">
            						</div>
        						</div>
        					</td>
        				</tr>
					    <?php } else { ?>
					    <input type="hidden" name="nama_maskapai" id="nama_maskapai" class="form-control mt-2 fs-14 mb-3 p-10" placeholder="Nama Maskapai" value="">
					    <input type="hidden" name="nomor_maskapai" id="nomor_maskapai" class="form-control mt-2 fs-14 mb-3 p-10" placeholder="Nomor Maskapai" value="">
					    <?php } ?>
        				<tr>
        					<td colspan="3">
        						<div class="fs-14">Jadwal Keberangkatan/Take-Off Pesawat</div>
        						<div class="row">
            						<div class="col-sm-6">
            						    <input type="date" name="akhir_tanggal" id="akhir_tanggal" class="form-control mt-2 fs-14 mb-3 p-10" onchange="waktuJemput()">
            						</div>
            						<div class="col-sm-6">
            						    <input type="time" name="akhir_waktu" id="akhir_waktu" class="form-control mt-2 fs-14 mb-3 p-10" onchange="waktuJemput()">
            						</div>
        						</div>
        					</td>
        				</tr>
        				<tr>
        					<td colspan="3">
        						<div class="fs-14">Waktu Penjemputan</div>
        						<div class="row">
            						<div class="col-sm-6">
            						    <input type="date" name="awal_tanggal" class="form-control mt-2 fs-14 mb-3 p-10" id="awal_tanggal" readonly>
            						</div>
            						<div class="col-sm-6">
            						    <input type="text" name="awal_waktu" class="form-control mt-2 fs-14 mb-3 p-10" id="awal_waktu" readonly>
            						</div>
        						</div>
        						<div class="catatan mb-3">Waktu penjemputan mengikuti jadwal keberangkatan pesawat</div>
        					</td>
        				</tr>
        				<tr>
        					<td colspan="3">
        						<div class="fs-14">Catatan</div>
        						<div><textarea name="catatan" id="catatan" class="form-control mt-2 fs-14 mb-3 p-10" placeholder="Catatan.." rows="5" onchange="fillData()"></textarea>
        					</td>
        				</tr>
        			</table>
        		</div>
    		</div>
    		<div class="col-sm-5">
    		    <div class="order2">
    		        <div class="box-order fs-14">
    		            <table>
    		                <tr>
    		                    <td width="30px"><img src="assets/images/icons/bus.png"></td>
    		                    <td class="fs-14"><span class="fs-14" id="textFrom">Andir, Kota Bandung</span> > <span class="fs-14" id="textTo">Bandara Kertajati</span></td>
    		                </tr>
    		            </table>
    		        </div>
    		        <div class="box-order fs-14 mt-3">
    		            <table width="100%">
    		                <tr>
    		                    <td width="30px"><img src="assets/images/icons/people-2.png"></td>
    		                    <td class="fs-14" width="60%" id="textUmum">Avanza</td>
    		                    <td class="fs-14 mb-3" style="text-align:right" id="totalUmum">Rp. 800.000</td>
    		                </tr>
    		                <tr>
    		                    <td colspan="3"><hr></td>
    		                </tr>
    		                <tr>
    		                    <td width="30px"></td>
    		                    <td class="fs-14" style="text-align:right" width="50%">Diskon</td>
    		                    <td class="fs-14" style="text-align:right; color:#EA5455;" id="totalDiskon">Rp. 30.000</td>
    		                </tr>
    		                <tr>
    		                    <td width="30px"></td>
    		                    <td class="fs-14" style="text-align:right" width="50%">Total</td>
    		                    <td class="fs-14" style="text-align:right" id="total">Rp. 770.000</td>
    		                </tr>
    		            </table>
    		            <hr>
    		            <div class="row">
                          <div class="col-sm-12">
                              <div style="" class="medium">DETAIL PERJALANAN</div>
                          </div>
                          <div class="col-sm-12 mb-3 mt-3">
                              <div class="small">Tanggal Penjemputan</div>
                              <div id="awal_tanggal2" class="medium">-</div>
                          </div>
                          <div class="col-sm-6 mb-3">
                              <div class="small">Waktu Penjemputan</div>
                              <div id="awal_waktu2" class="medium">-</div>
                          </div>
                          <div class="col-sm-6 mb-3">
                              <div class="small">Alamat</div>
                              <div id="alamat2" class="medium">-</div>
                          </div>
                          <div class="col-sm-6 mb-3">
                              <div class="small">Keberangkatan/Take-Off</div>
                              <div id="akhir_tanggal2" class="medium">-</div>
                          </div>
                          <div class="col-sm-6 mb-3">
                              <div class="small">Bandara</div>
                              <div id="bandara2" class="medium">-</div>
                          </div>
                      </div>
    		        </div>
    		        
            		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
            			<button class="btn btn-success f-14 mt-3" type="submit">Lanjut Pembayaran</button>
            		</div>
            		<hr>
            		<div class="row">
                      <div class="col-sm-12">
                          <div style="color:grey;" class="small">*Catatan</div>
                      </div>
                      <div class="col-sm-12">
                          <div class="small mt-2" id="catatan2"></div>
                      </div>
                    </div>
    			</div>
    		</div>
    		
    		<div class="col-sm-7 mt-4">
    		    <div class="order2">
        			<table width="100%">
        				<tr>
        					<td colspan="3">
        						<div style="font-size:22px;" class="mb-4 mt-2">Data Pemesan</div>
        					</td>
        				</tr>
        				<tr>
        					<td colspan="3">
        						<div class="fs-14">Nama Lengkap</div>
        						<div><input type="text" name="pemesan_nama" class="form-control mt-2 fs-14 mb-3 p-10" placeholder="Nama Lengkap"></div>
        					</td>
        				</tr>
        				<tr>
        					<td colspan="3">
        						<div class="fs-14">Nomor Handphone</div>
        						<div><input type="text" name="pemesan_telepon" class="form-control mt-2 fs-14 mb-3 p-10" placeholder="081XXXXXXXX"></div>
        					</td>
        				</tr>
        				<tr>
        					<td colspan="3">
        						<div class="fs-14">Email</div>
        						<div><input type="email" name="pemesan_email" class="form-control mt-2 fs-14 mb-3 p-10" placeholder="nama@gmail.com"></div>
        					</td>
        				</tr>
        			</table>
        		</div>
    		</div>
    		
    		<div class="col-sm-7 mt-4">
    		    <div class="order2">
        			<table width="100%">
        				<tr>
        					<td colspan="2">
        						<div style="font-size:22px;" class="mb-4 mt-2">Pilih Jenis Mobil</div>
        					</td>
        				</tr>
        				<tbody id="penumpang">
        				    <tr>
            					<td colspan="4">
            					    <div class="row">
            					        <div class="col-sm-12">
                    						<div class="fs-14">Mobil</div>
                						    <select class="form-control mt-2 fs-14 mb-3 p-10" onchange="calculate()" id="jenis_mobil" name="jenis_mobil">
                						        <option value="Avanza">Avanza</option>
                						        <option value="Brio">Brio</option>
                						        <option value="Fortuner">Fortuner</option>
                						    </select>
                						</div>
            						</div>
            					</td>
            				</tr>
        				</tbody>
        			</table>
        		</div>
    		</div>
    	</div>
    </form>

	<div class="call-center">
		<div class="row">
			<div class="col-sm-8">
				<div class="call-center-title">
					<b>Call Center</b> Kami Siap Melayani 24 Jam!
				</div>
				<div class="call-center-subtitle">
					Kami siap melayani anda kapan pun, hubungi kami sekarang
				</div>
			</div>
			<div class="col-sm-4 p-4">
				<span class="button-cs me-3">
					081XXXXXXXX
				</span>
				<span class="button-cs">
					081XXXXXXXX
				</span>
			</div>
		</div>
	</div>

	<div class="bg-footer">
		<div class="footer">
			<div class="row mt-10">
				<div class="col-sm-3">
					<img src="assets/images/logo-white.png">

					<div class="text-green mb-3 mt-5">Alamat</div>
					<div class="text-white">
						Jl. Dipatiukur No.26, Lebakgede, Coblong, Kota Bandung<br>
						Jawa Barat<br>
						Indonesia
					</div>

					<div class="text-green mb-2 mt-5">Email</div>
					<div class="text-white">
						travelprabu@gmail.com
					</div>
				</div>
				<div class="col-sm-1">
				</div>
				<div class="col-sm-4">
					<div class="text-green mb-3 mt-5">Explore</div>
					<div class="text-white">
						<div class="text-white mb-3">
							Beranda
						</div>
						<div class="text-white mb-3">
							Tentang Kami
						</div>
						<div class="text-white mb-3">
							Kontak Kami
						</div>
						<div class="text-white mb-3">
							Promo
						</div>
					</div>
				</div>


				<div class="col-sm-4">
					<div class="text-green mb-3 mt-5">Follow</div>
					<div class="text-white">
						Ikuti sosial media kami untuk melihat kabar terbaru dan promo yang menarik
					</div>
					<div class="mt-3">
						<img src="assets/images/icons/instagram.png">
						<img class="ms-3" src="assets/images/icons/facebook.png">
						<img class="ms-3" src="assets/images/icons/tiktok.png">
						<img class="ms-3" src="assets/images/icons/twitter.png">
					</div>
				</div>
				<div class="col-sm-12 copyright mt-5">
					Copyright © 2023 Travel Prabu. All Rights Reserved.
				</div>
			</div>
		</div>
	</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function nominal(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        
        function calculate(){
            var totalUmum = 0;
            var totalDiskon = 0;
            var jenisMobil = $("#jenis_mobil").val();
            $("#textUmum").html(jenisMobil);
            switch(jenisMobil){
                case "Avanza":
                    totalUmum = 800000;
                    totalDiskon = 30000;
                    break;
                case "Brio":
                    totalUmum = 600000;
                    totalDiskon = 10000;
                    break;
                case "Fortuner":
                    totalUmum = 1500000;
                    totalDiskon = 50000;
                    break;
            }
            $("#totalUmum").html("Rp. "+nominal(totalUmum));
            $("#totalDiskon").html("Rp. "+0);
            if(totalDiskon>0){
                $("#totalDiskon").html("-Rp. "+nominal(totalDiskon));
            }
            $("#total").html("Rp. "+nominal(totalUmum-totalDiskon));
            
            var from = $("#from option:selected" ).text();
            var to = $("#to option:selected" ).text();
            $("#textFrom").html(from);
            $("#textTo").html(to);
            $("#dari_text").val(from);
            $("#ke_text").val(to);
            <?php if($_GET['from']=="kecamatan" || $_GET['from'] == ""){ ?>
            $("#bandara2").html(to);
            <?php } else { ?>
            $("#bandara2").html(from);
            <?php } ?>
            fillData();
        }
        
        function checkJenis(elem, number){
            $("#upload-"+number).hide();
            if($(elem).val() == "Mahasiswa"){
                $("#upload-"+number).show();
            }
            calculate();
        }
        
        function isTimeInRange(a, b, c) {
            const timeA = new Date(`1970-01-01T${a}`);
            const timeB = new Date(`1970-01-01T${b}`);
            const timeC = new Date(`1970-01-01T${c}`);
            return timeA >= timeB && timeA <= timeC;
        }
        
        function akhirTanggal(akhir_tanggal){
            const date = new Date(akhir_tanggal);
            date.setDate(date.getDate() - 1);
            return date.toISOString().split('T')[0];
        }

        function  waktuJemput(){
            var akhir_tanggal = $("#akhir_tanggal").val();
            var akhir_waktu = $("#akhir_waktu").val();
            
            $("#akhir_tanggal2").html(akhir_tanggal+" "+akhir_waktu);

            var waktuA = akhir_waktu+":00";
            var awal_waktu = "Tidak Tersedia";
            <?php if($_GET['from']=="kecamatan" || $_GET['from'] == ""){ ?>
            if (isTimeInRange(waktuA, "04:00:00", "05:30:00")) {
                awal_waktu = "20:30-22:30";
                akhir_tanggal = akhirTanggal(akhir_tanggal);
            }
            if (isTimeInRange(waktuA, "05:30:00", "07:00:00")) {
                awal_waktu = "22:30-00:30";
                akhir_tanggal = akhirTanggal(akhir_tanggal);
            }
            if (isTimeInRange(waktuA, "07:00:00", "08:30:00")) {
                awal_waktu = "00:30-02:30";
            }
            if (isTimeInRange(waktuA, "08:30:00", "10:00:00")) {
                awal_waktu = "02:30-04:30";
            }
            if (isTimeInRange(waktuA, "10:00:00", "11:30:00")) {
                awal_waktu = "04:30-06:30";
            }
            if (isTimeInRange(waktuA, "11:30:00", "13:00:00")) {
                awal_waktu = "06:30-08:30";
            }
            if (isTimeInRange(waktuA, "13:00:00", "14:30:00")) {
                awal_waktu = "08:30-10:30";
            }
            if (isTimeInRange(waktuA, "14:30:00", "16:00:00")) {
                awal_waktu = "10:30-12:30";
            }
            <?php } else { ?>
            if (isTimeInRange(waktuA, "04:00:00", "05:30:00")) {
                awal_waktu = "04:00-05:30";
                akhir_tanggal = akhirTanggal(akhir_tanggal);
            }
            if (isTimeInRange(waktuA, "05:30:00", "07:00:00")) {
                awal_waktu = "05:30-07:00";
                akhir_tanggal = akhirTanggal(akhir_tanggal);
            }
            if (isTimeInRange(waktuA, "07:00:00", "08:30:00")) {
                awal_waktu = "07:00:08:30";
            }
            if (isTimeInRange(waktuA, "08:30:00", "10:00:00")) {
                awal_waktu = "08:30-10:00";
            }
            if (isTimeInRange(waktuA, "10:00:00", "11:30:00")) {
                awal_waktu = "10:00-11:30";
            }
            if (isTimeInRange(waktuA, "11:30:00", "13:00:00")) {
                awal_waktu = "11:30-13:00";
            }
            if (isTimeInRange(waktuA, "13:00:00", "14:30:00")) {
                awal_waktu = "13:00-14:30";
            }
            if (isTimeInRange(waktuA, "14:30:00", "16:00:00")) {
                awal_waktu = "14:30-16:00";
            }
            <?php } ?>

            $("#awal_waktu").val(awal_waktu);
            $("#awal_tanggal").val(akhir_tanggal);
            $("#awal_waktu2").html(awal_waktu);
            $("#awal_tanggal2").html(akhir_tanggal);
            fillData();
        }
        
        function fillData(){
            var alamat = $("#alamat").val() ? $("#alamat").val() : '-';
            var catatan = $("#catatan").val() ? $("#catatan").val() : '-';
            $("#alamat2").html(alamat);
            $("#catatan2").html(catatan);
        }
        
        calculate();
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  
</html>
<?php $mysqli->close(); ?>
