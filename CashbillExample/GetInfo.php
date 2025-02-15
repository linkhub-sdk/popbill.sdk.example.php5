<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 현금영수증 1건의 상태 및 요약정보를 확인합니다.
     * - 리턴값 'CashbillInfo'의 변수 'stateCode'를 통해 현금영수증의 상태코드를 확인합니다.
     * - 현금영수증 상태코드 [https://developers.popbill.com/reference/cashbill/php/response-code]
     * - https://developers.popbill.com/reference/cashbill/php/api/info#GetInfo
     */

    include 'common.php';

    // 팝빌회원 사업자번호
    $CorpNum = '1234567890';

    // 문서번호
    $MgtKey = '20241101-002';

    try {
        $result = $CashbillService->GetInfo($CorpNum, $MgtKey);
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
                <legend>현금영수증 요약/상태정보 확인</legend>
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
                                <li>itemKey (팝빌번호) : <?php echo $result->itemKey ?></li>
                                <li>mgtKey (문서번호) : <?php echo $result->mgtKey ?></li>
                                <li>tradeDate (거래일자) : <?php echo $result->tradeDate ?></li>
                                <li>tradeDT (거래일시) : <?php echo $result->tradeDT ?></li>
                                <li>tradeType (문서형태) : <?php echo $result->tradeType ?></li>
                                <li>tradeUsage (거래구분) : <?php echo $result->tradeUsage ?></li>
                                <li>tradeOpt (거래유형) : <?php echo $result->tradeOpt ?></li>
                                <li>taxationType (과세형태) : <?php echo $result->taxationType ?></li>
                                <li>totalAmount (거래금액) : <?php echo $result->totalAmount ?></li>
                                <li>supplyCost (공급가액) : <?php echo $result->supplyCost ?></li>
                                <li>tax (부가세) : <?php echo $result->tax ?></li>
                                <li>serviceFee (봉사료) : <?php echo $result->serviceFee ?></li>  
                                <li>issueDT (발행일시) : <?php echo $result->issueDT ?></li>
                                <li>regDT (등록일시) : <?php echo $result->regDT ?></li>
                                <li>stateCode (상태코드) : <?php echo $result->stateCode ?></li>
                                <li>stateDT (상태변경일시) : <?php echo $result->stateDT ?></li>
                                <li>identityNum (식별번호) : <?php echo $result->identityNum ?></li>
                                <li>itemName (주문상품명) : <?php echo $result->itemName ?></li>
                                <li>orderNumber (주문번호) : <?php echo $result->orderNumber ?></li>
                                <li>email (구매자(고객) 이메일) : <?php echo $result->email ?></li>
                                <li>hp (구매자(고객) 휴대폰) : <?php echo $result->hp ?></li>
                                <li>customerName (주문자명) : <?php echo $result->customerName ?></li>
                                <li>confirmNum (국세청승인번호) : <?php echo $result->confirmNum ?></li>
                                <li>orgConfirmNum (당초 승인 현금영수증 국세청승인번호) : <?php echo $result->orgConfirmNum ?></li>
                                <li>orgTradeDate (당초 승인 현금영수증 거래일자) : <?php echo $result->orgTradeDate ?></li>
                                <li>ntssendDT (국세청 전송일시) : <?php echo $result->ntssendDT ?></li>
                                <li>ntsresultDT (국세청 처리결과 수신일시) : <?php echo $result->ntsresultDT ?></li>
                                <li>ntsresultCode (국세청 처리결과 상태코드) : <?php echo $result->ntsresultCode ?></li>
                                <li>ntsresultMessage (국세청 처리결과 메시지) : <?php echo $result->ntsresultMessage ?></li>
                                <li>printYN (인쇄여부) : <?php echo $result->printYN ? 'true' : 'false' ?></li>
                                <li>interOPYN (연동문서 여부) : <?php echo $result->interOPYN ? 'true' : 'false' ?></li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
