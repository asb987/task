<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Company</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>/calculator">Add</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Company data Input</h5>
			  <?php if(session()->getFlashdata('error')){?>
			  <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('error');?>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
			  <?php }?>
			  <?php if(session()->getFlashdata('success')){?>
			  <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('success');?>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
			  <?php }?>
			  <?php //print_r(session()->getFlashdata('validation')); echo session()->getFlashdata('company_name');?>
			  
              <!-- Horizontal Form -->
              <form action="<?php echo base_url();?>/add_company_action" method="post">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Enter Company Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="company_name" name="company_name" value="<?php if(!empty($company)){echo $company[0]['companyname'];}?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($company)){echo $company[0]['id'];}?>">
                    <input type="hidden" class="form-control" id="old_email" name="old_email" value="<?php if(!empty($company)){echo $company[0]['email'];}?>">
					<?php echo session()->getFlashdata('validation')['company_name']??"";?>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Enter Company Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="company_email" name="company_email" value="<?php if(!empty($company)){echo $company[0]['email'];}?>" <?php if(!empty($company)){echo 'readonly';}?> required>
					<?php echo session()->getFlashdata('validation')['company_email']??"";?>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Phone Number</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="mobile" id="mobile" value="<?php if(!empty($company)){echo $company[0]['phone'];}?>" required>
					<?php echo session()->getFlashdata('validation')['mobile']??"";?>
                  </div>
                </div> 
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
					<textarea name="address" class="form-control" required><?php if(!empty($company)){echo $company[0]['address'];}?></textarea>
					<?php echo session()->getFlashdata('validation')['address']??"";?>
                    <!--input type="text" class="form-control" id="result" readonly-->
                  </div>
                </div> 
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">City</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="city" name="city" value="<?php if(!empty($company)){echo $company[0]['city'];}?>" required>
					<?php echo session()->getFlashdata('validation')['city']??"";?>
                  </div>
                </div>                
                <div class="text-center">
				  <input type="submit" name="submit" value="Add" class="btn btn-primary">
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

          
        </div>

       </div>
    </section>

  </main><!-- End #main -->

