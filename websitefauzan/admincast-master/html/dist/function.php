<?php
session_start();

//koneksi ke database
$conn = mysqli_connect("localhost","root","","percetakan");

//tambah pemesanan
if(isset($_POST['addnewpemesanan'])){
    $namacustomer = $_POST['namacustomer'];
    $noinvoice = generateInvoiceNumber($conn);      
    $status = $_POST['status'];
    $namabarang = $_POST['namabarang'];
    $stok = $_POST['stok'];

    //validasi no invoice sudah terdaftar atau belum
    // $cek = mysqli_query($conn, "select * from pemesanan where noinvoice='$noinvoice'");
    // $itung = mysqli_num_rows($cek);

    //jika belum ada

        $addtotable = mysqli_query($conn,"insert into pemesanan (namacustomer, noinvoice, status, namabarang, stok) values('$namacustomer','$noinvoice','$status','$namabarang','$stok')");
        if($addtotable){
            header('location:pemesanan.php');
        } else {
            echo 'Gagal';
            header('location:pemesanan.php');
        }
};

//edit pemesanan
if(isset($_POST['updatepemesanan'])){
    $idp = $_POST['idp'];
    $namacustomer = $_POST['namacustomer'];
    $noinvoice = $_POST['noinvoice'];
    $status = $_POST['status'];
    $namabarang = $_POST['namabarang'];
    $stok = $_POST['stok'];

    $update = mysqli_query($conn,"update pemesanan set namacustomer='$namacustomer', noinvoice='$noinvoice', status='$status', namabarang='$namabarang', stok='$stok' where idpemesanan='$idp'");
    if($update){
        header('location:pemesanan.php');
    } else {
        echo 'Gagal';
        header('location:pemesanan.php');
    }
};

//Hapus Pemesanan
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $hapus = mysqli_query($conn, "delete from pemesanan where idpemesanan='$id'");
    if($hapus){
        header('location:pemesanan.php');
    } else {
        echo 'Gagal';
        header('location:pemesanan.php');
    }
};

//tambah harga bahan
if(isset($_POST['addnewhargabahan'])){
    $namabahan = $_POST['namabahan'];
    $harga = $_POST['harga'];  
    $supplier = $_POST['supplier'];
    $keterangan = $_POST['keterangan'];

    $addtotable = mysqli_query($conn,"insert into hargabahan (namabahan, harga, supplier, keterangan) values('$namabahan','$harga','$supplier','$keterangan')");
    if($addtotable){
        header('location:harga-bahan.php');
    } else {
        echo 'Gagal';
        header('location:harga-bahan.php');
    }
};

// edit harga bahan
if(isset($_POST['updatehargabahan'])){
    $idh = $_POST['idh'];
    $namabahan = $_POST['namabahan'];
    $harga = $_POST['harga'];
    $supplier = $_POST['supplier'];
    $keterangan = $_POST['keterangan'];

    $updatehargabahan = mysqli_query($conn,"update hargabahan set namabahan='$namabahan', harga='$harga', supplier='$supplier', keterangan='$keterangan' where idhargabahan='$idh'");
    if($updatehargabahan){
        header('location:harga-bahan.php');
    } else {
        echo 'Gagal';
        header('location:harga-bahan.php');
    }
};

//Hapus Harga Bahan
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $hapushargabahan = mysqli_query($conn, "delete from hargabahan where idhargabahan='$id'");
    if($hapushargabahan){
        header('location:harga-bahan.php');
    } else {
        echo 'Gagal';
        header('location:harga-bahan.php');
    }
};

//import data excel
// require 'vendor/autoload.php'; // pastikan Anda menginstal PhpSpreadsheet via Composer

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if (isset($_POST['importdata'])) {
    if (isset($_FILES['fileexcel']) && $_FILES['fileexcel']['error'] == 0) {
        $fileName = $_FILES['fileexcel']['tmp_name'];

        try {
            // Load the Excel file
            $spreadsheet = IOFactory::load($fileName);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            // Skip the header row if present
            array_shift($rows);

            // Prepare SQL statement for batch insertion
            $stmt = $conn->prepare("INSERT INTO hargabahan (namabahan, harga, supplier, keterangan) VALUES ('$namabahan','$harga','$supplier','$keterangan')");

            foreach ($rows as $row) {
                // Bind values and execute
                $stmt->bind_param("siss", $row[0], $row[1], $row[2], $row[3]);
                $stmt->execute();
            }

            $stmt->close();
            echo "<script>alert('Data Excel Berhasil Di Import'); window.location.href='harga-bahan.php';</script>";
        } catch (Exception $e) {
            echo "Error loading file: " . $e->getMessage();
        }
    } else {
        echo "No file uploaded or upload error.";
    }
};

//tambah stok bahan
if(isset($_POST['addnewstokbahan'])){
    $namabahan = $_POST['namabahan'];
    $jumlahstok = $_POST['jumlahstok'];

    $addtotable = mysqli_query($conn,"insert into stokbahan (namabahan, jumlahstok) values('$namabahan','$jumlahstok')");
    if($addtotable){
        header('location:stok.php');
    } else {
        echo 'Gagal';
        header('location:stok.php');
    }
};

// edit harga bahan
if(isset($_POST['updatestokbahan'])){
    $ids = $_POST['ids'];
    $namabahan = $_POST['namabahan'];
    $jumlahstok = $_POST['jumlahstok'];

    $updatestokbahan = mysqli_query($conn,"update stokbahan set namabahan='$namabahan', jumlahstok='$jumlahstok' where idstokbahan='$ids'");
    if($updatestokbahan){
        header('location:stok.php');
    } else {
        echo 'Gagal';
        header('location:stok.php');
    }
};

//Hapus Harga Bahan
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $hapusstokbahan = mysqli_query($conn, "delete from stokbahan where idstokbahan='$id'");
    if($hapushargabahan){
        header('location:stok.php');
    } else {
        echo 'Gagal';
        header('location:stok.php');
    }
};

//tambah data karyawan
if(isset($_POST['addnewdatakaryawan'])){
    $namakaryawan = $_POST['namakaryawan'];
    $username = $_POST['username'];  
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];
    $status = $_POST['status'];
    $avatar = $_POST['avatar'];

    //avatar
    $allowed_extension = array('png','jpg', 'jpeg');
    $nama = $_FILES['avatar']['name'];
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    //file -> enkripsi
    $image = md5(uniqid($nama,true)).'.'.$ekstensi; //menggabungkan nama file enkripsi dengan ekstensinya

    //proses upload gambar
    if(in_array($ekstensi, $allowed_extension) === true){
        //validasi ukuran file
        if($ukuran <= 2000000){ //dibawah ukuran 2MB
            move_uploaded_file($file_tmp, 'imgbaru/'.$image);

            $addtotable = mysqli_query($conn,"insert into datakaryawan (namakaryawan, username, password, jabatan, status, avatar) values('$namakaryawan','$username','$password','$jabatan','$status','$image')");
            if($addtotable){
                header('location:data-karyawan.php');
            } else {
                echo 'Gagal';
                header('location:data-karyawan.php');
            }
        } else {
            //file lebih dari 2mb
            echo '<script>
                alert("Ukuran file tidak boleh melebihi dari 2MB");
                window.location.href="add-data-karyawan.php";
                </script>';
        }
    } else {
        //ketika file yang dipilih bukan file jpg/png
        echo '<script>
                alert("File yang di upload harus jpg/png");
                window.location.href="add-data-karyawan.php";
              </script>';
    }
};

//Edit Data Karyawan
if(isset($_POST['updatedatakaryawan'])){
    $idk = $_POST['idk'];
    $namakaryawan = $_POST['namakaryawan'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];

    $updatedatakaryawan = mysqli_query($conn,"update datakaryawan set namakaryawan='$namakaryawan', username='$username', password='$password', jabatan='$jabatan' where idkaryawan='$idk'");
    if($updatedatakaryawan){
        header('location:data-karyawan.php');
    } else {
        echo 'Gagal';
        header('location:data-karyawan.php');
    }
};

//Hapus Data Karyawan
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $avatar = mysqli_query($conn, "select * from datakaryawan where idkaryawan='$id'");
    $get = mysqli_fetch_array($avatar);
    $img = 'imgbaru/'.$get['avatar'];
    unlink($img);
    
    $hapusdatakaryawan = mysqli_query($conn, "delete from datakaryawan where idkaryawan='$id'");
    if($hapusdatakaryawan){
        header('location:data-karyawan.php');
    } else {
        echo 'Gagal';
        header('location:data-karyawan.php');
    }
};

?>