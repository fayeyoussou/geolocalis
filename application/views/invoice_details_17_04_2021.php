    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Détails du voyage
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Détails du voyage</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="card">
      <?php
      $totalpaidamt = 0;
      if(count($paymentdetails)>=1) {
      foreach ($paymentdetails as $payment) {
          $totalpaidamt += $payment['tp_amount'];
      } }
      ?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Montant total </span>
                      <span class="info-box-number text-center text-muted mb-0"><?= $invoicedetails['t_invoice_amount']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Montant payé </span>
                      <span class="info-box-number text-center text-muted mb-0"><?= $totalpaidamt; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"><?= ($invoicedetails['t_invoice_amount'] > $totalpaidamt)?'En attente':'Excess' ?></span>
                      <span class="info-box-number text-center text-muted mb-0"><?= preg_replace('/[^\d\.]+/','',$invoicedetails['t_invoice_amount'] - $totalpaidamt)  ?> <span>
                    </span></span></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Aperçu:</h4>
                    <div class="post">
                      <div class="row">
                      <div class="col-lg-5">
                      <div class="user-block">
                        <span class="username">
                          <?= $invoicedetails['t_invoice_fromlocation']; ?>
                        </span>
                        <span class="description"><?= $invoicedetails['t_date_facturation']; ?></span>
                      </div>
                    </div> à
                     <div class="col-lg-5">
                      <div class="user-block">
                        <span class="username">
                          <?= $invoicedetails['t_invoice_tolocation']; ?>
                        </span>
                        <span class="description"><?= $invoicedetails['t_line_date']; ?></span>
                      </div>
                       </div>
                        <div class="col-lg-4"></div>
                        <?php 
                        if($invoicedetails['t_totaldistance']!='') {
                          if($invoicedetails['t_type']=='single') { $dist = $invoicedetails['t_totaldistance']; } else { $dist = $invoicedetails['t_totaldistance']*2; }  ?>
                          <?= $invoicedetails['t_type']; ?> with total <?= $dist; ?> km 
                        <?php } ?>
                     </div>
                    </div>

               

                     <h5>Activité de payement:</h5>
                    <div class="post clearfix">
                      <?php if(!empty($paymentdetails)) { ?>
                   <table class="table table-bordered table-sm">
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Montant</th>
                      <th>Commentaire</th>
                      <th>Payé par</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php $count=1;
                           foreach($paymentdetails as $paymentdetails){ ?>
                      <tr>
                      <td><?php echo output($count); $count++; ?></td>
                      <td><?php echo output($paymentdetails['tp_amount']); ?></td>
                      <td><?php echo output($paymentdetails['tp_notes']); ?></td>
                      <td><?php echo output($paymentdetails['tp_created_date']); ?></td>
                      <td>
                        <a class="icon" href="<?php echo base_url(); ?>invoice/invoicepayment_delete/<?php echo output($paymentdetails['tp_id']); ?>/<?= $invoicedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                 <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">No payment details found !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
                </div>
                </div>

              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <div class="mt-2 mb-3">
                <a href="#" class="btn btn-sm btn-success <?= ($invoicedetails['t_invoice_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Ajouter un Paiement</a>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-invoiceexpense">Frais de voyage</a>
                <a href="<?= base_url(); ?>invoice/invoice/<?= $invoicedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Generez la facture</a>
              </div> 
              <br>
              <div class="text-muted">
                <p class="text-sm">Informations du client
                  <b class="d-block"><?= $customerdetails['c_name']; ?></b>
                  <b class="d-block"><?= $customerdetails['c_mobile']; ?></b>
                  <b class="d-block"><?= $customerdetails['c_email']; ?></b>
                  <b class="d-block"><?= $customerdetails['c_address']; ?></b>
                </p>
                <p class="text-sm">Informations du conducteur
                  <?php if(isset($driverdetails['d_name'])) { ?>
                  <b class="d-block"><?= $driverdetails['d_name']; ?></b>
                  <b class="d-block"><?= $driverdetails['d_mobile']; ?></b>
                  <b class="d-block"><?= $driverdetails['d_licenseno']; ?></b>
                  <?php  } else { echo '<b class="d-block"><span class="badge badge-danger">Yet to Assign</span></b>'; } ?>
                </p>
                 <p class="text-sm">URL de suivi
                  <b class="d-block"><a target="_new" href="<?= base_url().'invoicetracking/'.$invoicedetails['t_trackingcode']; ?>"><?= base_url().'invoicetracking/'.$invoicedetails['t_trackingcode']; ?></a></b>
                </p>
                <p><div class="col-6"><a href="<?= base_url() ?>invoice/sendtracking?email=<?= urlencode($customerdetails['c_email']); ?>&trackingcode=<?= $invoicedetails['t_trackingcode'] ?>&t_id=<?= $invoicedetails['t_id'] ?>" class="btn btn-sm btn-success">Partagez avec le client</a></div></p>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      </div>
    </section>
<div class="modal fade show" id="modal-AddPayment" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Effectuer un Paiement</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="invoicepayments" action="<?= base_url() ?>invoice/invoicepayment" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">Montant total</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="totalamount" value="<?= $invoicedetails['t_invoice_amount']; ?>" id="totalamount" placeholder="Enter totalamount" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="paidamount" class="col-sm-4 col-form-label">Montant restant</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="pendingamount" value="<?= $invoicedetails['t_invoice_amount']-$totalpaidamt; ?>" id="pendingamount" placeholder="Paid Amount" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tp_amount" class="col-sm-4 col-form-label">Payé</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="tp_amount" id="tp_amount" placeholder="Pay">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="tp_notes" class="col-sm-4 col-form-label">Notes</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="tp_notes" name="tp_notes" rows="2" placeholder="Enter Notes"></textarea>
                    </div>
                  </div>
                </div>
                 <input type="hidden" class="form-control" value="<?= $invoicedetails['t_id']; ?>" name="tp_invoice_id" id="tp_invoice_id" placeholder="tp_invoice_id">
                 <input type="hidden" class="form-control" value="<?= $invoicedetails['t_vechicle']; ?>" name="tp_v_id" id="tp_v_id" placeholder="tp_v_id">
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer le paiement</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<div class="modal fade show" id="modal-invoiceexpense" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter des frais de voyage</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addinvoiceexpense" action="<?= base_url() ?>invoice/addinvoiceexpense" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="ie_amount" class="col-sm-4 col-form-label">Montant</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" pattern="^[0-9]*$" required="true" name="ie_amount" id="ie_amount" placeholder="Enter amount">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="ie_description" class="col-sm-4 col-form-label">Notes</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" required="true" id="ie_description" name="ie_description" rows="2" placeholder="Enter Notes"></textarea>
                    </div>
                  </div>
                </div>
                 <input type="hidden" class="form-control" value="<?= $invoicedetails['t_start_date']; ?>" name="ie_date" id="ie_date">
                 <input type="hidden" class="form-control" value="<?= $invoicedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">
                 <input type="hidden" class="form-control" value="expense" name="ie_type" id="ie_type">
                 <input type="hidden" class="form-control" value="<?= $invoicedetails['t_id']; ?>" name="addinvoiceexpense_invoice_id" id="addinvoiceexpense_invoice_id">
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer les dépenses</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>