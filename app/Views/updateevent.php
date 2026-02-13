<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
</head>

<body>
    <?php if (isset($event)): ?>

        <input type='text' hidden class='form-control input-style p-3' id='name' placeholder='Enter the Event'
            value='<?= $event->Id ?>' name='eventId' required>
        <div class='mb-3'>
            <label for='name' class='form-label'>Event Name</label>
            <input type='text' readonly onkeyup="validateUpdateevent(this)" class='form-control input-style p-3' id='name'
                placeholder='Enter the Event' value='<?= $event->EventName ?>' name='eventupdatename' required>
            <small id="eventupdatenameerror" style="color:red;" class="mt-1 eventimage"></small>
        </div>
        <div class='form-group mb-3'>
            <label for='date_from' class='form-label'>Due Date</label>
            <div class='row'>
                <div class='col'>
                    <label for='date_from'>From</label>
                    <input type='date' class='form-control input-style p-3' onchange="validateDate()" id='update_date_from'
                        name='event_update_date_from' value='<?= $event->From_date ?>' placeholder='0000-00-00'>
                </div>
                <div class='col'>
                    <label for='date_to'>To</label>
                    <input type='date' class='form-control input-style p-3' onchange="validateDate()" id='update_date_to'
                        name='event_update_date_to' value='<?= $event->To_date ?>'>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="taxamount" class="form-label">Tax Amount</label>
            <input type="number" name="eventupdatetaxamount" value="<?= $event->TaxAmount ?>"
                class="form-control input-style p-3" id="taxamount" placeholder="Enter Tax amount" required>
            <small id="eventupdateamounterror" style="color:red;" class="mt-1 eventimage"></small>
        </div>

        <div class='d-flex justify-content-center'>
            <input type='submit' name='eventupdatesubmit' style='border-radius:25px;' value='Save'
                class='btn btn-primary px-4'>
        </div>
    <?php endif; ?>

    <?php if (isset($id) && isset($eventname)): ?>

        <span class='fs-5' style='color: #2c3e50;'><?= $eventname ?></span>
        <input type='hidden' value='<?= $id ?>' name='id'>
        <div class='mb-3'>
            <label for='image' class='form-label'>Image</label>
            <input type='file' class='form-control input-style file-input p-3' id='image' name='eventupdatebanner'>

        </div>
        <div class='d-flex justify-content-center'>
            <input type='submit' name='eventupdatebannersubmit' style='border-radius:25px;' value='Save'
                class='btn btn-primary px-4'>
            <div>
            <?php endif; ?>

</body>

</html>
