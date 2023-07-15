<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
    <title>팝빌 SDK PHP 5.X Example.</title>
  </head>
<?php

/**
 * 내국신용장 사후개설에 의한 수정세금계산서 발행
 * - 재화 또는 서비스/용역을 공급한 시기가 속하는 과세기간 종료(1/1~6/30 또는 7/1~12/31) 다음달(7월 또는 1월) 25일 이내에 내국신용장이 개설되었거나 구매확인서가 발급된 경우 이용하는 수정사유 입니다.
 * - 취소분 : 내국신용장이 개설된 품목에 대한 부(-) 세금계산서 발행
 * - 수정분 : 내국신용장이 개설된 품목에 대한 정(+) 영세율 세금계산서 발행
 * - 수정세금계산서 가이드: [https://developers.popbill.com/guide/taxinvoice/java/introduction/modified-taxinvoice]
 */

/**
 **************** 내국신용장 사후개설에 의한 수정세금계산서 예시 (수정분) ****************
 * 3월 13일 공급가액 3,000,000원의 전자세금계산서를 발급한 후, 4월 12일에 일부 품목인 공급가액 1,000,000원에 대해 내국신용장이 개설된 경우
 * 내국 신용장 사후개설된 1,000,000원에 대한 3월 13일 작성일자의 영세율 세금계산서 작성
 */

include 'common.php';

// 팝빌 회원 사업자 번호
$CorpNum = "1234567890";

$Taxinvoice = new Taxinvoice();

/**********************************************************************
 * 수정세금계산서 정보 (수정세금계산서 작성시 기재) - 수정세금계산서 작성방법 안내
 * [https://developers.popbill.com/guide/taxinvoice/java/introduction/modified-taxinvoice]
 *********************************************************************/
// 수정세금계산서 작성시 원본세금계산서 국세청 승인번호 기재
$Taxinvoice->orgNTSConfirmNum = "20230706-original-TI00001";

// 작성일자, 날짜형식(yyyyMMdd)
//  원본 세금계산서의 작성 일자
$Taxinvoice->writeDate = "20230313";

// 공급가액 합계
$Taxinvoice->supplyCostTotal = "1000000";

// 세액 합계
$Taxinvoice->taxTotal = "100000";

// 합계금액, 공급가액 + 세액
$Taxinvoice->totalAmount = "1100000";

// 수정사유코드, 수정사유에 따라 1~6 중 선택기재.
$Taxinvoice->modifyCode = 5;

// 비고
// - 내국신용장 사후개설에 의한 수정세금계산서 발행 = 시, 비고란에 내국신용장 개설일자 기재
$Taxinvoice->remark1 = "20230402";
// 과세형태, [과세, 영세, 면세] 중 기재
// 내국신용장 개설 품목에 대해 영세율 세금계산서 작성
$Taxinvoice->taxType = "영세";


// 과금방향, [정과금, 역과금] 중 선택기재
// └ 정과금 = 공급자 과금 , 역과금 = 공급받는자 과금
// -"역과금"은 역발행 세금계산서 발행 시에만 이용가능
$Taxinvoice->chargeDirection = "정과금";

// 발행형태, [정발행, 역발행, 위수탁] 중 기재
$Taxinvoice->issueType = "정발행";

// [영수, 청구, 없음] 중 기재
$Taxinvoice->purposeType = "영수";


/**********************************************************************
 * 공급자 정보
 *********************************************************************/

// 공급자 사업자번호
$Taxinvoice->invoicerCorpNum = '1234567890';

// 공급자 종사업장 식별번호, 필요시 기재. 형식은 숫자 4자리.
$Taxinvoice->invoicerTaxRegID = "";

// 공급자 상호
$Taxinvoice->invoicerCorpName = "공급자 상호";

// 공급자 문서번호, 1~24자리 (숫자, 영문, '-', '_') 조합으로 사업자 별로 중복되지 않도록 구성
$Taxinvoice->invoicerMgtKey = "20230102-BOOT001";

// 공급자 대표자 성명
$Taxinvoice->invoicerCEOName = "공급자 대표자 성명";

// 공급자 주소
$Taxinvoice->invoicerAddr = "공급자 주소";

// 공급자 종목
$Taxinvoice->invoicerBizClass = "공급자 종목";

// 공급자 업태
$Taxinvoice->invoicerBizType = "공급자 업태,업태2";

// 공급자 담당자 성명
$Taxinvoice->invoicerContactName = "공급자 담당자 성명";

// 공급자 담당자 메일주소
$Taxinvoice->invoicerEmail = "test@test.com";

// 공급자 담당자 연락처
$Taxinvoice->invoicerTEL = "070-7070-0707";

// 공급자 담당자 휴대폰번호
$Taxinvoice->invoicerHP = "010-000-2222";

// 발행 안내 문자 전송여부 (true / false 중 택 1)
// └ true = 전송 , false = 미전송
// └ 공급받는자 (주)담당자 휴대폰번호 {invoiceeHP1} 값으로 문자 전송
// - 전송 시 포인트 차감되며, 전송실패시 환불처리
$Taxinvoice->invoicerSMSSendYN = false;

/**********************************************************************
 * 공급받는자 정보
 *********************************************************************/

// 공급받는자 구분, [사업자, 개인, 외국인] 중 기재
$Taxinvoice->invoiceeType = "사업자";

// 공급받는자 사업자번호
// - {invoiceeType}이 "사업자" 인 경우, 사업자번호 (하이픈 ('-') 제외 10자리)
// - {invoiceeType}이 "개인" 인 경우, 주민등록번호 (하이픈 ('-') 제외 13자리)
// - {invoiceeType}이 "외국인" 인 경우, "9999999999999" (하이픈 ('-') 제외 13자리)
$Taxinvoice->invoiceeCorpNum = "8888888888";

// 공급받는자 종사업장 식별번호, 필요시 숫자4자리 기재
$Taxinvoice->invoiceeTaxRegID = "";

// 공급받는자 상호
$Taxinvoice->invoiceeCorpName = "공급받는자 상호";

// [역발행시 필수] 공급받는자 문서번호, 1~24자리 (숫자, 영문, '-', '_') 를 조합하여 사업자별로 중복되지 않도록 구성
$Taxinvoice->invoiceeMgtKey = "";

// 공급받는자 대표자 성명
$Taxinvoice->invoiceeCEOName = "공급받는자 대표자 성명";

// 공급받는자 주소
$Taxinvoice->invoiceeAddr = "공급받는자 주소";

// 공급받는자 종목
$Taxinvoice->invoiceeBizClass = "공급받는자 업종";

// 공급받는자 업태
$Taxinvoice->invoiceeBizType = "공급받는자 업태";

// 공급받는자 담당자 성명
$Taxinvoice->invoiceeContactName1 = "공급받는자 담당자 성명";

// 공급받는자 담당자 메일주소
// 팝빌 개발환경에서 테스트하는 경우에도 안내 메일이 전송되므로,
// 실제 거래처의 메일주소가 기재되지 않도록 주의
$Taxinvoice->invoiceeEmail1 = "test@invoicee.com";

// 공급받는자 담당자 연락처
$Taxinvoice->invoiceeTEL1 = "070-111-222";

// 공급받는자 담당자 휴대폰번호
$Taxinvoice->invoiceeHP1 = "010-111-222";

// 역발행 안내 문자 전송여부 (true / false 중 택 1)
// └ true = 전송 , false = 미전송
// └ 공급자 담당자 휴대폰번호 {invoicerHP} 값으로 문자 전송
// - 전송 시 포인트 차감되며, 전송실패시 환불처리
$Taxinvoice->invoiceeSMSSendYN = false;

/**********************************************************************
 * 세금계산서 기재정보
 *********************************************************************/


// 일련번호
$Taxinvoice->serialNum = "123";

// 현금
$Taxinvoice->cash = "";

// 수표
$Taxinvoice->chkBill = "";

// 어음
$Taxinvoice->note = "";

// 외상미수금
$Taxinvoice->credit = "";

// 비고
$Taxinvoice->remark2 = "비고2";
$Taxinvoice->remark3 = "비고3";

// 책번호 '권' 항목, 최대값 32767
$Taxinvoice->kwon = 1;

// 책번호 '호' 항목, 최대값 32767
$Taxinvoice->ho = 1;

// 사업자등록증 이미지 첨부여부 (true / false 중 택 1)
// └ true = 첨부 , false = 미첨부(기본값)
// - 팝빌 사이트 또는 인감 및 첨부문서 등록 팝업 URL (GetSealURL API) 함수를 이용하여 등록
$Taxinvoice->businessLicenseYN = false;

// 통장사본 이미지 첨부여부 (true / false 중 택 1)
// └ true = 첨부 , false = 미첨부(기본값)
// - 팝빌 사이트 또는 인감 및 첨부문서 등록 팝업 URL (GetSealURL API) 함수를 이용하여 등록
$Taxinvoice->bankBookYN = false;

/**********************************************************************
 * 상세항목(품목) 정보
 *********************************************************************/

// 상세항목 객체
$Taxinvoice->detailList = array();

$Taxinvoice->detailList[] = new TaxinvoiceDetail();
$Taxinvoice->detailList[0]->serialNum = 1; // 일련번호, 1부터 순차기재
$Taxinvoice->detailList[0]->purchaseDT = "20230102"; // 거래일자
$Taxinvoice->detailList[0]->itemName = "품목명"; // 품목명
$Taxinvoice->detailList[0]->spec = "규격"; // 규격
$Taxinvoice->detailList[0]->qty = "1"; // 수량
$Taxinvoice->detailList[0]->unitCost = "50000"; // 단가
$Taxinvoice->detailList[0]->supplyCost = "50000"; // 공급가액
$Taxinvoice->detailList[0]->tax = "5000"; // 세액
$Taxinvoice->detailList[0]->remark = "품목비고"; // 비고

$Taxinvoice->detailList[] = new TaxinvoiceDetail();
$Taxinvoice->detailList[1]->serialNum = 2; // 일련번호, 1부터 순차기재
$Taxinvoice->detailList[1]->purchaseDT = "20230102"; // 거래일자
$Taxinvoice->detailList[1]->itemName = "품목명2"; // 품목명
$Taxinvoice->detailList[1]->spec = "규격"; // 규격
$Taxinvoice->detailList[1]->qty = "1"; // 수량
$Taxinvoice->detailList[1]->unitCost = "50000"; // 단가
$Taxinvoice->detailList[1]->supplyCost = "50000"; // 공급가액
$Taxinvoice->detailList[1]->tax = "5000"; // 세액
$Taxinvoice->detailList[1]->remark = "품목비고2"; // 비고

/**********************************************************************
 * 추가담당자 정보 - 세금계산서 발행 안내 메일을 수신받을 공급받는자 담당자가 다수인 경우 - 담당자 정보를 추가하여 발행 안내메일을 다수에게 전송할 수
 * 있습니다. (최대 5명)
 *********************************************************************/
$Taxinvoice->addContactList = array();
$Taxinvoice->addContactList[] = new TaxinvoiceAddContact();
$Taxinvoice->addContactList[0]->serialNum = 1;
$Taxinvoice->addContactList[0]->contactName = "추가 담당자 성명";
$Taxinvoice->addContactList[0]->email = "test2@test.com";


// 즉시발행 메모
$Memo = "수정세금계산서 발행 메모";

// 지연발행 강제여부  (true / false 중 택 1)
// └ true = 가능 , false = 불가능
// - 미입력 시 기본값 false 처리
// - 발행마감일이 지난 세금계산서를 발행하는 경우, 가산세가 부과될 수 있습니다.
// - 가산세가 부과되더라도 발행을 해야하는 경우에는 forceIssue의 값을
//   true로 선언하여 발행(Issue API)를 호출하시면 됩니다.
$ForceIssue = false;

// 팝빌회원 아이디
$UserID = "testkorea";

// 거래명세서 동시작성 여부
$writeSpecification = false;

//세금계산서 발행 안내메일 제목
$emailSubject = "세금계산서 발행 안내메일 제목 ";

// 거래명세서 문서번호 할당
// ※ 미입력시 기본값 세금계산서 문서번호와 동일하게 할당
$dealInvoiceMgtKey = "";

try {
    $result = $TaxinvoiceService->RegistIssue(
        $CorpNum,
        $Taxinvoice,
        $UserID,
        $writeSpecification,
        $ForceIssue,
        $Memo,
        $emailSubject,
        $dealInvoiceMgtKey
    );
    $code = $result->code;
    $message = $result->message;
    $ntsConfirmNum = $result->ntsConfirmNum;
} catch (PopbillException $pe) {
    $code = $pe->getCode();
    $message = $pe->getMessage();
    $ntsConfirmNum = null;
}


?>
  <body>
    <div id="content">
      <p class="heading1">Response</p>
      <br/>
      <fieldset class="fieldset1">
        <legend>전자세금계산서 즉시발행</legend>
        <ul>
          <li>응답코드 (code) : <?php echo $code ?></li>
          <li>응답메시지 (message) : <?php echo $message ?></li>
          <?php
            if ( isset($ntsConfirmNum) ) {
          ?>
            <li>국세청승인번호 (ntsConfirmNum) : <?php echo $ntsConfirmNum ?></li>
          <?php
            }
          ?>
        </ul>
      </fieldset>
     </div>
  </body>
</html>
