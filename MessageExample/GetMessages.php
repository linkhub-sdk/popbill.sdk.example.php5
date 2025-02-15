<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 팝빌에서 반환받은 접수번호를 통해 문자 전송상태 및 결과를 확인합니다.
     * - https://developers.popbill.com/reference/sms/php/api/info#GetMessages
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 문자전송 요청 시 발급받은 접수번호(receiptNum)
    $ReceiptNum = '022032409000000005';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $MessagingService->GetMessages($CorpNum, $ReceiptNum, $UserID);
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
                <legend>문자전송 내역 및 전송상태 확인 </legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
                    ?>
                            <li>code (응답 코드) : <?php echo $code ?></li>
                            <li>message (응답 메시지) : <?php echo $message ?></li>

                    <?php
                        } else {
                            for ($i = 0; $i < Count($result); $i++) {
                    ?>
                            <fieldset class="fieldset2">
                                <legend> 문자전송내역 조회 결과 [<?php echo $i+1 ?>/<?php echo Count($result)?>]</legend>
                                <ul>
                                    <li>subject (제목) : <?php echo $result[$i]->subject ?> </li>
                                    <li>content (메시지 내용) : <?php echo $result[$i]->content ?> </li>
                                    <li>type (메시지 유형) : <?php echo $result[$i]->type ?> </li>
                                    <li>sendNum (발신번호) : <?php echo $result[$i]->sendNum ?> </li>
                                    <li>senderName (발신자명) : <?php echo $result[$i]->senderName ?> </li>
                                    <li>receiveNum (수신번호) : <?php echo $result[$i]->receiveNum ?> </li>
                                    <li>receiveName (수신자명) : <?php echo $result[$i]->receiveName ?> </li>
                                    <li>receiptDT (접수일시) : <?php echo $result[$i]->receiptDT ?> </li>
                                    <li>sendDT (전송일시) : <?php echo $result[$i]->sendDT ?> </li>
                                    <li>resultDT (전송결과 수신일시) : <?php echo $result[$i]->resultDT ?> </li>
                                    <li>reserveDT (예약일시) : <?php echo $result[$i]->reserveDT ?> </li>
                                    <li>state (전송상태 코드) : <?php echo $result[$i]->state ?> </li>
                                    <li>result (전송결과 코드) : <?php echo $result[$i]->result ?> </li>
                                    <li>type (메시지 타입) : <?php echo $result[$i]->type ?> </li>
                                    <li>tranNet (전송처리 이동통신사명) : <?php echo $result[$i]->tranNet ?> </li>
                                    <li>receiptNum (접수번호) : <?php echo $result[$i]->receiptNum ?> </li>
                                    <li>requestNum (요청번호) : <?php echo $result[$i]->requestNum ?> </li>
                                    <li>interOPRefKey (파트너 지정키) : <?php echo $result[$i]->interOPRefKey ?> </li>
                                </ul>
                            </fieldset>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
