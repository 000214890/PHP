<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
          <style>
              body{
                  background-color: lightgrey;
              }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
           }

        li {
            float: left;
           }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            }

        li a:hover:not(.active) {
            background-color: orange;
            }
        .active {
            background-color: #4CAF50;
            }
           
        </style>
    <ul>
         <li><a class="active" href="#home">Home</a></li>
         <li><a href="CreateProject.php">Create Project</a></li>
         <li><a href="ReadData.php">View Projects</a></li>
    </ul>
        
  </head>
    <body>
        <span><center> <h1>Time Card</h1></center></span>
    </body>
</html>
