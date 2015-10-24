function getMyEvents() {
    if (localStorage.getItem('myEvents')) {
        var myEvents = JSON.parse(localStorage.getItem('myEvents'));
        return myEvents;
    }
    else {
    	return null;
    }
}

function addMyEvent(eventCode, eventName) {
	var myEvents = getMyEvents();
	if (myEvents) {
		for (var i=0; i<myEvents.length; i++) {
			var item = myEvents[i];
			if (eventCode == item.code) {
				return;
			}
		}
	}
	else {
		myEvents = [];
	}
	var newEvent = { 'code': eventCode, 'name': eventName };
	myEvents.unshift(newEvent);
	localStorage.setItem('myEvents', JSON.stringify(myEvents));
}

var mySavedEvents = null;

$(function() {
    var myEvents = getMyEvents();
    if (myEvents) {
    	mySavedEvents = myEvents;
    	$('nav.navbar ul.navbar-right').append('<li><a class="page-scroll" href="/my_event/">我的活动</a></li>');
    }
});
