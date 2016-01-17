<div id="footer">
	<div class="container">
		<div class="row mt centered">
			<div class="col-lg-3">
				<h4>{{ trans('general.footer.colum1Name') }}</h4>
				<p>
					{!! trans('general.footer.colum1Text') !!}
				</p>
			</div>
			
			<div class="col-lg-3">
				<h4>{{ trans('general.footer.colum2Name') }}</h4>
				<p>
					{!! trans('general.footer.colum2Text') !!}
				</p>
			</div>
			
			<div class="col-lg-3">
				<a class="twitter-timeline" href="https://twitter.com/Mineathon_Event" data-widget-id="688808472662675457">Tweets by @Mineathon_Event</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>		
			</div>
			
			<div class="col-lg-3">
				<h4>Latest Donation</h4>
				<p>From: <strong id="lastDonNick"> Dave</strong></p>
				<p>Ammount: <strong id="lastDonAmmount"> £3</strong></p>
			</div>
			{{ Helper::debug() }}			
		</div>
	</div>
</div>