
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `callcenter`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `interviews`
--

CREATE TABLE `interviews` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `calldate` date NOT NULL,
  `calltime` time NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `person` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `nextcall` date DEFAULT NULL,
  `description` text,
  `nexttime` time DEFAULT NULL,
  `ended` tinyint(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `interviews`
--

INSERT INTO `interviews` (`id`, `user_id`, `calldate`, `calltime`, `company`, `person`, `address`, `phone`, `email`, `nextcall`, `description`, `nexttime`, `ended`) VALUES
(1, 2, '2017-10-19', '08:00:00', 'Firma 1', 'Osoba kontaktowa', '', '3142344323', '', '2017-10-21', 'Notatki', '17:34:00', 0),
(2, 2, '2017-10-19', '19:10:00', 'Firma1', '', '', '213123123', '', '2017-10-19', '<p>Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor. Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Aliquam erat ac ipsum. Integer aliquam purus. Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo vel bibendum sapien massa ac turpis faucibus orci luctus non, consectetuer lobortis quis, varius in, purus. Integer ultrices posuere cubilia Curae, Nulla ipsum dolor lacus, suscipit adipiscing. Cum sociis natoque penatibus et ultrices volutpat. Nullam wisi ultricies a, gravida vitae, dapibus risus ante sodales lectus blandit eu, tempor diam pede cursus vitae, ultricies eu, faucibus quis, porttitor eros cursus lectus, pellentesque eget, bibendum a, gravida ullamcorper quam. Nullam viverra consectetuer. Quisque cursus et, porttitor risus. Aliquam sem. In hendrerit nulla quam nunc, accumsan congue. Lorem ipsum primis in nibh vel risus. Sed vel lectus. Ut sagittis, ipsum dolor quam.</p>', '12:30:00', 0),
(3, 3, '2017-10-19', '22:02:00', 'FIrma', '', '', '1212121212', '', '2017-10-20', 'Krótki opis', '07:23:00', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `passkey` varchar(45) DEFAULT NULL,
  `timeout` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `surname`, `phone`, `email`, `created`, `modified`, `active`, `role`, `passkey`, `timeout`) VALUES
(2, 'admin', '$2y$10$4qVSzYTbq4.XdtrK/D7bV.7PQzH0bRNXotppaqwQ1WZeR3mhNNywi', 'Administrator', 'Systemu', '691050123', 'leszek.klich@gmail.com', '2017-10-18 19:48:25', '2017-10-19 20:50:21', 1, 'admin', '59e7b7b02c677', '1508444464'),
(3, 'jkowalski', '$2y$10$OZvmry7jTPAcix1cvN6GreeQadLMsaZqU0pnppEE.qmRTUo1.ixJu', 'Jan', 'Kowalski', '213', 'adresik3234234@edkjwhfkwjefgwef.pl', '2017-10-19 12:31:20', '2017-10-19 20:52:08', 1, 'employer', '59e89ef207766', '1508503666'),
(4, 'mtarkowski', '$2y$10$On/78DMwAUzWf8lcmdyyveXyd5L3E2NZd1.3uoVHkv2lEhChZcr2m', 'Mirek', 'Tarkowski', '121212', 'mirek@wjedkwejdkejwefwefef.pl', '2017-10-19 20:47:01', '2017-10-19 20:47:01', 1, 'employer', NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_interview_idx` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `user_interview` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
