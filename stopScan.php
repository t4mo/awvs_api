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
        $scanid = "19";

        //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, 'https://'."$agent_host".':'."$agent_port".'/api/stopScan' );
        //自定义http header
        curl_setopt($curl, CURLOPT_HTTPHEADER,array('Accept: application/json, text/javascript, */*; q=0.01','Content-Type: application/json','RequestValidated: true','X-Requested-With: XMLHttpRequest','Referer: https://'."$agent_host".':'."$agent_port",'Accept-Language: zh-CN','Accept-Encoding: gzip, deflate','User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko','Host: '."$agent_host".':'."$agent_port",'DNT: 1','Connection: Keep-Alive','Cache-Control: no-cache','Cookie: wvs_auth= '."$token"));
        //定义超时
        curl_setopt ($curl, CURLOPT_TIMEOUT, 20 );
        //设置头文件的信息作为数据流输出
        //curl_setopt($curl, CURLOPT_HEADER, 1);
        //关闭SSL证书验证
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //设置post方式提交
        curl_setopt($curl, CURLOPT_POST, 1);


        //设置post数据
        //原始数据
        $data_string = array(
            "id" => "$scanid"
        );
        //以json方式提交
        var_dump($data_string);
        $post_data = json_encode($data_string);
        var_dump($post_data);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        //执行命令
        $data = curl_exec($curl);
        $response_data = json_decode($data,TRUE);
        // 关闭CURL
        $error = curl_error ($curl);//需放在curl_close($curl)执行之前
        var_dump($error);
        //关闭URL请求
        curl_close($curl);
        //显示获得的数据
        $response_data = json_decode($data,TRUE);
        var_dump($response_data);

 ?>

