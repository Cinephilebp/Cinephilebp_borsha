-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 02:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinephile`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `id` int(11) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `poster` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recommendation`
--

INSERT INTO `recommendation` (`id`, `user_id`, `poster`, `name`, `review`, `link`) VALUES
(2, 2, 'friends.jpg', 'Friends', 'People are saying that friends is running out of ideas and that the humour is getting dull. Running out of ideas? possibly.', 'https://www.imdb.com/title/tt0108778/'),
(3, 2, 'death_note.jpg', 'Death Note', 'This show has a great starting foothold. The mixing between mythical fantasy world of god of death and police detective story line is brilliant, just works brilliantly.', 'https://www.imdb.com/title/tt0877057/'),
(4, 2, 'interstellar.jpg', 'Interstellar', 'A science-fiction masterpiece. Nolan executes a marvelous direction that slowly but efficiently puts in place a dark world creating a necessity to save humanity. ', 'https://www.imdb.com/title/tt0816692/?ref_=ext_shr_lnk'),
(6, 0, 'a2.jpg', 'The Godfather', 'There is very little that I can add to the reviews on here, that have explained what is so wonderful about The Godfather so well. I have seen many amazing movies, as well as some clunkers,', 'https://www.imdb.com/title/tt0068646/?ref_=ext_shr_lnk'),
(8, 3, 'as4.jpeg', 'Tiger 3', 'Indian Hindi-language action thriller film directed by Maneesh Sharma, had its moments of excitement and intrigue, but it left me with mixed feelings. Produced by Aditya Chopra under Yash Raj Films, this installment brings back Salman Khan, Katrina Kaif, and introduces Emraan Hashmi to the franchise.', 'https://www.imdb.com/title/tt18411490/?ref_=chtbo_t_8');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `movie_name` varchar(500) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `review_of` varchar(500) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `movie_name`, `review`, `review_of`, `link`, `image`) VALUES
(14, 0, 'The Killer', 'A man solitary and cold, methodical and unencumbered by scruples or regrets, the killer waits in the shadows, watching for his next target. And yet the longer he waits, the more he thinks he\'s losing his mind, if not his cool.', 'movie', 'https://www.imdb.com/title/tt1136617/?ref_=hm_tpks_tt_i_1_pd_tp1_pbr_ic', 'killer.jpg'),
(15, 0, 'The Pianist', 'In this adaptation of the autobiography \"The Pianist: The Extraordinary True Story of One Man\'s Survival in Warsaw, 1939-1945,\" Wladyslaw Szpilman, a Polish Jewish radio station pianist, sees Warsaw change gradually as World War II begins. ', 'movie', 'https://www.imdb.com/title/tt0253474/?ref_=chttp_t_33', 'pianist.jpg'),
(16, 0, 'Parasite', 'The Kims - mother and father Chung-sook and Ki-taek, and their young adult offspring, son Ki-woo and daughter Ki-jung - are a poor family living in a shabby and cramped half basement apartment in a busy lower working class commercial district of Seoul.', 'movie', 'https://www.imdb.com/title/tt6751668/?ref_=chttp_t_35', 'parasite.jpeg'),
(17, 0, 'Gladiator', 'Gladiator is the best bread and circus. A moving and very entertaining action epic with Russel Crowe and Joaquin Phoenix at the top of their game.', 'movie', 'https://www.imdb.com/title/tt0172495/?ref_=chttp_t_36', 'gladiotor.jpg'),
(18, 0, 'The Lion King', 'The best Disney animated film ever...This film had it all, it was funny, emotional, had family drama, and above all, great animation and songs! My personal favorite character is Rafiki, the Baboon! I still cant forget the line he says to Simbe, ', 'movie', 'https://www.imdb.com/title/tt0110357/?ref_=chttp_t_37', 'lion_king.jpg'),
(19, 0, 'Breaking Bad', 'I wanna delete my brain and watch it again like I never knew it.', 'series', 'https://www.imdb.com/title/tt0903747/?ref_=ttls_li_tt', 'breaking_bad.jpeg'),
(20, 0, 'Game of Thrones', 'Let\'s say you\'re reading these reviews and haven\'t watched GoT yet, but now that it\'s finished are considering the marathon. What\'s the consensus? In this case, the consensus is accurate, and that is:', 'series', 'https://www.imdb.com/title/tt0944947/?ref_=ttls_li_tt', 'got.jpg'),
(21, 0, 'Mirzapur', 'Watch it if you\'re interested in knowing the inner workings of eastern UP\'s socio-economic and political structure.', 'series', 'https://www.imdb.com/title/tt6473300/?ref_=ttls_li_tt', 'mirzapur.jpg'),
(22, 0, 'Squid Game', 'After hearing about all the hype and seeing it was one of the most watched series in the entire world I finally found time to watch Squid Game. ', 'kdrama', 'https://www.imdb.com/title/tt10919420/?ref_=sr_t_1', 'sq.jpeg'),
(23, 0, 'Daily Dose of Sunshine', 'Oh, what a wonderful and relevant theme for a series! In times of constant instability in the world and in individual lives, this is exactly what is needed.', 'kdrama', 'https://www.imdb.com/title/tt26258202/?ref_=sr_t_2', 'daq.jpg'),
(24, 0, 'The Boondocks', 'This is Adult Swim\'s most socially conscious and possibly most clever show. It\'s loaded with parallels to real world events', 'kdrama', 'https://www.imdb.com/title/tt0373732/?ref_=sr_t_10', 'bo.jpg'),
(25, 0, 'All of Us Are Dead', 'There is a lot to say about this zombie teenage drama.\r\n\r\nThe zombie portion is done very well, the only reason I bumped it up to 7 stars instead of 6 is how all of the constituent parts come together to create something greater than the sum of its parts, but this series is not without its flaws.', 'kdrama', 'https://www.imdb.com/title/tt14169960/?ref_=sr_t_11', 'All_of_Us_Are_Dead.jpeg'),
(26, 0, 'One Punch Man', 'I am truly tempted to give One punch man a 10 but in my opinion there is no perfection. There is near perfection and one punch man is that.', 'anime', 'https://www.imdb.com/title/tt4508902/?ref_=ttls_li_tt', 'op.jpg'),
(27, 0, 'Monster', 'A dark, suspenseful and extremely entertaining anime that boldly answers back to the skeptics who think that all anime must be as brain-dead and ch', 'anime', 'https://www.imdb.com/title/tt0434706/?ref_=ttls_li_tt', 'monster.jpg'),
(28, 0, 'Berserk', 'The plot of Berserk is purely the stuff of pulp fiction novel series: a young man with a talent for killing falls in with a group of super-mercenaries, and with them, grows into the most lethal warrior of his time. However, it\'s done as well as it can be here.\r\n', 'anime', 'https://www.imdb.com/title/tt0318871/?ref_=ttls_li_tt', 'ber.jpg'),
(29, 0, 'Five Nights at Freddy\'s', 'So, I know it must be extremely difficult to take a simple gaming concept like Five Nights at Freddy\'s and stretch that idea out into a full blown movie. I totally understand that artistic hardship, but...The script missed the mark folks.', 'other', 'https://www.imdb.com/title/tt4589218/?ref_=chtmvm_t_2', 'five.jpeg'),
(30, 0, 'The Hunger Games', 'There was a great deal of hype and fuss when The Hunger Games came out as a film and perhaps I should have known I was not target audience because up till then I had never heard of the book series (or indeed that a film was being m', 'other', 'https://www.imdb.com/title/tt1392170/?ref_=chtmvm_t_50', 'hun.jpg'),
(31, 0, 'The Last Rifleman', 'I found the film to be a moving and well-acted drama that explores important themes of memory, loss, and friendship. Pierce Brosnan delivers a compelling performance as Artie Crawford, a World War II veteran who embarks on a journey to France to pay his respects to his best friend.', 'other', 'https://www.imdb.com/title/tt12404266/?ref_=chtmvm_t_62', 'rifle.jpeg'),
(47, 3, 'Tiger 3', 'link', 'movie', 'new moview ', 'as4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `top_rated_tbl`
--

CREATE TABLE `top_rated_tbl` (
  `id` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `top_rated_tbl`
--

INSERT INTO `top_rated_tbl` (`id`, `image`, `name`, `link`) VALUES
(2, 'a1.jpg', 'The Shawshank Redemption', 'https://www.imdb.com/title/tt0111161/?ref_=ext_shr_lnk'),
(3, 'a2.jpg', 'The Godfather', 'https://www.imdb.com/title/tt0068646/?ref_=ext_shr_lnk'),
(4, 'a3.jpg', 'Taxi Driver', 'https://www.imdb.com/title/tt0075314/?ref_=ext_shr_lnk'),
(7, 'MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_QL75_UX380_CR0,0,380,562_.jpg', 'The Dark Knight', 'https://www.imdb.com/title/tt0468569/?ref_=hm_tpks_tt_i_2_pd_tp1_pbr_ic'),
(8, 'MV5BODQ0OWJiMzktYjNlYi00MzcwLThlZWMtMzRkYTY4ZDgxNzgxXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_QL75_UX380_CR0,4,380,562_.jpg', 'Fight Club', 'https://www.imdb.com/title/tt0137523/?ref_=tt_mv_close'),
(9, 'MV5BNWIwODRlZTUtY2U3ZS00Yzg1LWJhNzYtMmZiYmEyNmU1NjMzXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_QL75_UY562_CR4,0,380,562_.jpg', 'Forrest Gump', 'https://www.imdb.com/title/tt0109830/?ref_=hm_tpks_tt_i_5_pd_tp1_pbr_ic'),
(10, 'MV5BYTU3NWI5OGMtZmZhNy00MjVmLTk1YzAtZjA3ZDA3NzcyNDUxXkEyXkFqcGdeQXVyODY5Njk4Njc@._V1_QL75_UX380_CR0,0,380,562_.jpg', 'Breaking Bad', 'https://www.imdb.com/title/tt0903747/?ref_=hm_tpks_tt_i_12_pd_tp1_pbr_ic'),
(11, 'MV5BMjIxMjgxNTk0MF5BMl5BanBnXkFtZTgwNjIyOTg2MDE@._V1_QL75_UX380_CR0,0,380,562_.jpg', 'The Wolf of Wall Street', 'https://www.imdb.com/title/tt0993846/?ref_=hm_tpks_tt_i_16_pd_tp1_pbr_ic'),
(12, 'a.jpg', 'Joker', 'https://www.imdb.com/title/tt7286456/?ref_=hm_tpks_tt_i_17_pd_tp1_pbr_ic'),
(13, 'MV5BYTY0YTgwZjUtYzJiNy00ZDQ2LWFlZmItZThhMjExMjI5YWQ2XkEyXkFqcGdeQXVyMTM1NjM2ODg1._V1_QL75_UX380_CR0,0,380,562_.jpg', 'Loki', 'https://www.imdb.com/title/tt9140554/?ref_=hm_top_tt_i_4'),
(14, 'MV5BNjQwOGM2YTItMGYwNC00YTM4LWI0Y2QtZjQ2ZDcyMmRjMTFhXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_QL75_UX380_CR0,4,380,562_.jpg', 'Killers of the Flower Moon', 'https://www.imdb.com/title/tt5537002/?ref_=hm_top_tt_i_9'),
(15, 'MV5BMDBmYTZjNjUtN2M1MS00MTQ2LTk2ODgtNzc2M2QyZGE5NTVjXkEyXkFqcGdeQXVyNzAwMjU2MTY@._V1_QL75_UX380_CR0,0,380,562_.jpg', 'Oppenheimer', 'https://www.imdb.com/title/tt15398776/?ref_=hm_fanfav_tt_i_3_pd_fp1_r'),
(16, 'as3.jpg', 'The Holdovers', 'https://www.imdb.com/title/tt14849194/?ref_=chtbo_t_6');

-- --------------------------------------------------------

--
-- Table structure for table `trending_tbl`
--

CREATE TABLE `trending_tbl` (
  `id` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trending_tbl`
--

INSERT INTO `trending_tbl` (`id`, `image`, `name`, `link`) VALUES
(4, 'a4.jpg', 'Pirates of the Caribbean', 'https://www.imdb.com/title/tt0325980/?ref_=ext_shr_lnk'),
(5, 'a5.png', 'On My Block', 'https://www.imdb.com/title/tt7879820/?ref_=ext_shr_lnk'),
(6, 'a6.jpg', 'One Piece Live Action', 'https://www.imdb.com/title/tt11737520/?ref_=ext_shr_lnk'),
(7, 'a7.jpg', 'Naruto', 'https://www.imdb.com/title/tt0409591/?ref_=ext_shr_lnk'),
(8, 'a8.jpg', 'Little Women', 'https://www.imdb.com/title/tt21828868/?ref_=ext_shr_lnk'),
(10, 'MV5BMzI0NmVkMjEtYmY4MS00ZDMxLTlkZmEtMzU4MDQxYTMzMjU2XkEyXkFqcGdeQXVyMzQ0MzA0NTM@._V1_QL75_UX380_CR0,1,380,562_.jpg', 'Across the Spider-Verse', 'https://www.imdb.com/title/tt9362722/?ref_=chtmvm_i_15'),
(11, 'MV5BOWI5NmU3NTUtOTZiMS00YzA1LThlYTktNDJjYTU5NDFiMDUxXkEyXkFqcGdeQXVyMTUzNjEwNjM2._V1_QL75_UY562_CR35,0,380,562_.jpg', 'Jawan', 'https://www.imdb.com/title/tt15354916/?ref_=chtmvm_i_17'),
(12, 'MV5BZWIzNDAxMTktMDMzZS00ZjJmLTlhNjYtOGUxYmZlYzVmOGE4XkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_QL75_UX380_CR0,0,380,562_.jpg', 'Napoleon', 'https://www.imdb.com/title/tt13287846/?ref_=chtmvm_i_18'),
(13, 'MV5BZGYxYTVmMGItODQ4YS00NDZmLTg3ZjUtNjZiMzhlM2NmZjhhXkEyXkFqcGdeQXVyOTQ5Nzg2MTU@._V1_QL75_UY562_CR0,0,380,562_.jpg', 'Old Dads', 'https://www.imdb.com/title/tt18394190/?ref_=chtmvm_i_20'),
(14, 'MV5BM2ZjZWUyMDUtNDNjMS00YzMzLWJiNjMtMDZhMzRiNmJjOTQ1XkEyXkFqcGdeQXVyMTAyMjQ3NzQ1._V1_QL75_UX380_CR0,4,380,562_.jpg', 'Fingernails', 'https://www.imdb.com/title/tt13968674/?ref_=chtmvm_i_22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'user1', 'user1'),
(4, 'testuser', 'testuser');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_rated_tbl`
--
ALTER TABLE `top_rated_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trending_tbl`
--
ALTER TABLE `trending_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `top_rated_tbl`
--
ALTER TABLE `top_rated_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `trending_tbl`
--
ALTER TABLE `trending_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
