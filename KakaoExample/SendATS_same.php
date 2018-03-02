<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
/**
* 알림톡 동일내용 대량전송을 요청합니다.
*/

	include 'common.php';

  // 팝빌 회원 사업자번호, "-"제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌회원 사업자번호
  $testUserID = 'testkorea';

  // 템플릿 코드 - 템플릿 목록 조회 (ListATSTemplate API)의 반환항목 확인
  $templateCode = '018020000001';

  // 팝빌에 사전 등록된 발신번호
  $sender = '07043042993';

  // 알림톡 내용, 최대 1000자
  $content = '[테스트] 테스트 템플릿입니다.';

  // 대체문자 내용
  $altContent = '대체문자 내용';

  // 대체문자 전송유형 공백-미전송, A-대체문자내용 전송, C-알림톡내용 전송
  $altSendType = 'A';

  // 예약전송일시, yyyyMMddHHmmss
  $reserveDT = '';

  // 수신정보 배열, 최대 1000건
  for($i=0; $i<10; $i++){
    $receivers[] = array(
      // 수신번호
      'rcv' => '01043245117',
      // 수신자명
      'rcvnm' => '수신자명'
    );
  }

	try {
		$receiptNum = $KakaoService->SendATS($testCorpNum, $templateCode, $sender, $content, $altContent, $altSendType, $receivers, $reserveDT, $testUserID);
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
				<legend>알림톡 동일내용 대량전송</legend>
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
