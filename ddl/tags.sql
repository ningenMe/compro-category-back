-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 
-- サーバのバージョン： 10.3.16-MariaDB
-- PHP のバージョン: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `compro_category`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `tags`
--

CREATE TABLE `tags` (
  `topic_id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `tags`
--

INSERT INTO `tags` (`task_id`, `topic_id`) VALUES
(1, 11),
(2, 55),
(3, 10),
(4, 19),
(5, 162),
(6, 36),
(7, 38),
(8, 25),
(9, 101),
(10, 59),
(11, 46),
(12, 140),
(13, 44),
(14, 10),
(15, 97),
(16, 163),
(17, 132),
(18, 27),
(19, 16),
(20, 21),
(21, 26),
(22, 55),
(23, 13),
(24, 96),
(25, 164),
(26, 106),
(27, 135),
(28, 43),
(29, 35),
(30, 109),
(31, 167),
(32, 97),
(33, 156),
(34, 13),
(35, 58),
(36, 39),
(37, 131),
(38, 13),
(39, 160),
(40, 125),
(41, 126),
(42, 126),
(43, 126),
(44, 168),
(45, 130),
(47, 169),
(48, 127),
(49, 127),
(50, 128),
(51, 128),
(52, 128),
(53, 129),
(54, 129),
(55, 129),
(57, 170),
(58, 171),
(59, 160),
(60, 172),
(61, 143),
(62, 160),
(63, 27),
(64, 173),
(65, 174),
(66, 8),
(67, 10),
(68, 10),
(69, 22),
(70, 61),
(71, 175),
(72, 98),
(73, 1),
(74, 3),
(75, 169),
(76, 109),
(77, 36),
(78, 9),
(79, 9),
(80, 9),
(81, 9),
(82, 10),
(84, 10),
(85, 10),
(86, 10),
(87, 10),
(88, 110),
(89, 10),
(90, 10),
(91, 10),
(92, 10),
(93, 11),
(94, 11),
(95, 11),
(96, 11),
(97, 1),
(98, 170),
(99, 170),
(100, 1),
(101, 170),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 160),
(108, 10),
(109, 22),
(110, 2),
(111, 2),
(112, 2),
(113, 87),
(114, 2),
(115, 2),
(116, 3),
(117, 3),
(118, 3),
(119, 4),
(120, 4),
(121, 5),
(122, 6),
(123, 7),
(124, 7),
(125, 1),
(126, 7),
(127, 7),
(128, 7),
(129, 7),
(130, 7),
(131, 7),
(132, 7),
(133, 8),
(134, 8),
(135, 8),
(136, 12),
(137, 12),
(138, 12),
(139, 12),
(140, 13),
(141, 13),
(142, 13),
(143, 13),
(144, 13),
(145, 13),
(146, 13),
(147, 13),
(148, 13),
(149, 14),
(150, 15),
(151, 16),
(152, 16),
(153, 142),
(154, 16),
(155, 26),
(156, 26),
(157, 26),
(158, 26),
(159, 26),
(160, 17),
(161, 17),
(162, 173),
(163, 35),
(164, 18),
(165, 10),
(166, 173),
(167, 18),
(168, 19),
(169, 18),
(170, 18),
(171, 19),
(173, 20),
(174, 20),
(175, 21),
(176, 21),
(177, 21),
(178, 21),
(179, 21),
(180, 21),
(181, 22),
(182, 176),
(183, 22),
(184, 22),
(185, 22),
(186, 23),
(187, 23),
(188, 23),
(189, 24),
(190, 24),
(191, 23),
(192, 24),
(193, 24),
(194, 43),
(195, 25),
(196, 25),
(197, 43),
(198, 171),
(199, 27),
(200, 27),
(201, 29),
(202, 27),
(203, 27),
(204, 27),
(205, 28),
(206, 29),
(207, 29),
(212, 35),
(213, 30),
(214, 30),
(215, 35),
(217, 30),
(218, 32),
(219, 32),
(220, 32),
(221, 32),
(222, 150),
(223, 33),
(224, 33),
(225, 33),
(226, 34),
(227, 34),
(228, 34),
(229, 35),
(230, 35),
(231, 160),
(232, 35),
(233, 35),
(234, 35),
(235, 30),
(236, 35),
(237, 36),
(238, 37),
(239, 38),
(240, 38),
(241, 38),
(242, 38),
(243, 39),
(244, 39),
(245, 39),
(246, 39),
(247, 39),
(248, 39),
(249, 39),
(250, 39),
(251, 177),
(252, 162),
(253, 162),
(254, 160),
(255, 42),
(256, 41),
(257, 40),
(258, 40),
(259, 40),
(260, 40),
(261, 161),
(262, 178),
(263, 178),
(264, 164),
(265, 178),
(266, 45),
(267, 45),
(268, 46),
(269, 47),
(270, 47),
(271, 47),
(272, 48),
(273, 49),
(274, 49),
(275, 70),
(276, 10),
(277, 53),
(278, 54),
(279, 55),
(280, 56),
(281, 166),
(282, 67),
(283, 68),
(284, 179),
(285, 58),
(286, 58),
(287, 58),
(288, 58),
(289, 58),
(290, 59),
(291, 59),
(292, 60),
(293, 61),
(294, 61),
(295, 62),
(296, 63),
(297, 64),
(298, 69),
(299, 69),
(300, 70),
(301, 71),
(302, 72),
(303, 65),
(304, 66),
(305, 86),
(306, 87),
(307, 88),
(308, 89),
(309, 90),
(310, 92),
(311, 180),
(312, 180),
(313, 93),
(314, 181),
(315, 94),
(316, 182),
(317, 183),
(318, 95),
(319, 183),
(320, 183),
(321, 183),
(322, 184),
(323, 185),
(324, 186),
(325, 186),
(326, 95),
(327, 95),
(328, 95),
(329, 95),
(330, 110),
(331, 111),
(332, 112),
(333, 112),
(334, 113),
(335, 114),
(336, 96),
(337, 96),
(338, 96),
(339, 96),
(340, 96),
(341, 96),
(342, 96),
(343, 97),
(344, 97),
(345, 98),
(346, 99),
(347, 99),
(348, 99),
(349, 100),
(350, 102),
(351, 102),
(352, 103),
(353, 108),
(354, 107),
(355, 106),
(356, 3),
(357, 7),
(358, 187),
(359, 149),
(360, 115),
(361, 115),
(362, 116),
(363, 116),
(364, 116),
(365, 116),
(366, 116),
(367, 116),
(368, 116),
(369, 117),
(370, 117),
(371, 118),
(372, 119),
(374, 119),
(375, 121),
(376, 120),
(377, 121),
(378, 121),
(379, 122),
(380, 123),
(381, 123),
(382, 123),
(383, 124),
(384, 133),
(385, 134),
(386, 136),
(387, 137),
(388, 138),
(389, 138),
(390, 138),
(391, 139),
(392, 139),
(393, 140),
(394, 140),
(395, 140),
(396, 141),
(397, 142),
(398, 143),
(399, 143),
(400, 144),
(401, 145),
(402, 145),
(403, 146),
(404, 146),
(405, 146),
(406, 147),
(407, 149),
(408, 149),
(409, 149),
(410, 149),
(411, 149),
(412, 149),
(413, 150),
(414, 151),
(415, 152),
(416, 152),
(417, 153),
(418, 153),
(419, 154),
(420, 154),
(421, 156),
(423, 156),
(424, 156),
(426, 156),
(427, 157),
(428, 157),
(429, 157),
(430, 158),
(431, 158),
(432, 158),
(433, 158),
(434, 158),
(435, 158),
(436, 158),
(437, 143),
(438, 188),
(439, 1),
(440, 22),
(441, 117),
(442, 176),
(443, 189),
(444, 178),
(445, 58),
(447, 178),
(448, 149),
(449, 117),
(450, 190),
(451, 177),
(452, 35),
(453, 7),
(454, 96),
(455, 34),
(456, 32),
(457, 47),
(458, 29),
(459, 60),
(460, 158),
(461, 13),
(462, 191),
(463, 125),
(464, 109),
(465, 157),
(466, 24),
(467, 10),
(468, 47),
(469, 99),
(470, 160),
(471, 162),
(472, 158),
(473, 192),
(474, 58),
(475, 116),
(476, 183),
(477, 116),
(478, 101),
(479, 40),
(480, 193),
(481, 41),
(482, 194),
(483, 117),
(484, 54),
(485, 195),
(486, 58),
(487, 195),
(488, 196),
(489, 197),
(490, 3),
(491, 13),
(492, 125),
(493, 198),
(494, 13),
(495, 149),
(496, 199),
(497, 200),
(498, 39),
(499, 201),
(500, 177),
(501, 202),
(502, 203),
(503, 96),
(504, 96),
(505, 178),
(506, 95),
(507, 132),
(508, 18),
(510, 27),
(511, 116),
(512, 125),
(513, 115),
(514, 40),
(515, 54),
(516, 69),
(517, 67),
(518, 204),
(519, 96),
(520, 205),
(521, 171),
(522, 27),
(523, 202),
(524, 202),
(525, 137),
(526, 106),
(527, 206),
(528, 207),
(529, 208),
(530, 209),
(531, 3),
(532, 7),
(533, 32),
(534, 149),
(535, 191),
(536, 24),
(537, 152),
(538, 7),
(539, 24),
(540, 210),
(541, 144),
(542, 183),
(543, 158),
(544, 211),
(545, 128),
(546, 13),
(547, 212),
(548, 207),
(549, 156),
(550, 195),
(551, 213),
(552, 25),
(553, 196),
(554, 140),
(555, 151),
(557, 24),
(558, 214),
(559, 215),
(560, 216),
(561, 40),
(562, 217),
(563, 156),
(564, 195),
(565, 11),
(566, 218),
(567, 218),
(568, 122),
(569, 47),
(570, 194),
(571, 219),
(572, 220),
(573, 13),
(574, 30),
(575, 221),
(576, 221),
(577, 37),
(578, 222),
(579, 160),
(580, 35),
(581, 224),
(582, 225),
(583, 226),
(585, 210),
(586, 227),
(587, 228),
(588, 158),
(589, 70),
(590, 108),
(591, 223),
(592, 229),
(593, 230),
(594, 230),
(595, 231),
(596, 27),
(597, 232),
(598, 168),
(599, 189),
(600, 163),
(601, 27),
(602, 96),
(603, 30),
(604, 27),
(605, 233),
(606, 32),
(607, 233),
(608, 233),
(609, 233),
(610, 35),
(611, 233),
(612, 28),
(613, 234),
(614, 235),
(615, 39),
(616, 153),
(617, 106),
(618, 160),
(619, 10),
(620, 106),
(621, 236),
(622, 237),
(623, 27),
(624, 238),
(625, 30),
(626, 96),
(627, 239),
(628, 178),
(629, 124),
(631, 67),
(632, 7),
(633, 40),
(635, 240),
(636, 6),
(637, 29),
(638, 119),
(639, 26),
(640, 10),
(641, 97),
(642, 241),
(643, 32),
(644, 32),
(645, 242),
(646, 17),
(647, 69),
(648, 33),
(649, 171),
(650, 192),
(651, 160),
(652, 90),
(653, 47),
(654, 163),
(655, 116),
(656, 106),
(657, 243),
(658, 22),
(659, 13),
(660, 40),
(662, 1),
(663, 244),
(664, 95),
(665, 37),
(666, 231),
(667, 245),
(668, 13),
(669, 231),
(670, 246),
(671, 216),
(672, 231),
(673, 36),
(675, 4),
(676, 244),
(677, 201),
(678, 175),
(679, 158),
(680, 206),
(681, 162),
(682, 168),
(683, 247),
(684, 21),
(685, 157),
(686, 97),
(687, 69),
(688, 248),
(689, 247),
(690, 27),
(691, 178),
(692, 206),
(693, 121),
(694, 249),
(695, 156),
(696, 250),
(697, 116),
(698, 251),
(699, 247),
(700, 29),
(701, 29),
(702, 234),
(703, 30);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`topic_id`,`task_id`);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
