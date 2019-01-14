<?php

    include("db.php");

    if (isset($_POST['id'])) {  
        # code...

        $id = $_POST['id'];
        $id1 = mysqli_real_escape_string($con,$id);
    
        $query = "select *from cars where id='{$id1}'";
        $query_car_info = mysqli_query($con,$query);

        if (!$query_car_info) {
            # code...
            die("query failed" . mysqli_error($con));
        }

        while ($row = mysqli_fetch_array($query_car_info)) {
            # code...

            
            echo "<label for='Car-name'>Edit/Delete Car</label>";
            echo "<input rel='{$row['id']}' type='text' class='form-control title-input' value='{$row['title']}' ><br>";
            echo "<center><input type='button' class='btn btn-success update' value='Update Car'> ";
            echo "<input type='button' class='btn btn-danger delete' value='Delete Car'> ";
            echo "<input type='button' class='btn btn-info clo' value='Close'> </center><br>";
            echo "<p id='feedback' class='bg-success text-center' ></p>";
            

        }
    }

    if(isset($_POST['updatethis'])){
   
        $id    =  $_POST['id'];
        $title =  $_POST['title'];
        
        $query = "UPDATE cars SET title = '$title' WHERE id = '$id' ";
        $result_set = mysqli_query($con, $query);
        
        if(!$result_set) {
        
            die("QUERY FAILED" . mysqli_error($con));
        
        }

    }

    if(isset($_POST['deletethis'])){
   
        $id    =  $_POST['id'];
        // $title =  $_POST['title'];
        
        $query = "DELETE from cars  WHERE id = '$id' ";
        $delete_set = mysqli_query($con, $query);
        
        if(!$delete_set) {
        
            die("QUERY FAILED" . mysqli_error($con));
        
        }

    }

?>

<script>

    $(document).ready(function() {

        var id;
        var title;
        var updatethis = "update";
        var deletethis = "delete";

        $(".title-input").on('input',function(){

            id = $(this).attr('rel');
            title = $(this).val();

        });


        $(".update").on('click', function(){
 
            $.post("process.php", {id: id, title: title, updatethis: updatethis}, function(data){
                
                // alert("Update successfully...!");
                $("#feedback").text("Record Updated successfully...");
                // $("#car-form-clear")[0].reset();
                
            })
        });


        $(".delete").on('click', function(){

            if (confirm('Are you sure want to delete this')) {

                id = $(".title-input").attr('rel');

                $.post("process.php", {id: id,  deletethis: deletethis}, function(data){
                    
                    // alert("Deleted");
                    $("#action-container").hide("");

                });
            }
        }); 


        $(".clo").on('click', function(){

            $("#action-container").hide("");
        
        });

    });
    
</script>