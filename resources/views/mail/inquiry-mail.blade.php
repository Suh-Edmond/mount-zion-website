<x-mail::message>
    # Hi

    Name: {{ $data['name'] }}
    Email: {{ $data['email'] }}
    Phone: {{ $data['phone'] }}

    Message
    {{ $data['message'] }}



    Best regards,
    QuickRecords Team.
</x-mail::message>
