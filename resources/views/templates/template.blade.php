<!DOCTYPE html>
<html lang="en">
    @include('templates.head')
    
    <body>
        @include('templates.nav')
    
        <div id="cookie" class="alert alert-info" style="display: none">            
                <button type="button" class="close" data-dismiss="alert" style="margin-left: 10px;">×</button>
                <strong> This Site Uses Cookies</strong>
        </div>
    
        @yield('content')
    
        {{-- Footer Section --}}
        @include('templates.footer')

        <script src="{{ secure_url(elixir('js/app.js')) }}"></script>
        @stack('scripts')
        
        @if (app()->environment() == 'production')
            <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a, m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create','UA-69463242-3','auto');ga('send','pageview');</script>
        @endif
    </body>
</html>