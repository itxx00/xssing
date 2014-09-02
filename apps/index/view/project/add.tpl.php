<?php require_once PUBLIC_PATH."public.php"; ?>
<title>.</title>
</head>
<?php require_once TEMPLATE_PATH."xing/header.tpl.php"; ?>
<body>
<table width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
  <tbody>
  <tr>
    <td><table width="95%" cellspacing="2" cellpadding="3" border="0" bgcolor="#FFFFFF" align="center" class="admintable">
        <form   id="myform" method="post" name="myform"   action="/onadd">
        <tbody>
          <tr>
              <td width="20%" class="b1_1">PROJ NAME:</td>
              <td class="b1_1"><input type="text" maxlength="50" size="40"   name="name" ></td>
              <td class="b1_1"><input type="submit" value="ADD" class="gbtn" name="submit"></td>
          </tr>

        </form>
      </table></td>
  </tr>
  <tr>
    <td height="29"><table width="100%" cellspacing="0" cellpadding="0" border="0">

      </table></td>
  </tr>
  </tbody>
</table>
</body>
