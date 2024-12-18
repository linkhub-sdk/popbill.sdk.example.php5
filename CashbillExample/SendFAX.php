<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 현금영수증을 팩스로 전송하는 함수로, 팝빌 사이트 [문자·팩스] > [팩스] > [전송내역] 메뉴에서 전송결과를 확인 할 수 있습니다.
     * - 팩스 전송 요청시 포인트가 차감됩니다. (전송실패시 환불처리)
     * - https://developers.popbill.com/reference/cashbill/php/api/etc#SendFAX
     */

    include 'common.php';

    // 팝빌회원 사업자번호, "-" 제외 10자리
    $CorpNum = '1234567890';

    // 문서번호
    $MgtKey = '20230102-PHP5-001';

    // 발신번호
    $sender = '';

    // 수신팩스번호
    $receiver = '';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $CashbillService->SendFAX($CorpNum, $MgtKey, $sender, $receiver, $UserID);
        $code = $result->code;
        $message = $result->message;
    }
    catch(PopbillException $pe) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
    <body>
        <div id="content">
            <p class="heading1">Response</p>
            <br/>
            <fieldset class="fieldset1">
                <legend>현금영수증 팩스전송</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
