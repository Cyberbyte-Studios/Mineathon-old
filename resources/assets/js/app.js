window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');

var sse = new EventSource('https://imraising.tv/api/v1/listen?apikey=JlTRn6Z2vArDq_-19cdvfg');
var bootstrap_alert = function() {};
Notification.requestPermission();

sse.addEventListener('donation.add', function(e) {
    var data = JSON.parse(e.data);
    var notification = new Notification('New donations', {
        body: message,
        icon: 'favicon.ico'
    });
    notification.onclick = function(event) {
        event.preventDefault();
        window.open('http://www.mozilla.org', '_blank');
    };
    bootstrap_alert.warning = function(title, ammount, msg) {
    	$('#lastDonNick').html(title);
    	$('#lastDonAmmount').html('£'+ammount);
    	$('#lastDonMessage').html(msg);
    }
    var donation = data.amount.display.total;
    var msg = data.message;
    bootstrap_alert.warning(data.nickname,donation,msg);                 
});