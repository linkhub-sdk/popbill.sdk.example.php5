<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 연동회원 포인트 충전을 위해 무통장입금을 신청합니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/point#PaymentRequest
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    $paymentForm = new PaymentForm();

    // 담당자명
    // 미입력 시 기본값 적용 - 팝빌 회원 담당자명.
    $paymentForm->settlerName = '담당자명';

    // 담당자 이메일
    // 사이트에서 신청하면 자동으로 담당자 이메일.
    // 미입력 시 공백 처리
    $paymentForm->settlerEmail = 'test@test.com';

    // 담당자 휴대폰
    // 무통장 입금 승인 알림톡이 전송됩니다.
    $paymentForm->notifyHP = '01012341234';

    // 입금자명
    $paymentForm->paymentName = '입금자명';

    // 결제금액
    $paymentForm->settleCost = '11000';

    // 팝빌 회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $TaxinvoiceService->PaymentRequest($CorpNum, $paymentForm, $UserID);
        $code = $result->code;
        $message = $result->message;
        $settleCode = $result->settleCode;
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
                <legend>무통장 입금신청</legend>
                <ul>
                    <li>code (응답코드) : <?php echo $code ?></li>
                    <li>message (응답메시지) : <?php echo $message ?></li>
                    <?php
                      if ( isset($settleCode) ) {
                    ?>
                      <li>settleCode (정산코드) : <?php echo $settleCode ?></li>
                    <?php
                      }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
