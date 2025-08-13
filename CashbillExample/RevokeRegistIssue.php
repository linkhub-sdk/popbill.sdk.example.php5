<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
/**
 * 취소 현금영수증 데이터를 팝빌에 저장과 동시에 발행하여 "발행완료" 상태로 처리합니다.
 * - 취소 현금영수증의 거래금액의 합은 당초의 거래금액을 넘을 수 없습니다.
 * - 현금영수증 국세청 전송 정책 [https://developers.popbill.com/guide/cashbill/php/introduction/policy-of-send-to-nts]
 * - 취소 현금영수증 발행 시 구매자 메일주소로 발행 안내 베일이 전송되니 유의하시기 바랍니다.
 * - https://developers.popbill.com/reference/cashbill/php/api/issue#RevokeRegistIssue
 */

include 'common.php';

// 팝빌회원 사업자번호, '-' 제외 10자리
$CorpNum = '1234567890';

// 문서번호, 최대 24자리, 영문, 숫자 '-', '_'를 조합하여 사업자별로 중복되지 않도록 구성
$MgtKey = '20230102-PHP5-010';

// 당초 승인번호, 문서정보 확인(GetInfo API) 함수를 통해 확인가능.
$orgConfirmNum = 'TB0000068';

// 당초 거래일자, 문서정보 확인(GetInfo API) 함수를 통해 확인가능.
$orgTradeDate = '20230103';

// 안내 문자 전송여부 , true / false 중 택 1
// └ true = 전송 , false = 미전송
// └ 당초의 구매자(고객)의 휴대폰번호 문자 전송
$smssendYN = false;

// 현금영수증 상태 이력을 관리하기 위한 메모
$Memo = "취소 현금영수증 발행 메모";

// 팝빌회원 아이디
$UserID = 'testkorea';

// 현금영수증 취소유형 - false 기재
$isPartCancel = false;

// 취소사유 , 1 / 2 / 3 중 택 1
// └ 1 = 거래취소 , 2 = 오류발급취소 , 3 = 기타
// └ 미입력시 기본값 1 처리
$cancelType = 1;


try {
    $result = $CashbillService->RevokeRegistIssue($CorpNum, $MgtKey, $orgConfirmNum, $orgTradeDate, $smssendYN, $Memo, $UserID, $isPartCancel, $cancelType);
    $code = $result->code;
    $message = $result->message;
    $confirmNum = $result->confirmNum;
    $tradeDate = $result->tradeDate;
} catch (PopbillException $pe) {
    $code = $pe->getCode();
    $message = $pe->getMessage();
}
?>

<body>
    <div id="content">
        <p class="heading1">Response</p>
        <br />
        <fieldset class="fieldset1">
            <legend>취소현금영수증 즉시발행</legend>
            <ul>
                <li>code (응답 코드) : <?php echo $code ?></li>
                <li>message (응답 메시지) : <?php echo $message ?></li>
                <?php
                if (isset($confirmNum)) {
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