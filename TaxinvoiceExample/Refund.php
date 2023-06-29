<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 연동회원 포인트를 환불 신청합니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/point#Refund
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    $RefundForm = new RefundForm();

    // 담당자명
    $RefundForm->contactname = '담당자명';

    // 담당자 연락처
    $RefundForm->tel = '01011112222';

    // 환불 신청 포인트
    $RefundForm->requestpoint = '100';

    // 계좌은행
    $RefundForm->accountbank = '국민';

    // 계좌번호
    $RefundForm->accountnum = '123123123-123';

    // 예금주
    $RefundForm->accountname = '테스트';

    // 환불사유
    $RefundForm->reason = '환불사유';

    // 팝빌 회원 아이디
    $UserID = 'testkorea';

    try	{
        $result = $TaxinvoiceService->Refund($CorpNum, $RefundForm);
        $code = $result->code;
        $message = $result->message;
        $refundCode = $result->refundCode;
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
                <?php
                if (isset($refundCode)) {
                ?>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                    <li>refundCode (환불 코드) : <?php echo $refundCode ?></li>
                <?php
                } else {
                ?>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                <?php
                }
                ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
