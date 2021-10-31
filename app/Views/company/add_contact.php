<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add contact</h1>
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
              <h5 class="card-title">Company Contact Input</h5>
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
              <form action="<?php echo base_url();?>/add_conntact_action" method="post">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Enter Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?php if(!empty($contact)){echo $contact[0]['name'];}?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($contact)){echo $contact[0]['id'];}?>" required>
					<?php echo session()->getFlashdata('validation')['company_name']??"";?>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Enter Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?php if(!empty($contact)){echo $contact[0]['email'];}?>" required>
					<?php echo session()->getFlashdata('validation')['company_email']??"";?>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Phone Number</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="mobile" id="mobile" value="<?php if(!empty($contact)){echo $contact[0]['phone'];}?>" required>
					<?php echo session()->getFlashdata('validation')['mobile']??"";?>
                  </div>
                </div> 
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Designation</label>
                  <div class="col-sm-10">
				    <input type="text" class="form-control" name="designation" id="designation" value="<?php if(!empty($contact)){echo $contact[0]['designation'];}?>" required>
					<?php echo session()->getFlashdata('validation')['designation']??"";?>
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
	   
	   <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Company List</h5>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">phone</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
				<?php $i=1;				
					foreach($contact_all as $com){?>
                  <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $com['name'];?></td>
                    <td><?php echo $com['email'];?></td>
                    <td><?php echo $com['phone'];?></td>
                    <td><?php echo $com['designation'];?></td>
                    <td><a href="<?= base_url();?>/add_contact/<?=$com['id'];?>">Edit</a></td>
                    <td><a href="<?= base_url();?>/delete_contact/<?=$com['id'];?>">Delete</a></td>
                  </tr>
				<?php $i++; }?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

          
        </div>

       </div>
    </section>

  </main><!-- End #main -->

