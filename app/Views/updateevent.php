<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

</head>

<body>
    <?php if (isset($event)): ?>
        <input type='hidden' value='<?= $event->Id ?>' name='eventId'>
        
        <div class="mb-4">
            <label for='name' class="form-label small fw-bold text-muted text-uppercase">Event Name</label>
            <input type='text' readonly class='form-control input-style bg-light' id='name' 
                   value='<?= $event->EventName ?>' name='eventupdatename' required>
            <small id="eventupdatenameerror" class="text-danger mt-1 d-block"></small>
        </div>

        <div class='mb-4'>
            <label class="form-label small fw-bold text-muted text-uppercase d-block">Duration</label>
            <div class='row g-3'>
                <div class='col-6'>
                    <label for='update_date_from' class="small text-muted mb-1">From</label>
                    <input type='date' class='form-control input-style' onchange="validateDate()" id='update_date_from'
                        name='event_update_date_from' value='<?= $event->From_date ?>' required>
                </div>
                <div class='col-6'>
                    <label for='update_date_to' class="small text-muted mb-1">To</label>
                    <input type='date' class='form-control input-style' onchange="validateDate()" id='update_date_to'
                        name='event_update_date_to' value='<?= $event->To_date ?>' required>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label for="taxamount" class="form-label small fw-bold text-muted text-uppercase">Tax Amount (₹)</label>
            <input type="number" name="eventupdatetaxamount" value="<?= $event->TaxAmount ?>"
                class="form-control input-style" id="taxamount" placeholder="0.00" required>
            <small id="eventupdateamounterror" class="text-danger mt-1 d-block"></small>
        </div>

        <button type='submit' name='eventupdatesubmit' value="true" class='btn-save-premium'>Save Changes</button>
    <?php endif; ?>

    <?php if (isset($id) && isset($eventname)): ?>
        <input type='hidden' value='<?= $id ?>' name='id'>
        
        <div class="mb-3 p-3 bg-light rounded-3 border border-dashed text-center">
            <div class="small text-muted text-uppercase fw-bold mb-1">Current Event</div>
            <div class="h6 fw-bold m-0 text-primary"><?= $eventname ?></div>
        </div>

        <div class='mb-4'>
            <label for='image' class="form-label small fw-bold text-muted text-uppercase">New Banner Image</label>
            <input type='file' onchange="uploadFile(this)" accept="image/*" class='form-control input-style' id='image' name='eventupdatebanner' required>
            <div class="mt-2">
                <span class="text-primary small" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i>Choose a high-quality JPG or PNG.</span>
            </div>
            <small id="eventupdatebannererror" class="text-danger mt-1 d-block eventupdatebanner"></small>
        </div>

        <button type='submit' name='eventupdatebannersubmit' value="true" class='btn-save-premium'>Update Banner</button>
    <?php endif; ?>

</body>

</html>
