<?php
ini_set('display_errors', 1);
error_reporting(-1);
// kelas Koneksi DATABASE
class database
{
    //properti yang dibuthkan
    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;
    //construc
    function __construct($a, $b, $c, $d)
    {
        $this->dbhost = $a("localhost");
        $this->dbuser = $b("root");
        $this->dbpass = $c("");
        $this->dbname = $d("kependudukan");
    }
    //method koneksi mysql db
    function conn_mysql()
    {
        $konek_db = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        return  $konek_db;
    }
}


class penduduk
{
    // Properties
    public $nama;
    public $nik;
    public $alamat;
    public $jenis;
    public $umur;

    //Method setting propertis
    function set_all_data($nama, $nik, $alamat, $jenis, $umur)
    {
        $this->nama = $nama;
        $this->nik = $nik;
        $this->alamat = $alamat;
        $this->jenis = $jenis;
        $this->umur = $umur;
    }

    //Method ambil data propertis
    function get_nama()
    {
        return $this->nama;
    }

    function get_nik()
    {
        return $this->nik;
    }

    function get_alamat()
    {
        return $this->alamat;
    }

    function get_jenis()
    {
        return $this->jenis;
    }

    function get_umur()
    {
        return $this->umur;
    }
}
