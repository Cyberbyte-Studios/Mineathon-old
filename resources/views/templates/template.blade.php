<!DOCTYPE html>
<html lang="en">
  @include('templates.head')

  <body>
	@include('templates.nav')

	@yield('content')
	
	{{-- Footer Section --}}
	@include('templates.footer')
	
  <script src="{{ elixir('js/app.js') }}"></script>
	@stack('scripts')
  </body>
</html>