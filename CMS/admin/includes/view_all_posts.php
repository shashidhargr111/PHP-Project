
<?php 


    include("delete_modal.php");
    
    if(isset($_POST['checkBoxArray'])) {
        # code...
        
        foreach ($_POST['checkBoxArray'] as $postValueId) {
            # code...

            $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {

                case 'published':
                    # code...
                    $query = "update posts set post_status = '{$bulk_options}' where post_id = '{$postValueId}'";
                    $update_to_published_status = mysqli_query($connection,$query);
                    break;
                case 'draft':
                    # code...
                    $query = "update posts set post_status = '{$bulk_options}' where post_id = '{$postValueId}'";
                    $update_to_draft_status = mysqli_query($connection,$query);
                    break;
                
                case 'delete':
                    # code...
                    $query = "delete from posts where post_id = '{$postValueId}'";
                    $delete_status = mysqli_query($connection,$query);
                    break;
                

                default:
                    # code...
                    break;
            }

        }

    }


 ?>



<form action="" method="post">


<table class="table table-bordered table-hover">

    <div id="bulkOptionContainer" style="padding-left: 0px;" class="col-xs-4">
        <select  class="form-control" name="bulk_options" id="">
            <option value="">Select Option</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
        </select>
    </div>

    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a href="posts.php?source=add_post" class="btn btn-primary">Add New post</a>
    </div>


    <br>


    <thead>
        <th><input type="checkbox" id="selectAllBoxes" ></th>
        <th>ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>View Post</th>
        <th>Delete</th>
        <th>Edit</th>
    </thead>
    <tbody>


        <?php

            $query = "select *from posts";
            $select_posts = mysqli_query($connection,$query);

            while ($row = mysqli_fetch_assoc($select_posts)) {
                # code...
                $post_id = $row['post_id'];
                $post_author= $row['post_author'];
                $post_title= $row['post_title'];
                $post_category_id= $row['post_category_id'];
                $post_status= $row['post_status'];
                $post_image= $row['post_image'];
                $post_tags= $row['post_tags'];
                $post_comment_count= $row['post_comment_count'];
                $post_date= $row['post_date'];
                $post_content= $row['post_content'];


                echo "<tr>"; 

                ?>

                <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>

                <?php

                echo "<td>{$post_id}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_title}</td>";


                $query = "select *from categories where cat_id = $post_category_id ";
                $select_categories_id = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($select_categories_id)) {
                    # code...
                    $cat_id = $row['cat_id']; 
                    $cat_title = $row['cat_title'];

                    echo "<td>{$cat_title}</td>";

                }

                
                
                echo "<td>{$post_status}</td>";
                echo "<td><img src='../images/{$post_image}'  width='100' alt='image' >'</td>";
                echo "<td>{$post_tags}</td>";

                $query = "select * from comments where comment_post_id = $post_id";
                $send_comment_query = mysqli_query($connection,$query);
                $comment_id = $row['comment_id'];
                $count_comments = mysqli_num_rows($send_comment_query);


                echo "<td><a href='post_comments.php?id=$post_id'>{$count_comments}</a></td>";

                echo "<td>{$post_date}</td>";
                echo "<td><a href ='../post.php?p_id={$post_id}'>View Post</a></td>";

                // echo "<td><a onClick=\"javascript: return confirm('Are you want to Delete...')\" href ='posts.php?delete={$post_id}'>Delete</a></td>";
                echo "<td><a rel='$post_id' class='delete_link' href='javascript:void(0)' >Delete</a></td>";

                echo "<td><a href ='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";

                echo "</tr>";
            }                            
        ?>

    </tbody>
</table>
</form>

<!-- </form> -->
<?php 

    if (isset($_GET['delete'])) {
        # code...

        if (isset($_SESSION['user_role'])) {
            # code...

            if ($_SESSION['user_role'] == 'admin' ) {
                # code...

            $the_post_id = $_GET['delete'];

            $query = "delete from posts where post_id = {$the_post_id}";
            $delete_query = mysqli_query($connection,$query);
            header("Location: posts.php");


        }

        }

    }

 ?>
<script>
    
    $(document).ready(function(){


        $(".delete_link").on('click', function(){

            var id = $(this).attr("rel");

            var delete_url = "posts.php?delete=" + id + " ";

            $(".modal_delete_link").attr("href",delete_url);

            $("#myModal").modal('show')

        });
    });
    

</script>
