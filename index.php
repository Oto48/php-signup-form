<?php include "structure/header.php"; ?>

    <nav>
        <a href="index.php">Add User</a>
        <a href="list.php">Users list</a>
    </nav>
    
    <form action="" method="POST" id="form">
        <div class="input-container">
            <label for="first_name">First Name: </label>
            <input type="text" name="first_name" id="form_fname" required>
            <span class="error_form" id="fname_error_message"></span>
        </div>
        <div class="input-container">
            <label for="last_name">Last Name: </label>
            <input type="text" name="last_name" required>
            <span class="error_form" id="lname_error_message"></span>
        </div>
        <div class="input-container">
            <label for="email">Email: </label>
            <input type="email" name="email" required>
            <span class="error_form" id="email_error_message"></span>
        </div>
        <button type="button" name="submit" id="button">Submit</button>
    </form>

    <script type="text/javascript" src="submit.js"></script>

<?php include "structure/footer.php"; ?>