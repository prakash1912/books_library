<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
    <script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>
    <title>Book Dashboard</title>
    <style>body {
    margin: 0;
    font-family: 'Arial', sans-serif;
}

.dashboard-container {
    display: flex;
}

.sidebar {
    width: 150px;
    background-color: #2c3e50;
    color: #fff;
    padding: 20px;
}

.sidebar h2 {
    margin-bottom: 20px;
    font-size:20px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar li {
    margin-bottom: 10px;
}

.sidebar a {
    text-decoration: none;
    color: #fff;
    padding: 10px;
    display: block;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.sidebar a:hover {
    background-color: #34495e;
}

main {
    flex: 1;
    padding: 20px;
}

header {
    background-color: #3498db;
    color: #fff;
    padding: 10px;
    text-align: center;
}

.user-info,
.user-activity {
    margin-bottom: 30px;
}

.user-details {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.activity-list {
    list-style: none;
    padding: 0;
}

.activity-list li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

footer {
    text-align: center;
    margin-top: 20px;
    padding: 10px;
    background-color: #f2f2f2;
}
th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .filter-container {
            
            margin-top: 20px;
        }

        .filter-container input {
            padding: 10px;
        }
        #add_book{

            margin-left: 590px;
        }
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





    function remove_fileter(value)
    {
        //alert(value);
        if(value !='')
        {
            window.location.href='<?=base_url()?>book_net/book_list';
        }
    }

    function add_book(value)
    {
        if(value)
        {
            window.location.href='<?=base_url()?>book_net/add_books';
        }
    }
    function add_favorite_books(book_id)
    {
        //alert(book_id);
        $.post('<?=base_url()?>book_net/favorite_books',{book_id:book_id},function(response)
        {
           // alert(response);
            window.location.reload();

        }
        
        )
    }
</script>
</head>
<body>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2 >Dashboard</h2>
            <ul>
                <li><a style="background-color:<?=$this->function_name == 'user_welcome' ? '#3498db':'' ?> " href="<?=base_url()?>Book_net/user_welcome">Dashboard</a></li>
                <li><a style="background-color:<?=$this->function_name == 'book_list' ? '#3498db':'' ?> " href="<?=base_url()?>book_net/book_list">Books</a></li>
                <li><a style="background-color:<?=$this->function_name == 'favorite_books' ? '#3498db':'' ?> " href="<?=base_url()?>book_net/favorite_books">Personal List  Books </a></li>
                <li><a style="background-color:<?=$this->function_name == 'user_management' ? '#3498db':'' ?> " href="<?=base_url()?>book_net/user_management">User Management</a></li>
                <li class="hidden"><a  href="<?=base_url()?>home/log_out">Log Out</a></li>
                <li class="hidden"><a  href="<?=base_url()?>home/log_out"></a></li>
                <li class="hidden"><a  href="<?=base_url()?>home/log_out"></a></li>
                <li class="hidden"><a  href="<?=base_url()?>home/log_out"></a></li>
                <li class="hidden"><a  href="<?=base_url()?>home/log_out"></a></li>
                <li class="hidden"><a  href="<?=base_url()?>home/log_out"></a></li>
                <li class="hidden"><a  href="<?=base_url()?>home/log_out"></a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main>
            <!--  <header>
                <h1>Book Dashboard</h1>
               Add any other header elements or navigation here 
            </header>-->

            <!-- User information section -->
          <h5><?= @$_SESSION['msg']; $_SESSION['msg'] = '';?></h5> 
           
            <?php if($this->function_name == 'book_list') { ?>
            <div class="filter-container">
            <form method="post" action="<?=base_url()?>/book_net/book_list">
                
                <label for="titleFilter"><b>Filter by Title:</b></label>
                <input type="text" id="titleFilter" name="titleFilter" value="<?=$this->book_Title?>">
                <?php if($this->book_Title !='') { ?>
                <input type="button" name="remove_filter" onclick="remove_fileter('remove_value')" class="btn btn-primary btn-round" value="Remove Filter">
                <?php if($this->book_list == ''){
                    echo"No results found!!";
                } ?>
                <?php }else {?>
                <input type="submit" name="submit" class="btn btn-primary btn-round" value="GO">
                <?php }?>
                <input style="margin-left:380px;" type="button" name="remove_filter" onclick="add_book('add_books')" class="btn btn-primary btn-round" value="Add Books">
        <!-- <a href="" id="add_book" class="btn btn-primary btn-round">Add Books</a> -->
        </form>
        
    </div>
            <section class="user-info">
            <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Published On</th>
                <th>Language</th>
                <th>Pages</th>
                <th>Price</th>
                <th>Rating</th>
                
            </tr>
        </thead>
        <tbody>
            
            <!-- Add book data rows here -->
            <?php 
            $count = 1;
            foreach($this->book_list['result_array'] as $this->book_list_value) { ?>
            <tr>
                <td><?=$count?></td>
                <td><?=$this->book_list_value['Title']?></td>
                <td><?=$this->book_list_value['Author']?></td>
                <td><?=$this->book_list_value['Genre']?></td>
                <td><?=$this->book_list_value['PublicationYear']?></td>
                <td><?=$this->book_list_value['Language']?></td>
                <td><?=$this->book_list_value['Pages']?></td>
                <td><?=$this->book_list_value['Price']?></td>
                <td><?=$this->book_list_value['Rating']?></td>
                
            </tr>
            <?php $count++;} ?>
            <!-- Add more book data rows as needed -->
        </tbody>
    </table>
            </section>
        </main>
    </div>
    <?php }elseif($this->function_name == 'favorite_books') { ?>

        <section class="user-info">
            <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Publication Year</th>
                <th>ISBN</th>
                <th>Language</th>
                <th>Pages</th>
                
            </tr>
        </thead>
        <tbody>
            
            <!-- Add book data rows here -->
            <?php 
            $count = 1;
            foreach($this->favorite_books_list['result_array'] as $this->book_list_value) { ?>
            <tr>
                <td><?=$count?></td>
                <td><?=$this->book_list_value['Title']?></td>
                <td><?=$this->book_list_value['Author']?></td>
                <td><?=$this->book_list_value['Genre']?></td>
                <td><?=$this->book_list_value['PublicationYear']?></td>
                <td><?=$this->book_list_value['ISBN']?></td>
                <td><?=$this->book_list_value['Language']?></td>
                <td><?=$this->book_list_value['Pages']?></td>
            </tr>
            <?php $count++;} ?>
            <!-- Add more book data rows as needed -->
        </tbody>
    </table>
            </section>
    <?php }elseif($this->function_name == 'user_management')  { ?>


        <?php if($this->_user_id !='') { ?>
            <h5 >UserName :<?=$this->user_name?><span style ="margin-left:400px;"><a style="background-color:<?=$this->function_name == 'user_management' ? 'white':'' ?> " href="<?=base_url()?>book_net/user_management">Back</a></span> </h5>
            <section class="user-info">
            <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Publication Year</th>
                <th>ISBN</th>
                <th>Language</th>
                <th>Pages</th>
                
            </tr>
        </thead>
        <tbody>
            
            <!-- Add book data rows here -->
            <?php 
            $count = 1;
            foreach($this->favorite_books_list['result_array'] as $this->book_list_value) { ?>
            <tr>
                <td><?=$count?></td>
                <td><?=$this->book_list_value['Title']?></td>
                <td><?=$this->book_list_value['Author']?></td>
                <td><?=$this->book_list_value['Genre']?></td>
                <td><?=$this->book_list_value['PublicationYear']?></td>
                <td><?=$this->book_list_value['ISBN']?></td>
                <td><?=$this->book_list_value['Language']?></td>
                <td><?=$this->book_list_value['Pages']?></td>
            </tr>
            <?php $count++;} ?>
            <!-- Add more book data rows as needed -->
        </tbody>
    </table>
            </section>
        <?php }else{ ?>
        <section class="user-info">
            <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>User</th>
                <th>Personal list</th>
            </tr>
        </thead>
        <tbody>
            
            <!-- Add book data rows here -->
            <?php 
            $count = 1;
            foreach($this->users_personal_list['result_array'] as $this->users_personal_list_lp) { ?>
            <tr>
                <td><?=$count?></td>
                <td><?=$this->users_personal_list_lp['user_name']?></td>
                <td><a style="background-color:<?=$this->function_name == 'user_management' ? 'white':'' ?> " href="<?=base_url()?>book_net/user_management/<?=$this->users_personal_list_lp['user_id']?>">View</a></td>
                
            </tr>
            <?php $count++;} ?>
            <!-- Add more book data rows as needed -->
        </tbody>
    </table>
            </section>

    <?php }} ?>
    
</body>
</html>
