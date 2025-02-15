<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
/**
 * 다수건의 현금영수증 상태 및 요약 정보를 확인합니다. (1회 호출 시 최대 1,000건 확인 가능)
 * - 리턴값 'CashbillInfo'의 변수 'stateCode'를 통해 현금영수증의 상태코드를 확인합니다.
 * - 현금영수증 상태코드 [https://developers.popbill.com/reference/cashbill/php/response-code]
 * - https://developers.popbill.com/reference/cashbill/php/api/info#GetInfos
 */

include 'common.php';

// 팝빌회원 사업자번호
$CorpNum = '1234567890';

// 문서번호 배열, 최대 1,000건
$MgtKeyList = array(
    '20241101-002',
    '20230102-PHP5-011',
);

try {
    $result = $CashbillService->GetInfos($CorpNum, $MgtKeyList);
} catch (PopbillException $pe) {
    $code = $pe->getCode();
    $message = $pe->getMessage();
}
?>

<body>
    <div id="content">
        <p class="heading1">Response</p>
        <br />
        <fieldset class="fieldset1">
            <legend>현금영수증 상태/요약정보 확인 - 대량</legend>
            <ul>
                <?php
                if (isset($code)) {
                ?>
                <li>code (응답 코드) : <?php echo $code ?></li>
                <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                } else {
                    for ($i = 0; $i < Count($result); $i++) {
                    ?>
                        <fieldset class="fieldset2">
                            <legend> 현금영수증 상태/요약정보[<?php echo $i + 1 ?>]</legend>
                            <ul>
                                <li>itemKey (팝빌번호) : <?php echo $result[$i]->itemKey ?></li>
                                <li>mgtKey (문서번호) : <?php echo $result[$i]->mgtKey ?></li>
                                <li>tradeDate (거래일자) : <?php echo $result[$i]->tradeDate ?></li>
                                <li>tradeDT (거래일시) : <?php echo $result[$i]->tradeDT ?></li>
                                <li>tradeType (문서형태) : <?php echo $result[$i]->tradeType ?></li>
                                <li>tradeUsage (거래구분) : <?php echo $result[$i]->tradeUsage ?></li>
                                <li>tradeOpt (거래유형) : <?php echo $result[$i]->tradeOpt ?></li>
                                <li>taxationType (과세형태) : <?php echo $result[$i]->taxationType ?></li>
                                <li>totalAmount (거래금액) : <?php echo $result[$i]->totalAmount ?></li>
                                <li>supplyCost (공급가액) : <?php echo $result[$i]->supplyCost ?></li>
                                <li>tax (부가세) : <?php echo $result[$i]->tax ?></li>
                                <li>serviceFee (봉사료) : <?php echo $result[$i]->serviceFee ?></li>        
                                <li>issueDT (발행일시) : <?php echo $result[$i]->issueDT ?></li>
                                <li>regDT (등록일시) : <?php echo $result[$i]->regDT ?></li>
                                <li>stateCode (상태코드) : <?php echo $result[$i]->stateCode ?></li>
                                <li>stateDT (상태변경일시) : <?php echo $result[$i]->stateDT ?></li>
                                <li>identityNum (식별번호) : <?php echo $result[$i]->identityNum ?></li>
                                <li>itemName (주문상품명) : <?php echo $result[$i]->itemName ?></li>
                                <li>orderNumber (주문번호) : <?php echo $result[$i]->orderNumber ?></li>
                                <li>email (구매자(고객) 이메일) : <?php echo $result[$i]->email ?></li>
                                <li>hp (구매자(고객) 휴대폰) : <?php echo $result[$i]->hp ?></li>
                                <li>customerName (주문자명) : <?php echo $result[$i]->customerName ?></li>
                                <li>confirmNum (국세청승인번호) : <?php echo $result[$i]->confirmNum ?></li>
                                <li>orgConfirmNum (당초 승인 현금영수증 국세청승인번호) : <?php echo $result[$i]->orgConfirmNum ?></li>
                                <li>orgTradeDate (당초 승인 현금영수증 거래일자) : <?php echo $result[$i]->orgTradeDate ?></li>
                                <li>ntssendDT (국세청 전송일시) : <?php echo $result[$i]->ntssendDT ?></li>
                                <li>ntsresultDT (국세청 처리결과 수신일시) : <?php echo $result[$i]->ntsresultDT ?></li>
                                <li>ntsresultCode (국세청 처리결과 상태코드) : <?php echo $result[$i]->ntsresultCode ?></li>
                                <li>ntsresultMessage (국세청 처리결과 메시지) : <?php echo $result[$i]->ntsresultMessage ?></li>
                                <li>printYN (인쇄여부) : <?php echo $result[$i]->printYN ? 'true' : 'false' ?></li>
                                <li>interOPYN (연동문서 여부) : <?php echo $result[$i]->interOPYN ? 'true' : 'false' ?></li>
                            </ul>
                        </fieldset>
                <?php
                    }
                }
                ?>
            </ul>
        </fieldset>
    </div>
</body>

</html>