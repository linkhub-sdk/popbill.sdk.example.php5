<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 1건의 현금영수증을 [임시저장]합니다.
     * - [임시저장] 상태의 현금영수증은 발행(Issue API) 함수를 호출해야만 국세청에 전송됩니다.
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, '-' 제외 10자리
    $testCorpNum = '1234567890';

    // 문서번호, 발행자별 중복없이 1~24자리 영문,숫자로 구성
    $mgtKey = '20220324-PHP5-002';

    // 현금영수증 객체 생성
    $Cashbill = new Cashbill();

    // 현금영수증 문서번호,
    $Cashbill->mgtKey = $mgtKey;

    // 문서형태, (승인거래, 취소거래) 중 기재
    $Cashbill->tradeType = '승인거래';

    // 거래구분, (소득공제용, 지출증빙용) 중 기재
    $Cashbill->tradeUsage = '소득공제용';

    // 거래유형, (일반, 도서공연, 대중교통) 중 기재
    // - 미입력시 기본값 "일반" 처리
    $Cashbill->tradeOpt = '일반';

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

    // 가맹점 사업자번호
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
    $Cashbill->identityNum = '01011112222';

    // 주문자명
    $Cashbill->customerName = '고객명';

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

    try {
        $result = $CashbillService->Register($testCorpNum, $Cashbill);
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
                <legend>현금영수증 임시저장</legend>
                <ul>
                    <li>Response.code : <?php echo $code ?></li>
                    <li>Response.message : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
