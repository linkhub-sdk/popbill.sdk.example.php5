<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
  /**
  * 전자명세서 상태 변경이력을 확인합니다.
  * - 상태 변경이력 확인(GetLogs API) 응답항목에 대한 자세한 정보는
  *   "[전자명세서 API 연동매뉴얼] > 3.3.4 GetLogs (상태 변경이력 확인)"
  *   을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호
	$testCorpNum = '1234567890';

  // 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$itemCode = '121';

  // 문서관리번호
	$mgtKey = '20170302-04';

	try {
		$result = $StatementService->GetLogs($testCorpNum, $itemCode, $mgtKey);
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
				<legend>전자명세서 상태변경 이력 확인</legend>
				<ul>
					<?php
						if ( isset($code) ) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
							for ($i = 0; $i < Count($result) ; $i++) {
					?>
								<fieldset class ="fieldset2">
								<legend>전자명세서 상태변경 이력 [<?php echo $i ?>] </legend>
									<ul>
										<li>docLogType : <?php echo $result[$i]->docLogType ?></li>
										<li>log : <?php echo $result[$i]->log ?></li>
										<li>procType : <?php echo $result[$i]->procType ?></li>
										<li>procCorpName : <?php echo $result[$i]->procCorpName ?></li>
										<li>procMemo : <?php echo $result[$i]->procMemo ?></li>
										<li>regDT : <?php echo $result[$i]->regDT ?></li>
										<li>ip : <?php echo $result[$i]->ip ?></li>
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
