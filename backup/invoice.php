<?php
session_start();
function nominal($var = '')
{
    return number_format($var, 0, '.', '.');
}
$mysqli = new mysqli("localhost","trab1447_prabu","7Ac6M5M4Xjcb23Zb","trab1447_prabu");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT * FROM pesanan WHERE nomor='".$_GET['number']."'";
$result = $mysqli->query($sql);
$result2 = $mysqli->query($sql);
while ($row = $result->fetch_assoc()) {
    $sql = "SELECT * FROM pesanan_detail WHERE pesanan_id='".$row['id']."'";
    $result4 = $mysqli->query($sql);
}

$sql = "SELECT * FROM master_bank ORDER BY bank ASC";
$result3 = $mysqli->query($sql);

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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        *{
        	font-family: Poppins;
        	font-size: 14px;
        	font-weight: 600;
        	line-height: 24px;
        	letter-spacing: 0.04em;
        	text-align: left;
        }
        body{
        	background-color: #EFF2F5;
        }
        .invoice{
            margin: 0px auto;
            width: 1176px;
            padding: 32px;
            border-radius: 12px;
            gap: 48px;
            background: #FFFFFF;
        }
        .back{
            margin: 0px auto;
            width: 1176px;
            color: #02A83F;
            margin-top: 40px;
            margin-bottom: 10px;
        }
        .invoice-number{
            font-family: Poppins;
            font-size: 18px;
            font-weight: 600;
            line-height: 27px;
            letter-spacing: 0em;
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
        .tipe{
            width: 100%;
            text-align: center;
            padding: 10px 16px 10px 16px;
            border-radius: 6px;
            gap: 10px;
            background: rgba(2, 168, 63, 0.1);
            color: #02A83F;
        }
        .pending{
            width: 100%;
            text-align: center;
            padding: 10px 16px 10px 16px;
            border-radius: 6px;
            gap: 10px;
            background: rgba(253, 126, 20, 0.1);
            color: #FD7E14;
        }
        .right{
            text-align: right;
        }
        .bold{
            font-weight: bold;
        }
        .hijau{
            color: #02A83F;
        }
        .box-order{
            width: 100%;
            padding: 24px;
            border-radius: 6px;
            gap: 8px;
            background: #F8F8F8;
        }
        .copy{
            text-decoration:underline;
            color:#02A83F;
        }
        .copy:hover{
            cursor: pointer;
        }
        .text-note{
            font-family: Poppins;
            font-size: 14px;
            font-weight: 400;
            line-height: 21px;
            letter-spacing: -0.02em;
            text-align: left;
            color: #EA5455;
        }
        div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
            border: 0;
            border-radius: 0.25em;
            background: initial;
            background-color: #02A83F;
            color: #fff;
            font-size: 1em;
        }
    </style>

    <title>Travel Prabu</title>
  </head>
  <body>
      <div class="back">
          <a href="/" style="text-decoration:none; color: #02A83F;">
            <img src="/assets/images/icons/arrow-left.png"> Kembali Ke Beranda
          </a>
      </div>
      <?php
      $data = [];
      while ($row = $result2->fetch_assoc()) {
          $data = $row;
      }
      ?>
      <div class="invoice">
          <div class="row">
              <div class="col-sm-7">
                  <div class="mb-5 row">
                      <div class="col-sm-5">
                          <img src="/assets/images/logo.png">
                      </div>
                      <div class="col-sm-7 mt-4">
                          <span class="tipe"><?= $data['tipe']; ?></span>
                          <span class="pending">Menunggu Pembayaran</span>
                      </div>
                  </div>
                  <div class="mb-4">
                      <span class="invoice-number">Invoice #<?= $data['nomor']; ?></span>
                  </div>
                  <div class="row">
                      <div class="col-sm-6 mb-3">
                          <div class="small">Tanggal Pembuatan</div>
                          <div><?= $data['created_at']; ?></div>
                      </div>
                      <div class="col-sm-6 mb-3">
                          <div class="small">Waktu Tenggat</div>
                          <div><?= $data['batas_pembayaran']; ?></div>
                      </div>
                      
                      
                      <div class="col-sm-6 mb-3">
                          <div class="small">Ditujukan Kepada :</div>
                          <div><?= $data['pemesan_nama']; ?></div>
                          <div class="small"><?= $data['pemesan_telepon']; ?></div>
                      </div>
                      <div class="col-sm-6 mb-3">
                          <div class="small">Dikeluarkan Oleh :</div>
                          <div>John Cena</div>
                          <div class="small">08129838712</div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12 mb-3">
                          <table width="100%" class="table">
                              <thead>
                                  <tr>
                                      <?php if($data['tipe']=="Door to Door"){ ?>
                                      <th width="50%" class="small">Penumpang</th>
                                      <th width="30%" class="small">Jenis</th>
                                      <?php } ?>
                                      <?php if($data['tipe']=="Drop Off"){ ?>
                                      <th width="80%" class="small" colspan="2">Jenis Mobil</th>
                                      <?php } ?>
                                      <th width="20%" class="small">Harga</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php if($data['tipe']=="Door to Door"){ ?>
                                      <?php
                                      $diskon = 0;
                                      $subtotal = 0;
                                      while ($rowp = $result4->fetch_assoc()) {
                                          $diskon = $diskon+$rowp['diskon'];
                                          $subtotal = $subtotal+$rowp['harga'];
                                      ?>
                                      <tr>
                                          <td class="small"><img src="assets/images/icons/people-2.png">&nbsp;&nbsp;<?= $rowp['nama_penumpang']; ?></td>
                                          <td class="small"><?= $rowp['jenis_penumpang']; ?></td>
                                          <td class="small right">Rp. <?= nominal($rowp['harga']); ?></td>
                                      </tr>
                                      <?php } ?>
                                  <?php } ?>
                                  <?php if($data['tipe']=="Drop Off"){
                                      $diskon = $data['nominal_diskon'];
                                      $subtotal = $data['nominal_pembayaran']; ?>
                                      <tr>
                                          <td class="small" colspan="2"><?= $data['jenis_mobil']; ?></td>
                                          <td class="small right">Rp. <?= nominal($subtotal); ?></td>
                                      </tr>
                                  <?php } ?>
                                  <tr>
                                      <td class="small" <?php if($data['tipe']=="Drop Off"){ echo 'width="50%"'; } ?>></td>
                                      <td class="small">Sub Total</td>
                                      <td class="small right bold">Rp. <?= nominal($subtotal); ?></td>
                                  </tr>
                                  <tr>
                                      <td class="small"></td>
                                      <td class="small">Diskon</td>
                                      <td class="small right bold">-Rp. <?= nominal($diskon); ?></td>
                                  </tr>
                                  <tr>
                                      <td class="small"></td>
                                      <td class="small">Pajak</td>
                                      <td class="small right bold">Rp. <?= nominal(($subtotal-$diskon)*0.1); ?></td>
                                  </tr>
                                  <tr>
                                      <td class="small"></td>
                                      <td class="small">Kode Unik</td>
                                      <td class="small right bold">Rp. <?= nominal($data['nominal_unik']); ?></td>
                                  </tr>
                                  <tr>
                                      <td class="small"></td>
                                      <td class="small">Total</td>
                                      <td class="small right bold hijau">Rp. <?= nominal((($subtotal-$diskon)*1.1)+$data['nominal_unik']); ?></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="col-sm-5">
                <div class="box-order">
                    <table>
                        <tr>
                            <td width="30px"><img src="assets/images/icons/bus.png"></td>
                            <td class="small"><span class="small" id="textFrom"><?= $data['dari_text']; ?></span> > <span class="small" id="textTo"><?= $data['ke_text']; ?></span></td>
                        </tr>
                    </table>
                    
                      <div class="row">
                          <div class="col-sm-12">
                              <div style="color:grey;" class="mt-3">DETAIL PERJALANAN</div>
                          </div>
                          <div class="col-sm-12 mb-3 mt-3">
                              <div class="small">Tanggal Penjemputan</div>
                              <div><?= $data['awal_tanggal']; ?></div>
                          </div>
                          <div class="col-sm-6 mb-3">
                              <div class="small">Waktu Penjemputan</div>
                              <div><?= $data['awal_waktu']; ?></div>
                          </div>
                          <div class="col-sm-6 mb-3">
                              <div class="small">Alamat Penjemputan</div>
                              <div><?= $data['alamat']; ?></div>
                          </div>
                          <div class="col-sm-6 mb-3">
                              <div class="small">Keberangkatan/Take-Off</div>
                              <div><?= $data['akhir_waktu']; ?></div>
                          </div>
                          <div class="col-sm-6 mb-3">
                              <div class="small">Bandara</div>
                              <div><?= ($data['dari_tipe'] == "bandara")?$data['dari_text']:$data['ke_text']; ?></div>
                          </div>
                          <div class="col-sm-12">
                              <div style="color:grey;" class="mt-3">METODE PEMBAYARAN</div>
                          </div>
                      </div>
                      <div class="row mt-3">
                          <?php
                          while ($row = $result3->fetch_assoc()) {
                          ?>
                          <div class="col-sm-4 mb-4">
                              <img src="/assets/images/icons/<?= $row['bank']; ?>.png">
                          </div>
                          <div class="col-sm-6 mb-4 mt-1">
                              <?= $row['nomor']; ?>
                          </div>
                          <div class="col-sm-2 mb-4 mt-1 copy" onclick="copy('<?= $row['nomor']; ?>')">
                              Salin
                          </div>
                          <?php } ?>
                          <div class="col-sm-12 text-note">
                              <img src="/assets/images/icons/note.png">
                              <span class="text-note">Kirim bukti transfer anda lewat whatsapp yang kami kirim, jika melalui transfer ke rekening diatas.</span>
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-sm-12">
                            <a href="https://pay.deltanet.co.id/i/<?= $_GET['code']; ?>" target="_blank"><button class="btn btn-success form-control" type="submit">Pembayaran Online</button></a>
                          </div>
                          <div class="col-sm-12 text-note mt-3">
                              <img src="/assets/images/icons/note.png">
                              <span class="text-note">Klik tombol diatas untuk pembayaran online seperti QRIS, Alfamart, Indomaret dan Bank Lain.</span>
                          </div>
                      </div>
                </div>
              </div>
          </div>
      </div>
      <script>
        function copy(text) {
            var dummy = document.createElement("textarea");
            // to avoid breaking orgain page when copying more words
            // cant copy when adding below this code
            // dummy.style.display = 'none'
            document.body.appendChild(dummy);
            //Be careful if you use texarea. setAttribute('value', value), which works with "input" does not work with "textarea". – Eduard
            dummy.value = text;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
            Swal.fire({
              icon: 'success',
              title: 'Disalin.',
              text: 'Nomor Rekening Berhasil Disalin.',
              confirmButtonText: 'Oke'
            })
        }
        <?php
        if(@$_SESSION['success'] == true){ ?>
        Swal.fire({
          icon: 'info',
          title: 'Pesanan Berhasil Dikirim.',
          text: 'Pesanan mu berhasil dikirim, kami akan menghubungi anda secepatnya untuk konfirmasi pesanan.',
          confirmButtonText: 'Oke'
        })
        <?php
            $_SESSION['success'] = false;
        } ?>
      </script>
  </body>
</html>