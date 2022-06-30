<?php include "structure/header.php"; ?>

    <nav>
        <a href="index.php">Add User</a>
        <a href="list.php">Users list</a>
    </nav>

<?php
    include 'model.php';
    $model = new Model();
    $users = $model->output();
?>
    <div class="list">
        <?php
            foreach($users as $user) {
                ?>
                <div id="delete<?php echo $user['id']; ?>" class="card">
                    <p><?php echo "ID: ". $user['id']; ?></p>
                    <p><?php echo "Name: ". $user['first_name']; ?></p>
                    <p><?php echo "Last Name: ". $user['last_name']; ?></p>
                    <p><?php echo "Email: ". $user['email']; ?></p>
                    <button onclick="deleteAjax(<?php echo $user['id']; ?>)">Delete</button>
                </div>
                <?php
            }
        ?>
    </div>

    <script type="text/javascript">
        function deleteAjax(id) {
            $.ajax({
                type:'post',
                url: 'delete.php',
                data:{id:id},
                success:function(data){
                    console.log(data);
                    $('#delete'+id).hide();
                }
            })
        }
    </script>

<?php include "structure/footer.php"; ?>