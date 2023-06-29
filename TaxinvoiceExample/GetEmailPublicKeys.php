<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 전자세금계산서 유통사업자의 메일 목록을 확인합니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/etc#GetEmailPublicKeys
     */

    include 'common.php';

    // 팝빌 회원 사업자 번호, "-"제외 10자리
    $CorpNum = '1234567890';

    try {
        $emailList = $TaxinvoiceService->GetEmailPublicKeys($CorpNum);
    }
    catch ( PopbillException $pe ) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
    <body>
        <div id="content">
            <p class="heading1">Response</p>
            <br/>
            <fieldset class="fieldset1">
                <legend>유통사업자 메일 목록 확인</legend>
                <ul>
                    <?php
                        if ( isset($emailList) ) {
                            for ( $i = 0; $i < Count($emailList); $i++){
                    ?>
                             <fieldset class ="fieldset2">
                             <ul>
                    <?php
                                foreach ( $emailList[$i] as $key=>$val) {
                    ?>
                                    <li> <?php echo $key; ?> : <?php echo $val; ?> </li>
                    <?php
                                }
                    ?>
                            </ul>
                            </fieldset>
                    <?php
                            }
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
