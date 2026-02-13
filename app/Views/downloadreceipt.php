<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url("../js/dss.js");?>"></script>

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
        color: rgb(120, 50, 186);
        font-weight:800;
        font-family:sans-serif;
    }
     .ps-letter{
        background-color: rgb(120, 50, 186);
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
        /* width: 100%; */
        /* height: calc(100% - 40px); */
        /* background: rgba(54, 162, 235, 0.2); */
       /*  display: flex;
        align-items: center;
        justify-content: center; */
        display:grid;
        grid-template-columns: repeat(auto-fit,minmax(250px,700px)) ;
        grid-template-rows: repeat(auto-fit,minmax(200px,auto)) ;
        align-items: center;
      }

      .chartBox {
        /* height:fit-content; */
        padding: 10px;
        border-radius: 20px;
        /* border: solid 3px rgba(54, 162, 235, 1); */
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

    @media screen and (max-width:768px) {
      #search-bar{
            background-color:rgb(248, 245, 245);
            flex:none;
            background-color:white !important;
            padding: 5px 0;
           }
           #menu-bar{
            display:none;
           }
           #dashboardsearch{
            width:100% !important;
            margin: 0 !important;
            /* padding:5px; */
           }
           .dashboardpadd:nth-child(2){
            padding:0% !important;
           }
           .dashboardpadd:nth-child(1){
            padding:2% 0 !important;
           }
           #hidename{
            display:none;
           } 
           .ps-logo{
            justify-content:space-between;
          }
      }

    @media screen and (min-width:768px) {
          .ham-menu{
            display:none;
          }
      }

    @media screen and (max-width:768px) {
        
          #add-coords-form div > input{
            padding: 5px;
          }
          #add-coords-form{
            width:90%;
            padding:8%;
          }
    }

    </style>
</head>
<body>
        
    <div class="container-fluid">
            
         <div id="receiptpdf" style="overflow:auto;" class="col-md-10 d-flex justify-content-center"><!-----------main-dashboard------------------------->

          <div class="col-md-7">
          <div class="container-fluid rounded shadow-sm border">
                   <div class="d-flex flex-column justify-content-center">
                   <div class="d-flex justify-content-center border-bottom">
                      <span class="heading-kaadaisoft fs-1 position-relative" style="top:1px;">KAADAISOFT</span>
      
                      </div>    
                        
                      <div>
                     <?php if(isset($receipt)): ?>
                      <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th colspan="3">
                             Date : <?php echo date("Y/m/d");?>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><td>Name</td><td>:</td><td class='fw-bold'><?=$receipt->Membername?></td></tr>
                            <tr><td>Familymembershipid:</td><td>:</td><td class='fw-bold'><?=$receipt->Familymembershipid?></td></tr> 
                            <tr><td>Phonenumber</td><td>:</td><td class="fw-bold"><?=$receipt->PayerMobile?></td></tr>
                            <tr><td>Address</td><td>:</td><td class="fw-bold"><?=$receipt->Membertaluk?></td></tr>
                            <tr><td>Payment Method</td><td>:</td><td class="fw-bold"><?=$receipt->paymenttype?></td></tr>
                            <tr><td>Payment Date</td><td>:</td><td class="fw-bold"><?=$receipt->paymentdate?></td></tr>
                            <tr><td>Bank Name</td><td>:</td><td class="fw-bold">
                            <?php
                            if($receipt->bankname =="" && $receipt->banknameforcheckque == "" ){
                                echo "-";
                            }
                            else{
                                echo "$receipt->bankname" ? "$receipt->bankname" : "$receipt->banknameforcheckque";
                              
                            }
                            ?>
                            </td>
                            </tr>
                            <tr><td>Bank Transaction Id</td><td>:</td><td class="fw-bold">
                            <?php
                            if($receipt->transactionid == "" ){
                                echo "-";
                            }
                            else{
                              echo "$receipt->transactionid";
                              
                            }
                            ?></td></tr>
                            <tr><td>Cheque No:</td><td>:</td><td class="fw-bold">
                            <?php
                            if($receipt->checkqueno == "" ){
                                echo "-";
                            }
                            else{
                              echo "$receipt->checkqueno";
                              
                            }
                            ?></td></tr>
                            <tr><td>UPI Transaction Id:</td><td>:</td><td class="fw-bold">
                            <?php
                            if($receipt->upitransactionid == ""){
                                echo "-";
                            }
                            else{
                              echo "$receipt->upitransactionid";
                              
                            }
                            ?></td></tr>
                            <tr><td>Paid Amount</td><td>:</td><td class="fw-bold"><?=$receipt->paidamount?></td></tr>
                            <tr><td colspan="3" class="py-5" style="text-align:right;">Manager Signature</td></tr>
                            <!-- <tr><td colspan="3"></td></tr> -->
                        </tbody>
                      </table>       
                     
                      </div>

                   </div>
             </div>        
          </div>                 <?php endif; ?>
         </div><!-----------main-dashboard-end------------------------>
    </div>  
  <script>


  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>
