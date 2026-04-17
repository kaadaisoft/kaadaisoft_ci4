<?php
if (isset($reports) && !empty($reports) && isset($sno)) {
    $i = $sno;
    foreach ($reports as $key => $value) {
        $j = $i + 1;

        $tax = floatval($value['Taxamount'] ?? 0);
        $pending_amount = floatval($value['balancemount'] ?? 0);
        $status_badge = '<span class="badge bg-secondary text-white">N/A</span>';

        if ($tax > 0 && $pending_amount == $tax) {
            $status_badge = "<span class='badge bg-danger text-white'>UN PAID</span>";
        } elseif ($pending_amount == 0 && $tax > 0) {
            $status_badge = "<span class='badge bg-success text-white'>PAID</span>";
        } elseif ($pending_amount > 0 && $pending_amount < $tax) {
            $status_badge = "<span class='badge bg-primary text-white'>PARTIALLY PAID</span>";
        }

        $pending_display = ($pending_amount > 0) ? $pending_amount : ($tax > 0 ? '0' : '_');

        echo "
        <tr>
            <td>$j</td>
            <td class='fw-bold text-primary'>$value[Familymembershipid]</td>
            <td>$value[Name]</td>
            <td>$value[Role]</td>
            <td>$value[Mobile]</td>
            <td>$value[District]</td>
            <td>$value[Taluk]</td>
            <td>$value[Panchayat]</td>
            <td>$value[Village]</td>
            <td>" . ($value['Taxamount'] ?? '_') . "</td>
            <td>" . ($value['paidamount'] ?? '_') . "</td>
            <td class='fw-bold text-danger'>$pending_display</td>
            <td class='text-center'>$status_badge</td>
            <td>" . ($value['paymentdate'] ?? '_') . "</td>
        </tr>";
        ++$i;
    }
} else {
    echo "<tr>
            <td colspan='14' class='text-center'>No search results</td>
          </tr>";
}
?>
