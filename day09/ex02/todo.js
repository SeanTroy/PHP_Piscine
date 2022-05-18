if (document.cookie && document.cookie != '') {
	var cookieArray = document.cookie.split(';');
	for (var i = 0; i < cookieArray.length; i++) {
		var task_values = cookieArray[i].split("=");

		var family = document.getElementById("ft_list");
		var firstBorn = family.firstChild;

		var newKid = document.createElement("div");
		newKid.setAttribute("id", task_values[0].trim());
		newKid.setAttribute("onclick", "remove('" + task_values[0].trim() + "')");
		var missionInLife = document.createTextNode(decodeURIComponent(task_values[1]));
		newKid.appendChild(missionInLife);

		family.insertBefore(newKid, firstBorn);
	}
}

function add() {
	var promptContent = prompt("Please enter a new task");
	if (promptContent && promptContent.trim() != "") {
		var task = promptContent.trim();
		var family = document.getElementById("ft_list");
		var firstBorn = family.firstChild;

		var newKid = document.createElement("div");
		var birthDate = new Date().getTime();
		newKid.setAttribute("id", "task" + birthDate);
		newKid.setAttribute("onclick", "remove('task" + birthDate + "')");
		var missionInLife = document.createTextNode(task);
		newKid.appendChild(missionInLife);

		setCookie("task" + birthDate, task, birthDate, 365);

		family.insertBefore(newKid, firstBorn);
	}
}

function remove(id) {
	if (confirm("Please confirm the deletion of the task:")) {
		var family = document.getElementById("ft_list");
		var failedKid = document.getElementById(id);
		family.removeChild(failedKid);
		eraseCookie(id);
	}
}

function setCookie(name, value, creationTime, days) {
	const day = new Date();
	day.setTime(creationTime + (days * 24 * 60 * 60 * 1000));
	var expires = "Expires=" + day.toUTCString();
	document.cookie = name + "=" + encodeURIComponent(value) + ";" + expires + ";Path=/;";
}

function eraseCookie(name) {
	document.cookie = name + "=; Expires=Thu, 01 Jan 1970 00:00:01 GMT; Path=/;";
}
