<?php
session_start();

function nominal($var = '')
{
    return number_format($var, 0, '.', '.');
}

function replacePhone($phone){
    $phone = str_replace(" ","",$phone);
    $phone = str_replace("-","",$phone);
    $phone = str_replace("+","",$phone);
    $phone = ltrim($phone, '0');
    $phone = '62'.$phone;
    return $phone;
}

function createPaymentLink($nominal, $pengirim, $nomor_pengirim){
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://pay.deltanet.co.id/mobile/v1',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('api_key' => 'stmpembangunan',
                                'action' => 'terima_uang',
                                'token' => '02A9DF3869191DEF1449BC35DCD37658',
                                'nominal' => $nominal,
                                'pengirim' => $pengirim,
                                'nomor_pengirim' => $nomor_pengirim),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    $response = json_decode($response);
    return $response->data->session;
}

function sendMessage($phone, $message){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://whatsapp.kemasaja.id/api/create-message',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array(
      'appkey' => '2cd4988a-9631-41c9-afa5-6ca6b2029d3e',
      'authkey' => '8o04s5G1xpNljPYj0Lb6NWAdht5Gcxh12VzCFW7UXtaxFlj2Dg',
      'to' => $phone,
      'message' => $message,
      'sandbox' => 'false'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
}

$mysqli = new mysqli("localhost","trab1447_prabu","7Ac6M5M4Xjcb23Zb","trab1447_prabu");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$post = json_decode(file_get_contents('php://input'));

// echo json_encode($post); exit();

$tipe = $post->tipe;
switch ($tipe) {
    case 'Drop Off':
        $dari_text = $post->dari_text;
        $ke_text = $post->ke_text;
        $from = $post->from;
        $to = $post->to;
        $alamat = $post->alamat;
        $nama_maskapai = $post->nama_maskapai;
        $nomor_maskapai = $post->nomor_maskapai;
        $akhir_tanggal = $post->akhir_tanggal;
        $akhir_waktu = $post->akhir_waktu;
        $awal_tanggal = $post->awal_tanggal;
        $awal_waktu = $post->awal_waktu;
        $catatan = $post->catatan;
        $pemesan_nama = $post->pemesan_nama;
        $pemesan_telepon = $post->pemesan_telepon;
        $pemesan_email = $post->pemesan_email;
        $jenis_mobil = $post->jenis_mobil;

if($jenis_mobil){

    $nominal_pembayaran = 0;
    $nominal_diskon = 0;
    $nominal_pajak = 0;
    $nominal_unik = 0;
    $total_pembayaran = 0;
    $jumlah_umum = 0;
    $jumlah_mahasiswa = 0;

    switch ($jenis_mobil) {
        case 'Avanza':
            $nominal_pembayaran = 800000;
            $nominal_diskon = 30000;
            break;
        case 'Brio':
            $nominal_pembayaran = 600000;
            $nominal_diskon = 10000;
            break;
        case 'Fortuner':
            $nominal_pembayaran = 1500000;
            $nominal_diskon = 50000;
            break;
        
        default:
            $nominal_pembayaran = 800000;
            $nominal_diskon = 30000;
            break;
    }
    
    $nominal_pajak = ($nominal_pembayaran-$nominal_diskon)*0.1;
    $nominal_unik = rand(1,50);
    $total_pembayaran = ($nominal_pembayaran-$nominal_diskon)+$nominal_pajak+$nominal_unik;
    $total_pembayaran2 = ($nominal_pembayaran-$nominal_diskon)+$nominal_pajak;

    $sql = "SELECT * FROM pesanan ORDER BY id DESC LIMIT 0,1";
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
        $sql = "INSERT INTO `pesanan` (`id`, `nomor`, `tipe`, `dari_tipe`, `dari`, `ke`, `dari_text`, `ke_text`, `alamat`, `awal_tanggal`, `awal_waktu`, `akhir_tanggal`, `akhir_waktu`, `catatan`, `pemesan_nama`, `pemesan_telepon`, `pemesan_email`, `status_pembayaran`, `nominal_pembayaran`, `nominal_pajak`, `nominal_diskon`, `nominal_unik`, `total_pembayaran`, `batas_pembayaran`, `created_at`, `created_by`, `updated_at`, `updated_by`, `nama_maskapai`, `nomor_maskapai`, `jenis_mobil`) VALUES (NULL, '".($row['nomor']+1)."', '".$tipe."', 'bandara', '".$from."', '".$to."', '".$dari_text."', '".$ke_text."', '".$alamat."', '".$awal_tanggal."', '".$awal_waktu."', '".$akhir_tanggal."', '".$akhir_waktu."', '".$catatan."', '".$pemesan_nama."', '".$pemesan_telepon."', '".$pemesan_email."', 'Menunggu Pembayaran', '".$nominal_pembayaran."', '".$nominal_pajak."', '".$nominal_diskon."', '".$nominal_unik."', '".$total_pembayaran."', '".date("Y-m-d H:i:s", strtotime('+3 hours'))."', '".date("Y-m-d H:i:s")."', 'Pelanggan Web', '".date("Y-m-d H:i:s")."', 'Pelanggan Web', '".$nama_maskapai."', '".$nomor_maskapai."', '".$jenis_mobil."');";
        $mysqli->query($sql);
        $id = $mysqli->insert_id;
        
        $message = 'Halo kak '.$pemesan_nama.',

Terima kasih telah mengisi formulir di Prabu Travel

*Data Pesanan Drop Off*
Dari : '.$dari_text.'
Ke : '.$ke_text.'
Alamat : '.$alamat.'
Tanggal : '.$awal_tanggal.'
Waktu : '.$awal_waktu.'
Waktu Keberangkatan/Takeoff : '.str_replace("T","",$akhir_waktu).'
Catatan : '.$catatan.'
Jenis Mobil : '.$jenis_mobil.'

Total Pembayaran : Rp. '.nominal($total_pembayaran).'

Kami akan segera menghubungi untuk verifikasi.';

//kirim ke pengisi form
sendMessage($pemesan_telepon, $message);


$message = 'Halo kak, mohon segera verifikasi untuk pesanan baru

*Data Pesanan Drop Off*
Dari : '.$dari_text.'
Ke : '.$ke_text.'
Alamat : '.$alamat.'
Tanggal : '.$awal_tanggal.'
Waktu : '.$awal_waktu.'
Waktu Keberangkatan/Takeoff : '.str_replace("T"," ",$akhir_waktu).'
Catatan : '.$catatan.'
Jenis Mobil : '.$jenis_mobil.'

Total Pembayaran : Rp. '.nominal($total_pembayaran).'

*Data PIC*
Nama : '.$pemesan_nama.'
Telepon/Whatsapp : wa.me/'.$pemesan_telepon.'

Terima kasih';
//kirim ke kita
sendMessage('62811234233', $message);
sendMessage('6281214699233', $message);
        $payment = createPaymentLink($total_pembayaran2, $pemesan_nama, $pemesan_telepon);
        $resp = ['error_code'=>200,'error_msg'=>'success','data'=>(object)['payment_url'=>'https://pay.deltanet.co.id/i/'.$payment]];
        echo json_encode($resp);
    }
}
else{
    $resp = ['error_code'=>500,'error_msg'=>'failed','data'=>(object)[]];
    echo json_encode($resp);
}
        break;
    
    default:
        $dari_text = $post->dari_text;
$ke_text = $post->ke_text;
$from = $post->from;
$to = $post->to;
$alamat = $post->alamat;
$nama_maskapai = $post->nama_maskapai;
$nomor_maskapai = $post->nomor_maskapai;
$akhir_tanggal = $post->akhir_tanggal;
$akhir_waktu = $post->akhir_waktu;
$awal_tanggal = $post->awal_tanggal;
$awal_waktu = $post->awal_waktu;
$catatan = $post->catatan;
$pemesan_nama = $post->pemesan_nama;
$pemesan_telepon = $post->pemesan_telepon;
$pemesan_email = $post->pemesan_email;
$nama_penumpang = $post->nama_penumpang;
$jenis_penumpang = $post->jenis_penumpang;

if(count($nama_penumpang)>0){

    $nominal_pembayaran = 0;
    $nominal_diskon = 0;
    $nominal_pajak = 0;
    $nominal_unik = 0;
    $total_pembayaran = 0;
    $jumlah_umum = 0;
    $jumlah_mahasiswa = 0;
    for($i = 0; $i < count($nama_penumpang); $i++){
        if($jenis_penumpang[$i] == "Umum"){
            $nominal_pembayaran = $nominal_pembayaran+250000;
            $nominal_diskon = $nominal_diskon+0;
            $jumlah_umum++;
        }
        if($jenis_penumpang[$i] == "Mahasiswa"){
            $nominal_pembayaran = $nominal_pembayaran+250000;
            $nominal_diskon = $nominal_diskon+50000;
            $jumlah_mahasiswa++;
        }
    }
    $nominal_pajak = ($nominal_pembayaran-$nominal_diskon)*0.1;
    $nominal_unik = rand(1,50);
    $total_pembayaran = ($nominal_pembayaran-$nominal_diskon)+$nominal_pajak+$nominal_unik;
    $total_pembayaran2 = ($nominal_pembayaran-$nominal_diskon)+$nominal_pajak;

    $sql = "SELECT * FROM pesanan ORDER BY id DESC LIMIT 0,1";
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
        $sql = "INSERT INTO `pesanan` (`id`, `nomor`, `tipe`, `dari_tipe`, `dari`, `ke`, `dari_text`, `ke_text`, `alamat`, `awal_tanggal`, `awal_waktu`, `akhir_tanggal`, `akhir_waktu`, `catatan`, `pemesan_nama`, `pemesan_telepon`, `pemesan_email`, `status_pembayaran`, `nominal_pembayaran`, `nominal_pajak`, `nominal_diskon`, `nominal_unik`, `total_pembayaran`, `batas_pembayaran`, `created_at`, `created_by`, `updated_at`, `updated_by`, `nama_maskapai`, `nomor_maskapai`) VALUES (NULL, '".($row['nomor']+1)."', '".$tipe."', 'bandara', '".$from."', '".$to."', '".$dari_text."', '".$ke_text."', '".$alamat."', '".$awal_tanggal."', '".$awal_waktu."', '".$akhir_tanggal."', '".$akhir_waktu."', '".$catatan."', '".$pemesan_nama."', '".$pemesan_telepon."', '".$pemesan_email."', 'Menunggu Pembayaran', '".$nominal_pembayaran."', '".$nominal_diskon."', '".$nominal_pajak."', '".$nominal_unik."', '".$total_pembayaran."', '".date("Y-m-d H:i:s", strtotime('+3 hours'))."', '".date("Y-m-d H:i:s")."', 'Pelanggan Web', '".date("Y-m-d H:i:s")."', 'Pelanggan Web', '".$nama_maskapai."', '".$nomor_maskapai."');";
        $mysqli->query($sql);
        $id = $mysqli->insert_id;
        
        for($i = 0; $i < count($nama_penumpang); $i++){
            $harga = 250000;
            $diskon = 0;
            if($jenis_penumpang[$i]=="Mahasiswa"){
                $diskon = 50000;
            }
            $sql = "INSERT INTO `pesanan_detail` (`id`, `pesanan_id`, `nama_penumpang`, `jenis_penumpang`, `kartu_mahasiswa`, `harga`, `diskon`) VALUES (NULL, '".$id."', '".$nama_penumpang[$i]."', '".$jenis_penumpang[$i]."', '', '".$harga."', '".$diskon."');";
            $mysqli->query($sql);
        }
        
        $message = 'Halo kak '.$pemesan_nama.',

Terima kasih telah mengisi formulir di Prabu Travel

*Data Pesanan '.$tipe.'*
Dari : '.$dari_text.'
Ke : '.$ke_text.'
Alamat : '.$alamat.'
Tanggal : '.$awal_tanggal.'
Waktu : '.$awal_waktu.'
Waktu Keberangkatan/Takeoff : '.str_replace("T","",$akhir_waktu).'
Catatan : '.$catatan.'
Jumlah Umum : '.$jumlah_umum.'
Jumlah Mahasiswa : '.$jumlah_mahasiswa.'

Total Pembayaran : Rp. '.nominal($total_pembayaran).'

Kami akan segera menghubungi untuk verifikasi.';

//kirim ke pengisi form
sendMessage($pemesan_telepon, $message);


$message = 'Halo kak, mohon segera verifikasi untuk pesanan baru

*Data Pesanan '.$tipe.'*
Dari : '.$dari_text.'
Ke : '.$ke_text.'
Alamat : '.$alamat.'
Tanggal : '.$awal_tanggal.'
Waktu : '.$awal_waktu.'
Waktu Keberangkatan/Takeoff : '.str_replace("T"," ",$akhir_waktu).'
Catatan : '.$catatan.'
Jumlah Umum : '.$jumlah_umum.'
Jumlah Mahasiswa : '.$jumlah_mahasiswa.'

Total Pembayaran : Rp. '.nominal($total_pembayaran).'

*Data PIC*
Nama : '.$pemesan_nama.'
Telepon/Whatsapp : wa.me/'.$pemesan_telepon.'

Terima kasih';
//kirim ke kita
sendMessage('62811234233', $message);
sendMessage('6281214699233', $message);
        $payment = createPaymentLink($total_pembayaran2, $pemesan_nama, $pemesan_telepon);
        $resp = ['error_code'=>200,'error_msg'=>'success','data'=>(object)['payment_url'=>'https://pay.deltanet.co.id/i/'.$payment]];
        echo json_encode($resp);
    }
}
else{
    $resp = ['error_code'=>500,'error_msg'=>'failed','data'=>(object)[]];
    echo json_encode($resp);
}
        break;
}
$mysqli->close(); ?>