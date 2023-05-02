<?php
class database
{
	public $host = "localhost";
	public $username = "root";
	public $pass = "";
	public $db = "user_db";
	public $connect;




	function __construct()
	{
		$this->connect = mysqli_connect($this->host, $this->username, $this->pass);
		mysqli_select_db($this->connect, $this->db);
	}

    function tampil_data()
	{
		$data = mysqli_query($this->connect, "select * from pengrajin order by id desc");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		
		return $rows;
	}
	function input($nama_product, $gambar, $deskripsi, $username)
	{
		
		$gambar = $_FILES['gambar']['name'];
		mysqli_query($this->connect, "insert into pengrajin values(NULL,'$nama_product', '$gambar', '$deskripsi', '$username')");
	}

	function detail_data($id)
	{
		$data = mysqli_query($this->connect, "select * from pengrajin where id='$id'");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		return $rows;
	}


	function update($id, $nama_product, $deskripsi)
	{
		mysqli_query($this->connect, "update pengrajin set nama_product='$nama_product', deskripsi='$deskripsi' where id='$id'");
	}

	function hapus($id)
	{
		mysqli_query($this->connect, "delete from pengrajin where id='$id'");
	}
	function produk_data($user)
	{
		$data = mysqli_query($this->connect, "select * from pengrajin where username='$user' order by id desc");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		
		return $rows;
	}
	

	
}
?>
