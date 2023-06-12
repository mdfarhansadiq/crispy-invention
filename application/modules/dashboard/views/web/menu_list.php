<!DOCTYPE html>
<html>

<head>
    <style>
        /* Modal */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black with opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            /* 80% width */
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: left;
            font-size: 30px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
        }

        input[type="text"]{
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card-header">
                    <h4><?php echo html_escape((!empty($title) ? $title : null)) ?></h4>
                </div>
                <div class="card-header">
                    <!-- <button class="btn btn-primary"><a href="menu-add" target="_blank" style="color: white">Add
                        Menu</a></button> -->
                    <button onclick="openModal()" class="btn btn-primary">Add Menu</button>
                </div>



                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close" onclick="closeModal()" style="float: right;">&times;</span>
                        <h2>Menu Add - Form</h2>
                        <form>
                            <?php echo form_open('Menumethod/submit_form'); ?>
                            <label for="name">Menu Name:</label>
                            <input type="text" id="name" name="menu_name" placeholder="Menu name">

                            <label for="menuslug">Menu Slug:</label>
                            <input type="text" id="email" name="menu_slug" placeholder="Menu slug">

                            <input type="submit" value="Submit">
                            <?php echo form_close(); ?>
                        </form>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="RoleTbl">
                        <thead>
                            <tr>

                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('menu_name') ?></th>
                                <th><?php echo display('menu_url') ?></th>
                                <th><?php echo display('parent_menu') ?></th>
                                <th><?php echo display('status') ?></th>
                                <th><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($allmenu)) { ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($allmenu as $value) { ?>
                                    <tr>
                                        <td><?php echo $sl++; ?></td>
                                        <td id="menu_name-<?php echo html_escape($value->menuid); ?>">
                                            <?php echo html_escape($value->menu_name); ?></td>
                                        <td id="menu_slug-<?php echo html_escape($value->menuid); ?>">
                                            <?php echo html_escape($value->menu_slug); ?></td>
                                        <td></td>
                                        <td><?php if ($value->isactive == 1) {
                                                echo display("active");
                                            } else {
                                                echo display("inactive");
                                            } ?>
                                        </td>
                                        <td>
                                            <a onclick="editmenu('<?php echo html_escape($value->isactive); ?>','<?php echo html_escape($value->parentid); ?>','<?php echo html_escape($value->menuid); ?>')" data-toggle="tooltip" data-placement="left" title="Update" class="btn btn-success btn-sm"><i class="ti-pencil text-white" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php if (!empty($value->sub)) {
                                        foreach ($value->sub as $submenu) { ?>
                                            <tr>
                                                <td><?php echo $sl++; ?></td>
                                                <td id="menu_name-<?php echo html_escape($submenu->menuid); ?>">
                                                    <?php echo html_escape($submenu->menu_name); ?></td>
                                                <td id="menu_slug-<?php echo html_escape($submenu->menuid); ?>">
                                                    <?php echo html_escape($submenu->menu_slug); ?></td>
                                                <td><?php echo html_escape($value->menu_name); ?></td>
                                                <td><?php if ($submenu->isactive == 1) {
                                                        echo display("active");
                                                    } else {
                                                        echo display("inactive");
                                                    } ?>
                                                </td>
                                                <td>
                                                    <a onclick="editmenu('<?php echo html_escape($submenu->isactive); ?>',<?php echo html_escape($submenu->parentid); ?>,<?php echo html_escape($submenu->menuid); ?>)" data-toggle="tooltip" data-placement="left" title="Update" class="btn btn-success btn-sm"><i class="ti-pencil text-white" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                            <?php  }
                            }  ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo MOD_URL . $module; ?>/assets/js/menuList.js"></script>
</body>

</html>