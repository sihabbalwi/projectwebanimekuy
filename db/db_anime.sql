-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2025 pada 15.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_anime`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anime`
--

CREATE TABLE `tb_anime` (
  `id_anime` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `tipe` varchar(50) DEFAULT 'anime'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_anime`
--

INSERT INTO `tb_anime` (`id_anime`, `judul`, `deskripsi`, `image`, `status`, `genre`, `tipe`) VALUES
(5, 'Naruto', 'Naruto', 'https://th.bing.com/th/id/R.12c5319798636a7e627c98bf5af718d5?rik=kurhOq6o0YdA2g&riu=http%3a%2f%2fwallpapercave.com%2fwp%2fvgK96jl.jpg&ehk=DrDF4MryI6%2fHrBefn2l%2bafIhq5CiPTfBAXuT7LU3B6o%3d&risl=&pid=ImgRaw&r=0', 'Ongoing', 'action | adventure | fantasy', 'anime'),
(7, 'Make Heroine ga Oosugiru!', 'Heroine yang tertolak', 'https://cdn.myanimelist.net/images/anime/1332/143513l.jpg', 'Completed', 'drama | romance | school | slice of life', 'anime'),
(8, 'Sakamoto Days (season 1)', 'Dulu, ada pembunuh bayaran paling ditakuti sekaligus dikagumi oleh banyak orang. Ia adalah Tarou Sakamoto. Suatu hari, Sakamoto yang sedang berbelanja di minimarket bertemu dengan gadis cantik yang tengah menjadi kasir bernama Aoi.\r\nSakamoto pun jatuh cinta pada pandangan pertama kepada Aoi. Karena pertemuannya tersebut, Sakamoto akhirnya memilih meninggalkan jalan sebagai pembunuh bayaran dan kini hidup bersama dengan Aoi sebagai pasangan suami istri hingga tubuhnya sekarang berubah menjadi gendut.\r\nWalau memiliki tubuh besar, kecepatan dan kelincahan Sakamoto masih tetap sama. Sekarang, Sakamoto harus menjalani kehidupannya sembari melindungi keluarganya dari musuh yang ingin membunuhnya.', 'https://screenscore.digitalmama.id/wp-content/uploads/2025/03/MV5BM2MwZDRmYWItNGIzZC00ZWExLWEwNWYtNmM1ZmU3OTA3NmY4XkEyXkFqcGc@._V1_.jpg', 'Completed', 'action | comedy | organized crime | shounen', 'anime'),
(9, 'Solo Leveling (season 1)', 'Sepuluh tahun yang lalu, muncul sebuah Gate yang berisikan para monster. Senjata konvensional seperti pistol tidak bisa melukai monster tersebut. Namun, manusia berkekuatan super yang disebut dengan Hunter berhasil mengalahkan mereka.\r\nPara Hunter pun populer dan menjadi pekerjaan yang menjanjikan uang lebih banyak. Kisah berpusat kepada Shun Mizushino (Jin-Woo Sung) yang memiliki rank E atau Hunter paling lemah.\r\nSuatu hari, Shun yang tengah menjalani sebuah Dungeon bersama dengan teman-temannya terjebak di sebuah ruangan. Dalam posisi yang genting, ia mendapatkan sebuah pesan untuk menaikkan levelnya. Bagaimana kisah lengkapnya?', 'https://i.pinimg.com/736x/00/bf/a5/00bfa50817ba4107538d2f79da3e20c4.jpg', 'Completed', 'action | adventure | fantasy', 'anime'),
(11, 'Spy x Family (Season 1)', 'Loid Forge atau Twilight, seorang mata-mata yang bekerja untuk organisasi rahasia. Loid dikenal sebagai salah satu mata-mata yang selalu berhasil menyelesaikan misinya. Suatu hari, Loid diberikan tugas oleh atasannya untuk membentuk sebuah keluarga palsu.\r\nTujuannya yakni guna mendekati Desmon Donovan, Pemimpin dari Partai Nasional. Untuk mewujudkan misi tersebut, Loid mengunjungi Panti Asuhan dan memilih mengadopsi seorang anak perempuan bernama Anya.\r\nSetelah mengadopsi seorang anak, Loid diharuskan mencari seorang istri. Untuk itu, Yor, salah satu wanita yang bekerja di pemerintahan bersedia membuat keluarga palsu dengan Loid. Sekarang, apakah misi dari Loid akan berhasil?', 'https://i0.wp.com/asiaon.com.br/wp-content/uploads/2022/04/gallery_visual_06.jpg?resize=650%2C939&ssl=1', 'Completed', 'action | comedy | shounen', 'anime'),
(12, 'Shokugeki no Souma (Season 1)', 'Bercerita tentang seorang bernama Yukihara Souma, ia menjadi koki di kedai yang dijalankan oleh ayahnya bersamanya. Ia memiliki cita-cita ingin menjadi koki yang handal dan mengalahkan ayahnya.\r\nBaru-baru ini ia lulus SMP dan mendapati kabar bahwa ayahnya harus pergi ke Amerika untuk membantu temannya sebagai seorang chef. Padahal Souma berniat untuk menjadi koki utama di kedai ayahnya tersebut setelah lulus SMP.\r\nNamun ayahnya Souma, Yukihira Jouichirou mendadak dimintai bantuan dan akan menutup kedainya tersebut. Sebelum Jouichirou pergi, ia memberikan sebuah tantangan kepada Souma, dimana ia mengirimkan Souma ke sebuah Akademi Memasak yang paling terkenal dan Elit dimana hanya segelintir orang yang dapat lulus dari akademi tersebut, yaitu Toutsuki Charyou Ryourii Gakuen.\r\nSouma berfikiran bahwa ia dapat lulus dari sana dengan mudah dan melampaui ayahnya, namun ternyata ekspektasinya tidak sesuai kenyataan, karena banyak sekali saingan-saingannya yang kuat dan hebat yang belum pernah Souma temui sebelumnya. Diakademi Totsuki inilah Souma bertemu, belajar, mengasah kemampuannya dan melewati tantangan yang akan ia hadapi kelak, apakah Souma mampu melakukannya?', 'https://www.animenewsnetwork.com/hotlink/images/encyc/A16344-911899268.1425205899.jpg', 'Completed', 'school | shounen', 'anime'),
(13, 'One Piece', 'Dulu, ada seorang bajak laut terkenal di seluruh lautan bernama Gol D. Roger. Ia merupakan seorang raja bajak laut yang telah berlayar mengarungi seluruh Grand Line, sayangnya ia ditangkap pemerintah dan telah dieksekusi mati. Sesaat sebelum kematiannya, Ia mengumumkan kepada dunia bahwa dirinya menyimpan sebuah harta karun bernama One Piece, sebuah harta karun yang kini menjadi incaran seluruh bajak laut yang ada di dunia. Di Era Bajak Laut saat ini, ada seorang remaja bernama Monkey D. Luffy yang memiliki cita-cita untuk menjadi seorang Raja Bajak Laut. Namun Luffy sadar bahwa ia tidak bisa melakukannya sendiri, sembari dalam perjalanan ia juga mencari kru dan bertemu dengan teman-temannya yang baru. Berbeda dengan bajak laut lain yang ganas dan jahat, Luffy bersama teman-temannya berlayar murni atas dasar petualangan serta mencari tempat tempat baru yang akan muncul di hadapan mereka.', 'https://a.storyblok.com/f/178900/960x1359/07e5d1eede/one-piece-egghead-visual.jpg/m/filters:quality(95)format(webp)', 'Ongoing', 'action | adventure | comedy | drama | fantasy | shounen | super power', 'anime'),
(14, 'Kimetsu no Yaiba (season 4)', 'Sejak dahulu, beredar rumor bahwa iblis pemakan manusia yang bersembunyi di dalam hutan akan muncul pada malam hari, karena itu, para penduduk tak ada yang berani keluar malam-malam. Dan pada saat yang sama akan muncul para pembunuh iblis (demon slayer) yang berkeliaran pada malam hari untuk memburu iblis. Sejak ayahnya meninggal Tanjirou Kamado bekerja untuk menghidupi seluruh keluarganya, ia sekarang tinggal bersama ibu dan kelima adiknya. Tinggal di gunung dan bekerja sebagai penjual arang dan berbagai pekerjaan kecil lainnya. Bisa disebut Tanjirou memiliki keluarga yang bahagia. Namun… suatu hari, setelah seharian penuh berada di kota dan pulang ke rumah, ia mendapati seluruh keluarganya dibantai oleh iblis. Hanya tersisa Nezuko dengan kondisi tubuh yang sekarat. Terkejutnya Tanjirou melihat Nezuko yang saat ini berubah menjadi sesosok iblis, namun Tanjirou tetap percaya kepada Nezuko, dan anehnya Nezuko mengeluarkan emosi layaknya seorang manusia. Karena itu, Tanjirou berjanji akan menyembuhkan Nezuko dan membalaskan dendam keluarganya. Dimulailah perjalanan mereka yang baru.', 'https://cdn.mos.cms.futurecdn.net/cWVHScpDxYjdYZg8u96sdW.jpg', 'Completed', 'action | demons | history | shounen | supernatural', 'anime'),
(15, 'Attack on Titan (season 4)', '(Attack on Titan) – Selama seratus tahun lebih manusia hidup dalam incaran para raksasa, kini manusia telah membuat sebuah dinding yang sangat besar setinggi melebihi besarnya para raksasa tersebut untuk bertahan hidup dari serangan para raksasa. Raksasa yang mengincar mereka disebut dengan Titan (Kyojin).Entah darimana awal mula datangnya para Titan, namun untuk saat ini manusia dapat bernafas lega hidup di dalam dinding. Hingga suatu hari, kehidupan damai mereka sirna ketika datang sesosok Titan yang sangat besar berkali-kali lipatnya dari titan biasa menghancurkan bagian dinding terluar mereka. Kejadian tersebut membuat para titan-titan lainnya memasuki wilayah dinding dan memakan semua manusia yang ada dihadapannya. Bercerita tentang seorang anak bernama Eren Jaeger, ia merupakan seorang anak yang menyaksikan kejadian kelam tersebut, ibunya sendiri telah tatkala seekor titan yang memakan ibunya tepat di depan matanya. Umat manusia saat itu hanya bisa pasrah dan mengungsi ke bagian terdalam dari dinding.', 'https://i.pinimg.com/736x/a8/e5/f8/a8e5f85f822327d820f195a70a40edff.jpg', 'Completed', 'action | drama | fantasy | military | shounen | super power', 'anime'),
(17, 'Tokyo Ghoul', 'Bercerita tentang seorang pemuda bernama Kaneki Ken, ia adalah pemuda seperti kebanyakan lainnya, namun seluruh hidupnya berubah ketika bertemu dengan orang yang ia sukai bernama Kamishiro Rize. Waktu itu Kaneki mengantar Rize pulang, saat itu Kaneki terkejut karena Rize menunjukkan wujud aslinya yaitu seorang Ghoul, “Ghoul” yaitu pemakan manusia. Rize menyerang Kaneki karena berniat memakannya, namun keberuntungan berpihak kepada Kaneki. Terjadi kecelakaan di tempat konstruksi tersebut yang membuat mereka berdua tertimpa namun Kaneki selamat dengan kondisi separuh bagian tubuhnya yang hancur. Saat hendak diselamatkan, hanya 1 harapan yang ada yaitu dengan transplantasi sebagian tubuhnya dengan tubuh Rize. Tanpa tahu siapa sebenarnya Rize tersebut, para dokter melakukan operasi yang akhirnya membuat Kaneki sekarang menjadi seorang manusia setengah Ghoul.', 'https://i.pinimg.com/736x/bb/d5/9b/bbd59b6cbfb0d1a2a1b64da1accd76a8.jpg', 'Completed', 'action | drama | horror | mystery | pyschologycal | shounen', 'anime'),
(18, 'Fate Stay Night: Unlimited Blade Works', 'Perang cawan suci merupakan tradisi perang dari masa lalu yang melibatkan 7 orang untuk memperebutkan sebuah cawan suci yang dapat mengabulkan segala permintaan. 7 orang tersebut dipanggil sebagai master, masing-masing dari master didampingi oleh seorang roh pahlawan yang mereka panggil dengan sebuah ritual. ketujuh roh pahlawan tersebut yakni Archer, Saber, Lancer, Assassin, Berserker, Caster, & Rider. Sekarang hampir memasuki perang cawan suci yang ke-5. Karena itu, Rin Tohsaka, seorang siswi SMA yang merupakan keturunan keluarga Tohsaka harus mengikuti perang besar ini. Ia berhasil memanggil seorang roh pahlawan Archer. Saat pertemuan antara Rin dengan Lancer, tak disengaja terdapat orang biasa yang tak sengaja melihat pertarungan mereka, dalam aturan mereka, Saksi harus dibunuh. Namun Rin malah menyelamatkan orang tersebut yang tak lain adalah Shirou, teman sekelasnya. Oleh karena itu, Shirou terseret ke dalam perang cawan suci dan tak disangka-sangka ia berhasil memanggil seorang roh pahlawan, Saber. Akhirnya Rin & Shirou bekerja sama, dari sinilah perang yang sebenarnya dimulai...', 'https://images.justwatch.com/poster/255430295/s718/fate-stay-night-unlimited-blade-works.jpg', 'Completed', 'action | fantasy | super power | mystery', 'anime'),
(19, 'Renegade Immortal – Xian Ni', 'Seorang pemuda biasa bernama Wang Lin berasal dari keluarga miskin. Meskipun ia tidak berbakat dalam seni bela diri, ia memiliki kemauan keras dan kecerdasan tajam. Suatu hari, ia mendapatkan kesempatan untuk bergabung dengan sekte kultivasi dan mulai menapaki jalan menuju keabadian. Namun, jalan kultivasi bukanlah jalan yang mudah. Setelah menghadapi pengkhianatan, kehilangan, dan penderitaan, Wang Lin mengalami transformasi besar dalam hidupnya. Dari seseorang yang lugu dan lemah, ia tumbuh menjadi sosok yang kejam dan kuat, hanya demi satu tujuan — membalas dendam dan menguasai langit.', 'https://donghualist.com/wp-content/uploads/2023/12/renegade-immortal-xian-ni.jpg', 'Ongoing', 'action | adventure | fantasy', 'donghua'),
(20, 'Lord of the Mysteries', 'Dalam dunia bergaya Victoria yang dipenuhi mesin uap, kapal tempur raksasa, dan kengerian okultisme, Zhou Mingrui terbangun dalam tubuh seorang pria bernama Klein Moretti. Ia mendapati dirinya berada di tengah pusaran kekuatan gaib dan pertentangan antar Gereja misterius yang saling bersaing di balik bayang-bayang masyarakat. Klein harus berjalan di atas garis tipis antara terang dan kegelapan, mengungkap rahasia yang tak terkatakan sembari mempertaruhkan kewarasannya. Dengan buku harian kuno dan kekuatan yang terus berkembang, ia mulai memasuki dunia ritual, artefak terkutuk, dan entitas tak dikenal. Ini adalah kisah tentang potensi tanpa batas… dan bahaya yang tak terlukiskan. Mampukah Klein mempertahankan identitasnya dan selamat dari kekuatan yang ingin menguasainya — atau akan ia menjadi bagian dari kegelapan itu sendiri?', 'https://fr.web.img3.acsta.net/img/c0/98/c098c23d1ddd09a1c29082d46d31b383.jpg', 'Ongoing', 'supernatural | mystery | pyschologycal | action | fantasy', 'donghua'),
(21, 'A Record of Mortal’s Journey to Immortality', 'Han Li adalah seorang anak desa biasa, miskin dan tampak tak menonjol. Dengan harapan bisa memperbaiki kehidupan keluarganya, ia memberanikan diri mengikuti ujian masuk Sekte Qi Xuan. Meskipun hanya memiliki bakat rata-rata, Han Li diterima dan mulai menapaki jalan panjang dan berbahaya di dunia kultivasi. Dengan bekal tekad kuat dan kecerdasan bertahan hidup, Han Li harus menghadapi dunia Jianghu yang penuh dengan bahaya, intrik sekte, hingga iblis dan dewa kuno. Dalam perjalanan ini, ia berjuang keras melawan rintangan yang tampaknya mustahil, hanya untuk menemukan jalannya sendiri menuju keabadian. Ini adalah kisah seorang manusia biasa, yang meski tak dilahirkan istimewa, berani menantang langit dan neraka demi hidup yang lebih tinggi — dan abadi.', 'https://donghualist.com/wp-content/uploads/2023/11/a-record-of-mortal-journey-to-immortality-2.jpg', 'Ongoing', 'action | adventure | fantasy', 'donghua'),
(22, 'Martial Master – Wu Shen Zhu Zai', 'Qin Chen, tokoh legendaris dari benua Tianwu, dikhianati oleh kekasih dan sahabatnya hingga terbunuh secara tragis. Namun takdir memberinya kesempatan kedua: ia terlahir kembali setelah tiga ratus tahun sebagai anak haram dari seorang bangsawan yang sering direndahkan. Dengan membawa pengetahuan dan teknik dari kehidupan sebelumnya—termasuk keahlian dalam metode spiritual dan peracikan pil—Qin Chen mulai bangkit. Ia menapaki jalan balas dendam dan kekuasaan, menghancurkan rintangan dan musuh di hadapannya. Perjalanannya bukan sekadar membalas dendam, melainkan untuk mendominasi dunia dan mengguncang seluruh negeri. Inilah kisah kebangkitan seorang Dewa Perang sejati, yang tak akan membiarkan siapa pun meremehkannya lagi.', 'https://donghualist.com/wp-content/uploads/2023/11/the-god-of-war-dominates-wu-shen-zhu-zai-2.jpg', 'Ongoing', 'action | adventure | fantasy | martial art', 'donghua'),
(23, 'Purple River – Zi Chuan', 'Di sebuah benua yang dilanda peperangan antar ras dan kekuatan politik, muncul tiga pahlawan dari Klan Zichuan: Sterling, prajurit setia penuh semangat patriotik; Di Lin, seorang jenius strategi berdarah dingin; dan Zichuan Xiu, pemberontak cerdik yang dibenci dan dihormati sekaligus. Ketiganya bersaudara, tapi memiliki jalan dan keyakinan yang sangat berbeda. Saat Klan Zichuan terjebak antara musuh internal dan eksternal, mereka harus memilih antara cinta, keluarga, kekuasaan, dan kebenaran. Sterling rela meninggalkan cintanya demi membela klan, sementara Zichuan Xiu menantang maut demi menggagalkan pemberontakan dan mengusir iblis dari tanah mereka. Pertarungan epik antara manusia, iblis, orc, dan suku timur pun pecah. Di tengah darah dan api, sebuah legenda penuh pengorbanan, ambisi, dan takdir besar mulai terbentuk', 'https://donghualist.com/wp-content/uploads/2023/11/purple-river-zi-chuan-2.jpg', 'Ongoing', 'action | adventure | fantasy | military | drama', 'donghua'),
(24, 'The Founder of Diabolism – Mo Dao Zu Shi', 'Wei Wuxian, pendiri aliran sesat Demonic Path, dahulu merupakan kultivator jenius namun kontroversial. Ajarannya yang tak ortodoks menyebabkan kekacauan dan membuatnya dibenci oleh dunia kultivasi. Setelah dikhianati oleh saudara seperguruannya sendiri, ia tewas di tangan aliansi sekte besar. Namun takdir belum selesai dengannya. Ia terlahir kembali dalam tubuh seorang pemuda gila yang ditelantarkan oleh klannya. Tanpa diduga, ia justru bertemu kembali dengan Lan Wangji—musuh lamanya yang teguh dan kalem. Meskipun berbeda prinsip, mereka terjebak dalam perjalanan bersama yang penuh misteri, makhluk spiritual, anak-anak yatim, dan kutukan masa lalu. Dalam proses menyelidiki konspirasi dunia kultivasi dan kegelapan yang tersembunyi di balik topeng sekte-sekte besar, hubungan mereka berubah—dari lawan menjadi sekutu yang tak terpisahkan. Kisah ini bukan hanya soal pertarungan dan keabadian, tapi juga pengampunan, pengkhianatan, dan koneksi yang tak terduga di antara dua jiwa.', 'https://donghualist.com/wp-content/uploads/2023/11/the-founder-of-diabolism-mo-dao-zu-shi-2.jpg', 'Ongoing', 'action | adventure | fantasy | supernatural | mystery | drama | romance', 'donghua'),
(25, 'Stellar Transformation – Xing Chen Bian', 'Qin Yu lahir di galaksi yang jauh, di mana kemampuan kultivasi internal menjadi standar kekuatan. Namun, ia terlahir tanpa bakat alami untuk itu. Demi mendapatkan pengakuan dari ayahnya—seorang pemimpin bangsawan—ia memilih jalan yang lebih menyakitkan: kultivasi eksternal, yang penuh dengan penderitaan dan risiko. Tahun-tahun keras membentuknya menjadi sosok kuat, namun perubahan sejati dimulai saat sebuah batu misterius, Meteoric Tear, diam-diam menyatu dengan tubuhnya. Tanpa ia sadari, batu itu mengubah hidupnya sepenuhnya, membuka potensi yang bahkan melebihi ekspektasi dunia. Dari anak yang diabaikan menjadi pejuang luar biasa, Qin Yu menapaki jalur yang membawanya melampaui dunia fana—menuju langit bintang dan takdir besar. Ini adalah kisah tentang tekad, transformasi, dan ambisi untuk melampaui batasan dunia fana menuju keabadian di jagat raya.', 'https://donghualist.com/wp-content/uploads/2023/11/stellar-transformation-xing-chen-bian-2.jpg', 'Ongoing', 'action | adventure | fantasy | martial art', 'donghua'),
(26, 'Wan Jie Xian Zong – Fairy Legends', 'Setelah jatuhnya Dinasti Shang, Sekte Tianyuan Shenzong — yang selama ini menjaga garis keturunan kerajaan lama — menjadi target dan dihancurkan oleh lima sekte besar lainnya pada awal era Dinasti Zhou. Dalam keadaan genting, pemimpin Tianyuan Shenzong memilih untuk membuka jalan menuju keabadian dan mempercayakan takdir sekte itu kepada seorang pemuda bernama Ye Xingyun. Namun, tak ada yang tahu bahwa Ye Xingyun ternyata adalah pangeran yang selamat dari Dinasti Shang yang telah lama runtuh. Di tengah jalur kultivasi yang berat, ia juga menapaki jalan pembalasan, membongkar kebenaran masa lalu, dan mempersiapkan kebangkitan kekaisaran yang telah lama terkubur. Dengan latar penuh dunia spiritual, sekte, pengkhianatan, dan konspirasi kerajaan — kisah Wan Jie Xian Zong adalah perpaduan antara epik fantasi dan tragedi historis yang mengakar pada darah, kehormatan, dan keabadian.', 'https://donghualist.com/wp-content/uploads/2023/11/wan-jie-xian-zong-fairy-legends.jpg', 'Ongoing', 'action | adventure | fantasy', 'donghua'),
(27, 'Dr. Stone (season 4)', 'Suatu hari, Taiju Oki telah bersiap untuk menyatakan cinta-nya kepada gadis yang sudah ia sukai sejak lima tahun lalu. Ketika ia ingin menyatakan cinta-nya, secara tiba-tiba muncul cahaya aneh yang menyinari bumi. Cahaya itu mampu menembus segala bentuk bangunan ataupun dinding dan membuat orang yang terkena cahaya tersebut menjadi batu. Setelah Taiju terkena cahaya tersebut, batu yang ada di dirinya mulai retak dan hancur. Ia pun terkejut, pasalnya peradabannya saat itu telah banyak berubah. Bumi ini hanya di huni oleh tumbuhan dan binatang. Sampai suatu hari, Taiju bertemu dengan Senkuu. Senkuu merupakan teman sekelas Taiju yang mempunyai pengetahuan di bidang sains. Senkuu merupakan siswa jenius yang tergila-gila akan sains, ia tidak menerima fenomena ini karena tidak sesuai dengan apa yang dijelaskan oleh Sains. Hasilnya, Oki dan Senkuu memulai perjalanan mereka untuk mengetahui apa yang sebenarnya terjadi pada bumi ini. Mereka berdua bertekad untuk membangun peradaban kembali bumi layaknya kehidupan modern seperti sebelumnya.', 'https://otakulounge.com/wp-content/uploads/2021/06/9781974724055.jpg', 'Ongoing', 'adventure | shounen | action', 'anime');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_banner`
--

CREATE TABLE `tb_banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_anime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_banner`
--

INSERT INTO `tb_banner` (`id`, `image`, `id_anime`) VALUES
(10, 'banner_1752305110.png', 14),
(11, 'banner_1752308338.jpg', 9),
(12, 'banner_1752308692.png', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_episode`
--

CREATE TABLE `tb_episode` (
  `id_episode` int(11) NOT NULL,
  `id_anime` int(11) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `video` varchar(222) NOT NULL,
  `episode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_episode`
--

INSERT INTO `tb_episode` (`id_episode`, `id_anime`, `publisher`, `waktu`, `video`, `episode`) VALUES
(11, 5, 'UDFFU', '08.03', 'https://drive.google.com/file/d/1dlD6cpqmSQAXFAlyJBLkfCS5qEIWeeXU/preview', 1),
(12, 5, 'AFEF', '08.07', 'https://pixeldrain.com/u/UuANZMyB', 2),
(13, 7, 'Wee', '21.42 WIB', 'https://drive.google.com/file/d/1gYHCWBhTv7qZiOX3NF_pTgK2tda6I_a4/preview', 1),
(14, 7, 'Wee', '21.43 WIB', 'https://drive.google.com/file/d/1rhcJvvcWHCihezvqJn2H_1lTaRZ3fQEB/preview', 2),
(15, 7, 'Wee', '21.56 WIB', 'https://drive.google.com/file/d/13TIqBAKTD1vwy3cU043js4EsIY4klQ2c/preview', 3),
(16, 7, 'Wee', '21.56 WIB', 'https://drive.google.com/file/d/1bajKQDOHme8KrOSZTDLjDHUs7RJnQhUc/preview', 4),
(17, 7, 'Wee', '22.03 WIB', 'https://drive.google.com/file/d/1yNnjrc4Vzf0sJ6U2ZVqBQg2JvYBDA56f/preview', 5),
(18, 7, 'Wee', '22.04 WIB', 'https://drive.google.com/file/d/1H-lf9qT5J15YS149KlavTbKODfF9uWIV/preview', 6),
(19, 7, 'Wee', '22.06 WIB', 'https://drive.google.com/file/d/1W6tOghenNNjt68g7nrsxEojeIivR2TRz/preview', 7),
(20, 7, 'Wee', '22.07 WIB', 'https://drive.google.com/file/d/1EHuYZO7bySRu0EQFSrS1RCaycRGCMBvd/preview', 8),
(23, 7, 'Wee', '22.09 WIB', 'https://drive.google.com/file/d/12yBwgE6xJqBBA95YWc51vzTGh1EHLx1B/preview', 9),
(24, 7, 'Wee', '22.10 WIB', 'https://drive.google.com/file/d/1vdqu5IPG8PA9TUk6p3oVSYzkjvTBcYWg/preview', 10),
(25, 7, 'Wee', '22.11 WIB', 'https://drive.google.com/file/d/1ZdTa0gV3eZhQUpsEFNlENyzi_RZlLwEo/preview', 11),
(26, 7, 'Wee', '22.12 WIB', 'https://drive.google.com/file/d/1-gZT3nw3SI3_CnfvpRKgU3_o6nEQM4ot/preview', 12),
(28, 8, 'TMS Entertainment', '3.50 PM', 'https://drive.google.com/file/d/1Vn4z57yBWtUhn-wuSMmkqcW6QC0YBv4f/preview', 1),
(29, 9, 'A-1 Pictures', '3.52 PM', 'https://drive.google.com/file/d/1pqsN_l1zqeEbYLHYxOjIwSCsOcVtSSjl/preview', 1),
(30, 11, 'TOHO animation', '3.53 PM', 'https://drive.google.com/file/d/1t5eCnKFqFPygvPH_SNl8_0UyjfBgCSHl/preview', 1),
(31, 8, 'TMS Entertainment', '4.18 PM', 'https://drive.google.com/file/d/1AIP3gsbMwFzCvdVBupwH1AzwLkaGeYye/preview', 2),
(32, 9, 'A-1 Pictures', '4.18 PM', 'https://drive.google.com/file/d/18BUQme3fTFMHuJmL1VdswdHcOoWtela9/preview', 2),
(33, 11, 'TOHO animation', '4.19 PM', 'https://drive.google.com/file/d/1f9u_DtBny2-EpksT5f26gEXP5lYQ5xWV/preview', 2),
(34, 8, 'TMS Entertainment', '4.20 PM', 'https://drive.google.com/file/d/1OxhBtxvhOVtCi8gkKfIpHp6Wt0_chFIm/preview', 3),
(35, 9, 'A-1 Pictures', '4.21 PM', 'https://drive.google.com/file/d/12hwsmNtIK9Br2Bck3YQpW3EymKHD2jP5/preview', 3),
(36, 11, 'TOHO animation', '4.21 PM', 'https://drive.google.com/file/d/1gKF0tlkQ0rWdvNTzcfQyIiZgru62vU5T/preview', 3),
(37, 8, 'TMS Entertainment', '4.22 PM', 'https://drive.google.com/file/d/1ec8PjTwXNKVQk7gOXkDYlVdGnHizcfop/preview', 4),
(38, 9, 'A-1 Pictures', '4.22 PM', 'https://drive.google.com/file/d/1ZKUtMORt2B2_3Lhjv9pJ6eOyLfQslhRJ/preview', 4),
(39, 11, 'TOHO animation', '4.23 PM', 'https://drive.google.com/file/d/1MM7YIS4UUYhjTx3TgK5u6SIdsDjhXWDb/preview', 4),
(40, 8, 'TMS Entertainment', '4.24 PM', 'https://drive.google.com/file/d/1OBvpha42cJAH_gpMIg7nCug6bpl_XCzY/preview', 5),
(41, 9, 'A-1 Pictures', '4.25 PM', 'https://drive.google.com/file/d/1SGRkDde5KINYCzi-VfHpFGuKe_Bjh0q_/preview', 5),
(42, 11, 'TOHO animation', '4.25 PM', 'https://drive.google.com/file/d/1CsdWIzEDBR-5wzG2CADs-VjQmNr6npUi/preview', 5),
(43, 8, 'TMS Entertainment', '4.27 PM', 'https://drive.google.com/file/d/1SNyfwtow1qCZr-2snw0brq2pg2Cs1Yow/preview', 6),
(44, 9, 'A-1 Pictures', '4.27 PM', 'https://drive.google.com/file/d/1_3GQZCPJ50NHEyXy7mo5gupmeTi96OV0/preview', 6),
(45, 11, 'TOHO animation', '4.28 PM', 'https://drive.google.com/file/d/12S_4zeXKQQRm5Xi7caPlFDYqpKbQvidd/preview', 6),
(46, 8, 'TMS Entertainment', '4.28 PM', 'https://drive.google.com/file/d/1gizfmAj7BVxMOS6OPfjNKfxQurxr1AFH/preview', 7),
(47, 9, 'A-1 Pictures', '4.29 PM', 'https://drive.google.com/file/d/1LtN72JaVUdrKvKHEtRD1oK9xTqThsG2h/preview', 7),
(48, 11, 'TOHO animation', '4.29 PM', 'https://drive.google.com/file/d/1TAWdMec4SF7waIcl5weN3hify_DH3tTs/preview', 7),
(49, 8, 'TMS Entertainment', '4.35 PM', 'https://drive.google.com/file/d/1vSZCQLTzO_kHRfrwrgNe7hWX9dtoDzWX/preview', 8),
(50, 9, 'A-1 Pictures', '4.36 PM', 'https://drive.google.com/file/d/1dQy9ZIY-hAv_wEcQAUOMGs0Jq6ULfBu9/preview', 8),
(51, 11, 'TOHO animation', '4.36 PM', 'https://drive.google.com/file/d/1JhtXjHP7pN9I6to-DhkFEFJAAyat4yU-/preview', 8),
(52, 8, 'TMS Entertainment', '4.37 PM', 'https://drive.google.com/file/d/1eZu-Psy5gLR23C8JCdAAYxisFOVJx4QJ/preview', 9),
(53, 9, 'A-1 Pictures', '4.38 PM', 'https://drive.google.com/file/d/1KKEjavUTXsdC2ejgXd0IE_PMoYVrQYvk/preview', 9),
(54, 11, 'TOHO animation', '4.38 PM', 'https://drive.google.com/file/d/1XTGVkRX2mrPdxSknxVlLMU7oJxvln7pG/preview', 9),
(55, 8, 'TMS Entertainment', '4.39 PM', 'https://drive.google.com/file/d/1m-GBw0GgnKd00fxYICdooz5AU2Ty42yf/preview', 10),
(56, 9, 'A-1 Pictures', '4.40 PM', 'https://drive.google.com/file/d/1nt-8_iz5H9TviVfyfJcOg05Jm-WSfIBu/preview', 10),
(57, 11, 'TOHO animation', '4.40 PM', 'https://drive.google.com/file/d/1D-PZSvo7tUG3At3CC_ZGzUJWhBPaqdm7/preview', 10),
(58, 8, 'TMS Entertainment', '4.41 PM', 'https://drive.google.com/file/d/14gkEkri5ksf1tJNDPHfpuQSx_RTBNRmL/preview', 11),
(59, 9, 'A-1 Pictures', '4.41 PM', 'https://drive.google.com/file/d/1JNnH2RhYfyp7DDz9-c9i5udBckPWdNCK/preview', 11),
(60, 11, 'TOHO animation', '4.42 PM', 'https://drive.google.com/file/d/1vL32GlYM77VWJ-wAcF9PHq94jFJxltmI/preview', 11),
(61, 9, 'A-1 Pictures', '4.43 PM', 'https://drive.google.com/file/d/1kHkqhulDrphFS86T-y781w8UF7SUt5GO/preview', 12),
(62, 11, 'TOHO animation', '4.44 PM', 'https://drive.google.com/file/d/1R_MuyDNw5V8Fy2_UEnvPmrFuVJkC6krF/preview', 12),
(63, 12, 'J.C.Staff', '6.54 PM', 'https://drive.google.com/file/d/17jO7T_LSJ2diPd0hci_OdmJ91BKyP9gX/preview', 1),
(64, 13, 'Toei Animation', '6.55 PM', 'https://drive.google.com/file/d/1hplmLR3SA22VexED15UCeQK6vjkhHUbx/preview', 1132),
(65, 14, 'Aniplex', '6.56 PM', 'https://drive.google.com/file/d/1ohcSwrS45AgBsTQs_Ov2u97OnnlQqRJ2/preview', 1),
(66, 13, 'Toei Animation', '6.56 PM', 'https://drive.google.com/file/d/1h8s4iaurOlsBBsULOXR5HlAsCvyypndn/preview', 1133),
(67, 15, 'Wit Studio', '6.58 PM', 'https://drive.google.com/file/d/1UMarWHf_-3v8DNq1eg0y5jn1wGrMqQ7o/preview', 1),
(68, 13, 'Toei Animation', '6.58 PM', 'https://drive.google.com/file/d/1R5ZS2y2FQq-o2v3wPuKBGlvKmz9AfOfr/preview', 1134),
(69, 18, 'ufotable', '21.40 WIB', 'https://drive.google.com/file/d/1xRP8iayL9qHzY-eV2e1oxON28MFhVSMp/preview', 12),
(70, 27, 'TMS Entertainment', '21.40 WIB', 'https://drive.google.com/file/d/1_ggMHHI-xLK0MVLcsfP8TIzb3lxVTuUT/preview', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_genre`
--

CREATE TABLE `tb_genre` (
  `genre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_genre`
--

INSERT INTO `tb_genre` (`genre`) VALUES
('action'),
('adventure'),
('anime'),
('comedy'),
('demons'),
('drama'),
('fantasy'),
('game'),
('harem'),
('history'),
('horror'),
('isekai'),
('magic'),
('martial art'),
('meme'),
('military'),
('musical'),
('mystery'),
('organized crime'),
('parody'),
('politik'),
('pyschologycal'),
('random'),
('romance'),
('school'),
('shounen'),
('slice of life'),
('sports'),
('super power'),
('supernatural');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `login_type` enum('manual','google') DEFAULT 'manual',
  `verif_code` varchar(10) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `name`, `email`, `password`, `avatar`, `login_type`, `verif_code`, `is_verified`) VALUES
(5, 'ARI NUGROHO 23.11.5796', 'arinugroho@students.amikom.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocJmbkphXk6Ei6fMutQyMTbIhGlHM0xzf_LkP4LOUeFH1PUKRw=s96-c', 'google', NULL, 0),
(7, 'Admin', 'admin@gmail.com', '$2y$10$mcMHaUbW89g0qchuqJ0f0.KTTbiRAtGYsOJv0cYL7wh4HEOw5EuCq', NULL, 'manual', NULL, 0),
(19, 'Arth', 'ari.nugroho552004@gmail.com', '$2y$10$U3NMxaV7lRiBJwg2lYxeDekXGQ4Y4vSd4fpCGW0Gf5ybZJf3g8YGK', NULL, 'manual', '926208', 1),
(21, 'AbiyyuDaib', 'abiyyudaib05@gmail.com', '$2y$10$tOJmVlkY3dxVtyGACvxx6.yUXun4pax2f03ngxx/DgBYrvDYdBcFi', NULL, 'manual', '394811', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anime`
--
ALTER TABLE `tb_anime`
  ADD PRIMARY KEY (`id_anime`);

--
-- Indeks untuk tabel `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_episode`
--
ALTER TABLE `tb_episode`
  ADD PRIMARY KEY (`id_episode`),
  ADD KEY `remove_on_delete` (`id_anime`);

--
-- Indeks untuk tabel `tb_genre`
--
ALTER TABLE `tb_genre`
  ADD UNIQUE KEY `genre` (`genre`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anime`
--
ALTER TABLE `tb_anime`
  MODIFY `id_anime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_episode`
--
ALTER TABLE `tb_episode`
  MODIFY `id_episode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_episode`
--
ALTER TABLE `tb_episode`
  ADD CONSTRAINT `remove_on_delete` FOREIGN KEY (`id_anime`) REFERENCES `tb_anime` (`id_anime`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
