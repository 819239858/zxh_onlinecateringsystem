<?php
  define('IN_TG',TRUE);
  define('SCRIPT','member_modify');
  require dirname(__FILE__).'/includes/common.inc.php';

  if(isset($_COOKIE['username'])){
    $user = $_COOKIE['username'];
    if($rows = mysql_fetch_array(query("SELECT face,username,userpwd,phone,address FROM user_message WHERE username='$user' LIMIT 1"))){
      $face = $rows['face'];
      $username = $rows['username'];
    }else {
     if(!mysql_close()){
       exit("数据库关闭异常!");
     }
    }
    if($_GET['action']=='modify'){
     $modify = array();
     $modify['face'] = $_POST['face'];
     $modify['sex'] = $_POST['sex'];
     $modify['phone'] = $_POST['phone'];
     $modify['pwd'] = $_POST['pwd'];
     $modify['addr'] = $_POST['addr'];
     $rows = query("UPDATE user_message SET face='{$modify['face']}',userpwd='{$modify['pwd']}',sex='{$modify['sex']}',phone='{$modify['phone']}',address='{$modify['addr']}' WHERE username='$user'");
     if(!!$rows){
        if(!mysql_close()){
         exit("数据库关闭异常!");
        }
        location(null,"member.php");
     }else{
       if(!mysql_close()){
         exit("数据库关闭异常!");
       }
       location("修改失败!","member_modify.php");
     }
    }
 }else{
   location('非正常登陆!','login.php');
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>食在指尖-个人中心</title>
<?php
 require ROOT_PATH .'/includes/title.inc.php';
 require ROOT_PATH .'/includes/script.inc.php';
?>
</head>
<body>
<?php
 require ROOT_PATH .'/includes/header.inc.php';
?>
<div id="member">
	<div class='container'>
		<h2 class='text-center text-warning'>个人中心</h2>
		<form name='register' method="post" action="member_modify.php?action=modify">
		  <div class="media">
            <div class="pull-left">
               <input type="hidden" name="face" id="face" value="<?php echo $rows['face'];?>">
               <img class="media-object" src="<?php echo $rows['face'];?>" alt="头像选择" id="faceimg">
            </div>
            <div class="media-body">
               <h4 class="media-heading">基本信息</h4>
               <table>
                 <tr>
                    <td>用 户 名：</td>
                    <td><?php echo $username;?></td>
                 </tr>
                  <tr>
                     <td>密   码：</td>
                     <td><input type="text" name="pwd" value=<?php echo "{$rows['userpwd']}";?>></td>
                  </tr>
                 <tr>
                    <td>电话号码：</td>
                    <td><input type="text" name="phone" value=<?php echo "{$rows['phone']}";?>></td>
                 </tr>
                 <tr>
                    <td>性    别：</td>
                    <td>
                       <div class="form-group">
                        <label class="radio-inline">
                          <input type="radio" name="sex" value="男" checked> 先生
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="sex" value="女"> 女士
                        </label>
                      </div>
                    </td>
                 </tr>
                 <tr>
                    <td>默认收货地址：</td>
                    <td><textarea rows="2" cols="22" name="addr"><?php echo "{$rows['address']}";?></textarea></td>
                 </tr>
                 <tr>
                    <td></td>
                    <td><input type='submit' value='提交' class='btn btn-success pull-left'></td>
                 </tr>
               </table>
            </div>
         </div>
		</form>
	</div>
</div>

<?php
 require ROOT_PATH .'/includes/footer.inc.php';
?>

</body>
</html>