<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinators list</title>
</head>
<body>

<tr>
<?php 

            if(isset($coordinators)){
                $i=$sno;
                foreach ($coordinators as $key => $value) {
                    $j = $i+1;
                    echo "
                    <tr >
                    <td>$j</td>
                    <td>$value[Name]</td>
                    <td>$value[Email]</td>
                    <td>$value[Mobile]</td>
                    <td>$value[Assigned_area]</td>
                    <td>Active</td>
                    <td class='px-3'>
                    <a href='updatecoordinator?id=$value[id]' style='cursor:pointer;' class='text-decoration-none text-dark'><i class='fa-regular fa-pen-to-square'></i></a>
                    <a style='cursor:pointer;' class='text-decoration-none text-dark'><span style='color:red;'><i class='fa-solid fa-trash-can'></i></span></a>
                    </td>
                    </tr>";
                    ++$i;
                }
            }
            ?>
</tr>


</body>
</html>
