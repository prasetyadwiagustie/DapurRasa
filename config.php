<?php
/*
  | Konfigurasi Koneksi ke Firebase Realtime Database
  |
  | @package   : pos-kasir-php
  | @file      : config.php (untuk mengatur koneksi php ke Firebase Realtime Database)
  | @author    : Fauzan Falah (Modifikasi oleh ChatGPT)
  | @copyright : Copyright (c) 2017-2021 Codekop.com
  |
  | Keterangan: Untuk login aplikasi dengan username: admin dan password: 123
*/

date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

// Konfigurasi Firebase
$firebase_url = "https://dapurrasa-e3251-default-rtdb.firebaseio.com/";
$firebase_secret = "PGZtrnwcAqGNJgqzEcmhUChpKwmySOJLr8SgUNDB";

// Fungsi untuk mengirim permintaan ke Firebase
function firebase_request($path, $method = 'GET', $data = null) {
    global $firebase_url, $firebase_secret;
    
    $url = $firebase_url . $path . ".json?auth=" . $firebase_secret;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    
    if ($data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
    }
    
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "cURL Error: " . curl_error($ch);
    }
    curl_close($ch);
    
    var_dump($response); // Debug response dari Firebase
    return json_decode($response, true);
}


// Contoh Penggunaan: Ambil data dari Firebase
$data = firebase_request("data", "GET");
// print_r($data); // Untuk debugging

$view = 'fungsi/view/view.php'; // Direktori fungsi select data
?>
