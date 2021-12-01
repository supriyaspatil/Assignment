<?php
	
	$servername = "localhost";
    $username = "root";
    $password = " ";
    $db = "studentinfo";

	$conn =mysqli_connect('localhost','root','','studentinfo');
	 if (!$conn) {
       echo 'Connection error:' . mysqli_connect_error();
      }
     else
      {
        //echo "Connected successfully";
   
      }


      if(isset($_POST['btnsubmit']))
        {
				if(empty($_POST['stdno']) || empty($_POST['stdname']) ||empty($_POST['stddob']) ||empty($_POST['stddoj'])  )
				{
					echo "Please Fill in the Blank";
				}
				else
				{
					$studentno = $_POST['stdno'];
					$studentname = $_POST['stdname'];
					$studentdob = $_POST['stddob'];
					$studentdoj = $_POST['stddoj'];

					$query = "insert into STUDENT(STUDENT_NO,STUDENT_NAME,STUDENT_DOB,STUDENT_DOJ)VALUES('$studentno','$studentname','$studentdob','$studentdoj')";
					$result = mysqli_query($conn,$query);

					if($result)
			          {
			          	
			          	//echo "insert";
			          }
			          else{
			          	echo "please check your Query";
			          }
				}
        }
         

         if(isset($_POST['btnupdate']))
        {
				
					$studentno = $_POST['stdno'];
					$studentname = $_POST['stdname'];
					$studentdob = $_POST['stddob'];
					$studentdoj = $_POST['stddoj'];

					$query = "update STUDENT set STUDENT_NAME='$studentname',STUDENT_DOB='$studentdob',STUDENT_DOJ='$studentdoj' where STUDENT_NO='$studentno'";
					$result = mysqli_query($conn,$query);

					if($result)
			          {
			          	//header("location:view.php");
			          	//echo "update";
			          }
			          else{
			          	echo "please check your Query";
			          }
				
        }
        if(isset($_POST['btndelete']))
        {
				
					$studentno = $_POST['stdno'];
					
					$query = "DELETE FROM STUDENT WHERE STUDENT_NO='$studentno' ";
					$result = mysqli_query($conn,$query);

					if($result)
			          {
			          	
			          	//echo "record deleted";
			          }
			          else{
			          	echo "please check your Query";
			          }
				
        }

        if(isset($_POST['btndisplay']))
        {
				error_reporting();
				$query ="SELECT * FROM STUDENT";
				$data = mysqli_query($conn,$query);
				$total =mysqli_num_rows($data);
				
				if($total != 0 )
				{
							
							?>
					  <table border="solid 2px;">
					  <tr>
					    <td>STUDENT NO</td>
					    <td>STUDENT NAME</td>
					    <td>STUDENT DOB</td>
					    <td>STUDENT DOJ</td>
					  </tr>
					  
				
					<?Php

					while ($result =mysqli_fetch_assoc($data)) 
					{
						echo "<tr>
					    <td>".$result['STUDENT_NO']."</td>
					    <td>".$result['STUDENT_NAME']."</td>
					    <td>".$result['STUDENT_DOB']."</td>
					    <td>".$result['STUDENT_DOJ']."</td>
					  </tr>";

					}
				}
			
				else{
					    echo "NO record found";
				}
		  }
      
?>
</table>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
	 <section>

	 <div class="container">
   <form action="" Method="POST">

   	<h1>STUDENT INFORMATION</h1>

   	<div class="form-group">
      <label for="name">Student No:</label>
      <input type="no" class="form-control" placeholder="Enter name" name="stdno">
    </div>
   	<div class="form-group">
    <label for="name">Student Name:</label>
    <input type="text" class="form-control" placeholder="Enter Student" name="stdname">
  </div>
  <div class="form-group">
    <label for="pwd">Student DOB:</label>
    <input type="date" class="form-control" placeholder="Enter DOB" name="stddob">
  </div>
   <div class="form-group">
    <label for="pwd">Student DOJ:</label>
    <input type="date" class="form-control" placeholder="Enter DOJ" name="stddoj">
  </div>
   
  
  

   <button type="submit" id="test" name="btnsubmit" class="btn btn-primary new">Add</button>
   <button type="submit"  id="test" name="btnupdate" class="btn btn-primary new">Update</button>
   <button type="submit" id="test" name="btndelete" class="btn btn-primary new">Delete</button>
   <button type="submit" id="test" name="btndisplay" class="btn btn-primary new">Display</button>

  
</form>


</div>
</section>

     
</body>
</html>
