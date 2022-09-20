<?php
// ini_set('display_errors', 1);
// error_reporting(-1);
// // kelas Koneksi DATABASE
// class database
// {
//     //properti yang dibuthkan
//     private $dbhost;
//     private $dbuser;
//     private $dbpass;
//     private $dbname;
//     //construc
//     function __construct($a, $b, $c, $d)
//     {
//         $this->dbhost = $a("localhost");
//         $this->dbuser = $b("root");
//         $this->dbpass = $c("");
//         $this->dbname = $d("kependudukan");
//     }
//     //method koneksi mysql db
//     function conn_mysql()
//     {
//         $konek_db = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
//         return  $konek_db;
//     }
// }


// class penduduk
// {
//     // Properties
//     public $nama;
//     public $nik;
//     public $alamat;
//     public $status;
//     public $pekerjaan;
//     public $tempat_lahir;
//     public $jenis;
//     public $kewarganegaraan;
//     public $goldar;

//     //Method setting propertis
//     function set_all_data($nama, $nik, $alamat, $status, $pekerjaan, $tempat_lahir, $kewarganegaraan, $jenis, $goldar)
//     {
//         $this->nama = $nama;
//         $this->nik = $nik;
//         $this->alamat = $alamat;
//         $this->status = $status;
//         $this->pekerjaan = $pekerjaan;
//         $this->tempat_lahir = $tempat_lahir;
//         $this->kewarganegaraan = $kewarganegaraan;
//         $this->jenis = $jenis;
//         $this->umur = $goldar;
//     }

//     //Method ambil data propertis
//     function get_nama()
//     {
//         return $this->nama;
//     }

//     function get_nik()
//     {
//         return $this->nik;
//     }

//     function get_alamat()
//     {
//         return $this->alamat;
//     }

//     function get_status()
//     {
//         return $this->status;
//     }

//     function get_pekerjaan()
//     {
//         return $this->pekerjaan;
//     }

//     function get_tempat_lahir()
//     {
//         return $this->tempat_lahir;
//     }

//     function get_kewarganegaraan()
//     {
//         return $this->kewarganegaraan;
//     }

//     function get_jenis()
//     {
//         return $this->jenis;
//     }

//     function get_umur()
//     {
//         return $this->goldar;
//     }
// }



$conn = mysqli_connect("localhost", "root", "", "kependudukan");

if (mysqli_connect_errno()) {
    echo "Koneksi data gagal :" . mysqli_connect_error();
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
// Tambah Penduduk
function tambahpenduduk($data)
{

    global $conn;

    $nama = $data["nama"];
    $nik = $data["nik"];
    $alamat = $data["alamat"];
    $status = $data["status"];
    $pekerjaan = $data["pekerjaan"];
    $tempat_lahir = $data["tempat_lahir"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $jenis = $data["gender"];
    $kewarganegaraan = $data["kewargarnegaraan"];
    $goldar = $data["goldar"];


    $tambahdata = "INSERT INTO data_penduduk (nama,nik,alamat,status,pekerjaan,tempat_lahir,tanggal_lahir,jenis_kelamin,kewarganegaraan,goldar) VALUES ('$nama','$nik','$alamat','$status','$pekerjaan','$tempat_lahir','$tanggal_lahir','$jenis','$kewarganegaraan','$goldar',)";
    mysqli_query($conn, $tambahdata);

    return mysqli_affected_rows($conn);
}
