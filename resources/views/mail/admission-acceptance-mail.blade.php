<x-mail::message>
    ### Dear {{$data['name']}},

    We are pleased to inform you that you have been offered admissions to the {{$data['program']}} program at
    {{$data['school']}}.

    Your application was reviewed by our Admissions Committee, and we believe you will make a valuable member of our
    academic community.

    For detailed information regarding tuition fees, and important deadlines, please visit our website at
    {{$data['website']}}.

    We kindly ask that you confirm your acceptance of this offer within four (04) working days, either by replying to
    this email or by visiting our campus in Buea or Bamenda.

    If you have any questions or need further assistance, feel free to contact us at {{$data['app_email']}} or
    {{$data['school_email']}} or by phone at {{ $data['school_telephone'] }}.

    Congratulations on your admission! We look forward to welcoming you to {{ $data['school'] }} and supporting you on
    your academic journey.


    Warm regards,

    Admissions Office

    {{$data['school']}}

</x-mail::message>