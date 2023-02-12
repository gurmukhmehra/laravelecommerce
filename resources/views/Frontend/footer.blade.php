
<div class="tr-convenience">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="convenience">
                    <div class="icon">
                        <img src="{{ asset('front/images/others/icon1.png') }}" alt="Image" class="img-fluid">
                    </div>
                    <span>Free Delivery</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="convenience">
                    <div class="icon">
                        <img src="{{ asset('front/images/others/icon2.png') }}" alt="Image" class="img-fluid">
                    </div>
                    <span>Clients Discounts</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="convenience">
                    <div class="icon">
                        <img src="{{ asset('front/images/others/icon3.png') }}" alt="Image" class="img-fluid">
                    </div>
                    <span>Return Of Goods</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="convenience">
                    <div class="icon">
                        <img src="{{ asset('front/images/others/icon4.png') }}" alt="Image" class="img-fluid">
                    </div>
                    <span>Many Brands</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tr-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="left-content">
                        <h3>Sign up for newsletter</h3>
                        <p>Enter your email to receive relevant messaging tips and examples.</p>
                        <form action="#">
                            <input class="form-control" type="email" required="required" placeholder="Enter Your Email Id">
                            <input type="submit" class="btn">
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="left-content">
                        <h3>We Accept</h3>
                        <p>Enter your email to receive relevant messaging tips and examples.</p>
                        <div class="payment-card">
                            <ul class="tr-list">
                                <li>
                                    <img src="{{ asset('front/images/others/card1.png') }}" alt="Image" class="img-fluid">
                                </li>
                                <li>
                                    <img src="{{ asset('front/images/others/card2.png') }}" alt="Image" class="img-fluid">
                                </li>
                                <li>
                                    <img src="{{ asset('front/images/others/card3.png') }}" alt="Image" class="img-fluid">
                                </li>
                                <li>
                                    <img src="{{ asset('front/images/others/card4.png') }}" alt="Image" class="img-fluid">
                                </li>
                                <li>
                                    <img src="{{ asset('front/images/others/card5.png') }}" alt="Image" class="img-fluid">
                                </li>
                                <li>
                                    <img src="{{ asset('front/images/others/card6.png') }}" alt="Image" class="img-fluid">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-widget">
                <div class="footer-logo">
                    <a href="{{URL::to('/')}}"><h3>{{globalSetting('siteName')}}</h3></a>
                </div>
                <span>@if(!empty(globalSetting('SiteCopyRight'))) {{ globalSetting('SiteCopyRight') }} @else Copyright &copy; 2023 @endif </span>
            </div>
            <div class="footer-widget">
                <h3>Products</h3>
                <ul class="tr-list">                    
                    <li>
                        <a href="{{ URL::to('/shop') }}">Shop</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/shop') }}">Pricing</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/term-and-condination') }}">Term & Condination</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/privacy-policy') }}">Privacy Policy</a>
                    </li>
                </ul>
            </div>
            <div class="footer-widget">
                <h3>Company</h3>
                <ul class="tr-list">
                    <li>
                        <a href="{{ URL::to('/about-us') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/blogs') }}">Blog</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/contact-us') }}">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="footer-widget">
                <h3>Help</h3>
                <ul class="tr-list">
                    <li>
                        <a href="#">Feedback</a>
                    </li>
                    <li>
                        <a href="#">Referral Program</a>
                    </li>
                    <li>
                        <a href="#">FAQ</a>
                    </li>
                </ul>
            </div>
            <div class="footer-widget">
                <h3>Social</h3>
                <ul class="tr-list">
                    <li>
                        @if(!empty(globalSetting('FacebookLink'))) 
                            <a href="{{ globalSetting('FacebookLink') }}" Target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a> 
                        @else
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a>
                        @endif
                    </li>
                    <li>
                        @if(!empty(globalSetting('TwitterLink'))) 
                            <a href="{{ globalSetting('TwitterLink') }}" Target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</a> 
                        @else
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</a>
                        @endif                        
                    </li>
                    <li>
                        @if(!empty(globalSetting('LinkedinLink'))) 
                            <a href="{{ globalSetting('LinkedinLink') }}" Target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i>LinkedIn</a> 
                        @else
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i>LinkedIn </a>
                        @endif                        
                    </li>
                    <li>
                        @if(!empty(globalSetting('InstagramLink'))) 
                            <a href="{{ globalSetting('InstagramLink') }}" Target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i>InstagramLinkedIn</a> 
                        @else
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>Instagram </a>
                        @endif                        
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>