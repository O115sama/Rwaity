-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 18 أكتوبر 2022 الساعة 05:17
-- إصدار الخادم: 10.3.36-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rewaefhm_rewaity`
--

-- --------------------------------------------------------

--
-- بنية الجدول `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `id_buyer` int(10) NOT NULL,
  `id_product` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `cart`
--

INSERT INTO `cart` (`id`, `id_buyer`, `id_product`) VALUES
(16, 17, 36),
(17, 17, 9);

-- --------------------------------------------------------

--
-- بنية الجدول `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'دراما'),
(2, 'مغامرات'),
(3, 'جريمة');

-- --------------------------------------------------------

--
-- بنية الجدول `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `communication` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `contact`
--

INSERT INTO `contact` (`id`, `name`, `communication`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'سيف سالم', '0550550556', 'السلام عليكم ، هل يتوفر شحن لتبوك', 0, '2022-09-17', '2022-09-17'),
(2, 'ياسر سعود', '0554055422', 'هل يوجد شحن لخارج السعودية', 1, '2022-09-17', '2022-09-17'),
(3, 'ناصر', '0550550554', 'هل يمكن توفير كتاب اوراق الشجر', 1, '2022-09-17', '2022-09-17'),
(4, 'عبدالله', 'abdullah@gmail.com', 'السلام عليكم', 1, '2022-09-17', '2022-09-17'),
(5, 'سلمان فهد', '0550880332', 'السلام عليكم ', 1, '2022-09-17', '2022-09-17');

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_buyer` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `payment` varchar(120) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `id_buyer`, `id_product`, `payment`, `status`, `created_at`) VALUES
(2, 9, 27, 'تحويل بنكي ', 0, '2022-10-10'),
(3, 9, 11, 'تحويل بنكي ', 1, '2022-10-10'),
(4, 14, 8, 'الدفع عند الاستلام', 0, '2022-10-12'),
(5, 21, 12, 'الدفع عند الاستلام', 0, '2022-10-18');

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `subject` varchar(120) NOT NULL,
  `author` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(120) NOT NULL,
  `id_category` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sold` tinyint(1) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `id_user`, `subject`, `author`, `description`, `image`, `id_category`, `price`, `status`, `sold`, `created_at`) VALUES
(8, 12, 'الرجل الذي لا يمكن تحريكه', 'هيتايروس', 'إنَّ غرابتي لَجزءٌ من غرابةِ تلك القصة؛ قصة أوجدها لي قدَرٌ غريب، والبقية من البشر يجهلون ذلك، حتى أولئك الذين شارَكوني جزءًا منها. كلُّ مَن ضحك عليَّ يجهل ذلك. أنا لا ألومهم؛ فالبشر يجهلون البشر، ولا يعلمون مثلما أعلم؛ أن خلفَ كل إنسانٍ قصة، وأن خلفَ كل قصةٍ قدَرًا، وأن خلفَ كل قدَرٍ إنسانًا، إنسانًا يؤمن بذلك القدر، أو إنسانًا أشبه بي؛ رجلًا لا يمكن تحريكه', 'rg.svg', 1, 100, 1, 1, '2022-09-21'),
(9, 10, 'البحر والغروب وقصص أخرى', 'ميسرة عفيفي', 'في الثامن والعشرين من شهر فبراير للعام الحادي عشر من عصر ميجي (أيْ في اليوم الثالث من وقوع حادث ٢٦ فبراير)، أمسك الملازمُ أول شينجي تاكياما، الضابطُ العامل بقوةِ كتيبة «كونوئه» للنقل، بسيفه العسكري، وانتحر ببَقْر بطنه طِبقًا لطقس السيبوكو، في الغرفة ذات القِطَع الثمانية من حصير التاتامي من مسكنه الخاص، الواقع في أوباتشو بالتجمع السادس بحي يوتسويا، بعد أن عانى طويلًا عندما عرف بعد الحادث أن زملاءَه المقرَّبين كانوا مع المتمرِّدين منذ البداية، فضلًا عن سُخطه لاحتمال اقتتال قوَّات الجيش الإمبراطوري فيما بينها. ولحِقت به زوجتُه ريكو ب', 'bh.svg', 2, 100, 1, 0, '2022-09-21'),
(11, 12, 'مُربي النحل', 'جين ستراتون بورتر', 'تدور أحداثُ هذه الرواية في الطبيعة الخلَّابة لولاية «كاليفورنيا» الأمريكية، في أعقاب الحرب العالمية الأولى. تحكي الرواية قصةَ «جيمي»؛ الجنديِّ الذي يعود من الحرب مُصابًا بجُرحٍ خطيرٍ في صدره، فيظل نزيلًا في المستشفى العسكري إلى أن يَيئس الأطباء من علاجه ويَنووا إرسالَه إلى معسكر مرضى السُّل، فيُقرِّر الهربَ من هذا الحكم بالإعدام. يكابد «جيمي» المشقَّة والصِّعاب على الطريق إلى أن يجد منزل «س', 'mb.svg', 2, 100, 1, 1, '2022-09-21'),
(12, 12, 'الموسيقى', 'يوكيو ميشيما', 'لقد تَعاملتُ في عملي بالتحليل النفسي مع حالاتٍ متنوعة، وكنت أظن أن تَراكُم خبراتي وتدريبي لن يجعلني أندهش من أي حالة. ولكن كلما ازدادَت معرفتي أجد أن عالَم الجنس عند البشر عالَمٌ واسع لا حدودَ له، ويَتعمَّق إحساسي بأنه ليس عاديًّا ولا يَسري على نمطٍ واحد … وأريد من القرَّاء التأكُّد من وضوحِ ذلك الأمر في ذهنهم عند قراءة هذا التقرير.»\n\nيَضم هذا الكتابُ تقريرًا أعدَّه الدكتور «كازونوري شيومي» الطبيبُ النفسي الياباني،', 'mu.svg', 1, 200, 1, 1, '2022-09-22'),
(16, 9, 'المُلاحَق: المسيحي الأخير', 'هاني السالمي', 'نضال الآن أنت تنام بثلاجة الموتى، جلدك بارد جدًّا، رصاصةٌ واحدة فقط هي التي أخذتك عنَّا، توجد فتحة كبيرة خلف رأسك، كأنك أُجبِرت على الموت، وتوجد بقعةٌ حمراءُ صغيرة في صدرك. أعلم أنك تسمعنا جيدًا، ونحن نُقبِّلك، ونُلقي عليك التحية. الجميع في غزة أحبَّك في حياتك وأحبَّك في موتك؛ لأنك كنت البطل المثالي الذي عاش في غزة ومات لأجلها.»\n\n«ميشيل عواد» أو «نضال الرجعي', 'ss.svg', 1, 150, 1, 0, '2022-10-05'),
(17, 9, 'شجرة تنمو في بروكلين', 'بيتي سميث', 'ولم تكن الشجرةُ الوحيدة النامية في فناء «فرانسي» من أشجار الصنوبر، ولا من أشجار الشوكران، وإنما كانت أوراقُها مُدبَّبة الطرف تنمو على سُوقٍ خُضرٍ تنتشر من الغصن؛ فتجعل الشجرةَ تبدو للعَيْن كأنها مجموعةٌ من المظلات الخضراء المنبسطة. وقد سمَّاها بعض الناس شجرةَ السماء؛ لأنها كانت تُناضِل حتى يبلغ طولها عَنان السماء، أيًّا ما كان الموضع الذي تسقط فيه بذرتُه', 'sh.svg', 2, 220, 1, 0, '2022-10-05'),
(26, 9, 'اعترافات فتى العصر', 'ألفريد دي موسيه', 'سقطَت أوروبا مُثخَنةً بالجراح بعد الحروب النابليونية الكبرى، لا تجد فرقًا بين مهزوم ومنتصر؛ فقد أكلَت المعارك زهرةَ شباب القارة، وتركَت البقيةَ الأخرى بجراحٍ روحية ونفسية يَصعب أن تندمل، وكان الألم الأكبر من نصيبِ شبابِ فرنسا الذين حلَّقت أرواحهم لذُرى ما ظنوه مجدَ الوطن، وأسكرَتهم الانتصاراتُ المتوالية، ليستيقظوا ذاتَ صباحٍ على هزيمةٍ منكرة سقطت بهم من علٍ، وطبعت أرواحَهم بالقلق والحيرة، وملأت أنفسَهم بالشكوك حيال الحياة وجَدْواها، مُزعزِعةً إيمانَهم بكل شيء. وكان بطل روايتنا «أوكتاف» أحدَ هؤلاء الشباب؛ فلم تُوفِّر له تجرِبتُه العاطفية الأولى السلوانَ عن مُصابه في', 'bo.svg', 3, 233, 1, 0, '2022-10-07'),
(27, 12, 'أزهار الشوك', 'محمد فريد أبو حديد', 'نُطالِع في هذه الرواية الرائدة إرهاصات الأدب الواقعي المصري؛ حيث ينتصر المؤلِّف للطبقات المُهمَّشة والفقيرة، ويُناقِش مشاكلها قبل ثورة يوليو؛ فأوضاعُ عامة الشعب بلَغ منها السوءُ مَبلغَه، حيث تئنُّ تحت وضعٍ اقتصادي في غاية التدهور، ولا تجد فُرصًا عادلة لتحسين أوضاعها، فكأنَّ الشقاء مُلازم لها. كان والد «سيد» قد تُوفِّي وتركه تلميذًا يافعًا بالمدرسة، فتخبَّط لأعوامٍ بلا هدًى، ولكن بالرغم من صعوبة الظروف، لم يَفقِد الأملَ قط، وسرعان ما أفاق وكافَح ليجد لنفسِه مكانًا تحت ال', 'shh.svg', 1, 30, 1, 1, '2022-10-07'),
(28, 12, 'فن الحرب 3', 'سون تزو 3', 'فن الحرب هو أطروحة عسكرية صينية كتبت أثناء القرن السادس قبل الميلاد من قبل سون تزو Sun Tzu. ويقع الكتاب في أكثر من 6000 مقطع ويضم 13 فصلا، كل فصل منها مكرس لأحد خصائص الحرب، اعتبر لفترة طويلة مرجعاً كاملاً للإستراتيجيات والوسائل العسكرية. حيث كان له تأثير ضخم على التخطيط العسكري', 'fan_alharb-lo.png', 2, 350, 1, 0, '2022-10-07'),
(31, 9, 'أنا الشعب', 'محمد فريد أبو حديد', 'نُطالِع في هذه الرواية الرائدة إرهاصات الأدب الواقعي المصري؛ حيث ينتصر المؤلِّف للطبقات المُهمَّشة والفقيرة، ويُناقِش مشاكلها قبل ثورة يوليو؛ فأوضاعُ عامة الشعب بلَغ منها السوءُ مَبلغَه، حيث تئنُّ تحت وضعٍ اقتصادي في غاية التدهور، ولا تجد فُرصًا عادلة لتحسين أوضاعها، فكأنَّ الشقاء مُلازم لها. كان والد «سيد» قد تُوفِّي وتركه تلميذًا يافعًا بالمدرسة، فتخبَّط لأعوامٍ بلا هدًى، ول', 'im.png', 2, 200, 1, 0, '2022-10-10'),
(35, 9, 'قاتل مأجور ', 'عبدالله محمد', 'القاتل المأجور أو الأجير هو شخص يقوم بعملية اغتيال مقابل مبلغ مالي أو خدمة معينة، وقد يعمل القتلة المأجورون لحساب شخص واحد أو جهة محددة، للقيام أحياناً ', 'gt.jpg', 3, 200, 1, 0, '2022-10-10'),
(36, 14, 'الكابوس', 'اسامه', 'رواية جملية', 'EA74F54D-BE26-4F2E-B396-5917F1E51C54.jpeg', 2, 150, 1, 0, '2022-10-12'),
(37, 17, ' الجساسة', ' احمد آل حمدا', 'في هذه الحياة ستواجه الكثير من المعارك اليومية ولكن معركتك الأهم ستكون تلك التي تخوضها مع ذاتك , لتبقي فيها قلبك سليما وسط كل الدمار الذي يحدث من حولك', 'Screenshot_7.png', 1, 300, 1, 0, '2022-10-12');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(120) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role_admin` tinyint(1) NOT NULL,
  `country` varchar(120) NOT NULL,
  `city` varchar(120) NOT NULL,
  `description` varchar(255) NOT NULL,
  `password` varchar(120) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `status`, `role_admin`, `country`, `city`, `description`, `password`, `created_at`) VALUES
(9, 'خالد', '0502540127', 'k@k.com', 1, 0, 'السعودية', 'الرياض', 'الشارع العام', '$2y$10$j.tyfMHpR9HZ0zmBBBEoW.Dx4K2AqBKbFbc4pG03GnxVSj9L8lX0G', '2022-09-21'),
(10, 'عوض', '0505618181', 'w@w.com', 1, 1, 'السعودية', 'الرياض', 'الشارع العام', '$2y$10$DgniHT2MeST/uK3xqP2N5OwVf1Llt9Y7TxgI.yb2F2j8wWh8O3Oya', '2022-09-21'),
(12, 'علي', '0550550554', 'ali@ali.com', 1, 0, 'السعودية', 'الرياض', 'الشارع العام', '$2y$10$kL0hEmUtufN1q6UYUAhm7.kXQ7SJHEnW1tKlK39dzKd8fzFwFdkEe', '2022-10-07'),
(13, 'ناصر', '0550440550', 'n@n.com', 1, 0, 'السعودية', 'جدة', 'الشارع العام', '$2y$10$qOaV5g.nTHph5UsEepr8NuDRj9/E40WZJI6rtv/R7hUZ7nEKM7ZHe', '2022-10-07'),
(14, 'اسامه ', '0580583503', 'o115sama@icloud.com', 1, 0, 'السعودية', 'Riyadh', 'حي الياسمين', '$2y$10$9SGzxaDL3mADWcvdszA3Y.6K6mlVKnMURvejwqAL.Xa0wW0y6ozbW', '2022-10-12'),
(15, 'Mousaed', '0556221177', 'm@m.com', 1, 0, 'السعودية', 'Riyadh', 'اهلين', '$2y$10$6bm3557av68d7TU6X2TpOujB1nXzHSvXYj/s.CK6xDll0J6.9K8i6', '2022-10-12'),
(16, 'Mousaed', '0556221177', 'm@m.com', 1, 0, 'السعودية', 'Riyadh', 'اهلين', '$2y$10$p66KUAB1OzxZxyNYIZ0wN.Dkrd13Jfd0nUL6u8PaiJacYJdXJh84O', '2022-10-12'),
(17, 'Maala', '+966580141', 'Moala1999@gmail.com', 1, 0, 'السعودية', 'Riyadh', 'مهتم للكتب', '$2y$10$.IBRTqILaekK9nbDGxzz8.KaNHPHgk4OFeYeF74lyegWonYUMZq/O', '2022-10-12'),
(18, 'حماده عبدالرزاق', '0507108-04', 'hamad113jawasr@gmail.com', 1, 0, 'السعودية', 'Riyadh', 'سنقل', '$2y$10$MfGtdOcKS5s2x2R8sD56xu4xevNHPe81RG9QwE/ve/hNfAM70UTpW', '2022-10-13'),
(19, 'م', '0503554679', 'maha05576223@gmail.con', 1, 0, 'السعودية', 'Riyadh', 'الرياض النهضة ', '$2y$10$glF2PdLGovsmdrrTlWhjCuTO1edJXJ//TgOiTiwgLvZ316pQWqAAa', '2022-10-13'),
(20, 'Osos', '0580583503', 'o115sama@hotmail.com', 1, 0, 'السعودية', 'Riyadh', 'اليااسمين', '$2y$10$lTnU1MuFiPel4yvLbKv7NeRNUPlmsXJtYBIAB/1EtAJWHpNdwHq7e', '2022-10-16'),
(21, 'mousaed', '0556221177', 'p@p.com', 1, 0, 'السعودية', 'Riyadh', 'hlaaA', '$2y$10$9OFnitkVZwfSAwx1YHKqLON0VAMDn/asWE612Bt8D6Le/A6c6OnVm', '2022-10-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer` (`id_buyer`),
  ADD KEY `product` (`id_product`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `buyer` FOREIGN KEY (`id_buyer`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `id_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
