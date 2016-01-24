<div id="footer">
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
            <h4 id="loadingDonation"><i class="fa fa-refresh fa-spin"></i> {{ trans('general.footer.loading') }}</h4>
            <h4 id="errorDonation" style="display: none"><i class="fa fa-exclamation-triangle"></i> {{ trans('general.footer.error') }}</h4>
            <div id="donation" style="display: none">
                <h4>{{ trans('general.footer.latest') }}</h4>
                <p>{{ trans('general.footer.from') }}: <strong id="name"></strong><br>
                {{ trans('general.footer.amount') }}: £<strong id="amount"></strong><br>
                {{ trans('general.footer.message') }}: <strong id="message"></strong></p>
            </div>
            <h4 id="allDonations" style="display: none">{{ trans('general.footer.total') }}: £<span id="totalDonations"></span></h4>
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
</div>