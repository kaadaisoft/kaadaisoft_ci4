<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members list</title>
</head>
<body>
    <?php if(isset($members) && isset($sno)): $i=$sno + 1;?>
                
                <?php foreach ($members as $key => $value): ?>
                    
                  <tr >
                    <td style='font-weight:500;'><?=$i?></td>
                    <td class='text-primary fw-bold'><?=$value->Familymembershipid?></td>
                    <td style='font-weight:500;'><?=$value->Name?></td>
                    <td style='font-weight:500;'><?=$value->Phonenumber?></td>
                    <td style='font-weight:500;'><?=$value->District?></td>
                    <td style='font-weight:500;'><?=$value->Taluk?></td>
                    <td style='font-weight:500;'><?=$value->Panchayat?></td>
                    <td class='d-flex justify-content-evenly'>

                    <button <?php if(session()->get('role') == 2 || $value->MemberRole != 'Head'){echo "hidden";}?> onclick="showupdatemembermodal('<?=trim($value->Familymembershipid)?>')" style='width:30px;height:30px;outline:none;border:none;' class='updatecoord shadow-sm text-dark table-btn rounded-circle'><i class='fa-regular fa-pen-to-square'></i><span class='updatetooltip'>Update</span></button>
                    <button <?php if(session()->get('role') == 2){echo "hidden";}?> data-bs-toggle='modal' data-bs-target='#deletemodal' onclick="showRejectMemberModal('<?=trim($value->Id)?>','<?=trim($value->Name)?>','<?=trim($value->Taluk)?>')" style='width:30px;height:30px;outline:none;border:none;color:red;' class='trashcoord table-btn shadow-sm rounded-circle'><i class='fa-solid fa-user-xmark'></i><span class='trashtooltip'>Reject</span></button>
                    <button onclick ="viewMemberdata('viewMemberdata?member_id=<?=$value->Familymembershipid?>')" data-bs-toggle='tooltip' title='viewCoordinatordata' style='width:30px;height:30px;outline:none;border:none;' class='table-btn text-dark shadow-sm rounded-circle'><i class='fa-sharp fa-solid fa-eye'></i></button>
                    </td>
                    </tr>
                <?php ++$i; endforeach; ?>
                <?php else:?>
                <tr>
                <td colspan='7' class='text-center'>No search results</td>
                <tr>
            <?php endif; ?>
</body>
</html>
