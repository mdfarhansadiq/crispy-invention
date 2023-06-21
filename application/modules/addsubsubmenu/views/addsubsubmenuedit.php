<div class="row mb-4">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Menu</h4>
            </div>
            <div class="card-body">
                <div class="row" id="">
                    <div class="col-sm-6">
                        <form action="<?php echo site_url('addsubsubmenu/AddSubSubmenu/update/' . $subsubmenu->id); ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label">Select Menu Name<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select name="submenuselect" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <!-- <option value="" selected>Select Menu</option> -->
                                        <?php
                                        foreach ($submenus as $submenu) {
                                            if ($submenu->id == $subsubmenu->submenuselect) {
                                                echo "<option value='{$submenu->id}' selected>{$submenu->submenuname}</option>";
                                            }
                                            if ($submenu->checksubsubmenu == 2 && ($submenu->id != $subsubmenu->submenuselect)) {
                                                echo "<option value='{$submenu->id}'>{$submenu->submenuname}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label">Sub Sub Menu Name<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" name="subsubmenuname" id="title" value="<?= $subsubmenu->subsubmenuname ?>" placeholder="Sub Menu Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row" style="" id="menuSlugDiv">
                                <label for="title" class="col-sm-4 col-form-label">Sub Sub Menu Slug<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" id="menuslug" name="subsubmenuslug" placeholder="Sub Sub Menu Slug" value="<?= $subsubmenu->subsubmenuslug ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" value="Submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <input type="hidden" value="" id="finid">
        </div>


    </div>
</div>
</div>
<script>
    function radioBtnY() {
        var radioBtnValYes = document.getElementById("radioBtnYes").value;
        document.getElementById("menuSlugDiv").style.display = 'none';
        document.getElementById("radioBtnYes").value = '2';
        console.log(radioBtnValYes);
    }

    function radioBtnN() {
        var radioBtnValNo = document.getElementById("radioBtnNo").value;
        document.getElementById("menuSlugDiv").style.display = 'block';
        console.log(radioBtnValNo);
    }
</script>