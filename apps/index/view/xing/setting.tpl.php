<?php require_once PUBLIC_PATH."public.php"; ?>
<title>.</title>
</head>
<?php require_once TEMPLATE_PATH."xing/header.tpl.php"; ?>
<body>
<table width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
<tbody>
  <tr>
    <td><table width="95%" cellspacing="2" cellpadding="3" border="0" bgcolor="#FFFFFF" align="center" class="admintable">
        <form id="myform" method="post" name="myform"   action="?m=xing&a=onsetting">
        <tbody>
          <tr>
            <td width="10%" class="b1_1">email to recive message</td>
            <td class="b1_1"><input type="text" maxlength="60" size="60" id="Title" name="eamil" value="<?php echo $data['email'] ?>"></td>
              <td class="b1_1"> <input type="submit" value="submit" class="gbtn"></td>
          </tr>
        </form>
      </table>
     </td>
  </tr>
</tbody>
</table>
</body>
