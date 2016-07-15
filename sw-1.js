
this.onnotificationclick = function(e) {
	console.log('notification click event', e);
	e.notification.close();
};

this.onpush = function(e) {
	console.log('push event', e);

	notify();
};

function notify() {
	var tag = String(Math.random()).substr(2);
	registration.showNotification(tag, {tag: tag}).then(function() {
		// Sent
		console.log('Notification sent: ' + tag);
	});
	return tag;
}
