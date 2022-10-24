<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>
<body>
    <div class="container">
        <br/><br/><br/>
        <h3 align="center">Insert Data using Codeigniter</h3>
        <form action="<?php echo base_url()?>main/form_validation" method="post">
        <?php 
        if($this->uri->segment(2) == "inserted"){
             echo '<p class="text-success">Data Inserted</p>';
        }else if($this->uri->segment(2) == "deleted"){
            echo '<p class="text-success">Data Deleted</p>';
        }else if($this->uri->segment(2) == "updated"){
            echo '<p class="text-success">Data Updated</p>';   
        }
        ?>
        

        <?php 
        if(isset($user_data)){
            foreach($user_data->result() as $row){
                ?>
            <div class="form-group">
            <label for="">Enter first name</label>
            <input type="text" class="form-control" value="<?php echo $row->first_name; ?>" name="first_name">
            <span class="text-danger"><?php echo form_error("first_name") ?></span>
            </div>
            <div class="form-group">
            <label for="">Enter last name</label>
            <input type="text" class="form-control" value="<?php echo $row->last_name; ?>" name="last_name">
            <span class="text-danger"><?php echo form_error("last_name") ?></span>

            </div>
            <div class="form-control" align="center">
            <input type="hidden" name="hidden_id" value="<?php echo $row->id;?>">
            <input type="submit" value="Update" name="update" class="btn btn-info">
            </div>
        <?php
            }
        }else{
            ?>
            <div class="form-group">
            <label for="">Enter first name</label>
            <input type="text" class="form-control" name="first_name">
            <span class="text-danger"><?php echo form_error("first_name") ?></span>
        </div>
        <div class="form-group">
            <label for="">Enter last name</label>
            <input type="text" class="form-control" name="last_name">
            <span class="text-danger"><?php echo form_error("last_name") ?></span>

        </div>
        <div class="form-control" align="center">
            <input type="submit" value="Insert" name="insert" class="btn btn-info">
        </div>
    </form>
    <br/><br/><br/>
    <?php
        }
        ?>

        

    <h3>Fetch Data from table using Codeigniter</h3>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            <?php
            if($fetch_data->num_rows() > 0){
                foreach($fetch_data->result() as $row){
                    ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->first_name ?></td>
                        <td><?php echo $row->last_name ?></td>
                        <td><a href="#" class="delete_data" id="<?php echo $row->id; ?>">Delete</a></td>
                        <td><a href="<?php echo base_url() ?>main/update_data/<?php echo $row->id;?>">Edit</a></td>
                    </tr>
                    <?php
                }
            }else{
                ?>
                <tr>
                    <td class="text-center display-4" colspan="3"/>No data found</td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    </div>

</body>
<script>
    $(document).ready(function(){
        $('.delete_data').click(function(){
            var id = $(this).attr("id");
            if(confirm("Are you sure you want to delete this?")){
                window.location = "<?php echo base_url() ?>main/delete_data/" + id;
            }else{
                return false;
            }
        })
    });
</script>
</html>