<?php
if (isset($members) && isset($sno)) {
  $i = $sno + 1;
  foreach ($members as $key => $value) {
    $roleText = ($value['MemberRole'] == 'Head') ? 'Head' : (($value['Role'] == 1) ? 'Manager' : (($value['Role'] == 2) ? 'Coordinator' : 'Member'));
    $rowBg = ($i % 2 == 0) ? "style='background-color:#f8fafc;'" : "";
    echo
      "<tr $rowBg>
        <td class='fw-medium text-muted'>$i</td>
        <td class='fw-bold' style='color: #2563eb;'>$value[Familymembershipid]</td>
        <td class='fw-medium'>$value[Name]</td>
        <td><span class='badge bg-light text-dark border'>$roleText</span></td>
        <td class='text-muted'>$value[Aadharnumber]</td>
        <td class='text-muted'>$value[Phonenumber]</td>
        <td class='text-muted'>$value[Taluk]</td>
        <td>
            <div class='d-flex justify-content-center align-items-center gap-2'>
                <a href='gopaymentpage?memberid=$value[Familymembershipid]' class='btn-pay-modern'>Pay Now</a>
                <a href='payment-receipt-list?memberid=$value[Familymembershipid]' class='btn-view-modern'>View Receipts</a>
            </div>
        </td>
    </tr>";
    $i++;
  }
}
?>
