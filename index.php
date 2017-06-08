<?php


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books Rent</title>
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="js/app.js" type="text/javascript"></script>
    
</head>
<body>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

    <center>

    <form action="api/books.php" method="post" role="form" id="form">
        <legend>Welcome in Books Rent</legend>
        <div class="form-group">
            <label for="">Author</label>
            <input type="text" class="form-control" name="author" id="author"
                   placeholder="Author">
        </div>
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" id="text"
                   placeholder="Title">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" class="form-control" name="description" id="description"
                   placeholder="Description">
        </div>
        <button type="submit" name="submit" value="addBook" class="btn btn-success" id="btn">Add book</button>
    </form>

    </center> 

    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    </div>
</div>
 
<div class="container">   
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">            
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="books">
            <div id="reset">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div><p></p></div>
                
                
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
    </div>    
</div>
    
</body>
</html>

