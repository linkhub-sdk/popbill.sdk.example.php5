<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';



	$MemberCorpNum = "1234567890";		//팝빌회원 사업자번호

	// 조회할 사업자번호 배열, 최대 1000건
	$CorpNumList = array(
		"1234567890",
		"4108600477",
		"124-95-28799",
	);

	try {
		$result = $ClosedownService->checkCorpNums($MemberCorpNum, $CorpNumList);
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
			<?
				if(isset($code)) {
			?>

				<fieldset class="fieldset2">
					<ul>
						<li>Response.code : <? echo $code ?> </li>
						<li>Response.message : <? echo $message ?></li>
					</ul>
				</fieldset>
			<?
				} else {
			?>							
					<p class="info">> state (휴폐업상태) : null-알수없음, 0-등록되지 않은 사업자번호, 1-사업중, 2-폐업, 3-휴업</p>
					<p class="info">> type (사업 유형) : null-알수없음, 1-일반과세자, 2-면세과세자, 3-간이과세자, 4-비영리법인, 국가기관</p>
					<br/>
				<?
					for ($i = 0; $i < Count($result); $i++){
				?>
						<fieldset class="fieldset2">
							<legend>휴폐업조회 결과 [ <?= $i+1?> ]</legend>
							<ul>
								<li>사업자번호(corpNum) : <?= $result[$i]->corpNum?></li>		
								<li>사업자유형(type) : <?= $result[$i]->type?></li>	
								<li>휴폐업상태(state) : <?= $result[$i]->state?></li>
								<li>휴폐업일자(stateDate) : <?= $result[$i]->stateDate?></li>	
								<li>국세청 확일일자(checkDate) : <?= $result[$i]->checkDate?></li>	
							</ul>
						</fieldset>
				<?
						}
					}
				?>

		 </div>
		 </script>
	</body>
</html>