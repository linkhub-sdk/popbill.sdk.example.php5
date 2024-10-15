<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 파트너가 할당한 전송 요청번호로 예약된 문자를 전송 취소합니다. (예약시간 10분 전까지 가능)
     * - https://developers.popbill.com/reference/sms/php/api/send#CancelReserveRN
     */

    include 'common.php';

    // 팝빌회원 사업자번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 예약문자전송 요청시 할당한 전송요청번호
    $RequestNum = '';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $MessagingService->CancelReserveRN($CorpNum ,$RequestNum, $UserID);
        $code = $result->code;
        $message = $result->message;
    }
    catch (PopbillException $pe) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
    <body>
        <div id="content">
            <p class="heading1">Response</p>
            <br/>
            <fieldset class="fieldset1">
                <legend>문자 예약전송 취소 </legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
