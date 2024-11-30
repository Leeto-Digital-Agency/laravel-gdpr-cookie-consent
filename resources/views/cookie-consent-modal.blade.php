@php
$cookieConsentConfig = config('gdpr-cookie-consent');
@endphp
<div class="cookie-consent-popup hidden">
    <div class="cookie-consent-popup__content">
        <h2>We value your privacy</h2>
        <p class="cookie-consent-popup__message">
            We use cookies to enhance your browsing experience, serve personalised ads or content, and analyse our traffic. By clicking "Accept All", you consent to our use of cookies. Cookie Policy
        </p>
        <div class="cookie-consent-popup__group">
            <div class="cookie-consent-popup__switches">
                <div class="switch">
                    <div class="switch-btn switch-btn-pill button-switch">
                        <input type="checkbox" class="checkbox" name="necessary-cookies" id="necessary-cookies" checked readonly disabled>
                        <div class="knob"></div>
                        <div class="switch-btn-bg"></div>
                    </div>
                    <label for="necessary-cookies">Necessary cookies</label><button class="show-cookies-info">Show Info</button>
                    <div class="cookie-information hidden">
                        <p>{{ $cookieConsentConfig['necessary']['description'] }}</p>
                        @php
                            $cookieGroups = $cookieConsentConfig['necessary']['groups'];
                        @endphp
                        @foreach($cookieGroups as $cookieGroup)
                            <details class="cookie-information__group">
                                <summary>{{ $cookieGroup['title'] }}</summary>
                                <div class="cookies">
                                    @foreach($cookieGroup['cookies'] as $key => $cookie)
                                        <div class="cookie">
                                            <div class="cookie__name">{{ $key }}</div>
                                            <div>
                                                <span class="cookie__duration">
                                                    <span class="cookie__duration__title">Duration:</span>
                                                    <span class="cookie__duration__value">{{ $cookie['duration'] }}</span>
                                                </span>
                                                <span class="cookie__type">
                                                    <span class="cookie__type__title">Type:</span>
                                                    <span class="cookie__type__value">{{ $cookie['type'] }}</span>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </details>
                        @endforeach
                    </div>
                </div>
                <div class="switch">
                    <div class="switch-btn switch-btn-pill button-switch">
                        <input type="checkbox" class="checkbox" name="marketing-cookies" id="marketing-cookies">
                        <div class="knob"></div>
                        <div class="switch-btn-bg"></div>
                    </div>
                    <label for="marketing-cookies">Marketing cookies</label><button class="show-cookies-info">Show Info</button>
                    <div class="cookie-information hidden">
                        <p>{{ $cookieConsentConfig['marketing']['description'] }}</p>
                        @php
                            $cookieGroups = $cookieConsentConfig['marketing']['groups'];
                        @endphp
                        @foreach($cookieGroups as $cookieGroup)
                            <details class="cookie-information__group">
                                <summary>{{ $cookieGroup['title'] }}</summary>
                                <div class="cookies">
                                    @foreach($cookieGroup['cookies'] as $key => $cookie)
                                        <div class="cookie">
                                            <div class="cookie__name">{{ $key }}</div>
                                            <div>
                                                <span class="cookie__duration">
                                                    <span class="cookie__duration__title">Duration:</span>
                                                    <span class="cookie__duration__value">{{ $cookie['duration'] }}</span>
                                                </span>
                                                <span class="cookie__type">
                                                    <span class="cookie__type__title">Type:</span>
                                                    <span class="cookie__type__value">{{ $cookie['type'] }}</span>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </details>
                        @endforeach
                    </div>
                </div>
                <div class="switch">
                    <div class="switch-btn switch-btn-pill button-switch">
                        <input type="checkbox" class="checkbox" name="analytics-cookies" id="analytics-cookies">
                        <div class="knob"></div>
                        <div class="switch-btn-bg"></div>
                    </div>
                    <label for="analytics-cookies">Analytics cookies</label><button class="show-cookies-info">Show Info</button>
                    <div class="cookie-information hidden">
                        <p>{{ $cookieConsentConfig['analytics']['description'] }}</p>
                        @php
                            $cookieGroups = $cookieConsentConfig['analytics']['groups'];
                        @endphp
                        @foreach($cookieGroups as $cookieGroup)
                            <details class="cookie-information__group">
                                <summary>{{ $cookieGroup['title'] }}</summary>
                                <div class="cookies">
                                    @foreach($cookieGroup['cookies'] as $key => $cookie)
                                        <div class="cookie">
                                            <div class="cookie__name">{{ $key }}</div>
                                            <div>
                                                <span class="cookie__duration">
                                                    <span class="cookie__duration__title">Duration:</span>
                                                    <span class="cookie__duration__value">{{ $cookie['duration'] }}</span>
                                                </span>
                                                <span class="cookie__type">
                                                    <span class="cookie__type__title">Type:</span>
                                                    <span class="cookie__type__value">{{ $cookie['type'] }}</span>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </details>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="cookie-consent__buttons">
            <button class="cookie-consent__button cookie-consent__button--deny">Deny</button>
            <button class="cookie-consent__button cookie-consent__button--accept-selected">Accept Selected</button>
            <button class="cookie-consent__button cookie-consent__button--accept-all">Accept all</button>
        </div>
    </div>
</div>


<div class="cookie-consent hidden">
    <div class="cookie-consent__content">
        <div class="left">
            <h2>We value your privacy</h2>
            <p class="cookie-consent__message">
                We use cookies to enhance your browsing experience, serve personalised ads or content, and analyse our traffic. By clicking "Accept All", you consent to our use of cookies.
            </p>
        </div>
        <div class="right">
            <div class="cookie-consent__buttons">
                <button class="cookie-consent__button cookie-consent__button--customize">Customize</button>
                <button class="cookie-consent__button cookie-consent__button--deny">Deny</button>
                <button class="cookie-consent__button cookie-consent__button--accept-all">Accept all</button>
            </div>
        </div>
    </div>
</div>

<div class="cookie-consent-change">
    <button class="cookie-consent-change__button">Change cookie settings</button>
</div>
