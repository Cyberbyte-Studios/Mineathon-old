<!DOCTYPE html>
<html lang="en">
  @include('templates.head')

  <body>
	@include('templates.nav')

	@yield('content')
	
	{{-- Footer Section --}}
	@include('templates.footer')
	
    {{-- Bootstrap core JavaScript --}}
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    {{-- New Donations Footer Event --}}
    <script>
        var sse = new EventSource('https://imraising.tv/api/v1/listen?apikey=JlTRn6Z2vArDq_-19cdvfg');
        var bootstrap_alert = function() {};

        Notification.requestPermission();

        sse.addEventListener('donation.add', function(e) {
            var data = JSON.parse(e.data);
            var notification = new Notification({{ trans('general.donation.new') }}, {
                body: message,
                icon: '{{ secure_asset('favicon.ico') }}'
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
    </script>

	@stack('scripts')
  </body>
</html>