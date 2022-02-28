<?php
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
echo translate('Hello World!'); //Use translate() function to translate
//Output: Merhaba Dünya!
?>
