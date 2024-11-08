<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 작성된 현금영수증 데이터를 팝빌에 저장과 동시에 발행하여 "발행완료" 상태로 처리합니다.
     * - 현금영수증 국세청 전송 정책 : https://developers.popbill.com/guide/cashbill/php/introduction/policy-of-send-to-nts
     * - https://developers.popbill.com/reference/cashbill/php/api/issue#RegistIssue
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    // 문서번호, 최대 24자리, 영문, 숫자 '-', '_'를 조합하여 사업자별로 중복되지 않도록 구성
    $MgtKey = '20230101-PHP5-010';

    // 메모
    $memo = '현금영수증 즉시발행 메모';

    // 발행안내메일 제목
    // 미기재시 기본양식으로 전송
    $emailSubject = '';

    // 현금영수증 객체 생성
    $Cashbill = new Cashbill();

    // 현금영수증 문서번호, 1~24자리 (숫자, 영문, '-', '_') 조합으로 사업자 별로 중복되지 않도록 구성
    $Cashbill->mgtKey = $MgtKey;

    // 거래일시, 날짜(yyyyMMddHHmmss)
    // 당일, 전일만 가능
    $Cashbill->tradeDT = '20221103000000';

    // 문서형태, 승인거래 기재
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
    $Cashbill->franchiseCorpNum = $CorpNum;

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

    // 주문주문번호
    $Cashbill->orderNumber = '주문번호';

    // 주문자 이메일
    // 팝빌 테스트 환경에서 테스트하는 경우에도 안내 메일이 전송되므로,
    // 실제 거래처의 메일주소가 기재되지 않도록 주의
    $Cashbill->email = '';

    // 주문자 휴대폰
    // - {smssendYN} 의 값이 true 인 경우 아래 휴대폰번호로 안내 문자 전송
    $Cashbill->hp = '';

    // 발행시 알림문자 전송여부
    $Cashbill->smssendYN = false;

    try {
        $result = $CashbillService->RegistIssue($CorpNum, $Cashbill, $memo, $UserID, $emailSubject);
        $code = $result->code;
        $message = $result->message;
        $confirmNum = $result->confirmNum;
        $tradeDate = $result->tradeDate;
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
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                      if ( isset($confirmNum) ) {
                    ?>
                      <li>confirmNum (국세청 승인번호) : <?php echo $confirmNum ?></li>
                      <li>tradeDate (거래일자) : <?php echo $tradeDate ?></li>
                    <?php
                      }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
