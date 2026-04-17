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
               $i = $sno;
               foreach ($reports as $key => $value) {
                $j = $i+1;
                echo "
                <tr>
                    <td class='fw-bold text-muted'>$j</td>
                    <td class='fw-bold text-primary'>$value[Familymembershipid]</td>
                    <td class='fw-bold text-dark'>$value[Name]</td>
                    <td><span class='badge bg-light text-dark border px-2 py-1 rounded'>$value[Role]</span></td>
                    <td>$value[Phonenumber]</td>
                    <td>$value[Aadharnumber]</td>
                    <td>$value[District]</td>
                    <td>$value[Taluk]</td>
                    <td>$value[Panchayat]</td>
                    <td>$value[Village]</td>
                </tr>";
                ++$i;
               }
           }
           else{
            echo "<tr><td colspan='10' class='text-center py-5 bg-light text-muted fw-medium'><i class='fas fa-search fa-2x d-block mb-3 opacity-25'></i>No results found</td></tr>";
           }
           ?>
    
    <!-- <td>
                        <a href='#' class='btn btn-sm btn-primary text-white ' role='button'>View</a>
                    
                        </td> -->
</body>
</html>
