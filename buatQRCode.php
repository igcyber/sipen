<?php
if(isset($_GET['tgl_bayar']) && $_GET['tgl_bayar'] !=''){
    //tampung data kiriman
    $nm_pelanggan=$_GET['nm_pelanggan'];
    $tgl_bayar = $_GET['tgl_bayar'];


    // include file qrlib.php
    include "phpqrcode/qrlib.php";

    //Nama Folder file QR Code kita nantinya akan disimpan
    $tempdir = "temp/";

    //jika folder belum ada, buat folder 
    if (!file_exists($tempdir)){
        mkdir($tempdir);
    }

    #parameter inputan
    $isi_teks = $tgl_bayar;
    $namafile = $nm_pelanggan.".png";
    $quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
    $ukuran = 5; //batasan 1 paling kecil, 10 paling besar
    $padding = 2;

    QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

    header('location:transaksi.php');

}else{
    header('location:transaksi.php');
}
?>
    <!-- //tampung alamat url
    $url = "detail-transaksi.php?id=<?php echo $id ?>"; -->