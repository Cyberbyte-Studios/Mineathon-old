window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');

$(function() {
    var sse = new EventSource('https://imraising.tv/api/v1/listen?apikey=bfncDsxXbt8WB0wiRvwXVw');
    Notification.requestPermission();
    var firstDonation = false;
    var totalDonation = false;
    
    setTimeout(function() {
        if (!firstDonation && !totalDonation) {
            console.warn("No donations found");
            $('#loadingDonation').fadeOut(1000,function(){$('#errorDonation').fadeIn(1000);});
        }
    }, 5000);
    
    $.getJSON("https://imraising.tv/api/v1/donations?apikey=bfncDsxXbt8WB0wiRvwXVw&limit=1", function(data) {
        try {
            console.log('Got latest donation', data[0]);
            $('#name').text(data[0].nickname);
            $('#amount').html(data[0].amount.display.total);
            $('#message').html(data[0].message);
            $('#loadingDonation').fadeOut(1000,function(){$('#donation').fadeIn(1000);});
            firstDonation = true;
        } catch (e) {
            console.warn('Error geting donation', e);
        }
    });
    
    $.getJSON("https://imraising.tv/api/v1/donations/total?apikey=bfncDsxXbt8WB0wiRvwXVw", function(data) {
        try {
            console.log('Got total donations', data[0]);
            $('#totalDonations').text(data[0].total);
            $('#loadingDonation').fadeOut(1000,function(){$('#allDonations').fadeIn(1000);});
            totalDonation = true;
        } catch (e) {
            console.warn('Error geting total donations', e);
        }
    });
    
    sse.addEventListener('donation.add', function(e) {
        var data = JSON.parse(e.data);
        console.log(data);
        
        $('#name').text(data.nickname);
        $('#amount').html(data.amount.display.total);
        $('#message').html(data.message);
        console.log(data.amount.display.total);
        var currentTotal =  + Math.round($('#totalDonations').text() * 100) / 100 + data.amount.display.total;
        currentTotal = Math.round(currentTotal * 100) / 100;
        $('#totalDonations').text(currentTotal);
        
        var notification = new Notification('New £'+data.amount.display.total+' Donation', {
            body: 'New donation from '+data.nickname+'! We now have: £'+currentTotal,
            icon: 'favicon.ico'
        });
    });
});