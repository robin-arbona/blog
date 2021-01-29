-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 29, 2021 at 12:09 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(6, 'Alamannorum excursibus Gundomadum dum petit', 'Reserato crebris Valentiam in dum moturus in Valentiam petit diu limitibus quorum Constantius Arelate septies diu dum suo fratres et terrae caeli ter confines dum caeli Vadomarium suo tepore diu Caesaris moturus petit excursibus Gallorum fratres Alamannorum moturus confines Vadomarium ter fratres fratres reserato Constantius Arelate consulatu crebris arma oriens perferret Valentiam in petit Caesaris reserato confines et excursibus caeli in moturus Caesaris Vadomarium Valentiam perferret oriens in septies petit quorum Vadomarium Gallorum Arelate oriens diu confines terrae in crebris perferret vastabantur Valentiam excursibus Valentiam in et septies Alamannorum Vadomarium Alamannorum excursibus Gundomadum dum petit reserato petit tepore consulatu reserato.\r\n', 1, 1, '2021-01-20 07:57:37'),
(7, 'Triari inquam potest Epicureum probes contumeliae', 'Quid tum Quam rem videri solent probarem quid probarem inquam Quam indignae inter nullo in quid ob Epicureum tum probes in diceret contumeliae contentiones disputando esse non nullo esse probes Triari inquam potest Epicureum probes contumeliae perdiscere esse mihi concertationesque dicas ludus solent pacto enim probes Quam a quid mihi diceret philosophia prohiberet vituperandae mihi praesertim non enim inquam inquam solent philosophia prohiberet enim me diceret maledicta ille dissentias ludus maledicta nullo perdiscere cum Epicureum ludus non solent non quid non enim ut indignae tum ut quo indignae contentiones esse indignae a praesertim inter rem nullo si ille se quid.\r\n', 2, 2, '2021-01-20 07:58:32'),
(8, 'Aginatium est fides documentorum est hoc', 'Ad inpulit inpulit causam iam maioribus nunc est nunc super maioribus super est nunc nec exitium rata nec iam nobilem nobilem est arbitror documentorum explanare arbitror ut documentorum Aginatium quae hoc Aginatium est fides documentorum est hoc praecipitem a ad explanare ut est nunc est causam inpulit enim causam causam nunc arbitror hoc arbitror documentorum nec inde ut arbitror exitium rata iam pertinacior explanare ad est nec pertinacior est enim exitium nec est praecipitem documentorum pertinacior ulla inde priscis priscis locuta praecipitem exitium quae arbitror maioribus explanare exitium nobilem hoc priscis nec iam inde est quae a inde quae nobilem.\r\n', 1, 3, '2021-01-20 08:00:03'),
(9, 'Inquit tui in conspectum ambage in diem iubebo', 'Tuas cessaveris venit praegressa praegressa consistorium prope et proficiscere consistorium postea iubebo ultimum ad praeceptum auferri et leviter ad in ultimum diem inconsiderate praeceptum admissusque proficiscere eius inquit arcessitus et postea et arcessitus ad subiratus ambage ad cessaveris dicto diem contumaciter sciens est in hocque ultimum saepius praeceptum quod admissusque saepius diem inconsiderate tui ultimum abscessit solo ut inquit tui leviter saepius prope annonas in cessaveris subiratus prope auferri consistorium iubebo abscessit ambage auferri admissusque venit in cessaveris ut inquit tui in conspectum ambage in diem iubebo nec inconsiderate saepius Caesar admissusque inconsiderate auferri in contumaciter venit et et eius.\r\n', 1, 4, '2021-01-20 08:09:50'),
(10, 'Epigonus illud esse prece metu constantiae sulcatis prece firmavit quicquam confessione non confessione nec in quicquam sulcatis metu esse', 'Epigonus illud esse prece metu constantiae sulcatis prece firmavit quicquam confessione non confessione nec in quicquam sulcatis metu esse admoto expers fuisse nec sulcatis tenus nulla lateribus non cogitatorum audisset forensium clamans fuisse quicquam nec esse iudicium mortisque ut frustra quae apparuit erant forensium philosophus lateribus nulla vidisset nulla latrocinium prece audisset non vero audisset mortisque expers lateribus penitus fuisse socium sulcatis clamans rerum cogitatorum rerum nec quicquam sulcatis nec suspensus suspensus nec forensium firmavit obiecta non quicquam cum amictu fuisse Epigonus obiecta forensium non temptata philosophus quidem admoto stetit sulcatis philosophus forensium obiecta ut metu vidisset quidem esse fuisse.\r\n', 1, 1, '2021-01-20 08:02:29'),
(11, 'Pauloque provenisset sine segetum novimus actitatum ', 'Epigonus illud esse prece metu constantiae sulcatis prece firmavit quicquam confessione non confessione nec in quicquam sulcatis metu esse.\r\nPauloque provenisset sine segetum novimus actitatum inopia ex dedit victus populo ex hunc frumentum est ulla segetum esse Africam regeret provenisset sine esse esse frumentum destinatis regeret indolis est pro segetum actitatum victus mora Carthaginiensibus novimus segetum pro integre frumentum iam negotium tempore provenisset novimus mora Africam textum victus mora Hymetii Africam segetum cum integre pro lassatis segetum cuius novimus restituit provenisset pro inopia copia Hymetii populo iam negotium ex mora cum pauloque hunc segetum novimus Carthaginiensibus lassatis copia etiam sine esse mora consule cum actitatum Africam textum destinatis etiam segetum cum praeclarae hunc provenisset etiam inopia Carthaginiensibus lassatis Hymetii.', 1, 1, '2021-01-20 08:03:08'),
(12, 'Angebat frumenta exitialis vero ipsi solitarum', 'Angebat frumenta exitialis vero ipsi solitarum solitarum navigiis copiis copiis quidem solitarum vehebant quod Isauri quae vehementer inediae propinquantis rerum consumendo consumendo captis navigiis horrebant exitialis clausos captis navigiis Isauri propinquantis ipsi solitarum exitialis propinquantis aerumnas horrebant per inediae Isauri alimentorum aerumnas vehementer quidem iam tamen per horrebant tamen Isauri copiis quae aerumnas consumendo aerumnas captis Isauri angebat navigiis exitialis horrebant solitarum Isauri Isauri consumendo ipsi flumen angebat inediae clausos navigiis frumenta copiis per ipsi ipsi quae vehementer per vehementer angebat clausos rerum ipsi quidem navigiis quae navigiis tamen ipsi alimentorum clausos propinquantis rerum clausos alimentorum propinquantis exitialis quod ipsi.\r\n', 1, 2, '2021-01-20 08:10:42'),
(13, 'Ut ausus traxit languente deformi ut imperatoris', 'Ut ausus traxit languente deformi ut imperatoris ut ferire ferire cognomentum pluribus excessit genere ausus levare ei defensantem quia mortis mortis excessit erat in quia pluribus eundem communium ausus hocque sortem est unde quia periculorum eum ad sortem inpegit ferire ei ille cognomentum periculorum inpegit periculorum ferire genere est suum ferire quo ferire miserabiles tribunis quibus erat eum erat erat est et districtum dextera quibus multorum percitus imperatoris sortem proprium conplicandis negotiis excessit districtum eum quia dirus in pluribus languente suum hocque ut ei languente deformi suum studium ad sortem cognomentum communium periculorum et praeerat iustissimus studium adhuc urgente ut.', 1, 1, '2021-01-20 08:03:51'),
(14, 'In per vultu strages sub Constanti et Paulus impium reniti eminebat', 'In per vultu strages sub Constanti et Paulus impium reniti eminebat a eminebat Magnentio ferebatur conplurium missus longe Brittanniam vias licentius odorandi consarcinando licentius ac ingenuorum multiplices fortunis est est ingenuorum a ingenuorum ruinas inusserat iussa infudit vias is sese repentinus ortus multiplices missus admissum ruinas infudit is sub cum multa ut ingenuorum eminebat admissum crimina vinculis membra cum modo longe scilicet sagax vinculis cum adfligens vinculis est missus fluminis tempus supergressus repentinus ausos ingenuorum quosdam impium admissum crimina perduceret modo Brittanniam licentius ac crimina obterens ausos quosdam Hispania ausos fluminis discreta in discreta manicis tempus consarcinando Magnentio quosdam impium.\r\n', 1, 1, '2021-01-20 08:04:12'),
(15, 'Multiplices vitae iuvenem fere multiplices vincens ', 'Multiplices vitae iuvenem fere multiplices vincens et aetatem multiplices ex annis quam senium laureas ad ad adultam circumcluditur fretum Alpes ad deinde ad pertulit aetatem senium deinde aetatem Alpes nomine inmensus extremum ex fere ex incunabulis circummurana et ex senium et discessit bella primis trecentis quam trecentis tempus et transcendit senium triumphos ingressus inmensus inmensus fere trecentis senium ambit pertulit incunabulis populus plaga aetatem ingressus adultam omni nomine virum post iuvenem transcendit bellorum in iuvenem aetatem post bellorum Alpes bella primis tranquilliora erectus fere orbis vitae in et vincens vergens post incunabulis discessit quod usque extremum tempus in ingressus inmensus.\r\n', 1, 1, '2021-01-20 08:04:33'),
(16, 'Revocaréi intepescit quod quod haec quod progressu aetatis similia similia adulatorum ob cohorte elogio', '<p>Revocari intepescit quod quod haec quod progressu aetatis similia similia adulatorum ob cohorte elogio accendente in iussisse accendente hoc intepescit addictum ob effervescebat adulatorum revocari aliis fertur iussisse similia propositum principes poenae aetatis principes fertur quoque addictum in illo eius hoc more non obstinatum aliquando fertur effervescebat vitium adulatorum vitium de quod propositum elogio obstinatum progressu propositum principes fertur accendente quod propositum intepescit iussisse adulatorum aliquando quoque similia vel fertur numquam illo eius propositum similia eius intepescit elogio vel more vel elogio obstinatum neminem effervescebat propositum quod progressu illo accendente in aliis in more eius obstinatum effervescebat cohorte iussisse vitium.</p>', 6, 1, '2021-01-22 08:51:51'),
(34, 'Salut coucou', '<p>Photo</p>\r\n<p>&nbsp;</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px;\">ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 6, 4, '2021-01-22 07:38:42'),
(36, 'Huuu', '<p>Yahouu</p>', 6, 3, '2021-01-22 10:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'fashion'),
(2, 'trende'),
(3, 'nude'),
(4, 'photography');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'Oui c\'est vraiment bien', 1, 1, '2021-01-19 10:24:06'),
(5, 'ugv, encore des espaces.', 16, 6, '2021-01-21 09:06:25'),
(6, 'Nouveau commentaire. Pourquoi des espaces ?', 16, 6, '2021-01-21 09:04:43'),
(7, 'YAHOYYYYYYY', 16, 6, '2021-01-20 13:22:18'),
(8, 'YAHOYYYYYYY', 16, 6, '2021-01-20 13:23:36'),
(9, 'test', 16, 6, '2021-01-20 13:24:35'),
(10, 'dernier post', 1, 6, '2021-01-20 13:38:34'),
(14, 'pute', 15, 6, '2021-01-21 08:47:30'),
(15, 'tets', 3, 6, '2021-01-21 13:39:47'),
(16, 'coucou', 15, 6, '2021-01-21 14:17:26'),
(17, 'salut', 6, 7, '2021-01-25 10:01:12'),
(18, 'yahou,', 2, 6, '2021-01-25 12:08:38'),
(19, 'super', 38, 6, '2021-01-25 14:38:47'),
(20, 'hey', 38, 9, '2021-01-25 14:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(1, 'jean', 'francois', 'test', 1),
(2, 'jeanoo', 'francois', 'test', 1),
(3, 'momo', 'francois', 'test', 1),
(4, 'lala', 'francois', 'test', 1),
(5, 'popo', 'francois', 'test', 1),
(6, 'test', '$2y$10$90aYqa1kTF9MirhesVPHLOfTb9Z/NhgrxTe4wQ.JDWlnNN2SH1B86', 'test@gmail.com', 1337),
(7, 'newuse', '$2y$10$bs.RfNsgrPd3s9CtYo2EKOjcredIkJX/IbWIbCvKVpkkJ.lCrcfoS', 'arbona.robin@gmail.com', 42),
(8, 'salut1', '$2y$10$9ipP6SuXVb.zs1k8XTEX6O7OB8PUY66LGm6DtCimeztbN/7jiOuYi', 'arbona.robin@gmail.com', 1),
(9, 'null', '$2y$10$3mmp9OU4Gpnu1ekQKqBGxOCVcCqvoQQC4a1.YAP2pkx8o7fMUSKbK', 'arbona.robin@gmail.com', 1),
(10, 'salutavecdroit', '$2y$10$quD28we2x3dYBCjvxT3Cp.o8qaBubmU7S8E269cybKNvCdDYKz2aS', 'arbona.robin@gmail.com', 1),
(11, 'momotus', '$2y$10$RcPKKKrLuL7N0sT1AOLhc.AasVrxGSQZXsGV6uoeX1H4bxdKcfO36', 'arbona.robin@gmail.com', 1337);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
