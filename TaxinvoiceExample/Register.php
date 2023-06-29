<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 작성된 세금계산서 데이터를 팝빌에 저장합니다.
     * - "임시저장" 상태의 세금계산서는 발행(Issue) 함수를 호출하여 "발행완료" 처리한 경우에만 국세청으로 전송됩니다.
     * - 정발행 시 임시저장(Register)과 발행(Issue)을 한번의 호출로 처리하는 즉시발행(RegistIssue API) 프로세스 연동을 권장합니다.
     * - 역발행 시 임시저장(Register)과 역발행요청(Request)을 한번의 호출로 처리하는 즉시요청(RegistRequest API) 프로세스 연동을 권장합니다.
     * - 세금계산서 파일첨부 기능을 구현하는 경우, 임시저장(Register API) -> 파일첨부(AttachFile API) -> 발행(Issue API) 함수를 차례로 호출합니다.
     * - 임시저장된 세금계산서는 팝빌 사이트 '임시문서함'에서 확인 가능합니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/issue#Register
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    // 세금계산서 문서번호
    // - 영문 대소문자, 숫자, 특수문자('-','_')만 이용 가능
    $invoicerMgtKey = '20230102-PHP5-002';

    /************************************************************
     *                        세금계산서 정보
     ************************************************************/

    // 세금계산서 객체 생성
    $Taxinvoice = new Taxinvoice();

    // 작성일자, 형식(yyyyMMdd) 예)20150101
    $Taxinvoice->writeDate = '20230102';

    // 발행형태, '정발행', '역발행', '위수탁' 중 기재
    $Taxinvoice->issueType = '정발행';

    // 과금방향, {정과금, 역과금} 중 기재
    // └ 정과금 = 공급자 과금 , 역과금 = 공급받는자 과금
    // -'역과금'은 역발행 세금계산서 발행 시에만 이용가능
    $Taxinvoice->chargeDirection = '정과금';

    // '영수', '청구' 중 기재
    $Taxinvoice->purposeType = '영수';

    // 과세형태, '과세', '영세', '면세' 중 기재
    $Taxinvoice->taxType = '과세';

    /************************************************************
     *                         공급자 정보
     ************************************************************/

    // 공급자 사업자번호
    $Taxinvoice->invoicerCorpNum = $CorpNum;

    // 공급자 종사업장 식별번호, 4자리 숫자 문자열
    $Taxinvoice->invoicerTaxRegID = '';

    // 공급자 상호
    $Taxinvoice->invoicerCorpName = '공급자상호';

    // 공급자 문서번호, 최대 24자리, 영문, 숫자 '-', '_'를 조합하여 사업자별로 중복되지 않도록 구성
    $Taxinvoice->invoicerMgtKey = $invoicerMgtKey;

    // 공급자 대표자성명
    $Taxinvoice->invoicerCEOName = '공급자 대표자성명';

    // 공급자 주소
    $Taxinvoice->invoicerAddr = '공급자 주소';

    // 공급자 종목
    $Taxinvoice->invoicerBizClass = '공급자 종목';

    // 공급자 업태
    $Taxinvoice->invoicerBizType = '공급자 업태';

    // 공급자 담당자 성명
    $Taxinvoice->invoicerContactName = '공급자 담당자성명';

    // 공급자 담당자 메일주소
    $Taxinvoice->invoicerEmail = '';

    // 공급자 담당자 연락처
    $Taxinvoice->invoicerTEL = '';

    // 공급자 휴대폰 번호
    $Taxinvoice->invoicerHP = '';

    // 발행 안내 문자 전송여부 (true / false 중 택 1)
    // └ true = 전송 , false = 미전송
    // └ 공급받는자 (주)담당자 휴대폰번호 {invoiceeHP1} 값으로 문자 전송
    // - 전송 시 포인트 차감되며, 전송실패시 환불처리
    $Taxinvoice->invoicerSMSSendYN = false;


    /************************************************************
     *                      공급받는자 정보
     ************************************************************/

    // 공급받는자 구분, '사업자', '개인', '외국인' 중 기재
    $Taxinvoice->invoiceeType = '사업자';

    // 공급받는자 사업자번호
    // - {invoiceeType}이 "사업자" 인 경우, 사업자번호 (하이픈 ('-') 제외 10자리)
    // - {invoiceeType}이 "개인" 인 경우, 주민등록번호 (하이픈 ('-') 제외 13자리)
    // - {invoiceeType}이 "외국인" 인 경우, "9999999999999" (하이픈 ('-') 제외 13자리)
    $Taxinvoice->invoiceeCorpNum = '8888888888';

    // 공급받는자 종사업장 식별번호, 4자리 숫자 문자열
    $Taxinvoice->invoiceeTaxRegID = '';

    // 공급자 상호
    $Taxinvoice->invoiceeCorpName = '공급받는자 상호';

    // [역발행시 필수] 공급받는자 문서번호, 최대 24자리, 영문, 숫자 '-', '_'를 조합하여 사업자별로 중복되지 않도록 구성
    $Taxinvoice->invoiceeMgtKey = '';

    // 공급받는자 대표자성명
    $Taxinvoice->invoiceeCEOName = '공급받는자 대표자성명';

    // 공급받는자 주소
    $Taxinvoice->invoiceeAddr = '공급받는자 주소';

    // 공급받는자 업태
    $Taxinvoice->invoiceeBizType = '공급받는자 업태';

    // 공급받는자 종목
    $Taxinvoice->invoiceeBizClass = '공급받는자 종목';

    // 공급받는자 담당자 성명
    $Taxinvoice->invoiceeContactName1 = '공급받는자 담당자성명';

    // 공급받는자 담당자 메일주소
    // 팝빌 개발환경에서 테스트하는 경우에도 안내 메일이 전송되므로,
    // 실제 거래처의 메일주소가 기재되지 않도록 주의
    $Taxinvoice->invoiceeEmail1 = '';

    // 공급받는자 담당자 연락처
    $Taxinvoice->invoiceeTEL1 = '';

    // 공급받는자 담당자 휴대폰 번호
    $Taxinvoice->invoiceeHP1 = '';

    // 역발행 안내 문자 전송여부 (true / false 중 택 1)
    // └ true = 전송 , false = 미전송
    // └ 공급자 담당자 휴대폰번호 {invoicerHP} 값으로 문자 전송
    // - 전송 시 포인트 차감되며, 전송실패시 환불처리
    $Taxinvoice->invoiceeSMSSendYN = false;


    /************************************************************
     *                       세금계산서 기재정보
     ************************************************************/

    // 공급가액 합계
    $Taxinvoice->supplyCostTotal = '200000';

    // 세액 합계
    $Taxinvoice->taxTotal = '20000';

    // 합계금액, (공급가액 합계 + 세액 합계)
    $Taxinvoice->totalAmount = '220000';

    // 기재상 '일련번호'항목
    $Taxinvoice->serialNum = '123';

    // 기재상 '현금'항목
    $Taxinvoice->cash = '';

    // 기재상 '수표'항목
    $Taxinvoice->chkBill = '';
    // 기재상 '어음'항목
    $Taxinvoice->note = '';

    // 기재상 '외상'항목
    $Taxinvoice->credit = '';

    // 비고
    // {invoiceeType}이 "외국인" 이면 remark1 필수
    // - 외국인 등록번호 또는 여권번호 입력
    $Taxinvoice->remark1 = '비고1';
    $Taxinvoice->remark2 = '비고2';
    $Taxinvoice->remark3 = '비고3';

    // 기재상 '권' 항목, 최대값 32767
    // 미기재시 $Taxinvoice->kwon = null;
    $Taxinvoice->kwon = 1;

    // 기재상 '호' 항목, 최대값 32767
    // 미기재시 $Taxinvoice->ho = null;
    $Taxinvoice->ho = 1;

    // 사업자등록증 이미지 첨부여부  (true / false 중 택 1)
    // └ true = 첨부 , false = 미첨부(기본값)
    // - 팝빌 사이트 또는 인감 및 첨부문서 등록 팝업 URL (GetSealURL API) 함수를 이용하여 등록
    $Taxinvoice->businessLicenseYN = false;

    // 통장사본 이미지 첨부여부  (true / false 중 택 1)
    // └ true = 첨부 , false = 미첨부(기본값)
    // - 팝빌 사이트 또는 인감 및 첨부문서 등록 팝업 URL (GetSealURL API) 함수를 이용하여 등록
    $Taxinvoice->bankBookYN = false;



    /************************************************************
     *                     수정 세금계산서 기재정보
     * - 수정세금계산서 관련 정보는 연동매뉴얼 또는 개발가이드 링크 참조
     * - [참고] 수정세금계산서 작성방법 안내 - https://developers.popbill.com/guide/taxinvoice/php/introduction/modified-taxinvoice
     ************************************************************/

    // 수정사유코드, 수정사유에 따라 1~6중 선택기재
    // $Taxinvoice->modifyCode = '';

    // 원본세금계산서의 국세청 승인번호 기재
    // $Taxinvoice->orgNTSConfirmNum = '';


    /************************************************************
     *                       상세항목(품목) 정보
     ************************************************************/

    $Taxinvoice->detailList = array();

    $Taxinvoice->detailList[] = new TaxinvoiceDetail();
    $Taxinvoice->detailList[0]->serialNum = 1;				      // [상세항목 배열이 있는 경우 필수] 일련번호 1~99까지 순차기재,
    $Taxinvoice->detailList[0]->purchaseDT = '20230102';	  // 거래일자
    $Taxinvoice->detailList[0]->itemName = '품목명1번';	  	// 품명
    $Taxinvoice->detailList[0]->spec = '';				      // 규격
    $Taxinvoice->detailList[0]->qty = '';					        // 수량
    $Taxinvoice->detailList[0]->unitCost = '';		    // 단가
    $Taxinvoice->detailList[0]->supplyCost = '100000';		  // 공급가액
    $Taxinvoice->detailList[0]->tax = '10000';				      // 세액
    $Taxinvoice->detailList[0]->remark = '';		    // 비고

    $Taxinvoice->detailList[] = new TaxinvoiceDetail();
    $Taxinvoice->detailList[1]->serialNum = 2;				      // [상세항목 배열이 있는 경우 필수] 일련번호 1~99까지 순차기재,
    $Taxinvoice->detailList[1]->purchaseDT = '20230102';	  // 거래일자
    $Taxinvoice->detailList[1]->itemName = '품목명2번';	  	// 품명
    $Taxinvoice->detailList[1]->spec = '';				      // 규격
    $Taxinvoice->detailList[1]->qty = '';					        // 수량
    $Taxinvoice->detailList[1]->unitCost = '';		    // 단가
    $Taxinvoice->detailList[1]->supplyCost = '100000';		  // 공급가액
    $Taxinvoice->detailList[1]->tax = '10000';				      // 세액
    $Taxinvoice->detailList[1]->remark = '';		    // 비고



    /************************************************************
     *                      추가담당자 정보
     * - 세금계산서 발행안내 메일을 수신받을 공급받는자 담당자가 다수인 경우
     * 추가 담당자 정보를 등록하여 발행안내메일을 다수에게 전송할 수 있습니다. (최대 5명)
     ************************************************************/

    $Taxinvoice->addContactList = array();

    $Taxinvoice->addContactList[] = new TaxinvoiceAddContact();
    $Taxinvoice->addContactList[0]->serialNum = 1;				        // 일련번호 1부터 순차기재
    $Taxinvoice->addContactList[0]->email = 'test@test.com';	    // 이메일주소
    $Taxinvoice->addContactList[0]->contactName	= '팝빌담당자';		// 담당자명

    $Taxinvoice->addContactList[] = new TaxinvoiceAddContact();
    $Taxinvoice->addContactList[1]->serialNum = 2;			        	// 일련번호 1부터 순차기재
    $Taxinvoice->addContactList[1]->email = 'test@test.com';	    // 이메일주소
    $Taxinvoice->addContactList[1]->contactName	= '링크허브';		  // 담당자명

    // 전자거래명세서 동시작성 여부
    $writeSpecification = false;

    try {
        $result = $TaxinvoiceService->Register($CorpNum, $Taxinvoice);
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
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
