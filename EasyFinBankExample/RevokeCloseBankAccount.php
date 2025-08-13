<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /*
    * 신청한 정액제 해지요청을 취소합니다.
    * - https://developers.popbill.com/reference/easyfinbank/php/api/manage#RevokeCloseBankAccount
    */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 기관코드
    $bankCode = '';

    // 계좌번호
    $accountNumber = '';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $EasyFinBankService->RevokeCloseBankAccount($CorpNum, $bankCode, $accountNumber, $UserID);
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
                <legend>정액제 해지요청 취소</legend>
                 <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
