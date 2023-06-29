<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 연동회원 포인트 무통장 입금신청내역 1건을 확인합니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/point#GetSettleResult
     */

    include 'common.php';

    // 팝빌회원 사업자번호
    $CorpNum = '1234567890';

    // paymentRequest 를 통해 얻은 settleCode.
    $settleCode = '202210040000000070';

    // 팝빌 회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $TaxinvoiceService->GetSettleResult($CorpNum, $settleCode, $UserID);
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
                <legend>입금신청 정보</legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
                    ?>
                            <li>code (응답 코드) : <?php echo $code ?></li>
                            <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                            {
                    ?>
                                <li>productType (결제 내용) : <?php echo $result->productType ?></li>
                                <li>productName (정액제 상품명) : <?php echo $result->productName ?></li>
                                <li>settleType (결제유형) : <?php echo $result->settleType ?></li>
                                <li>settlerName (담당자명) : <?php echo $result->settlerName ?></li>
                                <li>settlerEmail (담당자메일) : <?php echo $result->settlerEmail ?></li>
                                <li>settleCost (결제금액) : <?php echo $result->settleCost ?></li>
                                <li>settlePoint (충전포인트) : <?php echo $result->settlePoint ?></li>
                                <li>settleState (결제상태) : <?php echo $result->settleState ?></li>
                                <li>regDT (등록일시) : <?php echo $result->regDT ?></li>
                                <li>stateDT (상태일시) : <?php echo $result->stateDT ?></li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
