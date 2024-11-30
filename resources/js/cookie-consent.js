export class CookiesConsent {
    constructor(params) {
        this.cookieName = params.cookieName || 'cookie_consent';
        this.cookiePath = params.cookiePath || '/';
        this.expirationDays = 365;
        this.saveCookiePreferenceUrl = '/gdpr-cookie-preference';
        this.getCookiesPreferenceUrl = '/gdpr-cookie-preference';
        this.cookiePreferences = {
            necessary: true,
            analytics: false,
            marketing: false,
            consent_token: null
        };
        this.init();
    }

    init() {
        this.cacheElements();
        this.addEventListeners();
        this.checkCookie();
    }

    cacheElements() {
        this.cookieConsentContainer = document.querySelector('.cookie-consent');
        this.cookieConsentPopup = document.querySelector('.cookie-consent-popup');
        this.marketingCookiesInput = document.querySelector('input[name="marketing-cookies"]');
        this.analyticsCookiesInput = document.querySelector('input[name="analytics-cookies"]');
        this.customizeCookiesButton = document.querySelector('.cookie-consent__button--customize');
        this.changeCookiesButton = document.querySelector('.cookie-consent-change__button');
        this.denyCookiesButton = document.querySelectorAll('.cookie-consent__button--deny');
        this.acceptSelectedCookiesButton = document.querySelectorAll('.cookie-consent__button--accept-selected');
        this.acceptAllCookiesButton = document.querySelectorAll('.cookie-consent__button--accept-all');
        this.showCookiesInfoButton = document.querySelectorAll('.show-cookies-info');
    }

    checkCookie() {
        const cookie = document.cookie.split(';').find(cookie => cookie.includes(this.cookieName));
        if (!cookie) {
            this.fetchCookiePreferences();
        } else {
            this.loadCookiePreferences(cookie);
        }
    }

    fetchCookiePreferences() {
        const consent_token = this.getUserId();
        fetch(`${this.getCookiesPreferenceUrl}?consent_token=${consent_token}`)
            .then(response => response.json())
            .then(data => this.handleCookiePreferencesResponse(data))
            .catch(() => this.showConsentPopup());
    }

    handleCookiePreferencesResponse(data) {
        if (!data || !data.consent_preferences) {
            this.showConsentPopup();
        } else {
            this.hideConsentPopup();
            this.cookiePreferences = data.consent_preferences;
            this.setCookie();
            this.updateInputs();
        }
    }

    loadCookiePreferences(cookie) {
        const cookieValue = cookie.split('=')[1];
        this.cookiePreferences = JSON.parse(cookieValue);
        this.updateInputs();
    }

    updateInputs() {
        this.marketingCookiesInput.checked = this.cookiePreferences.marketing;
        this.analyticsCookiesInput.checked = this.cookiePreferences.analytics;
    }

    showConsentPopup() {
        this.cookieConsentContainer.classList.remove('hidden');
        this.cookieConsentPopup.classList.remove('hidden');
    }

    hideConsentPopup() {
        this.cookieConsentContainer.classList.add('hidden');
        this.cookieConsentPopup.classList.add('hidden');
    }

    addEventListeners() {
        this.marketingCookiesInput.addEventListener('change', (e) => {
            this.cookiePreferences.marketing = e.target.checked;
        });
        this.analyticsCookiesInput.addEventListener('change', (e) => {
            this.cookiePreferences.analytics = e.target.checked;
        });
        this.changeCookiesButton.addEventListener('click', () => {
            this.cookieConsentContainer.classList.remove('hidden');
        });
        this.customizeCookiesButton.addEventListener('click', () => {
            this.cookieConsentPopup.classList.remove('hidden');
            this.cookieConsentContainer.classList.add('hidden');
        });
        this.denyCookiesButton.forEach(button => {
            button.addEventListener('click', () => {
                this.cookiePreferences.analytics = false;
                this.cookiePreferences.marketing = false;
                this.setCookiesChoice();
            });
        });
        this.acceptSelectedCookiesButton.forEach(button => {
            button.addEventListener('click', () => this.setCookiesChoice());
        });
        this.acceptAllCookiesButton.forEach(button => {
            button.addEventListener('click', () => {
                this.cookiePreferences.analytics = true;
                this.cookiePreferences.marketing = true;
                this.setCookiesChoice();
            });
        });
        this.showCookiesInfoButton.forEach(button => {
            button.addEventListener('click', (event) => {
                const cookieInformation = event.target.nextElementSibling;
                cookieInformation.classList.toggle('hidden');
                event.target.textContent = cookieInformation.classList.contains('hidden') ? 'Show info' : 'Hide info';
            });
        });
    }

    setCookiesChoice() {
        this.updateInputs();
        this.hideConsentPopup();
        this.cookiePreferences.consent_token = this.getUserId();
        this.dispatchCookieAcceptEvent();
        this.setCookie();
        this.saveCookiePreferences();
    }

    dispatchCookieAcceptEvent() {
        const event = new CustomEvent('cookie-accept', {
            detail: {
                necessary: this.cookiePreferences.necessary,
                marketing: this.cookiePreferences.marketing,
                analytics: this.cookiePreferences.analytics
            }
        });
        document.dispatchEvent(event);
    }

    saveCookiePreferences() {
        fetch(this.saveCookiePreferenceUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                cookie_references: this.cookiePreferences,
                consent_token: this.cookiePreferences.consent_token
            }),
        }).catch((error) => console.error('Error:', error));
    }

    getUserId() {
        let consent_token = localStorage.getItem('consent_token');
        if (!consent_token) {
            consent_token = this.uuid();
            localStorage.setItem('consent_token', consent_token);
        }
        return consent_token;
    }

    uuid() {
        return "10000000-1000-4000-8000-100000000000".replace(/[018]/g, c =>
            (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
        );
    }

    setCookie() {
        const cookieValue = JSON.stringify(this.cookiePreferences);
        document.cookie = `${this.cookieName}=${cookieValue}; expires=${this.getCookieExpirationDate()}; path=${this.cookiePath}`;
    }

    getCookieExpirationDate() {
        const date = new Date();
        date.setTime(date.getTime() + (this.expirationDays * 24 * 60 * 60 * 1000));
        return date.toUTCString();
    }
}

window.CookiesConsent = CookiesConsent;
