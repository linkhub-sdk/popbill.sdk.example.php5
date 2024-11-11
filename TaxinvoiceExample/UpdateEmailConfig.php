<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 세금계산서 관련 메일 항목에 대한 발송설정을 수정합니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/etc#UpdateEmailConfig
     *
     * 메일전송유형
     * [정발행]
     * TAX_ISSUE_INVOICER : 공급자에게 전자세금계산서 발행 사실을 안내하는 메일
     * TAX_CHECK : 공공급자에게 전자세금계산서 수신확인 사실을 안내하는 메일
     * TAX_CANCEL_ISSUE : 공급받는자에게 전자세금계산서 발행취소 사실을 안내하는 메일
     *
     * [역발행]
     * TAX_REQUEST : 공급자에게 전자세금계산서를 발행을 요청하는 메일
     * TAX_CANCEL_REQUEST : 공급받는자에게 전자세금계산서 취소 사실을 안내하는 메일
     * TAX_REFUSE : 공급받는자에게 전자세금계산서 거부 사실을 안내하는 메일
     * TAX_REVERSE_ISSUE : 공급받는자에게 전자세금계산서 발행 사실을 안내하는 메일
     *
     * [위수탁발행]
     * TAX_TRUST_ISSUE : 공급받는자에게 전자세금계산서 발행 사실을 안내하는 메일
     * TAX_TRUST_ISSUE_TRUSTEE : 수탁자에게 전자세금계산서 발행 사실을 안내하는 메일
     * TAX_TRUST_ISSUE_INVOICER : 공급자에게 전자세금계산서 발행 사실을 안내하는 메일
     * TAX_TRUST_CANCEL_ISSUE : 공급받는자에게 전자세금계산서 발행취소 사실을 안내하는 메일
     * TAX_TRUST_CANCEL_ISSUE_INVOICER : 공급자에게 전자세금계산서 발행취소 사실을 안내하는 메일
     *
     * [처리결과]
     * TAX_CLOSEDOWN : 거래처의 사업자등록상태(휴폐업)를 확인하여 안내하는 메일
     * TAX_NTSFAIL_INVOICER : 전자세금계산서 국세청 전송실패를 안내하는 메일
     *
     * [정기발송]
     * ETC_CERT_EXPIRATION : 팝빌에 등록된 인증서의 만료예정을 안내하는 메일
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 메일 전송 유형
    $emailType = 'TAX_ISSUE_INVOICER';

    // 전송 여부 (True = 전송, False = 미전송)
    $sendYN = True;

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $TaxinvoiceService->UpdateEmailConfig($CorpNum, $emailType, $sendYN, $UserID);

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
            <legend>알림메일 전송설정 수정</legend>
            <ul>
                <li>code (응답 코드) : <?php echo $code ?></li>
                <li>message (응답 메시지) : <?php echo $message ?></li>
            </ul>
        </fieldset>
     </div>
</body>
</html>
