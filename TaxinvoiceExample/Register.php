<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';

	$testCorpNum = '1234567890';				# 회원 사업자번호, '-' 제외 10자리
	$invoicerMgtKey = '20151006-01';			# 문서관리번호
	$testUserID = 'testkorea';					# 회원 아이디
	$writeSpecification = false;				# 거래명세서 동시작성 여부


	# 전자세금계산서 객체, 자세한 구성방법은 전자세금계산서 API 연동매뉴얼의 [4.1 세금계산서 구성] 참고.
	$Taxinvoice = new Taxinvoice();

	$Taxinvoice->writeDate = '20151005';		# [필수] 작성일자, 형식(yyyyMMdd) 예)20150101
	$Taxinvoice->issueType = '정발행';			# [필수] 발행형태, '정발행', '역발행', '위수탁' 중 기재
	$Taxinvoice->chargeDirection = '정과금';	# [필수] 과금방향, '정과금'(공급자 과금), '역과금'(공급받는자 과금) 중 기재, 역과금은 역발행시에만 가능.
	$Taxinvoice->purposeType = '영수';			# [필수] '영수', '청구' 중 기재
	$Taxinvoice->taxType = '과세';				# [필수] '과세', '영세', '면세' 중 기재
	$Taxinvoice->issueTiming = '직접발행';		# [필수] 발행시점, '직접발행', '승인시자동발행' 중 기재

	$Taxinvoice->invoicerCorpNum = $testCorpNum;				# [필수] 공급자 사업자번호 
	$Taxinvoice->invoicerCorpName = '공급자상호';				# [필수] 공급자 상호
	$Taxinvoice->invoicerMgtKey = $invoicerMgtKey;				# [필수] 공급자 연동관리번호
	$Taxinvoice->invoicerCEOName = '공급자 대표자성명';			# [필수]
	$Taxinvoice->invoicerAddr = '공급자 주소';					
	$Taxinvoice->invoicerContactName = '공급자 담당자성명';		# [필수]
	$Taxinvoice->invoicerEmail = 'tester@test.com';				
	$Taxinvoice->invoicerTEL = '070-0000-0000';					
	$Taxinvoice->invoicerHP = '010-0000-0000';					
	$Taxinvoice->invoicerSMSSendYN = false;						# 발행시 문자전송 여부

	$Taxinvoice->invoiceeType = '사업자';						# [필수] 공급받는자 구분, '사업자', '개인', '외국인' 중 기재
	$Taxinvoice->invoiceeCorpNum = '8888888888';				# [필수] 공급받는자 구분에 따라 기재
															    # '사업자':사업자번호 10자리('-'제외), '개인':주민등록번호-13자리('-'제외), '외국인' - '9999999999999' (13자리) 기재
	$Taxinvoice->invoiceeCorpName = '공급받는자 상호';			# [필수]
	$Taxinvoice->invoiceeMgtKey = '';							# 공급받는자 연동관리번호, [역발행]시 필수 
	$Taxinvoice->invoiceeCEOName = '공급받는자 대표자성명';		# [필수]
	$Taxinvoice->invoiceeAddr = '공급받는자 주소';
	$Taxinvoice->invoiceeContactName1 = '공급받는자 담당자성명';	# [필수]
	$Taxinvoice->invoiceeEmail1 = 'tester@test.com';
	$Taxinvoice->invoiceeTEL1 = '070-0000-0000';
	$Taxinvoice->invoiceeHP1 = '010-0000-0000';
	$Taxinvoice->invoiceeSMSSendYN = false;						# 발행시 문자전송 여부

	$Taxinvoice->supplyCostTotal = '200000';		# [필수] 공급가액 합계
	$Taxinvoice->taxTotal = '20000';				# [필수] 세액 합계
	$Taxinvoice->totalAmount = '220000';			# [필수] 합계금액, 숫자만가능하며 (-) 기재도 가능

	# 수정세금계산서 정보- 수정세금계산서 발행시에만 기재
#	$Taxinvoice->modifyCode = '1';					# 수정 사유코드 1 : 기재사항 착오정정, 2 : 공급가액 변동 3 : 환입, 4 : 계약의 해지
													# 5 : 내국신용장 사후개설 , 6 : 착오에 의한 이중발행

	# 원본세금계산서 아이템키 기재, GetInfo 함수의 ItemKey 항목
#	$Taxinvoice->originalTaxinvoiceKey = '201502028888888800000001';			

	$Taxinvoice->serialNum = '123';					# 기재상 '일련번호'항목
	$Taxinvoice->cash = '';							# 기재상 '현금'항목
	$Taxinvoice->chkBill = '';						# 기재상 '수표'항목
	$Taxinvoice->note = '';							# 기재상 '어음'항목
	$Taxinvoice->credit = '';						# 기재상 '외상'항목
	$Taxinvoice->remark1 = '비고1';					# 기재상 '비고1'항목
	$Taxinvoice->remark2 = '비고2';					# 기재상 '비고2'항목
	$Taxinvoice->remark3 = '비고3';					# 기재상 '비고3'항목
	$Taxinvoice->kwon = '1';						# 기재상 '권' 항목
	$Taxinvoice->ho = '1';							# 기재상 '호' 항목

	$Taxinvoice->businessLicenseYN = false;			# 사업자등록증 파일 첨부여부
	$Taxinvoice->bankBookYN = false;				# 통장사본 파일 첨부여부


	# 상세항목 배열 99개까지 기재 가능
	$Taxinvoice->detailList = array();				

	$Taxinvoice->detailList[] = new TaxinvoiceDetail();
	$Taxinvoice->detailList[0]->serialNum = 1;				# [상세항목 배열이 있는 경우 필수] 일련번호 1~99까지 순차기재, 
	$Taxinvoice->detailList[0]->purchaseDT = '20150101';	# 거래일자
	$Taxinvoice->detailList[0]->itemName = '품목명1번';		# 품명
	$Taxinvoice->detailList[0]->spec = '규격';				# 규격
	$Taxinvoice->detailList[0]->qty = '1';					# 수량
	$Taxinvoice->detailList[0]->unitCost = '100000';		# 단가
	$Taxinvoice->detailList[0]->supplyCost = '100000';		# 공급가액
	$Taxinvoice->detailList[0]->tax = '10000';				# 세액
	$Taxinvoice->detailList[0]->remark = '품목비고';		# 비고

	$Taxinvoice->detailList[] = new TaxinvoiceDetail();
	$Taxinvoice->detailList[1]->serialNum = 2;				# 일련번호 1부터 순차기재 [필수]
	$Taxinvoice->detailList[1]->purchaseDT = '20150101';	# 거래일자
	$Taxinvoice->detailList[1]->itemName = '품목명2번';		# 품명
	$Taxinvoice->detailList[1]->spec = '규격';				# 규격
	$Taxinvoice->detailList[1]->qty = '1';					# 수량
	$Taxinvoice->detailList[1]->unitCost = '100000';		# 단가
	$Taxinvoice->detailList[1]->supplyCost = '100000';		# 공급가액
	$Taxinvoice->detailList[1]->tax = '10000';				# 세액
	$Taxinvoice->detailList[1]->remark = '품목비고';		# 비고


	# 추가담당자 정보 - 배열로 0~5까지 기재 가능
	$Taxinvoice->addContactList = array();

	$Taxinvoice->addContactList[] = new TaxinvoiceAddContact();
	$Taxinvoice->addContactList[0]->serialNum = 1;				# 일련번호 1부터 순차기재
	$Taxinvoice->addContactList[0]->email = 'test@test.com';	# 담당자명
	$Taxinvoice->addContactList[0]->contactName	= '팝빌담당자';		# 이메일주소

	$Taxinvoice->addContactList[] = new TaxinvoiceAddContact();
	$Taxinvoice->addContactList[1]->serialNum = 2;				# 일련번호 1부터 순차기재
	$Taxinvoice->addContactList[1]->email = 'test@test.com';	# 담당자명
	$Taxinvoice->addContactList[1]->contactName	= '링크허브 담당자';		# 이메일주소

	try {
		#Register(사업자번호, 세금계산서객체, 회원아이디, 거래명세서 동시작성여부)
		$result = $TaxinvoiceService->Register($testCorpNum, $Taxinvoice, $testUserID, $writeSpecification);
		$code = $result->code;
		$message = $result->message;
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
				<legend>전자세금계산서 임시저장</legend>
				<ul>
					<li>Response.code : <? echo $code ?></li>
					<li>Response.message : <? echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>