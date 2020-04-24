

<div style="padding: 20px;">
    <div class="form-group">
        <label for="exampleInputEmail1">Username(<b style="color: red">*</b>)</label>
        <input value="<?php echo isset($initial_data->username) ? $initial_data->username : '' ?>" type="text" name="username" class="form-control"  >
        <small id="emailHelp" class="form-text text-muted">We'll never save. </small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Firstname(<b style="color: red">*</b>)</label>
        <input value="<?php echo isset($initial_data->firstname) ? $initial_data->firstname : '' ?>" type="text" name="firstname" class="form-control"  >
        <small id="firstname" class="form-text text-muted">We'll never save. </small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Lastname(<b style="color: red">*</b>)</label>
        <input value="<?php echo isset($initial_data->lastname) ? $initial_data->lastname : '' ?>" type="text" name="lastname" class="form-control"  >
        <small id="lastname" class="form-text text-muted">We'll never save. </small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address<b style="color: red">*</b></label>
        <input value="<?php echo isset($initial_data->email) ? $initial_data->email : '' ?>" type="email" name="email" class="form-control"  >
        <small id="emailHelp" class="form-text text-muted">We'll never save.</small>
    </div>



    <br />


    @section('save_action_form_section')

    @show

</div>