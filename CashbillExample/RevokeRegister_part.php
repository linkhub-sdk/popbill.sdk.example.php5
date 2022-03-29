<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 1건의 (부분)취소현금영수증을 [임시저장]합니다.
     * - [임시저장] 상태의 현금영수증은 발행(Issue API) 함수를 호출해야만 국세청에 전송됩니다.
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $testCorpNum = '1234567890';

    // 팝빌회원 아이디
    $testUserID = 'testkorea';

    // 문서번호, 최대 24자리, 영문, 숫자 '-', '_'를 조합하여 사업자별로 중복되지 않도록 구성
    $mgtKey = '20220324-PHP5-004';

    // 원본현금영수증 승인번호, 문서정보 확인(GetInfo API) 함수를 통해 확인가능.
    $orgConfirmNum = 'TB0010307';

    // 원본현금영수증 거래일자, 문서정보 확인(GetInfo API) 함수를 통해 확인가능.
    $orgTradeDate = '20220323';

    // 안내 문자 전송여부 , true / false 중 택 1
    // └ true = 전송 , false = 미전송
    // └ 원본 현금영수증의 구매자(고객)의 휴대폰번호 문자 전송
    $smssendYN = false;

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


    try {
        $result = $CashbillService->RevokeRegister($testCorpNum, $mgtKey, $orgConfirmNum, $orgTradeDate,
            $smssendYN, $testUserID, $isPartCancel, $cancelType, $supplyCost, $tax, $serviceFee, $totalAmount);

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
                <legend>(부분)취소현금영수증 임시저장</legend>
                <ul>
                    <li>Response.code : <?php echo $code ?></li>
                    <li>Response.message : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
