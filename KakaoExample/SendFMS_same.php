<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 텍스트로 구성된 다수건의 친구톡 전송을 팝빌에 접수하며, 모든 수신자에게 동일 내용을 전송합니다. (최대 1,000건)
     * - 친구톡의 경우 야간 전송은 제한됩니다. (20:00 ~ 익일 08:00)
     * - 전송실패시 사전에 지정한 변수 'altSendType' 값으로 대체문자를 전송할 수 있고, 이 경우 문자(SMS/LMS) 요금이 과금됩니다.
     * - https://developers.popbill.com/reference/kakaotalk/php/api/send#SendFMS
     */

    include 'common.php';

    // 팝빌회원 사업자번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 팝빌에 등록된 카카오톡 검색용 아이디
    $plusFriendID = '@팝빌';

    // 팝빌에 사전 등록된 발신번호
    // altSendType = 'C' / 'A' 일 경우, 대체문자를 전송할 발신번호
    // altSendType = '' 일 경우, null 또는 공백 처리
    // ※ 대체문자를 전송하는 경우에는 사전에 등록된 발신번호 입력 필수
    $sender = null;

    // 친구톡 내용, 최대 400자
    $content = '친구톡 내용';

    // 대체문자 유형(altSendType)이 "A"일 경우, 대체문자로 전송할 내용 (최대 2000byte)
    // └ 팝빌이 메시지 길이에 따라 단문(90byte 이하) 또는 장문(90byte 초과)으로 전송처리
    $altContent = '대체문자 내용';

    // 대체문자 유형 (null , "C" , "A" 중 택 1)
    // null = 미전송, C = 알림톡과 동일 내용 전송 , A = 대체문자 내용(altContent)에 입력한 내용 전송
    $altSendType = 'A';

    // 광고성 메시지 여부 ( true , false 중 택 1)
    // └ true = 광고 , false = 일반
    // - 미입력 시 기본값 false 처리
    $adsYN = True;

    // 수신정보 배열, 최대 1,000건
    for($i=0; $i<10; $i++){
        $Messages[] = array(
            // 수신번호
            'rcv' => '',
            // 수신자명
            'rcvnm' => '수신자명'
        );
    }

    // 버튼배열, 최대 5개
    $Btns[] = array(
        // 버튼 표시명
        'n' => '웹링크',
        // 버튼 유형, WL-웹링크, AL-앱링크, MD-메시지 전달, BK-봇키워드
        't' => 'WL',
        // [앱링크] iOS, [웹링크] Mobile
        'u1' => 'http://www.popbill.com',
        // [앱링크] Android, [웹링크] PC URL
        'u2' => 'http://www.popbill.com'
    );

    // 예약전송일시, yyyyMMddHHmmss
    $ReserveDT = null;

    // 첨부이미지 파일 경로
    // 이미지 파일 규격: 전송 포맷 – JPG 파일 (.jpg, .jpeg), 용량 – 최대 500 Kbyte, 크기 – 가로 500px 이상, 가로 기준으로 세로 0.5~1.3배 비율 가능
    $files = array('./test0001.jpg');

    // 이미지 링크 URL
    // └ 수신자가 친구톡 상단 이미지 클릭시 호출되는 URL
    // 미입력시 첨부된 이미지를 링크 기능 없이 표시
    $imageURL = 'http://popbill.com';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    // 전송요청번호
    // 팝빌이 접수 단위를 식별할 수 있도록 파트너가 할당한 식별번호.
    // 1~36자리로 구성. 영문, 숫자, 하이픈(-), 언더바(_)를 조합하여 팝빌 회원별로 중복되지 않도록 할당.
    $RequestNum = null;

    // 대체문자 제목
    // 메시지 길이(90byte)에 따라 장문(LMS)인 경우에만 적용.
    $altSubject = '대체문자 제목';

    try {
        $receiptNum = $KakaoService->SendFMS($CorpNum, $plusFriendID, $sender,
            $content, $altContent, $altSendType, $adsYN, $Messages, $Btns, $ReserveDT, $files, $imageURL, $UserID, $RequestNum, $altSubject);
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
                <legend>친구톡(이미지) 동일내용 대량전송</legend>
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
