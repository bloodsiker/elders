<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row equal-height">

                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="row footer-nav">
                            <div class="col-md-6 col-xs-12 no-padding">
                                <h4 class="footer-contact-title"><span>TOP GAMES</span></h4>
                                <ul>
                                    <li><a href="http://s.bbgam.com/?164788" target="_blank">Сказание</a></li>
                                </ul>
                            </div>

                            <div class="col-md-6 col-xs-12 no-padding">
                                <h4 class="footer-contact-title"><span>Menu</span></h4>
                                <ul>
                                    <li><a href="{{ route('main') }}">Карты</a></li>
                                    <li><a href="{{ route('monsters') }}">Монстры</a></li>
                                    <li><a href="{{ route('nps') }}">НПС</a></li>
                                    <li><a href="{{ route('items') }}">Предметы</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="footer-contact">
                            <h4 class="footer-contact-title"><span>Contact us</span></h4>
                            <ul>
                                <li>Telegram: <a href="https://t.me/ovsijchuk">ovsijchuk</a></li>
                                <li>Mail: <a href="mailto:maldini2@ukr.net">maldini2@ukr.net</a></li>
                            </ul>
                        </div>

{{--                        <div class="payments">--}}
{{--                            <div class="payment">--}}
{{--                                <img src="bundles/app/assets/images/icons/paypal.png" alt="paypal">--}}
{{--                            </div>--}}
{{--                            <div class="payment">--}}
{{--                                <img src="bundles/app/assets/images/icons/webmoney.png" alt="paypal">--}}
{{--                            </div>--}}
{{--                            <div class="payment">--}}
{{--                                <img src="bundles/app/assets/images/icons/visa.png" alt="paypal">--}}
{{--                            </div>--}}
{{--                            <div class="payment">--}}
{{--                                <img src="bundles/app/assets/images/icons/mastercard.png" alt="paypal">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>

                    <div class="col-md-12 copyright">
                        <p>All rights reserved. Elders {{ date('Y') }} © </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
