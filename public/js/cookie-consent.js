(()=>{"use strict";var e,t={14:(e,t,o)=>{function n(e){return n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},n(e)}function i(e,t){for(var o=0;o<t.length;o++){var n=t[o];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,c(n.key),n)}}function c(e){var t=function(e,t){if("object"!=n(e)||!e)return e;var o=e[Symbol.toPrimitive];if(void 0!==o){var i=o.call(e,t||"default");if("object"!=n(i))return i;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(e,"string");return"symbol"==n(t)?t:t+""}var s=function(){return e=function e(t){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.cookieName=t.cookieName||"cookie_consent",this.cookiePath=t.cookiePath||"/",this.expirationDays=365,this.saveCookiePreferenceUrl="/gdpr-cookie-preference",this.getCookiesPreferenceUrl="/gdpr-cookie-preference",this.cookiePreferences={necessary:!0,analytics:!1,marketing:!1,consent_token:null},this.init()},t=[{key:"init",value:function(){this.cacheElements(),this.addEventListeners(),this.checkCookie()}},{key:"cacheElements",value:function(){this.cookieConsentContainer=document.querySelector(".cookie-consent"),this.cookieConsentPopup=document.querySelector(".cookie-consent-popup"),this.marketingCookiesInput=document.querySelector('input[name="marketing-cookies"]'),this.analyticsCookiesInput=document.querySelector('input[name="analytics-cookies"]'),this.customizeCookiesButton=document.querySelector(".cookie-consent__button--customize"),this.changeCookiesButton=document.querySelector(".cookie-consent-change__button"),this.denyCookiesButton=document.querySelectorAll(".cookie-consent__button--deny"),this.acceptSelectedCookiesButton=document.querySelectorAll(".cookie-consent__button--accept-selected"),this.acceptAllCookiesButton=document.querySelectorAll(".cookie-consent__button--accept-all"),this.showCookiesInfoButton=document.querySelectorAll(".show-cookies-info")}},{key:"checkCookie",value:function(){var e=this,t=document.cookie.split(";").find((function(t){return t.includes(e.cookieName)}));t?this.loadCookiePreferences(t):this.fetchCookiePreferences()}},{key:"fetchCookiePreferences",value:function(){var e=this,t=this.getUserId();fetch("".concat(this.getCookiesPreferenceUrl,"?consent_token=").concat(t)).then((function(e){return e.json()})).then((function(t){return e.handleCookiePreferencesResponse(t)})).catch((function(){return e.showConsentPopup()}))}},{key:"handleCookiePreferencesResponse",value:function(e){e&&e.consent_preferences?(this.hideConsentPopup(),this.cookiePreferences=e.consent_preferences,this.setCookie(),this.updateInputs()):this.showConsentPopup()}},{key:"loadCookiePreferences",value:function(e){var t=e.split("=")[1];this.cookiePreferences=JSON.parse(t),this.updateInputs()}},{key:"updateInputs",value:function(){this.marketingCookiesInput.checked=this.cookiePreferences.marketing,this.analyticsCookiesInput.checked=this.cookiePreferences.analytics}},{key:"showConsentPopup",value:function(){this.cookieConsentContainer.classList.remove("hidden"),this.cookieConsentPopup.classList.remove("hidden")}},{key:"hideConsentPopup",value:function(){this.cookieConsentContainer.classList.add("hidden"),this.cookieConsentPopup.classList.add("hidden")}},{key:"addEventListeners",value:function(){var e=this;this.marketingCookiesInput.addEventListener("change",(function(t){e.cookiePreferences.marketing=t.target.checked})),this.analyticsCookiesInput.addEventListener("change",(function(t){e.cookiePreferences.analytics=t.target.checked})),this.changeCookiesButton.addEventListener("click",(function(){e.cookieConsentContainer.classList.remove("hidden")})),this.customizeCookiesButton.addEventListener("click",(function(){e.cookieConsentPopup.classList.remove("hidden"),e.cookieConsentContainer.classList.add("hidden")})),this.denyCookiesButton.forEach((function(t){t.addEventListener("click",(function(){e.cookiePreferences.analytics=!1,e.cookiePreferences.marketing=!1,e.setCookiesChoice()}))})),this.acceptSelectedCookiesButton.forEach((function(t){t.addEventListener("click",(function(){return e.setCookiesChoice()}))})),this.acceptAllCookiesButton.forEach((function(t){t.addEventListener("click",(function(){e.cookiePreferences.analytics=!0,e.cookiePreferences.marketing=!0,e.setCookiesChoice()}))})),this.showCookiesInfoButton.forEach((function(e){e.addEventListener("click",(function(e){var t=e.target.nextElementSibling;t.classList.toggle("hidden"),e.target.textContent=t.classList.contains("hidden")?"Show info":"Hide info"}))}))}},{key:"setCookiesChoice",value:function(){this.updateInputs(),this.hideConsentPopup(),this.cookiePreferences.consent_token=this.getUserId(),this.dispatchCookieAcceptEvent(),this.setCookie(),this.saveCookiePreferences()}},{key:"dispatchCookieAcceptEvent",value:function(){var e=new CustomEvent("cookie-accept",{detail:{necessary:this.cookiePreferences.necessary,marketing:this.cookiePreferences.marketing,analytics:this.cookiePreferences.analytics}});document.dispatchEvent(e)}},{key:"saveCookiePreferences",value:function(){fetch(this.saveCookiePreferenceUrl,{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({cookie_references:this.cookiePreferences,consent_token:this.cookiePreferences.consent_token})}).catch((function(e){return console.error("Error:",e)}))}},{key:"getUserId",value:function(){var e=localStorage.getItem("consent_token");return e||(e=this.uuid(),localStorage.setItem("consent_token",e)),e}},{key:"uuid",value:function(){return"10000000-1000-4000-8000-100000000000".replace(/[018]/g,(function(e){return(e^crypto.getRandomValues(new Uint8Array(1))[0]&15>>e/4).toString(16)}))}},{key:"setCookie",value:function(){var e=JSON.stringify(this.cookiePreferences);document.cookie="".concat(this.cookieName,"=").concat(e,"; expires=").concat(this.getCookieExpirationDate(),"; path=").concat(this.cookiePath)}},{key:"getCookieExpirationDate",value:function(){var e=new Date;return e.setTime(e.getTime()+24*this.expirationDays*60*60*1e3),e.toUTCString()}}],t&&i(e.prototype,t),o&&i(e,o),Object.defineProperty(e,"prototype",{writable:!1}),e;var e,t,o}();window.CookiesConsent=s},95:()=>{}},o={};function n(e){var i=o[e];if(void 0!==i)return i.exports;var c=o[e]={exports:{}};return t[e](c,c.exports,n),c.exports}n.m=t,e=[],n.O=(t,o,i,c)=>{if(!o){var s=1/0;for(k=0;k<e.length;k++){for(var[o,i,c]=e[k],r=!0,a=0;a<o.length;a++)(!1&c||s>=c)&&Object.keys(n.O).every((e=>n.O[e](o[a])))?o.splice(a--,1):(r=!1,c<s&&(s=c));if(r){e.splice(k--,1);var u=i();void 0!==u&&(t=u)}}return t}c=c||0;for(var k=e.length;k>0&&e[k-1][2]>c;k--)e[k]=e[k-1];e[k]=[o,i,c]},n.d=(e,t)=>{for(var o in t)n.o(t,o)&&!n.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={155:0,64:0};n.O.j=t=>0===e[t];var t=(t,o)=>{var i,c,[s,r,a]=o,u=0;if(s.some((t=>0!==e[t]))){for(i in r)n.o(r,i)&&(n.m[i]=r[i]);if(a)var k=a(n)}for(t&&t(o);u<s.length;u++)c=s[u],n.o(e,c)&&e[c]&&e[c][0](),e[c]=0;return n.O(k)},o=self.webpackChunk=self.webpackChunk||[];o.forEach(t.bind(null,0)),o.push=t.bind(null,o.push.bind(o))})(),n.O(void 0,[64],(()=>n(14)));var i=n.O(void 0,[64],(()=>n(95)));i=n.O(i)})();