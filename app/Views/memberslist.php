<?php if(isset($members) && isset($sno)): $i=$sno + 1;?>
                
                <?php foreach ($members as $key => $value): ?>
                    
                  <tr style="cursor: pointer;" onclick="viewMemberdata('view-member-data?member_id=<?=$value->Familymembershipid?>')">
                    <td class='ps-4'><?=$i?></td>
                    <td class='text-primary fw-bold'><?=$value->Familymembershipid?></td>
                    <td class='fw-bold text-dark'><?=$value->Name?></td>
                    <td><?=$value->Phonenumber?></td>
                    <td><?=$value->District?></td>
                    <td><?=$value->Taluk?></td>
                    <td><?=$value->Panchayat?></td>
                    <td><?=$value->Village?></td>
                    <td onclick="event.stopPropagation();">
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <button <?php if($value->MemberRole != 'Head'){echo "hidden";}?> onclick="showupdatemembermodal('<?=trim($value->Familymembershipid)?>')" class='btn btn-sm btn-outline-primary rounded-circle updatecoord' style='width:32px;height:32px;padding:0;'><i class='fa-regular fa-pen-to-square'></i><span class='updatetooltip'>Update Details</span></button>
                            <button data-bs-toggle='modal' data-bs-target='#deletemodal' onclick="showRejectMemberModal('<?=trim($value->Id)?>','<?=trim($value->Name)?>','<?=trim($value->Taluk)?>')" class='btn btn-sm btn-outline-danger shadow-sm rounded-circle trashcoord' style='width:32px;height:32px;padding:0;'><i class='fa-solid fa-user-xmark'></i><span class='trashtooltip'>Reject</span></button>
                            <button onclick ="viewMemberdata('view-member-data?member_id=<?=$value->Familymembershipid?>')" class='btn btn-sm btn-outline-secondary shadow-sm rounded-circle' style='width:32px;height:32px;padding:0;' data-bs-toggle='tooltip' title='View Details'><i class='fa-sharp fa-solid fa-eye'></i></button>
                        </div>
                    </td>
                  </tr>
                <?php ++$i; endforeach; ?>
                <?php else:?>
                <tr>
                <td colspan='8' class='text-center'>No search results</td>
                <tr>
            <?php endif; ?>
