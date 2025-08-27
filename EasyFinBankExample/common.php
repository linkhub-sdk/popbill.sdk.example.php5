<?php
  /**
  * 팝빌 계좌조회 API PHP SDK Example
  * PHP 연동 튜토리얼 안내 : https://developers.popbill.com/guide/easyfinbank/php/getting-started/tutorial?fwn=php
  *
  * 업데이트 일자 : 2025-08-27
  * 연동 기술지원 연락처 : 1600-9854
  * 연동 기술지원 이메일 : code@linkhubcorp.com
  */

  require_once '../Popbill/PopbillEasyFinBank.php';

  // 링크아이디
  $LinkID = 'TESTER';

  // 비밀키
  $SecretKey = 'SwWxqU+0TErBXy/9TVjIPEnI0VTUMMSQZtJf3Ed8q3I=';

  // 통신방식 기본은 CURL , curl 사용에 문제가 있을경우 STREAM 사용가능.
  // STREAM 사용시에는 php.ini 파일의 allow_url_fopen = on 으로 설정해야함.
  define('LINKHUB_COMM_MODE','CURL');

  $EasyFinBankService = new EasyFinBankService($LinkID, $SecretKey);

  // 연동환경 설정, true-테스트, false-운영(Production), (기본값:false)
  $EasyFinBankService->IsTest(true);

  // 인증토큰 IP 검증 설정, true-사용, false-미사용, (기본값:true)
  $EasyFinBankService->IPRestrictOnOff(true);

  // 통신 IP 고정, true-사용, false-미사용, (기본값:false)
  $EasyFinBankService->UseStaticIP(false);

  // 로컬시스템 시간 사용여부, true-사용, false-미사용, (기본값:true)
  $EasyFinBankService->UseLocalTimeYN(true);
?>
