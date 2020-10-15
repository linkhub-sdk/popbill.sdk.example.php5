<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * [대량전송] 친구톡(이미지) 전송을 요청합니다.
     * - https://docs.popbill.com/kakao/php/api#SendFMS
     * - 친구톡은 심야 전송(20:00~08:00)이 제한됩니다.
     * - 전송포맷-JPG파일 / 용량제한-최대500kbyte / 이미지 높이/너비 비율 1.333-이하, 1/2이상
     * - 팝빌에 등록되지 않은 발신번호로 알림톡 메시지를 전송하는 경우 발신 번호 미등록 오류로 처리된다.
     * - 발신번호 사전등록 방법. (사이트/API 등록방법 제공)
     *    1.팝빌 사이트 로그인 [문자/팩스] > [카카오톡] > [발신번호 사전등록] 에서 등록
     *    2.getSenderNumberMgtURL API를 통해 반환된 URL을 이용하여 발신번호 등록
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    // 팝빌회원 아이디
    $testUserID = 'testkorea';

    // 팝빌에 등록된 카카오톡채널 아이디, ListPlusFriend API - plusFriendID 확인
    $plusFriendID = '@팝빌';

    // 팝빌에 사전 등록된 발신번호
    $sender = '07043042991';

    // 대체문자 유형, 공백-미전송, A-대체문자내용 전송, C-친구톡내용 전송
    $altSendType = 'A';

    // 광고전송여부
    $adsYN = false;

    // 전송요청번호
    // 파트너가 전송 건에 대해 관리번호를 구성하여 관리하는 경우 사용.
    // 1~36자리로 구성. 영문, 숫자, 하이픈(-), 언더바(_)를 조합하여 팝빌 회원별로 중복되지 않도록 할당.
    $requestNum = '';

    // 수신정보 배열, 최대 1000건
    for($i=0; $i<10; $i++){
        $receivers[] = array(
            // 수신번호
            'rcv' => '010111222',
            // 수신자명
            'rcvnm' => '수신자명',
            // 친구톡 내용, 최대 1000자
            'msg' => '친구톡 메시지 내용'.$i,
            // 대체문자
            'altmsg' => '대체문자 내용'.$i,
            // 파트너 지정키, 대량전송시, 수신자 구별용 메모.
            'interOPRefKey' => '20200729-'.$i,
        );

        // // 수신자별 개별 버튼내용 전송하는 경우
        // // 개별 버튼정보 배열 생성.
        // $btns = array();
        //
        // // 수신자별 개별 전송할 버튼 정보, 생성 가능 개수 최대 5개.
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

    // 버튼내용을 전송하지 않는 경우, null처리.
    // 개별 버튼내용 전송하는 경우, null처리.
    // $buttons = null;

    // 동일 버튼정보 배열, 수신자별 동일 버튼내용 전송하는경우
    // 동일 버튼정보 배열 생성, 최대 5개
    $buttons[] = array(
        // 버튼 표시명
        'n' => '웹링크',
        // 버튼 유형, WL-웹링크, AL-앱링크, MD-메시지 전달, BK-봇키워드
        't' => 'WL',
        // [앱링크] iOS, [웹링크] Mobile
        'u1' => 'http://www.popbill.com',
        // [앱링크] Android, [웹링크] PC URL
        'u2' => 'http://www.popbill.com',
    );

    // 예약전송일시, yyyyMMddHHmmss
    $reserveDT = '';

    // 친구톡 이미지 전송규격
    // - 전송 포맷 : JPG 파일(.jpg, jpeg)
    // - 용량 제한 : 최대 500Byte
    // - 이미지 가로/세로 비율 : 1.5 미만 (가로 500px 이상)
    $files = array('./test0001.jpg');

    // 첨부 이미지 링크 URL
    $imageURL = 'http://popbill.com';

    try {
        $receiptNum = $KakaoService->SendFMS($testCorpNum, $plusFriendID, $sender,
            '', '', $altSendType, $adsYN, $receivers, $buttons, $reserveDT, $files, $imageURL, $testUserID, $requestNum);
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
				<legend>친구톡(이미지) 개별내용 대량전송</legend>
				<ul>
					<?php
						if ( isset($receiptNum) ) {
					?>
							<li>receiptNum(접수번호) : <?php echo $receiptNum?></li>
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
