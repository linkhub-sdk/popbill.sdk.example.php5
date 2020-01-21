<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * XMS(단문/장문 자동인식)를 전송합니다.
     *  - https://docs.popbill.com/message/php/api#SendXMS
     *  - 메시지 내용의 길이(90byte)에 따라 SMS/LMS(단문/장문)를 자동인식하여 전송합니다.
     *  - 90byte 초과시 LMS(장문)으로 인식 합니다.
     *  - 팝빌에 등록되지 않은 발신번호로 메시지를 전송하는 경우 발신번호 미등록 오류로 처리됩니다.
     *  - 발신번호 사전등록 방법. (사이트/API 등록방법 제공)
     *    1.팝빌 사이트 로그인 > [문자/팩스] > [문자] > [발신번호 사전등록] 에서 등록
     *    2.getSenderNumberMgtURL API를 통해 반환된 URL을 이용하여 발신번호 등록
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    // 예약전송일시(yyyyMMddHHmmss) ex)20151212230000, null인경우 즉시전송
    $reserveDT = null;

    // 광고문자 전송여부
    $adsYN = false;

    // 전송요청번호
    // 파트너가 전송 건에 대해 관리번호를 구성하여 관리하는 경우 사용.
    // 1~36자리로 구성. 영문, 숫자, 하이픈(-), 언더바(_)를 조합하여 팝빌 회원별로 중복되지 않도록 할당.
    $requestNum = '';

    $Messages[] = array(
        'snd' => '07043042991',		// 발신번호
        'sndnm' => '발신자명',			// 발신자명
        'rcv' => '010111222',			// 수신번호
        'rcvnm' => '수신자성명',		// 수신자성명
        'msg'	=> '장문 메시지 내용 장문으로 보내는 기준은 메시지 길이을 기준으로 90byte이상입니다. 2000byte에서 길이가 조정됩니다.', // 개별전송 메시지 내용
    );

    try {
        $receiptNum = $MessagingService->SendXMS($testCorpNum, '', '', '', $Messages, $reserveDT, $adsYN, '', '', '', $requestNum);
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
				<legend>장/단문 자동인식 문자 1건 전송</legend>
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
