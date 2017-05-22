<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

  // 팝빌 회원 사업자 번호, "-"제외 10자리
	$testCorpNum = '1234567890';

  // 팩스전송 접수번호
	$ReceiptNum = '017030211300900001';

	try {
		$result = $FaxService->GetFaxDetail($testCorpNum ,$ReceiptNum);
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
				<legend>팩스전송 내역 및 전송상태 확인</legend>
				<ul>
					<?php
						if ( isset($code) ) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
							for ($i = 0; $i < Count($result) ; $i++){
					?>
						  <fieldset class="fieldset2">
								<legend> 팩스전송내역 조회 결과 [<?php echo $i+1 ?>/<?php echo Count($result)?>]</legend>
								<ul>
									<li> sendState : <?php echo $result[$i]->sendState ?> </li>
									<li> convState : <?php echo $result[$i]->convState ?> </li>
									<li> sendNum : <?php echo $result[$i]->sendNum ?> </li>
                  <li> senderName : <?php echo $result[$i]->senderName ?> </li>
									<li> receiveNum : <?php echo $result[$i]->receiveNum ?> </li>
									<li> receiveName : <?php echo $result[$i]->receiveName ?> </li>
									<li> sendPageCnt : <?php echo $result[$i]->sendPageCnt ?> </li>
									<li> successPageCnt : <?php echo $result[$i]->successPageCnt ?> </li>
									<li> failPageCnt : <?php echo $result[$i]->failPageCnt ?> </li>
									<li> refundPageCnt : <?php echo $result[$i]->refundPageCnt ?> </li>
									<li> cancelPageCnt : <?php echo $result[$i]->cancelPageCnt ?> </li>
                  <li> receiptDT : <?php echo $result[$i]->receiptDT ?> </li>
                  <li> reserveDT : <?php echo $result[$i]->reserveDT ?> </li>
									<li> sendDT : <?php echo $result[$i]->sendDT ?> </li>
									<li> resultDT : <?php echo $result[$i]->resultDT ?> </li>
									<li> sendResult : <?php echo $result[$i]->sendResult ?> </li>
                  <li> fileNames : <?php echo implode(', ',$result[$i]->fileNames) ?> </li>
								</ul>
							</fieldset>
					<?php
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
