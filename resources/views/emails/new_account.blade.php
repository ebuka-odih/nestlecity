@component('mail::message')
# Hello {{ $last_name }} {{ $first_name }}

Your account with {{ env('APP_NAME') }} has been created.

## Account Details
Account Number: {{ $account_number }}
Account Type: {{ $account_type }}

<hr>
You are receiving this message because you applied to be a member in our bank

Thanks,<br>
{{ config('app.name') }}
@endcomponent
