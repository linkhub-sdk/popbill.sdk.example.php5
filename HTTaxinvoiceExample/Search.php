<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 수집 상태 확인(GetJobState API) 함수를 통해 상태 정보가 확인된 작업아이디를 활용하여 수집된 전자세금계산서 매입/매출 내역을 조회합니다.
     * - https://docs.popbill.com/httaxinvoice/php/api#Search
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $testCorpNum = '1234567890';

    // 팝빌회원 아이디
    $testUserID = 'testkorea';

    // 수집요청(requestJob API) 함수 호출 시 발급받은 작업아이디
    $JobID = '';

    // 문서형태 배열 ("N" 와 "M" 중 선택, 다중 선택 가능)
    // └ N = 일반 , M = 수정
    // - 미입력 시 전체조회
    $Type = array (
        'N',
        'M'
    );

    // 과세형태 배열 ("T" , "N" , "Z" 중 선택, 다중 선택 가능)
    // └ T = 과세, N = 면세, Z = 영세
    // - 미입력 시 전체조회
    $TaxType = array (
        'T',
        'N',
        'Z'
    );

    // 발행목적 배열 ("R" , "C", "N" 중 선택, 다중 선택 가능)
    // └ R = 영수, C = 청구, N = 없음
    // - 미입력 시 전체조회
    $PurposeType = array (
        'R',
        'C',
        'N'
    );

    // 종사업장번호 유무 (null , "0" , "1" 중 택 1)
    // - null = 전체 , 0 = 없음, 1 = 있음
    $TaxRegIDYN = "";

    // 종사업장번호의 주체 ("S" , "B" , "T" 중 택 1)
    // └ S = 공급자 , B = 공급받는자 , T = 수탁자
    // - 미입력시 전체조회
    $TaxRegIDType = "";

    // 종사업장번호
    // 다수기재시 콤마(",")로 구분하여 구성 ex ) "0001,0002"
    // - 미입력시 전체조회
    $TaxRegID = "";

    // 페이지 번호
    $Page = 1;

    // 페이지당 목록개수
    $PerPage = 10;

    // 정렬방향, D-내림차순, A-오름차순
    $Order = "D";

    // 거래처 상호 / 사업자번호 (사업자) / 주민등록번호 (개인) / "9999999999999" (외국인) 중 검색하고자 하는 정보 입력
    // - 사업자번호 / 주민등록번호는 하이픈('-')을 제외한 숫자만 입력
    // - 미입력시 전체조회
    $QString = "";

    try {
        $response = $HTTaxinvoiceService->Search ( $testCorpNum, $JobID, $Type, $TaxType, $PurposeType,
            $TaxRegIDYN, $TaxRegIDType, $TaxRegID, $Page, $PerPage, $Order, $testUserID, $QString );
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
                    <li>Response.code : <?php echo $code ?> </li>
                    <li>Response.message : <?php echo $message ?></li>
                    <?php
                } else {
                    ?>
                    <li>code (응답코드) : <?php echo $response->code ?></li>
                    <li>message (응답메시지) : <?php echo $response->message ?></li>
                    <li>total (총 검색결고 건수) : <?php echo $response->total ?></li>
                    <li>perPage (페이지당 검색개수) : <?php echo $response->perPage ?></li>
                    <li>pageNum (페이지 번호) : <?php echo $response->pageNum ?></li>
                    <li>pageCount (페이지 개수) : <?php echo $response->pageCount ?></li>

                    <?php
                    for ( $i = 0; $i < Count ( $response->list ); $i++ ) {
                        ?>
                        <fieldset class="fieldset2">
                            <legend> 전자(세금)계산서 정보 [<?php echo $i+1?>]</legend>
                            <ul>
                                <li>ntsconfirmNum (국세청승인번호) : <?php echo $response->list[$i]->ntsconfirmNum ; ?></li>
                                <li>writeDate (작성일자) : <?php echo $response->list[$i]->writeDate ; ?></li>
                                <li>issueDate (발행일자) : <?php echo $response->list[$i]->issueDate ; ?></li>
                                <li>sendDate (전송일자) : <?php echo $response->list[$i]->sendDate ; ?></li>
                                <li>taxType (과세형태) : <?php echo $response->list[$i]->taxType ; ?></li>
                                <li>purposeType (영수/청구) : <?php echo $response->list[$i]->purposeType ; ?></li>
                                <li>supplyCostTotal (공급가액 합계) : <?php echo $response->list[$i]->supplyCostTotal ; ?></li>
                                <li>taxTotal (세액 합계) : <?php echo $response->list[$i]->taxTotal ; ?></li>
                                <li>totalAmount (합계금액) : <?php echo $response->list[$i]->totalAmount ; ?></li>
                                <li>remark1 (비고) : <?php echo $response->list[$i]->remark1 ; ?></li>
                                <li>invoiceType (구분) : <?php echo $response->list[$i]->invoiceType ; ?></li>

                                <li>modifyYN (수정 전자세금계산서 여부) : <?php echo $response->list[$i]->modifyYN  ? 'true' : 'false' ?></li>
                                <li>orgNTSConfirmNum (원본 전자세금계산서 국세청승인번호) : <?php echo $response->list[$i]->orgNTSConfirmNum ; ?></li>

                                <li>purchaseDate (거래일자) : <?php echo $response->list[$i]->purchaseDate ?></li>
                                <li>itemName (품명) : <?php echo $response->list[$i]->itemName ?></li>
                                <li>spec (규격) : <?php echo $response->list[$i]->spec ?></li>
                                <li>qty (수량) : <?php echo $response->list[$i]->qty ?></li>
                                <li>unitCost (단가) : <?php echo $response->list[$i]->unitCost ; ?></li>
                                <li>supplyCost (공급가액) : <?php echo $response->list[$i]->supplyCost ; ?></li>
                                <li>tax (세액) : <?php echo $response->list[$i]->tax ; ?></li>
                                <li>remark (비고) : <?php echo $response->list[$i]->remark ; ?></li>

                                <li>invoicerCorpNum (공급자 사업자번호) : <?php echo $response->list[$i]->invoicerCorpNum ; ?></li>
                                <li>invoicerTaxRegID (공급자 종사업장번호) : <?php echo $response->list[$i]->invoicerTaxRegID ; ?></li>
                                <li>invoicerCorpName (공급자 상호) : <?php echo $response->list[$i]->invoicerCorpName ; ?></li>
                                <li>invoicerCEOName (공급자 대표자성명) : <?php echo $response->list[$i]->invoicerCEOName ; ?></li>
                                <li>invoicerEmail (공급자 담당자 이메일) : <?php echo $response->list[$i]->invoicerEmail ; ?></li>

                                <li>invoiceeCorpNum (공급받는자 사업자번호) : <?php echo $response->list[$i]->invoiceeCorpNum ; ?></li>
                                <li>invoiceeType (공급받는자 구분) : <?php echo $response->list[$i]->invoiceeType ; ?></li>
                                <li>invoiceeTaxRegID (공급받는자 종사업장번호) : <?php echo $response->list[$i]->invoiceeTaxRegID ; ?></li>
                                <li>invoiceeCorpName (공급받는자 상호) : <?php echo $response->list[$i]->invoiceeCorpName ; ?></li>
                                <li>invoiceeCEOName (공급받는자 대표자 성명) : <?php echo $response->list[$i]->invoiceeCEOName ; ?></li>
                                <li>invoiceeEmail1 (공급받는자 담당자 이메일) : <?php echo $response->list[$i]->invoiceeEmail1 ; ?></li>
                                <li>invoiceeEmail2 (공급받는자 ASP 연계사업자 이메일) : <?php echo $response->list[$i]->invoiceeEmail2 ; ?></li>

                                <li>trusteeCorpNum (수탁자 사업자번호) : <?php echo $response->list[$i]->trusteeCorpNum ; ?></li>
                                <li>tursteeTaxRegID (수탁자 종사업장번호) : <?php echo $response->list[$i]->trusteeTaxRegID ; ?></li>
                                <li>tursteeCorpName (수탁자 상호) : <?php echo $response->list[$i]->trusteeCorpName ; ?></li>
                                <li>trusteeCEOName (수탁자 대표자 성명) : <?php echo $response->list[$i]->trusteeCEOName ; ?></li>
                                <li>trusteeEmail (수탁자 담당자 이메일) : <?php echo $response->list[$i]->trusteeEmail ; ?></li>

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
