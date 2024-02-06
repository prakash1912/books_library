
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/plugins/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/plugins/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    <style>
       .success-msg 
        {
            color: #270;
            background-color: #DFF2BF;
        }
        .warning-msg 
        {
                color: #9F6000;
                background-color: #FEEFB3;
        }
        .error-msg 
        {
            color: #D8000C;
            background-color: #FFBABA;
        }
    </style>
    <script>

        function back_page()
        {
            window.location.href = "<?=base_url()?>book_net/book_list"
        }
    </script>
    <title>Add New Book</title>
</head>
<body>

<h5><?= @$_SESSION['msg']; $_SESSION['msg'] = '';?></h5> 
    <div class="container mt-5">
        <h2>Add New Book <input style="margin-left:380px;" type="button" name="back_book_list" onclick="back_page('back')" class="btn btn-primary btn-round" value="Back"></h2>

       <h5 style="color:red"><?php echo validation_errors(); ?> </h5> 

        <?php echo form_open('book_net/add_books', 'class="form"'); ?>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" >
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" value="<?php echo set_value('author'); ?>" >
        </div>

        <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" class="form-control" name="genre" value="<?php echo set_value('genre'); ?>" >
        </div>

        <div class="form-group">
            <label for="publicationYear">Publication Year:</label>
            <input type="number" class="form-control" name="publicationYear" value="<?php echo set_value('publicationYear'); ?>" >
        </div>

        <div class="form-group">
            <label for="language">Language:</label>
            <input type="text" class="form-control" name="language" value="<?php echo set_value('language'); ?>" >
        </div>

        <div class="form-group">
            <label for="pages">Pages:</label>
            <input type="number" class="form-control" name="pages" value="<?php echo set_value('pages'); ?>" >
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" class="form-control" name="price" value="<?php echo set_value('price'); ?>" >
        </div>

        <!-- <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description"><?php echo set_value('description'); ?></textarea>
        </div> -->

        <!-- <div class="form-group">
            <label for="availability">Availability:</label>
            <select class="form-control" name="availability">
                <option value="1" <?php echo set_select('availability', '1'); ?>>Available</option>
                <option value="0" <?php echo set_select('availability', '0'); ?>>Not Available</option>
            </select>
        </div> -->

        <!-- <div class="form-group">
            <label for="purchaseDate">Purchase Date:</label>
            <input type="date" class="form-control" name="purchaseDate" value="<?php echo set_value('purchaseDate'); ?>">
        </div> -->

        <button type="submit" class="btn btn-primary">Add Book</button>

        <?php echo form_close(); ?>
    </div>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/popper.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/plugins/owl.carousel.js"></script>
<script src="<?=base_url()?>assets/js/plugins/owl.carousel.min.js"></script>
<script src="<?=base_url()?>assets/js/script.js"></script>

</body>
</html>
