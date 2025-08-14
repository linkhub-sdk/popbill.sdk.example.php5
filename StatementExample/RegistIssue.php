<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
    <title>팝빌 SDK PHP 5.X Example.</title>
  </head>
<?php
    /**
     * 작성된 전자명세서 데이터를 팝빌에 저장과 동시에 발행하여, "발행완료" 상태로 처리합니다.
     * - 팝빌 사이트 [전자명세서] > [환경설정] > [전자명세서 관리] 메뉴의 발행시 자동승인 옵션 설정을 통해 전자명세서를 "발행완료" 상태가 아닌 "승인대기" 상태로 발행 처리 할 수 있습니다.
     * - https://developers.popbill.com/reference/statement/php/api/issue#RegistIssue
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    // 전자명세서 객체 생성
    $Statement = new Statement();

    // 전자명세서 문서 유형
    $Statement->itemCode = '121';

    // 전자명세서 문서번호
    $Statement->mgtKey = '20250814-PHPT-003';

    // 맞춤양식코드, 미기재시 기본양식으로 처리
    $Statement->formCode = '';

    // 기재상 작성일자
    $Statement->writeDate = '20250813';

    //  과세형태, (과세, 영세, 면세) 중 기재
    $Statement->taxType = '과세';

    // 영수/청구, ('영수', '청구', '없음') 중 기재
    $Statement->purposeType = '영수';

    // 기재상 일련번호 항목
    $Statement->serialNum = '123';

    // 세액 합계
    $Statement->taxTotal = '20000';

    // 공급가액 합계
    $Statement->supplyCostTotal = '200000' ;

    // 합계금액 (공급가액 합계+세액합계)
    $Statement->totalAmount = '220000';

    $Statement->remark1 = '비고1';
    $Statement->remark2 = '비고2';
    $Statement->remark3 = '비고3';


    /************************************************************
     *                         공급자 정보
     ************************************************************/
    $Statement->senderCorpNum = $CorpNum;
    $Statement->senderTaxRegID = '';
    $Statement->senderCorpName = '공급자 상호';
    $Statement->senderCEOName = '공급자 대표자 성명';
    $Statement->senderAddr = ' 공급자 주소';
    $Statement->senderBizClass = '공급자 업종';
    $Statement->senderBizType = '공급자 업태';
    $Statement->senderContactName = '공급자 담당자명';
    $Statement->senderTEL = '';
    $Statement->senderHP = '';
    $Statement->senderEmail = '';


    /************************************************************
     *                         공급받는자 정보
     ************************************************************/
    $Statement->receiverCorpNum = '8888888888';
    $Statement->receiverTaxRegID = '';						// 공급받는자 종사업장 식별번호, 필요시 기재. 형식은 숫자 4자리
    $Statement->receiverCorpName = '공급받는자 대표자 성명';
    $Statement->receiverCEOName = '공급받는자 대표자 성명';
    $Statement->receiverAddr = '공급받는자 주소';
    $Statement->receiverBizClass = '공급받는자 업종';
    $Statement->receiverBizType = '공급받는자 업태';
    $Statement->receiverContactName = '공급받는자 담당자명';
    $Statement->receiverTEL = '';
    $Statement->receiverHP = '';
    $Statement->receiverEmail = '';

    // 사업자등록증 이미지 첨부여부  (true / false 중 택 1)
    // └ true = 첨부 , false = 미첨부(기본값)
    // - 팝빌 사이트 또는 인감 및 첨부문서 등록 팝업 URL (GetSealURL API) 함수를 이용하여 등록
    $Statement->businessLicenseYN = False;

    // 통장사본 이미지 첨부여부  (true / false 중 택 1)
    // └ true = 첨부 , false = 미첨부(기본값)
    // - 팝빌 사이트 또는 인감 및 첨부문서 등록 팝업 URL (GetSealURL API) 함수를 이용하여 등록
    $Statement->bankBookYN = False;

    // 알림문자 전송 여부
    $Statement->smssendYN = False;



    // 전자명세서 추가속성
    $Statement->propertyBag = array(
        'Balance' => '50000',
        'Deposit' => '100000',
        'CBalance' => '150000'
    );

    /************************************************************
     *                       상세항목(품목) 정보
     ************************************************************/
    $Statement->detailList = array();

    $Statement->detailList[0] = new StatementDetail();
    $Statement->detailList[0]->serialNum = '1';					//품목 일련번호 1부터 순차 기재
    $Statement->detailList[0]->purchaseDT = '20250813';			//거래일자 yyyyMMdd
    $Statement->detailList[0]->itemName = '품명';
    $Statement->detailList[0]->spec = '규격';
    $Statement->detailList[0]->qty = '1';						//수량
    $Statement->detailList[0]->unitCost = '100000';
    $Statement->detailList[0]->supplyCost = '100000';
    $Statement->detailList[0]->tax = '10000';
    $Statement->detailList[0]->remark = '비고';
    $Statement->detailList[0]->spare1 = 'spare1';
    $Statement->detailList[0]->spare2 = 'spare2';
    $Statement->detailList[0]->spare3 = 'spare3';
    $Statement->detailList[0]->spare4 = 'spare4';
    $Statement->detailList[0]->spare5 = 'spare5';

    $Statement->detailList[1] = new StatementDetail();
    $Statement->detailList[1]->serialNum = '2';					//품목 일련번호 순차기재
    $Statement->detailList[1]->purchaseDT = '20250813';			//거래일자 yyyyMMdd
    $Statement->detailList[1]->itemName = '품명';
    $Statement->detailList[1]->spec = '규격';
    $Statement->detailList[1]->qty = '1';
    $Statement->detailList[1]->unitCost = '100000';
    $Statement->detailList[1]->supplyCost = '100000';
    $Statement->detailList[1]->tax = '10000';
    $Statement->detailList[1]->remark = '비고';
    $Statement->detailList[1]->spare1 = 'spare1';
    $Statement->detailList[1]->spare2 = 'spare2';
    $Statement->detailList[1]->spare3 = 'spare3';
    $Statement->detailList[1]->spare4 = 'spare4';
    $Statement->detailList[1]->spare5 = 'spare5';

     // 메모
    $memo = '즉시발행 메모';

    // 팝빌 회원 아이디
    $UserID  = 'testkorea';

     // 발행 안내메일 제목
     // 공백처리시 기본양식으로 전송됨.
    $emailSubject = null;

    try {
        $result = $StatementService->RegistIssue($CorpNum, $Statement, $memo, $UserID, $emailSubject);
        $code = $result->code;
        $message = $result->message;
        $invoiceNum = $result->invoiceNum;
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
        <legend>전자명세서 즉시발행</legend>
        <ul>
          <li>응답코드 (code) : <?php echo $code ?></li>
          <li>응답메시지 (message) : <?php echo $message ?></li>
          <?php
              if ( isset($invoiceNum) ) {
          ?>
          <li>팝빌 승인번호 (invoiceNum) : <?php echo $invoiceNum ?></li>
          <?php
              }
          ?>
        </ul>
      </fieldset>
     </div>
  </body>
</html>
