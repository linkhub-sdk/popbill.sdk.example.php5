<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 팝빌에 등록한 연동회원의 문자 발신번호 목록을 확인합니다.
     * - https://developers.popbill.com/reference/sms/php/api/sendnum#GetSenderNumberList
     */

    include 'common.php';

    // 팝빌회원 사업자번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    try {
        $result = $MessagingService->GetSenderNumberList($testCorpNum);
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
            <legend>문자 발신번호 목록 확인</legend>

            <?php
            if ( isset( $result ) ) {
                for ( $i = 0; $i < Count ( $result ) ; $i++) {
            ?>
                    <fieldset class="fieldset2">
                        <ul>
                            <li>number (발신번호) : <?php echo $result[$i]->number ?></li>
                            <li>representYN (대표번호 지정여부) : <?php echo $result[$i]->representYN ? 'true' : 'false' ?></li>
                            <li>state (등록상태) : <?php echo $result[$i]->state ?></li>
                            <li>memo (메모) : <?php echo $result[$i]->memo ?></li>
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
        </fieldset>
    </div>
    </body>
</html>
