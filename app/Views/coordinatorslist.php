<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinators list</title>
</head>
<body>


<?php if(isset($coordinators) && isset($sno)):?>
    
    <?php $j = $sno+1; foreach ($coordinators as $key => $coordinator):?> 
                
                 <tr>
                    <td style='font-weight:500;'><?=$j?></td>
                    <td class='text-primary fw-bold'><?=$coordinator->Familymembershipid?></td>
                    <td style='font-weight:500;'><?=$coordinator->Name?></td>
                    <td style='font-weight:500;'><?=$coordinator->Phonenumber?></td>
                    <td style='font-weight:500;'><?=$coordinator->District?></td>
                    <td style='font-weight:500;'><?=$coordinator->Taluk?></td>
                    <td style='font-weight:500;'><?=$coordinator->Panchayat?></td>
                    <td style='font-weight:500;'><?=$coordinator->VillageNames?></td>
                    <td class='d-flex justify-content-evenly'>
                    <button onclick="showupdatecoordsmodal('<?=trim($coordinator->Familymembershipid)?>')" style='width:30px;height:30px;outline:none;border:none;' class='updatecoord shadow-sm text-dark table-btn rounded-circle'><i class='fa-regular fa-pen-to-square'></i><span class='updatetooltip'>Update Details</span></button>
                    <button data-bs-toggle='modal' data-bs-target='#deletemodal' onclick="deletecoord('<?=trim($coordinator->Familymembershipid)?>','<?=trim($coordinator->Name)?>')" style='width:30px;height:30px;outline:none;border:none;color:red;' class='trashcoord table-btn shadow-sm rounded-circle'><i class='fa-solid fa-trash-can'></i><span class='trashtooltip'>Trash</span></button>
                    <button onclick ="viewCoordinatordata('view-coordinator-data?coord_id=<?=$coordinator->Familymembershipid?>')" data-bs-toggle='tooltip' title='View Details' style='width:30px;height:30px;outline:none;border:none;' class='table-btn text-dark shadow-sm rounded-circle'><i class='fa-sharp fa-solid fa-eye'></i></button>
                    </td>
                    </tr>
                  <?php ++$j; endforeach;?>
                <?php else:?>
                  <tr>
                      <td colspan='7' class='text-center'>No results</td>
                  <tr>
                <?php endif;?>
</body>
</html>
