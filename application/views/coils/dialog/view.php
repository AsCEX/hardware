<style>
    table, th, td {
        border: none;
    }
    table {
        width: 100%;
        display: table;
    }
    table.striped > tbody > tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    table.striped > tbody > tr > td {
        border-radius: 0;
    }
    table.striped > thead {
        border-bottom: 1px solid #d0d0d0;
    }

    table.striped > thead > tr > th,
    table.striped > tbody > tr > td {
        padding: 8px 5px;
        display: table-cell;
        text-align: left;
        vertical-align: middle;
        border-radius: 2px;
    }
</style>

<table width="100%" style="display: table;
    border-collapse: collapse;
    border-spacing: 0;
    font-size: 14px;" class="striped">
  <thead>
    <tr>
        <th colspan="2" style="text-align: center; text-decoration: underline;">Coil Info</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <td width="50%"><b>Coil Code</b></td>
      <td width="50%"><?php echo isset($coils->coil_code)? $coils->coil_code: '';?></td>
  </tr>
  <tr>
      <td><b>Length</b></td>
      <td><?php echo isset($coils->coil_length)? $coils->coil_length: '';?></td>
  </tr>
    <tr>
        <td><b>Height</b></td>
        <td><?php echo isset($coils->coil_height)? $coils->coil_height: '';?></td>
    </tr>
    <tr>
        <td><b>Width</b></td>
        <td><?php echo isset($coils->coil_width)? $coils->coil_width: '';?></td>
    </tr>
    <tr>
        <td><b>Color</b></td>
        <td><?php echo isset($coils->clr_name)? $coils->clr_name: '';?></td>
    </tr>
  </tbody>
  <thead>
    <tr>
        <th colspan="2" style="text-align: center; text-decoration: underline">Creator Info</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td><b>First Name</b></td>
        <td><?php echo isset($coils->ui_firstname)? $coils->ui_firstname: '';?></td>
    </tr>
    <tr>
        <td><b>Middle Name</b></td>
        <td><?php echo isset($coils->ui_middlename)? $coils->ui_middlename: '';?></td>
    </tr>
    <tr>
        <td><b>Last Name</b></td>
        <td><?php echo isset($coils->ui_lastname)? $coils->ui_lastname: '';?></td>
    </tr>
    <tr>
        <td><b>Name Extension</b></td>
        <td><?php echo isset($coils->ui_extname)? $coils->ui_extname:''; ?></td>
    </tr>
  </tbody>
</table>