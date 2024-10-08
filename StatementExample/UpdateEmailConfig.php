<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 전자명세서 관련 메일 항목에 대한 발송설정을 수정합니다.
     * - https://developers.popbill.com/reference/statement/php/api/etc#UpdateEmailConfig
     *
     * 메일전송유형
     * - SMT_ISSUE : 수신자에게 전자명세서가 발행 되었음을 알려주는 메일입니다.
     * - SMT_ACCEPT : 발신자에게 전자명세서가 승인 되었음을 알려주는 메일입니다.
     * - SMT_DENY : 발신자에게 전자명세서가 거부 되었음을 알려주는 메일입니다.
     * - SMT_CANCEL : 수신자에게 전자명세서가 취소 되었음을 알려주는 메일입니다.
     * - SMT_CANCEL_ISSUE : 수신자에게 전자명세서가 발행취소 되었음을 알려주는 메일입니다.
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 메일 전송 유형
    $emailType = 'SMT_ISSUE';

    // 전송 여부 (True = 전송, False = 미전송)
    $sendYN = True;

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $StatementService->UpdateEmailConfig($CorpNum, $emailType, $sendYN, $UserID);

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
                <legend>알림메일 전송설정 수정</legend>
             <ul>
                <li>code (응답 코드) : <?php echo $code ?></li>
                <li>message (응답 메시지) : <?php echo $message ?></li>
             </ul>
          </fieldset>
        </div>
    </body>
</html>
