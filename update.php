<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>操作结果</title>
</head>
<body>
<?php
include_once("./configure.php");

function ifsql ($r, $s) {
	if($s) {	
	global $sql;	
	$sql .= $r . " = '" . $s . "' && ";
	}
}

function eqsql ($r, $s) {
	if($s) {	
	global $sql;	
	$sql .= $r . " = '" . $s . "' , ";
	}
}

function convselect ($i) {
	switch ($i) {
		case ip:
			return $_GET['fip'];
			break;
		default:
			print 'fxxxxk';
			break;
	}
}
$s = convselect($_GET['sequence']);

//更新表的内容
$sql = "UPDATE " . $_GET['pclass'] . " SET ";
	eqsql(id, $_GET['fid']);
	eqsql(type, $_GET['ftype']);
	eqsql(num, $_GET['fnum']);
	eqsql(date, $_GET['fdate']);
	eqsql(user, $_GET['fuser']);
	eqsql(department, $_GET['fdepartment']);
	eqsql(address, $_GET['faddress']);
	eqsql(ip, $_GET['fip']);
	//ifsql(year, $_GET['fyear']);
	eqsql(note, $_GET['fnote']);
	$sql .= "flag = 1 WHERE " . $_GET['sequence'];
	$sql .= " = '" . $s . "'";
//print $sql;
mysql_query($sql, $link);

//优化表的内容
$sql = "OPTIMIZE TABLE " . $_GET['pclass'];
mysql_query($sql, $link);

//更新使用年限
$sql = "update " . $_GET['pclass'] . " set year = (YEAR(CURDATE())-YEAR(date)) - (RIGHT(CURDATE(),5)<RIGHT(date,5)) where date != '0000-00-00'";
mysql_query($sql, $link);

$sql = "SELECT * FROM " . $_GET['pclass'];
if($_GET['fid'] || $_GET['ftype'] || $_GET['fnum'] || $_GET['fdate'] || $_GET['fuser'] || $_GET['fdepartment'] || $_GET['fip'] || $_GET['faddress'] || $_GET['fyear'] || $_GET['fnote']) 
{	
	global $sql;	
	$sql .= " WHERE ";
	ifsql(id, $_GET['fid']);
	ifsql(type, $_GET['ftype']);
	ifsql(num, $_GET['fnum']);
	//ifsql(date, $_GET['fdate']);
	ifsql(user, $_GET['fuser']);
	ifsql(department, $_GET['fdepartment']);
	ifsql(address, $_GET['faddress']);
	ifsql(ip, $_GET['fip']);
	//ifsql(year, $_GET['fyear']);
	ifsql(note, $_GET['fnote']);
	$sql .= "flag = 1"; 
}
$sql .= " ORDER BY " . $_GET['sequence'];
//print $sql;
	
//遍历输出查询结果
$rs = mysql_query($sql, $link);
echo "<h3>查询得到结果如下:</h3><br>";
echo "<table border='1'>";
	echo "<tr><td>No.</td>";
	echo "<td>名称</td>";
	echo "<td>型号</td>";
	echo "<td>数量</td>";
	echo "<td>购入时间</td>";
	echo "<td>使用人</td>";
	echo "<td>使用部门</td>";
	echo "<td>归属地</td>";
	echo "<td>使用年限</td>";
	echo "<td>IP</td>";
	echo "<td>备注</td></tr>";
	$i = 1;
while($row = mysql_fetch_array($rs))
{
	echo "<tr><td>" . $i++ . "</td>";
	echo "<td>$row[0]</td>";
	echo "<td>$row[1]</td>";
	echo "<td>$row[2]</td>";
	echo "<td>$row[3]</td>";
	echo "<td>$row[4]</td>";
	echo "<td>$row[5]</td>";
	echo "<td>$row[6]</td>";
	echo "<td>$row[7]</td>";
	echo "<td>$row[8]</td>";
	echo "<td>$row[9]</td></tr>";
}
echo "</table>";

//释放$rs缓存
mysql_free_result($rs);


?>
</body>
</html>