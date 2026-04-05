<?php $this->load->view('components/header');?>

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
                            <h4 class="card-title mb-0 flex-grow-1">Product</h4>
                            <div class="text-center mt-4"><a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a></div>
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart(); ?>
                                <h5 class="card-title">Floating labels</h5>
                                <p class="card-title-desc">Create beautifully simple form labels that float over your input fields.</p>                                           
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="" placeholder="" name="pro_id" value="<?=set_value('pro_id',$pro_id);?>" readonly>
                                            <label for="">Product Id</label>
                                        </div>
                                        <?=form_error('pro_id','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="" name="category" onchange="get_subcategory(this.value)">
                                                <option selected disabled>--select--</option>
                                                <?php foreach($categories as $category) { ?>
                                                    <option value="<?=base64_encode($category->cate_id)?>"<?=set_value('category') === $category->cate_id ? 'selected' : ''?>><?=$category->cate_name?></option>
                                                <?php }?>
                                            </select>
                                            <label for="">Category</label>
                                        </div>
                                        <?=form_error('category','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="sub-cat" name="sub_category">
                                                <option selected disabled>--select--</option>
                                            </select>
                                            <label for="">Sub Category</label>
                                        </div>
                                        <?=form_error('sub_category','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="" placeholder="" name="pro_name" value="<?=set_value('pro_name');?>">
                                            <label for="">Product name</label>
                                        </div>
                                        <?=form_error('pro_name','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="" placeholder="" name="brand" value="<?=set_value('brand');?>">
                                            <label for="">Product brand</label>
                                        </div>
                                        <?=form_error('brand','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="" name="featured">
                                                <option selected disabled>--select--</option>
                                                <option value="1" <?= set_value('featured') === '1' ? 'selected': '' ?>>Deal of the month</option>
                                                <option value="2"<?= set_value('featured') ==='2'? 'selected' : '' ?>>New Arrival</option>
                                            </select>
                                            <label for="">Featured</label>
                                        </div>
                                        <?=form_error('featured','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-select" id="" name="highlights"  style="height: 100px;" value="<?=set_value('highlights');?>">
                                            </textarea>
                                            <label for="">Highlights</label>
                                        </div>
                                        <?=form_error('highlights','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-select" id="" name="description"  style="height: 100px;" value="<?=set_value('description');?>">
                                            </textarea>
                                            <label for="">Description</label>
                                        </div>
                                        <?=form_error('description','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="" placeholder="" name="stock" value="<?=set_value('stock');?>">
                                            <label for="">Product Stock</label>
                                        </div>
                                        <?=form_error('stock','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="" placeholder="" name="mrp" value="<?=set_value('mrp');?>">
                                            <label for="">Product MRP</label>
                                        </div>
                                        <?=form_error('mrp','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="" placeholder="" name="selling_price" value="<?=set_value('selling_price');?>">
                                            <label for="">Product Selling Price</label>
                                        </div>
                                        <?=form_error('selling_price','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="" placeholder="Enter " name="meta_title" value="<?=set_value('meta_title');?>">
                                            <label for="">Meta Title</label>
                                        </div>
                                        <?=form_error('meta_title','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="" placeholder="Enter " name="meta_keywords" value="<?=set_value('meta_keywords');?>">
                                            <label for="">Meta Keywords</label>
                                        </div>
                                        <?=form_error('meta_keywords','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="" placeholder="Enter " name="meta_desc" value="<?=set_value('meta_desc');?>" style="height:70px;">
                                            <label for="">Meta Description</label>
                                        </div>
                                        <?=form_error('meta_desc','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="file" class="form-control" id="" placeholder="Enter " name="pro_main_image" value="<?=set_value('pro_main_image');?>">
                                            <label for="">Product Image</label>
                                        </div>
                                        <?=form_error('pro_main_image','<p class="text-danger">','</p>');?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="file" class="form-control" id="" placeholder="Enter " name="gallery_image" value="<?=set_value('gallery_image');?>">
                                            <label for="">Product Gallery Image</label>
                                        </div>
                                        <?=form_error('gallery_image','<p class="text-danger">','</p>');?>
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
<script>
    function get_subcategory(value){
        $.ajax({
            url:'<?=base_url('category/get-subcategory')?>',
            method:'get',
            data:  { cate_id : value },
            success:function(response){
                $('#sub-cat').append(response);
            }
        });
    }
</script>
<?php $this->load->view('components/footer'); ?>
