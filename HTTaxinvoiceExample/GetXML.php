<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 국세청 승인번호를 통해 수집한 전자세금계산서 1건의 상세정보를 XML 형태의 문자열로 반환합니다.
     * - https://developers.popbill.com/reference/httaxinvoice/php/api/search#GetXML
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 국세청 승인번호
    $NTSConfirmNum = '20220324888888880000277c';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $HTTaxinvoiceService->GetXML($CorpNum, $NTSConfirmNum, $UserID);
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
                            <li>ResultCode (응답코드) : <?php echo $result->ResultCode ?></li>
                            <li>Message (국세청승인번호) : <?php echo $result->Message ?></li>
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
