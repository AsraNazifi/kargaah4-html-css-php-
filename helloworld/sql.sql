-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 12:32 PM
-- Server version: 8.0.15
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `itemlist` (
  `id` varchar(12) NOT NULL,
  `owner` int(10) NOT NULL,
  `price` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `class` int(1) NOT NULL,
  `url` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




CREATE TABLE `likelist` (
  `user` int(10) NOT NULL,
  `item` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `likelist` (`user`, `item`) VALUES
(2, '1190301001'),
(1, '1190301003'),
(1, '1190301004'),
(1, '2190301001'),
(1, '3190301002');


CREATE TABLE `userlist` (
  `id` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `userlist` (`id`, `name`, `email`, `password`) VALUES
(1, '1', '1@jhu.edu', '1'),
(2, '2', '2@jhu.edu', '2'),
(3, '123', '123@jhu.edu', '123');


ALTER TABLE `itemlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk1` (`owner`);

ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
