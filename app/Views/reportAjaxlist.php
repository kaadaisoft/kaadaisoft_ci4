<?php
if (isset($reports) && !empty($reports) && isset($sno)) {
    $i = $sno;
    foreach ($reports as $key => $value) {
        $j = $i + 1;
        echo "
        <tr>
            <td>$j</td>
            <td class='fw-bold text-primary'>$value[Familymembershipid]</td>
            <td>$value[Name]</td>
            <td>$value[Role]</td>
            <td>$value[Mobile]</td>
            <td>" . ($value['Taxamount'] ?? '_') . "</td>
            <td>" . ($value['paidamount'] ?? '_') . "</td>
            <td>" . ($value['balancemount'] ?? '_') . "</td>
            <td>" . ($value['paymentdate'] ?? '_') . "</td>
        </tr>";
        ++$i;
    }
} else {
    echo "<tr>
            <td colspan='9' class='text-center'>No search results</td>
          </tr>";
}
?>
