<html>
	<head>
		<title>Database Anggota Skateboard Padjadjaran</title>
		<style type="text/css">

*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
h1{ 
	color:#2f290b;
	margin-top:70px;
	padding-bottom:30px;
	font-size:40px;
-webkit-text-stroke: 2px black;
  -webkit-text-fill-color: white;
  -webkit-animation: fill 0.5s infinite alternate;
}

@-webkit-keyframes fill {
  from { -webkit-text-fill-color: white; }
  to { -webkit-text-fill-color: #e48f71; }
} 
body {
	background: url(<?php echo base_url('assets/src/bg.jpg');?>);
	background-color:#f9ea94;
  font-family: "Comic Sans MS", cursive, sans-serif;
}
table {
  background: #f5ecb7;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;
}
th {
  border-bottom: 1px solid #364043;
  color: #3f2a09;
  font-size: 1.2em;
  font-weight: 600;
  padding: 0.5em 1em;
  text-align: left;
}
td {
  color: #645a24;
  font-weight: 400;
  padding: 0.65em 1em;
}
.disabled td {
  color: #4F5F64;
}
tbody tr {
  transition: background 0.25s ease;
}
tbody tr:hover {
  background: #b9a847;
}
a{
	border-radius:30px;
	padding: 5px 10px;
	background-color:#efc500;
}
.box {
	padding:20px;
	background:#d2633c;
}
		</style>
	</head>
	<body>
		<div class="box">
	<img style="width:17%" src=<?php echo base_url('assets/src/logo.png');?> />
	<p style="float:right; color:#d2633c">k</p>
</div>
		<center><h1>Anggota Skateboard Padjadjaran Periode 2018/2019</h1>
		<a style='margin-left:700px;' href='<?php echo base_url("siswa/tambah"); ?>'>Tambah Anggota</a><br><br>
		</center>
		<center>
		<table border="1" cellpadding="7">
			<tr>
				<th>NPM</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Telepon</th>
				<th>Alamat</th>
				<th colspan="2">Aksi</th>
			</tr>

			<?php
			if( ! empty($siswa)){
				foreach($siswa as $data){
					echo "<tbody><tr>
					<td>".$data->nis."</td>
					<td>".$data->nama."</td>
					<td>".$data->jenis_kelamin."</td>
					<td>".$data->telp."</td>
					<td>".$data->alamat."</td>
					<td><a href='".base_url("siswa/ubah/".$data->nis)."'>Ubah</a></td>
					<td><a href='".base_url("siswa/hapus/".$data->nis)."'>Hapus</a></td>
					</tr></tbody>";
				}
			}else{
				echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
			}
			?>
		</table>
		</center>
	</body>
</html>
