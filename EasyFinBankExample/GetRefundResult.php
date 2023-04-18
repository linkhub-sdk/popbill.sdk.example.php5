<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
/**
 * 환불 신청의 상태를 확인합니다.
 * - https://developers.popbill.com/reference/easyfinbank/php/api/point#GetRefundResult
 */

include 'common.php';

// 팝빌 회원 사업자 번호, "-"제외 10자리
$testCorpNum = '1234567890';

// 팝빌 회원 아이디
$testUserID = 'testkorea';

// 환불 신청 코드
$RefundCode;

try {
    $result = $EasyFinBankService->GetRefundResult($testCorpNum, $RefundCode, $testUserID);
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
            <legend>환불 신청 상태 조회</legend>
            <ul>
                <li>refundableBalance (환불 가능 포인트) : <?php $result->refundableBalance ?></li>
                <li>reqDT () : <?php $result->reqDT ?></li>
                <li>requestPoint () : <?php $result->requestPoint ?></li>
                <li>accountBank () : <?php $result->accountBank ?></li>
                <li>accountNum () : <?php $result->accountNum ?></li>
                <li>accountName () : <?php $result->accountName ?></li>
                <li>state () : <?php $result->state ?></li>
                <li>reason () : <?php $result->reason ?></li>
            </ul>
        </fieldset>
    </div>
</body>

</html>