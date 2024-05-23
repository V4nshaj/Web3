<?php
$diaryContent ='';
session_start();
    if(array_key_exists('id', $_COOKIE))
    {
        $_SESSION['id'] = $_COOKIE['id'];
    }
    if(array_key_exists('id', $_SESSION))
    {
        include('connection.php');
        $query = "SELECT diary FROM Users WHERE id = " .
        mysqli_real_escape_string($link, $_SESSION['id']) . " LIMIT 1";

        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);
        $diaryContent = $row['diary'];
    
    }
    else{
        
        header("Location: index.php");
    }
    include('header.php');
?>

<nav class="navbar navbar-light bg-faded navbar-fixed-top">
    <a class="navbar-brand" href="#">Secret Diary</a>

    <div class="pull-xs-right">
        <a href="index.php?logout=1">
            <button class="btn btn-success-outline">Logout</button>
        </a>
    </div>
</nav>

<br>

<div class="container-fluid">
    <textarea name="notes" id="diary" class="form-control">
        <?php echo $diaryContent; ?>
    </textarea>
</div>
<?php
include('footer.php');
?>