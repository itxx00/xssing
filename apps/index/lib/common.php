<?php
/*
 * 项目共同文件   配置   函数
 *
 */

/**
 *@desc 短网址
 *@param url 长地址
 */
function url_shorten($url){
    $api = 'http://sd.la/?m=Index&a=create';
    $data=array('url'=>"$url");
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$api);
    curl_setopt( $ch, CURLOPT_HEADER, 0 );
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    $strRes=curl_exec($ch);
    curl_close($ch);
    $arrResponse=json_decode($strRes,true);
    //return $arrResponse['err_msg'];
    if($arrResponse['status']==-1){
        /** err */
        return $arrResponse['err_msg'];
        //return iconv('UTF-8','GBK',$arrResponse['err_msg']);
    }
    /** tinyurl */
    return $arrResponse['tinyurl'];
}

/*
 * 后台系统提示函数
 */
function cpmsg($message,$type="success",$url="-1",$time=666,$title="INFO"){
    $color= ($type == 'success') ? "green" : "red";
    $message="<font color=$color > $message </font>";
    if($url == "-1"){
        $jsaction= "history.go(-1);";
        $url="javascript:history.go(-1);";
    }
    else{
        $jsaction="window.location.href ='$url';" ;
    }

    print<<<END
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <table cellspacing="2" cellpadding="3" border="0"  align="center" class="admintable1" style="margin-top:20px;width:33%;">
        <tbody>  <tr> <td align="left" class="admintitle">{$title}</td>
        </tr> <tr> <td height="80" bgcolor="#FFFFFF" style="height:75px;line-height:22px;" align="center" valign="middle">
        <a href="$url"> <strong> $message </strong>waiting...</a><script> setTimeout("$jsaction",$time); </script>
        </td> </tr></tbody></table>
        END;
}

function send_mail($to,$title,$content){
    load_lib("Mailer");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet="utf-8";
    $mail->Host = "smtp.163.com"; // 您的企业邮局域名
    $mail->SMTPAuth = true; // 启用SMTP验证功能
    $mail->Username = "senderemailaccount@163.com"; // 邮局用户名(请填写完整的email地址)
    $mail->Password = ""; // 邮局密码
    $mail->Port=25;
    $mail->From = "senderemailaccount@163.com"; //邮件发送者email地址
    $mail->FromName = "XSS";
    $mail->AddAddress($to, 'youremailaccount@he.re']);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
    //$mail->AddReplyTo("", "");
    $mail->IsHTML(true);
    $mail->Subject = $title;
    $mail->Body = $content;
    return  $mail->Send();
}

function send_sae_mail($to,$title,$content){
    $mail = new SaeMail();
    $ret = $mail->quickSend($to ,$title,$content , "youremailaccount@gmail.com" , "yourpasswordhere" , "smtp.gmail.com" , 587);
}
