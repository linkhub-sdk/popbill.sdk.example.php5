<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen"/>
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
    /**
     * 팝빌에서 반환받은 접수번호를 통해 다수의 수신자에게 팩스를 재전송합니다. (최대 1000건)
     * - 발신/수신 정보 미입력시 기존과 동일한 정보로 팩스가 전송되고, 접수일 기준 최대 60일이 경과되지 않는 건만 재전송이 가능합니다.
     * - 팩스 재전송 요청시 포인트가 차감됩니다. (전송실패시 환불처리)
     * - 변환실패 사유로 전송실패한 팩스 접수건은 재전송이 불가합니다.
     * - https://developers.popbill.com/reference/fax/php/api/send#ResendFAX
     */

    include 'common.php';

    // 팝빌 회원 사업자번호
    $testCorpNum = '1234567890';

    // 팝빌 회원 아이디
    $testUserID = 'testkorea';

    // 팩스 접수번호
    $ReceiptNum = '022032417421600001';

    // 팩스전송 발신번호, 공백처리시 기존전송정보로 재전송
    $Sender = '';

    // 팩스전송 발신자명, 공백처리시 기존전송정보로 재전송
    $SenderName = '발신자명';

    // 팩스수신정보를 기존전송정보와 동일하게 재전송하는 경우, Receivers 변수 null 처리
    //$Receivers = NULL;


    // 팩스수신정보를 기존전송정보와 다르게 재전송하는 경우, 아래의 코드 적용 (최대 1000건)
    $Receivers[] = array(
        // 팩스 수신번호
        'rcv' => '',
        // 팩스 수신자명
        'rcvnm' => '팝빌담당자',
        // 파트너 지정키, 수신자 구별용 메모
        'interOPRefKey' => '20220705-01'
    );

    $Receivers[] = array(
        // 팩스 수신번호
        'rcv' => '',
        // 팩스 수신자명
        'rcvnm' => '수신담당자',
        // 파트너 지정키, 수신자 구별용 메모
        'interOPRefKey' => '20220705-02'
    );


    // 예약전송일시(yyyyMMddHHmmss) ex)20220324230000, null인경우 즉시전송
    $reserveDT = null;

    // 팩스 제목
    $title = '팩스 재전송 제목';

    // 재전송 팩스의 전송요청번호
    // 파트너가 전송 건에 대해 관리번호를 구성하여 관리하는 경우 사용.
    // 1~36자리로 구성. 영문, 숫자, 하이픈(-), 언더바(_)를 조합하여 팝빌 회원별로 중복되지 않도록 할당.
    $requestNum = '';

    try {
        $receiptNum = $FaxService->ResendFAX($testCorpNum, $ReceiptNum, $Sender,
            $SenderName, $Receivers, $reserveDT, $testUserID, $title, $requestNum);
    } catch (PopbillException $pe) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
<body>
<div id="content">
    <p class="heading1">Response</p>
    <br/>
    <fieldset class="fieldset1">
        <legend>팩스 재전송</legend>
        <ul>
            <?php
            if (isset($receiptNum)) {
                ?>
                <li>receiptNum (팩스접수번호) : <?php echo $receiptNum ?></li>
                <?php
            } else {
                ?>
                <li>code (응답 코드) : <?php echo $code ?></li>
                <li>message (응답 메시지) : <?php echo $message ?></li>
                <?php
            }
            ?>
        </ul>
    </fieldset>
</div>
</body>
</html>
