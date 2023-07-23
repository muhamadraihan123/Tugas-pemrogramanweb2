<!DOCTYPE html>
<html>
<head>
<title>Tambah Data </title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Tambah Data Mahasiswa</h1>
<?php
include 'koneksi.php';
?>
<br/>
<a href="tambahdata.php">Tambah Data</a>
<br/><br/>
<table border="1" cellpadding="10">
<tr>
<th>No</th>
<th>NPM</th>
<th>Nama</th>
<th>Jenis Kelamin</th>
<th>Jurusan</th>
<th>Kelas</th>
<th>Photo</th>
<th>Action</th>
</tr>
<?php
$no = 1;
$data = mysqli_query($koneksi,"select * from tb_mahasiswa");
while($d = mysqli_fetch_assoc($data)){
	
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $d['NPM']; ?></td>
<td><?php echo $d['Nama']; ?></td>
<td>
<?php
if($d['Jenis_Kelamin']=='L') echo 'Laki-laki';
elseif($d['Jenis_Kelamin']=='P') echo 'Perempuan';
?>
</td>
<td><?php echo $d['Jurusan']; ?></td>
<td><?php echo $d['Kelas']; ?></td>
<td>
<img src="<?php echo "file/".$d['Photo']; ?>" width="100"
height="130" >
</td>
<td>
<a href="edit_datamahasiswa.php?id=<?php echo $d['NPM'];?>">Edit</a> |
<a href="proses_hapus.php?id=<?php echo $d['NPM'];?>"onclick="return confrim('Anda yakin ingin menghapus data ini? \n<?php 
echo$d['NPM']; ?>')">Hapus</a>
</td>
</tr>
<?php }?>
</table>
<br/>
<?php
echo "Total data : ". mysqli_num_rows($data)." Mahasiswa";
?>
</body>
</html>