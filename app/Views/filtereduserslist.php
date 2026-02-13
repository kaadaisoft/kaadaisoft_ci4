<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter List</title>
</head>
<body>
<?php    
if(isset($filteredusers) && isset($sno)){
                     $i = $sno + 1;
                     foreach ($filteredusers as $key => $value) {
                     echo 
                     "<tr>
                     <td>$i</td><td class='fw-bold text-primary'>$value[Familymembershipid]</td><td style='font-weight:500;'>$value[Name]</td>
                     <td style='font-weight:500;'>$value[Mobile]</td>
                     <td style='font-weight:500;'>$value[MemberTaluk]</td>
                     <td class='d-flex justify-content-evenly'><a href='filteredUserpaymentform?memberid=$value[Familymembershipid]&eventid=$eventid' class='btn btn-success fw-bold' style='height:fit-content;'>Pay Now</a> &nbsp;&nbsp;
                     <a href='paymentReceiptlist?memberid=$value[Familymembershipid]' class='btn btn-primary fw-bold' style='height:fit-content;'>View Receipts</a></td>
                     </tr>";
                     $i++;
                     }
    }
    else{
        echo "<tr>
                     <td class='fw-bold text-center' colspan='7'>No results found</td>
                     </tr>";
    }


            ?>
</body>
</html>
