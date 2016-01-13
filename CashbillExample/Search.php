<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<? 
	include 'common.php';	

	$testCorpNum = '1234567890';	# [필수] 팝빌회원 사업자번호
  $DType = 'I';                 # [필수] 조회일자 유형, R-등록일자, T-거래일자, I-발행일자
  $SDate = '20150601';          # [필수] 시작일자
  $EDate = '20160112';          # [필수] 종료일자

		
	$State = array(			          # 문서상태값 3자리 배열, 2,3번째 자리 와일드카드 사용가능, 미기재시 전체조회
    '100',
    '2**',
    '3**'
	);

  $TradeType = array(			      # 거래형태, N-일반현금영수증, C-취소현금영수증
			'N',
			'C'
	);


  $TradeUsage = array(			    # 거래용도, P-소득공제, C-지출증빙
			'P',
      'C'
	);

  $TaxationType = array(			  # 과세형태, T-과세, N-비과세
			'T',
			'N'
	);

  $Page = 1;                    # 페이지번호, 기본값 1
  $PerPage = 30;                # 페이지당 검색갯수, 기본값 500, 최대값 1000

	try {
		$result = $CashbillService->Search( $testCorpNum, $DType, $SDate, $EDate, $State, $TradeType, $TradeUsage, $TaxationType, $Page, $PerPage );
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
									<legend> 현금영수증 요약정보[<? echo $i+1?>]</legend>
									<ul>
										<li> itemKey : <? echo $result->list[$i]->itemKey ?></li>
										<li> mgtKey : <? echo $result->list[$i]->mgtKey ?></li>
										<li> tradeDate : <? echo $result->list[$i]->tradeDate ?></li>
										<li> issueDT : <? echo $result->list[$i]->issueDT ?></li>
										<li> customerName : <? echo $result->list[$i]->customerName ?></li>
										<li> itemName : <? echo $result->list[$i]->itemName ?></li>
										<li> identityNum : <? echo $result->list[$i]->identityNum ?></li>
										<li> taxationType : <? echo $result->list[$i]->taxationType ?></li>
										<li> totalAmount : <? echo $result->list[$i]->totalAmount ?></li>
										<li> tradeUsage : <? echo $result->list[$i]->tradeUsage ?></li>
										<li> tradeType : <? echo $result->list[$i]->tradeType ?></li>
										<li> stateCode : <? echo $result->list[$i]->stateCode ?></li>
										<li> stateDT : <? echo $result->list[$i]->stateDT ?></li>
										<li> printYN : <? echo $result->list[$i]->printYN ?></li>
										<li> confirmNum : <? echo $result->list[$i]->confirmNum ?></li>
										<li> orgTradeDate : <? echo $result->list[$i]->orgTradeDate ?></li>
										<li> orgConfirmNum : <? echo $result->list[$i]->orgConfirmNum ?></li>
										<li> ntssendDT : <? echo $result->list[$i]->ntssendDT ?></li>
										<li> ntsresult : <? echo $result->list[$i]->ntsresult ?></li>
										<li> ntsresultDT : <? echo $result->list[$i]->ntsresultDT ?></li>
										<li> ntsresultCode : <? echo $result->list[$i]->ntsresultCode ?></li>
										<li> ntsresultMessage : <? echo $result->list[$i]->ntsresultMessage ?></li>
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