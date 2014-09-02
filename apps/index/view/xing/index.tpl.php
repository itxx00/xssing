
<?php require_once PUBLIC_PATH."public.php"; ?>
<title> .</title>
</head>

<body>
  <div class="container">
   <?php require_once TEMPLATE_PATH."xing/header.tpl.php"; ?>
   <div class="table-responsive">
       <table class="table table-hover">
           <thead><tr>
            <th>项目</th>
            <th>创建时间</th>
            <th>操作</th>
            </tr>
           </thead>
           <tbody>
          <?php
			 if(is_array($projects)){
			   foreach($projects  as  $project){
			   $time=date("Y-m-d H:i:s",$project['time']);
				print<<<END
		   <tr>
              <td>{$project['name']}</td>
              <td>{$time}</td>
              <td>
                  <a href="/x/{$project['pid']}" class="btn btn-sm btn-info">进入</a> 
                  <a href="/x/{$project['pid']}/d" class="btn btn-sm btn-danger">删除</a>
              </td>
           </tr>
END;
			   }
			 }

			?>
           </tbody>
       </table>
  </div>

</div>
</body>
</html>
