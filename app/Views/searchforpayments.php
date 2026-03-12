<?php
if (isset($members) && isset($sno)) {
    $i = $sno;
    foreach ($members as $key => $value) {
        $roleText = ($value['MemberRole'] == 'Head') ? 'Head' : (($value['Role'] == 1) ? 'Manager' : (($value['Role'] == 2) ? 'Coordinator' : 'Member'));
        echo
        "<tr>
            <td class='fw-bold text-muted'>$i</td>
            <td class='fw-bold text-primary'>$value[Familymembershipid]</td>
            <td class='fw-bold text-dark'>$value[Name]</td>
            <td><span class='badge bg-light text-dark border px-2 py-1 rounded'>$roleText</span></td>
            <td>$value[Aadharnumber]</td>
            <td>$value[Phonenumber]</td>
            <td>$value[Taluk]</td>
            <td>
                <div class='d-flex justify-content-center align-items-center gap-2'>
                    <a href='gopaymentpage?memberid=$value[Familymembershipid]' class='btn-action-premium btn-pay-premium'><i class='fa-solid fa-indian-rupee-sign'></i>Pay Now</a>
                    <a href='payment-receipt-list?memberid=$value[Familymembershipid]' class='btn-action-premium'><i class='fa-solid fa-receipt'></i>Receipts</a>
                </div>
            </td>
        </tr>";
        $i++;
    }
} else {
    echo "<tr><td colspan='8' class='text-center py-5 bg-light text-muted fw-medium'><i class='fas fa-search fa-2x d-block mb-3 opacity-25'></i>No search results found.</td></tr>";
}
?>
