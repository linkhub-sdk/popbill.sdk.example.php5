<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 세금계산서 1건을 구버전 양식으로 인쇄하기 위한 페이지의 팝업 URL을 반환하며, 페이지내에서 인쇄 설정값을 "공급자" / "공급받는자" / "공급자+공급받는자"용 중 하나로 지정할 수 있습니다.
     * - 반환되는 URL은 보안 정책상 30초 동안 유효하며, 시간을 초과한 후에는 해당 URL을 통한 페이지 접근이 불가합니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/view#GetOldPrintURL
     */

    include 'common.php';

    // 팝빌회원 사업자 번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
    $MgtKeyType = ENumMgtKeyType::SELL;

    // 문서번호
    $MgtKey = '20230102-PHP5-001';

    // 팝빌 회원 아이디
    $UserID = 'testkorea';

    try {
        $url = $TaxinvoiceService->GetOldPrintURL($CorpNum, $MgtKeyType, $MgtKey, $UserID);
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
                <legend>세금계산서 구버전 양식 인쇄화면 URL</legend>
                <ul>
                    <?php
                        if ( isset($url) ) {
                    ?>
                        <li>url : <?php echo $url ?></li>
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
