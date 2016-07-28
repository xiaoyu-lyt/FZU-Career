<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>管理员-福州大学大学生创业服务网</title>
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/css/admin.css" />
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/css/reset.css" />
</head>
<body>
	<!-- Admin Start -->
	<div class="admin-wrapper">
		<div class="container">
			<div class="user-box-top">
				<img src="/FZU-VentureService/Admin/Public/images/setting.png" alt="">
				<h1>管理中心</h1>
			</div>
			<div class="user-student-sidenav user-sidenav pull-left">
				<ul>
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/notice">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/user">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/field">入驻申请</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/competition">比赛管理</a></li>
				</ul>
			</div>
<!-- 比赛管理 -->
<div class="user-box admin-games-management pull-right">
	<div class="admin-top">
		<a class="admin-publish-game" href="/FZU-VentureService/Admin/index.php/home/competition/publish">发布比赛通知</a>
	</div>

	<div class="admin-new-table admin-info-table admin-table block">
		<table>
			<tr>
				<th class="admin-th-select">
					<input class="admin-news-select-btn" type="checkbox">
				</th>
				<th class="admin-th-article-id admin-th-id"><span>ID</span></th>
				<th class="admin-th-article-title admin-th-title"><span>标题</span></th>
				<th class="admin-th-article-times admin-th-times"><span>届数</span></th>
				<th class="admin-th-article-publishtime admin-th-publishtime"><span>发布时间</span></th>
				<th class="admin-th-article-deadline admin-th-deadline"><span>截止时间</span></th>
				<th class="admin-th-article-operation admin-th-operation"><span>管理操作</span></th>
			</tr>

			<?php if(is_array($competition)): $i = 0; $__LIST__ = $competition;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
					<td class="admin-article-select">
						<input class="admin-policy-select-btn" type="checkbox">
					</td>
					<td class="admin-article-id"><?php echo ($i); ?></td>
					<td class="admin-article-title">
						<a href="article.html"><?php echo ($v["name"]); ?></a>
					</td>
					<td class="admin-article-times"><span><?php echo ($v["times"]); ?></span></td>
					<td class="admin-article-publishtime"><span><?php echo ($v["issue_time"]); ?></span></td>
					<td class="admin-article-deadline"><span><?php echo ($v["deadline"]); ?></span></td>
					<td class="admin-article-operation admin-operation">
						<span class="admin-article-modify"><a href="/FZU-VentureService/Admin/index.php/home/competiton/modify?nid=<?php echo ($v["cid"]); ?>">修改</a></span>
						
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>

		</table>

	</div>

</div>
			<div class="admin-popup">
				<div class="popup-refuse">
					<form action="/FZU-VentureService/Admin/index.php/home/admin/refuse" method="post">
						<p>请填写拒绝理由</p>
						<p class="refuse-hint">拒绝后将通过短信通知</p>
						<input id="module" type="hidden" name="module" value="<?php echo ($MODULE); ?>">
						<input id="receiver" type="hidden" name="receiver" value="">
						<textarea name="message"></textarea>
						<div class="popup-select clearfix">
							<span class="yes pull-left"><input type="submit" name="sub" value="确认"></span>
							<span class="no pull-right">取消</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var refuse = function(e){
			var tel = e.id;
			document.getElementById('receiver').value = tel;
		}
	</script>
	<!-- Admin End -->
	<script src="/FZU-VentureService/Admin/Public/js/tabswift.js"></script>
	<script src="/FZU-VentureService/Admin/Public/js/admin.js"></script>
</body>
</html>