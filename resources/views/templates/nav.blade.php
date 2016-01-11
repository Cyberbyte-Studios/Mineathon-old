<nav class="navbar navbar-default navbar-fixed-top hidden-xs hidden-sm hidden-md" role="navigation">
	<a class="navbar-brand hidden-xs" href="/"><img src="{{ secure_asset('assets/img/nav/nav-top-60.png') }}"></a>
	<div class="collapse navbar-collapse" id="navbar-collapse-1">
	  <ul class="nav navbar-nav navbar-left move-left-desktop">
		<li><a href="{{ url('donate') }}">{{ trans('general.nav.donate') }}</a></li>
		<li><a href="{{ url('vote') }}">{{ trans('general.nav.vote') }}</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right move-right-desktop">
		<li><a href="{{ url('about') }}">{{ trans('general.nav.about') }}</a></li>
		<li><a href="{{ url('credits') }}">{{ trans('general.nav.credits') }}</a></li>			
	  </ul>
	</div>
</nav>
<nav class="navbar navbar-default navbar-fixed-top hidden-xs hidden-lg" role="navigation">
	<a class="navbar-brand hidden-xs" href="/"><img src="{{ secure_asset('assets/img/nav/nav-top-60.png') }}"></a>	
	<div class="collapse navbar-collapse" id="navbar-collapse-1">
	  <ul class="nav navbar-nav navbar-left move-left-tablet">
		<li><a href="{{ url('donate') }}">{{ trans('general.nav.donate') }}</a></li>
		<li><a href="{{ url('vote') }}">{{ trans('general.nav.vote') }}</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right move-right-tablet">
		<li><a href="{{ url('about') }}">{{ trans('general.nav.about') }}</a></li>
		<li><a href="{{ url('credits') }}">{{ trans('general.nav.credits') }}</a></li>
	  </ul>
	</div>
</nav>
<nav class="navbar-mob navbar-default navbar-fixed-top hidden-lg hidden-sm hidden-md" role="navigation">
	<div class="navbar-header">
	    <a class="navbar-brand-mobile hidden-lg hidden-sm hidden-md" href="/"><img src="{{ secure_asset('assets/img/nav/mobile-nav.png') }}"></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
	</div>

	<div class="collapse navbar-collapse" id="navbar-collapse-2">
	  <ul class="nav navbar-nav">
		<li><a href="{{ url('') }}">Home</a></li>
		<li><a href="{{ url('vote') }}">Vote</a></li>
		<li><a href="{{ url('donate') }}">Donate</a></li>
		<li><a href="{{ url('about') }}">About</a></li>
	  </ul>
	</div>
</nav>