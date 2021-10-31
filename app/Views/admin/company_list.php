<main id="main" class="main">

    <div class="pagetitle">
      <h1>Company's</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>/company_list">List</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Company List</h5>
			  <div class="col-lg-12">
			  <form action="<?php echo base_url();?>/company_list" method="post">
				<div class="col-lg-6">
				  <input type="text" name="name" class="form-control" placeholder="Enter Key to search">
				</div>
				<div class="col-lg-3 mt-2">
				  <input type="submit" name="submit" class="form-control" value="Search">
				</div>
			  </form>
			  </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Active/Inactive</th>
                    <th scope="col">Edit</th>
					<?php if(session()->get('email')=="superadmin@gmail.com"){?>
                    <th scope="col">Delete</th>
					<?php }?>
                  </tr>
                </thead>
                <tbody>
				<?php //$i=1;
					$page = $_GET['page'] ?? 0;
                    $i = $page ? (10 * ($page - 1) + 1) : (10 * ($page) + 1);				
					foreach($company_list as $com){?>
                  <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $com['companyname'];?></td>
                    <td><?php echo $com['email'];?></td>
                    <td><?php echo $com['phone'];?></td>
                    <td><?php echo $com['address'];?></td>
                    <td><?php echo $com['city'];?></td>
                    <td><?php if($com['is_active']==1){ echo "Active"; }else{ echo "Inactive";}?></td>
                    <td><a href="<?= base_url();?>/add_company/<?=$com['id'];?>">Edit</a></td>
					<?php if(session()->get('email')=="superadmin@gmail.com"){?>
                    <td><a href="<?= base_url();?>/delete_company/<?=$com['id'];?>">Delete</a></td>
					<?php }?>
                  </tr>
				<?php $i++; }?>
                </tbody>
              </table>
			    <div class="d-flex justify-content-end">
					<?php if ($pager) : ?>
						<?php $pagi_path = 'task/company_list'; ?>
						<?php $pager->setPath($pagi_path); ?>
						<?= $pager->links() ?>
					<?php endif ?>
				</div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

          
        </div>

       </div>
    </section>

  </main><!-- End #main -->

