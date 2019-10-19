CREATE TABLE `User` (
	`id_user` INT(10) NOT NULL AUTO_INCREMENT,
	`username` varchar(25) NOT NULL AUTO_INCREMENT,
	`nama_lengkap` varchar(50) NOT NULL AUTO_INCREMENT,
	`password` varchar(25) NOT NULL AUTO_INCREMENT,
	`email` varchar(100) NOT NULL AUTO_INCREMENT,
	`level` varchar(25) AUTO_INCREMENT,
	PRIMARY KEY (`id_user`)
);

CREATE TABLE `Documents` (
	`id_doc` INT(10) NOT NULL AUTO_INCREMENT,
	`nama_pemilik` varchar(50) NOT NULL,
	`alamat` TEXT NOT NULL,
	`keterangan` TEXT NOT NULL,
	`no_polis` varchar(10) NOT NULL,
	`no_rangka` varchar(10) NOT NULL,
	`no_mesin` varchar(10) NOT NULL,
	`create_at` TIMESTAMP NOT NULL,
	`id_tax` INT(10) NOT NULL,
	`id_kendaraan` INT(10) NOT NULL,
	`creater` varchar(25) NOT NULL,
	PRIMARY KEY (`id_doc`)
);

CREATE TABLE `Tax` (
	`id_tax` INT(10) NOT NULL AUTO_INCREMENT,
	`tagihan` INT(20) NOT NULL,
	`tgl_pajak` DATETIME NOT NULL AUTO_INCREMENT,
	`tgl_stnk` DATETIME NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id_tax`)
);

CREATE TABLE `Kendaraan` (
	`id_kendaraan` INT(10) NOT NULL AUTO_INCREMENT,
	`jenis_kendaraan` varchar(25) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id_kendaraan`)
);

ALTER TABLE `Documents` ADD CONSTRAINT `Documents_fk0` FOREIGN KEY (`id_tax`) REFERENCES `Tax`(`id_tax`);

ALTER TABLE `Documents` ADD CONSTRAINT `Documents_fk1` FOREIGN KEY (`id_kendaraan`) REFERENCES `Kendaraan`(`id_kendaraan`);

ALTER TABLE `Documents` ADD CONSTRAINT `Documents_fk2` FOREIGN KEY (`creater`) REFERENCES `User`(`id_user`);

