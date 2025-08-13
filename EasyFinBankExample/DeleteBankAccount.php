<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 등록된 계좌를 삭제합니다.
     * - 정액제가 아닌 종량제 이용 시에만 등록된 계좌를 삭제할 수 있습니다.
     * - 정액제 이용 시 정액제 해지요청(CloseBankAccount API) 함수를 사용하여 정액제를 해제할 수 있습니다.
     * - https://developers.popbill.com/reference/easyfinbank/php/api/manage#DeleteBankAccount
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    // 기관코드
    $bankCode = '';

    // 계좌번호 하이픈('-') 제외
    $accountNumber = '';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $EasyFinBankService->DeleteBankAccount($CorpNum, $bankCode, $accountNumber, $UserID);
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
                <legend>종량제 계좌 삭제</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
