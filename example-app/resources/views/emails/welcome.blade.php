@component('mail::message')
# Welcome to my Auth & Mailing Course

I Would like to thank you.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
