<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 검색조건을 사용하여 현금영수증 목록을 조회합니다.
  * - 응답항목에 대한 자세한 사항은 "[현금영수증 API 연동매뉴얼] >
  *   4.2. 현금영수증 상태정보 구성" 을 참조하시기 바랍니다.
  */

	include 'common.php';

  // [필수] 팝빌회원 사업자번호
  $testCorpNum = '1234567890';

  // [필수] 조회일자 유형, R-등록일자, T-거래일자, I-발행일자
  $DType = 'T';

  // [필수] 시작일자
  $SDate = '20160901';

  // [필수] 종료일자
  $EDate = '20161131';


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
   				<?
						if( isset ( $code ) ) {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						} else {
          ?>
              <li>code : <?= $result->code ?> </li>
              <li>total : <?= $result->total ?> </li>
              <li>pageNum : <?= $result->pageNum ?> </li>
              <li>perPage : <?= $result->perPage ?> </li>
              <li>pageCount : <?= $result->pageCount ?> </li>
              <li>message : <?= $result->message ?> </li>

          <?
							for ($i = 0; $i < Count($result->list); $i++) {
					?>
								<fieldset class="fieldset2">
									<legend> 현금영수증 요약정보[<?= $i+1?>]</legend>
									<ul>
										<li> itemKey : <?= $result->list[$i]->itemKey ?></li>
										<li> mgtKey : <?= $result->list[$i]->mgtKey ?></li>
										<li> tradeDate : <?= $result->list[$i]->tradeDate ?></li>
										<li> issueDT : <?= $result->list[$i]->issueDT ?></li>
										<li> customerName : <?= $result->list[$i]->customerName ?></li>
										<li> itemName : <?= $result->list[$i]->itemName ?></li>
										<li> identityNum : <?= $result->list[$i]->identityNum ?></li>
										<li> taxationType : <?= $result->list[$i]->taxationType ?></li>
										<li> totalAmount : <?= $result->list[$i]->totalAmount ?></li>
										<li> tradeUsage : <?= $result->list[$i]->tradeUsage ?></li>
										<li> tradeType : <?= $result->list[$i]->tradeType ?></li>
										<li> stateCode : <?= $result->list[$i]->stateCode ?></li>
										<li> stateDT : <?= $result->list[$i]->stateDT ?></li>
										<li> printYN : <?= $result->list[$i]->printYN ?></li>
										<li> confirmNum : <?= $result->list[$i]->confirmNum ?></li>
										<li> orgTradeDate : <?= $result->list[$i]->orgTradeDate ?></li>
										<li> orgConfirmNum : <?= $result->list[$i]->orgConfirmNum ?></li>
										<li> ntssendDT : <?= $result->list[$i]->ntssendDT ?></li>
										<li> ntsresult : <?= $result->list[$i]->ntsresult ?></li>
										<li> ntsresultDT : <?= $result->list[$i]->ntsresultDT ?></li>
										<li> ntsresultCode : <?= $result->list[$i]->ntsresultCode ?></li>
										<li> ntsresultMessage : <?= $result->list[$i]->ntsresultMessage ?></li>
										<li> regDT : <?= $result->list[$i]->regDT ?></li>
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
