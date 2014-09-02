<?php
class ProjectAction extends AppAction{
    function add(){
        include view_file();
    }

    function onadd(){
        $project=new ProjectModel();
        if($project->add($_POST['name'])){
            cpmsg("success","success","/x/");
        }else{
            cpmsg("failed","error");
        }
    }

    function show(){
        $pid=intval($_GET[pid]);
        $project=new ProjectModel();
        $pro=$project->getby_pid($pid);
        if($pro[uid]!=$_SESSION['uid']) {
            cpmsg("denied",'error',"/x/");  exit();
        }

        $xing=new XingModel();
        $browsers=$xing->get_browsers($pid);
        include view_file();
    }

    function ip(){
        $mmc=memcache_init();
        if($mmc==false) {} else {
            $ipaddr=$_GET['ip'];
            $location=memcache_get($mmc,$ipaddr);
            if (isset($location) && !empty($location)) {
                echo $location;
            } else {
                load_func("IptoAddr");
                $addr=ip_to_addr($ipaddr);
                $locat=$addr["country"].$addr["region"].$addr["city"].$addr["isp"];
                echo $locat;
                memcache_set($mmc,$ipaddr,$locat);
            }
        }
    }
}

