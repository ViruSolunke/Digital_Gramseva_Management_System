-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2026 at 12:58 PM
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
-- Database: `gram_panchayat`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `guardianName` varchar(255) DEFAULT NULL,
  `AadharNumber` varchar(12) DEFAULT NULL,
  `mobileNumber` varchar(15) DEFAULT NULL,
  `emailAddress` varchar(255) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `propertyID` varchar(100) DEFAULT NULL,
  `wardNumber` varchar(50) DEFAULT NULL,
  `familyMembers` int(11) DEFAULT NULL,
  `taxDues` varchar(50) DEFAULT NULL,
  `pipeSize` varchar(100) DEFAULT NULL,
  `connectionCategory` varchar(100) DEFAULT NULL,
  `plumberLicense` varchar(100) DEFAULT NULL,
  `application_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `fullName`, `guardianName`, `AadharNumber`, `mobileNumber`, `emailAddress`, `gender`, `propertyID`, `wardNumber`, `familyMembers`, `taxDues`, `pipeSize`, `connectionCategory`, `plumberLicense`, `application_id`, `created_at`) VALUES
(1, 'VIRENDRA ARVIND SOLUNKE', 'Arvind Solunke', '263459476418', '7743998594', 'virendrasolunke14@gmail.com', 'Male', '336/1', 'Ward No. 03', 3, 'No Dues (Cleared)', '0.75 Inch (High Pressure)', 'BPL (Below Poverty Line)', '', 'WTR-47552', '2026-01-13 14:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `birth_registrations`
--

CREATE TABLE `birth_registrations` (
  `id` int(11) NOT NULL,
  `childName` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `pob` varchar(255) DEFAULT NULL,
  `fatherName` varchar(255) DEFAULT NULL,
  `motherName` varchar(255) DEFAULT NULL,
  `fatherAadhaar` varchar(12) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `birth_registrations`
--

INSERT INTO `birth_registrations` (`id`, `childName`, `dob`, `gender`, `pob`, `fatherName`, `motherName`, `fatherAadhaar`, `mobile`, `reg_date`) VALUES
(1, 'VIRENDRA ARVIND SOLUNKE', '2026-01-13', 'Male', 'Chincholi, At Post', 'ARVIND', 'SHOBHA', '255254515151', '07743998594', '2026-01-13 04:51:20'),
(3, 'Rohit Dilip Solunke', '2026-01-14', 'Male', 'Chincholi, At Post', 'Dilip Solunke', 'Ranjana Solunke', '255254515151', '8390601250', '2026-01-13 04:57:09'),
(5, 'harshal arvind solunke', '2026-01-21', 'Male', 'Chincholi, At Post', 'ARVIND', 'SHOBHA', '255254515151', '07276240379', '2026-01-13 09:28:50'),
(6, 'VIRENDRA ARVIND SOLUNKE', '2026-01-27', 'Male', 'Chincholi, At Post', 'VIRENDRA ARVIND SOLUNKE', 'VIRENDRA ARVIND SOLUNKE', '255254515151', '07743998594', '2026-01-14 02:20:15'),
(7, 'VIRENDRA ARVIND SOLUNKE', '2026-03-18', 'Male', 'Chincholi, At Post', 'ARVIND', 'SHOBHA', '255254515151', '07276240379', '2026-03-11 06:48:20'),
(8, 'Rahul sharad koli', '2026-04-30', 'Male', 'Chincholi, At Post', 'VIRENDRA ARVIND SOLUNKE', 'VIRENDRA ARVIND SOLUNKE', '204565475874', '07276240379', '2026-04-29 12:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `trackingID` varchar(20) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `mobileNumber` varchar(20) DEFAULT NULL,
  `wardNumber` varchar(50) DEFAULT NULL,
  `essueType` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `proofPath` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `trackingID`, `fullName`, `mobileNumber`, `wardNumber`, `essueType`, `Description`, `proofPath`, `reg_date`) VALUES
(1, 'GP279820', 'Virendra Arvind Solunke', '7276240379', 'Ward 01', 'Electricity/Street Lights', 'Lights are not working in my area', 'uploads/1768305946_home.jpeg', '2026-01-13 12:05:46'),
(2, 'GP354249', 'Virendra Arvind Solunke', '7276240379', 'Ward 03', 'Encroachment', 'none', 'No file', '2026-01-13 12:11:15'),
(3, 'GP917983', 'Virendra Arvind Solunke', '7743998594', 'Ward 02', 'Water Supply Issue', 'none', 'uploads/1772438517_cast.jpg', '2026-03-02 08:01:57'),
(4, 'GP128922', 'VIRENDRA ARVIND SOLUNKE', '7276240379', 'Ward 01', 'Electricity/Street Lights', 'none', 'No file', '2026-03-11 12:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `gov_users`
--

CREATE TABLE `gov_users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gov_users`
--

INSERT INTO `gov_users` (`id`, `fullName`, `email`, `password`) VALUES
(1, 'VIRENDRA ARVIND SOLUNKE', 'virendrasolunke14@gmail.com', 'Virendra@2005'),
(2, 'Sagar santosh badgujar', 'sagarbadgujar425302@gmail.com', 'Sagar@2005'),
(3, 'Rohit Dilip Solunke', 'rohitsolunke26@gmail.com', 'Rohit@2005'),
(4, 'Harshal Arvind Solunke', 'harshalsolunke16@gmail.com', 'Harshal@2005'),
(5, 'mayur koli', 'mayur123@gmail.com', 'mayur@2005'),
(6, 'VIRENDRA ARVIND SOLUNKE', 'harshalsolunke08@gmail.com', 'Harshal@2001'),
(7, 'Rohit Dilip Solunke', 'rohitsolunke67@gmail.com', 'Rohit@2005'),
(8, 'rahul sharad koli', 'rahul20@gmail.com', 'Rahul@2005');

-- --------------------------------------------------------

--
-- Table structure for table `light_complaints`
--

CREATE TABLE `light_complaints` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(20) DEFAULT NULL,
  `complainant_name` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `ward` varchar(100) DEFAULT NULL,
  `pole_number` varchar(50) DEFAULT NULL,
  `fault_category` varchar(100) DEFAULT NULL,
  `emergency_level` varchar(50) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `light_complaints`
--

INSERT INTO `light_complaints` (`id`, `ticket_id`, `complainant_name`, `mobile_number`, `ward`, `pole_number`, `fault_category`, `emergency_level`, `landmark`, `description`, `reg_date`) VALUES
(1, 'LIT-32585', 'Virendra Arvind Solunke ', '7276240379', 'Ward No. 01 (Main Market)', '15', 'Light Completely Off', 'Normal (Routine Repair)', 'koli wada', 'none', '2026-01-13 14:52:34'),
(2, 'LIT-52804', 'Virendra Arvind Solunke ', '7276240379', 'Ward No. 03 (School Zone)', '15', 'Sparking in Junction Box', 'High (Dangerous Wires)', 'koli wada', '', '2026-03-11 12:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `mgnrega_requests`
--

CREATE TABLE `mgnrega_requests` (
  `id` int(11) NOT NULL,
  `job_card` varchar(50) NOT NULL,
  `worker_name` varchar(255) NOT NULL,
  `worker_aadhaar` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `days_count` int(11) NOT NULL,
  `ref_id` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'Request Submitted',
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mgnrega_requests`
--

INSERT INTO `mgnrega_requests` (`id`, `job_card`, `worker_name`, `worker_aadhaar`, `start_date`, `days_count`, `ref_id`, `status`, `submitted_at`) VALUES
(1, 'MH-01-001', 'Pandurang Gaikwad', '4582-9910-1234', '2026-01-20', 20, 'MH-01-001', 'Work Allocated', '2026-01-13 16:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `nrega_requests`
--

CREATE TABLE `nrega_requests` (
  `ref_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `days_count` int(11) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nrega_requests`
--

INSERT INTO `nrega_requests` (`ref_id`, `user_email`, `days_count`, `status`, `submitted_at`) VALUES
(1, 'user@example.com', 30, 'Pending', '2026-03-11 06:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `pmay_applications`
--

CREATE TABLE `pmay_applications` (
  `id` int(11) NOT NULL,
  `app_id` varchar(50) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `aadhar_number` varchar(12) DEFAULT NULL,
  `voter_id` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `disability` varchar(10) DEFAULT NULL,
  `bpl_card_no` varchar(50) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `annual_income` decimal(10,2) DEFAULT NULL,
  `bank_account_no` varchar(30) DEFAULT NULL,
  `bank_ifsc` varchar(20) DEFAULT NULL,
  `ward_number` int(11) DEFAULT NULL,
  `house_type` varchar(50) DEFAULT NULL,
  `room_count` int(11) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pmay_applications`
--

INSERT INTO `pmay_applications` (`id`, `app_id`, `full_name`, `mobile_number`, `aadhar_number`, `voter_id`, `dob`, `category`, `religion`, `disability`, `bpl_card_no`, `occupation`, `annual_income`, `bank_account_no`, `bank_ifsc`, `ward_number`, `house_type`, `room_count`, `submission_date`) VALUES
(1, 'PMAY-2026-68400', 'Virendra', '7276240379', '878944547845', 'HF585HJ', '2026-01-27', 'ST', 'Hinduism', 'No', 'BPL-555GTH', 'Farmer', 25000.00, '35229931179', 'SBIN0007898', 2, 'Kutcha (Hut)', 0, '2026-01-13 16:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `pmay_apps`
--

CREATE TABLE `pmay_apps` (
  `application_no` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `house_type` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_tax`
--

CREATE TABLE `property_tax` (
  `id` int(11) NOT NULL,
  `ack_number` varchar(50) DEFAULT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `aadhaar_number` varchar(12) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `property_type` varchar(100) DEFAULT NULL,
  `total_area` int(11) DEFAULT NULL,
  `built_area` int(11) DEFAULT NULL,
  `construction_year` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_tax`
--

INSERT INTO `property_tax` (`id`, `ack_number`, `owner_name`, `guardian_name`, `aadhaar_number`, `mobile_number`, `property_type`, `total_area`, `built_area`, `construction_year`, `address`, `created_at`) VALUES
(1, 'TAX-69935', 'Shobha Arvind Solunke', 'Arvind Jagganath Solunke', '400119257422', '+917743998594', 'Residential (House)', 1800, 1000, 2022, 'Chincholi, At Post', '2026-01-13 15:35:03'),
(2, 'TAX-36095', 'VIRENDRA ARVIND SOLUNKE', 'ARVIND', '400119257422', '7276240379', 'Residential (House)', 45, 35, 2026, 'Khwajamiya Road Near Law College Ganesh Colony Jalgaon Maharashtra 425001', '2026-03-11 12:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_applications`
--

CREATE TABLE `scholarship_applications` (
  `id` int(11) NOT NULL,
  `app_id` varchar(50) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `aadhar` varchar(12) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `income` decimal(10,2) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `prev_class` varchar(50) DEFAULT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `passing_year` int(11) DEFAULT NULL,
  `marks` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending Verification',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo_path` varchar(255) DEFAULT NULL,
  `sign_path` varchar(255) DEFAULT NULL,
  `bonafide_path` varchar(255) DEFAULT NULL,
  `caste_path` varchar(255) DEFAULT NULL,
  `income_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarship_applications`
--

INSERT INTO `scholarship_applications` (`id`, `app_id`, `full_name`, `email`, `phone`, `aadhar`, `category`, `income`, `course`, `college`, `university`, `prev_class`, `roll_number`, `passing_year`, `marks`, `status`, `created_at`, `photo_path`, `sign_path`, `bonafide_path`, `caste_path`, `income_path`) VALUES
(1, 'SCH-GOV-512419', 'VIRENDRA ARVIND SOLUNKE', 'virendrasolunke14@gmail.com', '7743998594', '123456789123', 'ST', 25000.00, 'BCA', 'baheti collage jalgoan', 'north maharashtra univercity', 'SY.BCA', '29', 2024, '72.26', 'Pending Verification', '2026-01-13 16:55:23', NULL, NULL, NULL, NULL, NULL),
(2, 'SCH-GOV-249588', 'VIRENDRA ARVIND SOLUNKE', 'himanimarathe043@gmail.com', '7743998594', '123456789123', 'SC', 23521.00, 'BCA', 'baheti collage jalgoan', 'north maharashtra univercity', 'SY.BCA', '29', 2025, '89.25', 'Pending Verification', '2026-01-13 17:04:08', NULL, NULL, NULL, NULL, NULL),
(3, 'SCH-GOV-506451', 'VIRENDRA ARVIND SOLUNKE', 'virendraSolunke14@gmail.com', '7743998594', '123456789123', 'Minority', 25000.00, 'BCA', 'baheti collage jalgoan', 'north maharashtra univercity', 'SY.BCA', '29', 2022, '72.26', 'Pending Verification', '2026-01-13 17:13:09', 'uploads/SCH-GOV-506451_photo.jpeg', 'uploads/SCH-GOV-506451_signature.jpg', 'uploads/SCH-GOV-506451_bonafide.jpeg', 'uploads/SCH-GOV-506451_casteCert.jpeg', 'uploads/SCH-GOV-506451_incomeCert.jpeg'),
(4, 'SCH-GOV-133991', 'VIRENDRA ARVIND SOLUNKE', 'virendrasolunke14@gmail.com', '7743998594', '123456789123', 'SC', 2867.00, 'BCA', 'baheti collage jalgoan', 'north maharashtra univercity', 'SY.BCA', '29', 2021, '72.26', 'Pending Verification', '2026-03-11 07:25:16', 'uploads/SCH-GOV-133991_photo.jpg', 'uploads/SCH-GOV-133991_signature.jpg', 'uploads/SCH-GOV-133991_bonafide.png', 'uploads/SCH-GOV-133991_casteCert.pdf', 'uploads/SCH-GOV-133991_incomeCert.png'),
(5, 'SCH-GOV-972859', 'sanika chaudhari', 'sanikachaudhari072@gmail.com', '8262992162', '125765544889', 'OBC', 23000.00, 'BCA', 'baheti collage jalgoan', 'north maharashtra univercity', 'TyBCA', '47', 2021, '62%', 'Pending Verification', '2026-03-12 03:54:09', 'uploads/SCH-GOV-972859_photo.png', 'uploads/SCH-GOV-972859_signature.png', 'uploads/SCH-GOV-972859_bonafide.png', 'uploads/SCH-GOV-972859_casteCert.png', 'uploads/SCH-GOV-972859_incomeCert.png'),
(6, 'SCH-GOV-495804', 'VIRENDRA ARVIND SOLUNKE', 'virendrasolunke14@gmail.com', '7743998594', '204565475874', 'SC', 62523.00, 'BSC', 'baheti collage jalgoan', 'north maharashtra univercity', 'TyBCA', '47', 2524, '62%', 'Pending Verification', '2026-04-29 13:12:12', 'uploads/SCH-GOV-495804_photo.png', 'uploads/SCH-GOV-495804_signature.jpg', 'uploads/SCH-GOV-495804_bonafide.png', 'uploads/SCH-GOV-495804_casteCert.jpeg', 'uploads/SCH-GOV-495804_incomeCert.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_apps`
--

CREATE TABLE `scholarship_apps` (
  `app_id` int(11) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `course` varchar(150) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `water_connections`
--

CREATE TABLE `water_connections` (
  `id` int(11) NOT NULL,
  `application_id` varchar(20) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `aadhar_number` varchar(12) DEFAULT NULL,
  `mobile_number` varchar(10) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `property_id` varchar(100) DEFAULT NULL,
  `ward_number` varchar(50) DEFAULT NULL,
  `family_members` int(11) DEFAULT NULL,
  `tax_dues` varchar(50) DEFAULT NULL,
  `pipe_size` varchar(100) DEFAULT NULL,
  `connection_category` varchar(100) DEFAULT NULL,
  `plumber_license` varchar(100) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `water_connections`
--

INSERT INTO `water_connections` (`id`, `application_id`, `full_name`, `guardian_name`, `aadhar_number`, `mobile_number`, `email_address`, `gender`, `property_id`, `ward_number`, `family_members`, `tax_dues`, `pipe_size`, `connection_category`, `plumber_license`, `submission_date`) VALUES
(1, 'WAT-18303', 'VIRENDRA ARVIND SOLUNKE', 'dibvgvhv', '878944547845', '7743998594', 'virendrasolunke14@gmail.com', 'Female', 'hygh', 'Ward No. 04', 4, 'Pending Dues', '1.0 Inch (Commercial/Large)', 'Commercial', '54515', '2026-01-13 15:20:30'),
(2, 'WAT-33129', 'Rohit Dilip Solunke', 'Dilip Solunke', '878944547845', '8390601250', 'rohitsolunke26@gmail.com', 'Male', '335/1', 'Ward No. 04', 4, 'Pending Dues', '1.0 Inch (Commercial/Large)', 'Commercial', 'MHG-3658_JG', '2026-01-13 15:22:25'),
(3, 'WAT-94702', 'VIRENDRA ARVIND SOLUNKE', 'Dilip Solunke', '878944547845', '7743998594', 'rohitsolunke26@gmail.com', 'Male', '335/1', 'Ward No. 04', 8, 'Pending Dues', '0.5 Inch (Standard Domestic)', 'General', '', '2026-01-13 15:33:54'),
(4, 'WAT-77184', 'VIRENDRA ARVIND SOLUNKE', 'Arvind Solunke', '123456789123', '7743998594', 'virendrasolunke14@gmail.com', 'Male', '335/1', 'Ward No. 02', 3, 'No Dues (Cleared)', '0.75 Inch (High Pressure)', 'BPL (Below Poverty Line)', '54515', '2026-03-11 12:29:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth_registrations`
--
ALTER TABLE `birth_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gov_users`
--
ALTER TABLE `gov_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `light_complaints`
--
ALTER TABLE `light_complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mgnrega_requests`
--
ALTER TABLE `mgnrega_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nrega_requests`
--
ALTER TABLE `nrega_requests`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `pmay_applications`
--
ALTER TABLE `pmay_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pmay_apps`
--
ALTER TABLE `pmay_apps`
  ADD PRIMARY KEY (`application_no`);

--
-- Indexes for table `property_tax`
--
ALTER TABLE `property_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarship_applications`
--
ALTER TABLE `scholarship_applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `app_id` (`app_id`);

--
-- Indexes for table `scholarship_apps`
--
ALTER TABLE `scholarship_apps`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `water_connections`
--
ALTER TABLE `water_connections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `birth_registrations`
--
ALTER TABLE `birth_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gov_users`
--
ALTER TABLE `gov_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `light_complaints`
--
ALTER TABLE `light_complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mgnrega_requests`
--
ALTER TABLE `mgnrega_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nrega_requests`
--
ALTER TABLE `nrega_requests`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pmay_applications`
--
ALTER TABLE `pmay_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pmay_apps`
--
ALTER TABLE `pmay_apps`
  MODIFY `application_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_tax`
--
ALTER TABLE `property_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scholarship_applications`
--
ALTER TABLE `scholarship_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `scholarship_apps`
--
ALTER TABLE `scholarship_apps`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `water_connections`
--
ALTER TABLE `water_connections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
