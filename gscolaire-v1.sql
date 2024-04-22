-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 10:02 PM
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
-- Database: `gscolaire`
--

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `type`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 'Indigo', 'Spécialisée', 0, '2024-04-05 01:47:40', '2024-04-05 01:47:40'),
(3, 'CP', 'Régulière', 0, '2024-04-05 10:03:47', '2024-04-05 10:11:38'),
(4, 'Maternelle 3ans/PT', 'Régulière', 10, '2024-04-05 14:56:02', '2024-04-05 14:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2020_05_21_100000_create_teams_table', 1),
(5, '2020_05_21_200000_create_team_user_table', 1),
(6, '2020_05_21_300000_create_team_invitations_table', 1),
(7, '2024_02_18_034736_create_sessions_table', 1),
(8, '2024_02_25_155426_create_students_table', 1),
(9, '2024_02_25_155427_create_tutors_table', 1),
(10, '2024_02_25_155428_create_classrooms_table', 1),
(11, '2024_02_25_155429_create_registrations_table', 1),
(12, '2024_02_25_155433_create_tuitions_table', 1),
(13, '2024_03_01_130228_create_teachers_table', 1),
(14, '2024_03_01_131230_create_subjects_table', 1),
(15, '2024_03_01_132230_create_notes_table', 1),
(16, '2024_03_20_233100_create_surveys_table', 1),
(17, '2024_03_20_233101_create_questions_table', 1),
(18, '2024_03_20_233102_create_options_table', 1),
(19, '2024_04_12_140605_create_answers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `average` double(8,2) NOT NULL,
  `appreciation` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `quarter` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `student_id`, `option_text`, `quarter`, `academic_year`, `created_at`, `updated_at`) VALUES
(371, 80, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(372, 81, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(373, 82, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(374, 83, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(375, 84, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(376, 85, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(377, 86, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(378, 87, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(379, 88, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(380, 89, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(381, 90, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(382, 91, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(383, 92, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(384, 93, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(385, 94, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(386, 95, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(387, 96, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(388, 97, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(389, 98, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(390, 99, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(391, 100, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(392, 101, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(393, 102, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(394, 103, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(395, 104, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(396, 105, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(397, 106, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(398, 107, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(399, 108, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(400, 109, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(401, 110, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(402, 111, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(403, 112, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(404, 113, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(405, 114, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(406, 115, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(407, 116, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(408, 117, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(409, 118, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(410, 119, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(411, 120, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(412, 121, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(413, 122, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(414, 123, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(415, 124, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(416, 125, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(417, 126, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(418, 127, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(419, 128, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(420, 129, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(421, 130, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(422, 131, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(423, 132, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(424, 133, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(425, 134, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(426, 135, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(427, 136, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(428, 137, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(429, 138, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(430, 139, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(431, 140, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(432, 141, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(433, 142, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(434, 143, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(435, 144, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(436, 145, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(437, 146, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(438, 147, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(439, 148, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(440, 149, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(441, 150, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(442, 151, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(443, 152, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(444, 153, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(445, 154, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(446, 155, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(447, 156, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(448, 157, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(449, 158, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(450, 159, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(451, 160, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(452, 161, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(453, 162, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(454, 163, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(455, 164, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(456, 165, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(457, 166, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(458, 167, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(459, 168, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(460, 169, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(461, 170, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(462, 171, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(463, 172, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(464, 173, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(465, 174, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(466, 175, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(467, 176, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(468, 177, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(469, 178, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(470, 179, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(471, 180, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(472, 181, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(473, 182, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(474, 183, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(475, 184, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(476, 185, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(477, 186, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(478, 187, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(479, 188, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(492, 201, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(493, 202, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(494, 203, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(495, 204, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(496, 205, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(497, 206, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(498, 207, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(499, 208, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(500, 209, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(501, 210, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(502, 211, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(503, 212, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(504, 213, 1, 'Sélectionner une valeur...', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(505, 214, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(506, 215, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(507, 216, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(508, 217, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(509, 218, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(510, 219, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(511, 220, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(512, 221, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(513, 222, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(514, 223, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(515, 224, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(516, 225, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(517, 226, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(518, 227, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(519, 228, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(520, 229, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(521, 230, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(522, 231, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(523, 232, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(524, 233, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(525, 234, 1, '2', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(526, 235, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(527, 236, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(528, 237, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(529, 238, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(530, 239, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(531, 240, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(532, 241, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(533, 242, 1, '1', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(534, 243, 1, '0', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21'),
(535, 244, 1, '3', 1, '2023-2024', '2024-04-18 00:06:21', '2024-04-18 00:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `survey_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `question_text` text NOT NULL,
  `fait_seul` varchar(255) DEFAULT NULL,
  `avec_aide` varchar(255) DEFAULT NULL,
  `fait_pas` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `survey_id`, `category`, `question_text`, `fait_seul`, `avec_aide`, `fait_pas`, `created_at`, `updated_at`) VALUES
(80, 1, 'Habiletés comportementales', 'Montre un comportement adéquat en classe (déplacements en classe)', 'L\'élève est calme et son comportement est adéquat en classe', 'L\'élève bouge un peu mais se calme avec l\'intervention de l\'adulte', 'L\'élève est agité et il perturbe le déroulement de la classe', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(81, 1, 'Habiletés comportementales', 'Calendrier-Horaire-Conscience des activités de la journée', 'L\'élève suit adéquatement son horaire', 'L\'élève suit son horaire de la journée mais a besoin dun rappel de l\'adulte', 'L\'élève ne suit pas son horaire, il faut l\'aide de l\'adulte pour qu\'il le suive', '2024-04-17 01:47:40', '2024-04-17 23:06:02'),
(82, 1, 'Habiletés comportementales', 'Fait l\'activité ou la tache demandée par l\'adulte', 'L\'élève réalise les tâches demandées par l\'adulte', 'L\'élève a besoin du support de l\'adulte pour réaliser les tâches qui lui sont demandées', 'L\'élève n\'arrive pas à réaliser les tâches demandées par l\'adulte malgée l\'aide de celui-ci', '2024-04-17 01:47:40', '2024-04-17 23:06:34'),
(83, 1, 'Habiletés comportementales', 'Démontre de la persévérence dans la réalisation de la tache', 'L\'élève montre de la persévérence dans la réalisation de sa tâche', 'L\'élève montre peu de persévérence dans la réalisation de sa tâche, il doit être encouragé par l\'adulte pour le faire', 'L\'élève ne persévère pas dans la tâche et ne la réalise pas.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(84, 1, 'Habiletés comportementales', 'Se met en danger ou met les autres en danger (grimpe-frappe-lance…)', 'L\'élève ne se met pas, ni ne met les autres en danger', 'L\'élève peut se mettre et/ou mettre les autres en danger mais arrête le comportement avec l\'intervention de l\'adulte', 'L\'élève se met ou à tendance à mettre les autres en danger malgré l\'intervention de l\'adulte', '2024-04-17 01:47:40', '2024-04-18 12:11:59'),
(85, 1, 'Habiletés comportementales', 'Fait de l\'autostimulation (Flapping-Utilisation d\'objets et/ou de son corps de facon non fonctionnelle)', 'L\'élève ne fait pas d\'autostimulation.', 'L\'élève s\'autostimule parfois par l\'utilisation d\'objets et/ou en bougeant des parties de son corps de façon non fonctionnelle', 'L\'élève s\'autostimule souvent par l\'utilisation d\'objets et/ou en bougeant des parties de son corps de façon non fonctionnelle', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(86, 1, 'Habiletés comportementales', 'Montre de l\'intérêt restreint (Focus sur les memes objets-gestes), refuse les transitions, montre de la difficulté à passer à une autre activité.', 'L\'élève ne montre pas d\'intérêts restreints et accepte les transitions liées au passage d\'une activité à une autre', 'Les transitions sont un peu délicates mais, avec l\'aide de l\'adulte, l\'élève accepte le passage d\'une activité à une autre', 'L\'élève montre de l\'intérêt restreint pour certains objets et, a de la difficulté à passer d\'une activité à une autre', '2024-04-17 01:47:40', '2024-04-18 12:13:30'),
(87, 1, 'Habiletés d\'autonomie', 'Routine Repas-Boit/Mange seul-Utilise des ustensiles pour boire et manger (ouvrir/fermer contenants)', 'La routine des repas est acquise, l\'élève est capable de manger, boire et utiliser les ustensiles seul', 'La routine des repas est en cours d\'acquisition; L\'élève est capable de manger, boire et utiliser les ustensiles avec des rappels de l\'adulte', 'La routine des repas n\'est pas acquise, l\'élève n\'est pas capable de manger, boire et utiliser les ustensiles seul', '2024-04-17 01:47:40', '2024-04-18 12:15:12'),
(88, 1, 'Habiletés d\'autonomie', 'Routine Propreté-Exprime des signes de besoin d\'aller aux toilettes.', 'Concernant la routine de la propreté, l\'élève exprime son besoin d\'aller aux toilettes', 'Concernant la routine de la propreté, avec l\'aide de l\'adulte, l\'élève arrive à exprimer son besoin d\'aller aux toilettes', 'Concernant la routine de la propreté, l\'élève n\'exprime pas son besoin d\'aller aux toilettes', '2024-04-17 01:47:40', '2024-04-18 00:25:36'),
(89, 1, 'Habiletés d\'autonomie', 'Routine Propreté-Toilettes (Baisser/remontrer pantalon-S\'assoire-S\'essuiyer-Lavage des mains)', 'L\'élève suit adéquatement la routine des toilettes (baisser)', 'La routine des toilettes est en cours d\'acquisiton, l\'élève a besoin d\'aide pour suivre les étapes (baisser/remonter pantalon, s\'asseoir, s\'essuyer-laver les mains)', 'L\'élève ne suit pas la routine des toilettes (baisser/remonter pantalon, s\'asseoir, s\'essuyer-laver les mains) malgré l\'aide de l\'adulte', '2024-04-17 01:47:40', '2024-04-18 00:25:50'),
(90, 1, 'Habiletés d\'autonomie', 'Routine habillage-Enlever/remettre chaussettes-chaussures-habits', 'L\'élève est capable d\'accomplir des séances d\'habillage (enlever/remettre ses habits, ses chaussures, ses chaussettes)', 'L\'élève arrive avec l\'aide de l\'adulte à accomplir des séances d\'habillage (enlever/remettre ses habits, ses chaussures)', 'L\'élève n\'est pas capable d\'accomplir des séances d\'habillage (enlever/remettre ses habits, ses chaussures, ses chaussettes) malgré l\'aide de l\'adulte', '2024-04-17 01:47:40', '2024-04-18 00:26:03'),
(91, 1, 'Habiletés d\'autonomie', 'Suivre son horaire journalier sans rappel', 'L\'élève suit son horaire de façon autonome', 'Avec de l\'aide de l\'adulte, l\'élève réussi à suivre son horaire', 'L\'élève ne suit pas son horaire malgré l\'aide de l\'adulte', '2024-04-17 01:47:40', '2024-04-18 00:26:27'),
(92, 1, 'Difficultés sensorielles', 'Montre des difficultés sensorielles marquées (toucher, gout, odorat, ouie, vue)', 'L\'élève ne montre aucune difficultés sensorielles marquées (toucher, gout, odorat, ouie, vue)', 'L\'élève montre quelques difficultés sensorielles (toucher, gout, odorat, ouie, vue).', 'L\'élève montre de fortes difficultés sensorielles (toucher, gout, odorat, ouie, vue).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(93, 1, 'Difficultés sensorielles', 'Aime/apprécie les chatouilles', 'L\'élève apprécie les chatouilles', 'L\'élève réagit modérément aux chatouilles.', 'L\'élève n\'aime pas les chatouilles.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(94, 1, 'Habiletés d\'attention', 'S\'assoit seul sur une chaise', 'L\'élève est capable de s\'assoir seul sur une chaise le temps d\'une activité éducative', 'Avec l\'aide de l\'adulte, l\'élève reste assis le temps d\'une activité éducative', 'Malgré l\'aide de l\'adulte, l\'élève n\'est pas capable de s\'assoir sur une chaise le temps d\'une activité éducative', '2024-04-17 01:47:40', '2024-04-18 00:26:56'),
(95, 1, 'Habiletés d\'attention', 'Fait un contact visuel en réponse à la consigne: Regarde-moi', 'L\'élève fait un contact visuel en réponse à la consigne \"Regarde-moi\"', 'Avec insistance de l\'adulte, l\'élève arrive à faire un contact visuel avec l\'adulte en réponse à la consigne \"Regarde-moi\"', 'Malgré l\'insistance de l\'adulte, l\'élève ne fait pas de contact visuel en réponse à la consigne \"Regarde-moi\"', '2024-04-17 01:47:40', '2024-04-18 12:17:43'),
(96, 1, 'Habiletés d\'imitation', 'Imite des gestes (taper des mains, essuyer avec un mouchoir/torchon, toucher son nez, etc.)', 'L\'élève est capable d\'imiter les gestes comme taper des mains, essuyer avec un mouchoir, toucher son nez.', 'Avec l\'aide de l\'adulte, l\'élève imite quelques gestes comme taper des mains, essuyer avec un mouchoir, toucher son nez.', 'Malgré l\'aide de l\'adulte, l\'élève n\'est pas capable d\'imiter les gestes comme taper des mains, essuyer avec un mouchoir, toucher son nez.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(97, 1, 'Habiletés d\'imitation', 'Imite des actions (mouvements : rouler une voiture, faire voler un avions, souffler en faisant des bulles)', 'L\'élève est capable d\'imiter des actions telles que rouler une voiture, faire voler un avion, souffler en faisant des bulles', 'Avec aide de l\'adulte, l\'élève imite quelques actions telles que rouler une voiture, faire voler un avion, souffler en faisant des bulles.', 'Malgré l\'aide de l\'adulte, l\'élève n\'est pas capable d\'imiter des actions telles que rouler une voiture, faire voler un avion, souffler en faisant des bulles.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(98, 1, 'Habiletés d\'imitation', 'Imite des sons (bruits-sons-mélodies)', 'L\'élève est capable d\'imiter des sons tels que des sons d\'animaux ou des mélodies.', 'Avec aide de l\'adulte, l\'élève imite quelques sons tels que des sons d\'animaux ou des mélodies', 'Malgré l\'aide de l\'adulte, l\'élève n\'est pas capable d\'imiter des sons tels que des sons d\'animaux ou des mélodies. ', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(99, 1, 'Habiletés d\'imitation', 'Est capable d\'aller chercher un objet hors de vue (permanence de l\'objet : gourde, jouet, personne)', 'Sur le plan de la permanence de l\'objet, l\'élève est capable d\'aller chercher un objet hors de vue comme sa gourde, un jouet, ou une personne', 'La permanence de l\'objet est cours d\'acquisition, avec l\'aide de l\'adulte, l\'élève peut aller chercher un objet hors de vue comme sa gourde, un jouet, ou une personne.', 'Sur le plan de la permanence de l\'objet, l\'élève n\'est pas capable d\'aller chercher un objet hors de vue comme sa gourde, un jouet, ou une personne malgré l\'aide de l\'adulte.', '2024-04-17 01:47:40', '2024-04-18 12:19:02'),
(100, 1, 'Habiletés de Communication-Réceptive', 'Réagit à son prénom en regardant l’adulte', 'L\'élève réagit à son prénom en regardant l’adulte', 'L\'élève réagit parfois à son prénom en regardant l\'adulte', 'L\'élève ne réagit pas à son prénom en regardant l\'adulte.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(101, 1, 'Habiletés de Communication-Réceptive', 'Pointe au moins 10 objets sur demande, toute catégorie confondue.', 'L\'élève pointe au moins 10 objets sur demande', 'Avec aide, l\'élève pointe quelques objets sur demande', 'L\'élève ne pointe pas d\'objets demandés par l\'adulte. ', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(102, 1, 'Habiletés de Communication-Réceptive', 'Donne au moins 10 objets sur demande, toute catégorie confondue.', 'L\'élève donne au moins 10 objets sur demande', 'Avec aide, l\'élève donne quelques objets sur demande', 'L\'élève ne donne pas les objets demandés par l\'adulte.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(103, 1, 'Habiletés de Communication-Réceptive', 'Nomme au moins 10 objets sur demande, toute catégorie confondue.', 'L\'èlève nomme au moins 10 objets sur demande', 'Avec aide, l\'élève nomme quelques objets sur demande', 'L\'élève ne nomme pas les objets demandés par l\'adulte.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(104, 1, 'Habiletés de Communication-Réceptive', 'Compréhension des consignes verbales/gestuelles simples (mange, boit, regarde, viens, assis, écoute, sort, descend, monte, va jouer, donne-moi, ouvre/ferme la boite, prend la balle)', 'L\'élève a une bonne compréhension des consignes verbales et gestuelles simples (mange, boit, regarde, viens, assis, écoute, sort, descend, monte, va jouer, donne-moi, ouvre/ferme la boite, prend la balle)', 'L\'élève a besoin d\'aide pour comprendre les consignes verbales/gestuelles simples (mange, boit, regarde, viens, assis, écoute, sort, descend, monte, va jouer, donne-moi, ouvre/ferme la boite, prend la balle).', 'Malgré l\'aide de l\'adulte, l\'élève ne comprend pas les consignes verbales/gestuelle simples (mange, boit, regarde, viens, assis, écoute, sort, descend, monte, va jouer, donne-moi, ouvre/ferme la boite, prend la balle).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(105, 1, 'Habiletés de Communication-Réceptive', 'Reconnait/comprend les émotions qui lui enseignées', 'L\'èlève reconnait et comprend différentes émotions qui lui enseignées (joie, tristesste, colére, peur, surprise, dégoût)', 'La reconnaissance des émotions est en cours d\'aquisition: avec l\'aide de l\'intervenant, l\'élève commence à reconnaitre et comprendre les émotions qui lui enseignées (joie, tristesste, colère, peur, surprise, dégoût).', 'L\'élève ne reconnait pas, ni ne comprend les émotions qui lui enseignées (joie, tristesste, colére, peur, surprise, dégoût). ', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(106, 1, 'Habiletés de Communication-Réceptive', 'Suit les consignes verbales pour donner/pointer/montrer 8-10 objets', 'L\'élève comprend les consignes pointer, donner ou montrer des objets de différentes catégories (couleurs, chiffres, lettres, parties du corps, animaux...)', 'La compréhension des consignes pointer, donner ou montrer des objets, est en cours d\'acquisition: l\'élève ne le fait pas systématiquement et a besoin d\'aide.', 'L\'élève montre une incompréhension des consignes pointer, donner ou montrer des objets de différentes catégories (couleurs, chiffres, lettres, parties du corps, animaux..) malgré l\'aide de l\'adulte', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(107, 1, 'Habiletés de Communication-Réceptive', 'L\'élève suit des consignes multiples en une seule étape dans des situations de routine, ex : Assis-toi, montre-moi le rouge, colorie le dessin.', 'L\'élève comprend et est capable de suivre des consignes multiples (Assis-toi, montre-moi le rouge, colorie le dessin)', 'Avec aide, l\'élève arrive à suivre des consignes multipes telles que \\Assis-toi, montre-moi le rouge, colorie le dessin', 'Même avec aide, l\'élève ne comprend pas les consignes multiples (Assis-toi, montre-moi le rouge, colorie le dessin).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(108, 1, 'Habiletés de Communication-Expressive', 'Verbal-Non Verbal', 'L\'élève s\'exprime avec des mots et se fait comprendre.', 'L\'élève s\'exprime avec des mots mais l\'adulte a de la difficulté à le comprendre.', 'L\'élève est non-verbal mais émet des sons audibles. ', '2024-04-17 01:47:40', '2024-04-18 12:22:04'),
(109, 1, 'Habiletés de Communication-Expressive', 'Répond à son prénom en regardant l’adulte', 'L\'élève répond à son prénom en regardant l’adulte', 'L\'élève réagit parfois à son prénom en regardant l\'adulte', 'L\'élève ne réagit pas à son prénom malgré l\'insitance de l\'adulte. ', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(110, 1, 'Habiletés de Communication-Expressive', 'Utilise un contact visuel approprié lorsqu\'il est engagé dans une interaction verbale', 'L\'élève est capable d\'utiliser un contact visuel approprié lorsqu\'il est engagé dans une interaction verbale', 'L\'élève utilise peu de contact visuel lorsqu\'il est engagé dans une interaction verbale.', 'L\'élève n\'utilise pas un contact visuel lorsqu\'il est engagé dans une interaction verbale. ', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(111, 1, 'Habiletés de Communication-Expressive', 'Répond aux salutations en disant bonjour ou au revoir', 'L\'élève répond aux salutations sociales en disant \"bonjour\" ou \"au revoir\"', 'L\'élève répond avec aide aux salutations sociales en disant \"bonjour\" ou \"au revoir\"', 'Malgré l\'aide de l\'adulte, l\'élève ne répond pas aux salutations sociales en disant \"bonjour\" ou \"au revoir\"', '2024-04-17 01:47:40', '2024-04-18 12:22:52'),
(112, 1, 'Habiletés de Communication-Expressive', 'Répond aux salutations en faisant un geste de la main', 'L\'élève répond aux salutations sociales par un geste de la main.', 'Avec aide de l\'adulte, l\'élève répond aux salutations sociales par un geste de la main.', 'L\'élève ne répond pas aux salutations sociales par un geste de la main.', '2024-04-17 01:47:40', '2024-04-18 12:24:01'),
(113, 1, 'Habiletés de Communication-Expressive', 'Exprime ses besoins de base (boire, manger, mal, toillettes…) en pointant les Pictos', 'L\'élève pointe les pictos appropriés pour exprimer ses besoins de base (boire, manger, toillettes ou avoir mal)', 'Avec l\'aide de l\'adulte, l\'élève arrive à pointer ses besoins de base (boire, manger, toillettes ou avoir mal)', 'Malgré l\'aide de l\'adulte, l\'élève ne pointe pasles pictos appropriés pour exprimer ses besoins de base (boire, manger, toilettes ou avoir mal).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(114, 1, 'Habiletés de Communication-Expressive', 'Nomme ses besoins de base (boire, manger, mal…)', 'L\'élève est capable de nommer ses besoins de base (boire, manger ou avoir mal)', 'Avec l\'aide de l\'adulte, l\'élève arrive à nomer ses besoins de base (boire, manger ou avoir mal)', 'Malgré l\'aide de l\'adulte, l\'élève n\'arrive pas à nomer ses besoins de base (boire, manger ou avoir mal).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(115, 1, 'Habiletés de Communication-Expressive', 'Exprime le oui/non par des pictos', 'L\'élève est capable de pointer le oui/non sur picto de façon approprié à la circonstance', 'Avec l\'aide de l\'adulte, l\'élève est capable de pointer sur picto le oui/non de façon approprié à la circonstance', 'Malgré l\'aide reçue de l\'adulte, l\'élève est capable de pointer sur picto le oui/non de façon approprié à la circonstance.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(116, 1, 'Habiletés de Communication-Expressive', 'Hoche la tête pour indiquer oui/non de facon appropriée à la circonstance', 'L\'élève est capable d\'hocher la tête pour exprimer oui/non de façon appropriée à la circonstance', 'Avec un rappel de la méthode, l\'élève est capable d\'hocher la tête pour exprimer oui/non de façon appropriée à la circonstance', 'Malgré le rappel de l\'adulte, l\'élève ne hoche pas la tête pour exprimer le oui/non de façon appropriée à la circonstance.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(117, 1, 'Habiletés de Communication-Expressive', 'Dit oui/non de facon appropriée à la circonstance', 'L\'élève est capable de dire oui/non de façon appropriée à la circonstance', 'Avec un rappel de l\'adulte, l\'élève est capable de dire oui/non de façon appropriée à la circonstance', 'Malgré le rappel de l\'adulte, l\'élève ne dit pas oui/non de façon appropriée à la circonstance.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(118, 1, 'Habiletés de Communication-Expressive', 'Reconnait ses émotions en les pointant ou en les nomant', 'L\'élève reconnait ses émotions en les pointant ou en les nomant', 'Avec l\'aide de l\'adulte, l\'élève arrive à reconnaitre certaines de ses émotions en les pointant ou en les nomant', 'Malgré l\'aide de l\'adulte, n\'arrive pas à reconnaitre ses émotions en les pointant ou en les nomant. ', '2024-04-17 01:47:40', '2024-04-18 12:26:17'),
(119, 1, 'Habiletés de Communication-Expressive', 'Regarder/Vocaliser/Gesticuler pour attirer l\'attention des autres', 'L\'élève est capable d\'attirer l\'attention des autres par le regard, la vocalisation, les gestes, etc.', 'L\'élève a besoin de l\'aide de l\'adulte pour attirer l\'attention des autres par le regard, la vocalisation, les gestes, etc.', 'Malgré l\'aide de l\'adulte, l\'élève n\'attire pas l\'attention des autres par le regard, la vocalisation, les gestes, etc.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(120, 1, 'Habiletés de Communication-Expressive', 'Regarder/Gesticuler pour diriger l\'attention de quelqu\'un vers un objet ou un événement', 'L\'élève utilise des gestes ou regards pour dirigier l\'attention de quelqu\'un vers un objet ou un événement', 'L\'élève a de la difficulté à utiliser des gestes ou regards pour dirigier l\'attention de quelqu\'un vers un objet ou un événement.', 'L\'élève n\'utilise pas de gestes ou de regards pour dirigier l\'attention de quelqu\'un vers un objet ou un événement. ', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(121, 1, 'Habiletés de Communication-Expressive', 'Réagit/Suit spontanément un objet pointé du regard par l\'adulte', 'L\'élève est capable de suivre spontanément le regard (ou le pointage) de l\'adulte sur un objet.', 'L\'élève a de la difficulté à suivre spontanément le regard (ou le pointage) de l\'adulte sur un objet.', 'L\'élève ne suit pas spontanément le regard (ou le pointage) de l\'adulte sur un objet.', '2024-04-17 01:47:40', '2024-04-18 12:29:02'),
(122, 1, 'Habiletés de Communication-Expressive', 'Demander un objet hors de portée par pointage', 'L\'élève est capable de pointer pour demander un objet hors de portée', 'Avec aide, l\'élève est capable de pointer pour demander un objet hors de portée', 'Malgré l\'aide de l\'adulte, l\'élève ne pointe pas pour demander un objet hors de sa portée. ', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(123, 1, 'Habiletés de Communication-Expressive', 'Choisit en pointant ou en nommant entre 2 produits alimentaires, 2 objets ou 2 activités: un apprécié et l\'autre non', 'L\'élève est capable de choisir entre 2 choses appréciées ou non (produits alimentaires, objets, activités).', 'L\'élève a de la difficulté à choisir entre 2 choses appréciées ou non (produits alimentaires, objets, activités) et a besoin de l\'adulte.', 'L\'élève n\'est pas capable de choisir entre 2 choses appréciées ou non (produits alimentaires, objets, activités) malgré l\'aide de l\'adute. ', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(124, 1, 'Habiletés de Communication-Expressive', 'Demande «encore» ou la continuation d\'une activité, objet, etc.', 'L\'élève est capable d\'exprimer son désir de poursuivre une activité en demandant «encore» ou par des gestes ou pointage.', 'L\'élève a de la difficulté à exprimer son désir de poursuivre une activité en demandant «encore» ou par des gestes ou pointage; cependant, il se fait comprendre avec l\'aide de l\'adulte', 'L\'élève n\'exprime pas son désir de poursuivre une activité en demandant «encore» ou par des gestes ou pointage.', '2024-04-17 01:47:40', '2024-04-18 12:33:34'),
(125, 1, 'Habiletés de Communication-Expressive', 'Demande un jeu/activité (mots ou gestes)', 'L\'élève est capable demander par des mots ou gestes un jeu ou une activité désirée ou proposée par l\'adulte.', 'Avec aide, l\'élève arrive à demander par des mots ou gestes un jeu ou une activité désirée.', 'L\'élève n\'est pas capable de demander un jeu ou une activité désirée ni par des mots, ni par des gestes,. ', '2024-04-17 01:47:40', '2024-04-18 12:34:34'),
(126, 1, 'Habiletés de Communication-Expressive', 'Demande à mettre fin à une activité (fini)', 'L\'élève est capable d\'exprimer son désir de mettre fin à une activité verbalement ou par des gestes', 'L\'élève a de la difficulté à exprimer son désir de mettre fin à une activité verbalement ou par des gestes; Il a besoin de l\'aide de l\'adulte pour se faire comprendre.', 'L\'élève n\'exprime pas son désir de mettre fin à une activité ni verbalement, ni par des gestes. ', '2024-04-17 01:47:40', '2024-04-18 12:37:48'),
(127, 1, 'Habiletés de Communication-Expressive', 'Demande de l\'aide', 'L\'élève est capable de demander de l\'aide.', 'L\'élève a de la difficulté à demander de l\'aide.', 'L\'élève ne demande pas d\'aide quand il en a besoin. ', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(128, 1, 'Habiletés de Communication-Expressive', 'Communique ce qu\'il aime/n\'aime pas par des mots/gestes', 'L\'élève est capable de communiquer ce qu\'il aime ou n\'aime pas par des mots/gestes.', 'L\'élève communique peu ce qu\'il aime ou n\'aime pas par des mots/gestes.', 'L\'élève ne communique pas ce qu\'il aime ou n\'aime pas. ', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(129, 1, 'Habiletés de Communication-Expressive', 'Exprime par des mots ou des gestes je ne sais pas dans un contexte approprié.', 'L\'élève exprime \"je ne sais pas\" dans un contexte approprié avec des mots ou des gestes.', 'L\'élève exprime avec difficulté \"je ne sais pas\" dans un contexte approprié avec des mots ou des gestes', 'L\'élève n\'exprime pas \"je ne sais pas\" dans un contexte approprié avec des mots ou des gestes.', '2024-04-17 01:47:40', '2024-04-18 12:39:49'),
(130, 1, 'Habiletés de Communication-Expressive', 'Demande qu\'est ce que c\'est ?', 'L\'élève demande \"qu\'est-ce que c\'est ?\"', 'L\'élève demande rarement \"qu\'est-ce que c\'est ?\"', 'L\'élève ne demande pas \"qu\'est-ce que c\'est ?\"', '2024-04-17 01:47:40', '2024-04-18 12:41:32'),
(131, 1, 'Habiletés  cognitives', 'Complete des casse-tetes/puzzles (3-25 morceaux)', 'L\'élève complète des casse-tetes de 3 à 25 morceaux.', 'L\'élève complète des casse-tete de 3 à 25 morceaux avec l\'aide de l\'adulte.', 'L\'élève ne complète pas de casse-tete malgré l\'aide de l\'adulte.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(132, 1, 'Habiletés  cognitives', 'Assemble des légos en suivant un modèle/image', 'L\'élève assemble des légos en suivant un modèle/image', 'L\'élève a besoin de l\'aide de l\'adulte pour assembler des légos en suivant un modèle/image', 'Malgré l\'aide de l\'adulte, l\'élève n\'assemble pas de légos en suivant un modèle/image', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(133, 1, 'Habiletés  cognitives', 'Manipule la pate à modeler pour créer différentes formes (animaux…)', 'L\'élève manipule la pâte à modéler pour créer différentes formes (animaux, etc.).', 'Avec l\'aide de l\'adulte, l\'élève réussit à manipule la pâte à modéler pour créer différentes formes (animaux…).', 'Malgré l\'aide de l\'adulte, l\'élève ne manipule pas la pâte à modéler pour créer différentes formes (animaux…).', '2024-04-17 01:47:40', '2024-04-18 12:43:00'),
(134, 1, 'Habiletés  cognitives', 'Répond/participe aux jeux de marionnettes', 'L\'élève répond/participe aux jeux de marionnettes.', 'Avec l\'aide de l\'adulte, l\'élève répond/participe aux jeux de marionnettes.', 'Malgré l\'aide de l\'adulte, l\'élève ne répond pas et/ou ne participe pas aux jeux de marionnettes.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(135, 1, 'Habiletés  cognitives', 'Fait des jeux de rôles (telephone, personnages….)', 'L\'élève fait des jeux de rôles (telephone, personnages….).', 'Avec l\'aide de l\'adulte, l\'élève fait des jeux de rôles (telephone, personnages….).', 'Malgré l\'aide de l\'adulte, l\'élève ne fait pas de jeux de rôles (telephone, personnages….).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(136, 1, 'Habiletés  cognitives', 'Anticipe une réaction, une action ou un événement spécifique (ex.: sent les aliments et sait que c\'est l\'heure de manger)', 'L\'élève est capable d\'anticiper une réaction, une action ou un évènement spécifique (ex.: sent les aliments et sait que c\'est l\'heure de manger).', 'Avec aide, l\'élève est capable d\'anticiper certaines réactions, actions ou évènements spécifiques (ex.: sent les aliments et sait que c\'est l\'heure de manger).', 'L\'élève n\'est pas capable d\'anticiper une réaction, une action ou un évènement spécifique (ex.: sent les aliments et sait que c\'est l\'heure de manger).', '2024-04-17 01:47:40', '2024-04-18 13:10:52'),
(137, 1, 'Habiletés  cognitives', 'Cherche une personne/objet qu\'il ne voit plus', 'L\'élève cherche une personne ou un objet qu\'il ne voit pas', 'Avec aide, l\'élève est capable de chercher une personne ou un objet qu\'il ne voit pas', 'L\'élève n\'est pas en mesure de chercher une personne ou un objet qu\'il ne voit pas', '2024-04-17 01:47:40', '2024-04-18 13:08:01'),
(138, 1, 'Habiletés  cognitives', 'Agit sur un jouet/objet simple afin de produire un effet, ex.: frappe, tourne, secoue, appuie sur des boutons', 'L\'élève agit seul sur un jouet/objet simple afin de produire un effet (ex.: frappe, tourne, secoue, appuie sur des boutons).', 'Avec le soutien de l\'adulte, l\'élève peut agir sur un jouet/objet simple afin de produire un effet (ex.: frappe, tourne, secoue, appuie sur des boutons).', 'Malgré le soutien de l\'adulte, l\'élève n\'agit pas sur un jouet/objet simple afin de produire un effet (ex.: frappe, tourne, secoue, appuie sur des boutons).', '2024-04-17 01:47:40', '2024-04-18 12:45:09'),
(139, 1, 'Habiletés  cognitives', 'Imite une seule action avec un jouet/objet (ex. tape sur un tambour)', 'L\'élève est capable d\'imiter une action avec un jouet ou objet (ex. tape sur un tambour)', 'Avec l\'aide de l\'adulte, l\'élève peut imiter une action avec un jouet ou objet (ex. tape sur un tambour)', 'Malgré l\'aide de l\'adulte, l\'élève n\'imite pas une action avec un jouet ou objet (ex. tape sur un tambour).', '2024-04-17 01:47:40', '2024-04-18 13:16:40'),
(140, 1, 'Habiletés  cognitives', 'Imite différentes actions motrices au cours des routines des chansons/jeux, ex.: lors des activités en groupe', 'L\'élève imite différentes actions motrices au cours des routines de chansons/jeux (ex.: lors des activités en groupe).', 'Avec l\'aide de l\'adulte, l\'élève peut imiter différentes actions motrices au cours des routines de chansons/jeux (ex.: lors des activités en groupe)', 'Malgré l\'aide de l\'adulte, l\'élève n\'imite pas d\'actions motrices au cours des routines de chansons/jeux (ex.: lors des activités en groupe)', '2024-04-17 01:47:40', '2024-04-18 13:13:37'),
(141, 1, 'Habiletés  cognitives', 'Tente de résoudre des problèmes simples, ex. rampe vers un jouet afin de l\'atteindre, contourne un obstacle pour obtenir un objet', 'L\'élève tente de résoudre des problèmes simples (ex. rampe vers un jouet afin de l\'atteindre, contourne un obstacle pour obtenir un objet)', 'Avec le support de l\'adulte, l\'élève tente de résoudre des problèmes simples (ex. rampe vers un jouet afin de l\'atteindre, contourne un obstacle pour obtenir un objet)', 'Malgré le suppport de l\'adulte, l\'élève ne résoud pas de problèmes simples (ex. rampe vers un jouet afin de l\'atteindre, contourne un obstacle pour obtenir un objet).', '2024-04-17 01:47:40', '2024-04-18 12:59:03'),
(142, 1, 'Habiletés  cognitives', 'Complète un casse-tête à encastrer de XX morceaux', 'L\'élève peut complèter un casse-tête à encastrer de XX morceaux.', 'Avec aide, l\'élève est capable de compléter un casse-tête à encastrer de XX morceaux', 'L\'élève n\'est pas capable de compléter un casse-tête encastrer de plus de XX morceaux', '2024-04-17 01:47:40', '2024-04-18 13:15:09'),
(143, 1, 'Habiletés  cognitives', 'Identifie un cercle, un triangle, un carré et un rectangle', 'L\'élève identifie les formes (cercle, triangle, carré et rectangle).', 'Avec aide, l\'élève identifie quelques formes (cercle, triangle, carré et rectangle).', 'Malgré l\'aide de l\'adulte, l\'élève n\'est pas capable d\'identifier les formes (cercle, triangle, carré et rectangle).', '2024-04-17 01:47:40', '2024-04-18 13:19:31'),
(144, 1, 'Habiletés  cognitives', 'Assemble les morceaux d\'une chaîne de couleurs avec l\'aide d\'un gabarit', 'L\'élève assemble les morceaux d\'une chaîne de couleurs avec l\'aide d\'un gabarit.', 'Avec le support de l\'adulte, l\'élève assemble les morceaux d\'une chaîne de couleurs avec l\'aide d\'un gabarit.', 'Malgré le support de l\'adulte, l\'élève n\'assemble pas de morceaux d\'une chaîne de couleurs avec l\'aide d\'un gabarit.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(145, 1, 'Habiletés  cognitives', 'Commence à associer les objets avec leur fonction (ex.: une cuillère pour manger, une tasse pour boire)', 'L\'élève commence à associer les objets avec leurs fonctions respectives (ex.: une cuillère pour manger, une tasse pour boire).', 'Avec l\'aide de l\'adulte, l\'élève est capable d\'associer quelques objects avec leurs fonctions respectives (ex.: une cuillère pour manger, une tasse pour boire).', 'L\'élève n\'a pas commencé à associer les objets avec leurs fonctions respectives (ex.: une cuillère pour manger, une tasse pour boire).', '2024-04-17 01:47:40', '2024-04-18 13:01:03'),
(146, 1, 'Habiletés  cognitives', 'Pointe plusieurs parties de son propre corps, sur demande', 'Sur demande de l\'adulte, l\'élève pointe plusieurs parties de son propre corps', 'Avec aide, l\'élève pointe quelques parties de son propre corps à la demande de l\'adulte', 'L\'élève n\'est pas capable de pointer sur demande des parties de son propre corps', '2024-04-17 01:47:40', '2024-04-18 13:22:35'),
(147, 1, 'Habiletés  cognitives', 'Nomme au moins 6 parties du corps', 'L\'élève nomme au moins 6 parties du corps.', 'L\'élève nomme moins de 6 parties du corps.', 'L\'élève ne nomme pas de parties du corps.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(148, 1, 'Habiletés  cognitives', 'Localise des parties du corps sur une image lorsqu\'on lui demande', 'L\'élève localise des parties du corps sur une image lorsqu\'on le lui demande.', 'Avec aide, l\'élève est capable de localiser des parties du corps sur une image lorsqu\'on le lui demande', 'L\'élève ne localise pas de parties du corps sur une image lorsqu\'on le lui demande.', '2024-04-17 01:47:40', '2024-04-18 12:57:51'),
(149, 1, 'Habiletés  cognitives', 'Identifie la fonction des parties du corps', 'L\'élève comprend la fonction des parties du corps.', 'Avec aide, l\'élève comprend la fonction de certaines parties du corps.', 'L\'élève ne comprend pas la fonction des parties du corps.', '2024-04-17 01:47:40', '2024-04-18 13:24:07'),
(150, 1, 'Habiletés  cognitives', 'Identifie les conditions météorologiques: ensoleillé, nuageux, pluvieux', 'L\'élève comprend les conditions météorologiques (ensoleillé, nuageux, pluvieux)', 'Avec aide, l\'élève comprend une ou deux conditions météorologiques (ensoleillé, nuageux, pluvieux)', 'L\'élève ne comprend pas les conditions météorologiques (ensoleillé, nuageux, pluvieux)', '2024-04-17 01:47:40', '2024-04-18 13:26:14'),
(151, 1, 'Habiletés  cognitives', 'Regroupe des objets ou des images dans des catégories simples (ex. animaux, nourriture, transports, vêtements, meubles, jouets, etc.)', 'L\'élève regroupe des objets ou des images dans des catégories simples (ex. animaux, nourriture, transports, vêtements, meubles, jouets, etc.).', 'Avec le support de l\'adulte, l\'élève peut regrouper certains des objets ou des images dans des catégories simples (ex. animaux, nourriture, transports, vêtements, meubles, jouets, etc.).', 'Malgré l\'aide de l\'adulte, l\'élève ne regroupe pas d\'objets ou d\'images dans des catégories simples (ex. animaux, nourriture, transports, vêtements, meubles, jouets, etc.).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(152, 1, 'Habiletés  cognitives', 'Classifie les objets, les personnes ou les événements selon un critère spécifique (ex.: groupe des vêtements selon la couleur ou la taille)', 'L\'élève classifie les objets, les personnes ou les événements selon un critère spécifique (ex.: groupe des vêtements selon la couleur ou la taille).', 'L\'élève classifie certains objets, personnes ou événements selon un critère spécifique (ex.: groupe des vêtements selon la couleur ou la taille).', 'L\'élève ne classifie pas les objets, les personnes ou les événements selon un critère spécifique (ex.: groupe des vêtements selon la couleur ou la taille).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(153, 1, 'Habiletés  cognitives', 'Classe des photos d\'objets par catégorie (ex.: alimentation, transport, animaux, vêtements, etc.)', 'L\'élève classe des photos d\'objets par catégorie (ex.: alimentation, transport, animaux, vêtements, etc.).', 'Avec l\'aide de l\'adulte, l\'élève peut classer certaines photos d\'objets par catégorie (ex.: alimentation, transport, animaux, vêtements, etc.).', 'Malgré l\'aide de l\'adulte, l\'élève ne peut classer de photos d\'objets par catégorie (ex.: alimentation, transport, animaux, vêtements, etc.).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(154, 1, 'Habiletés académiques-Sciences', 'Apparie les lettre (A-Z)', 'L\'élève qpparie les lettres (A-Z).', 'L\'élève apparie certaines lettres (A-Z).', 'L\'élève n\'apparie pas de lettres (A-Z).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(155, 1, 'Habiletés académiques-Sciences', 'Apparie lettres majuscules/minuscules', 'L\'élève apparie les lettres majuscules/minuscules.', 'L\'élève apparie certaines lettres majuscules/minuscules.', 'L\'élève n\'apparie pas lettres majuscules/minuscules.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(156, 1, 'Habiletés académiques-Sciences', 'Apparie les chiffres (10 et plus )', 'L\'élève apparie les chiffres (10 et plus ).', 'L\'élève apparie certains chiffres (moins de 10 ).', 'L\'élève n\'apparie pas de chiffres.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(157, 1, 'Habiletés académiques-Sciences', 'Apparie des objets par couleurs (4 et plus)', 'L\'élève apparie des objets par couleurs (4 et plus).', 'L\'élève apparie certains objets par couleurs (moins de 4).', 'L\'élève n\'apparie pas d\'objets par couleurs.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(158, 1, 'Habiletés académiques-Sciences', 'Apparie des objets par taille (petit/moyen/grand)', 'L\'élève apparie des objets par taille (petit/moyen/grand)', 'L\'élève apparie certains objets par taille (petit/moyen/grand)', 'L\'élève n\'apparie pas d\'objets par taille (petit/moyen/grand).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(159, 1, 'Habiletés académiques-Sciences', 'Apparie les parties du corps (5-10 -15 et plus)', 'L\'élève apparie les parties du corps (15 et plus).', 'L\'élève apparie les parties du corps (entre 10 et 15). L\'élève apparie certaines parties du corps (moins de 10).', 'L\'élève n\'apparie pas les parties du corps.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(160, 1, 'Habiletés académiques-Sciences', 'Apparie les noms d\'animaux (5-10 -15 et plus)', 'L\'élève apparie les noms d\'animaux (15 et plus).', 'L\'élève apparie les noms d\'animaux (entre 10 et 15). L\'élève apparie certains noms d\'animaux (moins de 10).', 'L\'élève n\'apparie pas les noms d\'animaux.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(161, 1, 'Habiletés académiques-Sciences', 'Apparie les noms de moyens de transport (5-10 -15 et plus)', 'L\'élève apparie les noms de moyens de transport (15 et plus).', 'L\'élève apparie les noms de moyens de transport (entre 10 et 15). L\'élève apparie certains noms de moyens de transport (moins de 10).', 'L\'élève n\'apparie pas les noms de moyens de transport.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(162, 1, 'Habiletés académiques-Sciences', 'Apparie les fruits/légumes (5-10 -15 et plus)', 'L\'élève apparie les fruits/légumes(15 et plus).', 'L\'élève apparie les fruits/légumes (entre 10 et 15). L\'élève apparie certains fruits/légumes(moins de 10).', 'L\'élève n\'apparie pas les fruits/légumes.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(163, 1, 'Habiletés académiques-Sciences', 'Apparie 10+ mots identiques (Toutes catégories )', 'L\'élève apparie plus de 10 mots (toutes catégories).', 'L\'élève apparie moins de 10 mots (toutes catégories).', 'L\'élève n\'apparie pas de 10 mots.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(164, 1, 'Habiletés académiques-Sciences', 'Apparie images/mots écrits (Toutes catégories )', 'L\'élève apparie des images/mots écrits (Toutes catégories ).', 'L\'élève apparie avec l\'aide de l\'adulte des images/mots écrits (Toutes catégories ).', 'L\'élève n\'apparie pas d\'images/mots écrits.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(165, 1, 'Habiletés académiques-Sciences', 'Apparie des photos de personnes familières/noms écrits', 'L\'élève apparie des photos de personnes familières/noms écrits.', 'L\'élève apparie certaines photos de personnes familières/noms écrits.', 'L\'élève n\'apparie pas de photos de personnes familières/noms écrits.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(166, 1, 'Habiletés académiques-Sciences', 'Apparie photos objets /noms objets écrits', 'L\'élève apparie des photos d\'objets/noms objets écrits', 'L\'élève apparie certaines photos d\'objets /noms objets écrits.', 'L\'élève n\'apparie pas de photos d\'objets /noms objets écrits.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(167, 1, 'Habiletés académiques-Sciences', 'Apparie 1-20 chiffres/écrit', 'L\'élève apparie les chiffres de 1 à 20/écrit', 'Avec l\'aide de l\'adulte, l\'élève apparie les chiffres de 1 à 20/écrit', 'L\'élève n\'apparie pas les chiffres de 1 à 20/écrit.', '2024-04-17 01:47:40', '2024-04-18 13:31:19'),
(168, 1, 'Habiletés académiques-Sciences', 'Apparie 1-20 chiffres/nombre correspondant d\'objets', 'L\'élève apparie les chiffres de 1 à 20/nombre correspondant d\'objets', 'Avec aide, l\'élève apparie les chiffres de 1 à 20/nombre correspondant d\'objets', 'L\'élève n\'apparie pas de chiffres de 1 à 20/nombre correspondant d\'objets.', '2024-04-17 01:47:40', '2024-04-18 13:33:07'),
(169, 1, 'Habiletés académiques-Sciences', 'Trie les chiffres de 1 à 10 et plus', 'L\'élève trie les chiffres au-dela de 10.', 'L\'élève trie les chiffres entre 1 et 10.', 'L\'élève ne trie pas les chiffres.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(170, 1, 'Habiletés académiques-Sciences', 'Trie des objets selon l\'attibut (taille, couleur, forme, texture, fonction)', 'L\'élève trie des objets selon l\'attibut (taille, couleur, forme, texture, fonction).', 'L\'élève trie certains objets selon l\'attibut (taille, couleur, forme, texture, fonction). L\'élève ne trie pas d\'objets selon l\'attibut (taille, couleur, forme, texture, fonction).', 'L\'élève ne trie pas d\'objets selon l\'attibut (taille, couleur, forme, texture, fonction).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(171, 1, 'Habiletés académiques-Sciences', 'Trie les lettres de l\'alphabet (A-Z)', 'L\'élève trie les lettres de l\'alphabet (A-Z).', 'L\'élève trie certaines lettres de l\'alphabet (A-Z).', 'L\'élève ne trie pas les lettres de l\'alphabet (A-Z).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(172, 1, 'Habiletés académiques-Sciences', 'Identifie (sur demande) les chiffres (1-10-20 et plus)', 'L\'élève identifie sur demande les chiffres de 1-10-20 et plus.', 'Avec l\'aide, l\'élève identifie sur demande certains chiffres entre 1-10-20', 'L\'élève n\'\'est pas capable d\'identifier de chiffres entre 1-10-20.', '2024-04-17 01:47:40', '2024-04-18 13:37:55'),
(173, 1, 'Habiletés académiques-Sciences', 'Identifie (sur demande) les couleurs (3-5-7 -10 et plus )', 'L\'élève identifie sur demande plus de 10 couleurs.', 'L\'élève identifie sur demande entre 5 et 10 couleurs. L\'élève identifie sur demande moins de 10 couleurs.', 'L\'élève n\'identifie pas de couleurs.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(174, 1, 'Habiletés académiques-Sciences', 'Identifie (sur demande) les grandeurs (Petit-Moyen-Grand)', 'L\'élève identifie sur demande les grandeurs (Petit-Moyen-Grand).', 'Avec aide, l\'élève identifie sur demande certaines grandeurs (Petit-Moyen-Grand).', 'L\'élève n\'est pas capable d\'identifier les grandeurs (Petit-Moyen-Grand).', '2024-04-17 01:47:40', '2024-04-18 13:39:46'),
(175, 1, 'Habiletés académiques-Sciences', 'Identifie (sur demande) les parties du corps (5-10 -15 et plus)', 'L\'élève identifie sur demande les parties du corps (5-10-15 et plus).', 'Avec aide, l\'élève identifie sur demande certaines parties du corps (5-10-15)', 'L\'élève n\'est pas capable d\'identifier les parties du corps.', '2024-04-17 01:47:40', '2024-04-18 13:41:51'),
(176, 1, 'Habiletés académiques-Sciences', 'Identifie (sur demande) les noms d\'animaux (5-10 -15 et plus)', 'L\'élève identifie sur demande les noms d\'animaux (5-10-15 et plus).', 'Avec aide, l\'élève identifie sur demande certains noms d\'animaux (5-10-15).', 'L\'élève n\'est pas capable d\'identifier des noms d\'animaux.', '2024-04-17 01:47:40', '2024-04-18 13:43:54'),
(177, 1, 'Habiletés académiques-Sciences', 'Identifie (sur demande) les noms de moyens de transport (5-10 -15 et plus)', 'L\'élève identifie sur demande les noms de moyens de transport (5-10-15 et plus).', 'Avec aide, l\'élève identifie sur demande certains noms de moyens de transport (5-10-15).', 'L\'élève n\'est pas capable d\'identifier des noms de moyens de transport.', '2024-04-17 01:47:40', '2024-04-18 13:45:20'),
(178, 1, 'Habiletés académiques-Sciences', 'Identifie (sur demande) les fruits/légumes (5-10 -15 et plus)', 'L\'élève identifie sur demande les fruits/légumes (5-10-15 et plus).', 'Avec aide, l\'élève identifie sur demande certains fruits/légumes (5-10-15 et plus).', 'L\'élève n\'est pas capable d\'identifier des fruits/légumes.', '2024-04-17 01:47:40', '2024-04-18 13:46:01'),
(179, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Tourne les pages d\'un livre', 'L\'élève tourne seul les pages d\'un livre.', 'Avec aide, l\'élève tourne les pages d\'un livre', 'L\'élève ne tourne pas seul les pages d\'un livre.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(180, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Écoute en silence et avec intérêt (5min) un adulte faire la lecture d\'une histoire', 'L\'élève écoute en silence et avec intérêt (5min) un adulte faire la lecture d\'une histoire.', 'L\'élève écoute en silence et avec intérêt (- de 5min) un adulte faire la lecture d\'une histoire.', 'L\'élève, n\'écoute pas en silence un adulte faire la lecture d\'une histoire.', '2024-04-17 01:47:40', '2024-04-18 13:48:50'),
(181, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Pointe une lettre sur demande', 'L\'élève pointe une lettre sur demande', 'Avec aide, l\'élève arrive à pointer une lettre sur demande', 'L\'élève ne pointe pas une lettre sur demande', '2024-04-17 01:47:40', '2024-04-18 12:07:20'),
(182, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Identifie les lettres majuscules en les pointant sur un abécédaire', 'L\'élève identifie les lettres majuscules en les pointant sur un abécédaire.', 'L\'élève identifie avec un peu d\'aide les lettres majuscules en les pointant sur un abécédaire.', 'L\'élève n\'identifie pas de lettres majuscules en les pointant sur un abécédaire.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(183, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Identifie les lettres minuscules en les pointant sur un abécédaire', 'L\'élève identifie les lettres minuscules en les pointant sur un abécédaire.', 'L\'élève identifie avec un peu d\'aide les lettres minuscules en les pointant sur un abécédaire.', 'L\'élève n\'identifie pas de lettres minuscules en les pointant sur un abécédaire.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(184, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Met en ordre les lettres de l\'alphabet', 'L\'élève met en ordre les lettres de l\'alphabet.', 'L\'élève met en ordre les lettres de l\'alphabet mais se trompe quelques fois.', 'L\'élève ne met pas et en ordre les lettres de l\'alphabet,', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(185, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Apparie sa photo avec son prénom écrit', 'L\'élève apparie sa photo avec son prénom écrit.', 'Avec aide, l\'élève apparie sa photo avec son prénom écrit.', 'L\'élève n\'apparie pas sa photo avec son prénom écrit.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(186, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Reconnaît son prénom écrit', 'L\'élève reconnaît son prénom écrit.', 'Avec aide, l\'élève reconnaît son prénom écrit', 'L\'élève ne reconnaît pas son prénom écrit.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(187, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Reconnaît les prénoms écrits de ses pairs', 'L\'élève reconnaît les prénoms écrits de ses pairs.é', 'L\'élève reconnaît certains prénoms écrits de ses pairs.', 'L\'élève ne reconnaît pas les prénoms écrits de ses pairs.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(188, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Apparie les photos des personnes familières avec leur prénom écrit, ex.: pairs, enseignant, etc.', 'L\'élève apparie les photos des personnes familières avec leur prénom écrit, ex.: pairs, enseignant, etc.. ', 'L\'élève apparie les photos des personnes familières avec leur prénom écrit, ex.: pairs, enseignant, etc. avec l\'aide de l\'adulte.', 'L\'élève n\'apparie pas les photos des personnes familières avec leur prénom écrit, ex.: pairs, enseignant, etc.', '2024-04-17 01:47:40', '2024-04-18 16:34:38'),
(201, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Colorie à l\'intérieur du contour', 'L\'élève colorie à l\'intérieur du contour.', 'La plupart du temps, l\'élève colorie à l\'intérieur du contour.', 'L\'élève ne colorie pas à l\'intérieur du contour.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(202, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Fait des traits, des gribouillis et des points avec un marqueur ou un crayon de couleur', 'L\'élève fait des traits, des gribouillis et des points avec un marqueur ou un crayon de couleur.', 'Avec aide, l\'élève arrive à faire des traits, de gribouillis et de points avec un marqueur ou un crayon de couleur.', 'L\'élève ne fait pas de traits, de gribouillis et de points avec un marqueur ou un crayon de couleur.', '2024-04-17 01:47:40', '2024-04-18 16:56:36'),
(203, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Dessine des formes simples: cercle, carré, triangle, rectangle', 'L\'élève dessine des formes simples: cercle, carré, triangle, rectangle.', 'L\'élève dessine avec de l\'aide des formes simples: cercle, carré, triangle, rectangle.', 'L\'élève ne dessine pas de formes simples: cercle, carré, triangle, rectangle.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(204, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Dessine une personne avec 4 à 6 parties du corps', 'L\'élève dessine une personne avec au moins 6 parties du corps.', 'L\'élève dessine une personne avec moins de 6 parties du corps.', 'L\'élève ne dessine pas une personne avec les parties du corps.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(205, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Dessine des images qui représentent des choses, ex.: un chien, une maison', 'L\'élève dessine des images qui représentent des choses, ex.: un chien, une maison.', 'L\'élève dessine avec de l\'aide des images qui représentent des choses, ex.: un chien, une maison .', 'L\'élève ne dessine pas d\'images qui représentent des choses, ex.: un chien, une maison. ', '2024-04-17 01:47:40', '2024-04-17 01:47:40');
INSERT INTO `questions` (`id`, `survey_id`, `category`, `question_text`, `fait_seul`, `avec_aide`, `fait_pas`, `created_at`, `updated_at`) VALUES
(206, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Utilise différentes couleurs pour desssiner/peindre une image', 'L\'élève utilise différentes couleurs pour dessiner/peindre une image', 'Avec aide, l\'élève arrive à utiliser différentes couleurs pour dessiner/peindre une image', ' L\'élève n\'utilise pas différentes couleurs pour dessiner/peindre une image', '2024-04-17 01:47:40', '2024-04-18 12:06:47'),
(207, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Manipule l\'argile/pâte à modeler pour créer différentes formes', 'L\'élève manipule l\'argile/pâte à modeler pour créer différentes formes.', 'L\'élève manipule avec aide l\'argile/pâte à modeler pour créer différentes formes.', 'L\'élève ne manipule pas l\'argile/pâte à modeler pour créer différentes formes.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(208, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Est attentif à la musique, chansons, etc. pendant une activité de groupe', 'L\'élève est attentif à la musique, chansons, etc. pendant une activité de groupe.', 'L\'élève est attentif à la musique, chansons, etc. pendant une activité de groupe mais pour une courte période de temps.', 'L\'élève n\'est pas attentif à la musique, chansons, etc. pendant une activité de groupe.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(209, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Trace des figures (lignes horiz/vert, cercles, diagonale…+, X)', 'L\'élève trace des figures (lignes horizontales/verticales, cercles, diagonale…+, X).', 'L\'élève trace des figures avec l\'aide de l\'adulte (lignes horizontales/verticales, cercles, diagonale…+, X).', 'L\'élève ne trace pas de figures (lignes horizontales/verticales, cercles, diagonale…+, X).', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(210, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Relie les points d\'un dessin ou d\'une image à points', 'L\'élève relie les points d\'un dessin ou d\'une image à points.', 'Avec l\'aide de l\'adulte, l\'élève arrive à relier les points d\'un dessin ou d\'une image à points.', 'L\'élève ne relie pas les points d\'un dessin ou d\'une image à points.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(211, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Écrit les lettres majuscules/minuscules à partir d\'un modèle', 'L\'élève écrit les lettres majuscules/minuscules à partir d\'un modèle.', 'Avec l\'aide de l\'adulte, l\'élève arrive à écrire les lettres majuscules/minuscules à partir d\'un modèle.', 'L\'élève n\'écrit pas de lettres majuscules/minuscules à partir d\'un modèle.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(212, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Écrit les lettres majuscules/minuscules de mémoire', 'L\'élève écrit les lettres majuscules/minuscules de mémoire.', 'Avec aide, l\'élève arrive à écrire certaines lettres majuscules/minuscules de mémoire.', 'L\'élève ne peut pas écrire de lettre majuscules/munuscules de mémoire.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(213, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Écrit des chiffres de mémoire', 'L\'élève écrit des chiffres de mémoire.', 'Avec aide, l\'élève arrive à écrire quelques des chiffres de mémoire.', 'L\'élève ne peut pas écrire des chiffres de mémoire.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(214, 1, 'Habiletés académiques-Lecture-Pré-écriture', 'Écrit son prénom de mémoire', 'L\'élève écrit son prénom de ménoire', 'Avec aide, l\'élève arrive à écrire son prénom de mémoire', 'L\'élève n\'est pas capable d\'écrire son prénom de mémoire', '2024-04-17 01:47:40', '2024-04-18 12:04:01'),
(215, 1, 'Habiletés Sociales-Développement social et personnel', 'Conscience de soi-Se regarde dans un miroir, sourit/joue avec son reflet d\'image', 'L\'élève sourit/joue avec son reflet d\'image dans un miroir.', 'L\'éléve réagit peu avec son reflet d\'image dans un miroir.', 'L\'élève ne montre aucune réaction quand il regarde son reflet d\'image dans un miroir.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(216, 1, 'Habiletés Sociales-Développement social et personnel', 'Conscience de soi-identifie ses effets personnels (pointe ou les apporte a l\'adulte)', 'L\'élève est capable d\'identifier ses effets personnels (pointe ou les apporte à l\'adulte).', 'Avec aide, l\'élève est capable d\'identifier quelques uns de ses effets personnels (pointer ou les apporter à l\'adulte).', 'L\'élève n\'est pas capable d\'identifier ses effets personnels (pointer ou les apporter à l\'adulte).', '2024-04-17 01:47:40', '2024-04-18 14:04:25'),
(217, 1, 'Habiletés Sociales-Développement social et personnel', 'Conscience de soi-Fait référence à lui-même par Je ou Moi', 'L\'élève a la conscience de lui-meme, il est capable de faire référence à lui-même par \"Je\" ou \"Moi\".', 'L\'élève montre peu de conscience de lui-meme, il a parfois de la difficulté à faire référence à lui-même par \"Je\" ou \"Moi\".', 'L\'élève n\'a pas la conscience de lui-meme, il n\'est pas capable de faire référence à lui-même par \"Je\" ou \"Moi\". ', '2024-04-17 01:47:40', '2024-04-18 13:59:18'),
(218, 1, 'Habiletés Sociales-Développement social et personnel', 'Conscience de soi-Dit son age ou montre avec ses doitgs', 'L\'élève est capable de dire son âge ou de montrer son âge avec ses doitgs.', 'L\'élève a de la difficulté à dire son âge ou à montrer son âge avec ses doitgs, il a besoin de l\'aide de l\'adulte.', 'L\'élève n\'est pas capable de dire son âge ou de montrer son âge avec ses doitgs malgré l\'aide de l\'adulte. ', '2024-04-17 01:47:40', '2024-04-18 14:06:53'),
(219, 1, 'Habiletés Sociales-Développement social et personnel', 'Conscience de soi-Identifie /Indique des propres sentiments et émotions', 'L\'élève est capable d\'identifier et/ou indiquer ses propres sentiments et émotions.', 'Avec l\'aide de l\'adulte, l\'élève est capable d\'identifier et/ou indiquer ses propres sentiments et émotions.', 'L\'élève n\'est pas capable d\'identifier et/ou indique ses propres sentiments et émotions malgré l\'aide de l\'adulte.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(220, 1, 'Habiletés Sociales-Développement social et personnel', 'Vérifie son apparence et corrige son habillement /Etat', 'L\'élève maintien son aspect propre et soigné, il vérifie son apparence et corrige son habillement', 'Avec aide, l\'élève arrive parfois à maintenir son aspect propre et soigné, ou à vérifier son apparence et corriger son habillement.', 'L\'élève ne maintien pas son aspect propre et soigné, il ne vérifie pas son apparence et ne corrige pas son habillement. ', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(221, 1, 'Habiletés Sociales-Développement social et personnel', 'Répond a des expériences visuelles, auditives, olfactive et de gout', 'L\'élève répond à des expériences visuelles, auditives, olfactive et de gout.', 'Avec l\'aide de l\'adulte, l\'élève peut répondre à certaines expériences visuelles, auditives, olfactive et de gout.', 'L\'élève ne répond pas à des expériences visuelles, auditives, olfactive et de gout.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(222, 1, 'Habiletés Sociales-Développement social et personnel', 'Démontre de l\'intérêt face aux autres-émets des sons, va vers les autres', 'Sur le plan des interactions cociales, l\'élève montre d\'intérêt aux autres.', 'Avec aide, l\'élève montre peu d\'intérêt aux autres; Les habilités sociales sont en cours d\'acquisition.', 'Sur le plan des interactions sociales, l\'élève ne montre pas d\'intérêt aux autres. ', '2024-04-17 01:47:40', '2024-04-18 14:09:03'),
(223, 1, 'Habiletés Sociales-Développement social et personnel', 'Essaie d\'attirer l\'attention des autres (vocalisations, gestes…)', 'L\'élève essaie d\'attirer l\'attention de ses pairs par des paroles, vocalisations ou gestes.', 'L\'élève essaie parfois d\'attirer l\'attention de ses pairs par des paroles, vocalisations ou gestes.', 'L\'élève n\'essaie pas d\'attirer l\'attention de ses pairs ni par des paroles, ni par des vocalisations, ni par des gestes.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(224, 1, 'Habiletés Sociales-Développement social et personnel', 'Démontre de l\'intérêt aux jouets', 'L\'élève montre de l\'intérêt aux jouets.', 'L\'élève montre parfois de l\'intérêt aux jouets.', 'L\'élève ne montre pas d\'intérêt aux jouets. ', '2024-04-17 01:47:40', '2024-04-18 14:10:59'),
(225, 1, 'Habiletés Sociales-Développement social et personnel', 'Joue de facon indépendante et appropriée', 'L\'élève joue de façon indépendante et appropriée.', 'Avec l\'aide de l\'adulte, l\'élève peut jouer de façon appropriée.', 'L\'élève ne joue pas de façon indépendante et appropriée.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(226, 1, 'Habiletés Sociales-Développement social et personnel', 'Joue avec les pairs', 'L\'élève joue aisément avec ses pairs.', 'Avec aide, l\'élève arrive à jouer parfois avec ses pairs.', 'L\'élève ne joue pas avec ses pairs. ', '2024-04-17 01:47:40', '2024-04-18 14:12:23'),
(227, 1, 'Habiletés Sociales-Développement social et personnel', 'Participe aux activités de jeux de groupe', 'L\'élève participe spontanément aux activités de jeux de groupe.', 'L\'élève participe aux activités de jeux de groupe avec le support de l\'adulte.', 'L\'élève ne participe pas aux activités de jeux de groupe.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(228, 1, 'Habiletés de Motricité-Fine', 'Tient un objet dans chaque main', 'L\'élève peut tenir un objet dans chaque main.', 'L\'élève peut tenir un object dans seulement une main.', 'L\'élève ne peut pas tenir d\'objects dans ses mains.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(229, 1, 'Habiletés de Motricité-Fine', 'Transvase des objets d\'un contenant à un autre moyen', 'L\'élève transvase des objets d\'un contenant à un autre.', 'Avec l\'aide de l\'adulte, l\'élève peut transvaser des objets d\'un contenant à un autre.', 'Malgré l\'aide de l\'audlte, l\'élève ne transvase pas d\'objets d\'un contenant à un autre.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(230, 1, 'Habiletés de Motricité-Fine', 'Transvase du sable d\'un conteneant à un autre', 'L\'élève transvase du sable d\'un contenant à un autre.', 'Avec l\'aide de l\'adulte, l\'élève peut transvaser du sable d\'un contenant à un autre.', 'Malgré l\'aide de l\'adulte, l\'élève ne transvase pas de sable d\'un contenant à un autre.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(231, 1, 'Habiletés de Motricité-Fine', 'Décroche des pictogrammes avec ses mains', 'L\'élève est capable de décrocher des pictos avec ses mains', 'Avec le support de l\'adulte, l\'élève arrive à décrocher des pictos avec ses mains', 'Malgré le support de l\'adulte, l\'élève n\'est pas capable de décrocher des pictos avec ses mains. ', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(232, 1, 'Habiletés de Motricité-Fine', 'Enfile des perles-Moyennes- Petites', 'L\'élève est capable d\'enfiler des perles.', 'Avec le support de l\'adulte, l\'élève peut enfiler des perles.', 'Malrgé le support de l\'adulte, l\'élève n\'est pas capable d\'enfiler des perles.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(233, 1, 'Habiletés de Motricité-Fine', 'Aligne et empile des légos', 'L\'élève aligne et empile seul des légos.', 'Avec l\'aide de l\'adulte, l\'élève réussit à aligner et empiler des légos.', 'Malgré l\'aide de l\'adulte, l\'élève ne réussit pas à aligner et emplier des légos.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(234, 1, 'Habiletés de Motricité-Fine', 'Tient le crayon adéquatement', 'L\'élève tient le crayon adéquatement.', 'L\'élève réussit parfois à tenir le crayon adéquatement.', 'L\'élève ne réussit pas à tenir le crayon adéquatement.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(235, 1, 'Habiletés de Motricité-Fine', 'Suit visuellement un objet', 'L\'élève suit visuellement un objet .', 'Avec aide, l\'élève arrive à furtivement suivre des yeux un objet', 'L\'élève ne suit pas visuellement un objet.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(236, 1, 'Habiletés de Motricité-Fine', 'Place ses ciseaux sur ses doigts et les tient correctement', 'L\'élève place ses ciseaux sur ses doigts et les tient correctement.', 'L\'élève à besoin d\'aide pour placer ses ciseaux sur ses doigts et les tenir correctement.', 'L\'élève n\'est pas capable de placer ses ciseaux sur ses doigts et de les tenir correctement.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(237, 1, 'Habiletés de Motricité-Fine', 'Utilise une cuillère en plastique', 'L\'élève est capable d\'utiliser une cuillère en plastique', 'Avec aide, l\'élève est capable d\'utiliser une cuillière en plastique', 'L\'élève n\'est pas capable d\'utiliser une cuillère en plastique', '2024-04-17 01:47:40', '2024-04-18 12:02:39'),
(238, 1, 'Habiletés de Motricité-Fine', 'Ramasse des objets ou matériaux d\'une boite sensorielle (riz, pâtes, semoule )', 'L\'élève réussit à ramasser des objets ou matériaux d\'une boite sensorielle (riz, pâtes, semoule ).', 'Sans aide, l\'élève a de la dfifficulté à ramasser des objets ou matériaux d\'une boite sensorielle (riz, pâtes, semoule )', 'Même avec aide de l\'adulte, l\'élève ne réussit pas à ramasser des objets ou matériaux d\'une boite sensorielle (riz, pâtes, semoule ).', '2024-04-17 01:47:40', '2024-04-18 14:15:41'),
(239, 1, 'Habiletés de Motricité-Fine', 'Dévisser une bouteille', 'L\'élève est capable de dévisser une bouteille.', 'L\'élève à de la difficulté à dévisser une bouteille.', 'L\'élève n\'est pas capable de dévisser une bouteille.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(240, 1, 'Habiletés de Motricité-Fine', 'Allume et éteint la lumière avec un interrupteur', 'L\'élève sait allumer et éteindre la lumière avec un interrupteur. L\'élève a de la difficulté à allumer et éteindre la lumière avec un interrupteur.', 'L\'élève ne sait pas allumer et éteindre la lumière avec un interrupteur.', '', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(241, 1, 'Habiletés de Motricité-Globale', 'Monte/Descend les marches', 'L\'élève monte/descend les marches seul.', 'Avec aide, l\'élève peut monter/descendre des marches', 'L\'élève ne peut pas monte/descend les marches seul.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(242, 1, 'Habiletés de Motricité-Globale', 'Court/Grimpe/Saute', 'L\'élève court, grimpe et saute de manière autonome.', 'Avec aide, l\'élève arrive à courir, grimper, et sauter', 'L\'élève n\'arrive pas à courir, grimper et/ou sauter.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(243, 1, 'Habiletés de Motricité-Globale', 'Lance /Attrape le ballon', 'L\'élève arrive à lancer et/ou attraper le ballon.', 'L\'élève a de la difficulté à lancer et/ou attraper le ballon.', 'L\'élève n\'arrive pas à lancer et/ou attraper pas le ballon.', '2024-04-17 01:47:40', '2024-04-17 01:47:40'),
(244, 1, 'Habiletés de Motricité-Globale', 'Donne un coup de pied au ballon Dribble', 'L\'élève est capable de donner un coup de pied et/ou dribble avec le ballon.', 'L\'élève a quelques difficultés à donner un coup de pied et/ou dribble le ballon, même avec l\'aide des pairs/adultes.', 'L\'élève ne donne pas de coup de pied et ne dribble pas avec le ballon.', '2024-04-17 01:47:40', '2024-04-18 14:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `observations` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`classroom_id`, `student_id`, `academic_year`, `observations`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-2024', '', '2024-04-05 01:52:09', '2024-04-05 01:52:09'),
(1, 3, '2023-2024', '', '2024-04-05 14:59:17', '2024-04-05 14:59:17'),
(4, 4, '2016-2017', '', '2024-04-11 00:46:31', '2024-04-11 00:46:31'),
(4, 4, '2004-2005', '', '2024-04-11 00:47:31', '2024-04-11 00:47:31'),
(3, 4, '2016-2017', '', '2024-04-11 00:47:52', '2024-04-11 00:47:52'),
(3, 4, '2007-2008', '', '2024-04-11 00:48:18', '2024-04-11 00:48:18'),
(1, 1, '2011-2012', '', '2024-04-11 01:01:46', '2024-04-11 01:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NnFSVdzZGamXfATrqK9TAFZdvoKom6R7DzWvW7sT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoid25uZ0NJR0E5bXFwZ2M1cWRRUjlVZjBUV1V5VllWUTFSZ1cxSkFWTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1713479680),
('peLJMUA2ZgKsBD4fhygrBLauGCfW1WCOPIZcB6Kn', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUDNXUkFqODVrWjUyTUk3Qzdad21kRmlXQTFtMU9JbmJnYndBcG1hYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRiVi5pamRaVElobi9nR2NkZWxQRHhlUktwVkZOc1J0aDRuL3hGUGt4clRGeHFIUkRRWVdDYSI7fQ==', 1713815672),
('wmQ2i79DtzpdYoheFeNeDzDSOU507x2nbt5GswJH', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVFZFb0hFVHpmZ0dMSUFYR0FGYUNiSjNsRlV6cEdyZkZOZUc4cjNNRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50cy8xL2V2YWx1YXRpb24vMT9heT0yMDIzLTIwMjQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRiVi5pamRaVElobi9nR2NkZWxQRHhlUktwVkZOc1J0aDRuL3hGUGt4clRGeHFIUkRRWVdDYSI7fQ==', 1713459403);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `previous_school` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `medical_history` text NOT NULL,
  `allergies` text NOT NULL,
  `decision` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `date_of_birth`, `place_of_birth`, `gender`, `nationality`, `address`, `city`, `email`, `phone`, `previous_school`, `blood_group`, `medical_history`, `allergies`, `decision`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Felidji', 'FELIX', '1984-09-16', 'Mirebalais', 'Masculin', 'Haiti', 'Parcelles-Assainies, Unité 9', 'Dakar', 'mehaq@mailinator.com', '+1 (376) 914-8554', 'Consequatur ullamco ', 'A+', 'Facilis mollitia non', 'Non odit tempor veli', 'Spécialisée', 1, '2024-04-04 16:36:43', '2024-04-04 23:14:14'),
(2, 'Praesentium Accus', 'DESERUNT VOLUPTATIBU', '1975-02-13', 'Quaerat dolor aliqua', 'Select a gender...', 'Sénégal', 'Aut aperiam voluptat', 'Cupiditate voluptate', 'wicubaf@mailinator.com', '+1 (101) 254-8931', 'Nisi laudantium qui', 'Sélectionner un GS...', 'Molestiae nihil temp', 'Praesentium ex ratio', 'Régulière', 1, '2024-04-04 23:48:16', '2024-04-11 16:02:59'),
(3, 'Elimhane', 'LY', '2021-09-24', 'Ipsum nostrud aute u', 'Féminin', 'France', 'Sit tenetur ex culp', 'In quia labore id de', 'nufix@mailinator.com', '+1 (459) 253-1975', 'Ipsa incidunt saep', 'O+', 'Sunt doloremque exce', 'Reprehenderit aute ', 'Spécialisée', 2, '2024-04-05 14:58:00', '2024-04-05 14:58:00'),
(4, 'Cheikh', 'SENE', '2007-12-19', 'Oussouye', 'Masculin', 'Sénégal', 'Cillum ipsa sed qui', 'Doloribus officia pe', 'luzesa@mailinator.com', '+1 (281) 633-6766', 'Dolor nisi obcaecati', 'A+', 'Eos sit explicabo', 'Voluptas sapiente do', 'Régulière', 2, '2024-04-09 13:56:31', '2024-04-09 13:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` double(8,2) NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `category`, `label`, `value`, `classroom_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(9, 'Mathématique', 'Informatique', 29.00, 3, 1, '2024-04-05 11:57:36', '2024-04-05 11:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Progression des apprentissages', 'La grille de progression des apprentissages permet de suivre l\'évolution des élèves qui sont en classe Indigo.', '2024-04-05 00:25:22', '2024-04-05 00:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_1` varchar(255) NOT NULL,
  `phone_2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `speciality`, `email`, `phone_1`, `phone_2`, `created_at`, `updated_at`) VALUES
(1, 'Boubacar', 'Ndiaye', 'Aut nobis porro dolo', 'tejali@mailinator.com', '+1 (152) 315-4144', '+1 (935) 106-8864', '2024-04-05 13:00:37', '2024-04-14 15:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cassandra\'s Team', 1, '2024-04-03 13:39:52', '2024-04-03 13:39:52'),
(2, 2, 'Cynthia\'s Team', 1, '2024-04-05 14:53:04', '2024-04-05 14:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tuitions`
--

CREATE TABLE `tuitions` (
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tuitions`
--

INSERT INTO `tuitions` (`classroom_id`, `student_id`, `academic_year`, `label`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-2024', 'Inscription', 130000, '2024-04-18 00:44:26', '2024-04-18 00:44:26'),
(1, 3, '2023-2024', 'Inscription', 10000, '2024-04-18 01:27:48', '2024-04-18 01:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `duty_station` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `first_name`, `last_name`, `relationship`, `nationality`, `address`, `occupation`, `duty_station`, `email`, `phone`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'Wilfa', 'FELIX', 'Père', 'Nigéria', 'Parcelles Assainies, Unité 9', 'Gestionnaire d\'entreprise', 'ToShare', 'fwilfa@yahoo.fr', '+1 (244) 833-2027', 1, '2024-04-04 18:05:14', '2024-04-04 18:34:24'),
(2, 'Claudia', 'Novembre', 'Tuteur', 'Sénégal', 'Odit ea in veniam e', 'In laboriosam aliqu', 'Tempore deserunt ra', 'Reprehenderit simili', '+1 (201) 976-6199', 1, '2024-04-04 18:06:43', '2024-04-04 18:06:43'),
(3, 'Delectus mollit non', 'Mollitia nulla disti', 'Mère', 'Nigéria', 'Nemo doloribus esse', 'Et dolores sed conse', 'Facilis autem facere', 'Odio dolores velit c', '+1 (449) 855-4694', 1, '2024-04-04 18:07:46', '2024-04-04 18:07:46'),
(4, 'Mouhamed', 'SENE', 'Père', 'Nigéria', 'Nostrum ullamco et d', 'Minus ex illum cons', 'Asperiores debitis q', 'Laudantium voluptat', '+1 (874) 823-6327', 4, '2024-04-09 13:57:15', '2024-04-09 13:57:15'),
(5, 'Fatou', 'Ndiaye', 'Tuteur', 'Nigéria', 'Magni modi dolore co', 'Rerum ut commodi rer', 'Sunt est cupiditate ', 'Facilis sunt quidem', '+1 (248) 568-3373', 4, '2024-04-09 13:58:51', '2024-04-09 13:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Cassandra Rivera', 'menendezon@gmail.com', NULL, '$2y$12$W1DsW5A3SixKyOdoP8Xeoer/c1x8oIDocCBTyz/Hp6731VZ.FCugS', NULL, NULL, NULL, NULL, 1, NULL, '2024-04-03 13:39:51', '2024-04-03 13:39:58'),
(2, 'Cynthia', 'cynthia@gmail.com', NULL, '$2y$12$bV.ijdZTIhn/gGcdelPDxeRKpVFNsRth4n/xFPkxrTFxqHRDQYWCa', NULL, NULL, NULL, NULL, 2, NULL, '2024-04-05 14:53:04', '2024-04-05 14:53:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_question_id_foreign` (`question_id`),
  ADD KEY `options_student_id_foreign` (`student_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_survey_id_foreign` (`survey_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `tuitions`
--
ALTER TABLE `tuitions`
  ADD PRIMARY KEY (`classroom_id`,`student_id`,`academic_year`,`label`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=536;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `options_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
