var clock =  document.getElementById('clock');
var color = document.getElementById('color');

function hexoclock(){
	var time = new Date();
	var h = (time.getHours()).toString();
	var m = time.getMinutes().toString();
	var s = time.getSeconds().toString();

	if (h < 10) {
		h = '0' + h;
	}

	if (m < 10) {
		m = '0' + m;
	}

	if (s < 10) {
		s = '0' + s;
	}

	var clockString = h + ':' + m + ":" + s;
	var colorString = "#" + h + m + s;

	clock.textContent = clockString;
	color.textContent = colorString;

	document.body.style.background  = colorString;
}

hexoclock();
setInterval(hexoclock, 4);