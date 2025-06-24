<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brightred
 */

?>

</body>

<!-- Cookie Consent Banner -->
<div id="cookieConsentBanner" style="display: none; position: fixed; bottom: 0; width: 100%; background: #f4f4f4; padding: 20px; text-align: center; z-index: 1000;">
  <p>Our website uses cookies to enhance your experience. By continuing to use our website, you are agreeing to our use of cookies. Necessary cookies are always enabled.</p>
  <div>
    <label>Preferences</label> <input type="checkbox" id="preferencesCookie" name="preferences">
  </div>
  <div>
    <label>Statistical</label> <input type="checkbox" id="statisticalCookie" name="statistical">
  </div>
  <div>
    <label>Marketing</label> <input type="checkbox" id="marketingCookie" name="marketing">
  </div>
  <button id="manage_cookies">Manage Cookies</button>
  <button onclick="setCookieConsent()">Save Preferences</button>
  <button onclick="allowAllCookies()">Allow All Cookies</button>
</div>

<!-- Minimized Banner Button -->
<div id="minimizedConsentBanner" style="display: none; position: fixed; bottom: 0; left: 0; background: #f4f4f4; padding: 10px; cursor: pointer; z-index: 1001;" onclick="openConsentBanner()">
  Change cookie settings
</div>

<script>
// Ensure the dataLayer exists
window.dataLayer = window.dataLayer || [];

function setCookie(name, value, days) {
  var now = new Date();
  now.setTime(now.getTime() + (days * 24 * 60 * 60 * 1000));
  var expires = now.toUTCString();

  var cookieDomain = getCookieDomain();
  var domainPart = cookieDomain ? `domain=${cookieDomain};` : '';

  document.cookie = `${name}=${value};expires=${expires};path=/;${domainPart}`;
}

function getCookieDomain() {
  const host = window.location.hostname;

  // For subdomains
  const parts = host.split('.');
  if (parts.length >= 2) {
    return '.' + parts.slice(-2).join('.');
  }

  return '';
}



function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i].trim(); // Ensure trimming any leading spaces
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length);
  }
  return null;
}

function setCookieConsent() {
  var consentValues = ['Necessary']; // Necessary cookies are always accepted.

  if (document.getElementById('preferencesCookie').checked) {
    consentValues.push('Preferences');
  }
  if (document.getElementById('statisticalCookie').checked) {
    consentValues.push('Statistical');
  }
  if (document.getElementById('marketingCookie').checked) {
    consentValues.push('Marketing');
  }

  var consentValue = consentValues.join(',');
  var existingConsent = readCookie('cookieConsent');

  // Update the cookie and the dataLayer only if the consent has changed.
  if (consentValue !== existingConsent) {
    setCookie('cookieConsent', consentValue, 30);
    window.dataLayer.push({
      'event': 'cookie_consent_update',
      'cookieConsent': consentValue
    });
  }
  
  hideConsentBanner();
  showMinimizedBanner();
}

// Show or hide banners based on cookie consent
window.onload = function() {
  var cookieValue = readCookie('cookieConsent');
  if (cookieValue) {
    // Initialize checkbox states based on cookie value.
    document.getElementById('preferencesCookie').checked = cookieValue.includes('Preferences');
    document.getElementById('statisticalCookie').checked = cookieValue.includes('Statistical');
    document.getElementById('marketingCookie').checked = cookieValue.includes('Marketing');
    showMinimizedBanner();
  } else {
    document.getElementById('cookieConsentBanner').style.display = 'block';
  }
};

function hideConsentBanner() {
  document.getElementById('cookieConsentBanner').style.display = 'none';
}

function showMinimizedBanner() {
  document.getElementById('minimizedConsentBanner').style.display = 'block';
}

function allowAllCookies() {
  document.getElementById('preferencesCookie').checked = true;
  document.getElementById('statisticalCookie').checked = true;
  document.getElementById('marketingCookie').checked = true;
  setCookieConsent();
}

function openConsentBanner() {
  document.getElementById('cookieConsentBanner').style.display = 'block';
  document.getElementById('minimizedConsentBanner').style.display = 'none';
}
</script>





</html>
