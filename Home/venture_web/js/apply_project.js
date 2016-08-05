/**
 * 项目申请表单验证
 */
$().ready(function() {
	var	oli = document.querySelector('.user-apply-sidenav').querySelectorAll('li');
	var userBox = document.querySelectorAll('.user-box');
	$('.btn-pre').each(function(index, elem) {
		elem.index = index;
		elem.onclick = function() {
			$('.user-box').each(function(i, e){
				e.style.display = 'none';
				$(oli[i]).removeClass('now');
			})
			$('oli.now').removeClass('now');
			userBox[this.index].style.display = 'block';
			$(oli[this.index]).addClass('now')
		}
	});
	jQuery.extend(jQuery.validator.messages, {
	  required: "必填字段",
	  maxlength: jQuery.validator.format("超出字数")
	});
	$('#step1').validate({
		rules: {
			project_brief: {
				maxlength: 500
			}
		},
		submitHandler:function(form){
           $('.step1').hide();  
           $('.step2').show();
           $(oli[0]).removeClass('now');
           $(oli[1]).addClass('now');
           isMember = true;
       }    
	})
	$('#step2').validate({
		rules: {
			member_work: {
				maxlength : 150
			},
			member_start: {
				maxlength: 150
			}
		},
		submitHandler:function(form) {
			$('.step2').hide();
			$('.step3').show();
			$(oli[1]).removeClass('now');
			$(oli[2]).addClass('now');
		}
	})
	$('#step3').validate();
});


/**
 * 添加成员信息
 */
function addMember() {
	var _index = 1;
	$('#add-member').click(function() {
		console.log(_index);
		var template = Handlebars.compile($('#member-template').html()); //注册模板
		data = [{ index : ++_index }];
		var html = template(data); //封装模板
		$('#member-info').append(html);
	});
}


/**
 * 提交项目申请
 */
function submitForm() {
	var formStr= '';
	$('#step1-btn').click(function() {
		formStr += $('#step1').serialize();
		
	});
	$('#step2-btn').click(function() {
		formStr += '&' + $('#step2').serialize();

	});
	$('#step3-btn').click(function() {
		formStr += '&' + $('#step3').serialize();
		console.log($('#step3').serialize());
		$.ajax({
			url: "../../API/index.php/home/upload/fileUpload.html",
			type: "post",
			data: new FormData($('#step1')[0]),
			processData: false,
			cache: false,
			contentType :false
			}).done(function(result) {
				console.log(result);
			});
		$.ajax({
			url: "../../API/index.php/home/project/apply.html",
			type: "post",
			data: formStr
			}).done(function(result) {
				console.log(result);
			});
	});

}

function init() {
	addMember();
	submitForm();
}

init();