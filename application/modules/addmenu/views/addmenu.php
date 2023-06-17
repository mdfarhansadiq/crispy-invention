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
    </style>
</head>

<body>
    <!-- (c) w3schools.com -->
    <h3 style="text-align: center;">Add Menu - form</h3>

    <div>
        <form action="<?php echo site_url('addmenu/Addmenu/create'); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <label for="menuname">Menu Name</label>
            <input type="text" id="menuname" name="menuname" placeholder="Menu Name">

            <div>
                <h4>Do you want to add Sub-Menu?</h4>
                <label>Yes</label>
                <input type="radio" value="Yes" name="opt" id="radioBtnYes" onchange="radioBtnY()">
                <label>No</label>
                <input type="radio" value="No" name="opt" id="radioBtnNo" onchange="radioBtnN()">
            </div>
            <div style="display: none;" id="menuSlugDiv">
                <label for="menuslug">Menu Slug</label>
                <input type="text" id="menuslug" name="menuslug" placeholder="Menu Slug">
            </div>

            <!-- <label for="country">Country</label>
            <select id="country" name="country">
                <option value="australia">Australia</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
            </select> -->

            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        function radioBtnY() {
            var radioBtnValYes = document.getElementById("radioBtnYes").value;
            document.getElementById("menuSlugDiv").style.display = 'block';
            console.log(radioBtnValYes);
        }

        function radioBtnN() {
            var radioBtnValNo = document.getElementById("radioBtnNo").value;
            document.getElementById("menuSlugDiv").style.display = 'none';
            console.log(radioBtnValNo);
        }
    </script>
</body>

</html>