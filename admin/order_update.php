<?php

include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_POST['update'])) {
  $form_id = $_GET['form_id'];
  $status = $_POST['status'];
  $remark = $_POST['remark'];
  $query = mysqli_query($db, "insert into remark(frm_id,status,remark) values('$form_id','$status','$remark')");
  $sql = mysqli_query($db, "update users_orders set status='$status' where o_id='$form_id'");

  echo "<script>alert('form details updated successfully');</script>";
}

?>
<script language="javascript" type="text/javascript">
  function f2() {
    window.close();
  }
  ser

  function f3() {
    window.print();
  }
</script>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <title>Foodbox - Order update</title>
  <!-- Bootstrap Core CSS -->
  <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/helper.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <style type="text/css" rel="stylesheet">
    .indent-small {
      margin-left: 5px;
    }

    .form-group.internal {
      margin-bottom: 0;
    }

    .dialog-panel {
      margin: 10px;
    }

    .datepicker-dropdown {
      z-index: 200 !important;
    }


    label.control-label {
      font-weight: 600;
      color: #777;
    }

    table {
      width: 500px;
      border-collapse: collapse;
      margin: auto;
      margin-top: 50px;
    }

    tr:nth-of-type(odd) {
      background: #eee;
    }

    th {
      background: #004684;
      color: white;
      font-weight: bold;
    }

    td,
    th {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: left;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div>
    <form name="updateticket" id="updatecomplaint" method="post">
      <table border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><b>Form Number</b></td>
          <td><?php echo htmlentities($_GET['form_id']); ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><b>Status</b></td>
          <td><select name="status" required="required">
              <option value="">Select Status</option>
              <option value="in process">In Process</option>
              <option value="closed">Closed</option>
              <option value="rejected">rejected</option>
            </select></td>
        </tr>
        <tr>
          <td><b>Remark</b></td>
          <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
        </tr>
        <tr>
          <td><b>Action</b></td>
          <td><input type="submit" name="update" class="btn btn-primary" value="Submit">
            <input name="Submit2" type="submit" class="btn btn-danger" value="Close this window " onClick="return f2();" style="cursor: pointer;" />
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>