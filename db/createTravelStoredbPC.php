<?php
error_reporting(E_ALL ^ E_DEPRECATED);
/*
// ***** Warning this script should only be run during development and testing phase of this project ******
***** This script should only be run once at the start of production ******
***** If this script is run again, all data in the database is lost ******
Created by lho 5/3/2016
Purpose: create TravelShope database.
a consistant db for students to work with the final project
Updates: 
Updated by Jennifer Stratman 05/20/2017
Purpose: modifiy for Travel shop instead of pizza/PC shop, also updated to remove deprecated code

Updated by Jennifer Stratman 06/11/2017
Purpose: add feedback table to store customer feedback
*/
$servername = "localhost";
$username = "root";
// Password for Mac
//$password = "root";
// Password for PC
$password = "";

// create the connection string to MySQL

$conn = mysqli_connect($servername, $username, $password);

// verify the connection, display error if connection is not made
if (!$conn) {
die('Could not connect: ' . mysqli_connect_error($conn) . " <br />");
}

/****************************************************************************
Need to verify this section. Not yet updated.

****************************************************************************/
// Remove any old unique checks and identifiers
// create SQL Statement
$sql = "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;";

/****************************************************************************

****************************************************************************/

// run SQL statement and verify that it worked, display error
/****************************************************************************
MAY NEED TO REVERSE mysqli_query function --- mysqli_query($conn,$sql)
****************************************************************************/

if (mysqli_query($conn,$sql)){

echo "Unique checks set to 0 <br />";
}
else {
echo "Unique checks failed: " . mysqli_error($conn) . "<br />";
}
// create SQL Statement
$sql = "SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "Foreign keys set to 0 <br />";
}
else {
echo "Foreign keys failed: " . mysqli_error($conn) . "<br />";
}
// create SQL Statement
$sql = "SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "SQL mode set correctly <br />";
}
else {
echo "SQL mode failed: " . mysqli_error($conn) . "<br />";
}
// drop the database if it exists
// create SQL Statement
$sql = "DROP DATABASE IF EXISTS `TravelStoreDeluxe`;";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "Existing db dropped <br />";
}
else {
echo "db was not existing or drop did not work: " . mysqli_error($conn) . "<br />";
}
// Create the database / schema
// create SQL Statement
$sql = "CREATE DATABASE IF NOT EXISTS `TravelStoreDeluxe` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "db created <br />";
}
else {
echo "db was not created: " . mysqli_error($conn) . "<br />";
}
// switch to using the TravelStore database
// create SQL Statement
$sql = "USE `TravelStoreDeluxe`;";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "Using TravelStoredeluxe <br />";
}
else {
echo "Not using TravelStoredeluxe: " . mysqli_error($conn) . "<br />";
}
/*
-- -----------------------------------------------------
-- Table `customers`
-- -----------------------------------------------------
*/
// drop the existing table if it exists
// create SQL Statement
$sql = "DROP TABLE IF EXISTS `customers`;";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "customer table dropped <br />";
}
else {
echo "customer table not dropped or did not exist: " . mysqli_error($conn) . "<br />";
}
// create the SQL statement
$sql = "CREATE TABLE IF NOT EXISTS `customers` (";
$sql = $sql . "`custID` INT NOT NULL AUTO_INCREMENT, ";
$sql = $sql . "`custFName` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`custLName` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`custAdd1` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`custAdd2` VARCHAR(45) NULL, ";
$sql = $sql . "`custCity` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`custState` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`custZip` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`custEmail` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`custPhone` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`custSID` VARCHAR(100) NOT NULL, ";
$sql = $sql . "PRIMARY KEY (`custID`) ) ";
$sql = $sql . "ENGINE = InnoDB; ";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "customer table created <br />";
}
else {
echo "customer table not created: " . mysqli_error($conn) . "<br />";
}
/*
-- -----------------------------------------------------
-- Table `administrators`
-- -----------------------------------------------------
*/
// drop existing administrators table
// create SQL Statement
$sql = "DROP TABLE IF EXISTS `administrators`;";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "administrators table dropped <br />";
}
else {
echo "administrators table not dropped or did not exist: " . mysqli_error($conn) . "<br />";
}
// create administrators table
$sql = "CREATE TABLE IF NOT EXISTS `administrators` (";
$sql = $sql . "`adminID` INT NOT NULL AUTO_INCREMENT, ";
$sql = $sql . "`adminFName` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`adminLName` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`adminUser` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`adminPass` VARCHAR(200) NOT NULL, ";
$sql = $sql . "`active` VARCHAR(1) NOT NULL DEFAULT 'Y', ";
$sql = $sql . "PRIMARY KEY (`adminID`) ) ";
$sql = $sql . "ENGINE = InnoDB; ";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "administrators table created <br />";
}
else {
echo "administrators table not created: " . mysqli_error($conn) . "<br /><br />";
}
// create a default login for the administrators table
// create SQL statement
$sql = "INSERT INTO `TravelStoredeluxe`.`administrators` (`adminFName`, `adminLName`, `adminUser`, `adminPass`) ";
$sql = $sql . "VALUES ('Default', 'Administrator', 'default', 'Someth1ng');";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "Default Administrator created <br />";
}
else {
echo "Default Administrator not created: " . mysqli_error($conn) . "<br />";
}
/*
-- -----------------------------------------------------
-- Table `Travels`
-- -----------------------------------------------------
*/
// drop existing Travels table
// create SQL Statement
$sql = "DROP TABLE IF EXISTS `Travels`;";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "Travels table dropped <br />";
}
else {
echo "Travels table not dropped or did not exist: " . mysqli_error($conn) . "<br />";
}
// create the Travels table
$sql = "CREATE TABLE IF NOT EXISTS `Travels` (";
$sql = $sql . "`TravelID` INT NOT NULL AUTO_INCREMENT, ";
$sql = $sql . "`TravelOrderTime` DATETIME NOT NULL, ";
$sql = $sql . "`strTravel` VARCHAR(1000) NOT NULL, ";
$sql = $sql . "`fltSub` DECIMAL(10,2) NOT NULL, ";
$sql = $sql . "`fltTax` DECIMAL(10,2) NOT NULL, ";
$sql = $sql . "`fltTotal` DECIMAL(10,2) NOT NULL, ";
$sql = $sql . "`customers_custID` INT NOT NULL, ";
$sql = $sql . "`adminsrators_adminID` INT NULL, ";
$sql = $sql . "`phpSessionID` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`orderComplete` VARCHAR(1) NOT NULL DEFAULT 'N', ";
$sql = $sql . "PRIMARY KEY (`TravelID`) ) ";
$sql = $sql . "ENGINE = InnoDB; ";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "Travels table created <br />";
}
else {
echo "Travels table not created: " . mysqli_error($conn) . "<br />";
}
// add foreign keys
// create SQL statment
$sql = "ALTER TABLE `TravelStoredeluxe`.`Travels` ";
$sql = $sql . "ADD CONSTRAINT `fk_Travels_customers` ";
$sql = $sql . "FOREIGN KEY (`customers_custID` ) ";
$sql = $sql . "REFERENCES `TravelStoredeluxe`.`customers` (`custID` ) ";
$sql = $sql . "ON DELETE NO ACTION ";
$sql = $sql . "ON UPDATE NO ACTION ";
$sql = $sql . ", ADD INDEX `fk_Travels_customers_idx` (`customers_custID` ASC) ;";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "fk_Travels_customers FK created <br />";
}
else {
echo "fk_Travels_customers FK not created: " . mysqli_error($conn) . "<br />";
}
// add foreign keys
// create SQL statment
$sql = "ALTER TABLE `TravelStoredeluxe`.`Travels` ";
$sql = $sql . "ADD CONSTRAINT `fk_Travels_administrators` ";
$sql = $sql . "FOREIGN KEY (`adminsrators_adminID` ) ";
$sql = $sql . "REFERENCES `TravelStoredeluxe`.`administrators` (`adminID` ) ";
$sql = $sql . "ON DELETE NO ACTION ";
$sql = $sql . "ON UPDATE NO ACTION ";
$sql = $sql . ", ADD INDEX `fk_Travels_administrators_idx` (`adminsrators_adminID` ASC) ;";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "fk_Travels_administrators FK created <br />";
}
else {
echo "fk_Travels_administrators FK not created: " . mysqli_error($conn) . "<br />";
}

/*
-- -----------------------------------------------------
-- Table `Feedback`
-- -----------------------------------------------------
*/
// drop existing Feedback` table
// create SQL Statement
$sql = "DROP TABLE IF EXISTS `Feedback`;";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "Feedback table dropped <br />";
}
else {
echo "Feedback table not dropped or did not exist: " . mysqli_error($conn) . "<br />";
}
// create the Feedback table
$sql = "CREATE TABLE IF NOT EXISTS `Feedback` (";
$sql = $sql . "`FeedbackID` INT NOT NULL AUTO_INCREMENT, ";
$sql = $sql . "`FeedbackTime` DATETIME NOT NULL, ";
$sql = $sql . "`custNameFeedback` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`custEmail` VARCHAR(45) NOT NULL, ";
$sql = $sql . "`custCurrent` VARCHAR(1) NOT NULL DEFAULT 'Y', ";
$sql = $sql . "`custSelectFind` VARCHAR(45) NULL, ";
$sql = $sql . "`custComments` VARCHAR(256) NOT NULL, ";
$sql = $sql . "`feedbackAddressed` VARCHAR(1) NOT NULL DEFAULT 'N', ";
$sql = $sql . "`adminsrators_adminID` INT NULL, ";
$sql = $sql . "`custFeedbackSID` VARCHAR(100) NOT NULL, ";
$sql = $sql . "PRIMARY KEY (`FeedbackID`) ) ";
$sql = $sql . "ENGINE = InnoDB; ";


// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "Feedback table created <br />";
}
else {
echo "Feedback table not created: " . mysqli_error($conn) . "<br />";
}
// add foreign keys
// create SQL statment

// For now, no foreign keys required for this. 
// If I add an input for customers to include their travelID then there will be a need for the foreign keys.
//$sql = "ALTER TABLE `TravelStoredeluxe`.`Feedback` ";
//$sql = $sql . "ADD CONSTRAINT `fk_Travels_customers` ";
//$sql = $sql . "FOREIGN KEY (`customers_custID` ) ";
//$sql = $sql . "REFERENCES `TravelStoredeluxe`.`customers` (`custID` ) ";
//$sql = $sql . "ON DELETE NO ACTION ";
//$sql = $sql . "ON UPDATE NO ACTION ";
//$sql = $sql . ", ADD INDEX `fk_Travels_customers_idx` (`customers_custID` ASC) ;";

// run SQL statement and verify that it worked, display error
//if (mysqli_query($conn,$sql)){
//echo "fk_Travels_customers FK created <br />";
//}
//else {
//echo "fk_Travels_customers FK not created: " . mysqli_error($conn) . "<br />";
//}

// add foreign keys
// create SQL statment
$sql = "ALTER TABLE `TravelStoredeluxe`.`Feedback` ";
$sql = $sql . "ADD CONSTRAINT `fk_Feedback_administrators` ";
$sql = $sql . "FOREIGN KEY (`adminsrators_adminID` ) ";
$sql = $sql . "REFERENCES `TravelStoredeluxe`.`administrators` (`adminID` ) ";
$sql = $sql . "ON DELETE NO ACTION ";
$sql = $sql . "ON UPDATE NO ACTION ";
$sql = $sql . ", ADD INDEX `fk_Feedback_administrators_idx` (`adminsrators_adminID` ASC) ;";
// run SQL statement and verify that it worked, display error
if (mysqli_query($conn,$sql)){
echo "fk_Feedback_administrators FK created <br />";
}
else {
echo "fk_Feedback_administrators FK not created: " . mysqli_error($conn) . "<br />";
}



echo "<br /><br />";
echo "<h3>Database successfully created</h3>";
