<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 홈택스수집 정액제 서비스 신청 페이지의 팝업 URL을 반환합니다.
     * - 반환되는 URL은 보안 정책상 30초 동안 유효하며, 시간을 초과한 후에는 해당 URL을 통한 페이지 접근이 불가합니다.
     * - https://developers.popbill.com/reference/htcashbill/php/api/point#GetFlatRatePopUpURL
     */

    include 'common.php';

    // 팝빌회원 사업자 번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $url = $HTCashbillService->GetFlatRatePopUpURL($CorpNum, $UserID);
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
                <legend>정액제 서비스 신청 URL</legend>
                <ul>
                    <?php
                        if ( isset ( $url ) ) {
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
