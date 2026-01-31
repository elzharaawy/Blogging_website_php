-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2026 at 03:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(2, 'Uncategorized', 'This is uncategorised section'),
(7, 'Gaming', 'this is gaming category'),
(8, 'Movies', 'Movies category'),
(9, 'Science &amp; Technology', 'This is Science &amp; Technology category'),
(10, 'Travel', 'this is travel category'),
(13, 'Music', 'Here is a music category');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `body` text NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `email`, `body`, `approved`, `date_time`) VALUES
(1, 31, 'sdasd', 'elzharaawy@gmail.com', 'saas', 1, '2026-01-31 17:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `meta_title`, `meta_description`, `meta_keywords`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`, `slug`) VALUES
(31, 'https://t.me/Quruxdaislaamka', 'just 10 minutes a day. No pressure to finish a chapter. No guilt if you miss a day. Just show up.  Choose books that genuinely interest y', 'asdASD', 'ASDsdsd ', '&lt;p data-start=&quot;191&quot; data-end=&quot;310&quot;&gt;Most people &lt;em data-start=&quot;203&quot; data-end=&quot;209&quot;&gt;want&lt;/em&gt; to read more, but struggle to stay consistent. The secret isn&rsquo;t motivation &mdash; it&rsquo;s &lt;strong data-start=&quot;292&quot; data-end=&quot;309&quot;&gt;small systems&lt;/strong&gt;.&lt;/p&gt;&lt;p data-start=&quot;312&quot; data-end=&quot;424&quot;&gt;Start with just &lt;strong data-start=&quot;328&quot; data-end=&quot;348&quot;&gt;10 minutes a day&lt;/strong&gt;. No pressure to finish a chapter. No guilt if you miss a day. Just show up.&lt;/p&gt;&lt;p data-start=&quot;426&quot; data-end=&quot;561&quot;&gt;Choose books that genuinely interest you, not what you think you &lt;em data-start=&quot;491&quot; data-end=&quot;499&quot;&gt;should&lt;/em&gt; read. Fiction, science, history, self-growth &mdash; it all counts.&lt;/p&gt;&lt;p data-start=&quot;563&quot; data-end=&quot;674&quot;&gt;Over time, those 10 minutes grow naturally. Reading becomes part of who you are, not a task on your to-do list.&lt;/p&gt;&lt;p&gt;\r\n\r\n\r\n\r\n&lt;/p&gt;&lt;p data-start=&quot;676&quot; data-end=&quot;723&quot;&gt;📖 One page today is better than zero tomorrow.&lt;span style=&quot;font-size: 0.9rem;&quot;&gt;Most people &lt;/span&gt;&lt;em data-start=&quot;203&quot; data-end=&quot;209&quot; style=&quot;font-size: 0.9rem;&quot;&gt;want&lt;/em&gt;&lt;span style=&quot;font-size: 0.9rem;&quot;&gt; to read more, but struggle to stay consistent. The secret isn&rsquo;t motivation &mdash; it&rsquo;s &lt;/span&gt;&lt;strong data-start=&quot;292&quot; data-end=&quot;309&quot; style=&quot;font-size: 0.9rem;&quot;&gt;small systems&lt;/strong&gt;&lt;span style=&quot;font-size: 0.9rem;&quot;&gt;.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p data-start=&quot;312&quot; data-end=&quot;424&quot;&gt;Start with just &lt;strong data-start=&quot;328&quot; data-end=&quot;348&quot;&gt;10 minutes a day&lt;/strong&gt;. No pressure to finish a chapter. No guilt if you miss a day. Just show up.&lt;/p&gt;\r\n&lt;p data-start=&quot;426&quot; data-end=&quot;561&quot;&gt;Choose books that genuinely interest you, not what you think you &lt;em data-start=&quot;491&quot; data-end=&quot;499&quot;&gt;should&lt;/em&gt; read. Fiction, science, history, self-growth &mdash; it all counts.&lt;/p&gt;\r\n&lt;p data-start=&quot;563&quot; data-end=&quot;674&quot;&gt;Over time, those 10 minutes grow naturally. Reading becomes part of who you are, not a task on your to-do list.&lt;/p&gt;\r\n&lt;p data-start=&quot;676&quot; data-end=&quot;723&quot;&gt;📖 One page today is better than zero tomorrow.&lt;span style=&quot;font-size: 0.9rem;&quot;&gt;Most people &lt;/span&gt;&lt;em data-start=&quot;203&quot; data-end=&quot;209&quot; style=&quot;font-size: 0.9rem;&quot;&gt;want&lt;/em&gt;&lt;span style=&quot;font-size: 0.9rem;&quot;&gt; to read more, but struggle to stay consistent. The secret isn&rsquo;t motivation &mdash; it&rsquo;s &lt;/span&gt;&lt;strong data-start=&quot;292&quot; data-end=&quot;309&quot; style=&quot;font-size: 0.9rem;&quot;&gt;small systems&lt;/strong&gt;&lt;span style=&quot;font-size: 0.9rem;&quot;&gt;.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p data-start=&quot;312&quot; data-end=&quot;424&quot;&gt;Start with just &lt;strong data-start=&quot;328&quot; data-end=&quot;348&quot;&gt;10 minutes a day&lt;/strong&gt;. No pressure to finish a chapter. No guilt if you miss a day. Just show up.&lt;/p&gt;\r\n&lt;p data-start=&quot;426&quot; data-end=&quot;561&quot;&gt;Choose books that genuinely interest you, not what you think you &lt;em data-start=&quot;491&quot; data-end=&quot;499&quot;&gt;should&lt;/em&gt; read. Fiction, science, history, self-growth &mdash; it all counts.&lt;/p&gt;\r\n&lt;p data-start=&quot;563&quot; data-end=&quot;674&quot;&gt;Over time, those 10 minutes grow naturally. Reading becomes part of who you are, not a task on your to-do list.&lt;/p&gt;\r\n&lt;p data-start=&quot;676&quot; data-end=&quot;723&quot;&gt;📖 One page today is better than zero tomorrow.&lt;/p&gt;', '1769859093web-development1.png', '2026-01-31 11:31:33', 7, 14, 0, 'https://t.me/Quruxdaislaamka');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(14, 'Abdirahman', 'Mohamed', 'elzharaawy1', 'elzharaawy@gmail.com', '$2y$10$UHcXs5dVroEjqbt0Ev3TnuF6sb/ujXaQs447WsXLMQt0d7nPL04VC', '1769855278linkden profile.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
