<x-mail::message>
    # Hi

    Name: {{ $data['name'] }}
    Email: {{ $data['email'] }}
    Phone: {{ $data['phone'] }}
    Date: {{ $data['dateTime'] }}

    Message
    {{ $data['message'] }}



    Best regards,
    QuickRecords Team.
</x-mail::message>
