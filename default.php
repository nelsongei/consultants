<?php
$con = mysqli_connect('localhost','root','','demo');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our PHP Page</title>
</head>
<body>
<form method="POST" is="submitForm">
    <input type="text" id="name" name="name">
    <input type="email" id="email" name="email">
    <select name="gender" id="gender">
        <option>Male</option>
        <option>Female</option>
    </select>
    <input type="submit" name="save">
</form>
<table style="border: 1px solid black">
    <button type="button" id="display">
        Get Users
    </button>
    <tr id="table1">
        <th>#</th>
        <th>Name</th>
        <th>gender</th>
        <th>EMail</th>
    </tr>
</table>
<div id="responseCOntainer"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    document.addEventListener('submit',(event)=>{
        event.preventDefault();
        const formBody = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            gender: document.getElementById('gender').value,
        }
        $.ajax({
            url:"http://127.0.0.1/demo/action.php",
            type: "POST",
            async: false,
            data: formBody,
            success: function (request)
            {
                if(request.statusCode ===200)
                {
                    alert('success');
                }
            }
        })
    })
    $(document).ready(function () {
        $("#display").click(function () {
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1/demo/fetch.php",
                dataType: "html",
                success: function (response) {
                    document.getElementById('responseCOntainer').innerHTML  = response;
                    $('#table1').hide();
                }
            })
        })
    })
</script>
</body>
</html>
