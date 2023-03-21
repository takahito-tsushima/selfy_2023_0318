-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: mysql8079.xserver.jp
-- Generation Time: 2023 年 3 月 22 日 08:53
-- サーバのバージョン： 5.7.40
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lobby2019_selfy`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `record_exchange`
--

CREATE TABLE IF NOT EXISTS `record_exchange` (
  `track` int(12) NOT NULL,
  `lid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `object` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ex_date` date NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `record_exchange`
--

INSERT INTO `record_exchange` (`track`, `lid`, `object`, `ex_date`, `date`) VALUES
(1, '09022095652', '1111', '2023-02-26', '2023-02-26 16:06:15'),
(2, '09022095652', '2222', '2023-02-26', '2023-02-26 16:06:26'),
(3, '2222', '09022095652', '2023-02-26', '2023-02-26 16:06:56'),
(4, '09022095652', '3333', '2023-02-26', '2023-02-26 16:08:47'),
(18, '09022095652', '4444', '2023-03-15', '2023-03-15 10:16:43'),
(19, '09022095652', '5555', '2023-03-15', '2023-03-15 10:16:59'),
(20, '4444', '09022095652', '2023-03-15', '2023-03-15 10:17:47'),
(21, '5555', '09022095652', '2023-03-15', '2023-03-15 11:10:32'),
(22, '99999999999', '09022095652', '2023-03-15', '2023-03-15 11:13:24'),
(23, '09022095652', '99999999999', '2023-03-15', '2023-03-15 11:13:50');

-- --------------------------------------------------------

--
-- テーブルの構造 `register00_photo`
--

CREATE TABLE IF NOT EXISTS `register00_photo` (
  `id` int(12) NOT NULL,
  `lid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `photo_on` blob,
  `photo_off` blob,
  `photo_old` blob,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `register00_photo`
--

INSERT INTO `register00_photo` (`id`, `lid`, `lpw`, `photo_on`, `photo_off`, `photo_old`, `date`) VALUES
(1, '09022095652', 'test', 0x32303233303331353130303131355fe382aae383b3e381aee58699e79c9f2e6a7067, 0x32303233303331353130303131355fe382aae38395e381aee58699e79c9f2e6a7067, 0x32303233303331353130303131355fe69894e381aee58699e79c9f2e6a7067, '2023-03-15 10:01:15'),
(5, '99999999999', 'test', 0x32303233303331353130303630385fe58590e78e89e6b5a9e5bab7e38195e38293e291a12e6a7067, 0x32303233303331353130303630385f, 0x32303233303331353130303630385f, '2023-03-15 10:06:08'),
(6, '1111', '1111', 0x32303233303232343132303833305f4a61636b2e706e67, 0x32303233303232343132303833305f, 0x32303233303232343132303833305f, '2023-02-24 12:08:30'),
(7, '2222', '2222', 0x32303233303232343132313131395f416e647265612e706e67, 0x32303233303232343132313131395f, 0x32303233303232343132313131395f, '2023-02-24 12:11:19'),
(8, '3333', '3333', 0x32303233303232343132313331355f4d69636861656c2e706e67, 0x32303233303232343132313331355f, 0x32303233303232343132313331355f, '2023-02-24 12:13:15'),
(9, '4444', '4444', 0x32303233303232343132313534395f427269646765742e706e67, 0x32303233303232343132313534395f, 0x32303233303232343132313534395f, '2023-02-24 12:15:49'),
(10, '5555', '5555', 0x32303233303232343132313831375f4a616d65732e706e67, 0x32303233303232343132313831375f, 0x32303233303232343132313831375f, '2023-02-24 12:18:17');

-- --------------------------------------------------------

--
-- テーブルの構造 `register01_on`
--

CREATE TABLE IF NOT EXISTS `register01_on` (
  `id` int(12) NOT NULL,
  `lid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `catch_phrase_on` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name01j` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name02j` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name01e` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name02e` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `birth_year` int(4) DEFAULT NULL,
  `birth_month` int(2) DEFAULT NULL,
  `born_place` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prefecture` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `occupation` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affiliation` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `division` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_year` int(4) DEFAULT NULL,
  `start_month` int(2) DEFAULT NULL,
  `postal` int(7) DEFAULT NULL,
  `address01` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address02` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `univ` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `univ_major` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `univ_start_year` int(4) DEFAULT NULL,
  `univ_start_month` int(2) DEFAULT NULL,
  `univ_end_year` int(4) DEFAULT NULL,
  `univ_end_month` int(2) DEFAULT NULL,
  `hs` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hs_major` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hs_start_year` int(4) DEFAULT NULL,
  `hs_start_month` int(2) DEFAULT NULL,
  `hs_end_year` int(4) DEFAULT NULL,
  `hs_end_month` int(2) DEFAULT NULL,
  `grad` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grad_major` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grad_start_year` int(4) DEFAULT NULL,
  `grad_start_month` int(2) DEFAULT NULL,
  `grad_end_year` int(4) DEFAULT NULL,
  `grad_end_month` int(2) DEFAULT NULL,
  `career01` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `division01` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career01_start_year` int(4) DEFAULT NULL,
  `career01_start_month` int(2) DEFAULT NULL,
  `career01_end_year` int(4) DEFAULT NULL,
  `career01_end_month` int(2) DEFAULT NULL,
  `career01_detail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career02` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `division02` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career02_start_year` int(4) DEFAULT NULL,
  `career02_start_month` int(2) DEFAULT NULL,
  `career02_end_year` int(4) DEFAULT NULL,
  `career02_end_month` int(2) DEFAULT NULL,
  `career02_detail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career03` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `division03` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career03_start_year` int(4) DEFAULT NULL,
  `career03_start_month` int(2) DEFAULT NULL,
  `career03_end_year` int(4) DEFAULT NULL,
  `career03_end_month` int(2) DEFAULT NULL,
  `career03_detail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motiv01` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `motiv02` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `motiv03` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `episode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `episode_detail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `register01_on`
--

INSERT INTO `register01_on` (`id`, `lid`, `catch_phrase_on`, `name01j`, `name02j`, `name01e`, `name02e`, `birth_year`, `birth_month`, `born_place`, `prefecture`, `country`, `occupation`, `affiliation`, `division`, `start_year`, `start_month`, `postal`, `address01`, `address02`, `phone`, `fax`, `url`, `email`, `mobile`, `univ`, `univ_major`, `univ_start_year`, `univ_start_month`, `univ_end_year`, `univ_end_month`, `hs`, `hs_major`, `hs_start_year`, `hs_start_month`, `hs_end_year`, `hs_end_month`, `grad`, `grad_major`, `grad_start_year`, `grad_start_month`, `grad_end_year`, `grad_end_month`, `career01`, `division01`, `career01_start_year`, `career01_start_month`, `career01_end_year`, `career01_end_month`, `career01_detail`, `career02`, `division02`, `career02_start_year`, `career02_start_month`, `career02_end_year`, `career02_end_month`, `career02_detail`, `career03`, `division03`, `career03_start_year`, `career03_start_month`, `career03_end_year`, `career03_end_month`, `career03_detail`, `motiv01`, `motiv02`, `motiv03`, `episode`, `episode_detail`, `Date`) VALUES
(1, '09022095652', '営業成績3年連続トップ！', '対馬', '誉仁', 'TSUSHIMA', 'TAKAHITO', 1977, 10, '日本', '香川県', '', '経営者・役員', '株式会社ロビー', '代表取締役', 2005, 6, 1600022, '東京都新宿区新宿2-5-12', 'FORECAST新宿AVENUE 6F', '03-5919-1097', '03-5919-1098', 'www.lobby-z.co.jp', 'takahito.tsushima@lobby-z.co.j', '090-2209-5652', '慶應義塾大学', '商学部', 1997, 4, 2001, 3, '高松高校', '普通科', 1993, 4, 1996, 3, '行っていません。', 'ありません。', 0, 0, 1111, 1, 'JPモルガン証券', '投資銀行本部', 2001, 4, 2004, 10, 'M&Aアドバイザリー及び資本調達', 'タケヤ電機株式会社', '代表取締役社長', 2012, 4, 2023, 1, '家電販売', '○○建設工業株式会社', '100％株主', 2021, 7, 2030, 12, 'オーナー', '【 獲  得 】何かを手に入れること', '【 獲  得 】地位や年収が上がること', '【 獲  得 】新たな人間関係を築くこと', '実はこんな夢を持っています！', '50歳までに世界を変える起業をする！', '2023-02-23 12:41:11'),
(5, '99999999999', 'セカイを変える！', '児玉', '浩康', 'Kodama', 'Hiroyasu', 0, 0, NULL, '', '', '経営者・役員', 'G''sアカデミー', 'ファウンダー', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '2023-03-15 10:08:14'),
(6, '1111', '海と自由を愛するキャプテン！', 'ジャック', 'スパロウ', 'Jack', 'Sparrow', 2000, 1, '海外', '', 'カリブ海', 'フリーランス', '海賊', 'ブラックパール号', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '2023-02-24 12:22:54'),
(7, '2222', 'ミランダの秘書やってます！', 'アンドレア', 'サックス', 'Andrea', 'Sachs', 2000, 2, '海外', '', 'ニューヨーク', '会社員・公務員', 'ランウェイ', '秘書', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '2023-02-24 12:12:28'),
(8, '3333', '五大ファミリー潰しました！', 'マイケル', 'コルレオーネ', 'Michael', 'Corleone', 2000, 3, '海外', '', 'イタリア', '経営者・役員', 'コルレオーネ・ファミリー', 'ゴッド・ファーザー', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '2023-02-24 12:14:39'),
(9, '4444', '日記を書くのが日課です！', 'ブリジット', 'ジョーンズ', 'Bridget', 'Jones', 2000, 0, '海外', '', 'ロンドン', '会社員・公務員', '出版社', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '2023-02-24 12:16:59'),
(10, '5555', 'ボンドカー持ってます！', 'ジェームズ', 'ボンド', 'James', 'Bond', 2000, 5, '海外', '', 'イギリス', '士業・専門職', '英国秘密情報部Mi6', 'コードネーム007', 2000, 5, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '2023-02-24 12:19:32');

-- --------------------------------------------------------

--
-- テーブルの構造 `register02_torisetsu`
--

CREATE TABLE IF NOT EXISTS `register02_torisetsu` (
  `id` int(12) NOT NULL,
  `lid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `forMyColleague01` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyColleague02` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyColleague03` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyColleague04` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyColleague05` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyColleague06` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyColleague07` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyColleague08` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyColleague09` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyColleague10` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyBoss01` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyBoss02` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyBoss03` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyBoss04` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyBoss05` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyBoss06` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyBoss07` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyBoss08` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyBoss09` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyBoss10` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyTeam01` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyTeam02` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyTeam03` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyTeam04` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyTeam05` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyTeam06` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyTeam07` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyTeam08` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyTeam09` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forMyTeam10` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `register02_torisetsu`
--

INSERT INTO `register02_torisetsu` (`id`, `lid`, `forMyColleague01`, `forMyColleague02`, `forMyColleague03`, `forMyColleague04`, `forMyColleague05`, `forMyColleague06`, `forMyColleague07`, `forMyColleague08`, `forMyColleague09`, `forMyColleague10`, `forMyBoss01`, `forMyBoss02`, `forMyBoss03`, `forMyBoss04`, `forMyBoss05`, `forMyBoss06`, `forMyBoss07`, `forMyBoss08`, `forMyBoss09`, `forMyBoss10`, `forMyTeam01`, `forMyTeam02`, `forMyTeam03`, `forMyTeam04`, `forMyTeam05`, `forMyTeam06`, `forMyTeam07`, `forMyTeam08`, `forMyTeam09`, `forMyTeam10`, `date`) VALUES
(1, '09022095652', 'できれば避けたい', 'あまり話しかけられたくない', 'あまり話しかけたくない', 'なるべく自分で考えたい', '自分以外に聞いてほしい', 'そっと見守ってほしい', 'そっと見守りたい', '一人で過ごしたい', 'できれば不参加で', 'なるべく避けたい', '役割だけを忠実に果たしたい', 'チームのペースで進めたい', 'これまでの方法に従いたい', 'できるだけ少なくしてほしい', '全て丸投げしてほしい', '確認しながら決めてほしい', '問題が起きたときだけ行いたい', 'そっと見守ってほしい', '気づかせるよう助言してほしい', '特に何も必要ない', '役割を忠実に果たしてほしい', 'チームのペースに合わせてほしい', '自分で判断して進めてほしい', 'できるだけ少なくしてほしい', '問題が起きたときだけにしてほしい', 'メールで伝えられたい', 'なるべく少なくしたい', 'そっと見守りたい', '気づかせるよう工夫してほしい', '特に何も必要ない', '2023-01-29 23:07:06'),
(5, '99999999999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-26 16:56:55'),
(6, '1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:07:47'),
(7, '2222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:10:59'),
(8, '3333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:12:44'),
(9, '4444', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:15:17'),
(10, '5555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:17:28');

-- --------------------------------------------------------

--
-- テーブルの構造 `register03_off`
--

CREATE TABLE IF NOT EXISTS `register03_off` (
  `id` int(12) NOT NULL,
  `lid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `catch_phrase_off` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `residence` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `family` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hobby` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_weekday` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_weekend` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `holiday` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interest` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `crazy` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `love` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `important` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `collection` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expensive` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `respect` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `register03_off`
--

INSERT INTO `register03_off` (`id`, `lid`, `catch_phrase_off`, `residence`, `family`, `hobby`, `time_weekday`, `time_weekend`, `facebook`, `instagram`, `twitter`, `holiday`, `interest`, `crazy`, `love`, `important`, `collection`, `expensive`, `respect`, `Date`) VALUES
(1, '09022095652', 'いつも仕事してます！', '東京都新宿区', '妻と子供2人', '仕事', '2', '20', 'facebook@facebook.com', 'instagram@instagram.com', 'twitter@twitter.com', '休日も仕事', '興味関心も仕事', 'ハマっているのも仕事', '好きなのも仕事', '大切なのも仕事', '仕事の成果', '会社', '社長', '2023-02-23 12:45:28'),
(5, '99999999999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-26 16:56:55'),
(6, '1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:07:47'),
(7, '2222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:10:59'),
(8, '3333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:12:44'),
(9, '4444', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:15:17'),
(10, '5555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:17:28');

-- --------------------------------------------------------

--
-- テーブルの構造 `register04_truth`
--

CREATE TABLE IF NOT EXISTS `register04_truth` (
  `id` int(12) NOT NULL,
  `lid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `usual01` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usual02` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usual03` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usual04` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usual05` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usual06` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usual07` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usual08` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usual09` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usual10` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `values01` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `values02` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `values03` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `values04` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `values05` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `values06` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chara01` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `chara02` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `chara03` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phrase` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ilike` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dislike` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complex` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `register04_truth`
--

INSERT INTO `register04_truth` (`id`, `lid`, `usual01`, `usual02`, `usual03`, `usual04`, `usual05`, `usual06`, `usual07`, `usual08`, `usual09`, `usual10`, `values01`, `values02`, `values03`, `values04`, `values05`, `values06`, `chara01`, `chara02`, `chara03`, `phrase`, `ilike`, `dislike`, `complex`, `Date`) VALUES
(1, '09022095652', '自分からします', 'よく発信します', 'ほぼ返信します', 'すぐに返信します', '人より早いです', '人より早いです', 'よくしてます', 'よく飲みます', 'よく吸います', 'よくやります', '生きがいややりがい', 'なくてはならない大切なもの', '常にしていたいもの', 'してみたい／していたいもの', 'ずっと変わらないもの', '稼ぐのが楽しいもの', '【行動傾向】飽きっぽい', '【行動傾向】せっかち', '【行動傾向】おっとり', '前向き', '好き', '嫌い', '悩み', '2023-01-29 23:08:07'),
(5, '99999999999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '2023-01-26 16:56:55'),
(6, '1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '2023-02-24 12:07:47'),
(7, '2222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '2023-02-24 12:10:59'),
(8, '3333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '2023-02-24 12:12:44'),
(9, '4444', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '2023-02-24 12:15:17'),
(10, '5555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '2023-02-24 12:17:28');

-- --------------------------------------------------------

--
-- テーブルの構造 `register05_history`
--

CREATE TABLE IF NOT EXISTS `register05_history` (
  `id` int(12) NOT NULL,
  `lid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `childhood` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teenage` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_grad` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_change` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `crossroads` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vision` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `register05_history`
--

INSERT INTO `register05_history` (`id`, `lid`, `childhood`, `teenage`, `new_grad`, `job_change`, `crossroads`, `vision`, `Date`) VALUES
(1, '09022095652', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 19:21:13'),
(5, '99999999999', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-26 16:56:55'),
(6, '1111', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:07:47'),
(7, '2222', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:10:59'),
(8, '3333', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:12:44'),
(9, '4444', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:15:17'),
(10, '5555', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:17:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `record_exchange`
--
ALTER TABLE `record_exchange`
  ADD PRIMARY KEY (`track`);

--
-- Indexes for table `register00_photo`
--
ALTER TABLE `register00_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register01_on`
--
ALTER TABLE `register01_on`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register02_torisetsu`
--
ALTER TABLE `register02_torisetsu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register03_off`
--
ALTER TABLE `register03_off`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register04_truth`
--
ALTER TABLE `register04_truth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register05_history`
--
ALTER TABLE `register05_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `record_exchange`
--
ALTER TABLE `record_exchange`
  MODIFY `track` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `register00_photo`
--
ALTER TABLE `register00_photo`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `register01_on`
--
ALTER TABLE `register01_on`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `register02_torisetsu`
--
ALTER TABLE `register02_torisetsu`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `register03_off`
--
ALTER TABLE `register03_off`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `register04_truth`
--
ALTER TABLE `register04_truth`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `register05_history`
--
ALTER TABLE `register05_history`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
