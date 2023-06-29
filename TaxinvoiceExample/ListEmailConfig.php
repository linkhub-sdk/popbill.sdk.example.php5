<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 세금계산서 관련 메일 항목에 대한 발송설정을 확인합니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/etc#ListEmailConfig
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    try {
        $result = $TaxinvoiceService->ListEmailConfig($CorpNum);
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
                <legend>알림메일 전송목록 조회</legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
                    ?>
                        <li>code (응답 코드) : <?php echo $code ?></li>
                        <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                            for($i=0; $i<Count($result); $i++){
                                if ($result[$i]->emailType == "TAX_ISSUE") {
                    ?>
                                    <li>[정발행] TAX_ISSUE(공급받는자에게 전자세금계산서 발행 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_ISSUE_INVOICER") {
                            ?>
                                    <li>[정발행] TAX_ISSUE_INVOICER(공급자에게 전자세금계산서 발행 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_CHECK") {
                            ?>
                                    <li>[정발행] TAX_CHECK(공급자에게 전자세금계산서 수신확인 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_CANCEL_ISSUE") {
                            ?>
                                    <li>[정발행] TAX_CANCEL_ISSUE(공급받는자에게 전자세금계산서 발행취소 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_REQUEST") {
                            ?>
                                    <li>[역발행] TAX_REQUEST(공급자에게 세금계산서를 발행요청 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_CANCEL_REQUEST") {
                            ?>
                                    <li>[역발행] TAX_CANCEL_REQUEST(공급받는자에게 세금계산서 취소 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_REFUSE") {
                            ?>
                                    <li>[역발행] TAX_REFUSE(공급받는자에게 세금계산서 거부 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_TRUST_ISSUE") {
                            ?>
                                    <li>[위수탁발행] TAX_TRUST_ISSUE(공급받는자에게 전자세금계산서 발행 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_TRUST_ISSUE_TRUSTEE") {
                            ?>
                                    <li>[위수탁발행] TAX_TRUST_ISSUE_TRUSTEE(수탁자에게 전자세금계산서 발행 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_TRUST_ISSUE_INVOICER") {
                            ?>
                                    <li>[위수탁발행] TAX_TRUST_ISSUE_INVOICER(공급자에게 전자세금계산서 발행 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_TRUST_CANCEL_ISSUE") {
                            ?>
                                    <li>[위수탁발행] TAX_TRUST_CANCEL_ISSUE(공급받는자에게 전자세금계산서 발행취소 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_TRUST_CALCEL_ISSUE_INVOICER") {
                            ?>
                                    <li>[위수탁발행] TAX_TRUST_CALCEL_ISSUE_INVOICER(공급자에게 전자세금계산서 발행취소 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_CLOSEDOWN") {
                            ?>
                                    <li>[처리결과] TAX_CLOSEDOWN(거래처의 휴폐업 여부 확인 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "TAX_NTSFAIL_INVOICER") {
                            ?>
                                    <li>[처리결과] TAX_NTSFAIL_INVOICER(전자세금계산서 국세청 전송실패 안내 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "ETC_CERT_EXPIRATION") {
                        ?>
                                    <li>[정기발송] ETC_CERT_EXPIRATION(팝빌에서 이용중인 공인인증서의 갱신 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                        <?php
                                }
                            }
                        }
                        ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
