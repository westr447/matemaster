-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-01-13 10:52:03
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `mp2`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `categorytable`
--

CREATE TABLE `categorytable` (
  `ID` int(8) NOT NULL COMMENT 'ID',
  `category` varchar(20) NOT NULL DEFAULT '0' COMMENT 'カテゴリ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `categorytable`
--

INSERT INTO `categorytable` (`ID`, `category`) VALUES
(1, 'イラスト・画像'),
(2, '写真'),
(3, '文字・テンプレート');

-- --------------------------------------------------------

--
-- テーブルの構造 `favoritematerialtable`
--

CREATE TABLE `favoritematerialtable` (
  `ID` int(8) NOT NULL COMMENT 'ID',
  `userid` int(8) DEFAULT NULL COMMENT 'ユーザーID',
  `materialID` int(8) DEFAULT NULL COMMENT '素材ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `favoritematerialtable`
--

INSERT INTO `favoritematerialtable` (`ID`, `userid`, `materialID`) VALUES
(5, 12, 18);

-- --------------------------------------------------------

--
-- テーブルの構造 `favoriteusertable`
--

CREATE TABLE `favoriteusertable` (
  `ID` int(8) NOT NULL COMMENT 'ID',
  `userid` int(8) DEFAULT NULL COMMENT 'ユーザーID',
  `fuseid` int(8) DEFAULT NULL COMMENT 'お気に入りユーザーID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `favoriteusertable`
--

INSERT INTO `favoriteusertable` (`ID`, `userid`, `fuseid`) VALUES
(12, 12, 6);

-- --------------------------------------------------------

--
-- テーブルの構造 `likematerialtable`
--

CREATE TABLE `likematerialtable` (
  `ID` int(8) NOT NULL COMMENT 'ID',
  `userid` int(8) DEFAULT NULL COMMENT 'ユーザーID',
  `materialID` int(8) DEFAULT NULL COMMENT '素材ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `likematerialtable`
--

INSERT INTO `likematerialtable` (`ID`, `userid`, `materialID`) VALUES
(315, 12, 19),
(316, 6, 11),
(319, 12, 21),
(326, 12, 20),
(329, 12, 9),
(330, 12, 15),
(331, 12, 16);

-- --------------------------------------------------------

--
-- テーブルの構造 `materialtable`
--

CREATE TABLE `materialtable` (
  `ID` int(8) NOT NULL COMMENT '素材ID',
  `userid` int(8) DEFAULT NULL COMMENT 'ユーザーID',
  `categoryid` varchar(20) DEFAULT NULL COMMENT 'カテゴリタグ',
  `name` varchar(20) DEFAULT NULL COMMENT '素材名',
  `tag1` varchar(20) DEFAULT NULL COMMENT '通常タグ',
  `tag2` varchar(20) DEFAULT NULL COMMENT '通常タグ2',
  `tag3` varchar(20) DEFAULT NULL COMMENT '通常タグ3',
  `Lname` varchar(100) DEFAULT NULL COMMENT '大素材名',
  `Mname` varchar(100) DEFAULT NULL COMMENT '中素材名',
  `Sname` varchar(100) DEFAULT NULL COMMENT '小素材名',
  `wideL` int(5) DEFAULT NULL COMMENT '画像大横サイズ',
  `heightL` int(5) DEFAULT NULL COMMENT '画像大縦サイズ',
  `wideM` int(5) DEFAULT NULL COMMENT '画像中横サイズ',
  `heightM` int(5) DEFAULT NULL COMMENT '画像中縦サイズ',
  `wides` int(5) DEFAULT NULL COMMENT '画像小横サイズ',
  `heights` int(5) DEFAULT NULL COMMENT '画像小縦サイズ',
  `explanation` text DEFAULT NULL COMMENT '説明文',
  `likecount` int(8) NOT NULL DEFAULT 0 COMMENT '高評価数',
  `download` int(10) NOT NULL DEFAULT 0 COMMENT 'ダウンロード数',
  `del_flg` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `materialtable`
--

INSERT INTO `materialtable` (`ID`, `userid`, `categoryid`, `name`, `tag1`, `tag2`, `tag3`, `Lname`, `Mname`, `Sname`, `wideL`, `heightL`, `wideM`, `heightM`, `wides`, `heights`, `explanation`, `likecount`, `download`, `del_flg`) VALUES
(9, 12, '3', '数字の1', '数字', 'シンプル', '全サイズあり', '202111252049231l.png', '202111252049231m.png', '202111252049231s.png', 1000, 1000, 750, 750, 500, 500, 'シンプルな数字の1です。', 0, 5, 0),
(10, 12, '3', '数字の2', '数字', 'シンプル', '全サイズあり', '202111252052332l.png', '202111252052332m.png', '202111252052332s.png', 1000, 1000, 750, 750, 500, 500, 'シンプルな数字の2です。', 0, 0, 0),
(11, 12, '3', '数字の3', '数字', 'シンプル', '全サイズあり', '202111252053123l.png', '202111252053123m.png', '202111252053123s.png', 1000, 1000, 750, 750, 500, 500, 'シンプルな数字の3です。', 0, 0, 0),
(12, 12, '3', '数字の4', '数字', 'シンプル', '全サイズあり', '202111252053484l.png', '202111252053484m.png', '202111252053484s.png', 1000, 1000, 750, 750, 500, 500, 'シンプルな数字の4です。', 0, 0, 0),
(13, 12, '3', '数字の5', '数字', 'シンプル', '全サイズあり', '202111252054165l.png', '202111252054165m.png', '202111252054165s.png', 1000, 1000, 750, 750, 500, 500, 'シンプルな数字の5です。', 0, 0, 0),
(14, 12, '1', 'カードの裏側', NULL, NULL, NULL, '20211125210156トランプA01.png', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'カードの裏側として作成しましたが、背景や小物の模様としても使うことができるかも？', 0, 0, 1),
(15, 6, '1', '背景画像（雷）', '背景画像', NULL, NULL, '20211125210544haikei003.png', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'イラストの背景として使える画像です。', 0, 1, 0),
(16, 6, '1', '背景画像（港風）', '背景画像', NULL, NULL, '20211125210735haikei002.png', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'イラストの背景として使える画像です。', 0, 0, 0),
(17, 6, '1', '背景画像（街）', NULL, NULL, NULL, '20211125211615haikei001.png', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'イラストの背景として使える画像です。', 0, 0, 0),
(18, 6, '1', '犬猫メモ', NULL, NULL, NULL, '20211125212205sozai002+.png', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, '文字を書くスペース付きの犬と猫の画像です。', 0, 1, 0),
(19, 6, '2', '木（アップ）', NULL, NULL, NULL, '2021112521281320180422_130911.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, '木の幹の写真です。質感を出したい時に編集して使ってみてください。', 0, 0, 0),
(20, 6, '2', '冬写真', '背景画像', NULL, NULL, '2021112721392520180422_130946.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, '冬に撮った写真です。絵の参考などにお使いください。', 0, 0, 1),
(21, 6, '1', 'ｓ', NULL, NULL, NULL, '2021113008091900068.png', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'bvん', 0, 0, 0),
(22, 12, '1', '数字の1', NULL, NULL, NULL, '202201050907261s.png', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'yhui', 0, 0, 0),
(23, 12, '1', '数字の1', NULL, NULL, NULL, '202201050913421s.png', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'koju', 0, 0, 0),
(24, 12, '3', '数字の1', NULL, NULL, NULL, '202201061521531s.png', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'ｋｈ、ｌ', 0, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `messagetable`
--

CREATE TABLE `messagetable` (
  `ID` int(8) NOT NULL COMMENT 'ID',
  `userid` int(8) DEFAULT NULL COMMENT 'ユーザーID',
  `receive_user_id` int(8) DEFAULT NULL COMMENT '受信ユーザーID',
  `title` varchar(100) DEFAULT NULL COMMENT 'タイトル',
  `message` varchar(1000) DEFAULT NULL COMMENT 'メッセージ内容',
  `unfinished` int(1) NOT NULL DEFAULT 0 COMMENT '未完成状態',
  `hide` int(1) NOT NULL DEFAULT 0 COMMENT '隠し状態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `messagetable`
--

INSERT INTO `messagetable` (`ID`, `userid`, `receive_user_id`, `title`, `message`, `unfinished`, `hide`) VALUES
(21, 12, 12, 'etr', 'ert', 1, 1),
(22, 12, 12, 'etr', 'ert', 1, 1),
(23, 12, 12, 'etr', 'ert', 1, 1),
(24, 12, 12, 'etr', 'ert', 1, 1),
(25, 12, 6, 'つｙちゅ', 'ちゅｙつｔ', 0, 0),
(26, 12, 6, 'ｒｔｈづ', 'ｒてｙ', 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `requesttable`
--

CREATE TABLE `requesttable` (
  `ID` int(8) NOT NULL COMMENT 'ID',
  `userid` int(8) DEFAULT NULL COMMENT 'ユーザーID',
  `Rtag` varchar(20) DEFAULT NULL COMMENT 'リクエストタグ',
  `title` varchar(100) DEFAULT NULL COMMENT 'タイトル',
  `message` varchar(1000) DEFAULT NULL COMMENT 'メッセージ内容',
  `del_flg` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `requesttable`
--

INSERT INTO `requesttable` (`ID`, `userid`, `Rtag`, `title`, `message`, `del_flg`) VALUES
(2, 6, '#r20211129104351', '星空の画像が必要です！', 'チラシ作成中なのですが、星空の画像が必要です。写真または、イラストで星空の画像をいただきたいです。', 0),
(3, 6, '#r20211129110457', '夏空の写真が欲しい！', '朝、昼、夕方、天気はなんでも大丈夫です。よろしくお願いします！', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `usertable`
--

CREATE TABLE `usertable` (
  `ID` int(8) NOT NULL COMMENT 'ユーザーID',
  `username` varchar(20) DEFAULT NULL COMMENT 'ユーザー名',
  `email` varchar(40) DEFAULT NULL COMMENT 'メールアドレス',
  `password` varchar(255) DEFAULT NULL COMMENT 'パスワード',
  `authority` int(1) NOT NULL DEFAULT 0 COMMENT '権限',
  `del_flg` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `usertable`
--

INSERT INTO `usertable` (`ID`, `username`, `email`, `password`, `authority`, `del_flg`) VALUES
(1, 'admin', 'aaa@aaa.jp', '$2y$10$jRkZNutwaA1d7opsZU1e0.mSrqtehvFQcHCtuQyhZoVw6B8M14eFq', 1, 0),
(6, 'kaki2', 'ccc@ccc.jp', '$2y$10$m8BrepK6saso08Ug0I5dUOr4hj0WpN5QCDebnA9GvMag70AqNDbw2', 0, 0),
(12, 'hu1', 'bbb@bbb.jp', '$2y$10$/ixEE4bxAerJLYKmsp2qBedI5U0QEuy6eZU1qETyRmAqc9M8H6ot6', 0, 0),
(13, 'yui', 'ddd@ddd.jp', '$2y$10$ZJLtkjPupQ3TbJVL.VaNZOOUyA7M.i7Xrx.PbPkIrKfnKZLeVFj7S', 0, 1);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `categorytable`
--
ALTER TABLE `categorytable`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `favoritematerialtable`
--
ALTER TABLE `favoritematerialtable`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `favoriteusertable`
--
ALTER TABLE `favoriteusertable`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `likematerialtable`
--
ALTER TABLE `likematerialtable`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `materialtable`
--
ALTER TABLE `materialtable`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `messagetable`
--
ALTER TABLE `messagetable`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `requesttable`
--
ALTER TABLE `requesttable`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`ID`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `categorytable`
--
ALTER TABLE `categorytable`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `favoritematerialtable`
--
ALTER TABLE `favoritematerialtable`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `favoriteusertable`
--
ALTER TABLE `favoriteusertable`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `likematerialtable`
--
ALTER TABLE `likematerialtable`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=332;

--
-- テーブルの AUTO_INCREMENT `materialtable`
--
ALTER TABLE `materialtable`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT COMMENT '素材ID', AUTO_INCREMENT=25;

--
-- テーブルの AUTO_INCREMENT `messagetable`
--
ALTER TABLE `messagetable`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=27;

--
-- テーブルの AUTO_INCREMENT `requesttable`
--
ALTER TABLE `requesttable`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `usertable`
--
ALTER TABLE `usertable`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ユーザーID', AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
