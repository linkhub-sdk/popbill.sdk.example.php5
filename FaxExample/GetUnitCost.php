<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 팩스 전송시 과금되는 포인트 단가를 확인합니다.
     * - https://developers.popbill.com/reference/fax/php/api/point#GetUnitCost
     */

    include 'common.php';

    // 팝빌회원 사업자 번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 수신번호 유형 : "일반" / "지능" 중 택 1
    // └ 일반망 : 지능망을 제외한 번호
    // └ 지능망 : 030*, 050*, 070*, 080*, 대표번호
    $receiveNumType = '일반';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $unitCost= $FaxService->GetUnitCost($CorpNum, $receiveNumType, $UserID);
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
                <legend>팩스 전송단가 확인</legend>
                <ul>
                    <?php
                        if ( isset($unitCost) ) {
                    ?>
                            <li>unitCost (팩스 전송단가) : <?php echo $unitCost ?></li>
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
