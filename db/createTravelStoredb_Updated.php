<?php
error_reporting(E_ALL ^ E_DEPRECATED);
/*
// ***** Warning this script should only be run during development and testing phase of this project ******
***** This script should only be run once at the start of production ******
***** If this script is run again, all data in the database is lost ******
Created by lho 5/3/2016
Purpose: create TravelStoredeluxe database.
a consistant db for students to work with the final project
Updates:
*/
// create the connection string to MySQL


// Removed original code and replaced with mysqli
/*********************************************************************************************************************
 Original code. Removed for testing purposes. mysql_connect is Deprecated.
 $con = mysql_connect("localhost","root","");
*********************************************************************************************************************/
$con = new mysqli("localhost","root","","");
// verify the connection, display error if connection is not made
if (!$con) {
die('Could not connect: ' . mysql_error() . " <br />");
}
// Remove any old unique checks and identifiers
// create SQL Statement
$sql = "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;";
// run SQL statement and verify that it worked, display error

// Removed original code and replaced with mysql_query
/**********************************************************************************************************************
if (mysql_query($sql,$con)){
***********************************************************************************************************************/
if (mysql_query($sql,$con)) {
	
echo "Unique checks set to 0 <br />";
}
else {
echo "Unique checks failed: " . mysql_error() . "<br />";
}
// create SQL Statement
$sql = "SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;";
// run SQL statement and verify that it worked, display error
if (mysql_query($sql,$con)){
echo "Foreign keys set to 0 <br />";
}
else {
echo "Foreign keys failed: " . mysql_error() . "<br />";
}
// create SQL Statement
$sql = "SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';";
// run SQL statement and verify that it worked, display error
if (mysql_query($sql,$con)){
echo "SQL mode set correctly <br />";
}
else {
echo "SQL mode failed: " . mysql_error() . "<br />";
}
// drop the database if it exists
// create SQL Statement
$sql = "DROP DATABASE IF EXISTS `TravelStoreDeluxe`;";
// run SQL statement and verify that it worked, display error
if (mysql_query($sql,$con)){
echo "Existing db dropped <br />";
}
else {
echo "db was not existing or drop did not work: " . mysql_error() . "<br />";
}
// Create the database / schema
// create SQL Statement
$sql = "CREATE DATABASE IF NOT EXISTS `TravelStoreDeluxe` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
// run SQL statement and verify that it worked, display error
if (mysql_query($sql,$con)){
echo "db created <br />";
}
else {
echo "db was not created: " . mysql_error() . "<br />";
}
// switch to using the TravelStore database
// create SQL Statement
$sql = "USE `TravelStoreDeluxe`;";
// run SQL statement and verify that it worked, display error
if (mysql_query($sql,$con)){
echo "Using TravelStoredeluxe <br />";
}
else {
echo "Not using TravelStoredeluxe: " . mysql_error() . "<br />";
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
if (mysql_query($sql,$con)){
echo "customer table dropped <br />";
}
else {
echo "customer table not dropped or did not exist: " . mysql_error() . "<br />";
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
if (mysql_query($sql,$con)){
echo "customer table created <br />";
}
else {
echo "customer table not created: " . mysql_error() . "<br />";
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
if (mysql_query($sql,$con)){
echo "administrators table dropped <br />";
}
else {
echo "administrators table not dropped or did not exist: " . mysql_error() . "<br />";
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
if (mysql_query($sql,$con)){
echo "administrators table created <br />";
}
else {
echo "administrators table not created: " . mysql_error() . "<br /><br />";
}
// create a default login for the administrators table
// create SQL statement
$sql = "INSERT INTO `TravelStoredeluxe`.`administrators` (`adminFName`, `adminLName`, `adminUser`, `adminPass`) ";
$sql = $sql . "VALUES ('Default', 'Administrator', 'default', 'Someth1ng');";
// run SQL statement and verify that it worked, display error
if (mysql_query($sql,$con)){
echo "Default Administrator created <br />";
}
else {
echo "Default Administrator not created: " . mysql_error() . "<br />";
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
if (mysql_query($sql,$con)){
echo "Travels table dropped <br />";
}
else {
echo "Travels table not dropped or did not exist: " . mysql_error() . "<br />";
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
if (mysql_query($sql,$con)){
echo "Travels table created <br />";
}
else {
echo "Travels table not created: " . mysql_error() . "<br />";
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
if (mysql_query($sql,$con)){
echo "fk_Travels_customers FK created <br />";
}
else {
echo "fk_Travels_customers FK not created: " . mysql_error() . "<br />";
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
if (mysql_query($sql,$con)){
echo "fk_Travels_administrators FK created <br />";
}
else {
echo "fk_Travels_administrators FK not created: " . mysql_error() . "<br />";
}
echo "<br /><br />";
echo "<h3>Database successfully created</h3>";
