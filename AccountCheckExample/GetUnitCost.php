<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 예금주 조회시 과금되는 포인트 단가를 확인합니다.
     * - https://developers.popbill.com/reference/accountcheck/php/common-api/point#GetUnitCost
     */

    include 'common.php';

    // 팝빌회원 사업자번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 서비스 유형 ("성명" / "실명" 중 택 1 , 성명 = 예금주성명조회, 실명 = 예금주실명조회)
    $serviceType = "성명";

    // 팝빌회원 아이디
    $UserID = "testkorea";

    try {
        $unitCost = $AccountCheckService->GetUnitCost($CorpNum, $serviceType, $UserID);
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
                <legend>예금주조회 단가확인</legend>
                <ul>
                    <?php
                        if ( isset($unitCost) ) {
                    ?>
                        <li>unitCost (조회단가) : <?php echo $unitCost ?></li>
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
