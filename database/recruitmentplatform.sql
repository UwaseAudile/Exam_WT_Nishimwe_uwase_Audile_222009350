-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 02:05 PM
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
-- Database: `recruitmentplatform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`, `full_name`, `created_at`, `updated_at`) VALUES
(1, 'Audile', 'uaudile@gmail.com', 'Audile@2024', 'Nishimwe Audile', '2024-05-18 09:55:24', '2024-05-18 09:55:24'),
(2, 'Jean', 'jeanpierreniyonshuti71@gmail.com', 'Jean@2020', 'Jean  Pierre NIYONSHUTI', '2024-05-18 09:57:54', '2024-05-18 09:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `ApplicationID` int(11) NOT NULL,
  `CandidateID` int(11) DEFAULT NULL,
  `JobID` int(11) DEFAULT NULL,
  `Status` enum('Pending','Reviewed','Rejected','Hired') NOT NULL,
  `DateApplied` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`ApplicationID`, `CandidateID`, `JobID`, `Status`, `DateApplied`) VALUES
(1, 1, 1, 'Rejected', '2024-05-19'),
(3, 3, 1, 'Pending', '2024-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `assessmentresults`
--

CREATE TABLE `assessmentresults` (
  `AssessmentID` int(11) NOT NULL,
  `CandidateID` int(11) DEFAULT NULL,
  `AssessmentType` varchar(50) NOT NULL,
  `Score` decimal(5,2) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessmentresults`
--

INSERT INTO `assessmentresults` (`AssessmentID`, `CandidateID`, `AssessmentType`, `Score`, `Date`, `Feedback`) VALUES
(1, 1, 'Behavioral', 95.00, '2024-05-19', 'Good understanding of concept');

-- --------------------------------------------------------

--
-- Table structure for table `backgroundcheck`
--

CREATE TABLE `backgroundcheck` (
  `CheckID` int(11) NOT NULL,
  `CandidateID` int(11) DEFAULT NULL,
  `TypeOfCheck` varchar(100) NOT NULL,
  `Status` enum('Pending','Cleared','Flagged') NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `backgroundcheck`
--

INSERT INTO `backgroundcheck` (`CheckID`, `CandidateID`, `TypeOfCheck`, `Status`, `Date`) VALUES
(1, 1, 'criminal record  ', 'Cleared', '2024-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `candidateprofiles`
--

CREATE TABLE `candidateprofiles` (
  `CandidateID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Resume` text DEFAULT NULL,
  `Skills` text DEFAULT NULL,
  `Education` text DEFAULT NULL,
  `Experience` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidateprofiles`
--

INSERT INTO `candidateprofiles` (`CandidateID`, `Name`, `Email`, `Phone`, `Resume`, `Skills`, `Education`, `Experience`) VALUES
(1, 'Jean Pierre NIYONSHUTI', 'jeanpierreniyonshuti71@gmail.com', 'NIYONSHUTI jean Pier', 'Attached in database', 'Java, Python, SQL', 'Bachelor\'s in Computer Science', '2 years'),
(2, 'Jane Smith', 'janesmith@example.com', '9876543210', 'Attached in database', 'Marketing, Social Media Management', 'Master\'s in Marketing', '3 years'),
(3, 'Jean Pierre NIYONSHUTI', 'jeanpierreniyonshuti71@gmail.com', '0786407569', 'Attached in database', 'Java, Python, SQL', 'Bachelor\'s in Computer Science', '2 years');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `Name`, `Email`, `Message`, `created_at`) VALUES
(1, 'Jean Pierre NIYONSHUTI', 'jeanpierreniyonshuti71@gmail.com', 'hello', '2024-05-19 06:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `InterviewID` int(11) DEFAULT NULL,
  `FeedbackType` enum('Positive','Negative') NOT NULL,
  `Comments` text DEFAULT NULL,
  `InterviewerName` varchar(100) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `InterviewID`, `FeedbackType`, `Comments`, `InterviewerName`, `Date`) VALUES
(1, 1, 'Positive', 'Candidate performed well technically', 'Interviewer 1', '2024-05-10'),
(2, 2, 'Negative', 'Candidate seemed unprepared', 'Interviewer 1', '2024-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `InterviewID` int(11) NOT NULL,
  `CandidateID` int(11) DEFAULT NULL,
  `JobID` int(11) DEFAULT NULL,
  `InterviewerID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`InterviewID`, `CandidateID`, `JobID`, `InterviewerID`, `Date`, `Time`, `Location`) VALUES
(1, 1, 1, 3, '2024-05-10', '10:00:00', 'Virtual'),
(2, 2, 2, 3, '2024-05-12', '11:00:00', 'Office');

-- --------------------------------------------------------

--
-- Table structure for table `joblistings`
--

CREATE TABLE `joblistings` (
  `JobID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Requirements` text DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `joblistings`
--

INSERT INTO `joblistings` (`JobID`, `Title`, `Description`, `Requirements`, `Location`, `CompanyID`) VALUES
(1, 'Software Developer', 'Seeking a skilled Software Developer...', 'Experience with Java, SQL, and web development.', 'New York', 2),
(2, 'Marketing Manager', 'Looking for an experienced Marketing Manager...', 'Experience in digital marketing and analytics.', 'Los Angeles', 3);

-- --------------------------------------------------------

--
-- Table structure for table `offerdetails`
--

CREATE TABLE `offerdetails` (
  `OfferID` int(11) NOT NULL,
  `CandidateID` int(11) DEFAULT NULL,
  `JobID` int(11) DEFAULT NULL,
  `OfferStatus` enum('Pending','Accepted','Declined') NOT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `Benefits` text DEFAULT NULL,
  `NegotiationHistory` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offerdetails`
--

INSERT INTO `offerdetails` (`OfferID`, `CandidateID`, `JobID`, `OfferStatus`, `Salary`, `Benefits`, `NegotiationHistory`) VALUES
(1, 1, 1, 'Accepted', 12000.00, 'Health insurance, 401k matc', 'Initial offer made');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `SkillID` int(11) NOT NULL,
  `SkillName` varchar(50) NOT NULL,
  `Description` text DEFAULT NULL,
  `ProficiencyLevel` enum('Beginner','Intermediate','Advanced') NOT NULL,
  `Certifications` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`SkillID`, `SkillName`, `Description`, `ProficiencyLevel`, `Certifications`) VALUES
(1, 'Java', 'Object-oriented programming language', 'Advanced', 'Oracle Certified Java Programmer'),
(2, 'SQL', 'Structured Query Language', 'Intermediate', 'Microsoft SQL Server Certification');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` enum('Admin','Recruiter','Interviewer','Candidate') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Password`, `Role`) VALUES
(1, 'admin', 'admin@example.com', 'admin123', 'Admin'),
(2, 'recruiter1', 'recruiter1@example.com', 'rec123', 'Recruiter'),
(3, 'interviewer1', 'interviewer1@example.com', 'int123', 'Interviewer'),
(4, 'candidate1', 'candidate1@example.com', 'cand123', 'Candidate'),
(5, 'candidate2', 'candidate2@example.com', 'cand456', 'Candidate'),
(6, '12123', 'nish@gmail.com', '12233', 'Candidate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`ApplicationID`),
  ADD KEY `CandidateID` (`CandidateID`),
  ADD KEY `JobID` (`JobID`);

--
-- Indexes for table `assessmentresults`
--
ALTER TABLE `assessmentresults`
  ADD PRIMARY KEY (`AssessmentID`),
  ADD KEY `CandidateID` (`CandidateID`);

--
-- Indexes for table `backgroundcheck`
--
ALTER TABLE `backgroundcheck`
  ADD PRIMARY KEY (`CheckID`),
  ADD KEY `CandidateID` (`CandidateID`);

--
-- Indexes for table `candidateprofiles`
--
ALTER TABLE `candidateprofiles`
  ADD PRIMARY KEY (`CandidateID`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `InterviewID` (`InterviewID`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`InterviewID`),
  ADD KEY `CandidateID` (`CandidateID`),
  ADD KEY `JobID` (`JobID`),
  ADD KEY `InterviewerID` (`InterviewerID`);

--
-- Indexes for table `joblistings`
--
ALTER TABLE `joblistings`
  ADD PRIMARY KEY (`JobID`),
  ADD KEY `CompanyID` (`CompanyID`);

--
-- Indexes for table `offerdetails`
--
ALTER TABLE `offerdetails`
  ADD PRIMARY KEY (`OfferID`),
  ADD KEY `CandidateID` (`CandidateID`),
  ADD KEY `JobID` (`JobID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`SkillID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `ApplicationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assessmentresults`
--
ALTER TABLE `assessmentresults`
  MODIFY `AssessmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `backgroundcheck`
--
ALTER TABLE `backgroundcheck`
  MODIFY `CheckID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidateprofiles`
--
ALTER TABLE `candidateprofiles`
  MODIFY `CandidateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `InterviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `joblistings`
--
ALTER TABLE `joblistings`
  MODIFY `JobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `offerdetails`
--
ALTER TABLE `offerdetails`
  MODIFY `OfferID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `SkillID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`CandidateID`) REFERENCES `candidateprofiles` (`CandidateID`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`JobID`) REFERENCES `joblistings` (`JobID`);

--
-- Constraints for table `assessmentresults`
--
ALTER TABLE `assessmentresults`
  ADD CONSTRAINT `assessmentresults_ibfk_1` FOREIGN KEY (`CandidateID`) REFERENCES `candidateprofiles` (`CandidateID`);

--
-- Constraints for table `backgroundcheck`
--
ALTER TABLE `backgroundcheck`
  ADD CONSTRAINT `backgroundcheck_ibfk_1` FOREIGN KEY (`CandidateID`) REFERENCES `candidateprofiles` (`CandidateID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`InterviewID`) REFERENCES `interviews` (`InterviewID`);

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_ibfk_1` FOREIGN KEY (`CandidateID`) REFERENCES `candidateprofiles` (`CandidateID`),
  ADD CONSTRAINT `interviews_ibfk_2` FOREIGN KEY (`JobID`) REFERENCES `joblistings` (`JobID`),
  ADD CONSTRAINT `interviews_ibfk_3` FOREIGN KEY (`InterviewerID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `joblistings`
--
ALTER TABLE `joblistings`
  ADD CONSTRAINT `joblistings_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `offerdetails`
--
ALTER TABLE `offerdetails`
  ADD CONSTRAINT `offerdetails_ibfk_1` FOREIGN KEY (`CandidateID`) REFERENCES `candidateprofiles` (`CandidateID`),
  ADD CONSTRAINT `offerdetails_ibfk_2` FOREIGN KEY (`JobID`) REFERENCES `joblistings` (`JobID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
