<!DOCTYPE html>
<html lang="en">
@include('templates.head')

<body>
@include('templates.nav')

<div id="header">
    <div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h1 class="error">404</h1>
				<p>{{ trans('errors.404') }}</p>
			</div>
		</div>
    </div>
</div>

</body>
</html>