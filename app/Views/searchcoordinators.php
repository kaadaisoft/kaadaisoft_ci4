<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinators list</title>
</head>
<body>

<?php 
if(isset($coordinators)){
    $i = isset($sno) ? $sno : 0;
    foreach ($coordinators as $key => $coordinator) {
        $j = $i+1;
        
        $villageBadge = !empty($coordinator['VillageNames']) ? '<span class="badge bg-light text-dark border px-2 py-1 text-wrap text-start" style="line-height:1.5;">' . $coordinator['VillageNames'] . '</span>' : '-';
        $textCenter = empty($coordinator['VillageNames']) ? "text-center" : "";
        
        echo "
        <tr>
            <td class='ps-4'>{$j}</td>
            <td class='text-primary fw-bold'>".trim($coordinator['Familymembershipid'])."</td>
            <td class='fw-bold text-dark'>{$coordinator['Name']}</td>
            <td>{$coordinator['Phonenumber']}</td>
            <td>{$coordinator['District']}</td>
            <td>{$coordinator['Taluk']}</td>
            <td>{$coordinator['Panchayat']}</td>
            <td class='{$textCenter}'>{$villageBadge}</td>
            <td>
                <div class='d-flex justify-content-center align-items-center gap-2'>
                    <button onclick=\"showupdatecoordsmodal('".trim($coordinator['Familymembershipid'])."')\" class='btn btn-sm btn-outline-primary rounded-circle updatecoord' style='width:32px;height:32px;padding:0;'><i class='fa-regular fa-pen-to-square'></i><span class='updatetooltip'>Update</span></button>
                    <button onclick=\"viewCoordinatordata('view-coordinator-data?coord_id=".trim($coordinator['Familymembershipid'])."')\" class='btn btn-sm btn-outline-secondary rounded-circle' style='width:32px;height:32px;padding:0;' title='View Details'><i class='fa-sharp fa-solid fa-eye'></i></button>
                </div>
            </td>
        </tr>";
        ++$i;
    }
}else{
     echo "<tr><td colspan='9' class='text-center'>No results found</td></tr>";
}
?>


</body>
</html>
