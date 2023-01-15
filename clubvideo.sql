-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jan-2023 às 15:18
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clubvideo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `pwd`) VALUES
(1, 'TiagoElAdmin', 'ce32243714b9038e8dcdaa7e3940c8c6'),
(2, 'PauloElAdmin', '13c2ab525bb32588d0cc953555772ae3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart_details`
--

CREATE TABLE `cart_details` (
  `movie_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Mistery'),
(2, 'Thriller'),
(3, 'Action'),
(4, 'Adventure'),
(5, 'Comedy'),
(6, 'Drama'),
(7, 'Fantasy'),
(8, 'Horror'),
(9, 'Musical'),
(10, 'Romance'),
(11, 'Science Fiction'),
(12, 'Sports'),
(13, 'Western'),
(14, 'Anime');

-- --------------------------------------------------------

--
-- Estrutura da tabela `languages`
--

CREATE TABLE `languages` (
  `language_id` int(11) NOT NULL,
  `language_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `languages`
--

INSERT INTO `languages` (`language_id`, `language_title`) VALUES
(1, 'Portuguese'),
(2, 'English'),
(3, 'Spanish'),
(4, 'French');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `movie_description` varchar(255) NOT NULL,
  `movie_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `movie_image1` varchar(255) NOT NULL,
  `movie_image2` varchar(255) NOT NULL,
  `movie_image3` varchar(255) NOT NULL,
  `movie_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_title`, `movie_description`, `movie_keywords`, `category_id`, `language_id`, `movie_image1`, `movie_image2`, `movie_image3`, `movie_price`, `date`, `status`) VALUES
(1, 'Inception', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.', 'Origem,Inception,Leonardo DiCaprio', 11, 2, 'inception.jpg', 'inception-wp.jpg', 'inception-wp2.jpg', '21', '2023-01-09 16:19:53', 'Available'),
(2, 'Titanic', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', 'Titanic,LeonardoDiCaprio', 6, 2, 'titanic-movie.jpg', 'titanic-wp.jpg', 'titanic-wp2.jpg', '20', '2023-01-09 16:13:44', 'Available'),
(3, ' Predestination', 'For his final assignment, a top temporal agent must pursue the one criminal that has eluded him throughout time. The chase turns into a unique, surprising and mind-bending exploration of love, fate, identity and time travel taboos.', 'Predestinado, Predestination,Ethan Hawke,Sarah Snook', 11, 2, 'predistination.jpg', 'predistination2.jpg', 'predistination3.jpg', '19', '2023-01-09 16:24:16', 'Available'),
(4, 'Fifty Shades of Grey', 'Literature student Anastasia Steele life changes forever when she meets handsome, yet tormented, billionaire Christian Grey.', 'As Cinquenta Sombras de Grey,Fifty Shades of Grey', 10, 2, 'Fifty_Shades_of_Grey_2015.jpg', 'Fifty_Shades_of_Grey_2015_2.jpg', 'Fifty_Shades_of_Grey_2015_3.jpg', '15', '2023-01-10 12:50:53', 'Available'),
(7, 'Black Panther', 'TChalla, heir to the hidden but advanced kingdom of Wakanda, must step forward to lead his people into a new future and must confront a challenger from his countrys past', 'Black Panther, Pantera Negra,Chadwick Boseman,Michael B. Jordan', 3, 2, 'blackpanther.jpg', 'blackpanther2.jpeg', 'blackpanther3.jpeg', '24', '2023-01-09 16:13:44', 'Available'),
(9, 'A Star Is Born', 'A musician helps a young singer find fame as age and alcoholism send his own career into a downward spiral.', 'A Star Is Born,Assim Nasce Uma Estrela,Bradley Cooper,Lady Gaga,', 9, 2, 'astarisborn.jpg', 'astarisborn2.jpg', 'astarisborn3.jpg', '19', '2022-12-28 02:14:00', 'Available'),
(10, 'Interstellar', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanitys survival.', 'Interstellar,Christopher Nolan, Matthew McConaughey', 4, 2, 'Interstellar.jpg', 'Interstellar2.jfif', 'Interstellar3.jfif', '10', '2023-01-10 12:19:01', 'Available'),
(11, 'Now You See Me', 'An F.B.I. Agent and an Interpol Detective track a team of illusionists who pull off bank heists during their performances, and reward their audiences with the money.', 'Mestres da Ilusao,Now You See Me', 1, 2, 'NYSM.jpg', 'NYSM2.webp', 'NYSM3.webp', '9', '2023-01-10 12:21:37', 'Available'),
(12, 'The Maze Runner', 'Thomas is deposited in a community of boys after his memory is erased, soon learning theyre all trapped in a maze that will require him to join forces with fellow \"runners\" for a shot at escape.', 'Maze Runner', 3, 2, 'MazeRunner.jpg', 'MazeRunner2.jfif', 'MazeRunner3.jpg', '8', '2023-01-10 12:28:07', 'Available'),
(13, 'Bird Box', 'Five years after an ominous unseen presence drives most of society to suicide, a mother and her two children make a desperate bid to reach safety.', 'Bird Box,As Cegas,Sandra Bullock', 8, 2, 'BirdBox.jpeg', 'BirdBox2.jpg', 'BirdBox3.jpg', '11', '2023-01-10 12:44:58', 'Available'),
(14, 'Bohemian Rhapsody', 'The story of the legendary British rock band Queen and lead singer Freddie Mercury, leading up to their famous performance at Live Aid (1985).', 'Bohemian Rhapsody,Rami Malek', 6, 2, 'BohemianRhapsody.jpg', 'BohemianRhapsody2.jpg', 'BohemianRhapsody3.jfif', '6', '2023-01-10 12:48:07', 'Available'),
(15, 'Baywatch', 'Devoted lifeguard Mitch Buchannon butts heads with a brash new recruit, as they uncover a criminal plot that threatens the future of the bay.', 'Baywatch', 3, 2, 'baywatch.jpg', 'baywatch2.jpg', 'baywatch3.jpg', '5', '2023-01-10 12:49:08', 'Available'),
(16, 'Deadpool', 'A wisecracking mercenary gets experimented on and becomes immortal but ugly, and sets out to track down the man who ruined his looks.', 'Deadpool', 5, 2, 'deadpool.jpg', 'deadpool2.jfif', 'deadpool3.jpeg', '9', '2023-01-10 13:29:11', 'Unavailable');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movies` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `movies`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 16, 9, 81534794, 1, '2023-01-10 13:29:11', 'Complete');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 81534794, 9, 'Visa', '2023-01-10 13:29:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verified` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`, `token`, `verified`) VALUES
(1, 'Kirito', '17.tiagoliveira.17@gmail.com', '$2y$10$i0LhEXuHq6AWC2lJQ8n70OPq5aE0qHugATazBAdBnQzAr1ghUeArK', 'thumb-121562.jpg', '::1', 'Travessa do Bairro', '926740905', 'e459a35f11491333899aa986fbb7c96ebcd0e3ecb26ce6c605a17afa35479f85b5b4083baf628b8554cec66e088ef0e743a5', 1),
(2, 'Paulinho', '17.tiagooliveira.17@gmail.com', '$2y$10$8uK43/2an5ySGrw5gbrUA.nzo2ZawGjUyeWncmmXq/IBqrBrTFK4m', 'bosta.jpg', '::1', 'Travessa do Bairro', '926740905', 'ea7660211c9c665d2559b313e263cd824c6ea41cf9ee61bdc7937f03e8628a6ea32978dcaeeb7ac97a8c4e371b0a3d6bb5b4', 1),
(3, 'TiagoKirito', 'tiago17kirito@gmail.com', '$2y$10$jN8nPTZTg5UKD/7km7R3VOoMQfdtpns3BGt5laB/o./Xe0vnxZpoK', 'kirito.jfif', '::1', 'Travessa do Bairro', '926740905', '5279f28076282b22c47df0764c90f5fc62a3afcfd8ffcafc41db5bada81afba5943c728ab5b8522286332d6ae462febc3e3e', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Índices para tabela `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`movie_id`);

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Índices para tabela `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`language_id`);

--
-- Índices para tabela `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Índices para tabela `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Índices para tabela `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Índices para tabela `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `languages`
--
ALTER TABLE `languages`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
