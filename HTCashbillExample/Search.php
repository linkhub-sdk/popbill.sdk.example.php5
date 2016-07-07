<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
  $testCorpNum = '1234567890';

  // 팝빌회원 아이디
  $testUserID = 'testkorea';

  // 수집 요청(RequestJob) 호출시 반환받은 작업아이디
  $JobID = '016070717000000020';

  // 현금영수증 종류 배열, N-일반 현금영수증, C-취소 현금영수증
  $TradeType = array (
    'N',
    'C'
  );

  // 거래용도 배열, P-소득공제용, C-지출증빙용
  $TradeUsage = array (
    'P',
    'C'
  );

  // 페이지 번호
  $Page = 1;

  // 페이지당 목록개수
  $PerPage = 10;

  // 정렬방향, D-내림차순, A-오름차순
  $Order = "D";

	try {
		$response = $HTCashbillService->Search ( $testCorpNum, $JobID, $TradeType, $TradeUsage, $Page, $PerPage, $Order, $testUserID );
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
				<legend>수집 결과 조회</legend>
				<ul>
					<?
						if ( isset ( $code ) ) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
						  <li>code (응답코드) : <?= $response->code ?></li>
              <li>message (응답메시지) : <?= $response->message ?></li>
              <li>total (총 검색결고 건수) : <?= $response->total ?></li>
              <li>perPage (페이지당 검색개수) : <?= $response->perPage ?></li>
              <li>pageNum (페이지 번호) : <?= $response->pageNum ?></li>
              <li>pageCount (페이지 개수) : <?= $response->pageCount ?></li>

          <?
              for ( $i = 0; $i < Count ( $response->list ); $i++ )
              {
          ?>
            <fieldset class="fieldset2">
              <legend> 현금영수증 정보 [<? echo $i+1?>]</legend>
              <ul>
                <li>ntsconfirmNum (국세청승인번호) : <?= $response->list[$i]->ntsconfirmNum ?></li>
                <li>tradeDT (거래일시) : <?= $response->list[$i]->tradeDT ?></li>
                <li>tradeUsage (거래유형) : <?= $response->list[$i]->tradeUsage ?></li>
                <li>tradeType (현금영수증 형태) : <?= $response->list[$i]->tradeType ?></li>
                <li>supplyCost (공급가액) : <?= $response->list[$i]->supplyCost ?></li>
                <li>tax (세액) : <?= $response->list[$i]->tax ?></li>
                <li>serviceFee (봉사료) : <?= $response->list[$i]->serviceFee ?></li>
                <li>totalAmount (거래금액) : <?= $response->list[$i]->totalAmount ?></li>
                <li>franchiseCorpNum (발행자 사업자번호) : <?= $response->list[$i]->franchiseCorpNum ?></li>
                <li>franchiseCorpName (발행자 상호) : <?= $response->list[$i]->franchiseCorpName ?></li>
                <li>franchiseCorpType (발행자 사업자유형) : <?= $response->list[$i]->franchiseCorpType ?></li>
                <li>identityNum (거래처 식별번호) : <?= $response->list[$i]->identityNum ?></li>
                <li>identityNumType (식별번호유형) : <?= $response->list[$i]->identityNumType ?></li>
                <li>customerName (고객명) : <?= $response->list[$i]->customerName ?></li>
                <li>cardOwnerName (카드소유자명) : <?= $response->list[$i]->cardOwnerName ?></li>
                <li>deductionType (공제유형) : <?= $response->list[$i]->deductionType ?></li>
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
