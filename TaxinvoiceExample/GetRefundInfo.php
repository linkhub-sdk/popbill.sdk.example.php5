<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
/**
 * 포인트 환불에 대한 상세정보 1건을 확인합니다.
 * - https://developers.popbill.com/reference/taxinvoice/php/api/point#GetRefundInfo
 */

include 'common.php';

// 팝빌 회원 사업자 번호, "-"제외 10자리
$CorpNum = '1234567890';

// 팝빌 회원 아이디
$UserID = 'testkorea';

// 환불코드
$RefundCode="023040000017";

try {
    $result = $TaxinvoiceService->GetRefundInfo($CorpNum, $RefundCode, $UserID);

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
                <?php
                    if( isset ( $code ) ) {
                ?>
                <li>code (응답 코드) : <?php echo $code ?></li>
                <li>message (응답 메시지) : <?php echo $message ?></li>
                <?php
                    } else {
                ?>
                    <li>reqDT (신청일시) : <?php echo $result->reqDT ?></li>
                    <li>requestPoint (환불 신청포인트) : <?php echo $result->requestPoint ?></li>
                    <li>accountBank (환불계좌 은행명) : <?php echo $result->accountBank ?></li>
                    <li>accountNum (환불계좌번호) : <?php echo $result->accountNum ?></li>
                    <li>accountName (환불계좌 예금주명) : <?php echo $result->accountName ?></li>
                    <li>state (상태) : <?php echo $result->state ?></li>
                    <li>reason (환불사유) : <?php echo $result->reason ?></li>
                <?php
                    }
                ?>
            </ul>

        </fieldset>
    </div>
</body>

</html>