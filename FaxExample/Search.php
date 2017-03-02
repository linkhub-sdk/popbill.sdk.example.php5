<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
	include 'common.php';

  // 팝빌 회원 사업자 번호, "-"제외 10자리
	$testCorpNum = '1234567890';

  // 검색시작일자
  $SDate = '20170101';

  // 검색종료일자
  $EDate = '20170301';

  // 전송상태값 배열, 1-대기, 2-성공, 3-실패, 4-취소
  $State = array( 1, 2, 3, 4 );

  // 예약전송 조회여부, true(예약전송건 검색)
  $ReserveYN = false;

  // 개인조회여부, true(개인조회), false(회사조회)
  $SenderOnly = false;

  // 페이지 번호, 기본값 1
  $Page = 1;

  // 페이지당 검색갯수, 기본값 500, 최대값 1000
  $PerPage = 30;

  // 정렬방향, D-내림차순, A-오름차순
  $Order = 'D';

  try {
    $result = $FaxService->Search($testCorpNum, $SDate, $EDate, $State, $ReserveYN,
                              $SenderOnly, $Page, $PerPage, $Order);
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
				<legend>팩스전송내역 조회</legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						} else {
          ?>
							<li>code : <?= $result->code ?> </li>
							<li>total : <?= $result->total ?> </li>
							<li>perPage : <?= $result->perPage ?> </li>
							<li>pageNum : <?= $result->pageNum ?> </li>
							<li>pageCount : <?= $result->pageCount ?> </li>
							<li>message : <?= $result->message ?> </li>
          <?
							for ( $i = 0; $i < Count( $result->list ); $i++ ) {
  	    	?>
				  		<fieldset class="fieldset2">
								<legend> 팩스전송내역 조회 결과 [<?= $i+1 ?>]</legend>
								<ul>
									<li> sendState : <?= $result->list[$i]->sendState ?> </li>
									<li> convState : <?= $result->list[$i]->convState ?> </li>
									<li> sendNum : <?= $result->list[$i]->sendNum ?> </li>
                  <li> senderName : <?= $result->list[$i]->senderName ?> </li>
									<li> receiveNum : <?= $result->list[$i]->receiveNum ?> </li>
									<li> receiveName : <?= $result->list[$i]->receiveName ?> </li>
									<li> sendPageCnt : <?= $result->list[$i]->sendPageCnt ?> </li>
									<li> successPageCnt : <?= $result->list[$i]->successPageCnt ?> </li>
									<li> failPageCnt : <?= $result->list[$i]->failPageCnt ?> </li>
									<li> refundPageCnt : <?= $result->list[$i]->refundPageCnt ?> </li>
									<li> cancelPageCnt : <?= $result->list[$i]->cancelPageCnt ?> </li>
                  <li> receiptDT : <?= $result->list[$i]->receiptDT ?> </li>
                  <li> reserveDT : <?= $result->list[$i]->reserveDT ?> </li>
                  <li> sendDT : <?= $result->list[$i]->sendDT ?> </li>
									<li> resultDT : <?= $result->list[$i]->resultDT ?> </li>
									<li> sendResult : <?= $result->list[$i]->sendResult ?> </li>
                  <li> fileNames : <?= implode(', ',$result->list[$i]->fileNames) ?> </li>
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
