<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application list</title>
</head>
<body>


<?php if(isset($applications) && isset($sno)) : $i=$sno + 1;?>
                
                <?php foreach ($applications as $key => $value) : ?> 
                     <tr >
                     <td style='font-weight:500;'><?=$i?></td>
                     <td style='font-weight:500;'><?=$value->Name?></td>
                     <td style='font-weight:500;'><?=$value->Phonenumber?></td>
                     <td style='font-weight:500;'><?=$value->Aadharnumber?></td>
                     <td style='font-weight:500;'><?=$value->District?></td>
                     <td style='font-weight:500;'><?=$value->State?></td>
                     <td class='d-flex justify-content-evenly'>
                     <button data-bs-toggle = 'modal' data-bs-target='#viewapplication' backdrop="false" static="true" onclick ='viewApplications(<?=json_encode($value)?>)' data-bs-toggle='tooltip' title='viewapplication' backdrop="false" static="true" style='width:30px;height:30px;outline:none;border:none;' class='table-btn text-dark shadow-sm rounded-circle'><i class='fa-sharp fa-solid fa-eye'></i></button>
                     </td>
                     </tr>
                     <?php ++$i; endforeach ;?>
                     <?php endif;?>
</body>
</html>
