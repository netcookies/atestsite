<html>
<head>
<meta http-equiv="content-type" content="e" conten; charset=UTF-8" >
<title>信息查询中心</title>
<style type="text/css">
/*定义全局样式 */
input,select,textarea,div  {
  font: 12px Arial
  /* 此部分为表单和容器的字体定义 */
  }
/* 所有表单定义默认 */
input,select,textarea  {
  border: 1px solid #A1BCA3;
  }
/* 利用鼠标事件 :hover 来定义当鼠标经过时样式 */
input:hover,select:hover,textarea:hover  {
  background: #FFFFFF;
  border: 1px solid #99E300;
  }
/* 由于 :hover 事件只有 Mozilla 支持，因此为方便IE使用 e xpression 批量定义 */
input,select,textarea {
  tesion:e xpression(onmouseover=function() 
  {this.style.backgroundColor="#FFFFFF";this.style.border="1px solid #99E300"}, 
  onmouseout=function()
  {this.style.backgroundColor="#FFFFFF";this.style.border="1px solid #A1BCA3"})
  }
/* 如上 */
div  {
  background: #A1BCA3;
  padding: 10px; /* 填充 */
  cursor: pointer /* 鼠标 */
  }
div:hover  {
  background: #FFFFFF
  }
div {
  tesion:e xpression(onmouseover=function() 
  {this.style.backgroundColor="#FFFFFF"}, 
  onmouseout=function()
  {this.style.backgroundColor="#A1BCA3"})
  } 
/* 不错吧？ */
</style>
</head>
<body>
<h3>根据输入内容对数据进行检索\插入\更新</h3>
<h5>注:IP值为唯一值,不可重复,但可为空</h5>
<h5>&nbsp;&nbsp;&nbsp;&nbsp;关键字在查询时用来做排序参数, 例: 选IP则为按IP排序 在修改时用来做参照</h5>
<h5>&nbsp;&nbsp;&nbsp;&nbsp;关键字在修改时用来做参考值, 例: 当选IP时, 则输入IP等于已存在数据中的IP时,更新输入内容至数据库</h5>
<form method="GET" name="search">
分类：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="pclass">
<option value="printer">办公设备</option>
<option value="others">杂项</option>
<option value="pc" selected="yes">电脑</option>
</select><br>
名称：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fid"><br>
型号：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="ftype"><br>
数量：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fnum"><br>
购入日期：<input type="text" name="fdate"><br>
使用人：&nbsp;&nbsp;&nbsp;<input type="text" name="fuser"><br>
使用部门：<input type="text" name="fdepartment"><br>
IP：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fip"><br>
归属地：&nbsp;&nbsp;&nbsp;<input type="text" name="faddress"><br>
使用年限：<input type="text" name="fyear"><br>
备注：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fnote"><br>
关键字：&nbsp;&nbsp;&nbsp;<select name="sequence">
<option value="id">名称</option>
<option value="type">型号</option>
<option value="num">数量</option>
<option value="date">购入日期</option>
<option value="user">使用人</option>
<option value="department">使用部门</option>
<option value="address">归属地</option>
<option value="year">使用年限</option>
<option value="ip"  selected="yes">IP</option>
</select><br>
<input type="submit" value="查询" OnClick="form.action='result.php'">
<input type="submit" value="新增" OnClick="form.action='add.php'">
<input type="submit" value="修改" OnClick="form.action='update.php'">
</form>
</body>
</html>
