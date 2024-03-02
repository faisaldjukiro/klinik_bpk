-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2024 at 04:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical-record`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `kd_obat` varchar(255) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `id_satuan` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`kd_obat`, `nama_obat`, `id_satuan`, `stok`) VALUES
('OBT00001', 'DEMACOLIN', '21', '0'),
('OBT00002', 'FLUCADEX', '21', '0'),
('OBT00003', 'HANDSANITIZER', '21', '0'),
('OBT00004', 'METHYLPREDNISOLONE (RHEMAFAR) 4mg', '21', '0'),
('OBT00005', 'MYLANTA SYRUP 50mL', '8', '0'),
('OBT00006', 'NEURALGIN', '21', '0'),
('OBT00007', 'RANITIDIN 150mg', '21', '0'),
('OBT00008', 'STIK GLUCOSA (NESCO)', '19', '0'),
('OBT00009', 'TRIOCID', '21', '0'),
('OBT00010', 'FRESHCARE 10mL - LAVENDER', '15', '0'),
('OBT00011', 'TREMENZA', '21', '0'),
('OBT00012', 'BETADINE KUMUR 100ml', '8', '0'),
('OBT00013', 'CENDO CENFRESH', '9', '0'),
('OBT00014', 'CEFADROXIL 500mg', '12', '0'),
('OBT00015', 'VITACIMIN FRUIT PUCH', '8', '0'),
('OBT00016', 'FRESCOOL', '9', '0'),
('OBT00017', 'ACYCLOVIR 5%', '22', '0'),
('OBT00018', 'SAFETY BOX', '9', '0'),
('OBT00019', 'ALOFAR', '21', '0'),
('OBT00020', 'HUFAXOL', '21', '0'),
('OBT00021', 'SAFE CARE AROMA THERAPY', '9', '0'),
('OBT00022', 'ACYCLOVIR (ACYFAR) 400mg', '21', '0'),
('OBT00023', 'PLESTER', '16', '0'),
('OBT00024', 'KETOKONAZOLE 200mg', '21', '0'),
('OBT00025', 'KASA HIDROPHILE', '13', '0'),
('OBT00026', 'MASKER N95', '9', '0'),
('OBT00027', 'NaCl', '8', '0'),
('OBT00028', 'BLOOD LANCET', '9', '0'),
('OBT00029', 'STIK CHOLESTEROL (AUTOCHECK)', '19', '0'),
('OBT00030', 'STIK GLUCOSA (AUTOCHECK)', '19', '0'),
('OBT00031', 'STIK URIC ACID (AUTOCHECK)', '20', '0'),
('OBT00032', 'NEUROBION FORTE', '21', '0'),
('OBT00033', 'SALONPAS JET SPRAY', '8', '0'),
('OBT00034', 'ANTASIDA SYRUP 6mL', '8', '0'),
('OBT00035', 'RHINOS', '21', '0'),
('OBT00036', 'FG TROCHES (GRAMICIDIN-NEOMICIN)', '21', '0'),
('OBT00037', 'WINGS NEEDLE', '9', '0'),
('OBT00038', 'AMLODIPIN 5mg', '21', '0'),
('OBT00039', 'BECOM-ZET', '21', '0'),
('OBT00040', 'CAVIPLEX', '21', '0'),
('OBT00041', 'NEEDLE 25G', '21', '0'),
('OBT00042', 'SAMCOFENAC', '21', '0'),
('OBT00043', 'ENERVON-C', '8', '0'),
('OBT00044', 'SCOPMA 10mg', '11', '0'),
('OBT00045', 'ESTER-C', '21', '0'),
('OBT00046', 'SANADRYL EXPECTORANT SYRUP 60mL', '8', '0'),
('OBT00047', 'PARACETAMOL SYRUP 60mL', '8', '0'),
('OBT00048', 'SANADRYL DMP 60 ml', '8', '0'),
('OBT00049', 'RANITIDIN (OGBdexa)', '21', '0'),
('OBT00050', 'HYPAFIX 5x5', '16', '0'),
('OBT00051', 'PLASTIK BESAR', '9', '0'),
('OBT00052', 'DISPO - SPOIT 5cc', '9', '0'),
('OBT00053', 'BROMHEXIN', '22', '0'),
('OBT00054', 'CDR', '8', '0'),
('OBT00055', 'STIK GLUKOSA (GEA)', '19', '0'),
('OBT00056', 'SANMOL SYRUP', '8', '0'),
('OBT00057', 'ANAK KONIDIN OBH', '8', '0'),
('OBT00058', 'INJ VIT B-COMP', '6', '0'),
('OBT00059', 'BETAMETHASONE 0.1%', '22', '0'),
('OBT00060', 'OBH COMBI', '6', '0'),
('OBT00061', 'ORPHEN', '21', '0'),
('OBT00062', 'GRATAZON', '21', '0'),
('OBT00063', 'OMEPRAZOLE 20mg', '12', '0'),
('OBT00064', 'INJ KETOROLAC', '6', '0'),
('OBT00065', 'CORTIDEX', '22', '0'),
('OBT00066', 'GUAIFENESIN/GG 100mg', '21', '0'),
('OBT00067', 'DISPO - SPOIT 3 cc', '9', '0'),
('OBT00068', 'PLESTER ROL', '9', '0'),
('OBT00069', 'FORMUNO', '21', '0'),
('OBT00070', 'ARKAVIT', '21', '0'),
('OBT00071', 'INJ SIDIADRYL', '10', '0'),
('OBT00072', 'BABY\'S COUGH SYRUP', '8', '0'),
('OBT00073', 'NUTRIMAX D3 400IU', '21', '0'),
('OBT00074', 'INJ OMEPRAZOLE', '6', '0'),
('OBT00075', 'INJ DEXAMETASONE', '6', '0'),
('OBT00076', 'ANTASIDA ERELA', '21', '0'),
('OBT00077', 'TABUNG OXYCAN', '15', '0'),
('OBT00078', 'ASPILET', '21', '0'),
('OBT00079', 'VICKS INHALER', '9', '0'),
('OBT00080', 'MINYAK KAYU PUTIH 30ml', '8', '0'),
('OBT00081', 'DEXAMETHASONE', '21', '0'),
('OBT00082', 'TRIAFMOL', '15', '0'),
('OBT00083', 'XONCE', '21', '0'),
('OBT00084', 'DEMINHIDRINATE - ANTIMO DEWASA', '21', '0'),
('OBT00085', 'DOMPERIDONE (HUFADON) 10mg', '11', '0'),
('OBT00086', 'COUNTERPAIN COOL 15gr', '22', '0'),
('OBT00087', 'ALORIS', '21', '0'),
('OBT00088', 'ANASTAN', '21', '0'),
('OBT00089', 'HANSAPLAST PLESTER (UK. STANDAR)', '20', '0'),
('OBT00090', 'TOLAK ANGIN', '15', '0'),
('OBT00091', 'SILADEX SYRUP', '8', '0'),
('OBT00092', 'ARKAVIT-C', '21', '0'),
('OBT00093', 'BEJO JAHE MERAH', '21', '0'),
('OBT00094', 'CIPROFLOXACIN (ETAFLOX) 500mg', '11', '0'),
('OBT00095', 'ASAM MEFENAMAT (FARGETIX) 500mg', '11', '0'),
('OBT00096', 'INJ FARBION 5000', '6', '0'),
('OBT00097', 'RECO 0,5mL', '8', '0'),
('OBT00098', 'ABOCATH 20G', '15', '0'),
('OBT00099', 'INJ NEUROSANBE', '6', '0'),
('OBT00100', 'SIMVASTATIN 20mg', '21', '0'),
('OBT00101', 'OSTEOR', '21', '0'),
('OBT00102', 'PLOSSA ROLL- EUCALYPTUS', '15', '0'),
('OBT00103', 'ASAM MEFENAMAT (MEFINAL) 500mg', '11', '0'),
('OBT00104', 'IFARSYL', '11', '0'),
('OBT00105', 'HELIXIM', '12', '0'),
('OBT00106', 'DISPO - SPOIT 10 cc', '15', '0'),
('OBT00107', 'POLYSILANE', '8', '0'),
('OBT00108', 'METHYLPREDNISOLONE (RHEMAFAR) 8mg', '21', '0'),
('OBT00109', 'OSELTAMIVIR', '8', '0'),
('OBT00110', 'INJ RANITIDIN', '6', '0'),
('OBT00111', 'AMBROXOL HCL 30mg', '21', '0'),
('OBT00112', 'AMLODIPINE 10mg', '21', '0'),
('OBT00113', 'AMLODIPINE 5mg', '21', '0'),
('OBT00114', 'ALLOPURINOL 100mg', '21', '0'),
('OBT00115', 'ALLOPURINOL 300mg', '21', '0'),
('OBT00116', 'AMOXICILLIN 500mg', '21', '0'),
('OBT00117', 'ASAM MEFENAMAT 500mg', '21', '0'),
('OBT00118', 'BECOM-C', '21', '0'),
('OBT00119', 'BETAHISTINE (HISTIGO) 6mg', '11', '0'),
('OBT00120', 'BOOST D 1000IU', '21', '0'),
('OBT00121', 'CAPTOPRIL 25mg', '21', '0'),
('OBT00122', 'CEFIXIME 100mg', '12', '0'),
('OBT00123', 'CIPROFLOXACIN 500mg', '11', '0'),
('OBT00124', 'DOMPERIDONE 10mg', '21', '0'),
('OBT00125', 'CETIRIZINE 10MG', '21', '0'),
('OBT00126', 'IBUPROFEN 200mg', '21', '0'),
('OBT00127', 'IBUPROFEN (FARSIFEN) 400mg', '11', '0'),
('OBT00128', 'ISOSORBIDE DINITRATE/ISDN 5mg', '21', '0'),
('OBT00129', 'LANSOPRAZOLE 30mg', '12', '0'),
('OBT00130', 'GLIMEPIRIDE 2MG', '21', '0'),
('OBT00131', 'GLIMEPIRIDE 4MG', '21', '0'),
('OBT00132', 'METFORMIN 500MG', '21', '0'),
('OBT00133', 'METHYLPREDNISOLONE 16mg', '21', '0'),
('OBT00134', 'NATRIUM DICLOFENAK (ZELONA) 50mg', '21', '0'),
('OBT00135', 'OMEGA 3 - SEA QUILL', '8', '0'),
('OBT00136', 'PARACETAMOL 500mg', '11', '0'),
('OBT00137', 'PARACETAMOL (FASIDOL) 500mg', '11', '0'),
('OBT00138', 'PARACETAMOL (HUFAGESIC) 500mg', '11', '0'),
('OBT00139', 'REBONE', '21', '0'),
('OBT00140', 'REBONE FORTE', '21', '0'),
('OBT00141', 'SIMVASTATIN 10mg', '21', '0'),
('OBT00142', 'VIPALBUMIN', '21', '0'),
('OBT00143', 'VITAMIN B COMPLEX TAB', '21', '0'),
('OBT00144', 'ZINK 20mg', '21', '0'),
('OBT00145', 'DEGIROL 0.25mg', '21', '0'),
('OBT00146', 'EPERISONE HCL 50mg', '21', '0'),
('OBT00147', 'AMBROXOL SYRUP 60mL', '8', '0'),
('OBT00148', 'IMBOOST KIDS SYRUP 60mL', '8', '0'),
('OBT00149', 'VICKS FORMULA 44 SYRUP 27mL', '8', '0'),
('OBT00150', 'VICKS FORMULA 44 SYRUP 54mL', '8', '0'),
('OBT00151', 'VICKS FORMULA 44 SYRUP 100mL', '8', '0'),
('OBT00152', 'VICKS FORMULA 44 KIDS SYRUP 27mL', '8', '0'),
('OBT00153', 'VICKS FORMULA 44 kids - 54ml', '8', '0'),
('OBT00154', 'ALOCLAIR PLUS GEL', '22', '0'),
('OBT00155', 'GENTAMYCIN 0.1% - SALEP KULIT', '22', '0'),
('OBT00156', 'GENTAMYCIN 0.1% - SALEP MATA', '22', '0'),
('OBT00157', 'KETOKONAZOLE 2%', '22', '0'),
('OBT00158', 'KENALOG cream', '22', '0'),
('OBT00159', 'OSTEOR C - cream', '22', '0'),
('OBT00160', 'VOLTAREN GEL 5gr', '22', '0'),
('OBT00161', 'VOLTAREN GEL 10gr', '22', '0'),
('OBT00162', 'VOLTAREN GEL 20gr', '22', '0'),
('OBT00163', 'VOLTAREN GEL 50gr', '22', '0'),
('OBT00164', 'VASELINE PETROLEUM JELLY - ORIGINAL100mL', '15', '0'),
('OBT00165', 'VASELINE PETROLEUM JELLY - ORIGINAL 50mL', '15', '0'),
('OBT00166', 'VASELINE PETROLEUM JELLY - ALOEVERA 50mL', '15', '0'),
('OBT00167', 'VASELINE PETROLEUM JELLY - BABY 50mL', '15', '0'),
('OBT00168', 'BETADINE KUMUR 190mL', '8', '0'),
('OBT00169', 'FRESHCARE 10mL - STRONG', '15', '0'),
('OBT00170', 'FRESHCARE 10mL - CYTRUS', '15', '0'),
('OBT00171', 'FRESHCARE 10mL - SANDALWOOD', '15', '0'),
('OBT00172', 'FRESHCARE 10ml- sport', '9', '0'),
('OBT00173', 'FRESHCARE 10ml- greentea', '9', '0'),
('OBT00174', 'FRESHCARE 10ml- splash fruity', '9', '0'),
('OBT00175', 'PLOSSA ROLL- BLUE MOUNTAIN', '15', '0'),
('OBT00176', 'PLOSSA ROLL- RED HOT', '15', '0'),
('OBT00177', 'PLOSSA ROLL- CYTRUS', '15', '0'),
('OBT00178', 'MINYAK KAYU PUTIH 60ml', '8', '0'),
('OBT00179', 'MINYAK KAYU PUTIH 120ml', '8', '0'),
('OBT00180', 'MINYAK KAYU PUTIH 210ml', '8', '0'),
('OBT00181', 'HANSAPLAST PLESTER (UK. JUMBO)', '20', '0'),
('OBT00182', 'BETADINE ANTISEPTIC 5ml', '8', '0'),
('OBT00183', 'BETADINE ANTISEPTIC 15ml', '8', '0'),
('OBT00184', 'BETADINE ANTISEPTIC 30ml', '8', '0'),
('OBT00185', 'BETADINE ANTISEPTIC 60ml', '8', '0'),
('OBT00186', 'ALCOHOL SWAB', '15', '0'),
('OBT00187', 'NASAL CANULE', '15', '0'),
('OBT00188', 'WING NEEDLE 23G', '9', '0'),
('OBT00189', 'WING NEEDLE 25G', '9', '0'),
('OBT00190', 'WING NEEDLE 27G', '9', '0'),
('OBT00191', 'SARUNG TANGAN KARET - handscoen', '13', '0'),
('OBT00192', 'LOPERAMIDE HCL (LODIA) 2mg', '21', '0'),
('OBT00193', 'NATRIUM DICLOFENAK (GRATEOS) 50mg', '21', '0'),
('OBT00194', 'CENDO LYTEERS 15mL', '8', '0'),
('OBT00195', 'ALFAMIT QUATRO FORMULA (VITAMIN)', '21', '0'),
('OBT00196', 'AMBROXOL (EPEXOL) 30mg', '21', '0'),
('OBT00197', 'AMBROXOL (EPEXOL) SYRUP 120mL', '8', '0'),
('OBT00198', 'AMBROXOL (EPEXOL) SYRUP 60mL', '8', '0'),
('OBT00199', 'AMBROXOL (EPEXOL) SYRUP 20mL', '8', '0'),
('OBT00200', 'CEFADROXIL (LOSTACEF) SYRUP 60mL', '8', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat_keluar`
--

CREATE TABLE `tb_obat_keluar` (
  `id_obat_keluar` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kd_obat` varchar(255) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `aturan_pakai` varchar(255) NOT NULL,
  `kd_peg` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `booking` int(11) NOT NULL,
  `riwayat_stok` varchar(255) NOT NULL,
  `trs_obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat_masuk`
--

CREATE TABLE `tb_obat_masuk` (
  `id_obat_masuk` int(11) NOT NULL,
  `kd_obat` varchar(255) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `harga_satuan` varchar(255) NOT NULL,
  `jumlah_masuk` varchar(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_kadaluwarsa` date NOT NULL,
  `riwayat_stok` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pagu`
--

CREATE TABLE `tb_pagu` (
  `kd_pagu` varchar(255) NOT NULL,
  `total_anggaran` varchar(255) NOT NULL,
  `anggaran_digunakan` varchar(255) NOT NULL,
  `sisa_anggaran` varchar(255) NOT NULL,
  `tahun_anggaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pagu`
--

INSERT INTO `tb_pagu` (`kd_pagu`, `total_anggaran`, `anggaran_digunakan`, `sisa_anggaran`, `tahun_anggaran`) VALUES
('PG00001', ' 52500000', '0', '52500000', '2024-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peg`
--

CREATE TABLE `tb_peg` (
  `kd_peg` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `id_staf` int(11) NOT NULL,
  `id_subbagian` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_kel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_peg`
--

INSERT INTO `tb_peg` (`kd_peg`, `nama_lengkap`, `jenis_kelamin`, `id_staf`, `id_subbagian`, `tgl_lahir`, `id_kel`) VALUES
('PEG00001', 'Faisal Djukiro', 'Laki-Laki', 1, 1, '1998-07-02', 0),
('PEG00002', 'Firman Ibrahim', 'Laki-Laki', 2, 1, '1998-01-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegeseran_pagu`
--

CREATE TABLE `tb_pegeseran_pagu` (
  `id_pergeseran` int(11) NOT NULL,
  `kd_pagu` varchar(255) NOT NULL,
  `jumlah_pergeseran` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_pergeseran` date NOT NULL,
  `status` enum('tambah','kurang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `nama_satuan`) VALUES
(6, 'AMPUL'),
(7, 'BIJI'),
(8, 'BOTOL'),
(9, 'BUAH'),
(10, 'FLAKON'),
(11, 'KAPLET'),
(12, 'KAPSUL'),
(13, 'LEMBAR'),
(14, 'METER'),
(15, 'PCS'),
(16, 'ROL'),
(17, 'SERBUK'),
(18, 'SRIP'),
(19, 'STIK'),
(20, 'STRIP'),
(21, 'TABLET'),
(22, 'TUBE'),
(23, '239');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staf`
--

CREATE TABLE `tb_staf` (
  `id_staf` int(11) NOT NULL,
  `nama_staf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_staf`
--

INSERT INTO `tb_staf` (`id_staf`, `nama_staf`) VALUES
(1, 'Programmer'),
(2, 'Teknisi'),
(3, 'Kasubag');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subbagian`
--

CREATE TABLE `tb_subbagian` (
  `id_subbagian` int(11) NOT NULL,
  `nama_subbagian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_subbagian`
--

INSERT INTO `tb_subbagian` (`id_subbagian`, `nama_subbagian`) VALUES
(1, 'Sub Bagian Umum Dan TI'),
(2, 'SDM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `alamat_suplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat_suplier`) VALUES
(4, 'WAN SETIA1', '082259126158', 'Jl. Ir. Hi. Joesoef Dalie No, 125, Kota Tengah'),
(5, 'IBNU SINA', '085342772090', 'Jl. Jendral Sudirman No.16, Kota Tengah'),
(6, 'Kimia Farma', '081110678513', 'Jl. Pangeran Hidayat I, Liluwo. Kota Tengah'),
(8, 'SALDO AWAL', '12345678', 'BPK GTO'),
(9, 'Era Sehat', '0435831347', 'Jl. K.H. Agus Salim, Limba B, Kota Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `id_subbagian` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `id_subbagian`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Faisal Djukiro', 1, 'faisaldjukiro98@gmail.com', 'default.jpg', '$2y$10$X1/RRNg2E4gD4t4KrBEDVezp3ID0cQpF8Q86njnbA7BpxFX/kfusS', 1, 1, 1698543559);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 7),
(5, 1, 6),
(7, 1, 8),
(10, 1, 10),
(11, 1, 11),
(12, 4, 1),
(13, 4, 11),
(14, 4, 6),
(15, 4, 7),
(16, 2, 1),
(17, 2, 10),
(18, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `urutan`) VALUES
(1, 'Beranda', 1),
(2, 'Master', 2),
(6, 'Transaksi', 4),
(7, 'Pegawai', 5),
(8, 'Settings', 7),
(10, 'Pemeriksaan', 3),
(11, 'Pagu', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Dokter'),
(3, 'Perawat'),
(4, 'SDM'),
(5, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `urutan`) VALUES
(1, 1, 'Beranda', 'beranda', 'bi bi-grid', 1, 0),
(2, 8, 'Menu Management', 'settings', 'bi bi-folder-fill', 1, 3),
(3, 8, 'Submenu Management', 'settings/submenu', 'bi bi-folder2-open', 1, 4),
(4, 2, 'Nama Apotek', 'master/supplier', 'bi bi-bank2', 1, 0),
(7, 2, 'Satuan Obat', 'master/satuan', 'bi bi-distribute-vertical', 1, 0),
(8, 2, 'Data Obat', 'master/obat', 'bi bi-capsule', 1, 0),
(9, 6, 'Obat Masuk', 'transaksi/obat-masuk', 'bi bi-layer-backward', 1, 0),
(10, 6, 'Obat Keluar', 'transaksi/obat-keluar', 'bi bi-layer-forward', 1, 0),
(11, 7, 'Pegawai', 'pegawai', 'ri ri-apps-line', 1, 0),
(12, 8, 'User Management', 'settings/user', 'bi bi-person-lines-fill', 1, 2),
(13, 8, 'Role', 'settings/role', 'bi bi-person-check-fill', 1, 1),
(18, 10, 'Resep Obat', 'pemeriksaan/resep/', 'ri ri-capsule-fill', 1, 0),
(19, 11, 'Pagu', 'pagu', 'bi bi-currency-dollar', 1, 0),
(21, 6, 'Riwayat Obat', 'transaksi/riwayat-obat', 'bi bi-book', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(182) NOT NULL,
  `token` varchar(182) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `tb_obat_keluar`
--
ALTER TABLE `tb_obat_keluar`
  ADD PRIMARY KEY (`id_obat_keluar`),
  ADD KEY `kd_obat` (`kd_obat`),
  ADD KEY `kd_peg` (`kd_peg`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_obat_masuk`
--
ALTER TABLE `tb_obat_masuk`
  ADD PRIMARY KEY (`id_obat_masuk`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_obat` (`kd_obat`);

--
-- Indexes for table `tb_pagu`
--
ALTER TABLE `tb_pagu`
  ADD PRIMARY KEY (`kd_pagu`);

--
-- Indexes for table `tb_peg`
--
ALTER TABLE `tb_peg`
  ADD PRIMARY KEY (`kd_peg`);

--
-- Indexes for table `tb_pegeseran_pagu`
--
ALTER TABLE `tb_pegeseran_pagu`
  ADD PRIMARY KEY (`id_pergeseran`),
  ADD KEY `id_pagu` (`kd_pagu`),
  ADD KEY `kd_pagu` (`kd_pagu`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_staf`
--
ALTER TABLE `tb_staf`
  ADD PRIMARY KEY (`id_staf`);

--
-- Indexes for table `tb_subbagian`
--
ALTER TABLE `tb_subbagian`
  ADD PRIMARY KEY (`id_subbagian`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_obat_keluar`
--
ALTER TABLE `tb_obat_keluar`
  MODIFY `id_obat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_obat_masuk`
--
ALTER TABLE `tb_obat_masuk`
  MODIFY `id_obat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pegeseran_pagu`
--
ALTER TABLE `tb_pegeseran_pagu`
  MODIFY `id_pergeseran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_staf`
--
ALTER TABLE `tb_staf`
  MODIFY `id_staf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_subbagian`
--
ALTER TABLE `tb_subbagian`
  MODIFY `id_subbagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
