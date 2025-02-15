<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /*
    * 수집 상태 확인(GetJobState API) 함수를 상태 정보가 확인된 작업아이디를 활용하여 계좌 거래 내역을 조회합니다.
    * - https://developers.popbill.com/reference/easyfinbank/php/api/search#Search
    */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 수집 요청(RequestJob) 호출시 반환받은 작업아이디
    $JobID = '022032417000000014';

    // 거래유형 배열 ("I" 와 "O" 중 선택, 다중 선택 가능)
    // └ I = 입금 , O = 출금
    // - 미입력 시 전체조회
    $TradeType = array (
        'I',
        'O'
    );

    // "입·출금액" / "메모" / "비고" 중 검색하고자 하는 값 입력
    // - 메모 = 거래내역 메모저장(SaveMemo)을 사용하여 저장한 값
    // - 비고 = EasyFinBankSearchDetail의 remark1, remark2, remark3 값
    // - 미입력시 전체조회
    $SearchString = null;

    // 페이지 번호
    $Page = 1;

    // 페이지당 목록개수
    $PerPage = 10;

    // 정렬방향, D-내림차순, A-오름차순
    $Order = "D";

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $response = $EasyFinBankService->Search ( $CorpNum, $JobID, $TradeType, $SearchString,
          $Page, $PerPage, $Order, $UserID );
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
            <legend>수집 결과 조회</legend>
            <ul>
                <?php
                if ( isset($code) ) {
                    ?>
                <li>code (응답 코드) : <?php echo $code ?></li>
                <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                } else {
                    ?>
                    <li>code (응답코드) : <?php echo $response->code ?></li>
                    <li>message (응답메시지) : <?php echo $response->message ?></li>
                    <li>total (총 검색결과 건수) : <?php echo $response->total ?></li>
                    <li>perPage (페이지당 검색개수) : <?php echo $response->perPage ?></li>
                    <li>pageNum (페이지 번호) : <?php echo $response->pageNum ?></li>
                    <li>pageCount (페이지 개수) : <?php echo $response->pageCount ?></li>
                    <li>lastScrapDT (최종 조회일시) : <?php echo $response->lastScrapDT ?></li>
                    <li>balance (현재 잔액) : <?php echo $response->balance ?></li>
                    <?php
                    for ( $i = 0; $i < Count ( $response->list ); $i++ ) {
                        ?>
                        <fieldset class="fieldset2">
                            <legend> 거래내역 </legend>
                            <ul>
                                <li>tid (거래내역 아이디) : <?php echo $response->list[$i]->tid ; ?></li>
                                <li>trdate (거래일자) : <?php echo $response->list[$i]->trdate ; ?></li>
                                <li>trserial (거래일련번호) : <?php echo $response->list[$i]->trserial ; ?></li>
                                <li>trdt (거래일시) : <?php echo $response->list[$i]->trdt ; ?></li>
                                <li>accIn (입금액) : <?php echo $response->list[$i]->accIn ; ?></li>
                                <li>accOut (출금액) : <?php echo $response->list[$i]->accOut ; ?></li>
                                <li>balance (잔액) : <?php echo $response->list[$i]->balance ; ?></li>
                                <li>remark1 (비고 1) : <?php echo $response->list[$i]->remark1 ; ?></li>
                                <li>remark2 (비고 2) : <?php echo $response->list[$i]->remark2 ; ?></li>
                                <li>remark3 (비고 3) : <?php echo $response->list[$i]->remark3 ; ?></li>
                                <li>remark4 (비고 4) : <?php echo $response->list[$i]->remark4 ; ?></li>
                                <li>regDT (등록일시) : <?php echo $response->list[$i]->regDT ; ?></li>
                                <li>memo (메모) : <?php echo $response->list[$i]->memo ; ?></li>
                            </ul>
                        </fieldset>
                        <?php
                    }
                }
                ?>
            </ul>
        </fieldset>
    </div>
    </body>
</html>
