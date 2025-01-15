<?php
require_once "../vendor/autoload.php";
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('Youdemy');

$logFile = '../loger.log';

$log->pushHandler(new StreamHandler($logFile, level::Debug));


// auth to the devlopper onlyy !! dont forget
// header("Content-Type: application/json");

// if (file_exists($logFile)) {
//     $logs = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
//     echo json_encode($logs);
// } else {
//     echo json_encode(["Log file not found."]);
// }




// Successful Login:
// $log->info('<p>User with email ' . $myuser["email"] . ' successfully logged in.</p>');
// Failed Login (Wrong credentials):
// $log->warning('User with email ' . $myuser["email"] . ' attempted to log in with incorrect credentials (email or password).');
// Account Locked:
// $log->error('User with email ' . $myuser["email"] . ' tried to log in but their account is locked.');
// Successful Logout:
// $log->info('User with email ' . $myuser["email"] . ' logged out successfully.');
// Successful User Registration:
// $log->info('New user registered with email ' . $myuser["email"] . '.');
// Failed Registration Attempt:
// $log->warning('Failed registration attempt for email ' . $myuser["email"] . '.');
// General Error:
// $log->error('An error occurred: ' . $errorMessage);
// Database Connection Failure:
// $log->error('Failed to connect to the database. Error: ' . $dbError);
// Invalid Input or Request:
// $log->warning('Invalid input detected. Details: ' . $inputDetails);
// Unauthorized Access Attempt:
// $log->warning('Unauthorized access attempt by ' . $myuser["email"] . '.');
// Accessing Restricted Area:
// $log->warning('User with email ' . $myuser["email"] . ' tried to access a restricted area.');
// Brute Force Login Attempts:
// $log->warning('Multiple failed login attempts detected for email ' . $myuser["email"] . '.');
// Role Change:
// $log->info('User with email ' . $myuser["email"] . ' role changed to ' . $myuser["role"] . '.');
// Payment Success:
// $log->info('Payment of $' . $paymentAmount . ' for user ' . $myuser["email"] . ' was successful.');
// Payment Failure:
// $log->error('Payment failure for user ' . $myuser["email"] . '. Error: ' . $paymentError)
// System Start:
// $log->info('System started successfully.');
// System Shutdown:
// $log->info('System shut down.');
// Admin Deleting User Account:
// $log->info('Admin deleted user account with email ' . $myuser["email"] . '.');
// Admin Resetting User Password:
// $log->info('Admin reset password for user ' . $myuser["email"] . '.');
// Application Update:
// $log->info('Application update completed successfully.');
// Debugging Variables:
// $log->debug('Debugging: ' . var_export($variable, true));