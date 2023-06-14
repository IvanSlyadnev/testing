<?php
include 'session.php';
$_SESSION['data'] = [
    ['city' => 'Moscow'],
    ['city' => 'Kiev']
];
function printCities($cities) {
    $result = '';
    foreach ($cities as $city) {
        $result .= $city['city']. ' </br>';
    }
    return $result;
}
?>

<html>
    <head>
        <title>code</title>
    </head>
    <body>
        <?php foreach($_SESSION['data'] as $city){ ?>
            <tr>
                <h1><?=$city['city']?></h1>
            </tr>
        <?php } ?>
        <script type="text/javascript">
            var objXMLHttpRequest = new XMLHttpRequest();
                objXMLHttpRequest.responseType = 'JSON';
                objXMLHttpRequest.onload = function(data) {
                if(objXMLHttpRequest.readyState === 4) {
                    if(objXMLHttpRequest.status === 200) {
                        console.log(objXMLHttpRequest.responseText);
                        document.write(JSON.parse(objXMLHttpRequest.response));
                    } else {
                        alert('Error Code: ' +  objXMLHttpRequest.status);
                        alert('Error Message: ' + objXMLHttpRequest.statusText);
                    }
                }
            }
            objXMLHttpRequest.open('GET', 'test.php');
            console.log(objXMLHttpRequest.send());
        </script>
    </body>
</html>

