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
				<h4>{{ trans('general.footer.colum3Name') }}</h4>
				<p>
					{!! trans('general.footer.colum3Text') !!}
				</p>
			</div>
			
			<div class="col-lg-3">
				<h4>Latest Donation</h4>
				<p>From: <strong id="lastDonNick"></strong></p>
				<p>Ammount: <strong id="lastDonAmmount"></strong></p>
				<p>Message: <strong id="lastDonMessage"></strong></p>					
			</div>
		</div>
		@if (Auth::check())
		@if (Auth::user()->level)
		Page Time: {{ (microtime(true) - LARAVEL_START) }}
		<?php $load = sys_getloadavg() ?>
		Load: {{ $load[0].' '.$load[1].' '.$load[2] }}
		Server: {{ $_SERVER['SERVER_ADDR']}}
		@endif
		@endif
	</div>
</div>