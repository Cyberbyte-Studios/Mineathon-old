<div id="footer">
    <div class="row mt centered">
        <div class="col-lg-3">
            <h4>{{ trans('footer.header1') }}</h4>
            <p>
                {!! trans('footer.body1') !!}
            </p>
        </div>

        <div class="col-lg-3">
            <h4>{{ trans('footer.header2') }}</h4>
            <p>
                {!! trans('footer.body2') !!}
            </p>
        </div>

        <div class="col-lg-3">
            @if (Helper::settings('donate'))
                <h4 id="loadingDonation">
                    <i class="fa fa-refresh fa-spin"></i>
                    {{ trans('footer.loading') }}
                </h4>
    
                <h4 id="errorDonation" style="display: none">
                    <i class="fa fa-exclamation-triangle"></i>
                    {{ trans('footer.error') }}
                </h4>
    
                <div id="donation" style="display: none">
                    <h4>{{ trans('footer.latest') }}</h4>
                    <p>{{ trans('footer.from') }}: <strong id="name"></strong><br>
                        {{ trans('footer.amount') }}: £<strong id="amount"></strong><br>
                        {{ trans('footer.message') }}: <strong id="message"></strong></p>
                </div>
    
                <h4 id="allDonations" style="display: none">{{ trans('footer.total') }}: £
                    <span id="totalDonations"></span>
                </h4>
            @else 
                <h4>Donations Not Enabled</h4>
            @endif
        </div>

        <div class="col-lg-3">
            <a class="twitter-timeline" href="https://twitter.com/Mineathon_Event"
               data-widget-id="688808472662675457">Tweets by @Mineathon_Event</a>
            <script>!function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = p + "://platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");</script>
        </div>
        {{ Helper::debug() }}
    </div>
</div>
