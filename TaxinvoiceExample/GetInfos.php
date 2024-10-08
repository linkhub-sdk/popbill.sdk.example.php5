<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 다수건의 세금계산서 상태 및 요약 정보를 확인합니다. (1회 호출 시 최대 1,000건 확인 가능)
     * - 리턴값 'TaxinvoiceInfo'의 변수 'stateCode'를 통해 세금계산서의 상태코드를 확인합니다.
     * - 세금계산서 상태코드 [https://developers.popbill.com/reference/taxinvoice/php/response-code]
     * - https://developers.popbill.com/reference/taxinvoice/php/api/info#GetInfos
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
    $MgtKeyType = ENumMgtKeyType::SELL;

    // 세금계산서 문서번호 배열, 최대 1,000건
    $MgtKeyList = array();
    array_push($MgtKeyList, "20230102-PHP5-001");
    array_push($MgtKeyList, '20230102-PHP5-002');

    try {
        $result = $TaxinvoiceService->GetInfos($CorpNum, $MgtKeyType, $MgtKeyList);
    }
    catch(PopbillException $pe) {
        $code= $pe->getCode();
        $message= $pe->getMessage();
    }
?>
    <body>
        <div id="content">
            <p class="heading1">Response</p>
            <br/>
            <fieldset class="fieldset1">
                <legend>세금계산서 요약정보 대량 확인</legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
                    ?>
                        <li>code (응답 코드) : <?php echo $code ?></li>
                        <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                            for ( $i = 0; $i < Count($result) ; $i++ ) {
                    ?>
                            <fieldset class="fieldset2">
                            <legend> 세금계산서 요약정보[<?php echo $i+1?>]</legend>
                            <ul>
                                <li>itemKey (팝빌번호) : <?php echo $result[$i]->itemKey ?></li>
                                <li>taxType (과세형태) : <?php echo $result[$i]->taxType ?></li>
                                <li>writeDate (작성일자) : <?php echo $result[$i]->writeDate ?></li>
                                <li>regDT (임시저장 일자) : <?php echo $result[$i]->regDT ?></li>
                                <li>issueType (발행형태) : <?php echo $result[$i]->issueType ?></li>
                                <li>supplyCostTotal (공급가액 합계): <?php echo $result[$i]->supplyCostTotal ?></li>
                                <li>taxTotal (세액 합계) : <?php echo $result[$i]->taxTotal ?></li>
                                <li>purposeType (영수/청구) : <?php echo $result[$i]->purposeType ?></li>
                                <li>issueDT (발행일시) : <?php echo $result[$i]->issueDT ?></li>
                                <li>lateIssueYN (지연발행 여부) : <?php echo $result[$i]->lateIssueYN ? 'true' : 'false' ?></li>
                                <li>preIssueDT (발행예정일시) : <?php echo $result[$i]->preIssueDT ?></li>
                                <li>openYN (개봉 여부) : <?php echo $result[$i]->openYN ? 'true' : 'false' ?></li>
                                <li>openDT (개봉 일시) : <?php echo $result[$i]->openDT ?></li>
                                <li>stateMemo (상태메모) : <?php echo $result[$i]->stateMemo ?></li>
                                <li>stateCode (상태코드) : <?php echo $result[$i]->stateCode ?></li>
                                <li>stateDT (상태변경일시) : <?php echo $result[$i]->stateDT ?></li>
                                <li>ntsconfirmNum (국세청승인번호) : <?php echo $result[$i]->ntsconfirmNum ?></li>
                                <li>ntsresult (국세청 전송결과) : <?php echo $result[$i]->ntsresult ?></li>
                                <li>ntssendDT (국세청 전송일시) : <?php echo $result[$i]->ntssendDT ?></li>
                                <li>ntsresultDT (국세청 결과 수신일시) : <?php echo $result[$i]->ntsresultDT ?></li>
                                <li>ntssendErrCode (전송실패 사유코드) : <?php echo $result[$i]->ntssendErrCode ?></li>
                                <li>modifyCode (수정 사유코드) : <?php echo $result[$i]->modifyCode ?></li>
                                <li>interOPYN (연동문서 여부) : <?php echo $result[$i]->interOPYN ? 'true' : 'false' ?></li>
                                <li>invoicerCorpName (공급자 상호) : <?php echo $result[$i]->invoicerCorpName ?></li>
                                <li>invoicerCorpNum (공급자 사업자번호) : <?php echo $result[$i]->invoicerCorpNum ?></li>
                                <li>invoicerMgtKey (공급자 문서번호) : <?php echo $result[$i]->invoicerMgtKey ?></li>
                                <li>invoicerPrintYN (공급자 인쇄여부) : <?php echo $result[$i]->invoicerPrintYN ? 'true' : 'false' ?></li>
                                <li>invoiceeCorpName (공급받는자 상호) : <?php echo $result[$i]->invoiceeCorpName ?></li>
                                <li>invoiceeCorpNum (공급받는자 사업자번호) : <?php echo $result[$i]->invoiceeCorpNum ?></li>
                                <li>invoiceeMgtKey (공급받는자 문서번호) : <?php echo $result[$i]->invoiceeMgtKey ?></li>
                                <li>invoiceePrintYN (공급받는자 인쇄여부) : <?php echo $result[$i]->invoiceePrintYN ? 'true' : 'false' ?></li>
                                <li>closeDownState (공급받는자 휴폐업상태) : <?php echo $result[$i]->closeDownState ?></li>
                                <li>closeDownStateDate (공급받는자 휴폐업일자) : <?php echo $result[$i]->closeDownStateDate ?></li>
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
