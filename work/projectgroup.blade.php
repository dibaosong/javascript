
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="http://www.sycalc.com.cn:8082/lib/html5shiv.js"></script>
<script type="text/javascript" src="http://www.sycalc.com.cn:8082/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="http://www.sycalc.com.cn:8082/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="http://www.sycalc.com.cn:8082/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="http://www.sycalc.com.cn:8082/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="http://www.sycalc.com.cn:8082/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://www.sycalc.com.cn:8082/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>分组列表</title>

<style>
	body{
		height: 100%;
	}
	.page-container{
		height: calc(100% - 40px);
	}
	.group-box{
		height: calc(100% - 80px);
		border: 1px #e5e5e5 solid;
		box-shadow: 0 0 5px #ccc;
	}
	.group-left{
		float: left;
		width: 170px;
		height: 100%;
		background: #f5f5f5;
		box-shadow: 0 0 2px #ccc inset;
		overflow-x: hidden;
		overflow-y: auto; 
	}
	.group-left li{
		position: relative;
		height: 70px;
		line-height: 70px;
		text-indent: 15px;
		border-top: 1px #f5f5f5 solid;
		border-bottom: 1px #f5f5f5 solid;
		cursor: pointer;
		white-space:nowrap;word-break:keep-all;text-overflow:ellipsis;overflow:hidden;
	}
	.group-left li i{
		transition: .3s;
		opacity: 0;
		position: absolute;
		right: 3px;
		top: 3px;
		width: 20px;
		height: 20px;
		text-indent: 0;
		text-align: center;
		line-height: 20px;
		background: #5a98de;
		border-radius: 15px;
		color: #fff;
		cursor: pointer;
	}
	.group-left li:hover i{
		opacity: 1;
	}
	.group-left li:first-child{
		border-top: 0 !important;
	}
	.group-left li.active{
		width: 100%;
		border-right: 1px #fff solid;
		border-top: 1px #e5e5e5 solid;
		border-bottom: 1px #e5e5e5 solid;
		background: #fff;
		cursor: default;
	}
	.group-right{
		float: right;
		width: calc(100% - 170px);
		height: 100%;
	}
	.group-cons{
		display: none;
		height: 100%;
	}
	.group-con{
		height: calc(100% - 50px);
		padding: 0 30px;
		overflow: auto;
	}
	.group-conbox{
		padding: 20px 0 10px 0;
	}
	.group-conbox .btn{
		margin: 0 15px 15px 0;
		cursor: default;
	}
	.group-conbox i{
		margin-left: 5px;
		cursor: pointer;
	}
	.group-footer{
		height: 50px;
		line-height: 50px;
		background: #e4e4e4;
	}
	.group-project-text{
		width: 300px;
	}
	.group-project-con{
		width: 350px;
		min-height: 120px;
		max-height: 200px;
		margin: 20px auto;
		padding: 5px 20px 20px 20px;
		border: 1px #e5e5e5 solid;
		overflow: auto;
	}
	.group-project-con .cl{
		margin-top: 10px;
	}
	.group-project-con label{
		vertical-align: middle;
	}
</style>

</head>

<body>
	<div class="page-container">
		<button class="btn btn-primary radius" id="createGroupBtn">
			<i class="Hui-iconfont"></i> 创建分组
		</button>
		<div class="group-box mt-20">
			<ul class="group-left" id="groupList">
				@foreach($group as $group)
					<li data-year="{{$group->year}}" data-id="{{$group->id}}" class="groupId" value="{{$group->id}}"><span title="{{$group->group_name}}">{{$group->group_name}}</span><i title="删除分组" class="Hui-iconfont js-group-delete">&#xe6a6</i></li>
				@endforeach
			</ul>
			<div class="group-right" id="groupShow">
				<div class="group-cons">
					<div class="group-con" >
						{{--项目列表--}}
						<div class="group-conbox ti">
							<button data-id="1" data-name="子项目1" data-money="100" class="js-project btn btn-primary-outline radius" type="button">子项目1 <i class="Hui-iconfont js-project-delete">&#xe6a6</i></button>
						</div>
						<button class="btn btn-primary radius js-add-project">
							<i class="Hui-iconfont"></i> 添加项目
						</button>
					</div>
					<div class="group-footer text-r">
						分组年份：<span class="mr-10 year">{{$data['groupYear']}}</span> 计项目数量：<span class="mr-10 js-count num">{{$data['count']}}</span> 合计金额：<span class="js-money money">{{$data['money']}}</span>（万元）
					</div>
				</div>
				<!-- <div class="group-cons">
					<div class="group-con">
						<div class="group-conbox"></div>
						<button class="btn btn-primary radius js-add-project">
							<i class="Hui-iconfont"></i> 添加项目
						</button>
					</div>
					<div class="group-footer text-r">
						分组年份：<span class="mr-10">2019</span> 计项目数量：<span class="mr-10 js-count">0</span> 合计金额：<span class="js-money">0</span>（万元）
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<!-- 创建分组 -->
	<div class="modal fade" id="groupModal">
		<div class="modal-dialog">
			<div class="modal-content radius">
				<div class="modal-header">
					<h3 class="modal-title">创建分组</h3>
					<a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
				</div>
				<div class="modal-body">
					<form class="form">
						<div class="row cl">
							<label class="form-label col-xs-4 text-r"><span class="c-red">*</span>分组名称：</label>
							<div class="formControls col-xs-6">
								<input id="groupName" type="text" class="input-text" name="name">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-4 text-r"><span class="c-red">*</span>分组年份：</label>
							<div class="formControls col-xs-6">
								<input id="groupYear" type="text" class="input-text" name="year">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" id="groupConfirm">确定</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
				</div>
			</div>
		</div>
	</div>
	<!-- 添加项目 -->
	<div class="modal fade" id="projectModal">
		<div class="modal-dialog">
			<div class="modal-content radius">
				<div class="modal-header">
					<h3 class="modal-title">添加项目</h3>
					<a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
				</div>
				<div class="modal-body">
					<div class="row cl text-c">
						<input id="projectInput" type="text" class="input-text group-project-text" name="name">
						<button id="projectSearch" class="btn btn-primary" type="button">
							<i class="Hui-iconfont"></i> 搜项目
						</button>
					</div>
					<div class="group-project-con" id="projectCheck"></div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" id="projectConfirm">确定</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
				</div>
			</div>
		</div>
	</div>
	

	<input type="hidden" id="token" value="{{csrf_token()}}">


	<!--_footer 作为公共模版分离出去-->
	<script type="text/javascript" src="http://www.sycalc.com.cn:8082/lib/jquery/1.9.1/jquery.min.js"></script> 
	<script type="text/javascript" src="http://www.sycalc.com.cn:8082/lib/layer/2.4/layer.js"></script>
	<script type="text/javascript" src="http://www.sycalc.com.cn:8082/static/h-ui/js/H-ui.min.js"></script> 
	<script type="text/javascript" src="http://www.sycalc.com.cn:8082/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->
	
	<!-- 创建分组右侧模板 -->
	<script type="text/html" id="groupTpl">
		<div class="group-cons">
			<div class="group-con">
				<div class="group-conbox"></div>
				<button class="btn btn-primary radius js-add-project">
					<i class="Hui-iconfont"></i> 添加项目
				</button>
			</div>
			
		</div>
	</script>

	
	
	<script type="text/javascript" src="/lib/template/template.js"></script>
	<script>
		$(function(){
			var token = $("#token").val();
			var groupId;
			//统计当前分组的项目数量与金额
			function getCountMoney(){
				var box = $('.group-cons:visible'),
					projects = box.find('.js-project'),
					count = projects.length,
					money = 0;
				projects.each(function(){
					money += Number($(this).attr('data-money'));
				});
				
				// box.find('.js-count').text(count);
				// box.find('.js-money').text(money);
			};
			

			//分组切换
			$('#groupList').on('click', 'li', function(){
				var index = $(this).index();
				$(this).addClass('active').siblings().removeClass('active');
				// 页面加载时获取分组id
				groupId = $(this).val();
				huancounts(groupId)
				//  请求接口传递id获取分组对应的项目
				var url = "/projects";
				var data = {'_token':token,'id':groupId};
				$.get(url,data,function(data){
					$('.ti').html(data);
					$(this).addClass('active').siblings().removeClass('active');
					$('.group-cons').eq(index).show().siblings().hide();
					
				})

			});
			//删除分组
			$('#groupList').on('click', '.js-group-delete', function(e){
				e.stopPropagation();
				var _this = $(this);
				parent.layer.confirm('确定要删除该分组吗？', {
		    
				}, function(){
					var groupId = _this.parent().attr('data-id');
					var url = "/";
					var data = {'_token':token,'id':groupId};
					$.get(url,data,function(data){
						layer.msg('删除成功!',{icon:1,time:1000});
						window.location.href= "/projectgroup"
					})
				}, function(){
				    
				});
			});
			// 项目金额、年份统计
			function counts()
			{
				var groupId = $('.groupId').val();
				var url = '/counts';
				var data = {'_token':token,'id':groupId};
				$.get(url,data,function(msg){
					// console.log(msg.year)
					$('.year').text(msg.year);
					$('.num').text(msg.nums);
					$('.money').text(msg.money);
				})
			}
			// 分组切换获取金额、年份
			function huancounts(id)
			{
				var groupId = id;
				// console.log(groupId);
				var url = '/counts';
				var data = {'_token':token,'id':groupId};
				$.get(url,data,function(msg){
					// console.log(msg.year)
					$('.year').text(msg.year);
					$('.num').text(msg.nums);
					$('.money').text(msg.money);
				})
			}

			$('#groupList li:first').trigger('click');

			//创建分组
			$('#createGroupBtn').on('click', function(){
				$('#groupModal').modal();
			});
			//创建分组-确定
			$('#groupConfirm').on('click', function(){
				var groupNameTag = $('#groupName'),
					groupName = $.trim(groupNameTag.val());
				if(groupName == ''){
					groupNameTag.focus();
					layer.tips('请输入分组名称', '#groupConfirm', {
		                tips: [1, '#18a689'],
		                time: 1500
		            });
					return;
				};
				var groupYearTag = $('#groupYear'),
					groupYear = $.trim(groupYearTag.val());
				if(groupYear == ''){
					groupYearTag.focus();
					layer.tips('请输入分组年份', '#groupConfirm', {
		                tips: [1, '#18a689'],
		                time: 1500
		            });
					return;
				};
				var data = {
					"_token": token,
					"group_name": groupName,
					"year": groupYear
				};
				var url = "/addzu";
				$.get(url,data,function(data){
					// console.log(data);return;
					if(data.ok){
						layer.msg('创建成功!',{icon:1,time:1000});
						window.location.href= "/projectgroup"
						// var liHtml = '<li data-year="'+ groupYear +'" data-id="'+ data.id +'">'+ groupName +'</li>';
						// $('#groupList').append(liHtml);
						// var html = template('groupTpl', {
						// 	data: {"groupYear": groupYear}
						// });
						// $('#groupShow').append(html);
						// $('#groupList li:last').trigger('click');
						// $('#groupModal').modal('hide');
					}
				})

			});
			
			var projectArr = [];
			//添加项目
			$('body').on('click', '.js-add-project', function(){
				$('#projectModal').modal();
				$('#projectInput').val('');
				$('#projectCheck').html('');
				projectArr = [];
				$(this).prev().find('.js-project').each(function(){
					var id = $(this).attr('data-id');
					projectArr.push(id);
				});
			});
			//删除子项目
			$('body').on('click', '.js-project-delete', function(){
				var _this = $(this).parent();
				parent.layer.confirm('确定要删除吗？', {
		    
				}, function(){
					var id = _this.attr('data-id'),
					
						data = {
							"id": id,
							"groupid" : groupId,
						};
						// console.log(groupId);return;
					$.ajax({
						
						type: 'get',
						url: '/delgropro',
						data: data,
						success: function(data){
							// console.log(data);return;
							if(data.ok){
								_this.remove();
								layer.msg('删除成功!',{icon:1,time:1000});
							}else{
								layer.msg('删除失败!',{icon:1,time:1000});
							}
						}
					});
				}, function(){
				    
				});
			});
			//搜索项目
			$('#projectSearch').on('click', function(){
				var value = $.trim($('#projectInput').val());
				var url ="/group";
				var data = {'_token':token,'year':value};
				$.get(url,data,function(msg){

					$('#projectCheck').html(msg);
				})

			});
			//项目输入框
			$('#projectInput').on('keyup', function(e){
				if(e.which == 13){
					$('#projectSearch').trigger('click');
				};
			});
			//项目确定
			$('#projectConfirm').on('click', function(){
				var check = $('#projectCheck input:checked');
				if(check.length == 0){
					layer.tips('请选择项目', '#projectConfirm', {
		                tips: [1, '#18a689'],
		                time: 1500
		            });
					return;
				};
				// 获取选中的项目id
				var array = new Array();
				$('input[name="project_ids"]:checked').each(function () {
					array.push($(this).val());//向数组中添加元素
				});
				var ids = array.join(',');//将数组元素连接起来以构建一个字符串
				// 获取选中的项目分组groupId 为全局变量
				var group_id = groupId;
				var url = '/groupadd';
				var data = {'_token':token,'groupid':groupId,'projectids':ids};
				$.post(url,data,function(data){
					// console.log(msg)
					layer.msg(data,{icon:1,time:1000});
					window.location.href = "/projectgroup"
				})
				
			});

		})
	</script>

</body>
</html>