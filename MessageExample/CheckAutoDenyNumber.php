<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 팝빌회원에 등록된 080 수신거부 번호 정보를 확인합니다.
     * - https://developers.popbill.com/reference/sms/php/api/info#CheckAutoDenyNumber
     */

    include 'common.php';

    // 팝빌회원 사업자번호, "-"제외 10자리
    $CorpNum = '1234567890';

    $UserID = 'testkorea';

    try {
        $result = $MessagingService->CheckAutoDenyNumber($CorpNum, $UserID);
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
            <legend>080 수신거부목록 확인</legend>
            <ul>
                <?php
                if ( isset( $result ) ) {
                ?>
                    <li>smsdenyNumber (전용 080 번호) : <?php echo $result->smsdenyNumber ?> </li>
                    <li>regDT (등록일시) : <?php echo $result->regDT ?> </li>
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
