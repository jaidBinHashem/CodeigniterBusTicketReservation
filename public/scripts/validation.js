function loadDist()
{
	var divid = $('#divisions').val();
	//alert(divid);
	
	$.ajax({
		url: 'http://localhost/ci226/ajax/getDistList',
		data: {did: divid},
		success: function(result){
			$('#districts').html(result);
		}
	});
}

function validateForm() {
	var coachId = document.getElementById("coachId").value;
	var fare = document.getElementById("fare").value;
	var totalSeat = document.getElementById("totalSeat").value;
	var dtime = document.getElementById("dtime").value;
	var atime = document.getElementById("atime").value;

	if(validateCoachId(coachId) && validateFare(fare) && validateTotalSeat(totalSeat) && validateDepature(dtime) && validateArrival(atime))
	{
		return true;
	}
	else
	{
		alert("Please Check The Inputs");
		return false;
	}
}


function validateCoachId(coachId)
{
	var re = new RegExp(/^.{3}-.{3}-\d{3}$/);
	return re.test(coachId);
}

function validateFare(fare)
{
	return !isNaN(fare);
}

function validateTotalSeat(totalSeat)
{
	return !isNaN(totalSeat);
}

function validateDepature(dtime)
{
	var time = new RegExp(/^\d\d:\d\d:\d\d$/);
	return time.test(dtime);
}

function validateArrival(atime)
{
	var time = new RegExp(/^\d\d:\d\d:\d\d$/);
	return time.test(atime);
}



function validateSearch()
{
	var from = document.getElementById("from").value;
	var to = document.getElementById("to").value;
	var date = document.getElementById("date").value;

	if(validateFrom(from) && validateTo(to) && validateDate(date))
	{
		return true;
	}
	else
	{
		alert("Please Check The Inputs");
		return false;		
	}
}

function validateDate(date)
{
	var re = new RegExp(/^\d\d\d\d-\d\d-\d\d$/);
	return re.test(date);
}


function validateFrom(from)
{
	if(from=="")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function validateTo(to)
{
	if(to=="")
	{
		return false;
	}
	else
	{
		return true;
	}
}


function validateAddRoute()
{
	var origin = document.getElementById("origin").value;
	var destination = document.getElementById("destination").value;

	if(validateOrigin(origin) && validateDestionation(destination))
	{
		return true;
	}
	else
	{
		alert("Please Check The Inputs");
		return false;		
	}
}

function validateOrigin(origin)
{
	if(origin=="")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function validateDestionation(destination)
{
	if(destination=="")
	{
		return false;
	}
	else
	{
		return true;
	}
}



function validateRegistration()
{
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var repassword = document.getElementById("repassword").value;
	var fullname = document.getElementById("fullname").value;
	var email = document.getElementById("email").value;
	var mobile = document.getElementById("mobile").value;
	
	if(validateUsername(username) && validatePassword(password) && validateRePassword(repassword,password) && validateFullName(fullname) && validateEmail(email) && validateMobile(mobile))
	{
		return true;
	}
	else
	{
		alert("Please Check The Inputs");
		return false;		
	}
}

function validateUsername(username)
{
	if(username==" ")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function validatePassword(password)
{
	if(password==" ")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function validateRePassword(repassword,password)
{
	if(repassword != password)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function validateFullName(fullname)
{
	if(fullname==" ")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function validateEmail(email)
{
	var re = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
	return re.test(email);
}

function validateMobile(mobile)
{
	var re = new RegExp(/^(?:\+88|01)?(?:\d{11}|\d{13})$/);
	return re.test(mobile);
}