<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * "임시저장" 상태의 전자명세서를 수정합니다.
     * - https://developers.popbill.com/reference/statement/php/api/issue#Update
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    // 전자명세서 문서번호
    // 1~24자리로 영문, 숫자 '-', '_' 조합으로 사업자별로 중복되지 않도록 구성
    $MgtKey = '20230102-PHP5-002';

    // 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
    $itemCode = '121';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    // 전자명세서 객체 생성
    $Statement = new Statement();

    /************************************************************
     *                       전자명세서 정보
     ************************************************************/

    // 기재상 작성일자
    $Statement->writeDate = '20230102';

    // (영수, 청구) 중 기재
    $Statement->purposeType = '청구';

    //  과세형태, (과세, 영세, 면세) 중 기재
    $Statement->taxType = '과세';

    // 맞춤양식코드, 미기재시 기본양식으로 처리
    $Statement->formCode = '';

    // 명세서 종류 코드
    $Statement->itemCode = $itemCode;

    // 전자명세서 문서번호
    $Statement->mgtKey = $MgtKey;


    /************************************************************
     *                         공급자 정보
     ************************************************************/
    $Statement->senderCorpNum = $CorpNum;
    $Statement->senderTaxRegID = '';
    $Statement->senderCorpName = '공급자 상호_수정';
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

    // 팝빌 테스트 환경에서 테스트하는 경우에도 안내 메일이 전송되므로,
    // 실제 거래처의 메일주소가 기재되지 않도록 주의
    $Statement->receiverEmail = '';


    /************************************************************
     *                       전자명세서 기재정보
     ************************************************************/
    $Statement->supplyCostTotal = '200000' ;				// 공급가액 합계
    $Statement->taxTotal = '20000';							// 세액 합계
    $Statement->totalAmount = '220000';						// 합계금액 (공급가액 합계+세액합계)
    $Statement->serialNum = '123';							// 기재상 일련번호 항목
    $Statement->remark1 = '비고1';
    $Statement->remark2 = '비고2';
    $Statement->remark3 = '비고3';

    // 사업자등록증 이미지 첨부여부  (true / false 중 택 1)
    // └ true = 첨부 , false = 미첨부(기본값)
    // - 팝빌 사이트 또는 인감 및 첨부문서 등록 팝업 URL (GetSealURL API) 함수를 이용하여 등록
    $Statement->businessLicenseYN = False;

    // 통장사본 이미지 첨부여부  (true / false 중 택 1)
    // └ true = 첨부 , false = 미첨부(기본값)
    // - 팝빌 사이트 또는 인감 및 첨부문서 등록 팝업 URL (GetSealURL API) 함수를 이용하여 등록
    $Statement->bankBookYN = False;

    //발행시 안내문자 전송여부
    $Statement->smssendYN = False;

    /************************************************************
     *                       상세항목(품목) 정보
     ************************************************************/

    $Statement->detailList = array();

    $Statement->detailList[0] = new StatementDetail();
    $Statement->detailList[0]->serialNum = '1';					//품목 일련번호 1부터 순차 기재
    $Statement->detailList[0]->purchaseDT = '20220324';			//거래일자 yyyyMMdd
    $Statement->detailList[0]->itemName = '품명';
    $Statement->detailList[0]->spec = '규격';
    $Statement->detailList[0]->unit = '단위';
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
    $Statement->detailList[1]->purchaseDT = '20220324';			//거래일자 yyyyMMdd
    $Statement->detailList[1]->itemName = '품명';
    $Statement->detailList[1]->spec = '규격';
    $Statement->detailList[1]->unit = '단위';
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


    /************************************************************
     * 전자명세서 추가속성
     * - 추가속성에 관한 자세한 사항은 "[전자명세서 API 연동매뉴얼] >
     *   5.2. 기본양식 추가속성 테이블"을 참조하시기 바랍니다.
     ************************************************************/
    $Statement->propertyBag = array(
        'Balance' => '50000',
        'Deposit' => '100000',
        'CBalance' => '150000'
    );


    try {
        $result = $StatementService->Update($CorpNum, $itemCode, $MgtKey, $Statement, $UserID);
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
                <legend>전자명세서 수정</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
