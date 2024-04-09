<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Dashboard</title>
    <style>


    </style>
</head>
<body>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Dashboard</title>
   
    <style>

.dashboard {
    display: flex;
    height: 100vh;
}

.sidebar {
    background-color: #333;
    color: #fff;
    width: 200px;
    padding: 20px;
}

.sidebar-item {
    margin-bottom: 10px;
}

.sidebar-item a {
    color: #fff;
    text-decoration: none;
}

.content {
    padding: 20px;
    flex: 1;
}

.content h1 {
    margin-top: 0;
}

.counters {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    width: 200px;
    flex-wrap:wrap;
}

.counter {
    text-align: center;
}

.counter h2 {
    margin-bottom: 5px;
}
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="sidebar-item">
                <a href="#">Link 1</a>
            </div>
            <div class="sidebar-item">
                <a href="#">Link 2</a>
            </div>
            <div class="sidebar-item">
                <a href="#">Link 3</a>
            </div>
        </div>
        <div class="content">
            <h1>Welcome to the Dashboard</h1>
            <p>This is a simple dashboard with a sidebar and content area.</p>
            <div class="counters">
                <div class="counter">
                    <h2>Users:</h2>
                    <p>100</p>
                </div>

                <div class="counter">
                    <h2>Products:</h2>
                    <p>500</p>
                </div>


                <div class="counter">
                    <h2>admins:</h2>
                    <p>500</p>
                </div>



                <div class="counter">
                    <h2>customers:</h2>
                    <p>500</p>
                </div>

            </div>
        </div>
    </div>
</body>
</html>

</body>
</html>