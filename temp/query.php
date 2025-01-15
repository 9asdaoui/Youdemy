<?php


$host = "localhost";
$db_name = "youdemydb";
$username = "root";
$password = "redaader@2000";
$selectUserByMail = 'SELECT id, username, email, password, role, status FROM Users WHERE email = :email';
$isertUser = 'INSERT INTO Users (username, email, password, role, status) VALUES (:username, :email, :password, :role, :status)';
$updatUserStatu = 'UPDATE Users SET status = :status WHERE id = :id';
$selectUserById = 'SELECT id, username, email, role, status FROM Users WHERE id = :id';
$selectAllUser = 'SELECT id, username, email, role, status FROM Users';
