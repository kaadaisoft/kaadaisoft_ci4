<?php if(isset($coordinators) && isset($sno)):?>
     <?php $j = $sno+1; foreach ($coordinators as $key => $coordinator):?> 
                 <tr style="cursor: pointer;" onclick="viewCoordinatordata('view-coordinator-data?coord_id=<?=$coordinator->Familymembershipid?>')">
                    <td class='ps-4'><?=$j?></td>
                    <td class='text-primary fw-bold'><?=$coordinator->Familymembershipid?></td>
                    <td class='fw-bold text-dark'><?=$coordinator->Name?></td>
                    <td><?=$coordinator->Phonenumber?></td>
                    <td><?=$coordinator->District?></td>
                    <td><?=$coordinator->Taluk?></td>
                    <td><?=$coordinator->Panchayat?></td>
                    <td><?=$coordinator->Village?></td>
                    <td class='<?=$coordinator->VillageNames ? '' : 'text-center'?>'>
                        <?=$coordinator->VillageNames ? '<span class="badge bg-light text-dark border px-2 py-1 text-wrap text-start" style="line-height:1.5;">' . $coordinator->VillageNames . '</span>' : '-'?>
                    </td>
                    <td onclick="event.stopPropagation();">
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <button onclick="showupdatecoordsmodal('<?=trim($coordinator->Familymembershipid)?>')" class='btn btn-sm btn-outline-primary rounded-circle updatecoord' style='width:32px;height:32px;padding:0;'><i class='fa-regular fa-pen-to-square'></i><span class='updatetooltip'>Update</span></button>
                            <button onclick="viewCoordinatordata('view-coordinator-data?coord_id=<?=$coordinator->Familymembershipid?>')" class='btn btn-sm btn-outline-secondary rounded-circle' style='width:32px;height:32px;padding:0;' title='View Details'><i class='fa-sharp fa-solid fa-eye'></i></button>
                        </div>
                    </td>
                 </tr>
                  <?php ++$j;?>
                  <?php endforeach;?>
                <?php else:?>
                  <tr>
                      <td colspan='10' class='text-center'>No results</td>
                  </tr>
                <?php endif;?>
