<?php
/**
 * Footer partial for brightred theme
 * @package brightred
 */
?>

<!-- Cookie Consent Banner -->
<div id="cookieConsentBanner" style="display: none; position: fixed; bottom: 0; width: 100%; background: #f4f4f4; padding: 20px; text-align: center; z-index: 1000;" role="region" aria-label="Cookie Consent">
  <p>Our website uses cookies to enhance your experience. By continuing to use our website, you are agreeing to our use of cookies. Necessary cookies are always enabled.</p>
  <fieldset style="border: none; display: inline-block;">
    <label><input type="checkbox" id="preferencesCookie" name="preferences"> Preferences</label><br>
    <label><input type="checkbox" id="statisticalCookie" name="statistical"> Statistical</label><br>
    <label><input type="checkbox" id="marketingCookie" name="marketing"> Marketing</label>
  </fieldset>
  <div style="margin-top: 10px;">
    <button id="saveCookiePreferences">Save Preferences</button>
    <button id="allowAllCookies">Allow All Cookies</button>
  </div>
</div>

<!-- Minimized Banner Button -->
<div id="minimizedConsentBanner" style="display: none; position: fixed; bottom: 0; left: 0; background: #f4f4f4; padding: 10px; cursor: pointer; z-index: 1001;" role="button" tabindex="0" aria-label="Change cookie settings">
  Change cookie settings
</div>

<script>
  window.dataLayer = window.dataLayer || [];

  function setCookie(name, value, days) {
    const now = new Date();
    now.setTime(now.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = now.toUTCString();
    const cookieDomain = getCookieDomain();
    const domainPart = '';

    document.cookie = `${name}=${value};expires=${expires};path=/;SameSite=Lax;Secure`;

  }

  function readCookie(name) {
    const nameEQ = name + "=";
    const cookies = document.cookie.split(';');
    for (let c of cookies) {
      c = c.trim();
      if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length);
    }
    return null;
  }

  function setCookieConsent() {
    const consentValues = ['Necessary'];
    if (document.getElementById('preferencesCookie').checked) consentValues.push('Preferences');
    if (document.getElementById('statisticalCookie').checked) consentValues.push('Statistical');
    if (document.getElementById('marketingCookie').checked) consentValues.push('Marketing');

    const consentValue = consentValues.join(',');
    const existingConsent = readCookie('cookieConsent');

    if (consentValue !== existingConsent) {
      setCookie('cookieConsent', consentValue, 30);
      window.dataLayer.push({
        event: 'cookie_consent_update',
        cookieConsent: consentValue
      });
    }

    hideConsentBanner();
    showMinimizedBanner();
  }

  function hideConsentBanner() {
    document.getElementById('cookieConsentBanner').style.display = 'none';
  }

  function showMinimizedBanner() {
    document.getElementById('minimizedConsentBanner').style.display = 'block';
  }

  function openConsentBanner() {
    document.getElementById('cookieConsentBanner').style.display = 'block';
    document.getElementById('minimizedConsentBanner').style.display = 'none';
  }

  function allowAllCookies() {
    document.getElementById('preferencesCookie').checked = true;
    document.getElementById('statisticalCookie').checked = true;
    document.getElementById('marketingCookie').checked = true;
    setCookieConsent();
  }

  document.addEventListener('DOMContentLoaded', function () {
    const cookieValue = readCookie('cookieConsent');

    if (cookieValue) {
      document.getElementById('preferencesCookie').checked = cookieValue.includes('Preferences');
      document.getElementById('statisticalCookie').checked = cookieValue.includes('Statistical');
      document.getElementById('marketingCookie').checked = cookieValue.includes('Marketing');
      showMinimizedBanner();
    } else {
      document.getElementById('cookieConsentBanner').style.display = 'block';
    }

    // Attach event listeners
    document.getElementById('saveCookiePreferences').addEventListener('click', setCookieConsent);
    document.getElementById('allowAllCookies').addEventListener('click', allowAllCookies);
    document.getElementById('minimizedConsentBanner').addEventListener('click', openConsentBanner);
    document.getElementById('minimizedConsentBanner').addEventListener('keypress', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        openConsentBanner();
      }
    });
  });
</script>

<?php wp_footer(); ?>
</body>
</html>
