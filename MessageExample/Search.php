<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';		# 팝빌회원 사업자번호, '-'제외 10자리
	$testUserID = 'testkorea';			# 팝빌회원 아이디

	$SDate = '20151001';				    # [필수] 시작일자
	$EDate = '20160113';				    # [필수] 종료일자
	
  $State = array(                 # 전송상태값 배열, 1-대기 2-성공 3-실패 4-취소
    '1',
    '2',
    '3',
    '4'
  );	

	$Item = array (                 # 전송유형 배열 SMS, LMS, MMS
    'SMS',
    'LMS',
    'MMS'
  );			  
	$ReserveYN = false;					    # 예약여부, false-전체조회, true-예약전송만 조회
	$SenderYN = false;					    # 개인조회여부, false-전체조회, true-개인조회
	
	$Page = 1;							        # 페이지번호
	$PerPage = 50;				  	      # 페이지 검색개수, 기본값 500, 최대값 1000
  $Order = 'D';                   # 정렬방향, D-내림차순, A-오름차순

	try {

		$result = $MessagingService->Search( $testCorpNum, $SDate, $EDate, $State, $Item, $ReserveYN, $SenderYN, $Page, $PerPage, $Order );

	}	catch(PopbillException $pe) {
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
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>

					<?
						}else{
					?>
							<li>code : <? echo $result->code ?> </li>
							<li>total : <? echo $result->total ?> </li>
							<li>perPage : <? echo $result->perPage ?> </li>
							<li>pageNum : <? echo $result->pageNum ?> </li>
							<li>pageCount : <? echo $result->pageCount ?> </li>
							<li>message : <? echo $result->message ?> </li>
					<?
							for ($i = 0; $i < Count($result->list); $i++) { 
					?>
							<fieldset class="fieldset2"> 
								<legend> 문자전송내역 조회 결과 [<? echo $i+1 ?>/<? echo Count($result->list)?>]</legend>
								<ul>
									<li> state : <? echo $result->list[$i]->state; ?> </li>
									<li> subject : <? echo $result->list[$i]->subject; ?> </li>
									<li> type : <? echo $result->list[$i]->type; ?> </li>
									<li> content : <? echo $result->list[$i]->content; ?> </li>
									<li> sendNum : <? echo $result->list[$i]->sendNum; ?> </li>
									<li> receiveNum : <? echo $result->list[$i]->receiveNum; ?> </li>
									<li> receiveName : <? echo $result->list[$i]->receiveName; ?> </li>
									<li> receiptDT : <? echo $result->list[$i]->receiptDT; ?> </li>
									<li> reserveDT : <? echo $result->list[$i]->reserveDT; ?> </li>
									<li> sendDT : <? echo $result->list[$i]->sendDT; ?> </li>
									<li> resultDT : <? echo $result->list[$i]->resultDT; ?> </li>
									<li> sendResult : <? echo $result->list[$i]->sendResult; ?> </li>
									<li> tranNet : <? echo $result->list[$i]->tranNet; ?> </li>
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