<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 작성된 (부분)취소 현금영수증 데이터를 팝빌에 저장과 동시에 발행하여 "발행완료" 상태로 처리합니다.
     * - 취소 현금영수증의 금액은 원본 금액을 넘을 수 없습니다.
     * - 현금영수증 국세청 전송 정책 [https://developers.popbill.com/guide/cashbill/php/introduction/policy-of-send-to-nts]
     * - 취소 현금영수증 발행 시 구매자 메일주소로 발행 안내 베일이 전송되니 유의하시기 바랍니다.
     * - https://developers.popbill.com/reference/cashbill/php/api/issue#RevokeRegistIssue
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    // 문서번호, 최대 24자리, 영문, 숫자 '-', '_'를 조합하여 사업자별로 중복되지 않도록 구성
    $MgtKey = '20230202-PHP5-011';

    // 원본현금영수증 승인번호, 문서정보 확인(GetInfo API) 함수를 통해 확인가능.
    $orgConfirmNum = 'TB0000068';

    // 원본현금영수증 거래일자, 문서정보 확인(GetInfo API) 함수를 통해 확인가능.
    $orgTradeDate = '20230102';

    // 안내 문자 전송여부 , true / false 중 택 1
    // └ true = 전송 , false = 미전송
    // └ 원본 현금영수증의 구매자(고객)의 휴대폰번호 문자 전송
    $smssendYN = false;

    // 메모
    $memo = '부분취소현금영수증 발행메모';

    // 현금영수증 취소유형 , true / false 중 택 1
    // └ true = 부분 취소 , false = 전체 취소
    // └ 미입력시 기본값 false 처리
    $isPartCancel = true;

    // 취소사유 , 1 / 2 / 3 중 택 1
    // └ 1 = 거래취소 , 2 = 오류발급취소 , 3 = 기타
    // └ 미입력시 기본값 1 처리
    $cancelType = 1;

    // [취소] 공급가액
    // - 현금영수증 취소유형이 true 인 경우 취소할 공급가액 입력
    // - 현금영수증 취소유형이 false 인 경우 미입력
    $supplyCost = '4000';

    // [취소] 부가세
    // - 현금영수증 취소유형이 true 인 경우 취소할 부가세 입력
    // - 현금영수증 취소유형이 false 인 경우 미입력
    $tax = '400';

    // [취소] 봉사료
    // - 현금영수증 취소유형이 true 인 경우 취소할 봉사료 입력
    // - 현금영수증 취소유형이 false 인 경우 미입력
    $serviceFee = '0';

    // [취소] 거래금액 (공급가액+부가세+봉사료)
    // - 현금영수증 취소유형이 true 인 경우 취소할 거래금액 입력
    // - 현금영수증 취소유형이 false 인 경우 미입력
    $totalAmount = '4400';

    // 현금영수증 발행 안내메일 제목
    $emailSubject = null;

    // 거래일시, 날짜(yyyyMMddHHmmss)
    // 당일, 전일만 가능
    $tradeDT = '20221103190000';


    try {
        $result = $CashbillService->RevokeRegistIssue($CorpNum, $MgtKey, $orgConfirmNum, $orgTradeDate,
            $smssendYN, $memo, $UserID, $isPartCancel, $cancelType, $supplyCost, $tax, $serviceFee, $totalAmount, $emailSubject, $tradeDT);

        $code = $result->code;
        $message = $result->message;
        $confirmNum = $result->confirmNum;
        $tradeDate = $result->tradeDate;
        $tradeDT = $result->tradeDT;
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
                <legend>(부분)취소현금영수증 즉시발행</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                      if ( isset($confirmNum) ) {
                    ?>
                      <li>confirmNum (국세청 승인번호) : <?php echo $confirmNum ?></li>
                      <li>tradeDate : (거래일자) <?php echo $tradeDate ?></li>
                      <li>tradeDT (거래일시) : <?php echo $tradeDT ?></li>
                    <?php
                      }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
