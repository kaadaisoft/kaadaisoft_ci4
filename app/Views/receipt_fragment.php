<?php if (isset($receipt)): ?>
<div class="p-4">
    <div class="container-fluid rounded shadow-sm border p-4 bg-white">
        <div class="d-flex flex-column justify-content-center">
            <div class="d-flex justify-content-center border-bottom pb-3 mb-3 text-center">
                <span class="heading-kaadaisoft fs-1">KAADAISOFT</span>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless align-middle">
                    <thead>
                        <tr>
                            <th class="text-secondary fw-bold">உறுப்பினர் விவரம்</th>
                            <th></th>
                            <th class="text-end text-muted small">சீட்டு எண் : <?= $receipt->Receiptid ?? '-' ?></th>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-muted small">
                                தேதி : <?= date("d/m/Y", strtotime($receipt->paymentdate)) ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 40%;">பெயர்</td>
                            <td style="width: 5%;">:</td>
                            <td class='fw-bold text-primary'><?= $receipt->Membername ?></td>
                        </tr>
                        <tr>
                            <td>குடும்ப உறுப்பினர் எண்</td>
                            <td>:</td>
                            <td class='fw-bold'><?= $receipt->Familymembershipid ?></td>
                        </tr>
                        <tr>
                            <td>முகவரி</td>
                            <td>:</td>
                            <td class="fw-bold"><?= $receipt->Membertaluk ?></td>
                        </tr>
                        <tr>
                            <td>பணம் செலுத்திய முறை</td>
                            <td>:</td>
                            <td class="fw-bold text-success"><?= ucfirst($receipt->paymenttype) ?></td>
                        </tr>
                        <tr>
                            <td>பணம் செலுத்திய தேதி</td>
                            <td>:</td>
                            <td class="fw-bold"><?= $receipt->paymentdate ?></td>
                        </tr>
                        <?php if ($receipt->bankname || $receipt->banknameforcheckque): ?>
                        <tr>
                            <td>வங்கியின் பெயர்</td>
                            <td>:</td>
                            <td class="fw-bold"><?= $receipt->bankname ?: $receipt->banknameforcheckque ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($receipt->transactionid): ?>
                        <tr>
                            <td>பரிவர்த்தனை எண்</td>
                            <td>:</td>
                            <td class="fw-bold"><?= $receipt->transactionid ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($receipt->checkqueno): ?>
                        <tr>
                            <td>காசோலை எண்</td>
                            <td>:</td>
                            <td class="fw-bold"><?= $receipt->checkqueno ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($receipt->upitransactionid): ?>
                        <tr>
                            <td>UPI பரிவர்த்தனை எண்</td>
                            <td>:</td>
                            <td class="fw-bold"><?= $receipt->upitransactionid ?></td>
                        </tr>
                        <?php endif; ?>
                        <tr class="border-top mt-3">
                            <td class="pt-3 fw-bold">நன்கொடையாக பெறப்பட்ட தொகை</td>
                            <td class="pt-3">:</td>
                            <td class="pt-3 fw-bold text-primary fs-5">₹ <?= number_format($receipt->paidamount, 2) ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="py-5 text-end text-muted italic">
                                <div>மேலாளர் கையொப்பம்</div>
                                <div class="small">Manager Signature</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="alert alert-warning m-4">Receipt details not found.</div>
<?php endif; ?>

<style>
    .heading-kaadaisoft {
        color: rgb(120, 50, 186);
        font-weight: 800;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .table td {
        padding: 8px 0;
    }
</style>
