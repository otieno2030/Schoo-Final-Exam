
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>portfolio</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="script.js"></script>
   
        <!--custom links-->
        <link rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
    background-size: cover;
    font-family: 'Rubik', sans-serif;
    background-image: url(login.jpg);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    overflow: hidden;
}

.container {
    position: fixed;
    text-align: center;
}

.login-container {
    width: 300px;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    background-color: #84afdc; 
    background-color: rgba(255, 255, 255, 0.8);
}


.login-container h3 {
    text-align: center;
    font-weight: 800;
    color: #1a1313;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

form input:nth-child(3) {
    width: 100px;
}

.login-container input {
    display: block;
    margin-bottom: 10px;
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.login-container  button {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

    </style>
    
</head>
<body>


<div class="container">
    <div class="login-container">
        <h3>welcome back</h3>
        <form id="loginForm">
            <input type="text" id="username" name="username" required placeholder="username">
            <input type="password" id="password" name="password" required placeholder="password">
            <button><a href="landing.php"></button>
        </form>
    </div>
</div>
<canvas id="snowCanvas"></canvas>
<script src="script.js"></script>

</body>
</html>gitghhh
