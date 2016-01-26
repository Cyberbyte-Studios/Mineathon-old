@if (Helper::settings('donate'))
    @include('core.donateLive')
@else
    @include('core.donateOff')
@endif