-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2024 pada 08.42
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalsss`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `phone`, `address`, `password`, `status`) VALUES
(1, 'Administrator', 'admin@admin.com', '09016101298', 'Udemy Address', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(2, 'Administrator', 'admin@admin.com', '23', 'Address here', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `appointment_code` varchar(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `diagnose` longtext NOT NULL,
  `date_created` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `appointment_code`, `patient_name`, `diagnose`, `date_created`, `status`) VALUES
(2, 'RCM7OPRPNX', '5', '&lt;p&gt;Fever and Flu&lt;/p&gt;', 1583776800, 1),
(3, 'IFEYXMH74W', 'sehun', '&lt;p&gt;kojqopwkd&lt;/p&gt;', 1711562400, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('8ptd8irmk9dggr53g1vmrse72c288f5b', '::1', 1712817779, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731323831373535343b6c6f67696e5f747970657c733a373a2270617469656e74223b70617469656e745f6c6f67696e7c733a313a2231223b70617469656e745f69647c733a313a2236223b6c6f67696e5f757365725f69647c733a313a2236223b6e616d657c733a363a226f6d206a756e223b666c6173685f6d6573736167657c733a32353a226f6d206a756e205375636365737366756c6c79204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('h60ogsqqhl1rkv9hplm3v5ngfp63m8mr', '::1', 1712814419, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731323831343331363b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2232223b6c6f67696e5f757365725f69647c733a313a2232223b6e616d657c733a31333a2241646d696e6973747261746f72223b666c6173685f6d6573736167657c733a33323a2241646d696e6973747261746f72205375636365737366756c6c79204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('tm1a3isq82ueo9obb87vmn3ensilalh7', '::1', 1712817534, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` int(11) NOT NULL,
  `place_of_birth` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_card` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mother_tongue` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qualification` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nationality` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `biography` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `facebook` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `twitter` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `google_plus` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `name`, `date_of_birth`, `place_of_birth`, `id_card`, `gender`, `mother_tongue`, `marital_status`, `religion`, `blood_group`, `city`, `email`, `password`, `address`, `state`, `qualification`, `nationality`, `biography`, `file_name`, `phone`, `mobile_no`, `facebook`, `twitter`, `google_plus`, `linkedin`) VALUES
(14, 'Brown Doctor', 1577210400, 'Lagos', 'International passport', 'Male', 'English', 'Single', 'Christianity', 'B+', 'City', 'doctor@doctor.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'This is the doctor address', 'Lagos', 'PhD', 'Nigerian', '&lt;div id=&quot;collapseExample&quot; class=&quot;m-t-15 collapse show&quot;&gt;\r\n&lt;div class=&quot;well&quot;&gt;\r\n&lt;p class=&quot;m-t-30&quot;&gt;&lt;strong&gt;MY PROFILE&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p class=&quot;m-t-30&quot;&gt;Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.&lt;/p&gt;\r\n&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries&lt;/p&gt;\r\n&lt;p&gt;It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n&lt;h4 class=&quot;m-t-30&quot;&gt;Education&lt;/h4&gt;\r\n&lt;hr /&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;M.B.B.S from AIIMS&lt;/li&gt;\r\n&lt;li&gt;M.B.B.S from AIIMS&lt;/li&gt;\r\n&lt;li&gt;M.D from AIIMS&lt;/li&gt;\r\n&lt;li&gt;D.N.B AIIMS&lt;/li&gt;\r\n&lt;li&gt;M.S from AIIMS&lt;/li&gt;\r\n&lt;li&gt;D.N.B from AIIMS&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h4 class=&quot;m-t-30&quot;&gt;Experience&lt;/h4&gt;\r\n&lt;hr /&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;Excepteur sint occaecat cupidatat non proident.&lt;/li&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;Excepteur sint occaecat cupidatat non proident.&lt;/li&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;Excepteur sint occaecat cupidatat non proident.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h4 class=&quot;m-t-30&quot;&gt;Accomplishments&lt;/h4&gt;\r\n&lt;hr /&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;Excepteur sint occaecat cupidatat non proident.&lt;/li&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;Excepteur sint occaecat cupidatat non proident.&lt;/li&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;Excepteur sint occaecat cupidatat non proident.&lt;/li&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h4 class=&quot;m-t-30&quot;&gt;Skill Set&lt;/h4&gt;\r\n&lt;hr /&gt;\r\n&lt;h5&gt;Wordpress &lt;span class=&quot;pull-right&quot;&gt;80%&lt;/span&gt;&lt;/h5&gt;\r\n&lt;h5&gt;HTML 5 &lt;span class=&quot;pull-right&quot;&gt;90%&lt;/span&gt;&lt;/h5&gt;\r\n&lt;h5&gt;jQuery &lt;span class=&quot;pull-right&quot;&gt;50%&lt;/span&gt;&lt;/h5&gt;\r\n&lt;h5&gt;Photoshop &lt;span class=&quot;pull-right&quot;&gt;70%&lt;/span&gt;&lt;/h5&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', 'invoice.docx', '+2348161662924', '+2348161662924', 'facebook', 'twitter', 'googleplus', 'linkedin'),
(15, 'Dr. Morris Whyte', 1583690400, 'Japan', 'International passport', 'Female', 'English', 'Single', 'Chritianity', 'B+', 'North Toronto', 'doc@doc.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'JL Babi Guling', 'Toronto', 'PhD', 'Canadian', '&lt;div id=&quot;collapseExample&quot; class=&quot;m-t-15 collapse show&quot;&gt;\r\n&lt;div class=&quot;well&quot;&gt;\r\n&lt;p class=&quot;m-t-30&quot;&gt;&lt;strong&gt;MY PROFILE&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p class=&quot;m-t-30&quot;&gt;Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.&lt;/p&gt;\r\n&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries&lt;/p&gt;\r\n&lt;p&gt;It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n&lt;h4 class=&quot;m-t-30&quot;&gt;Education&lt;/h4&gt;\r\n&lt;hr /&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;M.B.B.S from AIIMS&lt;/li&gt;\r\n&lt;li&gt;M.B.B.S from AIIMS&lt;/li&gt;\r\n&lt;li&gt;M.D from AIIMS&lt;/li&gt;\r\n&lt;li&gt;D.N.B AIIMS&lt;/li&gt;\r\n&lt;li&gt;M.S from AIIMS&lt;/li&gt;\r\n&lt;li&gt;D.N.B from AIIMS&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h4 class=&quot;m-t-30&quot;&gt;Experience&lt;/h4&gt;\r\n&lt;hr /&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;Excepteur sint occaecat cupidatat non proident.&lt;/li&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;Excepteur sint occaecat cupidatat non proident.&lt;/li&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;Excepteur sint occaecat cupidatat non proident.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h4 class=&quot;m-t-30&quot;&gt;Accomplishments&lt;/h4&gt;\r\n&lt;hr /&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;Excepteur sint occaecat cupidatat non proident.&lt;/li&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;Excepteur sint occaecat cupidatat non proident.&lt;/li&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;Excepteur sint occaecat cupidatat non proident.&lt;/li&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h4 class=&quot;m-t-30&quot;&gt;Skill Set&lt;/h4&gt;\r\n&lt;hr /&gt;\r\n&lt;h5&gt;Wordpress &lt;span class=&quot;pull-right&quot;&gt;80%&lt;/span&gt;&lt;/h5&gt;\r\n&lt;h5&gt;HTML 5 &lt;span class=&quot;pull-right&quot;&gt;90%&lt;/span&gt;&lt;/h5&gt;\r\n&lt;h5&gt;jQuery &lt;span class=&quot;pull-right&quot;&gt;50%&lt;/span&gt;&lt;/h5&gt;\r\n&lt;h5&gt;Photoshop &lt;span class=&quot;pull-right&quot;&gt;70%&lt;/span&gt;&lt;/h5&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '', '00000001', '+2348161662924', 'facebook', 'twitter', 'googleplus', 'linkedin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `expense_category`
--

CREATE TABLE `expense_category` (
  `expense_category_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `expense_category`
--

INSERT INTO `expense_category` (`expense_category_id`, `name`) VALUES
(1, 'Bed Purchase'),
(3, 'Drug Purchase');

-- --------------------------------------------------------

--
-- Struktur dari tabel `general_message`
--

CREATE TABLE `general_message` (
  `general_message_id` int(11) NOT NULL,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `invoice_entries` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_created` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `due_date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `vat_percentage` int(11) NOT NULL,
  `discount` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_number`, `title`, `department_id`, `patient_id`, `invoice_entries`, `date_created`, `due_date`, `status`, `vat_percentage`, `discount`) VALUES
(1, 'DTD998USNE', 'Patient Payment', 1, 5, '[{\"title\":\"Drugs\",\"amount\":\"100\"},{\"title\":\"Food\",\"amount\":\"200\"},{\"title\":\"Bed Usage\",\"amount\":\"6000\"}]', '1586541600', '1586714400', 1, 2, '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `language`
--

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `arabic` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `french` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `arabic`, `french`) VALUES
(1, 'dashboard', NULL, 'ÙŠØ´Ø³Ø§Ù„Ø§Ø®Ø´Ù‚ÙŠ', NULL),
(2, 'Manage Department', NULL, 'Ø©Ø´Ù‰Ø´Ù„Ø« ÙŠØ«Ø­Ø´Ù‚ÙØ©Ø«Ù‰Ù', NULL),
(3, 'Human Resources', NULL, 'Ø£Ø¹Ø©Ø´Ù‰ ÙŒØ«Ø³Ø®Ø¹Ù‚Ø¤Ø«Ø³', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `med_category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `company` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_added` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `name`, `med_category_id`, `price`, `quantity`, `company`, `status`, `description`, `date_added`) VALUES
(2, 'Lumathem', 1, 500, 1000, 'Udemy Sheg', 1, 'For treating malaria', 1586800800),
(3, 'juna', 3, 5000, 56, 'PT Angin Puting Beliung', 1, 'Untuk anak usia 1-100 Tahun', 1711562400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `med_category`
--

CREATE TABLE `med_category` (
  `med_category_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `med_category`
--

INSERT INTO `med_category` (`med_category_id`, `name`, `description`) VALUES
(1, 'Malaria Drug', 'Malaria Drug'),
(2, 'Pain Killer', 'Pain Killer'),
(3, 'Paracetamol', 'obat panas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `noticeboard`
--

CREATE TABLE `noticeboard` (
  `noticeboard_id` int(11) NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `noticeboard`
--

INSERT INTO `noticeboard` (`noticeboard_id`, `title`, `start_date`, `end_date`, `description`, `location`) VALUES
(1, 'Annual Meeting', 1586714400, 1586973600, 'There is going to be General Annual Meeting next week', 'Ontario');

-- --------------------------------------------------------

--
-- Struktur dari tabel `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `pid` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `idcard` longtext COLLATE utf8_unicode_ci NOT NULL,
  `issue_at` longtext COLLATE utf8_unicode_ci NOT NULL,
  `issue_on` longtext COLLATE utf8_unicode_ci NOT NULL,
  `occupation` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mother_tongue` longtext COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `city` longtext COLLATE utf8_unicode_ci NOT NULL,
  `state` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nationality` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `place_of_birth` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_of_last_admission` longtext COLLATE utf8_unicode_ci NOT NULL,
  `diagnose` longtext COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `discharge_condition` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_opening_timestamp` int(11) NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `patient`
--

INSERT INTO `patient` (`patient_id`, `pid`, `name`, `email`, `idcard`, `issue_at`, `issue_on`, `occupation`, `mother_tongue`, `marital_status`, `religion`, `password`, `address`, `city`, `state`, `nationality`, `phone`, `mobile_no`, `sex`, `birth_date`, `age`, `place_of_birth`, `blood_group`, `date_of_last_admission`, `diagnose`, `department_id`, `discharge_condition`, `account_opening_timestamp`, `file_name`) VALUES
(5, 'RKB3QHHY91', 'Udemy Patient', 'patient@patient.com', 'National', 'lagost', '2011-08-19', 'Software Developer', 'English', 'Married', 'Islam', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'This is the address', 'City', 'State', 'Canadian', '+912345667', '+2348161662924', 'Male', '2020-02-09', 22, 'Lagos', 'A+', '2011-08-19', 'diagnose', 1, '&lt;p&gt;Discharge condition&lt;/p&gt;', 0, 'invoice.docx'),
(6, '', 'om jun', 'sucahyawiguna@gmail.com', 'rth', 'eh', '2011-08-19', 'we', 'Indonesia', 'Married', 'Islam', 'a03ddafa3ee1166856a6c9a3795900fdff09701b', 'jhihih', 'bubu', 'wdfqf', 'keorfoer', '081339723352', '081339723352', 'Male', '2024-03-15', 11, 'bangli', 'A-', '2011-08-19', 'seger', 0, 'huhuh', 0, 'App-Engine.png'),
(7, '', 'junaedi', 'djuni0454@gmail.com', 'rth', 'eh', '2011-08-19', '3r', 'Indonesia', 'Single', 'Traditional', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'kokoko', 'bubu', 'hyh', 'keorfoer', '081339723352', '081339723352', 'Male', '2024-03-16', 11, 'Jauh', 'A-', '2011-08-19', 'masuk angin hehe', 0, 'huhuhu', 0, 'logo.png'),
(8, '', 'om juna', 'sucahya@gmail.com', 'rth', 'eh', '2011-08-19', 'we', 'Indonesia', 'Married', 'Christianity', '32a89bdcec2d50f9dc9747cd47ecfc14cf9c3dbe', 'kokok', 'bubu', 'wdfqf', 'nrtnr', '0909090', '090909', 'Female', '2024-03-16', 1, 'Badung', 'A+', '2011-08-19', 'iseng hehe', 0, 'seger sih', 0, 'turunan warna ayang.png'),
(9, '', 'alex', 'alex@gmail.com', '0', 'bangli', '2011-08-19', 'pegawai swasta', 'Indonesia', 'Married', 'Others', 'a03ddafa3ee1166856a6c9a3795900fdff09701b', 'jl. jepun', 'bangli', 'Indonesia', 'WNI', '081339723352', '081339723352', 'Female', '2024-03-16', 5, 'bangli', 'A+', '2011-08-19', 'gila', 0, 'batuk dikit', 0, 'Screenshot-Tampilan Pemantauan Saldo-1.jpg'),
(10, '', 'p', 'p@gmail.com', '3r3r', 'r32', '2011-08-19', 'pegawai swasta', 'Indonesia', 'Divorced', 'Others', 'dcd7c6ef54d01e3e3a4cc96508ff0bca57a3b771', 'jojoojjo', 'wef', 'wdfqf', 'nrtnr', '81339723352', '090909', 'Male', '2024-03-16', 11, 'bangli', 'A+', '2011-08-19', 'koko', 0, 'kokok', 0, 'Gambar Juice.png'),
(11, '', 'solihin', 'hube@gmail.com', 'huhu', 'jyhy', '2011-08-19', 'pegawai swasta', 'Indonesia', 'Single', 'Christianity', 'a03ddafa3ee1166856a6c9a3795900fdff09701b', 'plpl', 'bubu', 'wdfqf', 'keorfoer', '0909090', '081339723352', 'Male', '2024-03-16', 11, 'bangli', 'A+', '2011-08-19', 'seger', 0, '', 0, 'squence-login.png'),
(12, '', 'mas g', 'koko@gmail.com', '0', 'eh', '2011-08-19', 'pegawai swasta', 'Indonesia', 'Married', 'Islam', 'a03ddafa3ee1166856a6c9a3795900fdff09701b', 'juy', 'jhjh', 'Indonesia', 'ninin', '081339723352', '081339723352', 'Male', '2024-03-16', 11, 'bangli', 'A+', '2011-08-19', 'jkjkj', 0, '', 0, 'Cloud-Storage.png'),
(13, '', 'kikik', 'iseng@gmail.com', '0', 'bangli', '2011-08-19', 'pegawai swasta', 'Indonesia', 'Married', 'Christianity', 'a03ddafa3ee1166856a6c9a3795900fdff09701b', 'human', 'bubu', 'Indonesia', 'WNI', '081339723352', '081339723352', 'Male', '2024-03-16', 11, 'bangli', 'A+', '2011-08-19', 'sakit gigi', 0, 'human', 0, 'Hasil=Testing.png'),
(14, '', 'roy', 'roy@gmail.com', '0', 'eh', '2011-08-19', 'pegawai swasta', 'Indonesia', 'Single', 'Traditional', 'a03ddafa3ee1166856a6c9a3795900fdff09701b', 'home', 'Denpasar', 'Indonesia', 'WNI', '081339723352', '081339723352', 'Male', '2024-03-16', 11, 'bangli', 'A+', '2011-08-19', 'gelem bedik sing ngaruh', 0, 'iseng sih', 0, 'konfirmasi hapus data--1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `expense_category_id` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`payment_id`, `invoice_id`, `title`, `payment_type`, `expense_category_id`, `payment_method`, `amount`, `description`, `timestamp`) VALUES
(3, 0, 'Nurse Uniform Purchase', 'expense', 1, 1, 1000, 'Nurse Uniform Purchase<br>', 1586368800),
(4, 1, 'Bed Purchase', 'income', 1, 2, 5000, 'Bed Purchase<br>', 1586368800),
(5, 0, 'Purchase of utilities', 'expense', 3, 2, 1000, 'Purchase of utilities<br>', 1586196000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `prescription_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `weight` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `blood_pressure` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `height` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prescription_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `visiting_fee` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `case_history` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prescription_entries` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_created` int(11) NOT NULL,
  `odontogram_entries` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `prescription_code`, `name`, `department_id`, `doctor_id`, `patient_id`, `weight`, `blood_pressure`, `height`, `prescription_type`, `visiting_fee`, `case_history`, `prescription_entries`, `date_created`, `odontogram_entries`) VALUES
(11, '06TJ7NL4R0', 'Hey Prescribe', 1, 14, 5, '30', '90', '6', '1', '1000', '<p>Hey case history</p>', '[{\"diagnose\":\"Malaria\",\"medicine_name\":\"Paracetamol\",\"medicine_type\":\"Pain Relieve\",\"usage_prescription\":\"1-1-1\",\"usage_days\":\"5\"}]', 1586714400, ''),
(12, '8CY41GT8O8', '', 0, 15, 7, '6', '88/800', '165', '1', '300.000', '<p>hubanke</p>', '[{\"diagnose\":\"gelem biase\",\"medicine_name\":\"yeh jahe \",\"medicine_type\":\"jhjh\",\"usage_prescription\":\"huhuh\",\"usage_days\":\"4\"},{\"diagnose\":\"jhjh\",\"medicine_name\":\"guola\",\"medicine_type\":\"iseng\",\"usage_prescription\":\"mkqmwkldm\",\"usage_days\":\"7\"}]', 1711562400, ''),
(13, '0Q4AW0VSR8', '', 0, 14, 14, '166', '700/9000', '800', '1', '500', '<p>pohohoho</p>', '[]', 1712080800, '[{\"nomor_gigi\":\"18\",\"bagian_gigi\":\"gigi bawah\",\"penyakit_gigi\":\"Gusi Bengkak\",\"catatan\":\"cabut ahh\"}]'),
(14, 'YJK45H8485', '', 0, 15, 7, '166', '88/800', '800', '1', '600.000', '<p>pokok</p>', '[]', 1712080800, '[{\"nomor_gigi\":\"18\",\"bagian_gigi\":\"gigi tengah\",\"penyakit_gigi\":\"Gigi Sensitif\",\"catatan\":\"ppp\"}]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'Hospital Management System'),
(2, 'system_title', 'Hospital Management System'),
(3, 'address', '546787, Kertz shopping complext, Silicon Valley, United State of America, New York city.'),
(4, 'phone', '+1564783934'),
(6, 'currency', 'USD'),
(7, 'system_email', 'optimumproblemsolver@gmail.com'),
(11, 'language', 'english'),
(12, 'text_align', 'left-to-right'),
(16, 'skin_colour', 'purple'),
(21, 'session', '2019-2020'),
(22, 'footer', 'Developed by Optimum Linkup Computers. All Right Reserved'),
(116, 'paypal_email', 'clone@paypalemail.com'),
(117, 'abb', 'DEVINEHMS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shedule`
--

CREATE TABLE `shedule` (
  `shedule_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `avail_day` varbinary(100) NOT NULL,
  `start_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `end_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `per_patient_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(100) NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shedule`
--

INSERT INTO `shedule` (`shedule_id`, `doctor_id`, `avail_day`, `start_time`, `end_time`, `per_patient_time`, `department_id`, `status`) VALUES
(3, 14, 0x31353837343932303030, '02:30', '04:30', '00:05', 1, '1'),
(4, 15, 0x31353833363930343030, '03:30', '05:00', '00:10', 1, '1'),
(5, 14, 0x31353836373134343030, '12:30', '02:30', '00:10', 1, '1'),
(6, 14, 0x31373131333839363030, '02:05', '03:05', '01:00', 0, '1'),
(7, 14, 0x31373131353632343030, '02:05', '03:05', '01:05', 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indeks untuk tabel `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`expense_category_id`);

--
-- Indeks untuk tabel `general_message`
--
ALTER TABLE `general_message`
  ADD PRIMARY KEY (`general_message_id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indeks untuk tabel `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indeks untuk tabel `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indeks untuk tabel `med_category`
--
ALTER TABLE `med_category`
  ADD PRIMARY KEY (`med_category_id`);

--
-- Indeks untuk tabel `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`noticeboard_id`);

--
-- Indeks untuk tabel `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeks untuk tabel `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indeks untuk tabel `shedule`
--
ALTER TABLE `shedule`
  ADD PRIMARY KEY (`shedule_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `expense_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `general_message`
--
ALTER TABLE `general_message`
  MODIFY `general_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `med_category`
--
ALTER TABLE `med_category`
  MODIFY `med_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `noticeboard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `shedule`
--
ALTER TABLE `shedule`
  MODIFY `shedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
