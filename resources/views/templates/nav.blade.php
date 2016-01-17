<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="{{ url('/') }}">
	      <div class="navbar-brand navbar-brand-centered"><img class="large" src="{{ secure_asset('assets/img/nav/nav-top-60.png') }}"></div>
	      <div class="navbar-brand navbar-brand-centered"><img class="small" src="{{ secure_asset('assets/img/nav/mobile-nav.png') }}"></div>
      </a>
    </div>

    <div class="collapse navbar-collapse" id="navbar-brand-centered">
      <ul class="nav navbar-nav">
        <li><a href="{{ url('donate') }}">{{ trans('general.nav.donate') }}</a></li>
				<li><a href="{{ url('vote') }}">{{ trans('general.nav.vote') }}</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('about') }}">{{ trans('general.nav.about') }}</a></li>
				<li><a href="{{ url('credits') }}">{{ trans('general.nav.credits') }}</a></li>		        
      </ul>
    </div>
  </div>
</nav>
