-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2021 at 08:10 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myshows`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`) VALUES
('Matin', 'shaikhmatin3230@gmail.com', 'matin@admin'),
('Prajval', 'prajvalgandhi483@gmail.com', 'paju@admin'),
('Prathamesh', 'prathameshchaudhary7122@gmail.com', 'pratham@admin');

-- --------------------------------------------------------

--
-- Table structure for table `ashamultiplex`
--

CREATE TABLE IF NOT EXISTS `ashamultiplex` (
  `movie` text NOT NULL,
  `screen` text NOT NULL,
  `bookdate` date NOT NULL,
  `time` text NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ashamultiplex`
--


-- --------------------------------------------------------

--
-- Table structure for table `chitramultiplex`
--

CREATE TABLE IF NOT EXISTS `chitramultiplex` (
  `movie` text NOT NULL,
  `screen` text NOT NULL,
  `bookdate` date NOT NULL,
  `time` text NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitramultiplex`
--


-- --------------------------------------------------------

--
-- Table structure for table `madhyanmultiplex`
--

CREATE TABLE IF NOT EXISTS `madhyanmultiplex` (
  `movie` text NOT NULL,
  `screen` text NOT NULL,
  `bookdate` date NOT NULL,
  `time` text NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `madhyanmultiplex`
--


-- --------------------------------------------------------

--
-- Table structure for table `mainslider`
--

CREATE TABLE IF NOT EXISTS `mainslider` (
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainslider`
--

INSERT INTO `mainslider` (`image`) VALUES
('bigbullbig.jpg'),
('rrrbig.jpg'),
('tjbig.jpeg'),
('sd1.jpg'),
('sd2.jpg'),
('banner1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `midslider`
--

CREATE TABLE IF NOT EXISTS `midslider` (
  `image` text NOT NULL,
  `moviename` text NOT NULL,
  `genre` text NOT NULL,
  `trailer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `midslider`
--

INSERT INTO `midslider` (`image`, `moviename`, `genre`, `trailer`) VALUES
('bigbullbig.jpg', 'sss', 'Drama | Crime', 'https://www.youtube.com/watch?v=Bw6I-KgCSP4'),
('Pushpabig.jpg', 'Pushpa', 'Action | Thriller | Adventure | Drama', 'https://youtu.be/Lk2oDvoonUc'),
('rrrbig.jpg', 'RRR', 'Drama | Historical', 'https://youtu.be/5-4uOgkn9nk'),
('gkbig.jpg', 'Godzilla vs Kong', 'Action | Science Fiction | Thriller', 'https://youtu.be/odM92ap8_c0'),
('tjbig.jpeg', 'Tom and Jerry', 'Family | Comedy', 'https://youtu.be/5XeyGcDUdn0');

-- --------------------------------------------------------

--
-- Table structure for table `moviedetails`
--

CREATE TABLE IF NOT EXISTS `moviedetails` (
  `moviename` text NOT NULL,
  `language` text NOT NULL,
  `releasedate` date NOT NULL,
  `cast` text NOT NULL,
  `music` text NOT NULL,
  `producer` text NOT NULL,
  `director` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moviedetails`
--

INSERT INTO `moviedetails` (`moviename`, `language`, `releasedate`, `cast`, `music`, `producer`, `director`, `description`) VALUES
('The Big Bull', 'Hindi', '2021-04-08', 'Abhishek Bachchan as Hemant Shah, Ileana D''Cruz as news reporter Meera Rao', 'Sandeep Shirodkar, Gaurav Dasgupta', 'Ajay Devgn, Anand Pandit', 'Kookie Gulati', 'The Big Bull is a 2021 Indian Hindi-language crime drama film directed and co-written by Kookie Gulati and produced by Ajay Devgn, Anand Pandit, Vikrant Sharma and Kumar Mangat Pathak. The storyline of the film is based on the life of Harshad Mehta. '),
('Mumbai Saga', 'Hindi', '2021-03-19', 'John Abraham as Amartya Rao, Emraan Hashmi as Inspector Vijay, Kajal Aggarwal as Seema Rao', 'Amar Mohile, Yo Yo Honey Singh ,Payal Dev\r\n,Tanishk Bagchi', 'Bhushan Kumar, Krishan Kumar', 'Sanjay Gupta', 'Mumbai Saga is a 2021 Indian Hindi-language action crime film directed by Sanjay Gupta and produced by T-Series. It features an ensemble cast of John Abraham, Emraan Hashmi, Suniel Shetty, Kajal Aggarwal, Rohit Roy, Anjana Sukhani, Mahesh Manjrekar, Prateik Babbar, Samir Soni, Amole Gupte and Gulshan Grover'),
('Roohi', 'Hindi', '2021-03-11', 'Rajkummar Rao as Bhawra Pandey, Janhvi Kapoor as Roohi/Afza', 'Ketan Sodha, Sachin–Jigar', 'Dinesh Vijan, Mrighdeep Singh Lamba', 'Hardik Mehta', 'Roohi is a 2021 Indian Hindi-language comedy horror film directed by Hardik Mehta and produced by Dinesh Vijan under the banner Maddock Films. It tells the story of a ghost who abducts brides on their honeymoons.'),
('Godzilla vs Kong', 'Hindi', '2021-03-24', 'Alexander Skarsgard as Dr. Nathan Lind,Millie Bobby Brown as Madison Russell,Rebecca Hall as Dr. Ilene Andrews', 'Tom Holkenborg', 'Thomas Tull,Jon Jashni,Brian Rogers,Mary Parent,Alex Garcia,Eric McLeod', 'Adam Wingard', 'Godzilla vs. Kong is a 2021 American monster film directed by Adam Wingard. A sequel to Godzilla: King of the Monsters (2019) and Kong: Skull Island (2017), it is the fourth film in Legendary''s MonsterVerse.'),
('Tom and Jerry', 'Hindi', '2021-02-10', 'Chloe Grace Moretz as Kayla, Michael Pena as Terence', 'Christopher Lennertz', 'Chris DeFaria', 'Tim Story', 'Tom & Jerry is a 2021 American live-action/computer-animated slapstick comedy film based on the titular cartoon characters and animated theatrical short film series of the same name created by William Hanna and Joseph Barbera, produced by the Warner Animation Group and distributed by Warner Bros. '),
('KGF: Chapter 2', 'Hindi', '2021-07-16', 'Yash as Rocky, Sanjay Dutt as Adheera, Raveena Tandon as Ramika Sen,', 'Ravi Basrur', 'Vijay Kiragandur, Karthik Gowda', 'Prashanth Neel', 'K.G.F: Chapter 2 is an upcoming Indian Kannada-language period action film written and directed by Prashanth Neel and produced by Vijay Kiragandur under the banner Hombale Films. The second installment of the two-part series, it is a sequel to the 2018 film K.G.F: Chapter 1. '),
('RRR', 'Hindi', '2021-10-13', 'N. T. Rama Rao Jr. as Komaram Bheem,Ram Charan as Alluri Sitarama Raju,Alia Bhatt as Sita,Ajay Devgn', 'M. M. Keeravani', 'D. V. V. Danayya', 'S. S. Rajamouli', 'RRR is an upcoming Indian Telugu-language period action drama film directed by S. S. Rajamouli. The film is produced by D. V. V. Danayya of DVV Entertainments. It stars N. T. Rama Rao Jr. and Ram Charan while Alia Bhatt, Olivia Morris, Ajay Devgn, Samuthirakani, Ray Stevenson, and Alison Doody play supporting roles.'),
('Pushpa', 'Hindi', '2021-08-13', 'Allu Arjun as Pushpa Raj,Rashmika Mandanna', 'Devi Sri Prasad', 'Naveen Yerneni,Y. Ravi Shankar', 'Sukumar', 'Pushpa is an upcoming Indian Telugu-language action thriller film written and directed by Sukumar. Produced by Naveen Yerneni and Y. Ravi Shankar of Mythri Movie Makers in association with Muttamsetty Media, the film stars Allu Arjun, Rashmika Mandanna'),
('Zombivli', 'Marathi', '2021-04-30', 'Vaidehi Parshurami, Amey Wagh', 'A.V Prafulla Chandra', 'Sourabh Pramod Kale, Siddharth Anand Kumar', 'Aditya Sarpotdar', 'In the suburban neighborhood of Mumbai, a wall separates the haves and the have-nots. Sudhir and Seema, a newly married middle class couple, live a life without hardship while Vishwas, a slum dweller, dreams of dignity for his people. Their lives collide as post nightfall the town fills up with ominous cries and moans that don''t belong to people - they belong to zombies .'),
('Andaz Apna Apna', 'Hindi', '1994-11-04', 'Aamir Khan as Amar Manohar/ Amar Singh(fake),Salman Khan as Prem Bhopali/Prem Khurrana(fake),Raveena Tandon as Raveena (fake) / Karishma, Karisma Kapoor as Karishma (fake) / Raveena Bajaj', 'Tushar Bhatia,Viju Shah(BGM Only)', 'Vinay Kumar Sinha', 'Rajkumar Santoshi', 'Andaz Apna Apna (transl.?Everyone has their own style) is a 1994 Indian Hindi language comedy film directed by Rajkumar Santoshi, produced by Vinay Kumar Sinha, starring Aamir Khan, Salman Khan, Karisma Kapoor, Raveena Tandon, Paresh Rawal and Shakti Kapoor in the leading roles.'),
('Dilwale Dulhania Le Jayenge', 'Hindi', '1995-10-20', 'Shah Rukh Khan as Raj Malhotra, Kajol as Simran Singh, Amrish Puri as Chaudhary Baldev Singh', 'Jatin–Lalit', 'Yash Chopra', 'Aditya Chopra', 'Dilwale Dulhania Le Jayenge (transl.?The Big-Hearted Will Take the Bride), also known by the initialism DDLJ, is a 1995 Indian Hindi-language romance film, directed by Aditya Chopra in his directorial debut, produced by his father Yash Chopra, and written by Javed Siddiqui with Aditya Chopra. '),
('Hum Aapke Hain Koun..!', 'Hindi', '1994-08-05', 'Madhuri Dixit as Nisha Choudhury,Salman Khan as Prem Nath,Mohnish Bahl as Rajesh Nath', 'Raamlaxman', 'Ajit Kumar Barjatya,Kamal Kumar Barjatya,\r\nRajkumar Barjatya', 'Sooraj Barjatya', 'Hum Aapke Hain Koun..! also known by the initialism HAHK,[6] is a 1994 Indian Hindi-language romantic drama film. The film stars Madhuri Dixit and Salman Khan, and celebrates the Indian wedding traditions by relating the story of a married couple and the relationship between their families; a story about sacrificing one''s love for one''s family.'),
('Raja Hindustani', 'Hindi', '2021-04-21', 'Aamir Khan as Raja Hindustani, Karisma Kapoor as Aarti Sehgal Hindustani, Johnny Lever as Balvant Singh', 'Nadeem-Shravan, Surinder Sodhi', 'Alive Morani, Karim Morani, Bunty Soorma', 'Dharmesh Darshan', 'Raja Hindustani (transl.?Raja, the Indian) is a 1996 Indian Hindi-language romantic drama film directed by Dharmesh Darshan. It tells the story of a cab driver from a small town who falls in love with a rich young woman. Aamir Khan and Karisma Kapoor play the lead roles.');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `moviename` text NOT NULL,
  `image` text NOT NULL,
  `genre` text NOT NULL,
  `trailer` text NOT NULL,
  `price` int(11) NOT NULL,
  `screen1` text NOT NULL,
  `screen2` text NOT NULL,
  `screen3` text NOT NULL,
  `wideposter` text NOT NULL,
  `type` text NOT NULL,
  `releasedate` date NOT NULL,
  `expiry` date NOT NULL,
  `rating` int(11) NOT NULL,
  `viewtype` varchar(2) NOT NULL DEFAULT '2D'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`moviename`, `image`, `genre`, `trailer`, `price`, `screen1`, `screen2`, `screen3`, `wideposter`, `type`, `releasedate`, `expiry`, `rating`, `viewtype`) VALUES
('Mumbai Saga', 'assets/img/ms.jpg', 'Crime | Action', 'https://youtu.be/YTGO38DSIsc', 100, '09:00 AM', '', '', 'assets/img/msbig.jpg', 'Latest', '2021-03-19', '2021-06-30', 60, '2D'),
('The Big Bull', 'assets/img/bigbull3.jpg', 'Drama | Crime', 'https://www.youtube.com/watch?v=Bw6I-KgCSP4', 100, '12:00 PM', '06:00 PM', '', 'assets/img/bigbullbig.jpg', 'Latest', '2021-04-08', '2021-06-30', 65, '2D'),
('Godzilla vs Kong', 'assets/img/gk.jpg', 'Action | Science Fiction | Thriller', 'https://youtu.be/odM92ap8_c0', 120, '', '09:00 AM', '11:00 PM', 'assets/img/gkbig.jpg', 'Latest', '2021-03-24', '2021-06-30', 50, '3D'),
('RRR', 'assets/img/rrr.jpg', 'Drama | Historical', 'https://youtu.be/5-4uOgkn9nk', 120, '08:30 PM', '12:00 PM', '', 'assets/img/rrrbig.jpg', 'Latest', '2021-10-13', '2021-11-13', 63, '2D'),
('Pushpa', 'assets/img/pushpa.jpg', 'Action | Thriller | Adventure | Drama', 'https://youtu.be/Lk2oDvoonUc', 100, '', '', '09:00 AM', 'assets/img/pushpabig.jpg', 'Latest', '2021-08-13', '2021-10-15', 50, '2D'),
('Roohi', 'assets/img/roohi1.jpg', 'Comedy | Horror | Mystery', 'https://youtu.be/mTT_V0t89MI', 100, '11:00 PM', '', '', 'assets/img/roohibig.jpg', 'Latest', '2021-03-11', '2021-06-17', 67, '2D'),
('Tom and Jerry', 'assets/img/tj1.jpg', 'Family | Comedy', 'https://youtu.be/5XeyGcDUdn0', 150, '', '08:30 PM', '', 'assets/img/tjbig.jpeg', 'Latest', '2021-02-26', '2021-06-17', 60, '3D'),
('KGF: Chapter 2', 'assets/img/kfg.jpg', 'Action | Adventure | Drama', 'https://youtu.be/Qah9sSIXJqk', 150, '', '', '12:00 PM,03:00 PM', 'assets/img/kgfbig.jpg', 'Latest', '2021-07-16', '2021-08-31', 0, '2D'),
('Andaz Apna Apna', 'assets/img/aaa.jpg', 'Comedy | Romance', 'https://youtu.be/fd_w7Qw8biU', 100, '03:00 PM', '', '', 'assets/img/ANDAZ_APNA_APNA_big.jpg', 'Old', '1994-04-11', '2021-06-30', 80, '2D'),
('Hum Aapke Hain Koun..!', 'assets/img/Hahk.jpg', 'Comedy | Romance | Musical', 'https://youtu.be/-0soKLCsB3s', 120, '', '', '08:30 PM', 'assets/img/hahkbig.jpg', 'Old', '1994-08-05', '2021-07-30', 89, '2D'),
('Dilwale Dulhania Le Jayenge', 'assets/img/ddlj.jpg', 'Comedy | Romance | Drama', 'https://youtu.be/cmax1C1p660', 100, '', '', '06:00 PM', 'assets/img/ddljbig.jpg', 'Old', '1995-10-20', '2021-05-30', 71, '2D'),
('Zombivli', 'assets/img/zombivli.jpg', 'Comedy | Horror', 'https://youtu.be/vFTA6ijL2E0', 120, '', '11:00 PM', '', 'assets/img/zombivlibig.jpg', 'Latest', '2021-04-30', '2021-06-30', 50, '2D'),
('Raja Hindustani', 'assets/img/Raja_Hindustani.jpg', 'Comedy | Musical | Drama', 'https://youtu.be/qHhoFdHyJfc', 80, '', '03:00 PM', '', '', 'Old', '2021-04-21', '2021-04-30', 60, '2D');

-- --------------------------------------------------------

--
-- Table structure for table `mycinema`
--

CREATE TABLE IF NOT EXISTS `mycinema` (
  `movie` text NOT NULL,
  `screen` text NOT NULL,
  `bookdate` date NOT NULL,
  `time` text NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mycinema`
--

INSERT INTO `mycinema` (`movie`, `screen`, `bookdate`, `time`, `seats`) VALUES
('Roohi', 'Screen 1', '2021-05-18', '11:00 PM', 'A1,J1,A6,B6,C6'),
('Pushpa', 'Screen 3', '2021-05-20', '09:00 AM', 'A6,A6,A6'),
('RRR', 'Screen 1', '2021-05-20', '08:30 PM', 'J8,J9,,K8,K9,K10'),
('RRR', 'Screen 1', '2021-05-21', '08:30 PM', 'A9,H7,H9,J7,K7,A9,H7,H9,J7,K7'),
('Tom and Jerry', 'Screen 1', '2021-05-21', '08:30 PM', 'A7,B7,I7,J7,K7'),
('Godzilla vs Kong', 'Screen 3', '2021-06-11', '11:00 PM', ',I7,,I7,,J7,K7,,J7,K7'),
('Roohi', 'Screen 1', '2021-06-11', '11:00 PM', 'C5,K5,C5,K5'),
('The Big Bull', 'Screen 1', '2021-06-11', '06:00 PM', ',K7');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `email` text NOT NULL,
  `movie` text NOT NULL,
  `ratings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`email`, `movie`, `ratings`) VALUES
('shaikhmatin3230@gmail.com', 'RRR', 90),
('prajvalgandhi483@gmail.com', 'RRR', 10),
('prathameshchaudhary7122@gmail.com', 'Zombivli', 50),
('prathameshchaudhary7122@gmail.com', 'Pushpa', 50),
('prathameshchaudhary7122@gmail.com', 'RRR', 90),
('prathameshchaudhary7122@gmail.com', 'Tom and Jerry', 60);

-- --------------------------------------------------------

--
-- Table structure for table `shivamplasa`
--

CREATE TABLE IF NOT EXISTS `shivamplasa` (
  `movie` text NOT NULL,
  `screen` text NOT NULL,
  `bookdate` date NOT NULL,
  `time` text NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shivamplasa`
--


-- --------------------------------------------------------

--
-- Table structure for table `socialdistance`
--

CREATE TABLE IF NOT EXISTS `socialdistance` (
  `state` text NOT NULL,
  `date` date NOT NULL,
  `expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socialdistance`
--

INSERT INTO `socialdistance` (`state`, `date`, `expiry`) VALUES
('ON', '2021-05-21', '2021-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `theannexe`
--

CREATE TABLE IF NOT EXISTS `theannexe` (
  `movie` text NOT NULL,
  `screen` text NOT NULL,
  `bookdate` date NOT NULL,
  `time` text NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theannexe`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `coupon` text NOT NULL,
  `ticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `coupon`, `ticket`) VALUES
('Matin', 'shaikhmatin3230@gmail.com', 'matin@user', 'ABCD-10-1,FIRST-20-2', 7),
('Prajval', 'prajvalgandhi483@gmail.com', 'paju@user', '', 0),
('Prathamesh', 'prathameshchaudhary7122@gmail.com', 'pratham@user', 'BEST-20-2', 31);
