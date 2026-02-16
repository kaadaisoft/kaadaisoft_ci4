<?php
if (isset($filteredusers) && isset($sno)) {
  $i = $sno + 1;
  foreach ($filteredusers as $key => $value) {
    echo
      "<tr>
        <td style='font-weight:500;'>$i</td>
        <td class='fw-bold text-primary'>$value[Familymembershipid]</td>
        <td style='font-weight:500;'>$value[Name]</td>
        <td style='font-weight:500;'>$value[Mobile]</td>
        <td style='font-weight:500;'>$value[MemberTaluk]</td>
        <td>
          <div class='d-flex justify-content-evenly'>
            <a href='filteredUserpaymentform?memberid=$value[Familymembershipid]&eventid=$eventid' class='btn btn-success fw-bold' style='height:fit-content;'>Pay Now</a> &nbsp;&nbsp;
            <a href='payment-receipt-list?memberid=$value[Familymembershipid]' class='btn btn-primary fw-bold' style='height:fit-content;'>View Receipts</a>
          </div>
        </td>
      </tr>";
    $i++;
  }
} else {
  echo "<tr><td class='fw-bold text-center' colspan='6'>No results found</td></tr>";
}
?>
