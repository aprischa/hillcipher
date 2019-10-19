CREATE DATABASE mahasiswa;
use mahasiswa;

CREATE TABLE `data_mahasiswa` (
    `id` int(250) NOT NULL PRIMARY KEY,
    `nama_mhs` varchar(50) NOT NULL,
    `npm` char(12) NOT NULL,
    `jurusan` varchar(50) NOT NULL
);

INSERT INTO `data_mahasiswa` (`id`,`nama_mhs`,`npm`,`jurusan`) VALUES
(1, 'Rahma', '140810180080', 'Teknik Informatika'),
(2, 'Batari', '140810180081', 'Teknik Informatika'),
(3, 'RBatari', '140810180082', 'Teknik Informatika'),
(4, 'RahmaB', '140810180083', 'Teknik Informatika'),
(5, 'Rahma Batari', '140810180084', 'Teknik Informatika');
