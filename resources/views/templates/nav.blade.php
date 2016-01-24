<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Organization",
  "name" : "Mineathon",
  "url" : "https://mineathon.com",
  "sameAs" : [
    "https://twitter.com/mineathon_event",
    "https://www.facebook.com/MineAthon",
    "https://plus.google.com/+MineathonEvent"
 ]
}
</script>

<nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="{{ url('/') }}">
      <div class="navbar-brand navbar-brand-centered nav-large"><img class="large" src="{{ secure_asset('assets/img/nav/nav-top-60.png') }}" alt="Mineathon Logo"></div>
      <div class="navbar-brand navbar-brand-centered"><img class="small" src="{{ secure_asset('assets/img/nav/mobile-nav.png') }}" alt="Mineathon Small Logo"></div>
    </a>
  </div>

  <div class="collapse navbar-collapse" id="navbar-brand-centered">
    <ul class="nav navbar-nav navbar-left">
      <li><a href="{{ url('donate') }}">{{ trans('general.nav.donate') }}</a></li>
			<li><a href="{{ url('vote') }}">{{ trans('general.nav.vote') }}</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ url('about') }}">{{ trans('general.nav.about') }}</a></li>
			<li><a href="{{ url('credits') }}">{{ trans('general.nav.credits') }}</a></li>		        
    </ul>
  </div>
</nav>
