<?php
include 'connection.php';

$sql = "SELECT nama, lokasi, latitude, longitude, tanggal, waktu, deskripsi 
        FROM reports
        WHERE latitude IS NOT NULL AND longitude IS NOT NULL";

$result = mysqli_query($conn, $sql);

$locations = array();
while ($row = mysqli_fetch_assoc($result)) {
    $locations[] = array(
        'nama' => $row['nama'],
        'lokasi' => $row['lokasi'],
        'latitude' => floatval($row['latitude']),
        'longitude' => floatval($row['longitude']),
        'tanggal' => $row['tanggal'],
        'waktu' => $row['waktu'],
        'deskripsi' => $row['deskripsi']
    );
}

header('Content-Type: application/json');
echo json_encode($locations);
?>
