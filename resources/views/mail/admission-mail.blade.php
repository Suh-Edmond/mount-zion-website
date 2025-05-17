<x-mail::message>
    <img src="{{asset($data['program_image'])}}" alt="Program Image" width="100%" height="250px"/><br><br>
    ### Hi {{ $data['name'] }}!

            Congratulations!<br>

            We have successfully received you application for {{$data['program_title']}} program at Mount Zion Higher Institute
            Out admission team will carefully review your file and return to you if you meet the program requirements for admission


            If you have any questions or concerns, feel free to contact support at  <a class="dn_btn" href="mailto:support@mountzion.com">support@mountzion</a> or <a class="dn_btn" href="tel:+(430) 790-3387">+(430) 790-3387.</a>

            <br>

            Best regards,<br>
            Mount Zion Team.<br>


            <div style="display: flex;justify-content: center; margin-bottom: 30px">
                <a href="#" style="padding: 10px"><img src="{{asset('/img/blog/facebook-logo.png')}}" alt="facebook logo" width="30px" height="30px"></a>
                <a href="#" style="padding: 10px"><img src="{{asset('/img/blog/instagram-logo.png')}}" alt="instagram logo" width="30px" height="30px"></a>
                <a href="#" style="padding: 10px"><img src="{{asset('/img/blog/twitter-logo.png')}}" alt="twitter logo" width="30px" height="30px"></a>
                <a href="#" style="padding: 10px"><img src="{{asset('/img/blog/whatsapp-logo.png')}}" alt="whatsapp logo" width="30px" height="30px"></a>
            </div>
            <div style="background-color: #e2e8f0;">
                <div style="display: flex;justify-content: center;padding: 10px">
                    <span style="display: flex; justify-content: center;font-weight: bold;margin-left: 2px"><a href="" style="text-decoration: none">Mount Zion Higher Institute</a></span><br>
                </div>
                <div style="display: flex;justify-content: center; margin-bottom: 5px;padding: 10px">
                    <span>Buea and Bamenda, Cameroon.</span>
                </div>
                <div style="display: flex;justify-content: center;padding: 10px">
                    <span>This email was sent to <a class="dn_btn">{{$data['email']}}</a><br>You applied for a program course in Mount Zion Higher Institute.</span>
                </div>
            </div>
</x-mail::message>
