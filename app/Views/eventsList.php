<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events List</title>
</head>
<body>

<tr>
<?php 

            if(isset($events) && isset($sno)){
                $i=$sno;
                foreach ($events as $key => $value) {
                    $j = $i+1;
                    echo "
                    <tr>
                    <td>$j</td>
                    <td style='font-weight:500;font-size:18px;' class='text-primary'>$value[EventName]</td>
                    <td>
                    <div class='rounded-top' style='width:100px;height:100px;'>
                    <a href='$value[Image]'>
                    <img class='rounded-top' style='width:100px;height:75px;' src='$value[Image]' alt='$value[EventName]'/>
                    </a>
                    <button ".(session()->get('role') == 2 ? 'hidden' : (session()->get('role') == 3 ? 'hidden' : ''))." onclick='showupdateeventbannermodal($value[Id],\"$value[EventName]\")' style='width:100px;height:25px;outline:none;border:none;' class = 'rounded-bottom text-center bg-dark text-white'>
                    change
                    </button>
                    </div>
                    </td>
                    <td style='font-weight:500;'>$value[From_date]</td>
                    <td style='font-weight:500;'>$value[To_date]</td>
                    <td style='font-weight:500;'>$value[TaxAmount]</td>
                    <td class='px-3' ".(session()->get('role') == 2 ? 'hidden' : (session()->get('role') == 3 ? 'hidden' : '')).">
                    <div class='d-flex justify-content-evenly'>
                    <button onclick='showupdateeventmodal($value[Id])' style='width:30px;height:30px;outline:none;border:none;' class='updateevent text-dark table-btn rounded-circle shadow-sm'><i class='fa-regular fa-pen-to-square'></i><span class='updatetooltip'>Update</span></button>
                     <button data-bs-toggle='modal' data-bs-target='#deletemodal' onclick='deleteevent($value[Id],\"$value[EventName]\")' style='width:30px;height:30px;outline:none;border:none;color:red;' class='trashevent table-btn rounded-circle shadow-sm'><i class='fa-solid fa-trash-can'></i><span class='trashtooltip'>Trash</span></button>
                     </div>
                     </td>
                    </tr>";
                    ++$i;
                }
            }
            else{
                echo "<tr>
                      <td colspan='7' class='text-center'>No search results</td>
                      <tr>";
             }
            ?>
</tr>


</body>
</html>
