

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `link` text NOT NULL,
  `instagram` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `application` (`id`, `id_user`, `name`, `description`, `category`, `link`, `instagram`, `facebook`, `twitter`, `active`) VALUES
(14, 6, 'My First App', 'This is a description, modified!', 'School', 'https://www.example.com', 'https://www.my_instagram_page.com', '', 'https://twitter.com', 1),
(16, 6, 'App created from ADMIN', 'Description of this app...', 'Research', 'https://text.com', '', '', '', 1);



CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `psw` text NOT NULL,
  `phone` text NOT NULL,
  `role` int(11) NOT NULL COMMENT '0: user; 1: admin',
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `psw`, `phone`, `role`, `active`) VALUES
(2, 'Admin', 'Admin', 'admin@gmail.com', '123456', '123456789', 1, 1),
(6, 'Marc', 'User', 'user@gmail.com', '123456', '333456789', 0, 1);


ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
