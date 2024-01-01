    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
     <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
    <title>SIMPLE CI-4 CRUD APP</title>
</head>
<body>
    <div class="container-fluid bg-purple shadow-sm">
        <div class="container pb-2 pt-2">
            <div class="text-white  h3">SIMPLE CI-4 CRUD APP</div>
        </div>
    </div>
    <div class="bg-white shadow-sm">
        <div class="container">
             <div class="row">
                <nav class="nav nav-underline">
                    <div class="nav-link">Books / Edit</div>

                </nav>
             </div>
       </div>        
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('books');?>" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
               <div class="col-md-12">
                             <div class="card">
                <div class="card-header bg-purple text-white">
                    <div class="card-header-title">Edit Book</div>
                </div>
                <div class="card-body">
                    <form name="createForm" id="createForm"action="<?php echo base_url('books/edit/'.$book['id'])?>" method="post">

                    <div class="form-group">
                     <label for="">Name</label>
                     <input type="text" placeholder="Name" name="name" id="name" class="form-control <?php echo(isset($validation) && $validation->hasError('name'))?'is-invalid':'';?>" value="<?php echo set_value('name',$book['title']);?>">
                     <?php
                        if (isset($validation) && $validation->hasError('name')){
                               echo '<p class="invalid-feedback">'.$validation->getError('name').'</p>';
                          }
                     ?>
                    </div>
                     <div class="form-group">
                     <label for="">Author</label>
                     <input type="text" placeholder="Author" name="author" id="author" class="form-control <?php echo(isset($validation) && $validation->hasError('author'))?'is-invalid':'';?>" value="<?php echo set_value('author',$book['author']);?>">
                        <?php
                        if (isset($validation) && $validation->hasError('author')){
                               echo '<p class="invalid-feedback">'.$validation->getError('author').'</p>';
                          }
                     ?>
                    </div>
                    <div class="form-group">
                     <label for="">ISBN No</label>
                     <input type="text" placeholder="ISBN No" name="isbn_no" id="isbn_no" class="form-control" value="<?php echo set_value('isbn_no',$book['isbn_no']);?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
               </div>
        </div>

    </div>
</body>
</html>