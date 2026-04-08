<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PaymentReceiptList</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
    .ps-logo{
        display:flex;
        align-items:center;
        justify-content:center;
      }
    .ps-gray{
        background-color: rgb(248, 245, 245);
    }
     .active-bg{
      background-color:rgb(230, 230, 230);
    }
     .heading-kaadaisoft{
        color: rgb(0, 123, 255);
        font-weight:800;
        font-family:sans-serif;
    }
    .ps-letter{
        background-color: rgb(0, 123, 255);
    }
    .ps-user{
    background-color: rgb(254, 213, 163);;
    }
    .align{
        align-self:self-end;
    }
    .fa-magnifying-glass{
      color: gray;
    }
    .dashboard-cards{
    display:grid;
    grid-template-columns: repeat(auto-fit,minmax(150px,auto));
    gap:20px;
    }

    .card-round{
      border-radius:20px;
    }

    ul > li{
      cursor:pointer;
    }

    .card1{
    background-color: rgb(88, 194, 255);
    }
    .card2{
      background-color: rgb(233, 153, 3);
    }
    .card3{
      background-color: rgb(124, 9, 232);
     }
     .card4{
      background-color: rgb(35, 154, 43);
     }

     .chartMenu {
        width: 100vw;
        height: 40px;
        background: #1A1A1A;
        color: rgba(54, 162, 235, 1);
      }
      .chartMenu p {
        padding: 10px;
        font-size: 20px;
      }
      .chartCard {
        display:grid;
        grid-template-columns: repeat(auto-fit,minmax(250px,700px)) ;
        grid-template-rows: repeat(auto-fit,minmax(200px,auto)) ;
        align-items: center;
      }

      .chartBox {
        padding: 10px;
        border-radius: 20px;
        background: white;
      }

      #search-bar{
            display:flex;
      }

      .ham-line{
        width:30px;
        height:6px;
        background-color: rgb(70, 70, 70);
        margin-top:5px;
      }
           
      .ps-add-btn{
        border:none;
        outline:none;
        background-color:rgb(23, 23, 184);
        border-radius:25px;
      }

      .active-page{
        background-color:#6495ED;
        font-weight:500;
        color:white;
      }

      .active{
        border:none;
        outline:none;
        font-weight:500;
        font-size:15px;
      }

      .ps-page-count{
        border:none;
        outline:none;
        font-weight:500;
        color:white;
        background-color:#6495ED;
      }

      #coords-form div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 0;
      }

      #coords-form div > button{
        border-radius:50px;
      }

      #add-coords-form{
        width:42%;
        border-radius:25px;
        box-sizing:border-box;
        padding:3%;
        position: relative;
      }

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
      }

      #coords-modal-hide{
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .coords-modal{
        padding:10px 0;
        background-color:rgba(128, 128, 128, 0.4);
        overflow:hidden;
      }

      a{
        color:black;
      }

      a:hover{
        color:black;
      }

      .active-payments{
        background-color:rgb(230, 230, 230);
        font-weight:600;
      }      

     .member-color{
      color:red;
     }
     .table-btn{
        background-color: rgb(239, 236, 236);
        position:relative;
     }
     .viewtooltip, .downloadreceipt{
      visibility:hidden;
      width:max-content;
      background-color: rgb(0, 123, 255);
      color:white;
      border-radius:6px;
      padding:5px 10px;
      position: absolute;
      top:100%;
      z-index: 10;
     }
     .viewtooltip::after, .downloadreceipt::after{
          content:"";
          position: absolute;
          bottom: 100%;
          right:50%;
          border:7px;
          border-style:solid;
          border-color:transparent transparent rgb(0, 123, 255) transparent;
     }
     .table-btn:hover .viewtooltip, .table-btn:hover .downloadreceipt{
        visibility:visible;
     }

    html, body { height: 100%; margin: 0; overflow: hidden; }
    .layout-container { display: flex; flex-direction: column; height: 100vh; width: 100%; }
    .top-navbar-row { height: 70px; flex-shrink: 0; z-index: 1050; background: #0f172a; display: flex; align-items: center; margin: 0 !important; border-bottom: 1px solid #1e293b; }
    .main-body-row { flex: 1; display: flex; overflow: hidden; margin: 0 !important; }
    #menu-bar { width: 260px; height: 100%; overflow-y: auto; flex-shrink: 0; background-color: #0f172a !important; border-right: 1px solid #1e293b; padding: 0; }
    .main-content-area { flex: 1; overflow-y: auto; background-color: #f8fafc; padding-bottom: 50px; }

    @media screen and (max-width: 768px) {
      .top-navbar-row { 
          position: fixed;
          top: 0;
          width: 100%;
          z-index: 1050;
          height: auto; 
          flex-wrap: wrap; 
      }
      .main-body-row { 
          margin-top: 200px !important; /* Adjust for stacked top bar elements */
          flex-direction: column; 
          overflow: auto; 
      }
      #menu-bar { display: none; }
      .main-content-area { width: 100%; overflow: visible; }
      html, body { overflow: auto; height: auto; }
      .layout-container { height: auto; }
    }
    </style>
</head>
<body>
    <div class="layout-container">
        <div class="top-navbar-row">
            <div id="ps-logo" class="col-md-2 py-3 d-flex align-items-center justify-content-start ps-2"></div>
            <div id="search-bar" class="col-md-10 d-flex align-items-center justify-content-between px-4"></div>
        </div>
        <div class="main-body-row">
            <div id="menu-bar"></div>
            <div id="pagecontrol" class="main-content-area">
                <div class="ps-4 mt-2">
                    <?php if(isset($member)): ?>
                        <h4 class="text-secondary"><?= ($member->Role == 'member' ? 'Member Details:' : 'Coordinator Details:') ?></h4>
                        <table class="table-bordered border-secondary col-md-4">
                            <thead>
                                <tr><th class="py-1 ps-2">Name</th><td class="py-1 ps-2 heading-kaadaisoft"><?= $member->Name ?></td></tr>
                                <tr><th class="py-1 ps-2">Userid</th><td class="fw-bold <?= ($member->Role == 'coordinator' ? 'text-primary' : 'member-color') ?> py-1 ps-2"><?= $member->Familymembershipid ?></td></tr>
                                <tr><th class="py-1 ps-2">Taluk</th><td class="py-1 ps-2"><?= $member->Taluk ?></td></tr>
                                <tr><th class="py-1 ps-2">District</th><td class="py-1 ps-2"><?= $member->District ?></td></tr>
                                <tr><th class="py-1 ps-2">Pincode</th><td class="py-1 ps-2"><?= $member->Pincode ?></td></tr>
                                <tr><th class="py-1 ps-2">Phone Number</th><td class="py-1 ps-2 text-success fw-bold"><?= $member->Phonenumber ?></td></tr>
                            </thead>
                            <tbody>
                                <tr><td colspan="2" class="text-end"><a href="gopaymentpage?memberid=<?= $member->Familymembershipid ?>" class="btn btn-primary">Pay Now</a></td></tr>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p class="text-secondary fw-bold">No Member details found.</p>
                    <?php endif; ?>
                </div>

                <?php if(isset($receipts)): ?>
                    <div class="px-4 mt-4">
                        <table class="table table-bordered">
                            <tbody>
                                <?php 
                                $last_event = "";
                                foreach ($receipts as $key => $value): 
                                    $status = $value["status"];
                                    if($value['eventname'] != $last_event):
                                        $last_event = $value['eventname'];
                                ?>
                                    <tr class="table-transparent"><td style="font-size:20px;" class="fw-bold text-center" colspan="10"><?= $value['eventname'] ?></td></tr>
                                    <tr style="font-size:18px;" class="ps-gray fw-bold">
                                        <th>Sno</th><th>EventName</th><th>Total Amount</th><th>Paid Amount</th><th>Pending Amount</th><th>Bank</th><th>Payment Date</th><th>Year</th><th>Dues</th><th>status</th><th class="text-center">Actions</th>
                                    </tr>
                                <?php endif; ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td style="font-size:18px;" class="fw-bold text-primary"><?= $value['eventname'] ?></td>
                                        <td><?= $value['Taxamount'] ?> Rs</td>
                                        <td><?= ($value['Collectedamount'] ? $value['Collectedamount']." Rs" : '-') ?></td>
                                        <td><?= ($value['balanceamount'] ? $value['balanceamount']." Rs" : '-') ?></td>
                                        <td>
                                            <?php 
                                                $bank = $value['bankname'] ?: $value['banknameforcheckque'] ?: '-';
                                                echo $bank;
                                                if ($bank == "Other Bank" && !empty($value['other_bank_name'])) {
                                                    echo " (" . $value['other_bank_name'] . ")";
                                                }
                                            ?>
                                        </td>
                                        <td><?= $value['paymentdate'] ?></td>
                                        <td><?= $value['year'] ?></td>
                                        <td><?= $value['dues'] ?></td>
                                        <td><span class="rounded-pill <?= ($status == NULL || $status == 'Pending' ? 'bg-danger text-white' : 'bg-success text-white') ?> py-2 px-3 btn"><?= ($status == NULL || $status == 'Pending' ? 'Pending' : $value['status']) ?></span></td>
                                        <td>
                                            <div class="d-flex justify-content-evenly">
                                                <button onclick="viewReceipt('paymentreceiptpdf?memberid=<?= $value['Familymembershipid'] ?>&dues=<?= $value['dues'] ?>&eventid=<?= $value['eventid'] ?>', '<?= $value['id'] ?>')" class="table-btn btn text-dark shadow-sm rounded-circle"><i class="fa-sharp fa-solid fa-eye"></i><span class="viewtooltip">View</span></button>
                                                <button onclick="downloadReceipt('downloadpdf?memberid=<?= $value['Familymembershipid'] ?>&dues=<?= $value['dues'] ?>&eventid=<?= $value['eventid'] ?>', '<?= $value['id'] ?>')" class="table-btn btn text-dark shadow-sm rounded-circle"><i class="fa-solid fa-download"></i><span class="viewtooltip">Download</span></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Receipt Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
                <div class="modal-header border-0 bg-light">
                    <h5 class="modal-title heading-kaadaisoft">Payment Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0" id="receiptModalBody">
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="modalDownloadBtn" class="btn btn-success rounded-pill px-4" disabled>Download PDF</button>
                    <button type="button" id="modalPrintBtn" class="btn btn-primary rounded-pill px-4" onclick="printReceiptFromModal()" disabled>Print Receipt</button>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Hidden Area for off-screen High-Quality PDF capture (Perfect Tamil) -->
    <div id="captureArea" class="no-print" style="position: absolute; left: -9999px; width: 800px; padding: 20px; background: white;"></div>


    <script>
        // Highlight active sidebar menu item after AJAX load
        function highlightActiveMenu() {
          const pathSegments = window.location.pathname.split('/').filter(s => s !== '');
          document.querySelectorAll('#menu-bar [data-page], #mobile-menu-content [data-page]').forEach(function(link) {
            link.classList.remove('active-menu-item');
            const linkPage = link.getAttribute('data-page');
            
            let isMatch = pathSegments.some(seg => seg === linkPage);
            if ((linkPage === 'paymentpage' || linkPage === 'payment-receipt-list') && pathSegments.includes('payment-receipt-list')) {
                isMatch = true;
            }
            
            if (isMatch || (pathSegments.length === 0 && linkPage === 'admindashboard')) {
              link.classList.add('active-menu-item');
            }
          });
        }

        // Load side menu, top menu, and logo
        $.ajax({ url: "<?= base_url('dashboard/sidemenu') ?>", success: (r) => { document.getElementById("menu-bar").innerHTML = r; highlightActiveMenu(); } });
        $.ajax({ url: "<?= base_url('dashboard/topmenu') ?>", success: (r) => { document.getElementById("search-bar").innerHTML = r; } });
        $.ajax({ url: "<?= base_url('dashboard/pslogo') ?>", success: (r) => { document.getElementById("ps-logo").innerHTML = r; } });

        function viewReceipt(url, receiptId){
            // This is for the EYE icon - it SHOWS the modal
            $('#receiptModal').modal('show');
            $('#receiptModalBody').html('<div class="text-center py-5"><div class="spinner-border text-primary"></div></div>');
            $('#modalDownloadBtn, #modalPrintBtn').prop('disabled', true);

            let downloadUrl = url.replace('paymentreceiptpdf', 'downloadpdf');
            document.getElementById('modalDownloadBtn').setAttribute('onclick', "downloadReceipt('" + downloadUrl + "', '" + receiptId + "')");
            
            $.ajax({
                type: "get",
                url: url + "&ajax=1",
                success: (result) => { 
                    $('#receiptModalBody').html(result);
                    $('#modalDownloadBtn, #modalPrintBtn').prop('disabled', false);
                },
                error: () => { $('#receiptModalBody').html('<div class="alert alert-danger m-3">Error loading receipt.</div>'); }
            });
        }

        function downloadReceipt(url, receiptId){
            // If the modal is open and current content matches the requested receipt, capture from modal
            const modalContent = document.getElementById('printable-receipt');
            const isModalOpen = $('#receiptModal').is(':visible');
            const isLoaded = $('#modalDownloadBtn').prop('disabled') === false;

            if (isModalOpen && modalContent && isLoaded) {
                // High-quality capture from visible modal
                captureAndSave(modalContent, receiptId);
            } else {
                // SILENT DOWNLOAD - Render off-screen and save
                const captureArea = document.getElementById('captureArea');
                captureArea.innerHTML = '<div style="text-align:center; padding:50px;">Generating PDF...</div>';
                
                $.ajax({
                    type: "get",
                    url: url.replace('downloadpdf', 'paymentreceiptpdf') + "&ajax=1",
                    success: (result) => {
                        captureArea.innerHTML = result;
                        // Wait for fonts/images
                        setTimeout(() => {
                            const element = captureArea.querySelector('#printable-receipt');
                            if(element) {
                                captureAndSave(element, receiptId, true);
                            }
                        }, 800);
                    }
                });
            }
        }

        function captureAndSave(element, receiptId, isSilent = false) {
            const fileName = receiptId ? 'receipt_' + receiptId + '.pdf' : 'receipt.pdf';
            const opt = {
                margin:       0.3,
                filename:     fileName,
                image:        { type: 'jpeg', quality: 1.0 },
                html2canvas:  { scale: 3, useCORS: true, letterRendering: true, scrollY: 0 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(element).save().then(() => {
                if(isSilent) {
                    document.getElementById('captureArea').innerHTML = '';
                }
            });
        }

        function printReceiptFromModal() {
            window.print();
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
