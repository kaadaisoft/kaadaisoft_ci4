<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undermembers list</title>
</head>
<body>


<?php if(isset($members) && count($members) > 0 && isset($sno)): $i=$sno + 1;?>
              
                <?php foreach ($members as $key => $value): ?>
                  <tr >
                    <td style='font-weight:500;'><?=$i?></td>
                    <td class='text-primary fw-bold'><?=$value->Familymembershipid?></td>
                    <td style='font-weight:500;'><?=$value->Name?></td>
                    <td style='font-weight:500;'><?=$value->Phonenumber?></td>
                    <td style='font-weight:500;'><?=$value->District?></td>
                    <td style='font-weight:500;'><?=!empty($value->Area_one) ? "$value->Area_one" : ""?><?=!empty($value->Area_two) ? ", $value->Area_two" : ""?><?=!empty($value->Area_three) ? ",  $value->Area_three" : ""?><?=!empty($value->Area_four) ?  ", $value->Area_four" : ""?></td>
                    <td class='d-flex justify-content-evenly'>
                    <button onclick ="viewMemberdata('<?=$value->Familymembershipid?>')" data-bs-toggle='tooltip' title='viewCoordinatordata' style='width:30px;height:30px;outline:none;border:none;' class='table-btn text-dark shadow-sm rounded-circle'><i class='fa-sharp fa-solid fa-eye'></i></button>
                    </td>
                    </tr>
                <?php ++$i; endforeach; ?>
            <?php endif; ?>
</body>
</html>
