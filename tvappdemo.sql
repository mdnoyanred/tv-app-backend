-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07.08.2021 klo 12:26
-- Palvelimen versio: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+02:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_27425663_tvapp`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `categories`
--

INSERT INTO `categories` (`id`, `name`, `image_url`) VALUES
(1, 'Viihde', 'https://images.unsplash.com/photo-1598899134739-24c46f58b8c0?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=738&q=80'),
(2, 'Urheilu', 'https://timesofindia.indiatimes.com/thumb/msid-71008133,width-1200,height-900,resizemode-4/.jpg'),
(3, 'Uutiset', 'https://s.france24.com/media/display/d1676b6c-0770-11e9-8595-005056a964fe/w:1400/p:16x9/news_1920x1080.webp');

-- --------------------------------------------------------

--
-- Rakenne taululle `channels`
--

CREATE TABLE `channels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `live_url` varchar(1000) NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `channels`
--

INSERT INTO `channels` (`id`, `name`, `description`, `live_url`, `thumbnail`, `facebook`, `twitter`, `youtube`, `website`, `category`) VALUES
(1, 'Yle TV1', 'Yle TV1 on Yleisradio Oy:n omistama julkisen palvelun TV-kanava, jossa ei esitetä mainoksia. Sitä jaellaan antenniverkossa kanavapaikalla 1.', 'https://yletv-lh.akamaihd.net/i/yletv1hls_1@103188/index_4096_av-b.m3u8?sd=10&rebase=on', 'https://images.cdn.yle.fi/image/upload/f_auto,fl_lossy,q_auto,dpr_1,w_720,c_fill,ar_16:9/yle-tv1.jpg', 'https://areena.yle.fi/tv/suorat', 'https://areena.yle.fi/tv/suorat', 'https://areena.yle.fi/tv/suorat', 'https://areena.yle.fi/tv/suorat', 'Uutiset'),
(2, 'Yle TV2', '\"Yle TV2 (puhekielessä Kakkonen) on yksi Yleisradio Oy:n omistamista neljästä televisiokanavasta. Yle TV1:n tavoin TV2 on julkisen palvelun kanava, jolla ei esitetä mainoksia. Rahoitus tapahtuu verovaroin.\" - Lähde: Wikipedia', 'https://yletv-lh.akamaihd.net/i/yletv2hls_1@103189/index_4096_av-b.m3u8?sd=10&rebase=on', 'https://images.cdn.yle.fi/image/upload/f_auto,fl_lossy,q_auto,dpr_1,w_720,c_fill,ar_16:9/yle-tv2.jpg', 'https://areena.yle.fi/tv/suorat', 'https://areena.yle.fi/tv/suorat', 'https://areena.yle.fi/tv/suorat', 'https://areena.yle.fi/tv/suorat', 'Viihde'),
(3, 'Yle Teema & Fem', ' \"Yle Teema & Fem on Yleisradion kanavapaikka televisiossa. Se aloitti 24. huhtikuuta 2017, jolloin Yle Fem- ja Yle Teema -kanavat muuttivat samalle kanavapaikalle viisi.\" - Lähde: Wikipedia', 'https://yletv-lh.akamaihd.net/i/yleteemafemfi_1@490775/index_4096_av-b.m3u8?sd=10&rebase=on', 'https://images.cdn.yle.fi/image/upload/f_auto,fl_lossy,q_auto,dpr_1,w_960,c_fill,ar_16:9/yle-teema-fem.jpg', 'https://areena.yle.fi/tv/suorat', 'https://areena.yle.fi/tv/suorat', 'https://areena.yle.fi/tv/suorat', 'https://areena.yle.fi/tv/suorat', 'Viihde'),
(4, 'CNN ', 'The Cable News Network is a multinational news-based pay television channel headquartered in Atlanta, United States. It is owned by CNN Worldwide, a unit of the WarnerMedia News & Sports division of AT&T\'s WarnerMedia.', 'https://turnerlive.warnermediacdn.com/hls/live/586495/cnngo/cnn_slate/VIDEO_0_3564000.m3u8', 'https://cdn.cnn.com/cnn/.e/img/3.0/global/misc/cnn-logo.png', 'https://facebook.com/CNN', 'https://twitter.com/CNN', 'https://youtube.com/CNN', 'https://cnn.com', 'Uutiset'),
(5, 'CBS NEWS', 'CBS News is the news division of the American television and radio service CBS. CBS News television programs include the CBS Evening News, CBS This Morning, news magazine programs CBS News Sunday Morning, 60 Minutes, and 48 Hours, and Sunday morning polit', 'https://cbsnewshd-lh.akamaihd.net/i/CBSNHD_7@199302/master.m3u8', 'https://cbsnews3.cbsistatic.com/hub/i/r/2019/04/01/727e357a-a126-4138-a2c5-4d3222669d57/thumbnail/1920x1080/6cf41fcba0c5e4418c548fd8f270265d/cbsn2-logo-1920x1080.jpg', 'https://www.facebook.com/CBSNews/', 'https://twitter.com/CBSNews', 'https://www.youtube.com/channel/UC8p1vwvWtl6T73JiExfWs1g', 'https://www.cbs.com/', 'Uutiset'),
(6, 'FOX SPORTS', 'Fox Sports is the brand name for a number of sports channels, broadcast divisions, programming, and other media around the world. The name originates from the Fox Broadcasting Company in the United States, which in turn derives its name from Fox Film, nam', 'https://austchannel-live.akamaized.net/hls/live/2002736/austchannel-sport/master1280x720_v3.m3u8', 'https://b.fssta.com/uploads/application/fscom/SiteShareImage.vresize.1200.630.high.0.png', 'https://www.foxsports.com/', 'https://www.foxsports.com/', 'https://www.foxsports.com/', 'https://www.foxsports.com/', 'Urheilu'),
(7, 'BEIN SPORTS EXTRA', 'eIN Sports is a global network of sports channels owned and operated by the Qatari media group beIN. It has played a major role in the increased commercialization of Qatari sports. Its chairman is Nasser Al-Khelaifi, and its CEO is Yousef Obaidly.', 'https://siloh-ns1.plutotv.net/lilo/production/bein/master.m3u8', 'https://image.xumo.com/v1/channels/channel/9999387/800x800.png?type=smartCast_channelTile', 'https://www.beinsportsxtra.com/', 'https://www.beinsportsxtra.com/', 'https://www.beinsportsxtra.com/', 'https://www.beinsportsxtra.com/', 'Urheilu'),
(8, 'Whistle Sports', ' Whistle, formerly Whistle Sports, is a sports broadcaster. Since its launch in 2014, Whistle Sports has raised more than $56 million in funding to date. It raised $8 million in 2014, mostly from Sky Broadcasting, $28 million in a second-round in 2015, an', 'https://whistle-1.samsung.wurl.com/manifest/playlist.m3u8', 'https://frontofficesports.com/wp-content/uploads/2018/12/whistle-sports1.png', 'https://frontofficesports.com', 'https://frontofficesports.com', 'https://frontofficesports.com', 'https://frontofficesports.com', 'Urheilu'),
(9, 'MTV', '  MTV is an American cable channel that launched on August 1, 1981. Based in New York City, it serves as the flagship property of the MTV Entertainment Group, part of ViacomCBS Domestic Media Networks, a division of ViacomCBS. Prior to launch, the network', 'https://pluto-live.plutotv.net/egress/chandler/pluto01/live/VIACBS02/master_2400.m3u8', 'https://mtv-intl.mtvnimages.com/', 'https://facebook.com/MTV', 'https://twitter.com/MTV', 'https://www.youtube.com/user/MTV', 'https://www.ctv.ca/mtv', 'Viihde');

-- --------------------------------------------------------

--
-- Rakenne taululle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `api_key` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `users`
--

INSERT INTO `users` (`id`, `email`, `full_name`, `password`, `api_key`, `username`) VALUES
(1, 'juiceneblueyt@gmail.com', 'Jesse Keskelä', '$2y$12$5XvO/wJu7JI6EVfBIriEQuVc7QbAYbanNt7ZjnybHqkYhmD8o8MNC', '1A4mgi2rBHCJdqggsYVx', 'jessetheadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
