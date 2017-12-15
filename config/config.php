<?php
  // 서버 패스
  define('SERVER_ROOT',$_SERVER['DOCUMENT_ROOT']);

  // 문서 PATH
  define('MAIN_ROOT', '/a_team/a_team5/earthport/templates');
  define('MEMBER_ROOT', MAIN_ROOT.'/member');
  define('LOGIN_ROOT', MAIN_ROOT.'/login');
  define('SEARCH_ROOT', MAIN_ROOT.'/search');
  define('TICKET_ROOT', MAIN_ROOT.'/ticket');
  define('IMAGES_ROOT', MAIN_ROOT.'/images');
  define('GROUND_ROOT', MAIN_ROOT.'/ground');
  define('SERVICE_ROOT', MAIN_ROOT.'/service');
  define('MAINPAGE_ROOT',MAIN_ROOT.'/mainPage');

  //디렉터리 PATH

  define('MEMBER_DIR',SERVER_ROOT."/".MEMBER_ROOT);
  define('LOGIN_DIR',SERVER_ROOT.LOGIN_ROOT);
  define('SEARCH_DIR',SERVER_ROOT.SEARCH_ROOT);
  define('TICKET_DIR',SERVER_ROOT.TICKET_ROOT);
  define('IMAGES_DIR',SERVER_ROOT.IMAGES_ROOT);
  define('GROUND_DIR',SERVER_ROOT."/".GROUND_ROOT);
  define('SERVICE_DIR',SERVER_ROOT.SERVICE_ROOT);
  define('MAINPAGE_DIR',SERVER_ROOT.MAINPAGE_ROOT);
 ?>
