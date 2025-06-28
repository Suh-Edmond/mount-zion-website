<x-mail::message>
    ### Dear {{$data['name']}},

    Thank you for your application to the {{$data['program_title']}} program at {{$data['school']}}.

    We are pleased to confirn that we have received all submitted documents, and your application is currently under
    review by our Admissions Committee.

    We understand your anticipation and appreciate your patience during this process.

    Should you have any questions or require further assistance in the meantime, please feel free to contact us via
    email at {{$data['app_email']}} or {{$data['school_email']}} or reach us by phone at {{ $data['school_telephone']
    }}.

    Thank your once again for your interest in {{$data['school']}}. We wish you all the best as we proceed with your
    application.


    Warm regards,

    Admissions Office

    {{$data['school']}}

</x-mail::message>