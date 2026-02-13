<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>

    <?php 
           
           if (isset($reports) && isset($sno)) {
               $i = $sno ;
               foreach ($reports as $key => $value) {
                $j = $i+1;
                echo "
                <tr>
                    <td>$j</td>
                    <td class='fw-bold text-primary'>$value[Familymembershipid]</td>
                    <td>$value[Name]</td>
                    <td>$value[Role]</td>
                    <td>$value[Phonenumber]</td>
                    <td>$value[Aadharnumber]</td>
                    <td>$value[Taluk]</td>
                   
                    
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
    
    <!-- <td>
                        <a href='#' class='btn btn-sm btn-primary text-white ' role='button'>View</a>
                    
                        </td> -->
</body>
</html>
