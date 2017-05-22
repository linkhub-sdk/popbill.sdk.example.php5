<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
  /**
  * 1건의 현금영수증을 즉시발행합니다.
  * - 발행일 기준 오후 5시 이전에 발행된 현금영수증은 다음날 오후 2시에 국세청
  *   전송결과를 확인할 수 있습니다.
  * - 현금영수증 국세청 전송 정책에 대한 정보는 "[현금영수증 API 연동매뉴얼]
  *   > 1.4. 국세청 전송정책"을 참조하시기 바랍니다.
  * - 취소현금영수증 작성방법 안내 - http://blog.linkhub.co.kr/702
  */

	include 'common.php';

  // 팝빌 회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 문서관리번호, 사업자별로 중복없이 1~24자리 영문, 숫자, '-', '_' 조합으로 구성
	$mgtKey = '20170302-01';

  // 메모
	$memo = '현금영수증 즉시발행 메모';


	// 현금영수증 객체 생성
	$Cashbill = new Cashbill();

  // [필수] 현금영수증 문서관리번호,
	$Cashbill->mgtKey = $mgtKey;

  // [필수] 거래유형, (승인거래, 취소거래) 중 기재
	$Cashbill->tradeType = '승인거래';

  // [취소 현금영수증 발행시 필수] 원본 현금영수증 국세청 승인번호
  // 국세청 승인번호는 GetInfo API의 ConfirmNum 항목으로 확인할 수 있습니다.
  // $Cashbill->orgConfirmNum = '';

  // [필수] 거래처 식별번호, 거래유형에 따라 작성
  // 소득공제용 - 주민등록/휴대폰/카드번호 기재가능
  // 지출증빙용 - 사업자번호/주민등록/휴대폰/카드번호 기재가능
	$Cashbill->identityNum = '01011112222';

  // [필수] 과세, 비과세 중 기재
	$Cashbill->taxationType = '과세';

  // [필수] 공급가액, ','콤마 불가 숫자만 가능
	$Cashbill->supplyCost = '10000';

  // [필수] 세액, ','콤마 불가 숫자만 가능
	$Cashbill->tax = '1000';

  // [필수] 봉사료, ','콤마 불가 숫자만 가능
  $Cashbill->serviceFee = '0';

  // [필수] 거래금액, ','콤마 불가 숫자만 가능
	$Cashbill->totalAmount = '11000';

  // [필수] 소득공제용, 지출증빙용 중 기재
	$Cashbill->tradeUsage = '소득공제용';


  // [필수] 발행자 사업자번호
	$Cashbill->franchiseCorpNum = $testCorpNum;

  // 발행자 상호
	$Cashbill->franchiseCorpName = '발행자 상호';

  // 발행자 대표자 성명
	$Cashbill->franchiseCEOName = '발행자 대표자명';

  // 발행자 주소
	$Cashbill->franchiseAddr = '발행자 주소';

  // 발항자 연락처
	$Cashbill->franchiseTEL = '070-1234-1234';



  // 고객명
  $Cashbill->customerName = '고객명';

  // 상품명
	$Cashbill->itemName = '상품명';

  // 주문번호
	$Cashbill->orderNumber = '주문번호';

  // 고객 메일주소
	$Cashbill->email = 'test@test.com';

  // 고객 휴대폰 번호
	$Cashbill->hp = '010-111-222';

  // 발행시 알림문자 전송여부
	$Cashbill->smssendYN = false;

	try {
		$result = $CashbillService->RegistIssue($testCorpNum, $Cashbill, $memo);
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
				<legend>현금영수증 즉시발행</legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
