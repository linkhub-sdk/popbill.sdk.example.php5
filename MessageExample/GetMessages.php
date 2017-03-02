<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 문자전송요청에 대한 전송결과를 확인합니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // 문자전송 요청 시 발급받은 접수번호(receiptNum)
	$ReceiptNum = '016080814000000017';

	try {
		$result = $MessagingService->GetMessages($testCorpNum, $ReceiptNum);
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
				<legend>문자전송 내역 및 전송상태 확인 </legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>

					<?
						} else {
							for ($i = 0; $i < Count($result); $i++) {
					?>
							<fieldset class="fieldset2">
								<legend> 문자전송내역 조회 결과 [<?= $i+1 ?>/<?= Count($result)?>]</legend>
								<ul>
									<li> state : <?= $result[$i]->state ?> </li>
									<li> subject : <?= $result[$i]->subject ?> </li>
									<li> type : <?= $result[$i]->type ?> </li>
									<li> content : <?= $result[$i]->content ?> </li>
									<li> sendNum : <?= $result[$i]->sendNum ?> </li>
                  <li> senderName : <?= $result[$i]->senderName ?> </li>
									<li> receiveNum : <?= $result[$i]->receiveNum ?> </li>
									<li> receiveName : <?= $result[$i]->receiveName ?> </li>
									<li> receiptDT : <?= $result[$i]->receiptDT ?> </li>
                  <li> reserveDT : <?= $result[$i]->reserveDT ?> </li>
									<li> sendDT : <?= $result[$i]->sendDT ?> </li>
									<li> resultDT : <?= $result[$i]->resultDT ?> </li>
									<li> result : <?= $result[$i]->result ?> </li>
									<li> tranNet : <?= $result[$i]->tranNet ?> </li>
								</ul>
							</fieldset>
					<?
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
