<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>voter registration 9</title>
   
</head>
<body>
    <?php
    include 'dbcon.php';
    if(isset($_POST['Submit'])){
        $name=mysqli_real_escape_string($con,$_POST['name']);
        $phone=mysqli_real_escape_string($con,$_POST['phone']);
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
        $conpassword=mysqli_real_escape_string($con,$_POST['conpassword']);

        $cpass=password_hash($cpassword, PASSWORD_BCRYPT);
        $conpass=password_hash($conpassword, PASSWORD_BCRYPT);

        $emailquery=" select * from registration where email='$email'";
        $query = mysqli_query($con,$emailquery);

        $emailcount=mysqli_num_rows($query);


        if($emailcount>0){
            echo "email already exist";
        }else{
            if($cpassword===$conpassword){
                $insertquery="insert into registration(	name,	phone,	email	,cpassword,	conpassword	
                ) values('$name','$phone','$email','$cpass','$conpass')";
                $iquery= mysqli_query($con,$insertquery);
                if($iquery){
                    ?>
                    <script>
                        alert("Inserted Successfully");
                    </script>
                
                    <?php
                }else{
                    ?>
                    <script>
                        alert("Not Inserted");
                    </script>
                     <?php
                }
            }else{
                ?>
                <script>
                alert("password are not matching");
                </script>
                <?php
            }
        }

    }
    ?>
    <fieldset>
    <h1>Voter Registration Form</h1>
    <hr>
    <form name="myform" onsubmit=" validateform()" method="post">
        <div class="ds1">
        <label>Full Name:<label>
        
        <input type="text" id="name" name="name" placeholder="Full Name" required><br><br>
    </div>
   <hr>
   <div class="ds2">
   <label>Phone No.:</label>
   <input type="number" name="phone" maxlength="10" placeholder="Phone No."><br><br>
   </div>
   <hr>
   <div class="ds3">
   <label>Email ID:</label>
   
       <input type="email" name="email" placeholder="Email ID"><br><br>
       </div>
       <hr>
       <div class="ds4">
       <label>Create Password:</label>
   
       <input type="password" name="cpassword" placeholder="Create Password"><br><br>
       </div>
       <hr>
       <div class="ds5">
       <label>Confirm Password:</label>
   
       <input type="password" name="conpassword" placeholder="Confirm Password"><br><br>
       </div>


       <input type="submit" id="submit" name="Submit">
    </fieldset>
      
       
        
    </form>
</body>
</html>