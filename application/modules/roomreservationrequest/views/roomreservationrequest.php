<div class="row mb-4">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Room Reservation Request</h4>
            </div>
            <div class="card-body">
                <div class="row" id="">

                </div>
            </div>
            <input type="hidden" value="" id="finid">

            <table class="table">
                <h5>Customer Booking Info Pending</h5>
                <thead>
                    <tr>
                        <th scope="col">Serial No.</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Email</th>
                        <!-- <th scope="col">Menu Slug</th> -->
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1; ?>
                    <?php foreach ($customerbookinginfos as $customerbooking) : ?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td><?php echo $customerbooking->f_name; ?></td>
                            <td><?php echo $customerbooking->email; ?></td>

                            <td>
                                <button class="btn btn-success">
                                    <a href="<?php echo site_url('roomreservationrequest/accept/' . $customerbooking->id); ?>" style="color: #ffffff"><i class="fa fa-check" aria-hidden="true"></i></a></button>
                                <button class="btn btn-danger">
                                    <a href="<?php echo site_url('roomreservationrequest/decline/' . $customerbooking->id); ?>" style="color: #ffffff" onclick="return confirm('Are you sure you want to decline this booking?');"><i class="fa fa-times" aria-hidden="true"></i></a></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>