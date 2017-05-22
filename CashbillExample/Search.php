<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
  /**
  * 검색조건을 사용하여 현금영수증 목록을 조회합니다.
  * - 응답항목에 대한 자세한 사항은 "[현금영수증 API 연동매뉴얼] >
  *   4.2. 현금영수증 상태정보 구성" 을 참조하시기 바랍니다.
  */

	include 'common.php';

  // [필수] 팝빌회원 사업자번호
  $testCorpNum = '1234567890';

  // [필수] 조회일자 유형, R-등록일자, T-거래일자, I-발행일자
  $DType = 'I';

  // [필수] 시작일자
  $SDate = '20170101';

  // [필수] 종료일자
  $EDate = '20170301';


  // 문서상태값 3자리 배열, 2,3번째 자리 와일드카드 사용가능, 미기재시 전체조회
	$State = array(
    '100',
    '2**',
    '3**',
    '4**'
	);

  // 거래형태, N-일반현금영수증, C-취소현금영수증
  $TradeType = array(
			'N',
			'C'
	);

  // 거래용도, P-소득공제, C-지출증빙
  $TradeUsage = array(
			'P',
      'C'
	);

  // 과세형태, T-과세, N-비과세
  $TaxationType = array(
			'T',
			'N'
	);

  // 페이지번호, 기본값 1
  $Page = 1;

  // 페이지당 검색갯수, 기본값 500, 최대값 1000
  $PerPage = 30;

  // 정렬방향, D-내림차순, A-오름차순
  $Order = 'D';

  // 식별번호 조회, 미기재시 전체조회
  $QString = '';

  try {
		$result = $CashbillService->Search( $testCorpNum, $DType, $SDate, $EDate, $State, $TradeType,
                              $TradeUsage, $TaxationType, $Page, $PerPage, $Order, $QString );
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
				<legend>현금영수증 목록조회</legend>
				<ul>
   				<?php
						if( isset ( $code ) ) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
          ?>
              <li>code (응답코드) : <?php echo $result->code ?> </li>
              <li>total (총 검색결과 건수) : <?php echo $result->total ?> </li>
              <li>pageNum (페이지 번호) : <?php echo $result->pageNum ?> </li>
              <li>perPage (페이지당 목록개수) : <?php echo $result->perPage ?> </li>
              <li>pageCount (페이지 개수) : <?php echo $result->pageCount ?> </li>
              <li>message (응답메시지) : <?php echo $result->message ?> </li>
          <?php
							for ($i = 0; $i < Count($result->list); $i++) {
					?>
								<fieldset class="fieldset2">
									<legend> 현금영수증 상태/요약 정보[<?php echo $i+1?>]</legend>
									<ul>
                    <li> itemKey (현금영수증 아이템키) : <?php echo $result->list[$i]->itemKey ?></li>
    								<li> mgtKey (문서관리번호) : <?php echo $result->list[$i]->mgtKey ?></li>
    								<li> tradeDate (거래일자) : <?php echo $result->list[$i]->tradeDate ?></li>
    								<li> issueDT (발행일시) : <?php echo $result->list[$i]->issueDT ?></li>
                    <li> regDT (등록일시) : <?php echo $result->list[$i]->regDT ?></li>
                    <li> customerName (고객명) : <?php echo $result->list[$i]->customerName ?></li>
    								<li> itemName (상품명) : <?php echo $result->list[$i]->itemName ?></li>
    								<li> identityNum (거래처 식별번호) : <?php echo $result->list[$i]->identityNum ?></li>
    								<li> taxationType (과세형태) : <?php echo $result->list[$i]->taxationType ?></li>
    								<li> totalAmount (거래금액) : <?php echo $result->list[$i]->totalAmount ?></li>
    								<li> tradeUsage (거래용도) : <?php echo $result->list[$i]->tradeUsage ?></li>
    								<li> tradeType (현금영수증 형태) : <?php echo $result->list[$i]->tradeType ?></li>
    								<li> stateCode (상태코드) : <?php echo $result->list[$i]->stateCode ?></li>
    								<li> stateDT (상태변경일시) : <?php echo $result->list[$i]->stateDT ?></li>
    								<li> printYN (인쇄여부) : <?php echo $result->list[$i]->printYN ?></li>
    								<li> confirmNum (국세청 승인번호) : <?php echo $result->list[$i]->confirmNum ?></li>
    								<li> ntssendDT (국세청 전송일시) : <?php echo $result->list[$i]->ntssendDT ?></li>
    								<li> ntsresultDT (국세청 처리결과 수신일시) : <?php echo $result->list[$i]->ntsresultDT ?></li>
    								<li> ntsresultCode (국세청 처리결과 상태코드) : <?php echo $result->list[$i]->ntsresultCode ?></li>
    								<li> ntsresultMessage (국세청 처리결과 메시지) : <?php echo $result->list[$i]->ntsresultMessage ?></li>
                    <li> orgTradeDate (원본 현금영수증 거래일자) : <?php echo $result->list[$i]->orgTradeDate ?></li>
    								<li> orgConfirmNum (원본 현금영수증 국세청승인번호) : <?php echo $result->list[$i]->orgConfirmNum ?></li>
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
