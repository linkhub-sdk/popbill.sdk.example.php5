<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 전자명세서 관련 메일 항목에 대한 발송설정을 확인합니다.
     * - https://developers.popbill.com/reference/statement/php/api/etc#ListEmailConfig
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $StatementService->ListEmailConfig($CorpNum, $UserID);
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
                <legend>알림메일 전송목록 조회</legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
                    ?>
                        <li>code (응답 코드) : <?php echo $code ?></li>
                        <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                            for($i=0; $i<Count($result); $i++){
                                if ($result[$i]->emailType == "SMT_ISSUE") {
                    ?>
                                    <li>SMT_ISSUE(수신자에게 전자명세서가 발행 되었음을 알려주는 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "SMT_ACCEPT") {
                            ?>
                                    <li>SMT_ACCEPT(발신자에게 전자명세서가 승인 되었음을 알려주는 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "SMT_DENY") {
                            ?>
                                    <li>SMT_DENY(발신자에게 전자명세서가 거부 되었음을 알려주는 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "SMT_CANCEL") {
                            ?>
                                    <li>SMT_CANCEL(수신자에게 전자명세서가 취소 되었음을 알려주는 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                            <?php
                                }
                                if ($result[$i]->emailType == "SMT_CANCEL_ISSUE") {
                        ?>
                                    <li>SMT_CANCEL_ISSUE(수신자에게 전자명세서가 발행취소 되었음을 알려주는 메일 전송 여부) : <?php echo $result[$i]->sendYN ? 'true' : 'false' ?></li>
                        <?php
                                }
                            }
                        }
                        ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
