<?php

require_once '../Popbill/PopbillMessaging.php';

//링크아이디
$LinkID = 'TESTER';
//발급받은 비밀키. 유출에 주의하시기 바랍니다.
$SecretKey = 'SwWxqU+0TErBXy/9TVjIPEnI0VTUMMSQZtJf3Ed8q3I=';

//통신방식 기본은 CURL , curl 사용에 문제가 있을경우 STREAM 사용가능.
//STREAM 사용시에는 allow_fopen_url = on 으로 설정해야함.
define('LINKHUB_COMM_MODE','CURL');

$MessagingService = new MessagingService($LinkID,$SecretKey);

//테스트모드로 설정되면 test.popbill.com으로 연결됩니다.
//작업을 완료한 후에는 테스트모드설정을 해제하여 사용합니다. ex)아래 라인 주석처리하거나, false처리.
$MessagingService->IsTest(true);

?>
