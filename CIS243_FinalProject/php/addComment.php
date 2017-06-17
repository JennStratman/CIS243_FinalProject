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
echo "addFeedback.php";
*/
// use the name of the submit button to check to see if this Feedback has been submitted
if(isset($_POST['feedbackSubmit']))
{
// form submitted, now we can look at the data that came through
// the value inside the brackets comes from the name attribute of the input field. (just like submit above)
// check to see if there was a name or email
if ($_POST['txtNameFeedback'] != '') {
$custNameFeedback = $_POST['txtNameFeedback'];
}
else {
$custNameFeedback = "no name";
}
if ($_POST['txtEmail'] != '') {
$custEmail = $_POST['txtEmail'];
}
else {
$custEmail = "no email";
}

$custSelectFind = $_POST['selectFind'];
$custCurrent = $_POST['currentCust'];
$custComments = $_POST['txtComments'];
$custFeedbackSID = session_id();
// Now you can do whatever with these variables.
}

// redirect the user back to the order page, they have gotten to this page somehow
else {
header('Location: '."../error.html");
}
// write customer feedback into database
// THIS ISN'T WORKING. TRIED THIS WITHOUT THE SELECT FIELD INFORMATION AND IT STILL DID NOT WORK
// ALSO  TRIED WITHOUT THE FEEDBACKTIME AND CUSTFEEDBACKSID AND IT DID NOT WORK...
//$sql = "INSERT INTO `feedback` (`FeedbackTime`,`custNameFeedback`, `custEmail`, `custCurrent`, `custSelectFind`, `custComments`, 'feedbackAddressed', 'custFeedbackSID') ";
//$sql = $sql . "VALUES (now(),`$custNameFeedback`, `$custEmail`, `$custCurrent`, `$custSelectFind`, `$custComments`, `N`, $custFeedbackSID);";

// THIS IS DIRECTLY FROM THE DATABASE (FROM AN ENTRY MADE IN THE DATABASE). WHEN I USE THIS CODE, A NEW ENTRY IS MADE IN THE DATABASE
//$sql = "INSERT INTO `feedback` (`FeedbackID`, `FeedbackTime`, `custNameFeedback`, `custEmail`, `custCurrent`, `custSelectFind`, `custComments`, `feedbackAddressed`, `adminsrators_adminID`, `custFeedbackSID`)";
//$sql = $sql . "VALUES ('2', '2017-06-11 14:59:00', 'Bob Dole', 'bd@example.com', 'Y', 'Bob Dole told me', 'this is a comment entered directly into the database', 'N', NULL, 'abcdefg')";

// LET'S TRY REMOVING SOME OF THE PARAMETERS AND SEEING IF IT STILL WORKS...START WITH THE FEEDBACKID SINCE THIS SHOULD BE AUTOMATICALLY ENTERED...
// THAT WORKED, NOW LET'S TRY USING A VARIABLE IN PLACE OF A DIRECT STRING. LET'S START WITH 'NOW()' FOR THE FEEDBACKTIME
// THAT WORKED, SO LET'S TRY USING SOME ENTERED DATA. LET'S START WITH THE CUSTOMER'S NAME
// THAT ALSO WORKED. LET'S REPLACE ALL THE STRINGS THAT WE CAN WITH THE VARIABLES AND SEE WHAT HAPPENS
$sql = "INSERT INTO `feedback` (`FeedbackTime`, `custNameFeedback`, `custEmail`, `custCurrent`, `custSelectFind`, `custComments`, `custFeedbackSID`)";
$sql = $sql . "VALUES (now(), '$custNameFeedback', '$custEmail', '$custCurrent', '$custSelectFind', '$custComments', '$custFeedbackSID')";

// run SQL statement and verify that it worked, display error
if ($mysqli->query($sql) === TRUE) {
// reset variables so that name will not be added a second time to the database for this feedback
// form submitted, now we can look at the data that came through
// the value inside the brackets comes from the name attribute of the input field. (just like submit above)
$custNameFeedback = "";
$custEmail = "";
$custCurrent = "";
$custSelectFind = "";
$custComments = "";

// if everything has been added correctly, then we redirect the customer to the Thank you page.
header('Location: '."../thanks.html");

// Now you can do whatever with this variable.
// $custSID does not need to be reset because it is same within the browser session
}
// redirect the user to the order page, they have gotten to this page somehow without completing the customer form.
//else {
//header('Location: '."../order.html");
//}
// Check if there was an error posting to the database...
else {
// used for testing purposes
//printf("Connect failed: customer name is %s\n customer email is %s\n customer current value is %s\n customer found us... %s\n Are they a current customer? %s\n and their comments are... %s\n", $custNameFeedback, $custEmail, $custCurrent, $custSelectFind, $custCurrent, $custComments);
	
  header('Location: '."../index.html");
}

//if ($mysqli->query($sql) === TRUE) {
// if everything has been added correctly, then we redirect the customer to the Thank you page.
//header('Location: '."../thanks.html");
//}

mysqli_close($mysqli);
?>
