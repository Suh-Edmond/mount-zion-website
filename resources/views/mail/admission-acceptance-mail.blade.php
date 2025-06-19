<x-mail::message>
### Hi {{ $data['name'] }}!

TThis email is to formally accept the offer of admission to the {{$data['program']->name}} program at [{{$data['program']->school->name}}] for the [Semester/Year] intake. I am very excited about the opportunity to join your esteemed institution.

Thank you for this offer. I have reviewed the acceptance package and I am looking forward to beginning my studies.



Best regards,
Mount Zion Team,<br>
{{ config('app.name') }}
</x-mail::message>
