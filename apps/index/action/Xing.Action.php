<?php
class XingAction extends AppAction{
    function index(){
        $xing=new XingModel();
        $projects=$xing->get_projects();
        include  view_file();
    }

    function test(){
        echo substr(md5(time()),0,6);
    }

    function info(){
        $bid=intval($_GET['bid']);
        if($bid){
            $info=new InfoModel($bid);
            $info=$info->get();
            if($info){
                include view_file();
            }else{
                cpmsg("denied","error");
            }
        }
    }

    function del(){
        $bid=intval($_GET['bid']);
        if($bid){
            $xing=new  XingModel();
            $info=new  InfoModel($bid);
            if($xing->del_browser($bid)){
                $info->del();
                cpmsg("delete success");
            }else{
                cpmsg("delete failed","error");
            }
        }
    }

    function delp(){
        $pid=intval($_GET['pid']);
        $xing=new XingModel();
        if(!$xing->del_project($pid)){
            cpmsg("delete failed","error");
        }else{
            cpmsg("delete success");
        }
    }

    /**
     * 批量删除
     */
    function dels(){
        foreach ($_POST['delarr'] as $bid){
            $bid=intval($bid);
            if($bid){
                $xing=new XingModel();
                $info=new InfoModel($bid);
                if($xing->del_browser($bid)){
                    $info->del();
                }else{
                }
            }
        }
        cpmsg("delete success");
    }

    /**
     * 设置面板
     */
    function setting(){
        $user=new UserModel();
        $data=$user->fetch_first("*",array("uid"=>$_SESSION['uid']));
        include view_file();
    }

    function onsetting(){
        $email=$_POST['eamil'];
        $user=new UserModel();
        if($user->update(array("email"=>$email), array("uid"=>$_SESSION['uid']))){
            cpmsg("success");
        }
    }
}

