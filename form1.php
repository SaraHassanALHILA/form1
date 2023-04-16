<?php
$name='';
$email = '';
$password = '';
$errors = [];
$gender='';
$remmberme='';
if(isset($_POST['submit'])){
    $sql ='INSERT INTO user (name,password,email,gender,remmberme) values
    ("'.$_POST["name"].'",'.$_POST["password"].',"'.$_POST["email"].',"'.$_POST["gender"].',"'.$_POST["remmberme"].'")';
    if($conn->query($sql===TRUE)){
        echo "insert";

    }else echo "errro".$conn->connect_error;
    
    
}
if(!file_exists('images')){
    mkdir('images');
}
if($_FILES['image']['size'] < 1024*1024) {
    $errors[] = 'Image size must size no more 1 MB';
}
if (isset($_POST['gender'])) {
    if ($_POST['gender'] == 1) {
      echo 'MALE';
    } else {
       echo 'FEMALE';
    }
}
if (isset($_POST['remmberMe'])) {
     echo 'remmberMe';
}
$host="localhost";
$username="root";
$passwordDB='';
$dbname="informationmy";
$conn=new mysqli($host,$username,$passwordDB,$dbname);
if($conn->connect_error){
echo'error' .$conn->connect_error;
$sql="SELECT name,password,email,gender,remmberme from user";
$result= $con->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo"<table border='/1/'>
<thead><tr>
<th>Name</th>
<th>password</th>
<th>email</th>
<th>gender</th>
<th>remmberme</th>
</tr>
</thead><tbody>
<tr>
<td>" . $row["Name"]. "</td>
<td>" . $row["password"]. "</td>
<td> " . $row["email"]."</td>
<td>".$row['gender']. "</td>
<td>".$row['remmberme']. "</td>
</tr>
</tbody>
</table>
";
}
}else{
echo "0 results";
}
$con->close();
}
else echo'done';


?>
<form action="" method="post" enctype="multipart/form-data">
    <div>
<input value ="<?php echo $name?>" name="name" type="text">
<label  >name</label>
    </div>
    <div>
 <input value="<?php echo $email  ?>" name="email" type="text"  >
 <label >email</label>
    </div>
    <div>
 <input name="password" value="<?php echo $password  ?>" type="text">
<label >password</label>
</div>
<div>
                <input  value="<?php echo $gender?>"name="gender" value="1"  type="radio" >
                <label >Male</label>
                <input name="gender" value="2"  type="radio" >
                <label >Female</label>
            </div>
           
          <div>
                <input  value="<?php echo $remmberme?>"  name='remmberMe' type="checkbox" >
                <label >remmber me</label>
               </div>
               <div>
                <input type="submit" name ="submit"/>
               </div>
          
          