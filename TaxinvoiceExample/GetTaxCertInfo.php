<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 팝빌 인증서버에 등록된 공동인증서의 정보를 확인합니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/cert#GetTaxCertInfo
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    try {
        $result = $TaxinvoiceService->GetTaxCertInfo($CorpNum);
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
                <legend>인증서 정보 확인</legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
                    ?>
                        <li>code (응답 코드) : <?php echo $code ?></li>
                        <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                    ?>
                        <li>regDT (등록일시) : <?php echo $result->regDT ?></li>
                        <li>expireDT (만료일시) : <?php echo $result->expireDT ?></li>
                        <li>issuerDN (인증서 발급자 DN) : <?php echo $result->issuerDN ?></li>
                        <li>subjectDN (등록된 인증서 DN) : <?php echo $result->subjectDN ?></li>
                        <li>issuerName (인증서 종류) : <?php echo $result->issuerName ?></li>
                        <li>oid (OID) : <?php echo $result->oid ?></li>
                        <li>regContactName (등록 담당자 성명) : <?php echo $result->regContactName ?></li>
                        <li>regContactID (등록 담당자 아이디) : <?php echo $result->regContactID ?></li>
                    <?php
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
