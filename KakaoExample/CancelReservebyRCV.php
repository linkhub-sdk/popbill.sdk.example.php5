<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 팝빌에서 반환받은 접수번호와 수신번호를 통해 예약접수된 문자 메시지 전송을 취소합니다. (예약시간 10분 전까지 가능)
     * - https://developers.popbill.com/reference/kakaotalk/php/api/send#CancelReservebyRCV
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    // 예약문자전송 요청시 발급받은 접수번호
    $ReceiptNum = '022102017000000019';

    // 예약문자전송 요청시 입력한 수신번호
    $ReceiveNum = '01011112222';

    // 팝빌 회원 아이디
    $testUserID = 'testkorea';

    try {
        $result = $KakaoService->CancelReservebyRCV($testCorpNum ,$ReceiptNum, $ReceiveNum, $testUserID);
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
                <legend>예약전송 취소 </legend>
                <ul>
                    <li>Response.code : <?php echo $code ?></li>
                    <li>Response.message : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
