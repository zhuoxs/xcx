<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('../../../addons/'.MODULE.'/template/web/common/myheader', TEMPLATE_INCLUDEPATH)) : (include template('../../../addons/'.MODULE.'/template/web/common/myheader', TEMPLATE_INCLUDEPATH));?>
<script type="text/javascript" src="<?php  echo MODULE_URL?>template/web/js/angular.min.js"></script>


	<?php  if($_GPC['op'] == 'add' || $_GPC['op'] == 'edit') { ?>
<script type="text/javascript" src="<?php  echo MODULE_URL?>template/web/js/goodrule.js"></script>		
		<form method="post" id="add" style="margin-left: 100px">
			<div class="frm_control_group">
				<label for="" class="frm_label"></label>
				<div class="frm_controls">
				</div>
			</div>
			<div class="frm_control_group">
				<label for="" class="frm_label">商品标题</label>
				<div class="frm_controls msg">
					<span class="frm_textarea_box textarea_60px">
						<textarea  name="title" class="frm_textarea" rows="6" placeholder=""><?php  echo $info['title'];?></textarea>
					</span>
				</div>
			</div>
			<div class="frm_control_group">
				<label for="" class="frm_label">商品描述</label>
				<div class="frm_controls msg">
					<span class="frm_textarea_box textarea_60px">
						<textarea  name="desc" class="frm_textarea" rows="6" placeholder=""><?php  echo $info['desc'];?></textarea>
					</span>
				</div>
			</div>			
			<div class="frm_control_group">
				<label for="" class="frm_label">排序序号</label>
				<div class="frm_controls">
					<span class="frm_input_box frm_input_200">
						<input type="text" class="frm_input"  name="number" value="<?php  echo $info['number'];?>">
					</span>
					<p class="frm_tips">填入数字,越大越排前</p>
				</div>
			</div>
			<div class="frm_control_group">
				<label for="" class="frm_label">虚假销量</label>
				<div class="frm_controls">
					<span class="frm_input_box frm_input_200">
						<input type="text" class="frm_input"  name="sales" value="<?php  echo $info['sales'];?>">
					</span>
					<p class="frm_tips">填入数字</p>
				</div>
			</div>			
			<div class="frm_control_group" >
	  			<label for="" class="frm_label">所属分类</label>
	   			<div class="frm_controls">
		  			<div class="filter_content dropdown_topbar"> 
				   		<div class="dropdown_menu ">
				    		<a href="javascript:;" class="btn dropdown_switch jsDropdownBt width_200">
				    			<label class="jsBtLabel">
				    				<?php  if(is_array($goodsort)) { foreach($goodsort as $item) { ?>
				    					<?php  if(is_array($item['down'])) { foreach($item['down'] as $in) { ?>
					    					<?php  if($in['id'] == $info['sorttwo']) { ?>
					    						<?php  echo $in['name'];?>
					    					<?php  } ?>
				    					<?php  } } ?>
				    				<?php  } } ?>
				    			</label>
				    			<i class="arrow"></i>
				    		</a> 
				    		<div class="dropdown_data_container jsDropdownList width_200" >
					     		<ul class="dropdown_data_list">
					     			<?php  if(is_array($goodsort)) { foreach($goodsort as $item) { ?>
					     				<?php  if(is_array($item['down'])) { foreach($item['down'] as $in) { ?>
					      					<li class="dropdown_data_item "> <a href="javascript:;" id="<?php  echo $in['id'];?>" class="select_item"><?php  echo $in['name'];?></a> </li> 
					      				<?php  } } ?>
					      			<?php  } } ?>
					    		</ul>
				    		</div> 
				    		<input type="hidden" name="sortid" value="<?php  echo $info['sorttwo'];?>">
				   		</div>
		  			</div>
	   			</div>
	  		</div>
			<div class="frm_control_group single_img_upload">
				<label for="" class="frm_label">封面图片</label>
				<div class="frm_controls">
					<?php  echo  WebCommon::tpl_form_field_image('thumb',$info['thumb'])?>
				</div>
			</div>
			<div class="frm_control_group single_img_upload">
				<label for="" class="frm_label">轮播图片</label>
				<div class="frm_controls good_images">
					<?php  echo WebCommon::tpl_form_field_multi_image('pic', $info['pic'],'');?>
					<p class="frm_tips">可拖拽图片排序</p>
				</div>
			</div>

			<div class="frm_control_group">
				<label for="" class="frm_label">商品原价</label>
				<div class="frm_controls">
					<span class="frm_input_box frm_input_200">
						<input type="text" class="frm_input"  name="oldprice" value="<?php  echo $info['oldprice'];?>">
					</span>
					<p class="frm_tips">此价格仅做展示用，若填0商品列表和商品详情内不显示原价</p>
				</div>
			</div>

			<div class="frm_control_group" >
	  			<label for="" class="frm_label">商品规格</label>
	   			<div class="frm_controls">
	    			<label class="frm_radio_label  hide_item show_item" hideitem=".isrule" showitem=".norule">
	    				<i class="icon_radio"></i>
	    				<span class="lbl_content">无规格</span>
	    				<input type="radio" name="isrule" value="0" class="frm_radio" <?php  if($info['isrule'] == 0) { ?>checked="checked"<?php  } ?> />
	    			</label>
	    			<label class="frm_radio_label hide_item show_item"  hideitem=".norule" showitem=".isrule">
	    				<i class="icon_radio"></i>
	    				<span class="lbl_content">添加规格</span>
	    				<input type="radio" name="isrule" value="1" class="frm_radio" <?php  if($info['isrule'] == 1) { ?>checked="checked"<?php  } ?> /> 
	    			</label>	    			
	   			</div>
	  		</div>

			<div class="hideitem norule" <?php  if($info['isrule'] == 0) { ?>style="display:block"<?php  } ?>>
				<div class="frm_control_group">
					<label for="" class="frm_label">商品现价</label>
					<div class="frm_controls">
						<span class="frm_input_box frm_input_200">
							<input type="text" class="frm_input"  name="price" value="<?php  echo $info['price'];?>">
						</span>
						<p class="frm_tips">真实的下单价格</p>
					</div>
				</div>
				<div class="frm_control_group">
					<label for="" class="frm_label">商品库存</label>
					<div class="frm_controls">
						<span class="frm_input_box frm_input_200">
							<input type="text" class="frm_input"  name="stock" value="<?php  echo $info['stock'];?>">
						</span>
						<p class="frm_tips">填大于0的数字，等于0即无法下单</p>
					</div>
				</div>
			</div>

			<div class="frm_control_group hideitem isrule" <?php  if($info['isrule'] == 1) { ?>style="display:block"<?php  } ?> ng-app="myyapp" ng-controller="goodrule">
	  			<label for="" class="frm_label">规格内容</label>
	   			<div class="frm_controls" style="max-width: 550px">
					<div class="rule_append_box">
						<div class="item_cell_box good_rule_body">
							<div class="input_title"></div>
							<div class="input_form item_cell_flex">
								<div class="good_rule_list">
									<div class="good_rule_item" ng-repeat="item in rule">
										<ul class="checkbox">
											<span class="frm_input_box frm_input_150">
												<input type="text" class="frm_input"  ng-model="item.pro.title" >
											</span>
										</ul>
										<ul class="checkbox goog_rule_prolist">
											<li ng-repeat="list in item.data" ng-click="deleteData(item.pro.id,list.id)">
												<input type="radio"  checked  value="规格属性1" > {{list.name}}
											</li> 
										</ul>
										<div class="edit_btn_box">
											<span class="frm_input_box frm_input_150">
												<input type="text" class="frm_input editvalue_{{item.pro.id}}"  name="editvalue" >
											</span>
											<a href="javascript:;" ng-click="addRuleData(item.pro.id)">添加属性</a>&nbsp;&nbsp;
											<a href="javascript:;" ng-click="deleteRule(item.pro.id)">删除规格</a>
										</div>
									</div>
								</div>
								<div class="add_a_rule_box">
									<a href="javascript:;"  ng-click="addRule()">增加一条规格</a>
									<p class="font_999">提示：请先在上方添加好规格属性再在下方设置价格，规格数量不要超过4个，否则计算耗时成倍增加，造成计算缓慢。点击上方属性可删除规格属性</p>
								</div>
								<div class="add_a_rule_box">
									批量设置数据：商品价格
									<span class="frm_input_box frm_input_100">
										<input type="text" class="frm_input "  name="setallnowprice" >
									</span>
									商品库存
									<span class="frm_input_box frm_input_100">
										<input type="text" class="frm_input "  name="setallstock" >
									</span><a href="javascript:;" class="a_href setallparams" ng-click="setAllParams()"> 确定</a>
								</div>
								
								<div class="good_rule_map">
									<table class="goodrule_table">
										<thead>
											<tr>
												<th>规格组合</th>
												<th>商品价格</th>
												<th>商品库存</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="item in table">
												<td class="pro_name">{{item.name}}</td>
												<td class="pro_input">
													<span class="frm_input_box frm_input_100">
														<input type="text" class="frm_input" ng-change="changePrice()" ng-model="item.nowprice">
													</span>
												</td>
												<td class="pro_input">
													<span class="frm_input_box frm_input_100">
														<input type="text" class="frm_input" data-type="stock" ng-change="changePrice()" ng-model="item.stock">
													</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<input name="rule" type="hidden" value="">
					<input name="rulemap" type="hidden" value="">
	   			</div>
	  		</div>

			<div class="frm_control_group textarea_item">
				<label for="" class="frm_label">商品详情</label>
				<div class="frm_controls">
					<?php  echo Util::tpl_ueditor('content', htmlspecialchars_decode($info['content']));?>
				</div>
			</div>
			<div class="tool_bar">
				<input type="submit" name="create" class="btn btn_primary" value="保存" >
				<input type="submit" name="save" class="btn btn_primary" value="保存并下架">
				<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
			</div>
		</form>
<script>
	var rule = <?php echo empty($info['rulearray']['rule'])?'[]': json_encode($info['rulearray']['rule'])?>;
	var map = <?php echo empty($info['rulearray']['rulemap'])?'[]': json_encode($info['rulearray']['rulemap'])?>;
</script>


<div class="dialog_wrp area_select_dialog ui-draggable delivery_box" style="display: none;">
	<div class="dialog">
		<div class="dialog_hd">
			<h3>选择地区</h3>
			<a href="javascript:;" class="icon16_opr closed pop_closed delivery_close">关闭</a>
		</div>
		<div class="dialog_bd">
			<div id="js_area_select">
			<div class="scope_area">
				<div class="unchoose_scope delivery_privince">
					<div class="scope_hd">
						<label>省</label>
					</div>
					<dl class="scope_list jsFromList">
						<div class="js_dd_list"></div>
					</dl>
				</div>
				<div class="unchoose_scope delivery_city">
					<div class="scope_hd">
						<label>市</label>
					</div>
					<dl class="scope_list jsFromList">
						<div class="js_dd_list">						
						</div>
					</dl>
				</div>
				<div class="unchoose_scope delivery_county">
					<div class="scope_hd">
						<label>区县</label>
					</div>
					<dl class="scope_list jsFromList">
						<div class="js_dd_list">						
						</div>
					</dl>
				</div>
				
			</div>
			</div>
		</div>
		<div class="dialog_ft">
            <span class="btn btn_primary btn_input js_btn_p" id="confirm_indelivery"><button type="button" class="js_btn">确定</button></span>
            <span class="btn btn_default btn_input js_btn_p delivery_close"><button type="button" class="js_btn">取消</button></span>
		</div>
	</div>
</div>
<div class="mask ui-draggable" style="display:none;"></div>



<?php  } else if($_GPC['op'] == 'list') { ?>
	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('../../../addons/'.MODULE.'/template/web/common/topbar', TEMPLATE_INCLUDEPATH)) : (include template('../../../addons/'.MODULE.'/template/web/common/topbar', TEMPLATE_INCLUDEPATH));?>
	<div class="tr fr">
		<a href="javascript:;" class="add_form_btn topbar_jsbtn" js="loadgood">导入商品</a>
	</div>
	<?php  if(!empty( $list )) { ?>

	<table class="table" cellspacing="0"> 
	   <thead class="thead"> 
	    	<tr>
	     		<th class="table_cell title td_col_1"> 
	     			<label class="frm_checkbox_label" for="selectAll"> 
	     				<i class="icon_checkbox"></i> 
	     				<span class="lbl_content">id</span> 
	     				<input type="checkbox" class="frm_checkbox" id="selectAll" /> 
	     			</label>
	     		</th> 
	     		<th class="table_cell tl td_col_2">商品标题</th>
	     		<th class="table_cell tl td_col_1">商品图片</th>
	     		<th class="table_cell tl td_col_1">销量</th>
	     		<th class="table_cell tl td_col_1">排序</th>
	     		<th class="table_cell tl td_col_1">状态</th>
	     		<th class="table_cell tr td_col_1">操作</th>
	    	</tr>
	   </thead>
	   <tbody class="tbody" id="js_goods">
	   <form method="post">
		   <?php  if(is_array($list)) { foreach($list as $item) { ?>
		    	<tr> 
		     		<td class="table_cell title"> 
		      			<div class="goods_info">
		      			 	<label class="frm_checkbox_label" > 
		       					<i class="icon_checkbox"></i> 
		       					<input type="checkbox" name="checkall[]" class="frm_checkbox" value="<?php  echo $item['id'];?>" /> 
		       					<?php  echo $item['id'];?>
		       				</label>
		      			</div>
		     		</td> 
		     		<td class="table_cell price tl">
		    			<?php  echo $item['title'];?>
		     		</td>
		     		<td class="table_cell price tl">
		     			<img src="<?php  echo tomedia($item['thumb'])?>" width="30px" height="30px">
		     		</td>     		
		     		<td class="table_cell price tl">
		     			<p class="font_mini">虚假：<?php  echo $item['sales'];?></p>
		     			<p class="font_mini">真实：<?php  echo $item['realsales'];?></p>
		     		</td>
		     		<td class="table_cell price tl">
		    			<span class="edit_number">
		    				<input type="text" id="<?php  echo $item['id'];?>" inputname="goodnumber" inputtype="text" value="<?php  echo $item['number'];?>" class="edit_number_input tl">
		    			</span>
		     		</td>	     			
		    		<td class="table_cell count tl">
		    			<?php  if($item['status'] == 0) { ?>
		    				正常
		    			<?php  } else if($item['status'] == 1 ) { ?>
		    				<p class="font_ff5f27">已下线</p>
		    			<?php  } ?>
		    		</td>
				    <td class="table_cell oper last_child tr opclass" style="position: relative;">
				    	<a href="<?php  echo self::pwUrl('order','good',array('op'=>'edit','id'=>$item['id']))?>">编辑</a>
				    	<a href="<?php  echo self::pwUrl('order','good',array('op'=>'delete','id'=>$item['id']))?>" onclick="return confirm('删除不能恢复，且订单内的商品数据也不显示，确定要删除吗？');">删除</a>
				    	<?php  if($item['status'] == 0) { ?>
				    		<a href="<?php  echo self::pwUrl('order','good',array('op'=>'down','id'=>$item['id']))?>" onclick="return confirm('确定要下架吗？');">下架</a>
				    	<?php  } ?>
				    	<?php  if($item['status'] == 1) { ?>
				    		<a href="<?php  echo self::pwUrl('order','good',array('op'=>'up','id'=>$item['id']))?>" onclick="return confirm('确定要下架吗？');">上架</a>
				    	<?php  } ?>		    	
				    	<!-- <p>
				    		<a href="<?php  echo $this->createWebUrl('order',array('op'=>'all','gid'=>$item['id']))?>" >查看订单</a>
				    	</p> -->
				    	<p class="good_qrcode_box">
				    		<a target="_blank" href="javascript:;" class="show_good_qrcode">商品二维码</a>
				    		<img src="<?php  echo $item['urlimg'];?>" width="200px" height="200px">
				    	</p>
				    </td>
		    	</tr>
		    <?php  } } ?>
	   	</tbody> 
	  	</table>
		<div class="bottom_page item_cell_box">
			<div class="dib tl">
	     			<label class="frm_checkbox_label" for="selectAll"> 
	     				<i class="icon_checkbox"></i> 
	     				<span class="lbl_content">全选</span> 
	     				<input type="checkbox" class="frm_checkbox" id="selectAll" /> 
	     			</label>
	  			<div class="filter_content dropdown_topbar"> 
			   		<div class="dropdown_menu ">
			    		<a href="javascript:;" class="btn dropdown_switch jsDropdownBt">
			    			<label class="jsBtLabel">批量操作</label>
			    			<i class="arrow"></i>
			    		</a> 
			    		<div class="dropdown_data_container jsDropdownList" > 
				     		<ul class="dropdown_data_list"> 
				      			<li class="dropdown_data_item "> 
				      				<input name="deleteall" class="alldeal_btn" value="删除所选" onclick="return confirm('确定要删除选择的吗？');" type="submit">
				      			</li>
				      			<?php  if(empty( $_GPC['status'] )) { ?>
				      			<li class="dropdown_data_item ">
				      				<input name="downall" class="alldeal_btn" value="批量下架" onclick="return confirm('确定要下架所选吗？');" type="submit">
				      			</li>
				      			<?php  } ?>
				      			<?php  if($_GPC['status'] == 1) { ?>
				      			<li class="dropdown_data_item "> 
				      				<input name="upall" class="alldeal_btn" value="批量上架" onclick="return confirm('确定要上架所选吗？');" type="submit">
				      			</li>
				      			<?php  } ?>
				    		</ul> 
			    		</div> 
			   		</div>
	  			</div>
			</div>
			<div class="tr dib item_cell_flex">
				<?php  echo $pager;?>
			</div>
		</div>
			<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
		</form>
	<?php  } else { ?>
		<div class="no_data">没有数据</div>
	<?php  } ?>

<div class="my_model" loadgood style="display: none" ng-app="myyapp" ng-controller="loadgood">
    <div class=" ui-draggable " >
        <div class="dialog">
            <div class="dialog_hd" style="line-height: initial;">
            	<div class="item_cell_box loadsort_top">
            		<div class="loadsort_item {{topid == 1 ? 'loadsort_item_act' : ''}}" ng-click="changetype(1,1)">生鲜日常类</div>
            		<div class="loadsort_item {{topid == 2 ? 'loadsort_item_act' : ''}}" ng-click="changetype(1,2)">外卖餐饮类</div>
            	</div>
                <a href="javascript:;" class="icon16_opr closed pop_closed model_close" >关闭</a>
            </div>
            <div class="dialog_bd info_box item_cell_box" >
                <div class="setlink_l">
                	<li ng-show="topid == 1" class="{{ actid == item.id || ( $index == 0 && !actid ) ? 'setlink_act' : ''}}" ng-repeat="item in gooddata" ng-click="changetype(2,item.id)">{{item.name}}</li>

                	<li ng-show="topid == 2" class="{{ actid == item.id || ( $index == 0 && !actid ) ? 'setlink_act' : ''}}" ng-repeat="item in gooddata1" ng-click="changetype(2,item.id)">{{item.name}}</li>
                </div>
                <div class="setlink_r item_cell_flex" ng-show="topid == 1">
                	
                	<div ng-repeat="item in gooddata" ng-show="actid == item.id || ($index == 0 && !actid)">
                		<div class="item_cell_box setlink_r_item" style="margin-top: 10px;">
                			<div class="model_temp_name">{{item.name}}</div>
                			<div class="setlink_r_box item_cell_flex" style="padding-right: 5px;"></div>
                		</div>
	                	<div class="item_cell_box setlink_r_item">
	                		<div class="setlink_r_box item_cell_flex needdealimg{{item.id}}1" >
	                			
	                			<div class="loadsort_item item_cell_box setlink_r_item" ng-repeat="inn in item.product">
	                				<div>
	                					<img data-src="{{inn.thumb}}" isload="0" width="30px" height="30px">
	                				</div>
	                				<div style="width: 200px; text-align: left;">{{inn.title}}</div>
	                				<div>
							  			<div class="filter_content dropdown_topbar"> 
									   		<div class="dropdown_menu ">
									    		<a href="javascript:;" class="btn dropdown_switch jsDropdownBt width_100">
									    			<label class="jsBtLabel">
									    				选择分类
									    			</label>
									    			<i class="arrow"></i>
									    		</a> 
									    		<div class="dropdown_data_container jsDropdownList width_100" > 
										     		<ul class="dropdown_data_list">
										     			<?php  if(is_array($goodsort)) { foreach($goodsort as $item) { ?>
										     				<?php  if(is_array($item['down'])) { foreach($item['down'] as $in) { ?>
										      				<li class="dropdown_data_item "> <a href="javascript:;" id="<?php  echo $in['id'];?>" class="select_item"><?php  echo $in['name'];?></a> </li> 
										     				<?php  } } ?>
										      			<?php  } } ?>
										    		</ul>
									    		</div> 
									    		<input type="hidden" name="sortid" value="">
									   		</div>
							  			</div>
	                				</div>
	                				<div class="setlink_r_box item_cell_flex " >
					      			 	<label class="frm_checkbox_label" > 
					       					<i class="icon_checkbox"></i> 
					       					<input type="checkbox" name="checkall" class="frm_checkbox" stype="1" oid="{{item.id}}" iid="{{inn.id}}" /> 
					       					选择
					       				</label>
	                				</div>
	                			</div>

	                		</div>
	                	</div>
                	</div>
                </div>
                <div class="setlink_r item_cell_flex" ng-show="topid == 2">
                	
                	<div ng-repeat="item in gooddata1" ng-show="actid == item.id || ($index == 0 && !actid)">
                		<div class="item_cell_box setlink_r_item" style="margin-top: 10px;">
                			<div class="model_temp_name">{{item.name}}</div>
                			<div class="setlink_r_box item_cell_flex" style="padding-right: 5px;"></div>
                		</div>
	                	<div class="item_cell_box setlink_r_item">
	                		<div class="setlink_r_box item_cell_flex needdealimg{{item.id}}2" >
	                			
	                			<div class="loadsort_item item_cell_box setlink_r_item" ng-repeat="inn in item.product">
	                				<div>
	                					<img data-src="{{inn.thumb}}" isload="0" width="30px" height="30px">
	                				</div>
	                				<div style="width: 200px; text-align: left;">{{inn.title}}</div>
	                				<div>
							  			<div class="filter_content dropdown_topbar"> 
									   		<div class="dropdown_menu ">
									    		<a href="javascript:;" class="btn dropdown_switch jsDropdownBt width_100">
									    			<label class="jsBtLabel">
									    				选择分类
									    			</label>
									    			<i class="arrow"></i>
									    		</a> 
									    		<div class="dropdown_data_container jsDropdownList width_100" > 
										     		<ul class="dropdown_data_list">
										     			<?php  if(is_array($goodsort)) { foreach($goodsort as $item) { ?>
										     				<?php  if(is_array($item['down'])) { foreach($item['down'] as $in) { ?>
										      				<li class="dropdown_data_item "> <a href="javascript:;" id="<?php  echo $in['id'];?>" class="select_item"><?php  echo $in['name'];?></a> </li> 
										     				<?php  } } ?>
										      			<?php  } } ?>
										    		</ul>
									    		</div> 
									    		<input type="hidden" name="sortid" value="">
									   		</div>
							  			</div>
	                				</div>
	                				<div class="setlink_r_box item_cell_flex " >
					      			 	<label class="frm_checkbox_label" > 
					       					<i class="icon_checkbox"></i> 
					       					<input type="checkbox" name="checkall" class="frm_checkbox" stype="2" oid="{{item.id}}" iid="{{inn.id}}" /> 
					       					选择
					       				</label>
	                				</div>
	                			</div>

	                		</div>
	                	</div>
                	</div>
                </div>

            </div>
            <div class="dialog_ft">
            	<span class="btn btn_primary btn_input js_btn_p" id="confirm_load">
            		<button type="button" class="js_btn">导入选择的</button>
            	</span>
                <span class="btn btn_default btn_input js_btn_p model_close" >
                    <button type="button" class="js_btn">取消</button>
                </span>
            </div>
        </div>
    </div>
    <div class="mask ui-draggable" style="display: block;"></div>
</div>

<script type="text/javascript">
	
	var app = angular.module('myyapp',[]);
	app.controller('loadgood',['$scope',function($scope){

		$scope.topid = 1,
		$scope.actid = null;

		$scope.gooddata = null;
		$scope.gooddata1 = null;

		$('.topbar_jsbtn[js="loadgood"]').click(function(){
			if( !$scope.gooddata ){
				Http('post','json','loadgoodtemp',{},function(data){
					$scope.gooddata = data.obj;
					
					setTimeout(function(){
						$scope.changetype(2,data.obj[0].id);
					},1200);
					

					$scope.$apply();
				},true);
			}
		});



		$scope.changetype = function(type,id){
			if( type == 1 ){
				$scope.topid = id;
				$scope.actid = null;

				// 加载餐饮类
				if( !$scope.gooddata1 ){
					Http('post','json','loadgoodtemp1',{},function(data){
						$scope.gooddata1 = data.obj;

						setTimeout(function(){
							$scope.changetype(2,data.obj[0].id);
						},1200);

						$scope.$apply();
					},true);
				}

			}else if( type == 2 ){
				$scope.actid = id;

				$('.needdealimg'+id+$scope.topid).find('img').each(function(){

					var _this = $(this);
					if( _this.attr('isload') == '0' ){
						_this.attr('src', _this.attr('data-src') ).attr('isload','1');
					}
				})

			}
		}

		$('#confirm_load').click(function(){
			var arr = [];
			
			$('input[name=checkall]:checked').each(function(){
				
				var _this = $(this);
				var type = _this.attr('stype');
				var oid = _this.attr('oid');
				var iid = _this.attr('iid');
				var pid = _this.parents('.loadsort_item').find('input[name=sortid]').val();

				var aaa = $scope.gooddata;
				if( type == 2 ) aaa = $scope.gooddata1;

				var con = true;
			    angular.forEach(aaa,function(m,i){
			       	if(m.id == oid && con){
					    angular.forEach(m.product,function(n,i){
					       	if(n.id == iid && con){
					        	arr.push({type:type,pid:pid,good:n});
					        	con = false;
					        }
					    });
			        }
			    });
				
			});
			
			if( confirm('确定导入吗？') ) {
				Http('post','json','loadgood',{data:arr,type:1},function(data){
					webAlert(data.res);
					if(data.status == 200){
						setTimeout(function(){
							location.href = '';
						},500);
					}
				},true);
			}
		});

	}]);

</script>

<?php  } else if($_GPC['op'] == 'gettb') { ?>
	<form>
		
		<div class="frm_control_group">
			<label for="" class="frm_label"></label>
			<div class="frm_controls">
			</div>
		</div>

		<div class="frm_control_group"> 
			<label for="" class="frm_label">商品链接</label> 
			<div class="frm_controls"> 
			<div class="edit_right_list width_750 group_tb_box">
				<span id="add_tb" class="btn btn_primary btn_small edit_right_btn">添加一项</span>
				<div class="edit_right_item">
					链接<span class="frm_input_box frm_input_box_500">
						<input type="text" class="frm_input"  name="tburl" value="">
					</span>
					<a href="javascript:;" class="delete_params">删除</a>
				</div>
			</div>
			</div>
		</div>
		<div class="frm_control_group" >
			<label for="" class="frm_label">存进分类</label>
			<div class="frm_controls">
  			<div class="filter_content dropdown_topbar"> 
		   		<div class="dropdown_menu ">
		    		<a href="javascript:;" class="btn dropdown_switch jsDropdownBt width_200">
		    			<label class="jsBtLabel">
		    				<?php  if(is_array($goodsort)) { foreach($goodsort as $item) { ?>
		    					<?php  if(is_array($item['down'])) { foreach($item['down'] as $in) { ?>
			    					<?php  if($in['id'] == $info['sortid']) { ?>
			    						<?php  echo $in['name'];?>
			    					<?php  } ?>
		    					<?php  } } ?>
		    				<?php  } } ?>
		    			</label>
		    			<i class="arrow"></i>
		    		</a> 
		    		<div class="dropdown_data_container jsDropdownList width_200" > 
			     		<ul class="dropdown_data_list">
			     			<?php  if(is_array($goodsort)) { foreach($goodsort as $item) { ?>
			     				<?php  if(is_array($item['down'])) { foreach($item['down'] as $in) { ?>
			      					<li class="dropdown_data_item "> <a href="javascript:;" id="<?php  echo $in['id'];?>" class="select_item"><?php  echo $in['name'];?></a> </li> 
			      				<?php  } } ?>
			      			<?php  } } ?>
			    		</ul>
		    		</div> 
		    		<input type="hidden" name="sortid" value="<?php  echo $info['sortid'];?>" value="">
		   		</div>
  			</div>
			</div>
		</div>

		<div class="tool_bar">
			<div class="btn btn_primary" id="gettb">采集</div>
		</div>

	</form>

	<?php  } ?>
	
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('../../../addons/'.MODULE.'/template/web/common/myfooter', TEMPLATE_INCLUDEPATH)) : (include template('../../../addons/'.MODULE.'/template/web/common/myfooter', TEMPLATE_INCLUDEPATH));?>
