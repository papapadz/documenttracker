@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header')
    {{-- {{ config('app.name') }} --}}
    <img src="http://mmmhmc.doh.gov.ph/images/Headerwhite3.png" alt="{{config('app.name')}}">
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} IHOMP Unit. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
