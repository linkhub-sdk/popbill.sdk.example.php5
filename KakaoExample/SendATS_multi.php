<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 승인된 템플릿의 내용을 작성하여 다수건의 알림톡 전송을 팝빌에 접수하며, 수신자 별로 개별 내용을 전송합니다. (최대 1,000건)
     * - 사전에 승인된 템플릿의 내용과 알림톡 전송내용(content)이 다를 경우 전송실패 처리됩니다.
     * - 전송실패시 사전에 지정한 변수 'altSendType' 값으로 대체문자를 전송할 수 있고, 이 경우 문자(SMS/LMS) 요금이 과금됩니다.
     * - https://docs.popbill.com/kakao/php/api#SendATS
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    // 팝빌회원 아이디
    $testUserID = 'testkorea';

    // 승인된 알림톡 템플릿코드
    // └ 알림톡 템플릿 관리 팝업 URL(GetATSTemplateMgtURL API) 함수, 알림톡 템플릿 목록 확인(ListATStemplate API) 함수를 호출하거나
    //   팝빌사이트에서 승인된 알림톡 템플릿 코드를  확인 가능.
    $templateCode = '019020000163';

    // 팝빌에 사전 등록된 발신번호
    $sender = '';

    // 대체문자 유형 (null , "C" , "A" 중 택 1)
    // null = 미전송, C = 알림톡과 동일 내용 전송 , A = 대체문자 내용(altContent)에 입력한 내용 전송
    $altSendType = 'A';

    // 대체문자 제목
    // - 메시지 길이(90byte)에 따라 장문(LMS)인 경우에만 적용.
    // - 수신정보 배열에 대체문자 제목이 입력되지 않은 경우 적용.
    // - 모든 수신자에게 다른 제목을 보낼 경우 70번 라인에 있는 altsjt 를 이용.
    $altSubject = '대체문자 제목';

    // 예약전송일시, yyyyMMddHHmmss
    $reserveDT = null;

    // 전송요청번호
    // 팝빌이 접수 단위를 식별할 수 있도록 파트너가 할당한 식별번호.
    // 1~36자리로 구성. 영문, 숫자, 하이픈(-), 언더바(_)를 조합하여 팝빌 회원별로 중복되지 않도록 할당.
    $requestNum = '';

    // 알림톡 내용, 최대 1000자
    // 사전에 승인받은 템플릿 내용과 다를 경우 전송실패 처리
    $content = '[ 팝빌 ]'.PHP_EOL;
    $content .= '신청하신 #{템플릿코드}에 대한 심사가 완료되어 승인 처리되었습니다.해당 템플릿으로 전송 가능합니다.'.PHP_EOL.PHP_EOL;
    $content .= '문의사항 있으시면 파트너센터로 편하게 연락주시기 바랍니다.'.PHP_EOL.PHP_EOL;
    $content .= '팝빌 파트너센터 : 1600-8536'.PHP_EOL;
    $content .= 'support@linkhub.co.kr'.PHP_EOL;

    // 수신정보 배열, 최대 1000건
    for($i=0; $i<5; $i++){
        $receivers[] = array(
            // 수신번호
            'rcv' => '',
            // 수신자명
            'rcvnm' => '수신자명',
            // 알림톡 내용, 최대 1000자
            'msg' => $content,
            // 대체문자 제목
            // - 메시지 길이(90byte)에 따라 장문(LMS)인 경우에만 적용.
            // - 모든 수신자에게 동일한 제목을 보낼 경우 배열의 모든 원소에 동일한 값을 입력하거나
            //   값을 입력하지 않고 39번 라인에 있는 altSubject 를 이용
            'altsjt' => '대체문자 제목'.$i,
            // 대체문자 내용
            'altmsg' => '대체문자 내용'.$i,
            // 파트너 지정키, 대량전송시, 수신자 구별용 메모.
            'interOPRefKey' => '20220324-'.$i
        );

        // 수신자별 개별 버튼내용 전송하는 경우
        // 개별 버튼의 개수는 템플릿 신청 시 승인받은 버튼의 개수와 동일하게 생성, 다를 경우 전송실패 처리
        // 버튼링크URL에 #{템플릿변수}를 기재하여 승인받은 경우 URL 수정가능.
        // 버튼 표시명, 버튼 유형 수정 불가능.

        // // 개별 버튼정보 배열 생성
        // $btns = array();
        //
        // // 수신자별 개별 전송할 버튼 정보
        // // 버튼 생성
        // $btn1 = new KakaoButton;
        // //버튼 표시명
        // $btn1->n = '템플릿 안내';
        // //버튼 유형, WL-웹링크, AL-앱링크, MD-메시지 전달, BK-봇키워드
        // $btn1->t = 'WL';
        // //[앱링크] iOS, [웹링크] Mobile
        // $btn1->u1 = 'http://www.popbill.com';
        // //[앱링크] Android, [웹링크] PC URL
        // $btn1->u2 = 'http://www.popbill.com';
        //
        // // 생성한 버튼 개별 버튼정보 배열에 입력
        // $btns[] = $btn1;
        //
        // //버튼 생성
        // $btn2 = new KakaoButton;
        // //버튼 표시명
        // $btn2->n = '템플릿 안내';
        // //버튼 유형, WL-웹링크, AL-앱링크, MD-메시지 전달, BK-봇키워드
        // $btn2->t = 'WL';
        // //[앱링크] iOS, [웹링크] Mobile
        // $btn2->u1 = 'http://www.popbill.com';
        // //[앱링크] Android, [웹링크] PC URL
        // $btn2->u2 = 'http://www.popbill.com' . $i;
        //
        // // 생성한 버튼 개별 버튼정보 배열에 입력
        // $btns[] = $btn2;
        //
        // // 개별 버튼정보 배열 수신자정보에 추가
        // $receivers[$i]['btns'] = $btns;
    }

    // 버튼정보를 수정하지 않고 템플릿 신청시 기재한 버튼내용을 전송하는 경우, null처리.
    // 개별 버튼내용 전송하는 경우, null처리.
    //$buttons = null;

    // 동일 버튼정보 배열, 수신자별 동일 버튼내용 전송하는경우
    // 버튼링크URL에 #{템플릿변수}를 기재하여 승인받은 경우 URL 수정가능.
    // 버튼의 개수는 템플릿 신청 시 승인받은 버튼의 개수와 동일하게 생성, 다를 경우 전송실패 처리
    // 동일 버튼정보 배열 생성
    $buttons[] = array(
        // 버튼 표시명
        'n' => '템플릿 안내',
        // 버튼 유형, WL-웹링크, AL-앱링크, MD-메시지 전달, BK-봇키워드
        't' => 'WL',
        // 링크1, [앱링크] iOS, [웹링크] Mobile
        'u1' => 'https://www.popbill.com',
        // 링크2, [앱링크] Android, [웹링크] PC URL
        'u2' => 'http://www.popbill.com'
    );

    try {
        $receiptNum = $KakaoService->SendATS($testCorpNum, $templateCode, $sender, '', '', $altSendType, $receivers, $reserveDT, $testUserID, $requestNum, $buttons, $altSubject);
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
                <legend>알림톡 개별내용 대량전송</legend>
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
