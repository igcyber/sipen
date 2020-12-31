<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php 
// menghubungkan dengan koneksi
include 'includes/db.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['upload']['name']) ;
move_uploaded_file($_FILES['upload']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['upload']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['upload']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$id     = $data->val($i, 1);
	$rek_baru     = $data->val($i, 2);
	$rek_lama   = $data->val($i, 3);
	$nm_pelanggan  = $data->val($i, 4);
	$unit_id = $data->val($i, 5);
	$alamat = $data->val($i, 6);
	$kelurahan = $data->val($i, 7);
	$kecamatan = $data->val($i, 8);
	$kelompok_id = $data->val($i, 9);
	$status = $data->val($i, 10);
	$tgl_status = $data->val($i, 11);
	$hasil_test = $data->val($i, 12);
	$tgl_hasil_test = $data->val($i, 13);
	$petugas_id = $data->val($i, 14);
	$foto_rumah = $data->val($i, 15);
	
	if($rek_baru != "" && $rek_lama != "" && $nm_pelanggan != "" && $unit_id != "" && $alamat != "" && $kelurahan != "" && $kecamatan != "" && $kelompok_id != "" && $status != "" && $tgl_status != "" && $hasil_test != "" && $tgl_hasil_test != "" && $petugas_id){
		// input data ke database (table data_pegawai)
		// mysqli_query($koneksi,"INSERT into data_pegawai values('','$nama','$alamat','$telepon')");
		// $berhasil++;
		$sql = "INSERT INTO pelanggan(rek_baru,rek_lama,nm_pelanggan,unit_id,alamat,kelurahan,kecamatan,kelompok_id,status,tgl_status,hasil_test,tgl_hasil_test,petugas_id,foto_rumah)
		VALUES(:rek_baru,:rek_lama,:nm_pelanggan,:unit_id,:alamat,:kelurahan,:kecamatan,:kelompok_id,:status,:tgl_status,:hasil_test,:tgl_hasil_test,:petugas_id,:foto_rumah)";
		$res = $pdo->prepare($sql);
		$res->execute([
			':rek_baru' => $rek_baru,
			':rek_lama' => $rek_lama,
			':nm_pelanggan' => $nm_pelanggan,
			':unit_id' => $unit_id,
			':alamat' => $alamat,
			':kelurahan' => $kelurahan,
			':kecamatan' => $kecamatan,
			':status' => $status,
			':tgl_status' => $tgl_status,
			':hasil_test' => $hasil_test,
			':tgl_hasil_test' => $tgl_hasil_test,
			':kelompok_id' => $kelompok_id,
			':petugas_id' => $petugas_id,
			':foto_rumah' => $foto_rumah
		]);
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['upload']['name']);

// alihkan halaman ke pelanggan.php
header("location:pelanggan.php?berhasil=$berhasil");
?>