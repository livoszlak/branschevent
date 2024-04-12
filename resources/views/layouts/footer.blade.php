<div class="footerWrapper">
        <div class="footerPageLinks inter">
            <a href="#">SITEMAP</a>
            <a href="/">HEM</a>
            <a href="/attendees">VEM KOMMER?</a>
            <a href="{{ Auth::user() ?  route('profile.show', ['id' => Auth::user()->id]) : url('/login') }}">DIN ANMÄLAN</a>
        </div>
        <div class="footerInfo">
            <img src="{{ asset('pictures/yrgored.svg') }}" alt="A logo of Yrgo">
            <div class="footerInfoColtwo">
                <ul>
                    <li>Lärdomsgatan 3, <br>
                        417 56 Göteborg </li>
                    <li>031 - 367 31 00 </li>
                </ul>
                    <div class="footerLinks">
                        <a href="https://www.yrgo.se"><img src="{{asset('pictures/websitelink.svg')}}" alt=""></a>
                        <a href="https://www.facebook.com/yrgogoteborg/"><img src="{{asset('pictures/facebooklogo.svg')}}" alt=""></a>
                        <a href="https://www.linkedin.com/school/yrgo/"><img src="{{asset('pictures/linkedinlogo.svg')}}" alt=""></a>
                    </div>
            </div>
        </div>
        <div class="footerPictures">
            <p>© 2024 Yrgo, högre yrkesutbildning Göteborg</p>
            <img class="gbgstad" src="{{ asset('pictures/gbgstad.svg') }}" alt="A logo of Göteborgs stad.">
        </div>
    </div>