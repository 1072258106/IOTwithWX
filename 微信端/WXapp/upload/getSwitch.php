<?php

//���������MySql�����Ϣ
define("MYSQL_HOST","utfire.com.cn");
define("MYSQL_PORT","3306");
define("MYSQL_USER","root");
define("MYSQL_PASS","utfire");
define("MYSQL_DBNAME","app_991067661");


if ($_POST['token'] == "wxData") {//token����֤�ͻ����Ƿ�Ϸ�
	/*
	$con = mysql_connect(MYSQL_HOST.':'.MYSQL_PORT,MYSQL_USER,MYSQL_PASS); 
	mysql_select_db(MYSQL_DBNAME, $con);//Ҫ�ĳ���Ӧ�����ݿ���
	
	//��ȡ�ƹ�״̬
	$result = mysql_query("SELECT * FROM switch");
	while($arr = mysql_fetch_array($result)){//�ҵ���Ҫ�����ݵļ�¼��������״ֵ̬
		if ($arr['ID'] == 1) {
			$state = $arr['state'];
		}
	}
	
	mysql_close($con);
	*/
	$memcache = new Memcache;
	$memcache->connect('127.0.0.1',11211) or die('connect error!');
	$state = $memcache->get('switch');
	if ($state == "" || $state == null){
		$state = "0";
	}
	
	//���صƹ�״ֵ̬���ӡ�{����Ϊ�˰����ͻ���ȷ�������Ƿ���ȷ,�ҷ����ȡ����
    echo "<".$state.">";
}else{
	echo "Permission Denied";//������û��type��token��token����ʱ
}
?>