<?php
session_start();

$_SESSION = array();
if(ini_set('session.use_cookies')){
  $params = session_get_cookie_params();
  //クッキーにセッションの値を入れているため、それを消すための処理
  //session_get_cookie_paramsで返ってきたsessionで使ったcookieのオプションを設定している
  setcookie(session_name(). '' ,time() - 42000,
       $params['path'],$path['domain'],$params['secure']
       ,$params['httponly']);
}

session_destory();

//cookieに空の値を入れて有効期限を切る
setcookie('email', '' , time() - 3600);

header('Location: login.php');
exit();
?>
