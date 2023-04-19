<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
/**
 * 환불 신청의 상태를 확인합니다.
 * - https://developers.popbill.com/reference/accountcheck/php/api/point#GetRefundInfo
 */

include 'common.php';

// 팝빌 회원 사업자 번호, "-"제외 10자리
$testCorpNum = '1234567890';

// 팝빌 회원 아이디
$testUserID = 'testkorea';

// 환불 신청 코드
$RefundCode;

try {
    $result = $AccountCheckService->GetRefundInfo($testCorpNum, $RefundCode, $testUserID);
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
                <li>reqDT (신청일시) : <?php $result->reqDT ?></li>
                <li>requestPoint (환불 신청포인트) : <?php $result->requestPoint ?></li>
                <li>accountBank (환불계좌 은행명) : <?php $result->accountBank ?></li>
                <li>accountNum (환불계좌번호) : <?php $result->accountNum ?></li>
                <li>accountName (환불계좌 예금주명) : <?php $result->accountName ?></li>
                <li>state (상태) : <?php $result->state ?></li>
                <li>reason (환불사유) : <?php $result->reason ?></li>
            </ul>
        </fieldset>
    </div>
</body>

</html>