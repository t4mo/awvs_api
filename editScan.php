<?php



        header("Content-type: application/json; charset=utf-8");
        //定义引擎
        $agent_host = '127.0.0.1';
        $agent_port = '8182';
        //定义通信密钥
        $username = 'administrator';
        $password = '1';
        //生成token
        $token = md5(md5(md5($username).md5($password)).$password);


        //扫描设置
        $scanType = "scan";
        $targetList = 'http://1.1.1.1';
        $target = array("http://1.1.1.1");
        $recurse = "-1";
        $date = "10/01/2014";
        $dayOfWeek = "1";
        $dayOfMonth = "1";
        $time = "00:40";
        $deleteAfterCompletion = "False";
        $profile = "Default";
        $loginSeq = '<none>';
        $settings = "Default";
        $scanningmode = "heuristic";
        $excludedhours = '<none>';
        $savetodatabase = "True";
        $savelogs = "True";
        $generatereport = "True";
        $reportformat = "PDF";
        $reporttemplate = "WVSDeveloperReport.rep";
        $emailaddress ="8972343@qq.com";
        $scanid = "2222";





        //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, 'https://'."$agent_host".':'."$agent_port".'/api/editScan');
        //自定义http header
        curl_setopt($curl, CURLOPT_HTTPHEADER,array('Accept: application/json, text/javascript, */*; q=0.01','Content-Type: application/json','RequestValidated: true','X-Requested-With: XMLHttpRequest','Referer: https://'."$agent_host".':'."$agent_port",'Accept-Language: zh-CN','Accept-Encoding: gzip, deflate','User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko','Host: '."$agent_host".':'."$agent_port",'DNT: 1','Connection: Keep-Alive','Cache-Control: no-cache','Cookie: wvs_auth= '."$token"));
        //定义超时
        curl_setopt ($curl, CURLOPT_TIMEOUT, 20 );
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 1);
        //关闭SSL证书验证
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //设置post方式提交
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);


        //设置post数据

        //原始数据
        $params = array("profile" => "$profile","loginSeq" => "$loginSeq","settings" => "$settings","scanningmode" => "$scanningmode","excludedhours" => "$excludedhours","savetodatabase" => "$savetodatabase","savelogs" => "$savelogs","generatereport" => "$generatereport","reportformat" => "$reportformat","reporttemplate" => "$reporttemplate","emailaddress" => "$emailaddress");
        $data_string = array("scanType" => $scanType,"targetList" => $targetList,"target" => $target,"recurse" => "$recurse","date" => "$date","dayOfWeek" => "$dayOfWeek","dayOfMonth" => "$dayOfMonth","time" =>"$time","deleteAfterCompletion" => "$deleteAfterCompletion","params" => $params,"scanid" => "$scanid"
        );


        //以json方式提交
        var_dump($data_string);




        $post_data = json_encode($data_string, JSON_UNESCAPED_SLASHES);


        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

        //执行命令
        $data = curl_exec($curl);
        curl_close($curl);
        $response_data = json_decode($data,TRUE);


        //显示获得的数据
        var_dump($response_data);


?>

