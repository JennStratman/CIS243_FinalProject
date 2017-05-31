/*
testing area for javascript functions
*/

/* Responsive navigation bar */

function navFunction() {
    var x = document.getElementById("navLink");
    if (x.className === "linkhead") {
        x.className += " responsive";
    } else {
        x.className = "linkhead";
    }
}

/* Accordion Menu */
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  }
}

var OptionPrice = [
    100.00,
    200.00,
    30.00,
    105.00,
    29.00,
    45.00,
	  50.00,
	  45.00,
    89.00,
    50.00,
    25.00,
    60.00
];

var fltBase = 500.00;
var fltTaxRate = 0.095;

/*
function orderSummary()
purpose:		recalculate the current order information
parameters:		none
*/
function orderSummary(){

	var fltSub = fltBase;
	var intSize = 1;
	var intDuration = 0;
	var fltTax = 0;
	var fltTotal = 0;
	var intOptionCount = 0;
	var strTravel = "Order Summary:<br />";
	var strUnformatTravelDesc = "";
	var strSummary = "";
	var strPriceSum = "";
	var intWhichSpec = 0;

	// check to see which Duration is selected
	for (var i = 0; i < document.forms[0].rdoDuration.length; i++){
		if (document.forms[0].rdoDuration[i].checked){
			intSize = i;
		}
	}

	// set the DHTML display to include the vacation duration
	switch(intSize){
		case 0:
		  strTravel = strTravel + '<br />3 days / 2 nights stay in ';
		  strUnformatTravelDesc = strUnformatTravelDesc + '3 days / 2 nights stay in ';
		  fltSub = 499.95;
		  break;
		case 1:
		  strTravel = strTravel + '<br />6 days / 5 nights in ';
		  strUnformatTravelDesc = strUnformatTravelDesc + '6 days / 5 nights in ';
		  fltSub = 899.95;
		  break;
		case 2:
		  strTravel = strTravel + '<br />9 days / 5 nights in ';
		  strUnformatTravelDesc = strUnformatTravelDesc + '9 days / 5 nights in ';
		  fltSub = 1299.95;
		  break;
	}

	// check to see which location is chosen
	for (var i = 0; i < document.forms[0].rdoDestination.length; i++){
		if (document.forms[0].rdoDestination[i].checked){
			intDestination = i;
		}
	}

	// set the DHTML display to include the Destination
	switch(intDestination){
		case 0:
		  strTravel = strTravel + "Baja California, Mexico";
		  strUnformatTravelDesc = strUnformatTravelDesc + 'Baja California, Mexico ';
		  break;
		case 1:
		  strTravel = strTravel + "Maui, HI";
		  strUnformatTravelDesc = strUnformatTravelDesc + 'Maui, HI ';
		  fltSub += 500.00;
		  break;
    case 2:
      strTravel = strTravel + "Orlando, FL";
      strUnformatTravelDesc = strUnformatTravelDesc + 'Orlando, FL ';
      fltSub += 700.00;
      break;
	}

	// check to see if they have clicked build your own and build the DHTML display
	if (document.forms[0].rdoType[0].checked){
		strTravel = strTravel + "<br />Build your own with: <br /> ";
		strUnformatTravelDesc = strUnformatTravelDesc + 'Build your own with: ';
	}
	else{

		for (var i = 1; i < document.forms[0].rdoType.length; i++){
			if (document.forms[0].rdoType[i].checked){
				intWhichSpec = i;
			}
		}
		switch(intWhichSpec){
			case 1:
				strTravel = strTravel + "<br />Water Lover Package, which includes: <br />&nbsp;&nbsp;&nbsp;&nbsp;Deep Sea Fishing<br />&nbsp;&nbsp;&nbsp;&nbsp;Snorkeling<br />&nbsp;&nbsp;&nbsp;&nbsp;Surfing<br />&nbsp;&nbsp;&nbsp;&nbsp;Beach Party";
				fltSub += OptionPrice[3]+ OptionPrice[7] + OptionPrice[8] + OptionPrice[10];
				strUnformatTravelDesc = strUnformatTravelDesc + 'Water Lover Package, which includes: Deep Sea Fishing, Snorkeling, Surfing, Beach Party ';
				break;
			case 2:
				strTravel = strTravel + "<br />On the Move Package, which includes: <br />&nbsp;&nbsp;&nbsp;&nbsp;Dune Buggy<br />&nbsp;&nbsp;&nbsp;&nbsp;Horseback Riding<br />&nbsp;&nbsp;&nbsp;&nbsp;Bike Tour<br />&nbsp;&nbsp;&nbsp;&nbsp;Deep Sea Fishing";
				fltSub += (OptionPrice[4]+ OptionPrice[5] + OptionPrice[9] + OptionPrice[3]);
				strUnformatTravelDesc = strUnformatTravelDesc + 'On the Move, which includes: Dune Buggy, Horseback Riding, Bike Tour, Deep Sea Fishing ';
				break;
			case 3:
				strTravel = strTravel + "<br />Pamper Me Package, which includes: <br />&nbsp;&nbsp;&nbsp;&nbsp;Golf<br />&nbsp;&nbsp;&nbsp;&nbsp;Spa<br />&nbsp;&nbsp;&nbsp;&nbsp;Winery Tour<br />&nbsp;&nbsp;&nbsp;&nbsp;Beach Party";
				fltSub +=  (OptionPrice[0]+ OptionPrice[1] + OptionPrice[2] + OptionPrice[10]);
				strUnformatTravelDesc = strUnformatTravelDesc + 'Pamper Me Package, which includes: Golf, Spa, Winery Tour, Beach Party ';
				break;
      case 4:
        strTravel = strTravel + "<br />Adventurer Package, which includes: <br />&nbsp;&nbsp;&nbsp;&nbsp;Snorkeling<br />&nbsp;&nbsp;&nbsp;&nbsp;Rock Climbing<br />&nbsp;&nbsp;&nbsp;&nbsp;Guided Hike<br />&nbsp;&nbsp;&nbsp;&nbsp;Surfing<br />&nbsp;&nbsp;&nbsp;&nbsp;Bike Tour";
        fltSub +=  (OptionPrice[8] + OptionPrice[11] + OptionPrice[6] + OptionPrice[7] + OptionPrice[9]);
        strUnformatTravelDesc = strUnformatTravelDesc + 'Adventurer Package, which includes: Snorkeling, Rock Climbing, Guided Hike, Surfing, Bike Tour ';
		}
	}

	// check the options that have been requested
	for (var i = 0; i < document.forms[0].chkOption.length; i++){
		if (document.forms[0].chkOption[i].checked){
			fltSub += OptionPrice[i];
			strTravel = strTravel + " &nbsp;&nbsp;&nbsp;&nbsp;" + document.forms[0].chkOption[i].value + "<br />";
			strUnformatTravelDesc = strUnformatTravelDesc + ' ' + document.forms[0].chkOption[i].value;
		}
	}
/* ----------------------------------------------------------------------------
Add information for number of guests. This code is in progress, as I have
not yet figured out how the select options work (as far as pulling the
information)
------------------------------------------------------------------------------*/
  // check the number of people selected
  function numPeople(form) {
/*  for (var i = 1; i < document.forms[0].partySize.length; i++){ */
/*    if (document.forms[0].partySize[i].checked){
      intWhichSpec = i;
*/
/*if(document.forms[0].this.options[this.selectedIndex].val == i) {
    intWhichSpec = i;
*/
var len = form.partySize.length;
for(var i = 0; i < len; i++) {
  if(form.partySize.options[i].selected) {
    var myValue = form.partySize.options[i].value;
  }
  // Use myValue inside the loop, if needed
}
// Use myValue outside the loop, if needed
alert("The value of the select tag is " + myValue);
/*
  switch(selectedValue){
    case 1:
    strTravel = strTravel + "<br />For one guest <br />";
    fltSub = fltSub;
    strUnformatTravelDesc = strUnformatTravelDesc + ' ' + 'For one guest';
    break;

    case 2:
    strTravel = strTravel + "<br />For two guests <br />";
    fltSub = fltSub * 2;
    strUnformatTravelDesc = strUnformatTravelDesc + ' ' + 'For two guests';
    break;

    case 3:
    strTravel = strTravel + "<br />For three guests <br />";
    fltSub = fltSub * 3;
    strUnformatTravelDesc = strUnformatTravelDesc + ' ' + 'For three guests';
    break;

    case 4:
    strTravel = strTravel + "<br />For four guests <br />";
    fltSub = fltSub * 4;
    strUnformatTravelDesc = strUnformatTravelDesc + ' ' + 'For four guests';
    break;

  }
  */
}

/* ----------------------------------------------------------------------------
This calculates the totals for the order and sets the appropriate cookies
------------------------------------------------------------------------------*/
	fltSub = fltSub.toFixed(2);

	fltTax = fltSub * fltTaxRate;

	fltTax = fltTax.toFixed(2);
	fltTotal = parseFloat(fltSub) + parseFloat(fltTax);

	fltTotal = parseFloat(fltTotal);
	fltTotal = fltTotal.toFixed(2);
	SetCookie("strTravel", strTravel);
	SetCookie("strUnformatTravel", strUnformatTravelDesc);
	SetCookie("fltSub", fltSub);
	SetCookie("fltTax", fltTax);
	SetCookie("fltTotal", fltTotal);

	strSummary = strTravel;

	strPriceSum = "<table> <tr><td>Subtotal:</td> <td align='right'>$" + fltSub + "</td></tr><tr><td>" + "Tax:</td> <td align='right' style='border-bottom-color: White; border-bottom-width: 1px; border-bottom-style: solid;'>" + fltTax + "</td></tr><tr> <td>Total:</td> <td align='right'>$" + fltTotal + "</td></tr></table>"

	document.getElementById("orderSum").innerHTML = strSummary;
	document.getElementById("priceSum").innerHTML = strPriceSum;

	return true;

}

/*
function changeOption()
purpose:		Make the options visible to user
parameters:		none
*/

function changeOption(){
	document.getElementById("options").style.display = "flex";

	// uncheck and enable
	for (var i = 0; i < document.forms[0].chkOption.length; i++){
		document.forms[0].chkOption[i].checked = false;
		document.forms[0].chkOption[i].disabled = false;
	}

	orderSummary();


}

/*
function hideOption()
purpose:		Make the options invisible to user
parameters:		none
*/
function hideOption(){
	document.getElementById("options").style.display = "none";

	// uncheck and disable
	for (var i = 0; i < document.forms[0].chkOption.length; i++){
		document.forms[0].chkOption[i].checked = false;
		document.forms[0].chkOption[i].disabled = true;
	}

	orderSummary();
}

/*
function ckform(formIndex)
purpose:		verify that required fields are completed
date:			2/19/11
parameters:		formIndex as an integer, representing the form number within the page

*/

function ckform(formIndex){

	// identifed txtFName as the field 15 of the form
	var intStartCheck = 15;
	var intNumFields = document.forms[formIndex].elements.length;
	var strCustomer = "";

	for (var i = intStartCheck; i < intNumFields; i++){
		if (document.forms[formIndex].elements[i].name != "txtApartment"){
			if (document.forms[formIndex].elements[i].value == ""){
				document.getElementById(document.forms[formIndex].elements[i].name).innerHTML = "<span style='color:yellow'>Required Field</span>";
				document.forms[formIndex].elements[i].focus();
				return false;
			}
			strCustomer += document.forms[formIndex].elements[i].value + " ";
			if (document.forms[formIndex].elements[i].name != "txtFName"){
				strCustomer += "<br />";
			}
		}
	}

	orderSummary();
	// remove the value of the submit button from the string
	strCustomer = strCustomer.slice(0, (strCustomer.length - 23));

	SetCookie("Customer", strCustomer);


	SetCookie("custFName", document.forms[0].txtFName.value);
	SetCookie("custLName", document.forms[0].txtLName.value);
	SetCookie("custAddress", document.forms[0].txtAddress.value);
	if (document.forms[0].txtApartment.value != ""){
		SetCookie("custApartment", document.forms[0].txtApartment.value);
	}
	SetCookie("custCity", document.getElementById("txtCity").value);
	SetCookie("custState", document.getElementById("txtState").value);
	SetCookie("custZip", document.getElementById("txtZip").value);
	SetCookie("custPhone", document.forms[0].txtPhone.value);


	return true;
}

function clearThis(){

	var formIndex = 0;
	var intStartCheck = 0;
	var intNumFields = document.forms[formIndex].elements.length - 1;

	for (var i = intStartCheck; i < intNumFields; i++){
		if (document.forms[formIndex].elements[i].name != "txtApartment"){
			document.getElementById(document.forms[formIndex].elements[i].name).innerHTML = "";
		}
	}

	return true;
}

/* ----------------------------------------------
function replaceString(stringValue)
purpose:		replaces special HTML characters in cookie values
parameters:		stringValue as string, the value to be encoded
notes:			can be used for more than cookies
---------------------------------------------- */
function replaceString(stringValue){

	newString = stringValue;

	/*newString = newString.replace('"','&quot;');
	newString = newString.replace("'", '&apos;');
	newString = newString.replace("�", '&ndash;');
	newString = newString.replace("�", '&mdash;');
	newString = newString.replace("�", '&iexcl;');
	newString = newString.replace("�", '&iquest;');
	newString = newString.replace("�", '&ldquo;');
	newString = newString.replace("�", '&rdquo;');
	newString = newString.replace("�", '&lsquo;');
	newString = newString.replace("�", '&rsquo;');
	newString = newString.replace("�", '&laquo;');
	newString = newString.replace("�", '&raquo;');
	newString = newString.replace(" ", '&nbsp;');
	newString = newString.replace("&", '&amp;');
	newString = newString.replace("�", '&cent;');
	newString = newString.replace("�", '&copy;');
	newString = newString.replace("�", '&divide;');
	newString = newString.replace(">", '&gt;');
	newString = newString.replace("<", '&lt;');
	newString = newString.replace("<", '&lt;');*/

	return newString;
}

/* ----------------------------------------------
function writeTravelCookies(){
purpose:	writes the Travel information cookies
author:
date:			11/14/2013
parameters:		none
---------------------------------------------- */
function writeTravelCookies(){

	SetCookie("TravelDesc", document.getElementById("orderSum").innerHTML);
	SetCookie("PriceSum", document.getElementById("priceSum").innerHTML);
	window.location.href = "custInfo.html";

	return true;
}

/* ----------------------------------------------
function chForm(){
purpose:	checks the customer information form for complete and correct information
author:
date:			11/15/2013
parameters:		none
---------------------------------------------- */
function chForm(){
	var intNumFields = document.forms[0].elements.length;
	var phoneExp = /\d\d\d-\d\d\d-\d\d\d\d/;
	var zipExp = /\d{5}/;
	var emailExp = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

	// check that values have been entered into required fields
	for (var i = 0; i < intNumFields; i++){
		if (document.forms[0].elements[i].name != "txtApartment"){
			if (document.forms[0].elements[i].value.length == 0){
				document.getElementById(document.forms[0].elements[i].name).innerHTML = "Required Field";
				document.forms[0].elements[i].focus();
				document.forms[0].elements[i].select();
				return false;
			}
		}
	}

	// check that phone number has been correctly formatted
	if (!phoneExp.test(document.forms[0].txtPhone.value)){
		document.getElementById("txtPhone").innerHTML = "Please enter a valid phone number";
		document.forms[0].txtPhone.focus();
		document.forms[0].txtPhone.select();
		return false;
	}

	// check that zip code is a 5 digit number
	if (!zipExp.test(document.forms[0].txtZip.value)){
		document.getElementById("txtZip").innerHTML = "Please enter a 5 digit zip code";
		document.forms[0].txtZip.focus();
		document.forms[0].txtZip.select();
		return false;
	}

	if (!emailExp.test(document.forms[0].txtEmail.value)){
		document.getElementById("txtEmail").innerHTML = "Please enter a valid email address";
		document.forms[0].txtEmail.focus();
		document.forms[0].txtEmail.select();
		return false
	}

	// customer order information is correct write cookie for customer information
	writeCustCookie();

	return true;
	//return false;
}

/* ----------------------------------------------
function writeCustCookie(){
purpose:	Writes the customer informstion cookies
author:
date:			11/15/2013
parameters:		none
---------------------------------------------- */
function writeCustCookie(){
	var strCustName = document.forms[0].txtFName.value + " " + document.forms[0].txtLName.value;

	SetCookie("custName", document.forms[0].txtFName.value + " " + document.forms[0].txtLName.value);
	SetCookie("custAddress", document.forms[0].txtAddress.value + " " + document.forms[0].txtApartment.value);
	SetCookie("custCity", document.forms[0].txtCity.value + ", " + document.forms[0].txtState.value + " " + document.forms[0].txtZip.value);
	SetCookie("custEmail", document.forms[0].txtEmail.value);
	SetCookie("custPhone", document.forms[0].txtPhone.value);
	return true;
}


var milisec=0;
var seconds=60;
var minutes=29;

/* ----------------------------------------------
function secondPassed(){
purpose:	Count down clock for delivery
author:
date:			11/15/2013
parameters:		none
---------------------------------------------- */
/* Not needed. Countdown will be 15 minutes */
  /*
// 1800 seconds in 30 minutes
var seconds = 30*24*3600;
// seconds set at 20 for testing
//var seconds = 20;


function secondPassed() {
// Calculate the number of days left
 var days=Math.floor(seconds / 86400);
// After deducting the days calculate the number of hours left
    var hours = Math.floor((seconds - (days * 86400 ))/3600)
// After days and hours , how many minutes are left
    var minutes = Math.floor((seconds - (days * 86400 ) - (hours *3600 ))/60)
// Finally how many seconds left after removing days, hours and minutes.
   var secs = Math.floor((seconds - (days * 86400 ) - (hours *3600 ) - (minutes*60)))

   var x = days + " Days " + hours + " Hours " + minutes + " Minutes and " + secs + " Seconds ";
   document.getElementById('countdown').innerHTML = x;
   */
/* New formula to calculate minutes and seconds for a total of 15 minute countdown */
// 900 seconds in 15 minutes
  var seconds = 15*60;
  // seconds set at 20 for testing
  //var seconds = 20;
  function secondPassed() {
// Calculate the number of minutes left
  var minutes = Math.floor(seconds / 60);
// Calcuate the number of seconds left after removing minutes
  var secs = Math.floor((seconds - (minutes*60)));

  var x = minutes + " Minutes " + secs + " Seconds ";
  document.getElementById('countdown').innerHTML = x;

	// create an alternate display if confirmation package has not arrived
	if (seconds == 0) {
   	clearInterval(countdownTimer);
      document.getElementById('countdown').innerHTML = "Please call us, your confirmation package should have arrived!";
   }
	else {
   	seconds--;
   }

	return true;

}

var countdownTimer = setInterval('secondPassed()', 1000);
