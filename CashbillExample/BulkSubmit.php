<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 최대 100건의 현금영수증 발행을 한번의 요청으로 접수합니다.
     * - https://docs.popbill.com/cashbill/php/api#BulkSubmit
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, '-' 제외 10자리
    $testCorpNum = '1234567890';

    // 제출아이디, 대량 발행 접수를 구별하는 식별키
    // └ 최대 36자리 영문, 숫자, '-' 조합으로 구성
    $submitID = "20220324-PHP5-BULK";

    // 최대 100건
    $cashbillList = array();

    for($i=0; $i<100; $i++) {
        // 현금영수증 객체 생성
        $Cashbill = new Cashbill();

        // 현금영수증 문서번호, 1~24자리 (숫자, 영문, '-', '_') 조합으로 사업자 별로 중복되지 않도록 구성
        $Cashbill->mgtKey = $submitID . "-" . $i;

        // 문서형태, {승인거래, 취소거래} 중 기재
        $Cashbill->tradeType = '승인거래';

        // 거래구분, (소득공제용, 지출증빙용) 중 기재
        $Cashbill->tradeUsage = '소득공제용';

        // 거래유형, {일반, 도서공연, 대중교통} 중 기재
        // - 미입력시 기본값 "일반" 처리
        $Cashbill->tradeOpt = '일반';

        // // 원본 현금영수증 국세청 승인번호
        // // 취소 현금영수증 작성시 필수
        // $Cashbill->orgConfirmNum = '';
        //
        // // 원본 현금영수증 거래일자
        // // 취소 현금영수증 작성시 필수
        // $Cashbill->orgTradeDate = '';

        // 과세형태, (과세, 비과세) 중 기재
        $Cashbill->taxationType = '과세';

        // 거래금액, ','콤마 불가 숫자만 가능
        $Cashbill->totalAmount = '11000';

        // 공급가액, ','콤마 불가 숫자만 가능
        $Cashbill->supplyCost = '10000';

        // 부가세, ','콤마 불가 숫자만 가능
        $Cashbill->tax = '1000';

        // 봉사료, ','콤마 불가 숫자만 가능
        $Cashbill->serviceFee = '0';

        // 가맹점 사업자번호, '-'제외 10자리
        $Cashbill->franchiseCorpNum = $testCorpNum;

        // 가맹점 종사업장 식별번호
        $Cashbill->franchiseTaxRegID = "";

        // 가맹점 상호
        $Cashbill->franchiseCorpName = '발행자 상호';

        // 가맹점 대표자 성명
        $Cashbill->franchiseCEOName = '발행자 대표자명';

        // 가맹점 주소
        $Cashbill->franchiseAddr = '발행자 주소';

        // 가맹점 전화번호
        $Cashbill->franchiseTEL = '070-1234-1234';

        // 식별번호, 거래구분에 따라 작성
        // └ 소득공제용 - 주민등록/휴대폰/카드번호(현금영수증 카드)/자진발급용 번호(010-000-1234) 기재가능
        // └ 지출증빙용 - 사업자번호/주민등록/휴대폰/카드번호(현금영수증 카드) 기재가능
        // └ 주민등록번호 13자리, 휴대폰번호 10~11자리, 카드번호 13~19자리, 사업자번호 10자리 입력 가능
        $Cashbill->identityNum = '0101112222';

        // 주문자명
        $Cashbill->customerName = '주식회사주문자명담당자';

        // 주문상품명
        $Cashbill->itemName = '상품명';

        // 주문번호
        $Cashbill->orderNumber = '주문번호';

        // 주문자 이메일
        // 팝빌 개발환경에서 테스트하는 경우에도 안내 메일이 전송되므로,
        // 실제 거래처의 메일주소가 기재되지 않도록 주의
        $Cashbill->email = '';

        // 발행시 알림문자 전송여부
        $Cashbill->smssendYN = false;

        // 주문자 휴대폰
        // - {smssendYN} 의 값이 true 인 경우 아래 휴대폰번호로 안내 문자 전송
        $Cashbill->hp = '';

        $cashbillList[] = $Cashbill;
    }

    try {
        $result = $CashbillService->BulkSubmit($testCorpNum, $submitID, $cashbillList);
        $code = $result->code;
        $message = $result->message;
        $receiptID = $result->receiptID;
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
                <legend>현금영수증 초대량 발행 접수</legend>
                <ul>
                    <li>Response.code : <?php echo $code ?></li>
                    <li>Response.message : <?php echo $message ?></li>
                    <?php
                      if ( isset($receiptID) ) {
                    ?>
                      <li>Response.$receiptID : <?php echo $receiptID ?></li>
                    <?php
                      }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
