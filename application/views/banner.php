<?php $this->load->view('components/header'); ?>

<!-- main content start -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <?php if($this->session->flashdata('msg')) {?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('msg'); ?>
                    </div>
            <?php } ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex pb-0">
                            <h4 class="card-title mb-0 flex-grow-1">Banner</h4>
                            <div class="text-center mt-4"><a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a></div>
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart(); ?>
                                <h5 class="card-title">Floating labels</h5>
                                <p class="card-title-desc">Create beautifully simple form labels that float over your input fields.</p>                                           
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="file" class="form-control" id="" placeholder="Enter " name="bann_image" value="<?=set_value('bann_image');?>">
                                            <label for="">Banner image</label>
                                        </div>
                                        <?=form_error('bann_image','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="" name="status">
                                                <option selected disabled>--select--</option>
                                                <option value="1" <?= set_value('status') === '1' ? 'selected': '' ?>>Active</option>
                                                <option value="0"<?= set_value('status') ==='0'? 'selected' : '' ?>>Inactive</option>
                                            </select>
                                            <label for="">Status</label>
                                        </div>
                                        <?=form_error('status','<p class="text-danger">','</p>');?>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    <button type="reset" class="btn btn-secondary w-md">Reset</button>
                                </div>
                            
                            <?= form_close(); ?>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- END ROW -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Tocly.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
<!-- end main content-->
<!-- <script>
    documet.querySelector('#').on('click',function(){

    });
</script> -->
<?php $this->load->view('components/footer'); ?>
