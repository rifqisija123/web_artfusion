<?php
header('Content-Type: application/json');

// Koneksi ke database
require 'function.php'; // Pastikan file ini berisi koneksi ke database

// Ambil semua data karyawan dari database
$query = "SELECT idkaryawan, namakaryawan, username, password, jabatan, status, avatar FROM datakaryawan";
$result = mysqli_query($conn, $query);

$karyawan = array();

while($row = mysqli_fetch_assoc($result)) {
    // Jika ada avatar, tambahkan URL lengkapnya, jika tidak gunakan default avatar
    if($row['avatar'] != null && file_exists("imgbaru/".$row['avatar'])){
        $row['avatar_url'] = 'http://localhost:70/webpercetakan/websitefauzan/admincast-master/html/dist/imgbaru/' . $row['avatar']; // Ganti 'yourprojectfolder' dengan nama folder project Anda di localhost
    } else {
        $row['avatar_url'] = 'http://localhost:70/webpercetakan/websitefauzan/admincast-master/html/dist/imgbaru/default-avatar.png';
    }

    // Tambahkan data karyawan ke array
    $karyawan[] = $row;
}

// Kembalikan data dalam format JSON
echo json_encode($karyawan);
?>
