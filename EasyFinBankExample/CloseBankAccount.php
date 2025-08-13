<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /*
    * 계좌의 정액제 해지를 요청합니다.
    * - https://developers.popbill.com/reference/easyfinbank/php/api/manage#CloseBankAccount
    */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 기관코드
    $bankCode = '';

    // 계좌번호
    $accountNumber = '';

    // 해지유형, “일반” 입력
    // 일반(일반해지) – 이용중인 정액제 기간 만료 후 해지
    $closeType = '';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $EasyFinBankService->CloseBankAccount($CorpNum, $bankCode, $accountNumber, $closeType, $UserID);
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
                <legend>정액제 해지요청</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
