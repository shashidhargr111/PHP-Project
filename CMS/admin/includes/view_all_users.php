<table class="table table-bordered table-hover">
    <thead>
        <th>ID</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>
        
    </thead>
    <tbody>


        <?php

            $query = "select *from users";
            $select_users = mysqli_query($connection,$query);

            while ($row = mysqli_fetch_assoc($select_users)) {
                # code...
                $user_id = $row['user_id'];
                $username= $row['username'];
                $user_password= $row['user_password'];
                $user_firstname= $row['user_firstname'];
                $user_lastname= $row['user_lastname'];
                $user_email= $row['user_email'];
                $user_image= $row['user_image'];
                $user_role= $row['user_role'];
                
                echo "<tr>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$username}</td>";
                echo "<td>{$user_firstname}</td>";


                // $query = "select *from categories where cat_id = $post_category_id ";
                // $select_categories_id = mysqli_query($connection,$query);

                // while ($row = mysqli_fetch_assoc($select_categories_id)) {
                //     # code...
                //     $cat_id = $row['cat_id']; 
                //     $cat_title = $row['cat_title'];

                //     echo "<td>{$cat_title}</td>";

                // }

                
                
                echo "<td>{$user_lastname}</td>";
                // echo "<td><img src='../images/{$user_image}'  width='100' alt='image' >'</td>";
                echo "<td>{$user_email}</td>";
                echo "<td>{$user_role}</td>";
                // echo "<td>{$post_date}</td>";
                echo "<td><a href ='users.php?change_to_admin=$user_id'>Admin</a></td>";
                echo "<td><a href ='users.php?change_to_sub=$user_id'>Subscriber</a></td>";
                echo "<td><a href ='users.php?delete=$user_id'>Delete</a></td>";
                echo "<td><a href ='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
                echo "</tr>";
            }                            
        ?>

    </tbody>
</table>


<?php 


    if (isset($_GET['change_to_admin'])) {
        # code...

        $the_user_id = $_GET['change_to_admin'];

        $query = "update users set user_role = 'admin' where user_id = $the_user_id ";
        $unapprove_query = mysqli_query($connection,$query);
        header("Location: users.php");

    }
    
    if (isset($_GET['change_to_sub'])) {
        # code...

        $the_user_id = $_GET['change_to_sub'];

        $query = "update users set user_role = 'subscriber' where user_id = $the_user_id ";
        $approve_query = mysqli_query($connection,$query);
        header("Location: users.php");
 
    }

    if (isset($_GET['delete'])) {
        # code...

        $user_id = $_GET['delete'];

        $query = "delete from users where user_id = {$user_id}";
        $delete_query = mysqli_query($connection,$query);
        header("Location: users.php");

    }

 ?>
