<?php
defined('YII_ENV') or exit('Access Denied');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/27
 * Time: 11:36
 */

$this->title = '编辑柜子';
$this->params['active_nav_group'] = 2;
$returnUrl = Yii::$app->request->referrer;
if (!$returnUrl) {
    $returnUrl = $urlManager->createUrl([get_plugin_url() . '/goods']);
}
?>
<script src="<?= Yii::$app->request->baseUrl ?>/statics/mch/js/selectCity/assets/js/data.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/statics/mch/js/selectCity/assets/js/prettify.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/statics/mch/js/selectCity/dist/jquery.city.select.min.js"></script>
<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <form class="auto-form" method="post" return="<?= $returnUrl ?>">
            <div class="form-group row">
                <div class="form-group-label col-sm-2 text-right">
                    <label class="col-form-label required">柜子ID</label>
                </div>
                <div class="col-sm-6">
                    <?php if ($list['cabinet_id']): ?>
                        <input class="form-control" type="text" name="model[cabinet_id]" value="<?= $list['cabinet_id'] ?>" maxlength="12" readonly>
                    <?php else : ?>
                        <input class="form-control" type="text" name="model[cabinet_id]" value="<?= $list['cabinet_id'] ?>" maxlength="12">
                    <?php endif; ?>
                    
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group-label col-sm-2 text-right">
                    <label class="col-form-label required">类型</label>
                </div>
                <div class="col-sm-6">
                    
                        <?php if ($list['cabinet_type']): ?>
                            <?php if ($list['cabinet_type']==1): ?>
                                <select class="form-control parent" name="model[cabinet_type]" disabled>
                                    <option value="0"></option>
                                    <option value="1" selected>常温柜</option>
                                    <option value="2">冷藏柜</option>
                                    <option value="3">冷冻柜</option>
                                </select>
                            <?php elseif ($list['cabinet_type']==2) : ?>
                                <select class="form-control parent" name="model[cabinet_type]" disabled>
                                    <option value="0"></option>
                                    <option value="1">常温柜</option>
                                    <option value="2" selected>冷藏柜</option>
                                    <option value="3">冷冻柜</option>
                                </select>
                            <?php elseif ($list['cabinet_type']==3) : ?>
                                <select class="form-control parent" name="model[cabinet_type]" disabled>
                                    <option value="0"></option>
                                    <option value="1">常温柜</option>
                                    <option value="2">冷藏柜</option>
                                    <option value="3" selected>冷冻柜</option>
                                </select>
                            <?php endif; ?>
                        <?php else : ?>
                            <select class="form-control parent" name="model[cabinet_type]">
                                <option value="0"></option>
                                <option value="1">常温柜</option>
                                <option value="2">冷藏柜</option>
                                <option value="3">冷冻柜</option>
                            </select>
                        <?php endif; ?>
                        
                    
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group-label col-sm-2 text-right">
                    <label class="col-form-label required">投放城市</label>
                </div>
                <div class="col-sm-6">
                    <select id="province" class="form-control parent" name="model[province]" style="width: 48%;display: inline;">
                        <option value="载入中">载入中</option>
                    </select>
                    <select id="city" class="form-control parent" name="model[city]" style="width: 48%;display: inline;">
                        <option value="载入中">载入中</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group-label col-sm-2 text-right">
                    <label class="col-form-label required">详细地址</label>
                </div>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="model[address]" value="<?= $list['address'] ?>" maxlength="50">
                </div>
            </div>
            
            <div class="form-group row">
                <div class="form-group-label col-sm-2 text-right">
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary auto-form-btn" href="javascript:">保存</a>
                    <input type="button" class="btn btn-default ml-4" 
                           name="Submit" onclick="javascript:history.back(-1);" value="返回">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(function () {
        $('#province, #city').citylist({
            data    : data,
            id      : 'id',
            children: 'cities',
            name    : 'name',
            metaTag : 'name',
        });
    });
    $(document).on('change', '.parent', function () {
        var p = $(this).val();
        if (p == '0') {
            $('.advert').show();
        } else {
            $('input[name="model[advert_url]"]').val('').trigger('change');
            $('input[name="model[advert_pic]"]').val('').trigger('change');
            $('input[name="model[advert_pic]"]').next('.image-picker-view').css('background-image', 'url("")');
            $('.advert').hide();
        }
    })
</script>