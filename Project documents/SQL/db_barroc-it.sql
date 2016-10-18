-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 18 okt 2016 om 10:20
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `db_barroc-it`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_appointments`
--

CREATE TABLE IF NOT EXISTS `tbl_appointments` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `appointment_day` date NOT NULL,
  `next_action` text NOT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_customers`
--

CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) NOT NULL,
  `phone_number_1` varchar(50) NOT NULL,
  `phone_number_2` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `contact_person` varchar(255) NOT NULL,
  `internal_contact_person` varchar(255) NOT NULL,
  `potential_customer` tinyint(1) NOT NULL,
  `applications` text NOT NULL,
  `bank_nr` int(50) NOT NULL,
  `limit` varchar(255) NOT NULL,
  `credit_balance` varchar(255) NOT NULL,
  `credit_worthy` tinyint(1) NOT NULL,
  `ledger_account_number` varchar(255) NOT NULL,
  `gross_revenue` varchar(255) NOT NULL,
  `sales_percentage` int(2) NOT NULL,
  `number_of_invoices` int(11) NOT NULL,
  `last_contact_date` date NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `company_name`, `address_1`, `address_2`, `zipcode`, `phone_number_1`, `phone_number_2`, `email`, `fax`, `contact_person`, `internal_contact_person`, `potential_customer`, `applications`, `bank_nr`, `limit`, `credit_balance`, `credit_worthy`, `ledger_account_number`, `gross_revenue`, `sales_percentage`, `number_of_invoices`, `last_contact_date`) VALUES
(2, 'Hyatt-Kreiger', '6 Erie Street', '09 Redwing Drive', 'HA5 2LG', '86-(509)718-3390', '48-(770)771-5215', 'epeters0@jiathis.com', '86-(705)493-0746', 'Eugene Crawford', 'Evelyn Peters', 0, 'Domainer', 0, '€3568,28', '€1294,11', 1, '01-507-8906', '€183,61', 45, 0, '0000-00-00'),
(3, 'Glover, Douglas and Leuschke', '33 Hermina Alley', '59 Mccormick Trail', 'NW10 8UA', '1-(511)145-1142', '86-(587)974-6175', 'kstephens1@kickstarter.com', '52-(378)476-4283', 'Stephen Fox', 'Katherine Stephens', 1, 'Temp', 0, '€6558,07', '€12794,75', 1, '41-117-8231', '€866,80', 8, 0, '0000-00-00'),
(4, 'Berge-Halvorson', '053 Shasta Junction', '6538 Cascade Avenue', 'BA7 7JB', '27-(851)212-4888', '86-(148)374-7394', 'dgordon2@auda.org.au', '62-(266)648-7281', 'Debra Ward', 'Doris Gordon', 1, 'Holdlamis', 0, '€7027,95', '€16355,08', 0, '86-861-3595', '€940,63', 85, 0, '0000-00-00'),
(5, 'Von Group', '79149 Luster Crossing', '7 Loftsgordon Point', 'L75 1BB', '63-(852)117-0538', '63-(938)931-8629', 'jward3@latimes.com', '86-(277)907-2529', 'Justin Stone', 'Jeffrey Ward', 0, 'Vagram', 0, '€4895,79', '€9185,35', 0, '45-765-9866', '€486,39', 62, 0, '0000-00-00'),
(6, 'Thiel and Sons', '594 Evergreen Drive', '324 Parkside Drive', 'DN55 1NT', '7-(695)144-2027', '63-(128)927-9127', 'krodriguez4@plala.or.jp', '55-(484)357-1027', 'Sean Lane', 'Keith Rodriguez', 0, 'Lotlux', 0, '€3564,44', '€10651,91', 0, '41-975-1154', '€250,32', 51, 0, '0000-00-00'),
(7, 'Sporer Inc', '93914 Mayfield Pass', '1 Bowman Pass', 'CW12 4JB', '62-(252)117-8552', '57-(381)268-1634', 'mbutler5@nydailynews.com', '55-(234)954-7550', 'Julie Nichols', 'Marie Butler', 1, 'Otcom', 0, '€3508,31', '€16092,68', 1, '45-512-1408', '€270,80', 64, 0, '0000-00-00'),
(8, 'Kemmer, Grimes and Schimmel', '836 Granby Plaza', '85 Mesta Crossing', 'CA21 2YJ', '86-(218)285-8140', '86-(134)663-5466', 'cknight6@hubpages.com', '254-(616)969-7799', 'Laura Wilson', 'Cynthia Knight', 0, 'Otcom', 0, '€2867,82', '€13461,18', 1, '48-560-2363', '€764,63', 18, 0, '0000-00-00'),
(9, 'Skiles LLC', '92 Riverside Crossing', '907 Weeping Birch Alley', 'IV5 7NX', '7-(158)849-6887', '970-(480)840-2492', 'phoward7@tinyurl.com', '48-(169)345-1591', 'Bonnie Diaz', 'Patrick Howard', 0, 'Overhold', 0, '€806,94', '€4316,84', 1, '91-856-6632', '€794,87', 27, 0, '0000-00-00'),
(10, 'Ziemann-Anderson', '637 Petterle Pass', '02719 Hauk Point', 'EC1Y 8ND', '84-(869)206-6413', '84-(709)699-4701', 'dstewart8@comsenz.com', '63-(137)543-7936', 'Jane Ford', 'Daniel Stewart', 0, 'Vagram', 0, '€5201,26', '€5212,23', 1, '84-602-0125', '€505,33', 66, 0, '0000-00-00'),
(11, 'Larkin-Emard', '27 Ridgeview Lane', '810 Maple Circle', 'PH4 1QF', '389-(110)108-8111', '62-(477)444-5488', 'rramirez9@weebly.com', '62-(489)630-9837', 'Anthony Kennedy', 'Robin Ramirez', 1, 'Overhold', 0, '€125,65', '€9910,08', 1, '43-913-3515', '€331,10', 14, 0, '0000-00-00'),
(12, 'Olson Inc', '66 Luster Plaza', '5303 Kensington Parkway', 'EC4A 1AB', '30-(518)330-2210', '93-(359)455-9460', 'bgriffina@123-reg.co.uk', '7-(366)396-2328', 'Deborah Peterson', 'Barbara Griffin', 1, 'Solarbreeze', 0, '€9192,53', '€5165,55', 1, '05-230-2818', '€969,57', 87, 0, '0000-00-00'),
(13, 'Bernhard Inc', '273 Kennedy Junction', '6298 Green Ridge Lane', 'TF1 2DH', '58-(408)791-5821', '86-(450)317-6966', 'jwatsonb@hud.gov', '374-(754)676-5308', 'Fred Snyder', 'Jimmy Watson', 0, 'Greenlam', 0, '€4672,99', '€12163,54', 0, '60-955-9729', '€443,46', 51, 0, '0000-00-00'),
(14, 'O''Conner-Herman', '62272 Algoma Pass', '9949 Northfield Parkway', 'WV4 4RA', '62-(591)310-6253', '81-(345)475-5801', 'hhughesc@macromedia.com', '86-(894)599-3640', 'Russell Peters', 'Helen Hughes', 1, 'Y-Solowarm', 0, '€7031,10', '€8154,27', 1, '99-022-5334', '€158,43', 41, 0, '0000-00-00'),
(15, 'Turcotte Inc', '0673 Spenser Plaza', '9 Lillian Circle', 'UB1 2XP', '380-(382)200-9855', '62-(550)670-8984', 'roliverd@nsw.gov.au', '86-(450)214-3743', 'Betty Hawkins', 'Ronald Oliver', 0, 'Veribet', 0, '€5098,93', '€9091,12', 1, '66-395-2436', '€120,70', 16, 0, '0000-00-00'),
(16, 'Connelly-Glover', '97861 6th Alley', '91543 Canary Park', 'BD4 9NE', '55-(279)135-8251', '351-(972)427-5700', 'cjacksone@buzzfeed.com', '33-(660)305-9965', 'Julie Schmidt', 'Chris Jackson', 1, 'Voyatouch', 0, '€2750,65', '€14234,88', 0, '53-002-7855', '€875,89', 41, 0, '0000-00-00'),
(17, 'Wehner-Fay', '06461 Monica Parkway', '86395 Tennessee Circle', 'IV9 8QX', '86-(351)885-5278', '62-(377)135-9164', 'rdanielsf@aboutads.info', '57-(240)695-4402', 'Lois Jacobs', 'Richard Daniels', 1, 'Stim', 0, '€4771,45', '€4678,15', 1, '84-147-0795', '€726,35', 54, 0, '0000-00-00'),
(18, 'Bernier-Daniel', '4 Roxbury Place', '70577 1st Pass', 'LL43 2AH', '84-(286)558-7816', '86-(891)935-7049', 'shuntg@unblog.fr', '374-(456)930-2193', 'Paul Graham', 'Shawn Hunt', 0, 'Fixflex', 0, '€2403,23', '€361,30', 1, '54-953-0672', '€516,23', 87, 0, '0000-00-00'),
(19, 'Fisher Inc', '48 Morrow Street', '34 Manufacturers Lane', 'M29 8BY', '86-(505)903-4188', '244-(636)774-6927', 'ayoungh@bloglovin.com', '52-(403)467-3725', 'Joyce Mills', 'Anthony Young', 0, 'Daltfresh', 0, '€9345,70', '€18186,36', 0, '67-520-4386', '€979,39', 50, 0, '0000-00-00'),
(20, 'Frami-Bahringer', '5620 Dovetail Plaza', '385 Reindahl Park', 'CF43 4PG', '55-(924)950-2728', '33-(981)810-1063', 'mhawkinsi@hud.gov', '1-(352)326-9689', 'Frank Garcia', 'Marie Hawkins', 1, 'Flowdesk', 0, '€9568,99', '€13169,37', 1, '66-266-5444', '€983,39', 90, 0, '0000-00-00'),
(21, 'Bogisich and Sons', '79701 Crownhardt Junction', '5 Eagan Place', 'WR6 6PZ', '62-(509)804-0953', '86-(238)503-1302', 'dpiercej@mtv.com', '691-(137)916-3871', 'Kathy Olson', 'Donald Pierce', 0, 'Redhold', 0, '€2726,05', '€2189,92', 1, '88-596-6906', '€330,67', 15, 0, '0000-00-00'),
(22, 'Koelpin-Glover', '3 West Place', '43542 Forest Alley', 'HS3 3AP', '353-(527)354-0981', '57-(457)216-4769', 'aoliverk@yellowpages.com', '20-(721)644-7856', 'Benjamin Dunn', 'Angela Oliver', 1, 'Greenlam', 0, '€182,44', '€17675,73', 0, '69-673-9373', '€278,63', 2, 0, '0000-00-00'),
(23, 'Johnston, Runte and Collier', '747 Chinook Circle', '67549 Rusk Avenue', 'LA6 2WY', '420-(635)700-9239', '380-(393)316-7622', 'bleel@marriott.com', '63-(903)835-4460', 'Cynthia Jones', 'Betty Lee', 0, 'Fintone', 0, '€3829,56', '€8629,29', 1, '68-535-3897', '€114,42', 71, 0, '0000-00-00'),
(24, 'Greenholt-Kiehn', '39382 Memorial Street', '0 Mariners Cove Lane', 'CW6 0HF', '62-(534)822-7460', '46-(751)973-7682', 'asimmonsm@google.fr', '504-(532)266-3897', 'Stephen Bowman', 'Anna Simmons', 0, 'Greenlam', 0, '€6793,10', '€8821,71', 1, '63-104-0482', '€403,32', 5, 0, '0000-00-00'),
(25, 'Reichert-Kilback', '41 Melody Street', '8250 Westerfield Center', 'SO43 7BJ', '57-(391)277-2726', '86-(211)399-2661', 'rmeyern@unblog.fr', '7-(429)715-5717', 'Rachel Phillips', 'Robert Meyer', 0, 'Vagram', 0, '€3609,97', '€7443,02', 0, '14-781-8208', '€364,13', 51, 0, '0000-00-00'),
(26, 'Koch-Emmerich', '77 4th Plaza', '91 Becker Lane', 'DE45 1WR', '57-(388)376-4997', '86-(610)549-6896', 'dcoopero@upenn.edu', '62-(983)725-7477', 'Betty Davis', 'Douglas Cooper', 0, 'Matsoft', 0, '€4954,78', '€5682,27', 1, '22-082-4117', '€169,18', 47, 0, '0000-00-00'),
(27, 'Gerhold LLC', '657 Mayer Road', '12 Moulton Alley', 'BB11 1BA', '86-(795)358-1233', '62-(242)939-5209', 'fwestp@walmart.com', '86-(480)500-0437', 'Steven Diaz', 'Frank West', 1, 'Cookley', 0, '€6600,13', '€13003,47', 1, '74-174-8050', '€101,33', 50, 0, '0000-00-00'),
(28, 'Kozey Group', '87 Anhalt Court', '0526 Sutherland Street', '2540-593', '351-(457)554-9614', '420-(446)963-7046', 'svasquezq@tinyurl.com', '63-(316)812-8034', 'Sandra Palmer', 'Steve Vasquez', 0, 'Asoka', 0, '€3270,51', '€7863,28', 1, '44-317-0079', '€579,62', 20, 0, '0000-00-00'),
(29, 'Bednar-Satterfield', '19 Sachtjen Parkway', '5753 Sutherland Trail', 'FK1 1BA', '55-(348)524-0529', '351-(148)402-3888', 'ksmithr@weather.com', '33-(186)162-3272', 'Jean Adams', 'Kathryn Smith', 0, 'Aerified', 0, '€4990,91', '€3617,19', 1, '81-697-1348', '€460,88', 59, 0, '0000-00-00'),
(30, 'Mante and Sons', '014 Waxwing Avenue', '97146 Petterle Park', 'SO25 1AD', '62-(845)834-3610', '376-(201)741-1281', 'awelchs@goo.ne.jp', '1-(827)768-5016', 'Gregory Bowman', 'Annie Welch', 0, 'Kanlam', 0, '€3724,87', '€14971,59', 0, '45-480-0138', '€983,43', 7, 0, '0000-00-00'),
(31, 'Paucek, Dicki and Kohler', '41 Mesta Junction', '77940 Mifflin Street', 'IP98 9RA', '48-(888)233-0915', '58-(644)261-4703', 'bbrownt@uiuc.edu', '63-(796)892-3125', 'Jennifer Fuller', 'Bobby Brown', 0, 'Zamit', 0, '€7997,40', '€13568,91', 0, '99-785-6306', '€769,22', 37, 0, '0000-00-00'),
(32, 'Weissnat-Feeney', '4 Heath Point', '4 Mockingbird Junction', 'PA66 6BW', '62-(762)306-4334', '86-(826)291-6038', 'achapmanu@myspace.com', '381-(621)164-9899', 'Cheryl Tucker', 'Alice Chapman', 0, 'Tampflex', 0, '€657,16', '€16877,00', 1, '90-241-3961', '€749,83', 46, 0, '0000-00-00'),
(33, 'DuBuque and Sons', '3879 Lakewood Gardens Lane', '1081 Elmside Junction', 'NR3 4EB', '353-(402)970-3467', '86-(573)643-6740', 'abradleyv@uol.com.br', '86-(458)606-8341', 'Phillip Black', 'Alice Bradley', 1, 'Asoka', 0, '€7452,65', '€13823,60', 0, '77-870-3343', '€718,30', 57, 0, '0000-00-00'),
(34, 'Hodkiewicz, Torp and Mante', '9784 Scoville Point', '739 Corben Point', 'UB2 4JE', '387-(436)235-2183', '7-(630)531-7626', 'jandersonw@msu.edu', '46-(946)169-0409', 'Kimberly Holmes', 'Jesse Anderson', 1, 'Matsoft', 0, '€4619,34', '€7369,11', 0, '30-768-1207', '€500,17', 28, 0, '0000-00-00'),
(35, 'Veum, Balistreri and Roob', '519 Cherokee Center', '942 Mallard Alley', 'G78 3PU', '380-(630)126-1233', '86-(538)720-7144', 'jortizx@amazon.de', '33-(446)228-6538', 'Katherine Garza', 'Jeffrey Ortiz', 0, 'Zaam-Dox', 0, '€1821,72', '€4804,10', 0, '32-652-8259', '€750,05', 46, 0, '0000-00-00'),
(36, 'Mayer-Wolff', '753 Summer Ridge Plaza', '46 Eastwood Court', 'BT8 4PT', '62-(976)911-5341', '351-(992)773-2914', 'tperkinsy@ocn.ne.jp', '7-(116)484-5780', 'Ernest West', 'Thomas Perkins', 0, 'Bamity', 0, '€9986,22', '€5398,36', 0, '34-931-2104', '€838,98', 61, 0, '0000-00-00'),
(37, 'Towne LLC', '2310 Carpenter Alley', '27 Sugar Road', '4990-565', '351-(232)476-2526', '86-(419)559-8793', 'dellisz@examiner.com', '86-(946)835-8857', 'Kimberly Kelley', 'Denise Ellis', 1, 'Rank', 0, '€5411,62', '€14115,88', 0, '66-528-5491', '€275,43', 1, 0, '0000-00-00'),
(38, 'Block, Walker and White', '132 Spaight Junction', '3980 Mesta Circle', 'SA20 0HJ', '7-(167)905-9467', '58-(828)908-5195', 'jwoods10@hugedomains.com', '51-(701)594-8266', 'Donna Rivera', 'Justin Woods', 0, 'Fixflex', 0, '€3244,80', '€16300,38', 1, '74-672-9392', '€855,12', 4, 0, '0000-00-00'),
(39, 'Hagenes-Lebsack', '081 Ridgeway Pass', '9935 Ilene Circle', '74164 CEDEX', '33-(584)323-2577', '62-(758)579-2263', 'mmedina11@alexa.com', '55-(836)295-6958', 'Emily Matthews', 'Marie Medina', 0, 'Quo Lux', 0, '€5884,55', '€14771,86', 1, '14-102-6222', '€713,63', 75, 0, '0000-00-00'),
(40, 'Tillman, Corkery and Zieme', '919 Namekagon Point', '808 Texas Drive', 'KA7 3HB', '54-(773)310-5412', '98-(366)588-1547', 'jphillips12@spotify.com', '967-(293)999-1297', 'Steven Jordan', 'Jacqueline Phillips', 0, 'Zoolab', 0, '€8167,82', '€313,03', 0, '70-443-1887', '€714,27', 41, 0, '0000-00-00'),
(41, 'Mohr Inc', '320 Morningstar Pass', '0 Fisk Road', 'DD5 3HP', '81-(570)595-3255', '380-(460)765-6747', 'lhamilton13@bigcartel.com', '62-(407)219-5675', 'Carlos Dean', 'Laura Hamilton', 1, 'Bitwolf', 0, '€4405,69', '€1839,94', 1, '02-365-2419', '€352,96', 100, 0, '0000-00-00'),
(42, 'Jakubowski-Berge', '5 Loftsgordon Park', '933 Brentwood Circle', 'SM1 1JU', '48-(179)570-3368', '380-(264)244-6296', 'jclark14@purevolume.com', '963-(929)349-0202', 'Kenneth Cook', 'Joe Clark', 1, 'Cardguard', 0, '€6103,49', '€2498,04', 0, '88-535-7467', '€960,58', 99, 0, '0000-00-00'),
(43, 'Reichel, Rowe and Hackett', '368 Dexter Drive', '2 Parkside Crossing', 'HP27 0PD', '66-(404)765-2687', '86-(337)472-4067', 'wsullivan15@ebay.com', '30-(329)651-8142', 'Clarence Jackson', 'Willie Sullivan', 1, 'Lotlux', 0, '€5156,51', '€18534,98', 1, '35-109-3247', '€954,03', 11, 0, '0000-00-00'),
(44, 'Orn LLC', '2 Luster Center', '586 Sunbrook Lane', 'ZE2 9AF', '389-(613)770-3599', '33-(680)552-0175', 'tmoreno16@tripadvisor.com', '262-(264)915-1099', 'Dennis Meyer', 'Todd Moreno', 1, 'Stronghold', 0, '€8487,28', '€1283,24', 1, '28-514-5303', '€425,60', 82, 0, '0000-00-00'),
(45, 'Johns-Mueller', '1848 Cardinal Crossing', '1638 Bay Center', 'TS11 8HX', '55-(536)557-6171', '62-(594)731-5937', 'jgarcia17@biblegateway.com', '86-(104)870-0510', 'Kimberly Jackson', 'Janet Garcia', 1, 'Bitwolf', 0, '€8681,60', '€12510,36', 1, '24-377-5317', '€112,83', 87, 0, '0000-00-00'),
(46, 'Yundt Group', '362 Lawn Point', '1 Namekagon Trail', 'DT2 8BJ', '234-(675)673-1328', '49-(281)723-7280', 'jmeyer18@dropbox.com', '353-(596)632-4319', 'Roy Jordan', 'Janet Meyer', 0, 'Y-Solowarm', 0, '€5940,10', '€1533,61', 1, '08-148-4826', '€868,99', 3, 0, '0000-00-00'),
(47, 'Schoen, Mante and Kessler', '068 Dayton Way', '3 Dahle Terrace', 'HX5 9BL', '81-(458)524-6845', '63-(136)752-3763', 'mwest19@princeton.edu', '380-(266)525-2761', 'Eric Ferguson', 'Martin West', 0, 'Lotstring', 0, '€2275,69', '€440,64', 0, '15-763-2609', '€475,86', 7, 0, '0000-00-00'),
(48, 'Witting Inc', '5173 Memorial Park', '81 Algoma Parkway', '4755-211', '351-(488)682-9477', '380-(585)782-8365', 'arussell1a@google.com.hk', '84-(504)769-2372', 'Anna Sullivan', 'Adam Russell', 0, 'Fintone', 0, '€2810,41', '€16875,49', 1, '40-209-8735', '€174,78', 50, 0, '0000-00-00'),
(49, 'Padberg, Lesch and Smitham', '6 Center Park', '40420 Leroy Place', 'EX9 7BQ', '55-(253)781-5641', '30-(181)897-6348', 'adixon1b@go.com', '1-(710)328-7713', 'Frank Watson', 'Andrew Dixon', 1, 'Fix San', 0, '€815,41', '€4984,53', 0, '38-132-7062', '€913,09', 35, 0, '0000-00-00'),
(50, 'Farrell Inc', '4 Fremont Plaza', '424 Petterle Circle', 'BN42 4HN', '63-(249)386-1276', '62-(306)876-5030', 'jgray1c@geocities.com', '62-(285)849-1370', 'Shawn Tucker', 'James Gray', 0, 'Namfix', 0, '€5542,50', '€5885,09', 1, '93-536-0048', '€957,36', 5, 0, '0000-00-00'),
(51, 'Ward, Wuckert and Welch', '276 Eagle Crest Avenue', '65833 Cardinal Trail', 'BD11 1LH', '240-(798)986-4272', '383-(203)494-8993', 'jwheeler1d@gizmodo.com', '86-(459)629-3614', 'Christopher Wallace', 'Joan Wheeler', 0, 'Lotlux', 0, '€5413,46', '€2464,55', 0, '17-579-7930', '€474,94', 23, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_invoices`
--

CREATE TABLE IF NOT EXISTS `tbl_invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `invoice_nr` int(14) NOT NULL,
  `price` varchar(255) NOT NULL,
  `tax` int(2) NOT NULL,
  `total` varchar(255) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_projects`
--

CREATE TABLE IF NOT EXISTS `tbl_projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `hardware&software` text NOT NULL,
  `maintenance_contract` tinyint(1) NOT NULL,
  `description` text,
  PRIMARY KEY (`project_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_quotations`
--

CREATE TABLE IF NOT EXISTS `tbl_quotations` (
  `quotation_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `quotation_number` int(20) NOT NULL,
  `quotation_date` date NOT NULL,
  `order_type` varchar(11) NOT NULL,
  PRIMARY KEY (`quotation_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`) VALUES
(1, 'Admin', 'Barroc-IT'),
(2, 'Sales', 'Barroc-IT'),
(3, 'Finance', 'Barroc-IT'),
(4, 'Development', 'Barroc-IT');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  ADD CONSTRAINT `tbl_appointments_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `tbl_projects` (`project_id`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  ADD CONSTRAINT `tbl_invoices_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `tbl_projects` (`project_id`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD CONSTRAINT `tbl_projects_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `tbl_quotations`
--
ALTER TABLE `tbl_quotations`
  ADD CONSTRAINT `tbl_quotations_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
