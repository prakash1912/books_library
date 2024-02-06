<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Employee Dashboard</title>
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
</style>
</head>
<body>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Dashboard</h2>
            <ul>
            <li><a style="background-color:<?=$this->function_name == 'user_welcome' ? '#3498db':'' ?> " href="<?=base_url()?>Book_net/user_welcome">Dashboard</a></li>
                <li><a style="background-color:<?=$this->function_name == 'book_list' ? '#3498db':'' ?> " href="<?=base_url()?>book_net/book_list">Books</a></li>
                <li><a style="background-color:<?=$this->function_name == 'favorite_books' ? '#3498db':'' ?> " href="<?=base_url()?>book_net/favorite_books">Personal List  Books </a></li>
                <li><a style="background-color:<?=$this->function_name == 'user_management' ? '#3498db':'' ?> " href="<?=base_url()?>book_net/user_management">User Management</a></li>
                <li><a  href="<?=base_url()?>home/log_out">Log Out</a></li>
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
            <header>
                <h1>Dashboard</h1>
                <!-- Add any other header elements or navigation here -->
            </header>

            <!-- User information section -->
            <section class="user-info">
                <h2>User Information</h2>
                <div class="user-details">
                    <p><strong>Name:</strong> <?=$this->user_name?></p>
                    <p><strong>Email:</strong> <?=$this->user_email?></p>
                    <!-- Add more user details as needed -->
                </div>
            </section>
        </main>
    </div>

    <script src="script.js"></script>
</body>
</html>
