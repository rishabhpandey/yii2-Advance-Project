<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\DetailView;
//use frontend\models\User;
$this->title = 'My Yii Application';
$userId=Yii::$app->user->id;
if($userId !=NULL){

?>

<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
    margin-top: 100px;
    margin-left: 150px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<table>
    <th>Id</th>
    <th>Module</th>
    <th>Link</th>
  <tr>
      <td>1</td>
      <td>User</td>
      <td><a href="http://yii2.dev/index.php?r=user">Click Here</a></td>
  </tr>
  <tr>
    <td>2</td>
    <td>Person</td>
    <td><a href="http://yii2.dev/index.php?r=person">Click Here</a></td>
  </tr>
  <tr>
    <td>3</td>
    <td>City</td>
    <td><a href="http://yii2.dev/index.php?r=city">Click Here</a></td>
  </tr>
  <tr>
    <td>4</td>
    <td>Roles</td>
    <td><a href="http://yii2.dev/index.php?r=roles">Click Here</a></td>
  </tr>
  <tr>
    <td>5</td>
    <td>State</td>
    <td><a href="http://yii2.dev/index.php?r=state">Click Here</a></td>
  </tr>
</table>

</body>
</html>
<?php }else{?>
<html>
    <h2>Welcome To Yii2</h2>
</html>
<?php } ?>
