window.onload = function() {

	highestCookieValue = 0;

	function addTask(text) {
		console.log("adding task to DOM: " + text);

		highestCookieValue++;
		itemId = "todo" + highestCookieValue;
		setCookie(itemId, text, 10000);

		var newItem = document.createElement("LI");
		newItem.id = itemId;
		newItem.appendChild(document.createTextNode(text));

		newItem.addEventListener("click", function(eventObject) {
			var areTheySure = confirm("Are you sure you want to delete this task?");
			if (areTheySure) {
				eventObject.target.remove();
				delCookie(eventObject.target.id);
			}
		});

		var list = document.getElementById("ft_list");
		list.insertBefore(newItem, list.childNodes[0]);
	}

	var newButton = document.getElementById("add_item");
	newButton.addEventListener("click", function() {
		console.log("they clicked the button");
		var newTaskText = prompt("Enter the task name", "");
		if (newTaskText) {
			addTask(newTaskText);
		} else {
			console.log("canceled");
		}
	});

function setCookie(cname,cvalue,exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires=" + d.toGMTString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function delCookie( name ) {
	document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;' + ';path=/';
  }

  
  function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i < ca.length; i++) {
	  var c = ca[i];
	  while (c.charAt(0) == ' ') {
		c = c.substring(1);
	  }
	  if (c.indexOf(name) == 0) {
		return c.substring(name.length, c.length);
	  }
	}
	return "";
  }
  
  function checkCookie() {
	var user=getCookie("username");
	if (user != "") {
	  alert("Welcome again " + user);
	} else {
	   user = prompt("Please enter your name:","");
	   if (user != "" && user != null) {
		 setCookie("username", user, 30);
	   }
	}
}
function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT" + ";path=/";
    }
}
	//deleteAllCookies();
	var cookieList = document.cookie.split(';');	
	console.log(cookieList);
		for(var i = 0; i < cookieList.length; i++) {
			var cookie = cookieList[i];
			while (cookie.charAt(0)==' ') {
				cookie = cookie.substring(1);
			}
			if (cookie.indexOf("todo") === 0) {
				var brokenCookie = cookie.split('=');
				var indexOfCookie = brokenCookie[0];
				var valueofCookie = brokenCookie[1];
				setCookie(indexOfCookie, "", -1);
				addTask(valueofCookie);
			}
		}
}