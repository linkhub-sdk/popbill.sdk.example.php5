<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 홈택스수집 인증을 위해 팝빌에 등록된 전자세금계산서용 부서사용자 계정을 확인합니다.
     * - https://developers.popbill.com/reference/httaxinvoice/php/api/cert#CheckDeptUser
     */

    include 'common.php';

    // 사업자번호, "-"제외 10자리
    $CorpNum = '1234567890';

    try	{
        $result = $HTTaxinvoiceService->CheckDeptUser($CorpNum);
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
                <legend>부서사용자 등록정보 확인</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
