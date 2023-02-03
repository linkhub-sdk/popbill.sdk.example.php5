<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 최대 90byte의 단문(SMS) 메시지 1건 전송을 팝빌에 접수합니다.
     * - https://developers.popbill.com/reference/sms/php/api/send#SendSMS
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    // 예약전송일시(yyyyMMddHHmmss) null인 경우 즉시전송
    $reserveDT = '';

    // 광고성 메시지 여부 ( true , false 중 택 1)
    // └ true = 광고 , false = 일반
    $adsYN = false;

    // 전송요청번호
    // 팝빌이 접수 단위를 식별할 수 있도록 파트너가 할당한 식별번호.
    // 1~36자리로 구성. 영문, 숫자, 하이픈(-), 언더바(_)를 조합하여 팝빌 회원별로 중복되지 않도록 할당.
    $requestNum = '';

    $Messages[] = array(
        'snd'   => '',		        // 발신번호
        'sndnm' => '발신자명',		 // 발신자명
        'rcv'   => '',			    // 수신번호
        'rcvnm' => '수신자성명',	 // 수신자성명
        'msg'	=> '안녕하세요.',	 // 개별 메시지 내용
        'sjt'   => '메시지 제목',    // SMS 사용 불가, 미입력시 팝빌에서 설정한 기본값 사용
        'interOPRefKey' => '',      // SMS/LMS/MMS 대량/동보전송시 파트너가 개별건마다 입력할 수 있는 값
    );

    try {
        $receiptNum = $MessagingService->SendSMS($testCorpNum, '', '', $Messages, $reserveDT, $adsYN, '', '', '', $requestNum);
    } catch(PopbillException $pe) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
    <body>
        <div id="content">
            <p class="heading1">Response</p>
            <br/>
            <fieldset class="fieldset1">
                <legend>단문문자 1건 전송</legend>
                <ul>
                    <?php
                        if ( isset($receiptNum) ) {
                    ?>
                            <li>receiptNum (접수번호) : <?php echo $receiptNum?></li>
                    <?php
                        } else {
                    ?>
                            <li>Response.code : <?php echo $code ?> </li>
                            <li>Response.message : <?php echo $message ?></li>
                    <?php
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
