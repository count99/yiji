-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-09-08 09:41:39
-- 伺服器版本: 10.1.25-MariaDB
-- PHP 版本： 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db02`
--

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `news`
--

INSERT INTO `news` (`id`, `title`, `post`, `view`) VALUES
(1, '1qsdasd', 'qwdqwd', 0),
(2, 'aqdfasdf', 'qsdaqwe', 0),
(3, 'qedqed', 'qwedqd', 0),
(4, 'qdqwed', 'qwdqwd', 0),
(5, '慢性病防治', '長期憋尿 泌尿系統問題多 \r\n資料來源：中央健康保險局雙月刊第98期\r\n上稿日期：2012/08/10\r\n文／游小雯\r\n諮詢／郭育成（台北市立聯合醫院陽明院區泌尿科主任）\r\n膀胱是中空、有彈性的肉囊， 約有400c.c.的容積，可暫存由腎臟製造、經輸尿管輸送下來的尿液。一般人排尿量每回約200到350c.c.，每天至少要有4到8次排尿次數才算正常；如果膀胱已存有近400c.c的尿液卻未排出，就會有尿很急、膀胱很脹的感覺，所謂的「憋尿」，就是讓膀胱經常撐在「脹滿」的狀態，沒有適時地清空排尿。「就像水溝的水沒有在流動一樣！」台北市立聯合醫院陽明院區泌尿科郭育成主任表示，把尿憋在膀胱中，就像是沒有流動的髒水，很容易滋生細菌及沉澱物，長期下來，不僅泌尿道易受感染、影響膀胱收縮力，甚至會造成腎臟永久傷害，不僅無法完全修復，還要終身小心照護。\r\n憋尿會憋出哪些毛病呢？\r\n「憋尿、排尿」這個看似簡單的動作，對身體健康卻有極大的影響，以下4項就是一般人最常憋出問題的病症：\r\n1、尿道感染：\r\n憋尿時，長時間無尿液經過尿道，無法將尿道開口的細菌沖走，大量細菌在尿道聚集，很容易引起發炎，尤其尿流不通暢的人（如前列腺肥大、障礙性排尿或結石），尿道感染的發生率，會比正常人高出許多。\r\n2、膀胱發炎：\r\n憋尿使膀胱長期脹大，膀胱壁血管受到壓迫，膀胱黏膜就會缺血，只要身體抵抗力差時，細菌趁虛而入即造成「急性膀胱炎」。膀胱炎發生時，膀胱壁變得較敏感，儘管積存的尿液不多，也會急著想上廁所，但一次卻只能尿出一點點；而大部份的膀胱炎，尿道粘膜通常也處於發炎狀態，所以會出現「燒灼感」，此外通常還會有「血尿」的情況發生。比較嚴重的膀胱炎甚至會發燒、併發腎臟炎等症狀。\r\n3、前列腺炎與副睪丸炎：\r\n男性若水份攝取不夠或憋尿使排尿次數過少，細菌就有機會透過尿道引發感染；嚴重的話，尿液甚至會經由輸精管倒流至前列腺或副睪丸，而引發前列腺炎或副睪丸炎，最嚴重可導致不孕，增加更多棘手的併發症。\r\n4、膀胱損傷：\r\n長期憋尿會使膀胱過度脹扯、壁肌肉層變薄，如果出現纖維化的情形會影響彈性，導致膀胱收縮力因此變差，而有疼痛、頻尿或尿不乾淨等後遺症；如果神經受損嚴重，膀胱括約肌無力，甚至會造成尿不出來的後果。平日勤保健，別讓憋尿造成終身遺憾許多上班族與公司主管，一忙或開會經常就是好幾個小時，為了不影響進度，常忘了上廁所，即使有尿意也盡量憋著，憋尿不只是造成泌尿系統發炎，尿液回流到腎臟也會造成腎積水引發尿毒症等併發症，最後很可能靠洗腎度日了！\r\n平日盡量力行以下4項原則：\r\n1、多喝水、不憋尿。\r\n2、注意個人衛生：如多淋浴少盆浴、女生在如廁後記得由前往後擦、性行為前後（不論男女）應注意會陰部、肛門口及尿道口的清潔工作。\r\n3、正常的飲食習慣及充分的休息與睡眠，以增加抵抗力及免疫力。\r\n4、多注意及控制易引發膀胱炎的疾病：如糖尿病、尿路結石、攝護腺肥大等。\r\n如果民眾發現自己解尿不舒服時，一定要在第一時間就診，讓醫師採用檢體對症下藥，只要沒有其他的特殊問題併存，同時能接受完整療程的抗生素治療，通常一星期左右即可痊癒。不過服藥的時間及用量絕對要遵照醫師囑咐，如果自行隨意停藥或不按時服用，很可能會造成殘存的細菌出現抗藥性，非但原本的症狀無法痊癒，還可能帶來慢性泌尿道發炎、尿路結石、腎臟功能受損等併發症，千萬要特別注意。', 0),
(6, 'qwdeqwe', 'qweqweasd', 0),
(7, 'qwdeqwe', 'qweqweasd', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `que`
--

CREATE TABLE `que` (
  `id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `que`
--

INSERT INTO `que` (`id`, `question`, `answer`, `choice`) VALUES
(8, 'wrt', 'etert', 0),
(9, 'wrt', 'ertert', 0),
(10, 'wrt', 'ertet', 0),
(11, 'yhj', 'ytyutyu', 0),
(12, 'yhj', 'tyutyu', 3),
(13, 'yhj', 'tyutu', 0),
(14, 'yhj', 'ytyutyu', 0),
(15, 'yhj', 'tyutyu', 0),
(16, 'yhj', 'tyutu', 0),
(17, 'yhj', 'ytyutyu', 0),
(18, 'yhj', 'tyutyu', 0),
(19, 'yhj', 'tyutu', 0),
(20, 'yhj', 'ytyutyu', 0),
(21, 'yhj', 'tyutyu', 0),
(22, 'yhj', 'tyutu', 0),
(23, 'yhj', 'ytyutyu', 0),
(24, 'yhj', 'tyutyu', 0),
(25, 'yhj', 'tyutu', 0),
(26, '測試', '測試1', 0),
(27, '測試', 'hk4g4', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `level`) VALUES
(1, 'admin', '1234', 'a@sd.com', 1),
(7, '1', '1', '1', 0),
(8, '2', '2', '2', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `visiters`
--

CREATE TABLE `visiters` (
  `id` int(11) NOT NULL,
  `today` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `visiters`
--

INSERT INTO `visiters` (`id`, `today`, `total`, `day`) VALUES
(1, 3, 12, '2017-09-08');

-- --------------------------------------------------------

--
-- 資料表結構 `zang`
--

CREATE TABLE `zang` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `zang`
--

INSERT INTO `zang` (`id`, `post_id`, `user_id`) VALUES
(11, 3, '1'),
(13, 2, '1'),
(14, 1, '1'),
(16, 5, '1'),
(17, 1, '0'),
(18, 2, '0'),
(19, 5, '2'),
(20, 5, 'admin');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `que`
--
ALTER TABLE `que`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `visiters`
--
ALTER TABLE `visiters`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `zang`
--
ALTER TABLE `zang`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `que`
--
ALTER TABLE `que`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `visiters`
--
ALTER TABLE `visiters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `zang`
--
ALTER TABLE `zang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
