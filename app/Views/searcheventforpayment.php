<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search events</title>
    <style>
        .searchevent{
           outline:none;
           border:none;
           background-color:transparent;
         }
        .searchevent:hover{
            background-color:rgb(230, 230, 230);
        } 
    </style>
</head>
<body>
<?php
if(isset($events)){
       
    foreach ($events as $key => $event) {
        echo "<span onclick='assignEvent(" . $event['SNo'] . ", \"" . addslashes($event['EventName']) . "\")' class='mt-1 searchevent'>
        <img src='" . $event['image'] . "' style='width:30px;height:30px;' alt='" . $event['EventName'] . "'> - " . $event['EventName'] . " - " . $event['year'] . "
    </span>";
    }    
        
}
?>
</body>
</html>
