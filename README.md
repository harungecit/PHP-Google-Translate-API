<div align="center">
    <a href="https://php.net">
        <img
            alt="PHP"
            src="https://www.php.net/images/logos/new-php-logo.svg"
            width="150">
    </a>
</div>

# PHP-Google-Translate-API
It is a function that performs translation using PHP and Google Translate API.

<h2>How to use?</h2>


```php
    function translate($text = 'none'){
      $apiKey = '<GOOGLE_TRANSLATE_API_KEY>'; //Your Google Cloud Translate API Key
      $source = 'en'; //Language of the text to be translated
      $target = 'tr'; //The language you want to translate
      $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source='.$source.'&target='.$target;
      $handle = curl_init($url);
      curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($handle);
      $responseDecoded = json_decode($response, true);
      curl_close($handle);
      return $responseDecoded['data']['translations'][0]['translatedText']; //return array response
    }
```

In the above function
```php
  $apiKey = '<GOOGLE_TRANSLATE_API_KEY>';
```
In the field, enter your API key, which you will obtain by creating a new API key from the Cloud Translation API (https://cloud.google.com/translate) application on Google Cloud Platform.

```php
  $source = 'en'; //Language of the text to be translated
  $target = 'tr'; //The language you want to translate
```

Enter the 2-digit language code of the Source and Target languages in the fields. You can access the language codes for languages at https://cloud.google.com/translate/docs/languages.

Finally, you can get the translation result by calling the translate() function.
Sample:
```php
  echo translate('Hello World!');
  //Output: Hello World!
```
