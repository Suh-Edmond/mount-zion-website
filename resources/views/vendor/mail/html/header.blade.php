@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('assets/images/logo/resized_logo.png')}}" class="logo" alt="MTMKay Logo" height="200px" width="200px">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
