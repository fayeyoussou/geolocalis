<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">invoice's Management
            </h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
               <li class="breadcrumb-item active">invoice's Management</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <table id="invoicelisttbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">S.No</th>
                        <th>invoice Name</th>
                        <th>Registration Number</th>
                        <th>Model</th>
                        <th>Chassis No</th>
                        <th>Group</th>
                        <th>Is Active</th>
                        <?php if(userpermission('lr_vech_list_view') || userpermission('lr_vech_list_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($invoicelist)){  $count=1; foreach($invoicelist as $invoicelists){  ?>
                     <tr>
                        <td><?php echo output($count); $count++; ?></td>
                        <td><?php echo output($invoicelists['i_num_facture']); ?></td>
                        <td><?php echo output($invoicelists['i_nom_navire']); ?></td>
                        <td><?php echo output($invoicelists['i_reference']); ?></td>
                        <td><?php echo output($invoicelists['i_nature']); ?></td>
                        <td><?php echo output($invoicelists['i_date_facturation']); ?></td>
                        <td><span class="badge <?php echo ($invoicelists['i_nature']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($invoicelists['i_nature']=='1') ? 'Active' : 'Inactive'; ?></span>  
                        </td>
                        <?php if(userpermission('lr_vech_list_view') || userpermission('lr_vech_list_edit')) { ?>
                        <td>
                           <?php if(userpermission('lr_vech_list_view')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>invoice/viewinvoice/<?php echo output($invoicelists['i_id']); ?>">
                           <i class="fa fa-eye"></i>
                           </a> | 
                           <?php } if(userpermission('lr_vech_list_edit')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>invoice/editinvoice/<?php echo output($invoicelists['i_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a> 
                           <?php } ?>
                        </td>
                        <?php } ?>
                     </tr>
                     <?php } } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
