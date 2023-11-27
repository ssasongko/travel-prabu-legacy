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

	<div class="sliders">
		<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
	      <div class="carousel-indicators">
	        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
	        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
	        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
	      </div>
	      <div class="carousel-inner">
	        <div class="carousel-item active" data-bs-interval="3000">
				<img src="assets/images/sliders/slider-1.png">
	        </div>
	        <div class="carousel-item" data-bs-interval="3000">
				<img src="assets/images/sliders/slider-1.png">
	        </div>
	        <div class="carousel-item" data-bs-interval="3000">
				<img src="assets/images/sliders/slider-1.png">
	        </div>
	      </div>
	    </div>
	</div>

	<div class="order">
		<div class="order-title">
			<b class="c-green">Pesan Tiket Murah</b> Door To Door!
		</div>
		<div class="row mt-3">
			<div class="col-sm-12">
				<table width="100%">
					<tr>
						<td>
							<div class="garis">
								<div>Dari</div>
								<div><input type="text" class="form-control no-border" placeholder="Ketik Nama Kecamatan atau Bandara"></div>
							</div>
						</td>
						<td width="40px" style="padding: 10px;">
							<img src="assets/images/icons/switch.png">
						</td>
						<td>
							<div class="garis">
								<div>Ke</div>
								<div><input type="text" class="form-control no-border" placeholder="Ketik Nama Kecamatan atau Bandara"></div>
							</div>
						</td>
						<td width="30%">
							<div class="garis">
								<div>Jumlah Penumpang</div>
								<div style="display:flex;">
									<div style="margin-top:6px;">
										<img src="assets/images/icons/people.png">
									</div>
									<div>
										<input type="text" class="form-control no-border ms-3" value="1 Dewasa, 1 Anak" readonly>
									</div>
								</div>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button class="btn btn-success f-14 mt-3" type="button">Pesan Sekarang</button>
		</div>
	</div>

	<div class="service">
		<div class="title-service">
			<b>Layanan</b> Kami
		</div>
		<div class="subtitle-service">
			Kendaraan Eksklusif, Petualangan Tidak Terlupakan. Nikmati Setiap Detik Perjalanan.
		</div>
		<div class="mt-3">
			<button class="button-tab">Drop Off</button>
			<button class="button-tab">Shuttle</button>
			<button class="button-tab active">Rental Mobil</button>
			<button class="button-tab">Rental Bus</button>
		</div>
		<div class="row mt-3">
			<div class="col-sm-3">
				<img src="assets/images/services/1.png">
				<div class="item-service mt-2">Innova Reborn</div>
				<div class="subitem-service mt-2">Include: Gaji Supir, Uang Makan Supir, dan BBM</div>
				<div class="price-service">Mulai <b>Rp 1.000.000</b></div>
			</div>
			<div class="col-sm-3">
				<img src="assets/images/services/2.png">
				<div class="item-service mt-2">Avanza</div>
				<div class="subitem-service mt-2">Include: Gaji Supir, Uang Makan Supir, dan BBM</div>
				<div class="price-service">Mulai <b>Rp 800.000</b></div>
			</div>
			<div class="col-sm-3">
				<img src="assets/images/services/3.png">
				<div class="item-service mt-2">Suzuki XL7</div>
				<div class="subitem-service mt-2">Include: Gaji Supir, Uang Makan Supir, dan BBM</div>
				<div class="price-service">Mulai <b>Rp 900.000</b></div>
			</div>
			<div class="col-sm-3">
				<img src="assets/images/services/4.png">
				<div class="item-service mt-2">Hiace</div>
				<div class="subitem-service mt-2">Include: Gaji Supir, Uang Makan Supir, dan BBM</div>
				<div class="price-service">Mulai <b>Rp 1.200.000</b></div>
			</div>
		</div>
	</div>

	<div class="city-tour">
		<div class="title-city">
			<b>City</b> Tour
		</div>
		<div class="subtitle-city">
			Nikmati liburan tour dikota yang ingin anda kunjungi.
		</div>
		<div class="row mt-3">
			<div class="col-sm-3">
				<img src="assets/images/city/1.png">
				<div class="item-city mt-2">Jepang + Shirakawago</div>
				<div class="subitem-city mt-2">7D5N</div>
				<div class="price-city">Mulai <b>Rp 27Jt-an</b></div>
			</div>
			<div class="col-sm-3">
				<img src="assets/images/city/2.png">
				<div class="item-city mt-2">Jepang + Shirakawago</div>
				<div class="subitem-city mt-2">7D5N</div>
				<div class="price-city">Mulai <b>Rp 27Jt-an</b></div>
			</div>
			<div class="col-sm-3">
				<img src="assets/images/city/3.png">
				<div class="item-city mt-2">Jepang + Shirakawago</div>
				<div class="subitem-city mt-2">7D5N</div>
				<div class="price-city">Mulai <b>Rp 27Jt-an</b></div>
			</div>
			<div class="col-sm-3">
				<img src="assets/images/city/4.png">
				<div class="item-city mt-2">Jepang + Shirakawago</div>
				<div class="subitem-city mt-2">7D5N</div>
				<div class="price-city">Mulai <b>Rp 27Jt-an</b></div>
			</div>
		</div>
	</div>

	<div class="facility">
		<div class="title-facility">
			<b>Fasilitas</b> Yang Didapatkan
		</div>
		<div class="subtitle-facility">
			Nikmati Setiap Mil dengan Kenyamanan Kabin Eksklusif.
		</div>
		<div class="row mt-3">
			<div class="col-sm-3">
				<img src="assets/images/facility/1.png">
				<div class="item-facility">Kendaraan Modern Dan Terawat</div>
				<div class="item-sub-facility">Armada kendaraan terbaru dengan perawatan rutin untuk memastikan kenyamanan dan kehandalan.</div>
			</div>
			<div class="col-sm-3">
				<img src="assets/images/facility/2.png">
				<div class="item-facility">Kabin yang Luas dan Nyaman</div>
				<div class="item-sub-facility">Desain interior kabin yang dirancang untuk memberikan kenyamanan ekstra selama perjalanan.</div>
			</div>
			<div class="col-sm-3">
				<img src="assets/images/facility/3.png">
				<div class="item-facility">Penyimpanan Bagasi yang Luas</div>
				<div class="item-sub-facility">Ruang penyimpanan yang memadai untuk barang bawaan dan barang bawaan Anda.</div>
			</div>
			<div class="col-sm-3">
				<img src="assets/images/facility/4.png">
				<div class="item-facility">Layanan Antar-Jemput</div>
				<div class="item-sub-facility">Opsi untuk dijemput dari titik awal dan diantar ke tujuan akhir.</div>
			</div>
		</div>
	</div>

	<div class="full">
		<div class="text-1">Shuttle Pertama Yang Menyediakan Layanan</div>
		<div class="text-2">Door To Door</div>
		<div class="text-3">Anda tidak perlu lagi datang ke pool, cukup reservasi dan kami akan menjemput kerumah anda.</div>
		<div class="text-4 mt-3">Mudah, Cepat dan Nyaman. Yuk pesan sekarang!</div>
		<div class="d-grid gap-2 d-md-flex justify-content-md-center">
			<button class="btn btn-success f-14 mt-3" type="button">Pesan Sekarang</button>
		</div>
	</div>

	<div class="kepuasan">
		<div class="kepuasan-1"><b>Kepuasan</b> Customer Kami</div>
		<div class="kepuasan-2">Suara Puas dari Perjalanan Sejati, Kenyamanan yang Mendalam.</div>
		<div class="row mt-4">
			<div class="col-sm-4">
				<div class="bg-white">
					<div>
						<svg width="28" height="23" viewBox="0 0 28 23" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M2.92125 4.00375C4.79192 1.97575 7.62259 0.947754 11.3333 0.947754H12.6666V4.70642L11.5946 4.92109C9.76792 5.28642 8.49725 6.00509 7.81725 7.05975C7.46244 7.62793 7.26121 8.27848 7.23325 8.94775H11.3333C11.6869 8.94775 12.026 9.08823 12.2761 9.33828C12.5261 9.58833 12.6666 9.92746 12.6666 10.2811V19.6144C12.6666 21.0851 11.4706 22.2811 9.99992 22.2811H1.99992C1.6463 22.2811 1.30716 22.1406 1.05711 21.8906C0.807063 21.6405 0.666587 21.3014 0.666587 20.9478V14.2811L0.670587 10.3891C0.658587 10.2411 0.405254 6.73442 2.92125 4.00375ZM24.6666 22.2811H16.6666C16.313 22.2811 15.9738 22.1406 15.7238 21.8906C15.4737 21.6405 15.3333 21.3014 15.3333 20.9478V14.2811L15.3373 10.3891C15.3253 10.2411 15.0719 6.73442 17.5879 4.00375C19.4586 1.97575 22.2893 0.947754 25.9999 0.947754H27.3333V4.70642L26.2613 4.92109C24.4346 5.28642 23.1639 6.00509 22.4839 7.05975C22.1291 7.62793 21.9279 8.27848 21.8999 8.94775H25.9999C26.3535 8.94775 26.6927 9.08823 26.9427 9.33828C27.1928 9.58833 27.3333 9.92746 27.3333 10.2811V19.6144C27.3333 21.0851 26.1373 22.2811 24.6666 22.2811Z" fill="#0CB149"/>
						</svg>
					</div>
					<div class="mt-3">
						This is by far the cleanest template and the most well structured
					</div>
					<div class="mt-3">
						<img src="assets/images/customers/1.png">
						<span class="customer-name ms-2">Paul Miles</span>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="bg-white">
					<div>
						<svg width="28" height="23" viewBox="0 0 28 23" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M2.92125 4.00375C4.79192 1.97575 7.62259 0.947754 11.3333 0.947754H12.6666V4.70642L11.5946 4.92109C9.76792 5.28642 8.49725 6.00509 7.81725 7.05975C7.46244 7.62793 7.26121 8.27848 7.23325 8.94775H11.3333C11.6869 8.94775 12.026 9.08823 12.2761 9.33828C12.5261 9.58833 12.6666 9.92746 12.6666 10.2811V19.6144C12.6666 21.0851 11.4706 22.2811 9.99992 22.2811H1.99992C1.6463 22.2811 1.30716 22.1406 1.05711 21.8906C0.807063 21.6405 0.666587 21.3014 0.666587 20.9478V14.2811L0.670587 10.3891C0.658587 10.2411 0.405254 6.73442 2.92125 4.00375ZM24.6666 22.2811H16.6666C16.313 22.2811 15.9738 22.1406 15.7238 21.8906C15.4737 21.6405 15.3333 21.3014 15.3333 20.9478V14.2811L15.3373 10.3891C15.3253 10.2411 15.0719 6.73442 17.5879 4.00375C19.4586 1.97575 22.2893 0.947754 25.9999 0.947754H27.3333V4.70642L26.2613 4.92109C24.4346 5.28642 23.1639 6.00509 22.4839 7.05975C22.1291 7.62793 21.9279 8.27848 21.8999 8.94775H25.9999C26.3535 8.94775 26.6927 9.08823 26.9427 9.33828C27.1928 9.58833 27.3333 9.92746 27.3333 10.2811V19.6144C27.3333 21.0851 26.1373 22.2811 24.6666 22.2811Z" fill="#0CB149"/>
						</svg>
					</div>
					<div class="mt-3">
						This is by far the cleanest template and the most well structured
					</div>
					<div class="mt-3">
						<img src="assets/images/customers/1.png">
						<span class="customer-name ms-2">Paul Miles</span>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="bg-white">
					<div>
						<svg width="28" height="23" viewBox="0 0 28 23" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M2.92125 4.00375C4.79192 1.97575 7.62259 0.947754 11.3333 0.947754H12.6666V4.70642L11.5946 4.92109C9.76792 5.28642 8.49725 6.00509 7.81725 7.05975C7.46244 7.62793 7.26121 8.27848 7.23325 8.94775H11.3333C11.6869 8.94775 12.026 9.08823 12.2761 9.33828C12.5261 9.58833 12.6666 9.92746 12.6666 10.2811V19.6144C12.6666 21.0851 11.4706 22.2811 9.99992 22.2811H1.99992C1.6463 22.2811 1.30716 22.1406 1.05711 21.8906C0.807063 21.6405 0.666587 21.3014 0.666587 20.9478V14.2811L0.670587 10.3891C0.658587 10.2411 0.405254 6.73442 2.92125 4.00375ZM24.6666 22.2811H16.6666C16.313 22.2811 15.9738 22.1406 15.7238 21.8906C15.4737 21.6405 15.3333 21.3014 15.3333 20.9478V14.2811L15.3373 10.3891C15.3253 10.2411 15.0719 6.73442 17.5879 4.00375C19.4586 1.97575 22.2893 0.947754 25.9999 0.947754H27.3333V4.70642L26.2613 4.92109C24.4346 5.28642 23.1639 6.00509 22.4839 7.05975C22.1291 7.62793 21.9279 8.27848 21.8999 8.94775H25.9999C26.3535 8.94775 26.6927 9.08823 26.9427 9.33828C27.1928 9.58833 27.3333 9.92746 27.3333 10.2811V19.6144C27.3333 21.0851 26.1373 22.2811 24.6666 22.2811Z" fill="#0CB149"/>
						</svg>
					</div>
					<div class="mt-3">
						This is by far the cleanest template and the most well structured
					</div>
					<div class="mt-3">
						<img src="assets/images/customers/1.png">
						<span class="customer-name ms-2">Paul Miles</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="article">
		<div class="title-article">
			<b>Artikel</b> dan Tips
		</div>
		<div class="subtitle-article">
			Petualangan Di Balik Kemudi: Mengeksplorasi Keindahan dengan Layanan Travel Mobil.
		</div>
		<div class="row mt-3">
			<div class="col-sm-4">
				<img src="assets/images/articles/1.png">
				<div class="article-time mt-2">1 Januari 2023</div>
				<div class="article-title mt-2">Figma ipsum component variant main layer.</div>
				<div class="article-description mt-2">Armada kendaraan terbaru dengan perawatan rutin untuk memastikan kenyamanan dan kehandalan.</div>
				<div class="article-link mt-2"><a href="#">Selengkapnya</a></div>
			</div>
			<div class="col-sm-4">
				<img src="assets/images/articles/2.png">
				<div class="article-time mt-2">1 Januari 2023</div>
				<div class="article-title mt-2">Figma ipsum component variant main layer.</div>
				<div class="article-description mt-2">Armada kendaraan terbaru dengan perawatan rutin untuk memastikan kenyamanan dan kehandalan.</div>
				<div class="article-link mt-2"><a href="#">Selengkapnya</a></div>
			</div>
			<div class="col-sm-4">
				<img src="assets/images/articles/3.png">
				<div class="article-time mt-2">1 Januari 2023</div>
				<div class="article-title mt-2">Figma ipsum component variant main layer.</div>
				<div class="article-description mt-2">Armada kendaraan terbaru dengan perawatan rutin untuk memastikan kenyamanan dan kehandalan.</div>
				<div class="article-link mt-2"><a href="#">Selengkapnya</a></div>
			</div>
		</div>
	</div>

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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>