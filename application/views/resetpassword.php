  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Changer le mot de passe administrateur
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Accueil</a></li>
              <li class="breadcrumb-item active">Changer le mot de passe administrateur</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <!-- Main content -->
<section class="content">
<div class="container-fluid">
       
<div class="card">
  
              <div class="card-header">
            
                <h3 class="card-title">Changer mot de passe</h3>

              </div>

              <form id="addnewservice" role="form" action="Resetpassword/resetpasswordsave" method="post" class="basicvalidation col-md-6">
                <div class="card-body">
       
                  <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" required="true" id="password" name="password" placeholder="Enter Password">
                  </div>
                   <div class="form-group">
                    <label>Confirmer mot de passe</label>
                    <input type="password" class="form-control" required="true" id="cnfpassword" name="cnfpassword" placeholder="Enter Confirm Password">
                  </div>
              
                   <div id="password_submit" class="btn-block text-right mt-3">
                          <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
</section>