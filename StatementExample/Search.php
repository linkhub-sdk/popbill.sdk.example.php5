<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 검색조건을 사용하여 전자명세서 목록을 조회합니다.
  * - 응답항목에 대한 자세한 사항은 "[전자명세서 API 연동매뉴얼] >
  *   3.3.3. Search (목록 조회)" 를 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

   // [필수] 조회일자 유형, R-등록일자, W-작성일자, I-발행일자
  $DType = 'W';

  // [필수] 시작일자
  $SDate = '20160901';

  // [필수] 종료일자
  $EDate = '20161131';


  // 전송상태값 배열, 문서상태값 3자리 배열, 2,3번째 와일드카드 사용가능
	$State = array(
			'100',
			'2**',
      '3**'
	);

  // 명세서 코드배열 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
  $ItemCode = array(
    121,
    122,
    123,
    124,
    125,
    126
  );

  // 페이지 번호, 기본값 1
  $Page = 1;

  // 페이지당 검색갯수, 기본값(500), 최대값(1000)
  $PerPage = 20;

  // 정렬방향, D-내림차순, A-오름차순
  $Order = 'D';

  // 거래처 조회, 거래처 상호 또는 거래처 사업자등록번호 기재하여 조회, 미기재시 전체조회
  $QString = '';

	try {
    $result = $StatementService->Search($testCorpNum, $DType, $SDate, $EDate,
                            $State, $ItemCode, $Page, $PerPage, $Order, $QString);
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
				<legend>전자명세서 목록조회</legend>
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
              <li>pageNum : <?= $result->pageNum ?> </li>
              <li>perPage : <?= $result->perPage ?> </li>
              <li>pageCount : <?= $result->pageCount ?> </li>
              <li>message : <?= $result->message ?> </li>

          <?
							for ($i = 0; $i < Count($result->list); $i++) {
					?>
							<fieldset class="fieldset2">
								<legend> 전자명세서 요약정보[<?= $i+1?>]</legend>
								<ul>
									<li> mgtKey : <?= $result->list[$i]->mgtKey ?></li>
									<li> writeDate : <?= $result->list[$i]->writeDate ?></li>
                  <li> itemKey : <?= $result->list[$i]->itemKey ?></li>
									<li> stateCode : <?= $result->list[$i]->stateCode ?></li>
									<li> taxType : <?= $result->list[$i]->taxType ?></li>
									<li> purposeType : <?= $result->list[$i]->purposeType ?></li>
									<li> senderCorpName : <?= $result->list[$i]->senderCorpName ?></li>
									<li> senderCorpNum : <?= $result->list[$i]->senderCorpNum ?></li>
									<li> senderPrintYN : <?= $result->list[$i]->senderPrintYN ?></li>
									<li> receiverCorpName : <?= $result->list[$i]->receiverCorpName ?></li>
									<li> receiverCorpNum : <?= $result->list[$i]->receiverCorpNum ?></li>
									<li> receiverPrintYN : <?= $result->list[$i]->receiverPrintYN ?></li>
									<li> supplyCostTotal : <?= $result->list[$i]->supplyCostTotal ?></li>
									<li> taxTotal : <?= $result->list[$i]->taxTotal ?></li>
									<li> issueDT : <?= $result->list[$i]->issueDT ?></li>
									<li> stateDT : <?= $result->list[$i]->stateDT ?></li>
									<li> openYN : <?= $result->list[$i]->openYN ?></li>
									<li> openDT : <?= $result->list[$i]->openDT ?></li>
									<li> stateMemo : <?= $result->list[$i]->stateMemo ?></li>
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
