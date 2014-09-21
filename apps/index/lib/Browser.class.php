<?php
class  Browser{
    /*
     * 获取客户端浏览器类型
     */
    public static function get_client_browser(){
        $agent=strtolower($_SERVER['HTTP_USER_AGENT']);
        if (preg_match('/msie\s([^\s|;]+)/i', $agent, $regs)) {
            return 'Internet Explorer '.$regs[1];
        }else if (preg_match('/opera[\s|\/]([^\s]+)/i', $agent, $regs)){
            return  'Opera '.$regs[1];
        }else if (preg_match('/fireFox\/([^\s]+)/i', $agent, $regs)){
            return  'FireFox '.$regs[1];
        }else if (preg_match('/chrome/i',$agent,$regs)) {
            $aresult = explode('/',stristr($agent,'Chrome'));
            $aversion = explode(' ',$aresult[1]);
            return  'Chrome '.$aversion[0];
        }else if (strpos($agent, "uc")){
            return  'uc';
        }
        else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)){
            return  'Safari '.$regs[1];
        }
        #return  'Other Browser';
        return $agent;
    }

    /*
     * 获取客户端操作系统
     */
    public static function get_clinet_os(){
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if (strpos($agent,"windows nt 5.0"))                             $os = "Windows 2000";
        else if (strpos($agent,"windows nt 5.1"))                        $os = "Windows XP";
        else if (strpos($agent,"windows nt 5.2"))                        $os = "Windows 2003";
        else if (strpos($agent,"windows nt 6.0"))                        $os = "Windows Vista";
        else if (strpos($agent,"windows nt 6.1"))                        $os = "Windows 7";
        else if (strpos($agent,"windows nt"))                            $os = "Windows NT";
        else if (strpos($agent,"windows ce"))                            $os = "Windows CE";
        else if (strpos($agent,"windows 9"))                             $os = "Windows 98";
        else if (strpos($agent,"unix"))                                  $os = "Unix";
        else if (strpos($agent,"linux"))                                 $os = "Linux";
        else if (strpos($agent,"sunos"))                                 $os = "SunOS";
        else if (strpos($agent,"openbsd"))                               $os = "OpenBSD";
        else if (strpos($agent,"freebsd"))                               $os = "FreeBSD";
        else if (strpos($agent,"aix"))                                   $os = "AIX";
        else if (strpos($agent,"mac"))                                   $os = "Mac";
        else if (preg_match('/dndroid ([.\d]+)/i',$agent, $regs))        $os = "Android ".$regs[1];
        else if (strpos($agent,"android"))                               $os = "Android";
        else                                                             $os = $agent;
        return $os;
    }
}
?>
