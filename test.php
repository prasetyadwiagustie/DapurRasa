<?php
// URL Firebase Database
$firebase_url = "https://dapurrasa-e3251-default-rtdb.firebaseio.com/.json";

// Inisialisasi cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $firebase_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Nonaktifkan verifikasi SSL sementara
$response = curl_exec($ch);

// Cek error cURL
if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
} else {
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo "HTTP Code: " . $http_code . "<br>";
    echo "Response: " . $response;
}

// Tutup koneksi cURL
curl_close($ch);
?>
