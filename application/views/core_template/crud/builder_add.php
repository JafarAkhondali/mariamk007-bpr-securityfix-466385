<?php if ($address_map = $this->crud_builder->getFieldByType('address_map')) : ?>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCOi5vktJx2fjOA4X9orhT_-v2SIvsv060 "></script>
    <script src="{php_open_tag_echo} BASE_ASSET; {php_close_tag}jquery-map/dist/jquery.addressPickerByGiro.js"></script>
    <link href="{php_open_tag_echo} BASE_ASSET; {php_close_tag}jquery-map/dist/jquery.addressPickerByGiro.css" rel="stylesheet" media="screen">
<?php endif; ?>
<?php if ($chained = $this->crud_builder->getFieldChain()) :  ?>
    <script src="{php_open_tag_echo} BASE_ASSET; {php_close_tag}js/loadingoverlay.min.js"></script>
<?php endif ?>

<?php
$fine_upload_multiple = $this->crud_builder->getFieldFileMultiple();
$fine_upload = $this->crud_builder->getFieldFile();
if (count($fine_upload) > 0 or count($fine_upload_multiple) > 0) : ?>
    <link href="{php_open_tag_echo} BASE_ASSET; {php_close_tag}/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
    <script src="{php_open_tag_echo} BASE_ASSET; {php_close_tag}/fine-upload/jquery.fine-uploader.js"></script>
    {php_open_tag} $this->load->view('core_template/fine_upload'); {php_close_tag}
<?php endif; ?>
<script type="text/javascript">
    function domo() {

        $('*').bind('keydown', 'Ctrl+s', function() {
            $('#btn_save').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+x', function() {
            $('#btn_cancel').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+d', function() {
            $('.btn_save_back').trigger('click');
            return false;
        });

    }

    jQuery(document).ready(domo);
</script>
<style>
    <?= $this->input->post('style') ?>
</style>
<section class="content-header">
    <h1>
        <?= ucwords($subject); ?>
        <small>{php_open_tag_echo} cclang('new', ['<?= ucwords(clean_snake_case($subject)); ?>']); {php_close_tag} </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{php_open_tag_echo} admin_site_url('/{table_name}'); {php_close_tag}"><?= ucwords(clean_snake_case($subject)); ?></a></li>
        <li class="active">{php_open_tag_echo} cclang('new'); {php_close_tag}</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="{php_open_tag_echo} BASE_ASSET; {php_close_tag}/img/add2.png" alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username"><?= ucwords($subject); ?></h3>
                            <h5 class="widget-user-desc">{php_open_tag_echo} cclang('new', ['<?= ucwords(clean_snake_case($subject)); ?>']); {php_close_tag}</h5>
                            <hr>
                        </div>
                        {php_open_tag_echo} form_open('', [
                            'name' => 'form_{table_name}',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_{table_name}',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); {php_close_tag}
                        {php_open_tag}
                        $user_groups = $this->model_group->get_user_group_ids();
                        {php_close_tag}

                        <?php
                        $stepper = [];
                        foreach ($this->crud_builder->getFieldShowInAddForm(true) as $input => $option) : ?><?php
                                                                                                            if (in_array($option['input_type'], $this->crud_builder->getFieldNotShowInAddForm())) continue; ?><?php if (isset($option['configs']['stepper'])) : $step_title = $option['configs']['stepper']['title'];
                                                                                                                                                    if (count($stepper)) { ?>
                </section><?php }
                                                                                                                                                    $stepper[$option['input_type']] = $step_title;
                            ?><h3><?= $step_title ?></h3>
                <section><?php endif ?><?php $has_strict = isset($option['configs']['strict']);
                                            if ($has_strict) :  ?>{php_open_tag}
                    if(count(array_diff($user_groups, ['<?= implode("','", $option['configs']['strict']['groups']) ?>'])) != count($user_groups)): ?>
                    <?php endif ?><?php if ($option['input_type'] == 'input') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="<?= $input; ?>" id="<?= $input; ?>" placeholder="<?= ucwords(clean_snake_case($option['placeholder'] ? $option['placeholder'] : $option['label'])); ?>" value="{php_open_tag_echo} set_value('<?= $input; ?>'); {php_close_tag}">
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'number') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="<?= $input; ?>" id="<?= $input; ?>" placeholder="<?= ucwords(clean_snake_case($option['placeholder'] ? $option['placeholder'] : $option['label'])); ?>" value="{php_open_tag_echo} set_value('<?= $input; ?>'); {php_close_tag}">
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'yes_no') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-6">
                                <div class="col-md-2 padding-left-0">
                                    <label>
                                        <input type="radio" class="flat-red" name="<?= $input; ?>" id="<?= $input; ?>" value="yes">
                                        {php_open_tag_echo} cclang('yes'); {php_close_tag}
                                    </label>
                                </div>
                                <div class="col-md-14">
                                    <label>
                                        <input type="radio" class="flat-red" name="<?= $input; ?>" id="<?= $input; ?>" value="no">
                                        {php_open_tag_echo} cclang('no'); {php_close_tag}
                                    </label>
                                </div>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'email') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="<?= $input; ?>" id="<?= $input; ?>" placeholder="<?= ucwords(clean_snake_case($option['placeholder'] ? $option['placeholder'] : $option['label'])); ?>" value="{php_open_tag_echo} set_value('<?= $input; ?>'); {php_close_tag}">
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'datetime') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datetimepicker" name="<?= $input; ?>" id="<?= $input; ?>">
                                </div>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'password') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-6">
                                <div class="input-group col-md-8 input-password">
                                    <input type="password" class="form-control password" name="<?= $input; ?>" id="<?= $input; ?>" placeholder="<?= ucwords(clean_snake_case($option['placeholder'] ? $option['placeholder'] : $option['label'])); ?>" value="<?= set_value('<?= $input; ?>'); ?>">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-flat show-password"><i class="fa fa-eye eye"></i></button>
                                    </span>
                                </div>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'editor_wysiwyg') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <textarea id="<?= $input; ?>" name="<?= $input; ?>" rows="5" cols="80">{php_open_tag_echo} set_value('<?= ucwords(clean_snake_case($input)); ?>'); {php_close_tag}</textarea>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'textarea') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <textarea id="<?= $input; ?>" name="<?= $input; ?>" rows="5" class="textarea form-control" placeholder="<?= ucwords(clean_snake_case($option['placeholder'] ? $option['placeholder'] : $option['label'])); ?>">{php_open_tag_echo} set_value('<?= $input; ?>'); {php_close_tag}</textarea>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'file') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <div id="{table_name}_<?= $input; ?>_galery"></div>
                                <input class="data_file" name="{table_name}_<?= $input; ?>_uuid" id="{table_name}_<?= $input; ?>_uuid" type="hidden" value="{php_open_tag_echo} set_value('{table_name}_<?= $input; ?>_uuid'); {php_close_tag}">
                                <input class="data_file" name="{table_name}_<?= $input; ?>_name" id="{table_name}_<?= $input; ?>_name" type="hidden" value="{php_open_tag_echo} set_value('{table_name}_<?= $input; ?>_name'); {php_close_tag}">
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'file_multiple') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <div id="{table_name}_<?= $input; ?>_galery"></div>
                                <div id="{table_name}_<?= $input; ?>_galery_listed"></div>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'select') {
                                                $relation = $this->crud_builder->getFieldRelation($input);
                    ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="<?= $input; ?>" id="<?= $input; ?>" data-placeholder="Select <?= ucwords(clean_snake_case($option['label'])); ?>">
                                    <option value=""></option>
                                    {php_open_tag}
                                    $conditions = [
                                    <?php foreach ((array)@$option['custom_condition'] as $cond) {
                                                    if ($cond['field'] == '') continue;
                                    ?>"<?= $cond['field'] . ' ' . $cond['operator'] . ' ' . $cond['value'] ?>" => null,
                                    <?php
                                                }
                                    ?>];
                                    {php_close_tag}

                                    {php_open_tag} foreach (db_get_all_data('<?= $relation['relation_table']; ?>', $conditions) as $row): {php_close_tag}
                                    <option value="{php_open_tag_echo} $row-><?= $relation['relation_value']; ?> {php_close_tag}">{php_open_tag_echo} $row-><?= $relation['relation_label']; ?>; {php_close_tag}</option>
                                    {php_open_tag} endforeach; {php_close_tag}
                                </select>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>

                    <?php } elseif ($option['input_type'] == 'chained') {
                                                $chain = $this->crud_builder->getFieldChain($input);
                                                $relation = $this->crud_builder->getFieldRelation($input);
                    ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="<?= $input; ?>" id="<?= $input; ?>" data-placeholder="Select <?= ucwords(clean_snake_case($option['label'])); ?>">
                                    <option value=""></option>
                                    <?php if (!$chain) : ?>{php_open_tag} foreach (db_get_all_data('<?= $relation['relation_table']; ?>') as $row): {php_close_tag}
                                    <option value="{php_open_tag_echo} $row-><?= $relation['relation_value']; ?> {php_close_tag}">{php_open_tag_echo} $row-><?= $relation['relation_label']; ?>; {php_close_tag}</option>
                                    {php_open_tag} endforeach; {php_close_tag} <?php endif ?>
                                </select>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>

                    <?php } elseif ($option['input_type'] == 'time') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right timepicker" name="<?= $input; ?>" id="<?= $input; ?>">
                                </div>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'date') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datepicker" name="<?= $input; ?>" placeholder="<?= ucwords(clean_snake_case($option['placeholder'] ? $option['placeholder'] : $option['label'])); ?>" id="<?= $input; ?>">
                                </div>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'year') {
                                                $relation = $this->crud_builder->getFieldRelation($input);
                    ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-2">
                                <select class="form-control chosen chosen-select-deselect" name="<?= $input; ?>" id="<?= $input; ?>" data-placeholder="Select <?= ucwords(clean_snake_case($option['label'])); ?>">
                                    <option value=""></option>
                                    {php_open_tag} for ($i = 1970; $i < date('Y')+100; $i++){ {php_close_tag} <option value="{php_open_tag_echo} $i;{php_close_tag}">{php_open_tag_echo} $i; {php_close_tag}</option>
                                        {php_open_tag} }; {php_close_tag}
                                </select>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'select_multiple') {
                                                $relation = $this->crud_builder->getFieldRelation($input);
                    ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select" name="<?= $input; ?>[]" id="<?= $input; ?>" data-placeholder="Select <?= ucwords(clean_snake_case($option['label'])); ?>" multiple>
                                    <option value=""></option>

                                    {php_open_tag}
                                    $conditions = [
                                    <?php foreach ((array)@$option['custom_condition'] as $cond) {
                                                    if ($cond['field'] == '') continue;
                                    ?>"<?= $cond['field'] . ' ' . $cond['operator'] . ' ' . $cond['value'] ?>" => null,
                                    <?php
                                                }
                                    ?>];
                                    {php_close_tag}
                                    {php_open_tag} foreach (db_get_all_data('<?= $relation['relation_table']; ?>', $conditions) as $row): {php_close_tag}
                                    <option value="{php_open_tag_echo} $row-><?= $relation['relation_value']; ?> {php_close_tag}">{php_open_tag_echo} $row-><?= $relation['relation_label']; ?>; {php_close_tag}</option>
                                    {php_open_tag} endforeach; {php_close_tag}
                                </select>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'checkboxes') {
                                                $relation = $this->crud_builder->getFieldRelation($input);
                    ?><div class="form-group  wrapper-options-crud">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                {php_open_tag}
                                $conditions = [
                                <?php foreach ((array)@$option['custom_condition'] as $cond) {
                                                    if ($cond['field'] == '') continue;
                                ?>"<?= $cond['field'] . ' ' . $cond['operator'] . ' ' . $cond['value'] ?>" => null,
                                <?php
                                                }
                                ?>];
                                {php_close_tag}
                                {php_open_tag} foreach (db_get_all_data('<?= $relation['relation_table']; ?>', $conditions) as $row): {php_close_tag}
                                <div class="col-md-3  padding-left-0">
                                    <label>
                                        <input type="checkbox" class="flat-red" name="<?= $input; ?>[]" value="{php_open_tag_echo} $row-><?= $relation['relation_value']; ?> {php_close_tag}"> {php_open_tag_echo} $row-><?= $relation['relation_label']; ?>; {php_close_tag}
                                    </label>
                                </div>
                                {php_open_tag} endforeach; {php_close_tag}
                                <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                        <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                                </div>

                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'options') {
                                                $relation = $this->crud_builder->getFieldRelation($input);
                    ?><div class="form-group  wrapper-options-crud">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                {php_open_tag}
                                $conditions = [
                                <?php foreach ((array)@$option['custom_condition'] as $cond) {
                                                    if ($cond['field'] == '') continue;
                                ?>"<?= $cond['field'] . ' ' . $cond['operator'] . ' ' . $cond['value'] ?>" => null,
                                <?php
                                                }
                                ?>];
                                {php_close_tag}
                                {php_open_tag} foreach (db_get_all_data('<?= $relation['relation_table']; ?>', $conditions) as $row): {php_close_tag}
                                <div class="col-md-3 padding-left-0">
                                    <label>
                                        <input type="radio" class="flat-red" name="<?= $input; ?>" value="{php_open_tag_echo} $row-><?= $relation['relation_value']; ?> {php_close_tag}"> {php_open_tag_echo} $row-><?= $relation['relation_label']; ?>; {php_close_tag}
                                    </label>
                                </div>
                                {php_open_tag} endforeach; {php_close_tag}
                                </select>
                                <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                        <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                                </div>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'true_false') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-6">
                                <div class="col-md-2 padding-left-0">
                                    <label>
                                        <input type="radio" class="flat-red" name="<?= $input; ?>" id="<?= $input; ?>" value="1">
                                        {php_open_tag_echo} cclang('yes'); {php_close_tag}
                                    </label>
                                </div>
                                <div class="col-md-14">
                                    <label>
                                        <input type="radio" class="flat-red" name="<?= $input; ?>" id="<?= $input; ?>" value="0">
                                        {php_open_tag_echo} cclang('no'); {php_close_tag}
                                    </label>
                                </div>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'custom_option') {
                                                $custom_value = $this->crud_builder->getFieldCustomValue($input);
                    ?><div class="form-group  wrapper-options-crud">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <?php foreach ($custom_value as $opt) :
                                ?><div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="<?= $input; ?>" value="<?= $opt['value']; ?>"> <?= $opt['label']; ?>
                                        </label>
                                    </div>
                                <?php endforeach;
                                ?></select>
                                <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                        <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                                </div>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'custom_checkbox') {
                                                $custom_value = $this->crud_builder->getFieldCustomValue($input);
                    ?><div class="form-group  wrapper-options-crud">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <?php foreach ($custom_value as $opt) :
                                ?><div class="col-md-3  padding-left-0">
                                        <label>
                                            <input type="checkbox" class="flat-red" name="<?= $input; ?>[]" value="<?= $opt['value']; ?>"> <?= $opt['label']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                                <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                        <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                                </div>

                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'custom_select_multiple') {
                                                $custom_value = $this->crud_builder->getFieldCustomValue($input);
                    ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select" name="<?= $input; ?>[]" id="<?= $input; ?>" data-placeholder="Select <?= ucwords(clean_snake_case($option['label'])); ?>" multiple>
                                    <option value=""></option>
                                    <?php foreach ($custom_value as $opt) :
                                    ?><option value="<?= $opt['value']; ?>"><?= $opt['label']; ?></option>
                                    <?php endforeach;
                                    ?>
                                </select>
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'custom_select') {
                                                $custom_value = $this->crud_builder->getFieldCustomValue($input);
                    ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select" name="<?= $input; ?>" id="<?= $input; ?>" data-placeholder="Select <?= ucwords(clean_snake_case($option['label'])); ?>">
                                    <option value=""></option>
                                    <?php foreach ($custom_value as $opt) :
                                    ?><option value="<?= $opt['value']; ?>"><?= $opt['label']; ?></option>
                                    <?php endforeach;
                                    ?>
                                </select>
                                <small class="info help-block">

                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } elseif ($option['input_type'] == 'address_map') { ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <input autocomplete="off" type="text" class="form-control" name="<?= $input; ?>" id="<?= $input; ?>" placeholder="<?= ucwords(clean_snake_case($option['placeholder'] ? $option['placeholder'] : $option['label'])); ?>" value="{php_open_tag_echo} set_value('<?= $input; ?>'); {php_close_tag}">
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } else {
                    ?><div class="form-group <?= @$option['wrapper_class'] ?> ">
                            <label for="<?= $input; ?>" class="col-sm-2 control-label"><?= ucwords(clean_snake_case($option['label'])); ?>
                                <?php if ($this->crud_builder->getFieldValidation($input, 'required')) { ?><i class="required">*</i>
                                <?php } ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="<?= $input; ?>" id="<?= $input; ?>" placeholder="<?= ucwords(clean_snake_case($option['placeholder'] ? $option['placeholder'] : $option['label'])); ?>" value="{php_open_tag_echo} set_value('<?= $input; ?>'); {php_close_tag}">
                                <small class="info help-block">
                                    <?= (isset($option['auto_generated_helpblock']) and $option['auto_generated_helpblock'] == 'yes') ? $this->crud_builder->parseValidationFile($input) : $option['help_block']; ?></small>
                            </div>
                        </div>
                    <?php } ?>


    <?php

                            if ($has_strict) {
    ?>{php_open_tag} endif {php_close_tag}
<?php
                            } ?>
<?php endforeach;
                        echo "\n"; ?>

<?php if (!count($stepper)) : ?>
    <div class="message"></div>
<?php endif ?>
<div class="row-fluid col-md-7 container-button-bottom">
    <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="{php_open_tag_echo} cclang('save_button'); {php_close_tag} (Ctrl+s)">
        <i class="fa fa-save"></i> {php_open_tag_echo} cclang('save_button'); {php_close_tag}
    </button>
    <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="{php_open_tag_echo} cclang('save_and_go_the_list_button'); {php_close_tag} (Ctrl+d)">
        <i class="ion ion-ios-list-outline"></i> {php_open_tag_echo} cclang('save_and_go_the_list_button'); {php_close_tag}
    </a>

    <div class="custom-button-wrapper">

        <?php foreach ($crud_actions as $action) : ?>
            <?php
            $meta = json_decode($action->meta);


            if ($action->action == 'button') { ?>
                <a href="{php_open_tag_echo} base_url(" <?= str_replace('{id}', '${table_name}->{primary_key}', @$meta->link) ?>"); {php_close_tag}" id="button-<?= $action->id ?>" target="blank" class="btn btn-flat btn-default "><i class="fa <?= $meta->icon ?>"></i> <?= $meta->label ?> </a>
            <?php } ?>

        <?php endforeach ?>
    </div>


    <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="{php_open_tag_echo} cclang('cancel_button'); {php_close_tag} (Ctrl+x)">
        <i class="fa fa-undo"></i> {php_open_tag_echo} cclang('cancel_button'); {php_close_tag}
    </a>

    <span class="loading loading-hide">
        <img src="{php_open_tag_echo} BASE_ASSET; {php_close_tag}/img/loading-spin-primary.svg">
        <i>{php_open_tag_echo} cclang('loading_saving_data'); {php_close_tag}</i>
    </span>
</div>
<?php if (count($stepper)) : ?>
</section>
<div class="message"></div>
<?php endif ?>
{php_open_tag_echo} form_close(); {php_close_tag}
</div>
</div>
</div>
</div>
</div>
</section>
<?php if ($editor_wysiwyg = $this->crud_builder->getFieldByType('editor_wysiwyg')) : ?>
    <script src="{php_open_tag_echo} BASE_ASSET; {php_close_tag}ckeditor/ckeditor.js"></script>
<?php endif; ?>
<?php $functions = $this->crud_builder->getFunctionBody('javascript_setting_create'); ?>

<script>
    $(document).ready(function() {

        "use strict";

        window.event_submit_and_action = '';

        <?php if (isset($functions['onReady'])) :
        ?>(function() <?= $functions['onReady'] ?>)()
        <?php endif ?>



        <?php foreach ($crud_actions as $action) :
            $meta = json_decode($action->meta);


            if ($action->action == 'button') { ?>
                $(document).on('click', 'a#button-<?= $action->id ?>', function(event) {
                    event.preventDefault()
                    <?= @$meta->click_event_javascript ?>

                    <?php if ($meta->click_event == 'submit_and_action') :
                    ?>window.event_submit_and_action = 'action_<?= $action->id ?>';
                    $('.btn_save_back').trigger('click')
                <?php endif ?>
                })
            <?php } ?>

        <?php endforeach ?>


        <?php if (count($stepper)) : ?>
            $('.container-button-bottom').hide();
            $('.form-step').steps({
                headerTag: 'h3',
                bodyTag: 'section',
                autoFocus: true,
                enableAllSteps: true,
                onFinishing: function() {
                    $('.btn_save_back').trigger('click')
                },
                labels: {
                    finish: 'save'
                }
            });
            $('.custom-button-wrapper').appendTo('.actions')

        <?php endif ?>
        <?php foreach ($address_map as $input) : ?><?php if (in_array($input, $show_in_add_form)) {
                                                    ?>$('#<?= $input; ?>').addressPickerByGiro({
            distanceWidget: true
        });
    <?php
                                                    }
                                                endforeach; ?>
    <?php foreach ($editor_wysiwyg as $input) : ?><?php if (in_array($input, $this->crud_builder->getFieldShowInAddForm())) { ?>CKEDITOR.replace('<?= $input; ?>');
    var <?= $input; ?> = CKEDITOR.instances.<?= $input; ?>;
    <?php }; ?>
    <?php endforeach; ?>

    $('#btn_cancel').click(function() {
        swal({
                title: "{php_open_tag_echo} cclang('are_you_sure'); {php_close_tag}",
                text: "{php_open_tag_echo} cclang('data_to_be_deleted_can_not_be_restored'); {php_close_tag}",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes!",
                cancelButtonText: "No!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = BASE_URL + '/administrator/{table_name}';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        <?php foreach ($editor_wysiwyg as $input) : ?><?php if (in_array($input, $this->crud_builder->getFieldShowInAddForm())) { ?>$('#<?= $input; ?>').val(<?= $input; ?>.getData());
    <?php }; ?>
    <?php endforeach; ?>

    var form_<?= $table_name ?> = $('#form_{table_name}');
    var data_post = form_<?= $table_name ?>.serializeArray();
    var save_type = $(this).attr('data-stype');

    data_post.push({
        name: 'save_type',
        value: save_type
    });

    data_post.push({
        name: 'event_submit_and_action',
        value: window.event_submit_and_action
    });

    <?php if (isset($functions['beforeSave'])) :
    ?>(function() <?= $functions['beforeSave'] ?>)()
    <?php endif ?>


    $('.loading').show();

    $.ajax({
            url: BASE_URL + '/administrator/{table_name}/add_save',
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('.steps li').removeClass('error');
            $('form').find('.error-input').remove();
            if (res.success) {
                <?php
                foreach ($fine_upload as $input) :
                    if (in_array($input, $this->crud_builder->getFieldShowInAddForm())) {
                ?>var id_<?= $input; ?> = $('#{table_name}_<?= $input; ?>_galery').find('li').attr('qq-file-id');
            <?php }
                endforeach;
            ?>

            if (save_type == 'back') {
                window.location.href = res.redirect;
                return;
            }

            $('.message').printMessage({
                message: res.message
            });
            $('.message').fadeIn();
            resetForm();
            <?php
            foreach ($fine_upload_multiple as $input) :
                if (in_array($input, $this->crud_builder->getFieldShowInAddForm())) {
            ?>$('#{table_name}_<?= $input; ?>_galery').find('li').each(function() {
                $('#{table_name}_<?= $input; ?>_galery').fineUploader('deleteFile', $(this).attr('qq-file-id'));
            });
            <?php }
            endforeach;

            foreach ($fine_upload as $input) :
                if (in_array($input, $this->crud_builder->getFieldShowInAddForm())) {
            ?>if(typeof id_<?= $input; ?> !== 'undefined') {
                $('#{table_name}_<?= $input; ?>_galery').fineUploader('deleteFile', id_<?= $input; ?>);
            }
            <?php }
            endforeach;
            ?>$('.chosen option').prop('selected', false).trigger('chosen:updated');
            <?php foreach ($editor_wysiwyg as $input) : ?><?php if (in_array($input, $this->crud_builder->getFieldShowInAddForm())) { ?><?= $input; ?>.setData('');
            <?php echo "\n";
                                                            }; ?>
            <?php endforeach; ?>

            } else {
                if (res.errors) {

                    $.each(res.errors, function(index, val) {
                        $('form #' + index).parents('.form-group').addClass('has-error');
                        $('form #' + index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">` + val + `</div>
                      `);
                    });
                    $('.steps li').removeClass('error');
                    $('.content section').each(function(index, el) {
                        if ($(this).find('.has-error').length) {
                            $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                        }
                    });
                }
                $('.message').printMessage({
                    message: res.message,
                    type: 'warning'
                });
            }

        })
        .fail(function() {
            $('.message').printMessage({
                message: 'Error save data',
                type: 'warning'
            });
        })
        .always(function() {
            $('.loading').hide();
            $('html, body').animate({
                scrollTop: $(document).height()
            }, 2000);
        });

    return false;
    }); /*end btn save*/

    <?php foreach ($fine_upload as $input) : ?>
        <?php
        if (in_array($input, $this->crud_builder->getFieldShowInAddForm())) {

            $extension =  $this->crud_builder->getFieldValidation($input, 'allowed_extension');
            $extension = is_string($extension) ? str_replace(' ', '', $extension) : '';

            if ($extension) {
                $extensions = explode(',', $extension);
            } else {
                $extensions = [];
            }

            $width = $this->crud_builder->getFieldValidation($input, 'max_width');
            $height = $this->crud_builder->getFieldValidation($input, 'max_height');

            if (!empty($width) or !empty($height)) {
                $dimension = $width . " * " . $height;
            } else {
                $dimension = false;
            }


        ?>var params = {};
        params[csrf] = token;

        $('#{table_name}_<?= $input; ?>_galery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: BASE_URL + '/administrator/{table_name}/upload_<?= $input; ?>_file',
                params: params
            },
            deleteFile: {
                enabled: true,
                endpoint: BASE_URL + '/administrator/{table_name}/delete_<?= $input; ?>_file',
            },
            thumbnails: {
                placeholders: {
                    waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                    notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                }
            },
            multiple: false,
            validation: {
                allowedExtensions: [<?= count($extensions) ? '"' . implode('","', $extensions) . '"' : '"*"'; ?>],
                sizeLimit: <?= (int) $this->crud_builder->getFieldValidation($input, 'max_size') * 1024; ?>,
                <?php if (($dimension)) { ?>
                    dimension: <?= $dimension; ?>
                <?php } ?>
            },
            showMessage: function(msg) {
                toastr['error'](msg);
            },
            callbacks: {
                onComplete: function(id, name, xhr) {
                    if (xhr.success) {
                        var uuid = $('#{table_name}_<?= $input; ?>_galery').fineUploader('getUuid', id);
                        $('#{table_name}_<?= $input; ?>_uuid').val(uuid);
                        $('#{table_name}_<?= $input; ?>_name').val(xhr.uploadName);
                    } else {
                        toastr['error'](xhr.error);
                    }
                },
                onSubmit: function(id, name) {
                    var uuid = $('#{table_name}_<?= $input; ?>_uuid').val();
                    $.get(BASE_URL + '/administrator/{table_name}/delete_<?= $input; ?>_file/' + uuid);
                },
                onDeleteComplete: function(id, xhr, isError) {
                    if (isError == false) {
                        $('#{table_name}_<?= $input; ?>_uuid').val('');
                        $('#{table_name}_<?= $input; ?>_name').val('');
                    }
                }
            }
        }); /*end <?= $input; ?> galery*/
    <?php } ?>
    <?php endforeach; ?>


    <?php foreach ($fine_upload_multiple as $input) : ?>
        <?php
        if (in_array($input, $this->crud_builder->getFieldShowInAddForm())) {

            $extension =  $this->crud_builder->getFieldValidation($input, 'allowed_extension');
            $extension = is_string($extension) ? str_replace(' ', '', $extension) : '';

            if ($extension) {
                $extensions = explode(',', $extension);
            } else {
                $extensions = [];
            }

            $width = $this->crud_builder->getFieldValidation($input, 'max_width');
            $height = $this->crud_builder->getFieldValidation($input, 'max_height');
            $item_limit = $this->crud_builder->getFieldValidation($input, 'max_item');

            if (!empty($width) or !empty($height)) {
                $dimension = $width . " * " . $height;
            } else {
                $dimension = false;
            }


        ?>var params = {};
        params[csrf] = token;

        $('#{table_name}_<?= $input; ?>_galery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: BASE_URL + '/administrator/{table_name}/upload_<?= $input; ?>_file',
                params: params
            },
            deleteFile: {
                enabled: true,
                endpoint: BASE_URL + '/administrator/{table_name}/delete_<?= $input; ?>_file',
            },
            thumbnails: {
                placeholders: {
                    waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                    notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                }
            },
            validation: {
                allowedExtensions: [<?= count($extensions) ? '"' . implode('","', $extensions) . '"' : '"*"'; ?>],
                sizeLimit: <?= (int) $this->crud_builder->getFieldValidation($input, 'max_size') * 1024; ?>,
                <?php if (($dimension)) { ?>
                    dimension: <?= $dimension; ?>,
                    <?php }
                if ($item_limit) { ?>itemLimit: <?= $item_limit;
                                            } ?>

            },
            showMessage: function(msg) {
                toastr['error'](msg);
            },
            callbacks: {
                onComplete: function(id, name, xhr) {
                    if (xhr.success) {
                        var uuid = $('#{table_name}_<?= $input; ?>_galery').fineUploader('getUuid', id);
                        $('#{table_name}_<?= $input; ?>_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="{table_name}_<?= $input; ?>_uuid[' + id + ']" value="' + uuid + '" /><input type="hidden" class="listed_file_name" name="{table_name}_<?= $input; ?>_name[' + id + ']" value="' + xhr.uploadName + '" />');
                    } else {
                        toastr['error'](xhr.error);
                    }
                },
                onDeleteComplete: function(id, xhr, isError) {
                    if (isError == false) {
                        $('#{table_name}_<?= $input; ?>_galery_listed').find('.listed_file_uuid[name="{table_name}_<?= $input; ?>_uuid[' + id + ']"]').remove();
                        $('#{table_name}_<?= $input; ?>_galery_listed').find('.listed_file_name[name="{table_name}_<?= $input; ?>_name[' + id + ']"]').remove();
                    }
                }
            }
        }); /*end <?= $input; ?> galery*/
    <?php } ?>
    <?php endforeach; ?>


    <?php foreach ($chained as $field => $chain) :
        if ($chain['chain_field_eq'] == null or $chain['chain_field'] == null)
            continue;
    ?>$('#<?= $chain['chain_field_eq'] ?>').change(function(event) {
        var val = $(this).val();
        $.LoadingOverlay('show')
        $.ajax({
                url: BASE_URL + '/administrator/<?= $table_name ?>/ajax_<?= $field ?>/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option value="' + val.<?= $chain['relation_value'] ?> + '">' + val.<?= $chain['relation_label'] ?> + '</option>'
                });
                $('#<?= $field ?>').html(html);
                $('#<?= $field ?>').trigger('chosen:updated');

            })
            .fail(function() {
                toastr['error']('Error', 'Getting data fail')
            })
            .always(function() {
                $.LoadingOverlay('hide')
            });

    });

    <?php endforeach ?>



    }); /*end doc ready*/
</script>