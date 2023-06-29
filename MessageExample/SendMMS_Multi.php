<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 최대 2,000byte의 메시지와 이미지로 구성된 포토문자(MMS) 다수건 전송을 팝빌에 접수합니다. (최대 1,000건)
     * - 모든 수신자에게 동일한 내용을 전송하거나(동보전송), 수신자마다 개별 내용을 전송할 수 있습니다(대량전송).
     * - 이미지 파일 포맷/규격 : 최대 300Kbyte(JPEG), 가로/세로 1,000px 이하 권장
     *  - https://developers.popbill.com/reference/sms/php/api/send#SendMMS
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 예약전송일시(yyyyMMddHHmmss) null인경우 즉시전송
    $ReserveDT = null;

    // 광고성 메시지 여부 ( true , false 중 택 1)
    // └ true = 광고 , false = 일반
    $adsYN = false;

    // 전송요청번호
    // 팝빌이 접수 단위를 식별할 수 있도록 파트너가 할당한 식별번호.
    // 1~36자리로 구성. 영문, 숫자, 하이픈(-), 언더바(_)를 조합하여 팝빌 회원별로 중복되지 않도록 할당.
    $RequestNum = '';

    // 전송정보 배열, 최대 1000건
    for ($i = 0; $i < 10; $i++){
        $Messages[] = array(
            'snd' => '',		// 발신번호
            'sndnm' => '발신자명',			// 발신자명
            'rcv' => '',			// 수신번호
            'rcvnm' => '수신자성명'.$i,	// 수신자성명
            'msg'	=> '개별 메시지 내용',	 // 개별 메시지 내용
            'sjt'	=> '개발 메시지 제목',	 // 개별 메시지 제목
            'interOPRefKey' => '20220705'.$i    // 파트너 지정키, 수신자 구별용 메모
        );
    }

    // 최대 300KByte, JPEG 파일포맷 전송가능
    $Files = array('./test.jpg');

    try {
        $receiptNum = $MessagingService->SendMMS($CorpNum, '', '', '', $Messages, $Files, $ReserveDT, $adsYN, '', '', '', $RequestNum);
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
                <legend>MMS 문자 전송</legend>
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
