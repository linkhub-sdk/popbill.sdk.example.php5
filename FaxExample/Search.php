<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌 회원 사업자 번호, "-"제외 10자리
  $SDate = '20160101';          # 시작일자
  $EDate = '20160112';          # 종료일자
  
  $State = array(               # 전송상태값 배열, 1-대기, 2-성공, 3-실패, 4-취소  
    1,
    2,
    3,
    4
  );

  $ReserveYN = false;           # 예약여부, true(예약전송건 검색)
  $SenderOnly = false;          # 개인조회여부, true(개인조회)
  
  $Page = 1;                    # 페이지 번호, 기본값 1
  $PerPage = 30;                # 페이지당 검색갯수, 기본값 500, 최대값 1000
  $Order = 'A';                 # 정렬방향, D-내림차순, A-오름차순
  
  try {
		
    $result = $FaxService->Search($testCorpNum, $SDate, $EDate, $State, $ReserveYN, $SenderOnly, $Page, $PerPage, $Order);

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
				<legend>팩스전송내역 조회</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
          ?>
							<li>code : <? echo $result->code ?> </li>
							<li>total : <? echo $result->total ?> </li>
							<li>perPage : <? echo $result->perPage ?> </li>
							<li>pageNum : <? echo $result->pageNum ?> </li>
							<li>pageCount : <? echo $result->pageCount ?> </li>
							<li>message : <? echo $result->message ?> </li>
          <?
							for ( $i = 0; $i < Count( $result->list ); $i++ ) {          
  	    	?>
				  		<fieldset class="fieldset2"> 
								<legend> 팩스전송내역 조회 결과 [<? echo $i+1 ?>]</legend>
								<ul>
									<li> sendState : <? echo $result->list[$i]->sendState; ?> </li>
									<li> convState : <? echo $result->list[$i]->convState; ?> </li>
									<li> sendNum : <? echo $result->list[$i]->sendNum; ?> </li>
									<li> receiveNum : <? echo $result->list[$i]->receiveNum; ?> </li>
									<li> receiveName : <? echo $result->list[$i]->receiveName; ?> </li>
									<li> sendPageCnt : <? echo $result->list[$i]->sendPageCnt; ?> </li>
									<li> successPageCnt : <? echo $result->list[$i]->successPageCnt; ?> </li>
									<li> failPageCnt : <? echo $result->list[$i]->failPageCnt; ?> </li>
									<li> refundPageCnt : <? echo $result->list[$i]->refundPageCnt; ?> </li>
									<li> cancelPageCnt : <? echo $result->list[$i]->cancelPageCnt; ?> </li>
                  <li> receiptDT : <? echo $result->list[$i]->receiptDT; ?> </li>
                  <li> reserveDT : <? echo $result->list[$i]->reserveDT; ?> </li>
                  <li> sendDT : <? echo $result->list[$i]->sendDT; ?> </li>
									<li> resultDT : <? echo $result->list[$i]->resultDT; ?> </li>
									<li> sendResult : <? echo $result->list[$i]->sendResult; ?> </li>
                  <li> fileNames : <? echo implode(', ',$result->list[$i]->fileNames); ?> </li>

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