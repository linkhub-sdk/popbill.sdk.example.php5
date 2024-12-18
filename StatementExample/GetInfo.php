<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 전자명세서의 1건의 상태 및 요약정보 확인합니다.
     * - https://developers.popbill.com/reference/statement/php/api/info#GetInfo
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    // 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
    $itemCode = '121';

    // 문서번호
    $MgtKey = '20230102-PHP5-001';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $StatementService->GetInfo($CorpNum, $itemCode, $MgtKey, $UserID);
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
                <legend>전자명세서 요약 및 상태정보 확인</legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
                    ?>
                            <li>code (응답 코드) : <?php echo $code ?></li>
                            <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                    ?>
                            <li>itemCode (명세서 코드) : <?php echo $result->itemCode ?></li>
                            <li>itemKey (팝빌번호) : <?php echo $result->itemKey ?></li>
                            <li>invoiceNum (팝빌승인번호) : <?php echo $result->invoiceNum ?></li>
                            <li>mgtKey (파트너 문서번호) : <?php echo $result->mgtKey ?></li>
                            <li>taxType (과세형태) : <?php echo $result->taxType ?></li>
                            <li>writeDate (작성일자) : <?php echo $result->writeDate ?></li>
                            <li>regDT (임시저장일시) : <?php echo $result->regDT ?></li>
                            <li>senderCorpName (발신자 상호) : <?php echo $result->senderCorpName ?></li>
                            <li>senderCorpNum (발신자 사업자번호) : <?php echo $result->senderCorpNum ?></li>
                            <li>senderPrintYN (발신자 인쇄여부) : <?php echo $result->senderPrintYN ? 'true' : 'false' ?></li>
                            <li>receiverCorpName (수신자 상호) : <?php echo $result->receiverCorpName ?></li>
                            <li>receiverCorpNum (수신자 사업자번호) : <?php echo $result->receiverCorpNum ?></li>
                            <li>receiverPrintYN (수신자 인쇄여부) : <?php echo $result->receiverPrintYN ? 'true' : 'false' ?></li>
                            <li>supplyCostTotal (공급가액 합계) : <?php echo $result->supplyCostTotal ?></li>
                            <li>taxTotal (세액 합계) : <?php echo $result->taxTotal ?></li>
                            <li>purposeType (영수/청구) : <?php echo $result->purposeType ?></li>
                            <li>issueDT (발행일시) : <?php echo $result->issueDT ?></li>
                            <li>stateCode (상태코드) : <?php echo $result->stateCode ?></li>
                            <li>stateDT (상태 변경일시) : <?php echo $result->stateDT ?></li>
                            <li>stateMemo (상태메모) : <?php echo $result->stateMemo ?></li>
                            <li>openYN (개봉 여부) : <?php echo $result->openYN ? 'true' : 'false' ?></li>
                            <li>openDT (개봉 일시) : <?php echo $result->openDT ?></li>
                    <?php
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
