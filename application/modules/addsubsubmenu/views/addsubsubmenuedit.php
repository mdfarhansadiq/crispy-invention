<!DOCTYPE html>
<html>

<head>
    <style>
        input[type=text] {
            width: 70%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 70%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .editBtn {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .table-wrap {
            max-width: 800px;
            margin: 80px auto;
            overflow-x: auto;
        }

        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
            white-space: nowrap;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 15px;
        }

        table tbody tr:nth-child(odd) {
            background: #e2e2e2;
        }

        .box-wrap {
            padding: 0px 16px;
        }
    </style>
</head>

<body>
    <!-- (c) w3schools.com -->
    <div>
        <div>
            <h3 style="text-align: center;">Edit Sub-Sub Menu - form</h3>
        </div>
        <form action="<?php echo site_url('addsubsubmenu/AddSubSubmenu/update/'.$subsubmenu->id); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <lable>Select Sub Menu Name</lable>
            <select name="submenuselect">
                <!-- <option value="" selected>Select Menu</option> -->
                <?php
                foreach ($submenus as $submenu) {
                    if ($submenu->id == $subsubmenu->submenuselect) {
                        echo "<option value='{$submenu->id}' selected>{$submenu->submenuname}</option>";
                    }
                    if($submenu->checksubsubmenu == 2 && ($submenu->id != $subsubmenu->submenuselect))
                    {
                        echo "<option value='{$submenu->id}'>{$submenu->submenuname}</option>";
                    }
                }
                ?>
            </select>
            <br>

            <label for="menuname">Sub Sub Menu Name</label>
            <input type="text" id="menuname" name="subsubmenuname" placeholder="Sub Sub Menu Name" value="<?= $subsubmenu->subsubmenuname ?>">


            <div style="display: block;" id="menuSlugDiv">
                <label for="menuslug">Sub Sub Menu Slug</label>
                <input type="text" id="menuslug" name="subsubmenuslug" placeholder="Sub Sub Menu Slug" value="<?= $subsubmenu->subsubmenuslug ?>">
            </div>

            

            <input type="submit" value="Submit">
        </form>
    </div>

    <!-- <script>
        var MenuSlugVal = document.getElementById("menuslug").value;

        function radioBtnY() {
            var radioBtnValYes = document.getElementById("radioBtnYes").value;
            document.getElementById("menuSlugDiv").style.display = 'none';
            MenuSlugVal = document.getElementById("menuslug").value;
            document.getElementById("menuslug").value = '';
            console.log(document.getElementById("menuslug").value);
        }

        function radioBtnN() {
            var radioBtnValNo = document.getElementById("radioBtnNo").value;
            document.getElementById("menuSlugDiv").style.display = 'block';
            document.getElementById("menuslug").value = MenuSlugVal;
            console.log(document.getElementById("menuslug").value);
        }
    </script> -->
</body>

</html>