<?php
if (isset($filteredusers) && isset($sno)) {
  $i = $sno + 1;
  foreach ($filteredusers as $key => $value) {
    $rowBg = ($i % 2 == 0) ? "style='background-color:#f8fafc;'" : "";
    echo
      "<tr $rowBg>
        <td class='fw-medium text-muted'>$i</td>
        <td class='fw-bold' style='color: #2563eb;'>$value[Familymembershipid]</td>
        <td class='fw-medium'>$value[Name]</td>
        <td class='text-muted'>$value[Mobile]</td>
        <td class='text-muted'>$value[District]</td>
        <td class='text-muted'>$value[MemberTaluk]</td>
        <td class='text-muted'>$value[Panchayat]</td>
        <td class='text-muted'>$value[Village]</td>
        <td>
          <div class='d-flex justify-content-center align-items-center gap-2'>
            " . ((isset($paymentstatus) && $paymentstatus != 'Paid') ? "<a href='filtered-user-payment-form?memberid=$value[Familymembershipid]&eventid=$eventid' class='btn-pay-modern'>Pay Now</a>" : "") . "
            <a target='_blank' href='payment-receipt-list?memberid=$value[Familymembershipid]' class='btn-view-modern'>View Receipts</a>
          </div>
        </td>
      </tr>";
    $i++;
  }
} else {
  echo "<tr><td class='fw-bold text-center py-4 text-muted' colspan='9'><i class='fas fa-search me-2'></i>No results found</td></tr>";
}
?>
