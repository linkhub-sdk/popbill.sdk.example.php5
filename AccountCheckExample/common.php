<?php
  /**
  * 팝빌 예금주조회 API PHP SDK Example
  *
  * 업데이트 일자 : 2020-10-07
  * 연동기술지원 연락처 : 1600-9854 / 070-4304-2991
  * 연동기술지원 이메일 : code@linkhub.co.kr
  *
  * <테스트 연동개발 준비사항>
  * 1) 19, 22번 라인에 선언된 링크아이디(LinkID)와 비밀키(SecretKey)를
  *    링크허브 가입시 메일로 발급받은 인증정보를 참조하여 변경합니다.
  * 2) 팝빌 개발용 사이트(test.popbill.com)에 연동회원으로 가입합니다.
  */


  require_once '../Popbill/PopbillAccountCheck.php';

  // 링크아이디
  $LinkID = 'TESTER';

  // 비밀키
  $SecretKey = 'SwWxqU+0TErBXy/9TVjIPEnI0VTUMMSQZtJf3Ed8q3I=';

  //통신방식 기본은 CURL , curl 사용에 문제가 있을경우 STREAM 사용가능.
  //STREAM 사용시에는 php.ini의 allow_url_fopen = on 으로 설정해야함.
  define('LINKHUB_COMM_MODE','CURL');

  $AccountCheckService = new AccountCheckService($LinkID,$SecretKey);

  // 연동환경 설정값, 개발용(true), 상업용(false)
  $AccountCheckService->IsTest(true);

  // 인증토큰에 대한 IP제한기능 사용여부, 권장(true)
  $AccountCheckService->IPRestrictOnOff(true);

  // 팝빌 API 서비스 고정 IP 사용여부(GA), 기본값(false)
  $AccountCheckService->UseStaticIP(false);

  // 로컬서버 시간 사용 여부 true(기본값) - 사용, false(미사용)
  $AccountCheckService->UseLocalTimeYN(true);
?>
