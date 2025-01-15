<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Koneksi ke database
$server = "localhost";
$user = "root";
$password = "";
$database = "inventaris";

$koneksi = mysqli_connect($server, $user, $password, $database);

if (!$koneksi) {
    http_response_code(500);
    echo json_encode(["message" => "Gagal terhubung ke database."]);
    exit();
}

// Mendapatkan metode HTTP
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        if (isset($_GET['id'])) {
            // Fetch data untuk edit
            $id = $_GET['id'];
            $query = "SELECT * FROM tbarang WHERE id_barang = $id";
            $result = mysqli_query($koneksi, $query);
            $data = mysqli_fetch_assoc($result);
            echo json_encode($data);
        } else {
            // Fetch semua data
            $query = "SELECT * FROM tbarang ORDER BY id_barang DESC";
            $result = mysqli_query($koneksi, $query);
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            echo json_encode($data);
        }
        break;

    case "POST":
        $input = json_decode(file_get_contents("php://input"), true);
        $kode = $input['kode'];
        $nama = $input['nama'];
        $asal = $input['asal'];
        $jumlah = $input['jumlah'];
        $satuan = $input['satuan'];
        $tanggal_diterima = $input['tanggal_diterima'];

        $query = "INSERT INTO tbarang (kode, nama, asal, jumlah, satuan, tanggal_diterima) 
                  VALUES ('$kode', '$nama', '$asal', $jumlah, '$satuan', '$tanggal_diterima')";
        if (mysqli_query($koneksi, $query)) {
            echo json_encode(["message" => "Data berhasil disimpan."]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Gagal menyimpan data."]);
        }
        break;

    case "PUT":
        $input = json_decode(file_get_contents("php://input"), true);
        $id_barang = $input['id_barang'];
        $kode = $input['kode'];
        $nama = $input['nama'];
        $asal = $input['asal'];
        $jumlah = $input['jumlah'];
        $satuan = $input['satuan'];
        $tanggal_diterima = $input['tanggal_diterima'];

        $query = "UPDATE tbarang SET kode = '$kode', nama = '$nama', asal = '$asal', 
                  jumlah = $jumlah, satuan = '$satuan', tanggal_diterima = '$tanggal_diterima' 
                  WHERE id_barang = $id_barang";

        if (mysqli_query($koneksi, $query)) {
            echo json_encode(["message" => "Data berhasil diperbarui."]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Gagal memperbarui data."]);
        }
        break;

    case "DELETE":
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input['id'];

        $query = "DELETE FROM tbarang WHERE id_barang = $id";
        if (mysqli_query($koneksi, $query)) {
            echo json_encode(["message" => "Data berhasil dihapus."]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Gagal menghapus data."]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Metode tidak diizinkan."]);
        break;
}
?>
