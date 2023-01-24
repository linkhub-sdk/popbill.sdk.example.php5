<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 팝빌 팩스 API 서비스 과금정보를 확인합니다.
     * - https://developers.popbill.com/reference/fax/php/api/point#GetChargeInfo
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $testCorpNum = '1234567890';

    // 팝빌회원 아이디
    $testUserID = 'testkorea';

    // 수신번호 유형 : "일반" / "지능" 중 택 1
    // └ 일반망 : 지능망을 제외한 번호
    // └ 지능망 : 030*, 050*, 070*, 080*, 대표번호
    $receiveNumType = '지능';

    try {
        $result = $FaxService->GetChargeInfo($testCorpNum, $testUserID, $receiveNumType);
    }
    catch (PopbillException $pe) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
    <body>
        <div id="content">
            <p class="heading1">Response</p>
            <br/>
            <fieldset class="fieldset1">
                <legend>과금정보 확인</legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
                    ?>
                        <li>Response.code : <?php echo $code ?> </li>
                        <li>Response.message : <?php echo $message ?></li>
                    <?php
                        } else {
                    ?>
                        <li>unitCost(전송단가) : <?php echo $result->unitCost ?></li>
                        <li>chargeMethod(과금유형) : <?php echo $result->chargeMethod ?></li>
                        <li>rateSystem(과금제도) : <?php echo $result->rateSystem ?></li>
                    <?php
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
