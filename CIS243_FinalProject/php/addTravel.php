<?php
session_start();
// connect to the database
// For PC
$mysqli = new mysqli("localhost", "root", "", "TravelStoreDeluxe");
// For Mac
//$mysqli = new mysqli("localhost", "root", "root", "TravelStoreDeluxe");

/* check connection */
if ($mysqli->connect_errno) {
printf("Connect failed: %s\n", $mysqli->connect_error);
exit();
}
/*
echo "addTravel.php";
*/
// use the name of the submit button to check to see if this Travel has been ordered
if(isset($_POST['cmdSubmit']))
{
// form submitted, now we can look at the data that came through
// the value inside the brackets comes from the name attribute of the input field. (just like submit above)
$custFName = $_POST['txtFName'];
$custLName = $_POST['txtLName'];
$custEmail = $_POST['txtEmail'];
$custAdd1 = $_POST['txtAddress'];
// check to see if there was an apartment or second address line
if ($_POST['txtApartment'] != '') {
$custAdd2 = $_POST['txtApartment'];
}
else {
$custAdd2 = "no apt";
}
$custCity = $_POST['txtCity'];
$custState = $_POST['txtState'];
$custZip = $_POST['txtZip'];
$custPhone = $_POST['txtPhone'];
$custSID = session_id();
// Now you can do whatever with these variables.
}
// redirect the user back to the order page, they have gotten to this page somehow
else {
    printf("Connection failed");
//header('Location: '."../order.html");
}
// write customer information into database
$sql = "INSERT INTO `customers` (`custFName`, `custlName`, `custEmail`, `custAdd1`, `custAdd2`, `custCity`, `custState`, `custZip`, `custPhone`, `custSID`) ";
$sql = $sql . "VALUES ('$custFName', '$custLName', '$custEmail', '$custAdd1', '$custAdd2', '$custCity', '$custState', '$custZip', '$custPhone', '$custSID');";
// run SQL statement and verify that it worked, display error
if ($mysqli->query($sql) === TRUE) {
// reset variables so that name will not be added a second time to the database for this order
// form submitted, now we can look at the data that came through
// the value inside the brackets comes from the name attribute of the input field. (just like submit above)
$custFName = "";
$custLName = "";
$custEmail = "";
$custAdd1 = "";
$custAdd2 = "";
$custCity = "";
$custState = "";
$custZip = "";
$custPhone = "";
// Now you can do whatever with this variable.
// $custSID does not need to be reset because it is same within the browser session
}
// redirect the user to the order page, they have gotten to this page somehow without completing the customer form.
else {
    printf("Connect failed: customer first name is %s\n customer last name is %s\n\n email is %s\n customer address is %s\n\n customer Apartment is %s\n\n and their city... %s\n", $custFName, $custLName, $custEmail, $custAdd1, $custAdd2, $custCity);
//header('Location: '."../order.html");
}
// get the new customer ID from the database
$sql = "SELECT custID FROM customers WHERE custSID = '$custSID';";
// get the new custID from the database
$result = mysqli_query($mysqli, $sql);
// go through the results of the query to save new custID to write Travel information
if ($result) {
while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
$newCustId = $row['custID'];
}
}
else {

header('Location: '."../order.html");
}
// write Travel infromation through retrieved cookies, originally set in JavaScript
$strTravel = $_COOKIE['strUnformatTravel'];
$fltSub = $_COOKIE['fltSub'];
$fltTax = $_COOKIE['fltTax'];
$fltTotal = $_COOKIE['fltTotal'];
// create SQL statement to insert info into Travels table
$sql = "INSERT INTO Travels (TravelOrderTime, strTravel, fltSub, fltTax, fltTotal, customers_custID, phpSessionID, orderComplete) ";
$sql = $sql . "VALUES (now(),'$strTravel', $fltSub, $fltTax, $fltTotal, $newCustId, '$custSID', 'N');";
// run SQL statement to insert the Travel into the database and check to see if it was added correctly.
if ($mysqli->query($sql) === TRUE) {
// if everything has been added correctly, then we redirect the customer to the summary page.
header('Location: '."../summary.html");
}
else {
printf("Connect failed: customer first name is %s\n customer last name is %s\n\n email is %s\n customer address is %s\n\n customer Apartment is %s\n\n Are they a current customer? %s\n and their city... %s\n", $custFName, $custLName, $custEmail, $custAdd1, $custAdd2, $custCity);
//header('Location: '."../order.html");
}
mysqli_close($mysqli);
?>
