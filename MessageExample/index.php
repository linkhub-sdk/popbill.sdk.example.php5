<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		
		<title>팝빌 SDK PHP 5.0 Example.</title>
	</head>
	<body>
		<div id="content">
			
			<p class="heading1">팝빌 문자메시지 SDK PHP 5.0 Example.</p>

			<br/>

			<fieldset class="fieldset1">
				<legend>팝빌 기본 API</legend>

				<fieldset class="fieldset2">
					<legend>회원사 정보</legend>
					<ul>
						<li><a href="CheckIsMember.php">checkIsMember</a> - 연동회원사 가입 여부 확인</li>
						<li><a href="JoinMember.php">joinMember</a> - 연동회원사 가입 요청</li>
						<li><a href="GetBalance.php">getBalance</a> - 연동회원사 잔여포인트 확인</li>
						<li><a href="GetPartnerBalance.php">getPartnerBalance</a> - 파트너 잔여포인트 확인</li>
						<li><a href="GetPopbillURL.php">getPopbillURL</a> - 팝빌 SSO URL 요청</li>
					</ul>
				</fieldset>

			</fieldset>
			
			<br />
			
			<fieldset class="fieldset1">
				<legend>문자메시지 관련 API</legend>
				
				<fieldset class="fieldset2">
					<legend>단문 문자 전송</legend>
					<ul>
						<li><a href="SendSMS.php">sendSMS</a> - 단문 문자메시지 1건 전송</li>
						<li><a href="SendSMS_Multi.php">sendSMS</a> - 단문 문자메시지 다량(최대1000건) 전송</li>
					</ul>
				</fieldset>
				
				<fieldset class="fieldset2">
					<legend>장문 문자 전송</legend>
					<ul>
						<li><a href="SendLMS.php">sendLMS</a> - 장문 문자메시지 1건 전송</li>
						<li><a href="SendLMS_Multi.php">sendLMS</a> - 장문 문자메시지 다량(최대1000건) 전송</li>
					</ul>
				</fieldset>
				
				<fieldset class="fieldset2">
					<legend>단/장문 문자 자동 전송</legend>
					<ul>
						<li><a href="SendXMS.php">sendXMS</a> - 단/장문 문자메시지 1건 전송</li>
						<li><a href="SendXMS_Multi.php">sendXMS</a> - 단/장문 문자메시지 다량(최대1000건) 전송</li>
					</ul>
				</fieldset>
				
				<fieldset class="fieldset2">
					<legend>전송결과/예약취소</legend>
					<ul>
						<li><a href="GetMessages.php">getMessages</a> - 접수번호에 해당하는 문자메시지 전송결과 확인</li>
						<li><a href="CancelReserve.php">cancelReserve</a> - 예약문자메시지의 예약 취소. 예약시간 10분전까지만 가능.</li>
					</ul>
				</fieldset>
				
				<fieldset class="fieldset2">
					<legend>기타</legend>
					<ul>
						<li><a href="GetURL.php">getURL</a> - 문자메시지 관련 SSO URL 확인</li>
						<li><a href="GetUnitCost.php">getUnitCost</a> - 세금계산서 발행 단가 확인</li>
					</ul>
				</fieldset>

			</fieldset>
		 </div>
	</body>
</html>