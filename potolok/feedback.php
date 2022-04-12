<?
session_start();
$name = $_REQUEST['name'];

$phone = $_REQUEST['phone'];

$message = "Имя {$name} \r\n Телефон {$phone}";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=utf-8 \r\n";

// var_dump($_REQUEST);
// die();
//mail('kabakovki@yandex.ru', 'Новый лид с сайта good-boat.ru', $message, $headers);

$resp_id = 673;
$city_name = '117';


$phone = str_replace('+7', '8', $_REQUEST['phone']);
$phone = str_replace([' ', '-'], '', $phone);

$requestFields = "";

foreach ($_REQUEST as $key => $value)
{
    $requestFields .= "{$key} - {$value} \r\n";
}

$postData = [

    'LOGIN' => 'k.kabakov',
    'PASSWORD' => '11Q09w93E.',
    'TITLE' => $_REQUEST['name'] ? $_REQUEST['name'].'(твой потолок)' : 'Новый лид с сайта твой потолок',
    'NAME' => $_REQUEST['name'],
    'PHONE_MOBILE' => $phone,
    'ASSIGNED_BY_ID' => $resp_id,
    'UF_CRM_1478533058' => $_REQUEST['city'],
    'UF_CRM_1488805923' => 'твой потолок',
    'SOURCE_ID' => 'WEB',
    'WEB'   =>  'твой потолок',
    'UF_CRM_1467050632' => 56,
    'SOURCE_DESCRIPTION'    =>  $_REQUEST['comment'],
    'COMMENTS' =>  $_REQUEST['comment'],
    'UF_CRM_1532512285' => $_SESSION['utm_source'] ?? '',
    'UF_CRM_1532512297' => $_SESSION['utm_medium'] ?? '',
    'UF_CRM_1532512307' => $_SESSION['utm_campaign'] ?? '' ,
    'UF_CRM_1533820950' => $_SESSION['utm_content'] ?? '' ,
    'UF_CRM_1533820976' => $_SESSION['utm_term'] ?? '',
    'UF_CRM_1533821072' => $_SESSION['adposition'] ?? '' ,
    'UF_CRM_1533821003' => $_SESSION['placement'] ?? '',
    'UF_CRM_1533821112' => $_SESSION['keyword'] ?? '' ,
    'UF_CRM_1532516558' => $_SESSION['referer'] ?? ''
    
];

var_dump($postData, $_SESSION);
$context = stream_context_create([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false
    ]
]);
$fp = stream_socket_client('ssl://bitrix-ts.ru:443', $errno, $errstr, ini_get("default_socket_timeout"), STREAM_CLIENT_CONNECT, $context);
    if ($fp)
    {
        // prepare POST data
        $strPostData = '';
        foreach ($postData as $key => $value)
            $strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);

        // prepare POST headers
        $str = "POST /crm/configs/import/lead.php HTTP/1.0 \r\n";
        $str .= "Host: bitrix-ts.ru \r\n";
        $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $str .= "Content-Length: ".strlen($strPostData)."\r\n";
        $str .= "Connection: close\r\n\r\n";

        $str .= $strPostData;

        // send POST to CRM
        fwrite($fp, $str);

        // get CRM headers
        $result = '';
        while (!feof($fp))
        {
            $result .= fgets($fp, 128);
        }
        fclose($fp);

        // cut response headers
        $response = explode("\r\n\r\n", $result);
    }
    else
    {
        echo 'Connection Failed! '.$errstr.' ('.$errno.')';
    }
?>