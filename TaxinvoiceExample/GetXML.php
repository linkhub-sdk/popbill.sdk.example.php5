<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 전자세금계산서 1건의 상세정보를 XML로 반환합니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/info#GetXML
     */

    include 'common.php';

    // 팝빌 회원 사업자 번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
    $MgtKeyType = ENumMgtKeyType::SELL;

    // 문서번호
    $MgtKey = '20230102-PHP5-001';

    try {
        $result = $TaxinvoiceService->GetXML($CorpNum, $MgtKeyType, $MgtKey);
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
                <legend>상세정보 확인 - XML</legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
                    ?>
                            <li>code (응답 코드) : <?php echo $code ?></li>
                            <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                    ?>
                            <li>code (응답코드) : <?php echo $result->code ?></li>
                            <li>message (응답메시지) : <?php echo $result->message ?></li>
                            <li>retObject (전자세금계산서 XML문서) : <?php echo str_replace('<','&lt;', $result->retObject) ?></li>
                            <!-- Browser에서 xml문서를 출력하기 위해 '<' &lt로 치환하였습니다. -->
                  <?php
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
