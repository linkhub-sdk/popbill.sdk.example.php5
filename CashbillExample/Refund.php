<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 환불을 신청합니다.
     * - https://docs.popbill.com/cashbill/php/api#Refund
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, '-' 제외 10자리
    $testCorpNum = '1234567890';

    $RefundForm = new RefundForm();

    // 담당자명
    $RefundForm->contactname = '담당자명';

    // 담당자 연락처
    $RefundForm->tel = '01011112222';

    // 환불 신청 포인트
    $RefundForm->requestpoint = '100';

    // 환불받을 계좌은행
    $RefundForm->accountbank = '국민';

    // 환불받은 계좌번호
    $RefundForm->accountnum = '123123123-123';

    // 환불받은 예금주
    $RefundForm->accountname = '테스트';

    // 환불사유
    $RefundForm->reason = '환불사유';


    try	{
        $result = $CashbillService->Refund($testCorpNum, $RefundForm);
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
                <legend>환불신청</legend>
                <ul>
                    <li>Response.code : <?php echo $code ?></li>
                    <li>Response.message : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
