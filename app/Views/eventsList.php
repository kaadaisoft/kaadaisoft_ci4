<?php if (isset($events) && is_array($events) && count($events) > 0): ?>
    <?php 
    $i = isset($sno) ? $sno : 0;
    foreach ($events as $value): 
        $displaySno = $i + 1;
        
        // Ensure image path is absolute/correct
        $imagePath = $value['Image'];
        if (!preg_match('/^http/', $imagePath)) {
            $imagePath = base_url($imagePath);
        }

        // Format dates
        $fromDate = date('d-m-Y', strtotime($value['From_date']));
        $toDate = date('d-m-Y', strtotime($value['To_date']));
    ?>
    <tr>
        <td class="fw-bold text-muted"><?= $displaySno ?></td>
        <td class="fw-bold text-dark"><?= $value['EventName'] ?></td>
        <td>
            <div class="event-banner-wrapper" onclick="showImageFullSize('<?= $imagePath ?>')">
                <img class="event-banner-img" src="<?= $imagePath ?>" alt="<?= $value['EventName'] ?>"/>
                <button class="banner-change-overlay" <?= (session()->get('role') == 2 || session()->get('role') == 3) ? 'hidden' : '' ?> 
                        onclick="event.stopPropagation(); showupdateeventbannermodal(<?= $value['Id'] ?>, '<?= $value['EventName'] ?>')">
                    CHANGE
                </button>
            </div>
        </td>
        <td>
            <div class="small fw-bold">From: <span class="text-secondary fw-normal"><?= $fromDate ?></span></div>
            <div class="small fw-bold">To: <span class="text-secondary fw-normal"><?= $toDate ?></span></div>
        </td>
        <td><span class="badge bg-light text-primary border px-2 py-1">₹ <?= $value['TaxAmount'] ?></span></td>
        <td class='text-center' <?= (session()->get('role') == 2 || session()->get('role') == 3) ? 'hidden' : '' ?>>
            <button onclick="showupdateeventmodal(<?= $value['Id'] ?>)" class='action-btn btn-edit-modern shadow-sm' title="Update">
                <i class='fa-regular fa-pen-to-square'></i>
            </button>
            <button data-bs-toggle='modal' data-bs-target='#deletemodal' onclick="deleteevent(<?= $value['Id'] ?>, '<?= $value['EventName'] ?>')" 
                    class='action-btn btn-delete-modern shadow-sm' title="Delete">
                <i class='fa-solid fa-trash-can'></i>
            </button>
        </td>
    </tr>
    <?php $i++; endforeach; ?>
<?php elseif (isset($events) && is_string($events)): ?>
    <tr>
        <td colspan="6" class="text-center py-5">
            <div class="text-muted">
                <i class="fa-solid fa-magnifying-glass fs-2 mb-3 d-block opacity-25"></i>
                <?= $events ?>
            </div>
        </td>
    </tr>
<?php else: ?>
    <tr>
        <td colspan="6" class="text-center py-5">
            <div class="text-muted">
                <i class="fa-solid fa-magnifying-glass fs-2 mb-3 d-block opacity-25"></i>
                No events found matching your search.
            </div>
        </td>
    </tr>
<?php endif; ?>
