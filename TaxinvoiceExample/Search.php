<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';			    # 팝빌회원 사업자번호, '-'제외 10자리
  $testUserID = 'testkorea';            # 팝빌회원 아이디

	$mgtKeyType = ENumMgtKeyType::SELL;		# 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TURSTT:위수탁

	$DType = 'W';						              # [필수] 일자유형, R-등록일시, W-작성일자, I-발행일시 중 1개 기입
	$SDate = '20160601';				          # [필수] 시작일자
	$EDate = '20160831';				          # [필수] 종료일자

  # 전송상태값 배열, 문서상태 값 3자리 배열, 2,3번째 자리 와일드카드 사용가능, 미기재시 전체조회
	$State = array (
    '3**',
    '6**'
  );

  # 문서유형 배열, N-일반, M-수정, 선택 배열
	$Type = array (
    'N',
    'M'
  );


  # 과세형태 배열 , T-과세, N-면세, Z-영세 선택 배열
	$TaxType = array (
    'T',
    'N',
    'Z'
  );

	$LateOnly = 0;						            # 지연발행여부, 0-정상발행분만 조회, 1-지연발행분만 조회, 미기재시 전체조회

  #종사업장번호 조회 조건
  $TaxRegIDType = "S";                  # 종사업장번호 사업자유형, S-공급자, B-공급받는자, T-수탁자
  $TaxRegIDYN = "0";                    # 종사업장 유무, 공백-전체조회, 0-종사업장번호 없는경우 조회, 1-종사업장번호 있는건만 조회
  $TaxRegID = "";                       # 종사업장번호, 콤마(",")로 구분하여 구성, ex) 1234,0001

	$Page = 1;							              # 페이지 번호 기본값 1
	$PerPage = 50;					              # 페이지당 검색갯수, 기본값 500, 최대값 1000
	$Order = 'D';                         # 정렬방향, D-내림차순, A-오름차순

	try {
    $result = $TaxinvoiceService->Search ( $testCorpNum, $mgtKeyType, $DType, $SDate, $EDate, $State, $Type, $TaxType, $LateOnly, $Page, $PerPage, $Order, $TaxRegIDType, $TaxRegIDYN, $TaxRegID, $testUserID) ;
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
				<legend>세금계산서 기간조회 </legend>
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
							for ($i = 0; $i < Count($result->list); $i++) {
					?>
								<fieldset class="fieldset2">
									<legend> 조회결과 [<? echo $i+1?>]</legend>
									<ul>
										<li>itemKey : <? echo $result->list[$i]->itemKey ; ?></li>
										<li>stateCode : <? echo $result->list[$i]->stateCode ; ?></li>
										<li>taxType : <? echo $result->list[$i]->taxType ; ?></li>
										<li>purposeType : <? echo $result->list[$i]->purposeType ; ?></li>
										<li>modifyCode : <? echo $result->list[$i]->modifyCode ; ?></li>
										<li>issueType : <? echo $result->list[$i]->issueType ; ?></li>
										<li>lateIssueYN : <? echo $result->list[$i]->lateIssueYN ; ?></li>
										<li>writeDate : <? echo $result->list[$i]->writeDate ; ?></li>
										<li>invoicerCorpName : <? echo $result->list[$i]->invoicerCorpName ; ?></li>
										<li>invoicerCorpNum : <? echo $result->list[$i]->invoicerCorpNum ; ?></li>
										<li>invoicerMgtKey : <? echo $result->list[$i]->invoicerMgtKey ; ?></li>
										<li>invoicerPrintYN : <? echo $result->list[$i]->invoicerPrintYN ; ?></li>
										<li>invoiceeCorpName : <? echo $result->list[$i]->invoiceeCorpName ; ?></li>
										<li>invoiceeMgtKey : <? echo $result->list[$i]->invoiceeMgtKey ; ?></li>
										<li>invoiceePrintYN : <? echo $result->list[$i]->invoiceePrintYN ; ?></li>
										<li>trusteeCorpName : <? echo $result->list[$i]->trusteeCorpName ; ?></li>
										<li>trusteeCorpNum : <? echo $result->list[$i]->trusteeCorpNum ; ?></li>
										<li>trusteeMgtKey : <? echo $result->list[$i]->trusteeMgtKey ; ?></li>
										<li>trusteerPrintYN : <? echo $result->list[$i]->trusteePrintYN ; ?></li>
										<li>supplyCostTotal : <? echo $result->list[$i]->supplyCostTotal ; ?></li>
										<li>taxTotal : <? echo $result->list[$i]->taxTotal ; ?></li>
										<li>issueDT : <? echo $result->list[$i]->issueDT ; ?></li>
										<li>preIssueDT : <? echo $result->list[$i]->preIssueDT ; ?></li>
										<li>stateDT : <? echo $result->list[$i]->stateDT ; ?></li>
										<li>openYN : <? echo $result->list[$i]->openYN ; ?></li>
										<li>openDT : <? echo $result->list[$i]->openDT ; ?></li>
										<li>ntsresult : <? echo $result->list[$i]->ntsresult ; ?></li>
										<li>ntsconfirmNum : <? echo $result->list[$i]->ntsconfirmNum ; ?></li>
										<li>ntssendDT : <? echo $result->list[$i]->ntssendDT ; ?></li>
										<li>ntsresultDT : <? echo $result->list[$i]->ntsresultDT ; ?></li>
										<li>ntssendErrCode : <? echo $result->list[$i]->ntssendErrCode ; ?></li>
										<li>stateMemo : <? echo $result->list[$i]->stateMemo ; ?></li>
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
