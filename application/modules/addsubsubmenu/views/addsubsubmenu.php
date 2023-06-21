<div class="row mb-4">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Sub-Sub Menu</h4>
            </div>
            <div class="card-body">
                <div class="row" id="">
                    <div class="col-sm-6">
                        <form action="<?php echo site_url('addsubsubmenu/AddSubSubmenu/create'); ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label">Select Sub Menu Name<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="submenuselect">
                                        <option selected>Select Sub Menu</option>
                                        <?php
                                        foreach ($submenus as $submenu) {
                                            if ($submenu->checksubsubmenu == 2) {
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
                                    <input type="text" name="subsubmenuname" id="title" value="" placeholder="Sub Sub Menu Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row" style="display: none;" id="menuSlugDiv">
                                <label for="title" class="col-sm-4 col-form-label">Sub Sub Menu Slug<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" id="menuslug" name="subsubmenuslug" placeholder="Sub Sub Menu Slug" value="" class="form-control">
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

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Sub-Sub Menu Name</th>
                    <th scope="col">Sub-Sub Menu Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sl = 1; ?>
                <?php foreach ($subsubmenus as $subsubmenu) : ?>
                    <tr>
                        <td><?php echo $sl++; ?></td>
                        <td><?php echo $subsubmenu->subsubmenuname; ?></td>
                        <td><?php echo $subsubmenu->subsubmenuslug; ?></td>
                        <td>
                            <button class="btn btn-primary">
                                <a href="<?php echo site_url('addsubsubmenu/edit/' . $subsubmenu->id); ?>" style="color: #ffffff">Edit</a></button> |
                            <button class="btn btn-danger"> <a href="<?php echo site_url('addsubsubmenu/delete/' . $subsubmenu->id); ?>" style="color: #ffffff;" onclick="return confirm('Are you sure you want to delete this menu?');">Delete</a></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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