<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Information du client
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">Information du client</li>
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
               <table id="custtbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">N°</th>
                         <th>Nom</th>
<!--                        <th>Type de client</th>
-->                        <th>Portable</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Statut</th>
                        <?php if(userpermission('lr_cust_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($customerlist)){ 
                     $count=1;
                        foreach($customerlist as $customerlists){
                        ?>
                     <tr>
                        <td> <?php echo output($customerlists['c_num_customer']); //output($count); $count++; ?></td>
                        <td> <?php echo output($customerlists['c_name']); ?></td>
<!--                        <td> <?php //echo output($customerlists['c_name']); ?></td>
-->                        <td> <?php echo output($customerlists['c_mobile']); ?></td>
                        <td><?php echo output($customerlists['c_email']); ?></td>
                        <td><?php echo output($customerlists['c_address']); ?></td>
                         <td>  <span class="badge <?php echo ($customerlists['c_isactive']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($customerlists['c_isactive']=='1') ? 'Active' : 'Inactive'; ?></span>  </td>
                        <?php if(userpermission('lr_cust_edit')) { ?>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>customer/editcustomer/<?php echo output($customerlists['c_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
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
