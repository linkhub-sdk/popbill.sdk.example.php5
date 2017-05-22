<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
  /**
  * 검색조건을 사용하여 문자전송 내역을 조회합니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // [필수] 시작일자
	$SDate = '20160901';

  // [필수] 종료일자
	$EDate = '20161131';

  // 전송상태값 배열, 1-대기 2-성공 3-실패 4-취소
  $State = array('1', '2', '3', '4');

  // 전송유형 배열 SMS, LMS, MMS
	$Item = array( 'SMS', 'LMS', 'MMS' );

  // 예약여부, false-전체조회, true-예약전송만 조회
	$ReserveYN = false;

  // 개인조회여부, false-전체조회, true-개인조회
	$SenderYN = false;

  // 페이지번호
	$Page = 1;

  // 페이지 검색개수, 기본값 500, 최대값 1000
	$PerPage = 50;

  // 정렬방향, D-내림차순, A-오름차순
  $Order = 'D';

	try {
		$result = $MessagingService->Search( $testCorpNum, $SDate, $EDate, $State,
                          $Item, $ReserveYN, $SenderYN, $Page, $PerPage, $Order );
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
				<legend>문자전송내역 목록 조회 </legend>
				<ul>
					<?php
						if ( isset($code) ) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						}else{
					?>
							<li>code : <?php echo $result->code ?> </li>
							<li>total : <?php echo $result->total ?> </li>
							<li>perPage : <?php echo $result->perPage ?> </li>
							<li>pageNum : <?php echo $result->pageNum ?> </li>
							<li>pageCount : <?php echo $result->pageCount ?> </li>
							<li>message : <?php echo $result->message ?> </li>
					<?php
							for ($i = 0; $i < Count($result->list); $i++) {
					?>
							<fieldset class="fieldset2">
								<legend> 문자전송내역 조회 결과 [<?php echo $i+1 ?>/<?php echo Count($result->list)?>]</legend>
								<ul>
									<li> state : <?php echo $result->list[$i]->state ?> </li>
									<li> subject : <?php echo $result->list[$i]->subject ?> </li>
									<li> type : <?php echo $result->list[$i]->type ?> </li>
									<li> content : <?php echo $result->list[$i]->content ?> </li>
									<li> sendNum : <?php echo $result->list[$i]->sendNum ?> </li>
                  <li> senderName : <?php echo $result->list[$i]->senderName ?> </li>
									<li> receiveNum : <?php echo $result->list[$i]->receiveNum ?> </li>
									<li> receiveName : <?php echo $result->list[$i]->receiveName ?> </li>
									<li> receiptDT : <?php echo $result->list[$i]->receiptDT ?> </li>
									<li> reserveDT : <?php echo $result->list[$i]->reserveDT ?> </li>
									<li> sendDT : <?php echo $result->list[$i]->sendDT ?> </li>
									<li> resultDT : <?php echo $result->list[$i]->resultDT ?> </li>
									<li> result : <?php echo $result->list[$i]->result ?> </li>
									<li> tranNet : <?php echo $result->list[$i]->tranNet ?> </li>
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
