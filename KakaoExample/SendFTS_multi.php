<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
/**
* 친구톡(텍스트) 개별내용 대량전송을 요청합니다.
*/

	include 'common.php';

  // 팝빌 회원 사업자번호, "-"제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌회원 사업자번호
  $testUserID = 'testkorea';

  // 팝빌에 등록된 플러스친구 아이디, ListPlusFriend API - plusFriendID 확인
  $plusFriendID = '@팝빌';

  // 팝빌에 사전 등록된 발신번호
  $sender = '07043042993';

  // 친구톡 전송 실패시 대체문자 유형, 공백-미전송, A-대체문자내용 전송, C-친구톡내용 전송
  $altSendType = 'A';

  // 광고전송여부
  $adsYN = True;

  // 수신정보 배열, 최대 1000건
  for($i=0; $i<10; $i++){
    $receivers[] = array(
      // 수신번호
      'rcv' => '01000123',
      // 수신자명
      'rcvnm' => '수신자명',
      // 친구톡 내용, 최대 1000자
      'msg' => '친구톡 메시지 내용'.$i,
      // 대체문자
      'altmsg' => '대체문자 내용'.$i,
    );
  }

  // 버튼배열, 최대 5개
  $buttons[] = array(
    // 버튼 표시명
    'n' => '웹링크',
    // 버튼 유형, WL-웹링크, AL-앱링크, MD-메시지 전달, BK-봇키워드
    't' => 'WL',
    // [앱링크] Android, [웹링크] Mobile
    'u1' => 'http://www.popbill.com',
    // [앱링크] IOS, [웹링크] PC URL
    'u2' => 'http://www.popbill.com',
  );

  // 예약전송일시, yyyyMMddHHmmss
  $reserveDT = '';

	try {

		$receiptNum = $KakaoService->SendFTS($testCorpNum, $plusFriendID, $sender, '', '', $altSendType, $adsYN, $receivers, $buttons, $reserveDT, $testUserID);
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
				<legend>친구톡(텍스트) 개별내용 대량전송</legend>
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
