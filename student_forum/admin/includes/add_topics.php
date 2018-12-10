 <center>
                  <h2 style="padding: 5px; color: red;">Add New Topics</h2>
                  <form class='' action='' method='POST' id=''>
                  <input type="" name="topic"  placeholder='Enter the your topic'><br><br>
                  <input type='submit' name='add' value='Add Topics'/>
                  </form>
         

                              <?php

                              include("includes/connection.php");

                              if(isset($_POST['add'])){

                              
                              $topic = $_POST['topic'];


                              if ($topic=='') {
                                    # code...
                                    echo "<h2>Please enter Topic</h2>";
                                    exit();
                              }
                              else{
                              $insert = "insert into topics(topic_title) values('$topic')"; 

                              $run = mysqli_query($con,$insert);

                              if($run){

                                    echo "<h3>Your Topic is added </h3>";
                              }
                        }

                        }
                   
?>
</center>
         