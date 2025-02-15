<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
    * 팝빌에서 반환받은 접수번호를 통해 알림톡/친구톡 전송상태 및 결과를 확인합니다.
    * - https://developers.popbill.com/reference/kakaotalk/php/api/info#GetMessages
    */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 카카오톡 전송 요청 시 발급받은 접수번호(receiptNum)
    $ReceiptNum = '';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $KakaoService->GetMessages($CorpNum, $ReceiptNum, $UserID);
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
            <legend>카카오톡 전송내역 확인 </legend>
            <ul>
                <?php
                if ( isset($code) ) {
                    ?>
                <li>code (응답 코드) : <?php echo $code ?></li>
                <li>message (응답 메시지) : <?php echo $message ?></li>

                    <?php
                } else {
                    ?>
                    <ul>
                        <li>contentType (카카오톡 유형) : <?php echo $result->contentType ?> </li>
                        <li>templateCode (템플릿 코드) : <?php echo $result->templateCode ? $result->templateCode : '' ?> </li>
                        <li>plusFriendID (검색용 아이디) : <?php echo $result->plusFriendID ?> </li>
                        <li>sendNum (발신번호) : <?php echo $result->sendNum ?> </li>
                        <li>altSubject ([동보]대체문자 제목) : <?php echo $result->altSubject ?> </li>
                        <li>altContent ([동보]대체문자 내용) : <?php echo $result->altContent ?> </li>
                        <li>altSendType (대체문자 전송유형) : <?php echo $result->altSendType ?> </li>
                        <li>reserveDT (예약일시) : <?php echo $result->reserveDT ?> </li>
                        <li>adsYN (광고전송 여부) : <?php echo $result->adsYN ?> </li>
                        <li>imageURL (친구톡 이미지 URL) : <?php echo $result->imageURL ? $result->imageURL : '' ?> </li>
                        <li>sendCnt (전송건수) : <?php echo $result->sendCnt ?> </li>
                        <li>successCnt (성공건수) : <?php echo $result->successCnt ?> </li>
                        <li>failCnt (실패건수) : <?php echo $result->failCnt ?> </li>
                        <li>altCnt (대체문자 건수) : <?php echo $result->altCnt ?> </li>
                        <li>cancelCnt (취소건수) : <?php echo $result->cancelCnt ?> </li>
                    </ul>

                    <?php
                    for ($i = 0; $i < Count($result->btns); $i++) {
                        ?>
                        <fieldset class="fieldset2">
                            <legend> 버튼정보 [<?php echo $i+1 ?>/<?php echo Count($result->btns)?>]</legend>
                            <ul>
                                <li>n (버튼명) : <?php echo $result->btns[$i]->n ?> </li>
                                <li>t (버튼유형) : <?php echo $result->btns[$i]->t ?> </li>
                                <li>u1 (버튼링크1) : <?php echo $result->btns[$i]->u1 ?> </li>
                                <li>u2 (버튼링크2) : <?php echo $result->btns[$i]->u2 ?> </li>
                                <li>tg (아웃링크) : <?php echo $result->btns[$i]->tg ?> </li>
                            </ul>
                        </fieldset>
                        <?php
                    }

                    for ($i = 0; $i < Count($result->msgs); $i++) {
                        ?>
                        <fieldset class="fieldset2">
                            <legend> 개별 전송내역 [<?php echo $i+1 ?>/<?php echo Count($result->msgs)?>]</legend>
                            <ul>
                                <li>state (전송상태 코드) : <?php echo $result->msgs[$i]->state ?> </li>
                                <li>sendDT (전송일시) : <?php echo $result->msgs[$i]->sendDT ?> </li>
                                <li>result (전송결과 코드) : <?php echo $result->msgs[$i]->result ?> </li>
                                <li>resultDT (전송결과 수신일시) : <?php echo $result->msgs[$i]->resultDT ?> </li>
                                <li>contentType (카카오톡 유형) : <?php echo $result->msgs[$i]->contentType ?> </li>
                                <li>receiveNum (수신번호) : <?php echo $result->msgs[$i]->receiveNum ?> </li>
                                <li>receiveName (수신자명) : <?php echo $result->msgs[$i]->receiveName ?> </li>
                                <li>content (알림톡/친구톡 내용) : <?php echo $result->msgs[$i]->content ?> </li>
                                <li>altSubject (대체문자 제목) : <?php echo $result->msgs[$i]->altSubject ?> </li>
                                <li>altContent (대체문자 내용) : <?php echo $result->msgs[$i]->altContent ?> </li>
                                <li>altContentType (대체문자 전송유형) : <?php echo $result->msgs[$i]->altContentType ?> </li>
                                <li>altSendDT (대체문자 전송일시) : <?php echo $result->msgs[$i]->altSendDT ?> </li>
                                <li>altResult (대체문자 전송결과 코드) : <?php echo $result->msgs[$i]->altResult ?> </li>
                                <li>altResultDT (대체문자 전송결과 수신일시) : <?php echo $result->msgs[$i]->altResultDT ?> </li>
                                <li>receiptNum (접수번호) : <?php echo $result->msgs[$i]->receiptNum ?> </li>
                                <li>requestNum (요청번호) : <?php echo $result->msgs[$i]->requestNum ?> </li>
                                <li>interOPRefKey (파트너 지정키) : <?php echo $result->msgs[$i]->interOPRefKey ?> </li>
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
