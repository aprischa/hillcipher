<html>
	<head>
		<title>Ubah Database Skateboard Padjadjaran</title>
		<style type="text/css">
h1{ 
	padding:5px;
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
  font-family: "Comic Sans MS", cursive, sans-serif;
}
table{
	padding:30px;
	border-radius:25px;
	background-color:#fcf4d0;
}
input{
	font-size:15px;
	padding:10px;
	border-radius:10px;
	border-style:none;
	margin-left:30px;
}
textarea{
	font-size:15px;
	padding:10px;
	border-radius:10px;
	border-style:none;
	margin-left:30px;
}
.box {
	margin-top:-7.9px;
	padding:20px;
	background:#d2633c;
	margin-left:-7.9px;
	margin-right:-7.9px;
}
		</style>
	</head>
	<body>
	<div class="box">
	<img style="width:17%" src=<?php echo base_url('assets/src/logo.png');?> />
	<p style="float:right; color:#d2633c">kkk</p>
</div>
		<center>
		<h1>Form Ubah Data Anggota</h1>
		<div style="color: red;"><?php echo validation_errors(); ?></div>

		<?php echo form_open("siswa/ubah/".$siswa->nis); ?>
			<table cellpadding="8">
				<tr>
					<td>NPM</td>
					<td><input type="text" name="input_nis" value="<?php echo set_value('input_nis', $siswa->nis); ?>" readonly></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><input type="text" name="input_nama" value="<?php echo set_value('input_nama', $siswa->nama); ?>"></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>
					<input type="radio" name="input_jeniskelamin" value="Laki-laki" <?php echo set_radio('jeniskelamin', 'Laki-laki', ($siswa->jenis_kelamin == "Laki-laki")? true : false); ?>> Laki-laki
					<input type="radio" name="input_jeniskelamin" value="Perempuan" <?php echo set_radio('jeniskelamin', 'Perempuan', ($siswa->jenis_kelamin == "Perempuan")? true : false); ?>> Perempuan
					</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td><input type="text" name="input_telp" value="<?php echo set_value('input_telp', $siswa->telp); ?>"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><textarea name="input_alamat"><?php echo set_value('input_alamat', $siswa->alamat); ?></textarea></td>
				</tr>
			</table>
				</br>
				</br>
			<input type="submit" name="submit" value="Ubah">
			<a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
		<?php echo form_close(); ?>
		</center>
	</body>
</html>
