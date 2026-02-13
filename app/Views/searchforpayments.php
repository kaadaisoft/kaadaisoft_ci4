<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searchforpayment</title>
</head>
<body>
<?php 
               if(isset($members) && isset($sno)){
                $i = $sno + 1;
                foreach ($members as $key => $value) {
                echo 
                "<tr>
                <td style='font-weight:500;'>$i</td><td class='fw-bold text-primary'>$value[Familymembershipid]</td><td style='font-weight:500;'>$value[Name]</td><td style='font-weight:500;'>$value[Role]</td><td style='font-weight:500;'>$value[Aadharnumber]</td><td style='font-weight:500;'>$value[Phonenumber]</td>
                <td style='font-weight:500;'>$value[Taluk]</td>
                <td>
                <div class='d-flex justify-content-evenly'><a href='gopaymentpage?memberid=$value[Familymembershipid]' class='btn btn-success fw-bold' style='height:fit-content;'>Pay Now</a> &nbsp;&nbsp;
                <a href='paymentReceiptlist?memberid=$value[Familymembershipid]' class='btn btn-primary fw-bold' style='height:fit-content;'>View Receipts</a><div></td>
                </tr>";
                $i++;
                }
            }
                else{
                     
                    echo "<tr>
                      <td colspan='5' class='text-center'>No search results</td>
                      <tr>";
                
                }
?>         
</body>
</html>
