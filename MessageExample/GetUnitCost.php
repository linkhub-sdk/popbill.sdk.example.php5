<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
    /**
    * 문자 전송시 과금되는 포인트 단가를 확인합니다.
    * - https://developers.popbill.com/reference/sms/php/api/point#GetUnitCost
    */

    include 'common.php';

    // 팝빌회원 사업자 번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 문자 전송유형 ENumMessageType::SMS(단문), ENumMessageType::LMS(장문), ENumMessageType::MMS(포토)
    $messageType = ENumMessageType::SMS;

    try {
        $unitCost= $MessagingService->GetUnitCost($CorpNum, $messageType);
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
                <legend>문자메시지 전송단가 확인</legend>
                <ul>
                    <?php
                        if ( isset($unitCost) ) {
                    ?>
                            <li><?php echo $messageType ?> uniCost (전송단가) : <?php echo $unitCost ?></li>
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
