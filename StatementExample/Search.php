<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호, '-'제외 10자리
  $DType = 'R';                 # [필수] 조회일자 유형, R-등록일자, W-작성일자, I-발행일자
  $SDate = '20151001';          # [필수] 시작일자
  $EDate = '20160112';          # [필수] 종료일자
 
	$State = array(			          # 전송상태값 배열, 문서상태값 3자리 배열, 2,3번째 와일드카드 사용가능
			'100',
			'2**',
      '3**'
	);

  # 명세서 코드배열 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
  $ItemCode = array(
    121,
    122,
    123,
    124,
    125,
    126
  );

  $Page = 1;                    # 페이지 번호, 기본값 1
  $PerPage = 20;                # 페이지당 검색갯수, 기본값(500), 최대값(1000)

	try {
		$result = $StatementService->Search($testCorpNum, $DType, $SDate, $EDate, $State, $ItemCode, $Page, $PerPage);
	}

	catch(PopbillException $pe) {
		$code = $pe->getCode();
		$message = $pe->getMessage();
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>전자명세서 목록조회</legend>
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
              <li>pageNum : <? echo $result->pageNum ?> </li>
              <li>perPage : <? echo $result->perPage ?> </li>
              <li>pageCount : <? echo $result->pageCount ?> </li>
              <li>message : <? echo $result->message ?> </li>

          <?
							for ($i = 0; $i < Count($result->list); $i++) { 
					?>
							<fieldset class="fieldset2">
								<legend> 전자명세서 요약정보[<? echo $i+1?>]</legend>
								<ul>
									<li> mgtKey : <? echo $result->list[$i]->mgtKey ?></li>
									<li> writeDate : <? echo $result->list[$i]->writeDate ?></li>
                  <li> itemKey : <? echo $result->list[$i]->itemKey ?></li>
									<li> stateCode : <? echo $result->list[$i]->stateCode ?></li>
									<li> taxType : <? echo $result->list[$i]->taxType ?></li>
									<li> purposeType : <? echo $result->list[$i]->purposeType ?></li>
									<li> senderCorpName : <? echo $result->list[$i]->senderCorpName ?></li>
									<li> senderCorpNum : <? echo $result->list[$i]->senderCorpNum ?></li>
									<li> receiverCorpName : <? echo $result->list[$i]->receiverCorpName ?></li>
									<li> receiverCorpNum : <? echo $result->list[$i]->receiverCorpNum ?></li>
									<li> supplyCostTotal : <? echo $result->list[$i]->supplyCostTotal ?></li>
									<li> taxTotal : <? echo $result->list[$i]->taxTotal ?></li>
									<li> issueDT : <? echo $result->list[$i]->issueDT ?></li>
									<li> stateDT : <? echo $result->list[$i]->stateDT ?></li>
									<li> openYN : <? echo $result->list[$i]->openYN ?></li>
									<li> openDT : <? echo $result->list[$i]->openDT ?></li>
									<li> stateMemo : <? echo $result->list[$i]->stateMemo ?></li>
									<li> regDT : <? echo $result->list[$i]->regDT ?></li>								
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