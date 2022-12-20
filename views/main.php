<?php
require("config/db.php");
$logout = false;
if(isset($_POST['logout']))
{
    $one = "delete from curr_users;";
    $con->query($one);
    echo $one;
}
$query = "select * from curr_users;";
require("config/dbget.php");
$username = $posts[0]['username'];

if ($posts != null) {
    $username = $posts[0]['username'];

    $query = "select * from $username;";

    if (isset($_POST['create-submit'])) {
        $heading = $_POST['heading'];
        $content = $_POST['content'];
        if ($heading != null && $content != null) {
            $query1 = "INSERT INTO  $username(`sl_no`, `heading`, `content`, `date`) VALUES (NULL, '$heading', '$content', current_timestamp());";
            $con->query($query1);
        }
    }

    if (isset($_POST['delete-submit'])) {
        $sl_no = $_POST['sl_no'];
        $query2 = "delete from $username where sl_no = $sl_no;";
        $con->query($query2);
    }

    if(isset($_POST['edit-final-submit']))
    {
        $sl_no = $_POST['sl_no1'];
        $heading = $_POST['heading'];
        $content = $_POST['content'];
        $query3 = "update $username set heading = '$heading', content = '$content' where sl_no = $sl_no;";
        $con->query($query3);
    }

    if(isset($_POST['search']))
    {
        $word = $_POST['search-input'];
        $query = "select * from $username where heading like '%$word%';";
    }


    require("config/dbget.php");
    
}
else
{
    $logout = true;
}
if (isset($_POST['edit-submit'])) {
    $sl_no = $_POST['sl_no'];
    $query7 = "select * from $username where sl_no = $sl_no;";
    $result = mysqli_query($con, $query7);
    $post1 = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
}

$con->close();
?>

<?php
require("config/db.php");

$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <?php if($logout) { ?>
        <script> location = "../index.php"; </script>
        <?php } ?>
    <link rel="stylesheet" href="../css/main.css">
    <title>Welcome to my Notes</title>
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="main.php">Navbar</a>
            <div class="nav-item">
                <a class="nav-link active" aria-current="page" href="main.php">Home</a>
            </div>
            <form action="main.php" method="post" class="d-flex search-form" role="search">
                <input class="form-control me-2 search-input" type="search" placeholder="Search" aria-label="Search" name="search-input">
                <button class="btn btn-outline-success search-button" name="search" type="submit">Search</button>
            </form>
            <div class="nav-item dropdown dropstart nav-item-dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="profile-avatar" src="../assets/profile-avatar.png" alt="Profile">
                </a>
                <ul class="dropdown-menu">
                    <div class="dropdown">
                        <!-- <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Setting</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> -->
                        <form action="main.php" method="post"><button class="dropdown-item" name="logout" type='submit' href="#">Logout</button></form>
                    </div>
                </ul>
            </div>

        </div>
    </nav>
    <div class=" main-body">
        <div class="notes-panel">
            <div class="notes-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Create a note
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="main.php" method="post">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Heading</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="heading">
                                    <textarea name="heading" id="editor-heading" placeholder="Heading here"></textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#editor-heading'))
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                </div>
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Content</h1>
                                </div>
                                <div class="content">
                                    <textarea name="content" id="editor-content" placeholder="put your notes here"></textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#editor-content'))
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name='create-submit' class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="notes">
                <?php foreach ($posts as $post) {  ?>
                    <div class="card" style="width: 18rem;">
                        <form class="card-body" action='main.php' method='post'>
                            <h5 class="card-title"><?php echo "$post[heading]"; ?></h5>
                            <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                            <p class="card-text"> <?php echo "$post[content]"; ?> </p>
                            <input style="display: none;" type="number" name='sl_no' value='<?php echo "$post[sl_no]"; ?>'>
                            <!-- Button trigger modal -->
                            <button type="submit" name='edit-submit' class="btn btn-success">Fetch for Edit</button>
                            <a type="button" name='edit-submit' class="btn btn-success card-link edit-submit" data-bs-toggle="modal" data-bs-target="#exampleModal1"> Edit </a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                            <form action="main.php" method="post">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Heading</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="heading">
                                                    <textarea name="heading" id="edit-heading" placeholder="Heading here"><?php foreach($post1 as $posts1) { echo "$posts1[heading]"; } ?></textarea>
                                                    <script>
                                                        ClassicEditor
                                                            .create(document.querySelector('#edit-heading'))
                                                            .catch(error => {
                                                                console.error(error);
                                                            });
                                                    </script>
                                                </div>
                                                <input style="display: none;" type="number" name='sl_no1' value='<?php echo "$post[sl_no]"; ?>'>
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Content</h1>
                                                </div>
                                                <div class="content">
                                                    <textarea name="content" id="edit-content" placeholder="put your notes here">
                                                    <?php foreach ($post1 as $posts1) { echo "$posts1[content]"; } ?>
                                                    </textarea>
                                                    <script>
                                                        ClassicEditor
                                                            .create(document.querySelector('#edit-content'))
                                                            .catch(error => {
                                                                console.error(error);
                                                            });
                                                    </script>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name='edit-final-submit' class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                            <form class="card-link" action="main.php" style="width:100%;" method="POST">
                                <input style="display: none;" type="number" name='sl_no' value='<?php echo "$post[sl_no]"; ?>'>
                                <button class="btn btn-danger card-link" style="width:100%;" type="submit" name='delete-submit'> Delete </button>
                            </form>
                            
                        </form>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </div>
</body>

</html>