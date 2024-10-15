<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 최대 2,000byte의 장문(LMS) 메시지 1건 전송을 팝빌에 접수합니다.
     *  - https://developers.popbill.com/reference/sms/php/api/send#SendLMS
     */

    include 'common.php';

    // 팝빌회원 사업자번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 팝빌에 사전 등록된 발신번호
    // 단건전송, 동보전송 경우 사용
    $Sender = '';

    // 메시지 제목
    // 단건전송, 동보전송 경우 사용
    $Subject = '';

    // 메시지 내용
    // 단건전송, 동보전송 경우 사용
    $Content = '';

    // 문자전송정보
    $Messages[] = array(
        'rcv' => '',			   // 수신번호
        'rcvnm' => '수신자성명',    // 수신자 성명
        'interOPRefKey' => ''      // SMS/LMS/MMS 대량/동보전송시 파트너가 개별건마다 입력할 수 있는 값
    );

    // 예약전송일시(yyyyMMddHHmmss), null인경우 즉시전송
    $ReserveDT = null;

    // 광고성 메시지 여부 ( true , false 중 택 1)
    // └ true = 광고 , false = 일반
    $adsYN = false;

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    // 발신자명
    // 단건전송, 동보전송 경우 사용
    $senderName = '';

    $SystemYN = false;

    // 전송요청번호
    // 팝빌이 접수 단위를 식별할 수 있도록 파트너가 할당한 식별번호.
    // 1~36자리로 구성. 영문, 숫자, 하이픈(-), 언더바(_)를 조합하여 팝빌 회원별로 중복되지 않도록 할당.
    $RequestNum = null;

    try {
        $receiptNum = $MessagingService->SendLMS($CorpNum, $Sender, $Subject, $Content, $Messages, $ReserveDT, $adsYN, $UserID, $senderName, $SystemYN, $RequestNum);
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
                <legend>장문문자 전송</legend>
                <ul>
                    <?php
                        if ( isset($receiptNum) ) {
                    ?>
                            <li>receiptNum (접수번호) : <?php echo $receiptNum?></li>
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
