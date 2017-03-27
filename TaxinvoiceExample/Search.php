<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 검색조건을 사용하여 세금계산서 목록을 조회합니다.
  * - 응답항목에 대한 자세한 사항은 "[전자세금계산서 API 연동매뉴얼] >
  *   4.2. (세금)계산서 상태정보 구성" 을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
  $mgtKeyType = ENumMgtKeyType::SELL;

  // [필수] 일자유형, R-등록일시, W-작성일자, I-발행일시 중 1개 기입
	$DType = 'W';

  // [필수] 시작일자
	$SDate = '20160901';

  // [필수] 종료일자
	$EDate = '20161231';

  // 전송상태값 배열, 문서상태 값 3자리 배열, 2,3번째 자리 와일드카드 사용가능, 미기재시 전체조회
	$State = array (
    '3**',
    '6**'
  );

  // 문서유형 배열, N-일반, M-수정, 선택 배열
	$Type = array (
    'N',
    'M'
  );

  // 과세형태 배열 , T-과세, N-면세, Z-영세 선택 배열
	$TaxType = array (
    'T',
    'N',
    'Z'
  );

  // 지연발행여부, 0-정상발행분만 조회, 1-지연발행분만 조회, 미기재시 전체조회
	$LateOnly = 0;

  // 종사업장 유무, 공백-전체조회, 0-종사업장번호 없는경우 조회, 1-종사업장번호 있는건만 조회
  $TaxRegIDYN = "";

  // 종사업장번호 사업자유형, S-공급자, B-공급받는자, T-수탁자
  $TaxRegIDType = "S";

  // 종사업장번호, 콤마(",")로 구분하여 구성, ex) 1234,0001
  $TaxRegID = "";

  // 페이지 번호 기본값 1
	$Page = 1;

  // 페이지당 검색갯수, 기본값 500, 최대값 1000
	$PerPage = 50;

  // 정렬방향, D-내림차순, A-오름차순
	$Order = 'D';

  // 거래처 조회, 거래처 상호 또는 거래처 사업자등록번호 기재하여 조회, 미기재시 전체조회
  $QString = '';

  // 연동문서 조회여부, 공백-전체조회, 0-일반문서 조회, 1-연동문서 조회
  $InterOPYN = '';

	try {
    $result = $TaxinvoiceService->Search($testCorpNum, $mgtKeyType, $DType, $SDate,
      $EDate, $State, $Type, $TaxType, $LateOnly, $Page, $PerPage, $Order,
      $TaxRegIDType, $TaxRegIDYN, $TaxRegID, $QString, $InterOPYN);
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
				<legend>세금계산서 목록조회 </legend>
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
							for ($i = 0; $i < Count($result->list); $i++) {
					?>
								<fieldset class="fieldset2">
									<legend> 조회결과 [<?= $i+1?>]</legend>
									<ul>
                    <li>itemKey (팝빌 관리번호) : <?= $result->list[$i]->itemKey ?></li>
                    <li>stateCode (상태코드) : <?= $result->list[$i]->stateCode ?></li>
                    <li>taxType (과세형태) : <?= $result->list[$i]->taxType ?></li>
                    <li>purposeType (영수/청구) : <?= $result->list[$i]->purposeType ?></li>
                    <li>modifyCode (수정 사유코드) : <?= $result->list[$i]->modifyCode ?></li>
                    <li>issueType (발행형태) : <?= $result->list[$i]->issueType ?></li>
                    <li>lateIssueYN (지연발행 여부) : <?= $result->list[$i]->lateIssueYN ? 'true' : 'false' ?></li>
                    <li>interOPYN (연동문서 여부) : <?= $result->list[$i]->interOPYN ? 'true' : 'false' ?></li>
                    <li>writeDate (작성일자) : <?= $result->list[$i]->writeDate ?></li>

                    <li>invoicerCorpName (공급자 상호) : <?= $result->list[$i]->invoicerCorpName ?></li>
                    <li>invoicerCorpNum (공급자 사업자번호) : <?= $result->list[$i]->invoicerCorpNum ?></li>
                    <li>invoicerMgtKey (공급자 문서관리번호) : <?= $result->list[$i]->invoicerMgtKey ?></li>
                    <li>invoicerPrintYN (공급자 인쇄여부) : <?= $result->list[$i]->invoicerPrintYN ? 'true' : 'false' ?></li>

                    <li>invoiceeCorpName (공급받는자 상호) : <?= $result->list[$i]->invoiceeCorpName ?></li>
                    <li>invoiceeCorpNum (공급받는자 사업자번호) : <?= $result->list[$i]->invoiceeCorpNum ?></li>
                    <li>invoiceeMgtKey (공급받는자 관리번호) : <?= $result->list[$i]->invoiceeMgtKey ?></li>
                    <li>invoiceePrintYN (공급받는자 인쇄여부) : <?= $result->list[$i]->invoiceePrintYN ? 'true' : 'false' ?></li>
                    <li>closeDownState (공급받는자 휴폐업상태) : <?= $result->list[$i]->closeDownState ?></li>
                    <li>closeDownStateDate (공급받는자 휴폐업일자) : <?= $result->list[$i]->closeDownStateDate ?></li>

                    <li>supplyCostTotal (공급가액 합계): <?= $result->list[$i]->supplyCostTotal ?></li>
                    <li>taxTotal (세액 합계) : <?= $result->list[$i]->taxTotal ?></li>
                    <li>issueDT (발행일시) : <?= $result->list[$i]->issueDT ?></li>
                    <li>preIssueDT (발행예정일시) : <?= $result->list[$i]->preIssueDT ?></li>
                    <li>stateDT (상태변경일시) : <?= $result->list[$i]->stateDT ?></li>
                    <li>openYN (개봉 여부) : <?= $result->list[$i]->openYN ? 'true' : 'false' ?></li>
                    <li>openDT (개봉 일시) : <?= $result->list[$i]->openDT ?></li>
                    <li>ntsresult (국세청 전송결과) : <?= $result->list[$i]->ntsresult ?></li>
                    <li>ntsconfirmNum (국세청승인번호) : <?= $result->list[$i]->ntsconfirmNum ?></li>
                    <li>ntssendDT (국세청 전송일시) : <?= $result->list[$i]->ntssendDT ?></li>
                    <li>ntsresultDT (국세청 결과 수신일시) : <?= $result->list[$i]->ntsresultDT ?></li>
                    <li>ntssendErrCode (전송실패 사유코드) : <?= $result->list[$i]->ntssendErrCode ?></li>
                    <li>stateMemo (상태메모) : <?= $result->list[$i]->stateMemo ?></li>
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
