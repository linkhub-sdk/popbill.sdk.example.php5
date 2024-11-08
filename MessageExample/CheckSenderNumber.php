<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
     /**
     * 문자 발신번호 등록여부를 확인합니다.
     * - 발신번호 상태가 '승인'인 경우에만 리턴값 'Response'의 변수 'code'가 1로 반환됩니다.
     * - https://developers.popbill.com/reference/sms/php/api/sendnum#CheckSenderNumber
     */

    include 'common.php';

    // 팝빌회원 사업자번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 확인할 발신번호
    $SenderNumber = '';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $Response = $MessagingService->CheckSenderNumber($CorpNum ,$SenderNumber, $UserID);
        $code = $Response->code;
        $message = $Response->message;
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
                <legend> 발신번호 등록확인 </legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
