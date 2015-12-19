
$(document).ready(function () {
    $("#load").hide();
    $.ajax({
        url: "php/mem.php",
        type: "POST",

        data: {

        },
        error: function (xhr) {
            alert('Ajax request 發生錯誤1');
        },
        success: function (response) {
            $("#right").html(response);
		},
		complete:function () {
					$("#logout").click(function () {
					$.ajax({
						url: "php/logout.php",
						type: "POST",
						data: {},
						error: function (xhr) {
							alert('Ajax request 發生錯誤');
						},
						success: function () {
						    $("#me").html("<div class='ui success message'>\
                      <i class='close icon'></i>\
                      <div class='header'>\
                        成功登出\
                      </div>\
                    </div>");
						    setTimeout(function () {
						        document.location.reload();
						    }, 2000);
						}
					});
				});
					$("#login").click(function () {
					$.ajax({
						url: "php/login.php",
						type: "POST",
						data: {
							id: $("#id").val(),
							password: $("#password").val()
						},
						error: function (xhr) {
							alert('Ajax request 發生錯誤');
						},
						success: function (response) {
								if(response=='1')
								{
								    $("#me").html("<div class='ui success message'>\
                      <i class='close icon'></i>\
                      <div class='header'>\
                        成功登入\
                      </div>\
                      <p>開始使用服務</p>\
                    </div>");
								    setTimeout(function () {
								        document.location.reload();
								    }, 2000);

								   
								
								}	
								else
								{
								    $("#me").html("<div class='ui negative message'>\
                      <i class='close icon'></i>\
                      <div class='header'>\
                        帳號或密碼錯誤\
                      </div>\
                      <p>請再試一次</p>\
                    </div>");
								    setTimeout(function () {
								        document.location.reload();
								    }, 2000);
								}
						}				   				   
					});							   
				});
				$("#regsubmit").click(function () {
					$.ajax({
						url: "php/registertoSQL.php",
						type: "POST",
						data: {
							id: $("input[name='id']").val(),
							password: $("input[name='password']").val(),
							password2: $("input[name='password2']").val(),
							email: $("input[name='email']").val(),
							FB: $("input[name='FB']").val()
						},
						error: function (xhr) {
							alert('Ajax request 發生錯誤222');
						},
						success: function (response) {
								if(response=='1')
								{
								    $("#reme").html("<div class='ui success message'>\
                      <i class='close icon'></i>\
                      <div class='header'>\
                        註冊成功\
                      </div>\
                      <p>開始使用服務</p>\
                    </div>");
								    setTimeout(function () {
								        document.location.reload();
								    }, 2000);
								}	
								else if(response=='2')
								{
								    $("#reme").html("<div class='ui negative message'>\
                      <i class='close icon'></i>\
                      <div class='header'>\
                        此帳號已有人使用\
                      </div>\
                      <p>請再試一次</p>\
                    </div>");
								}
								else
								{
								    $("#reme").html("<div class='ui negative message'>\
                      <i class='close icon'></i>\
                      <div class='header'>\
                        輸入錯誤\
                      </div>\
                      <p>請再試一次</p>\
                    </div>");
								}
						}				   				   
					});							   
				});
				$('#register').click(function(){
					$('.register.page.dimmer')
					  .dimmer('show')
					  ;
					 })
				  ;
				  	$.ajax({
					url: "php/notice.php",
					error: function(xhr){
					alert('notice error');
					},
					success: function (response){
					$(".message.popup").html(response);
					$(".floating.ui.red.label").text(response[0]);
					},
					complete: function(){
					$('.item.notice')
								  .popup({
									popup : $('.notice.popup'),
									on    : 'click',
									position : 'bottom center'
								  })
								;
					}
					});
			}
    });
	setInterval(function() {
	$.ajax({
		url: "php/notice.php",
		error: function(xhr){
		alert('notice error');
		},
		success: function (response){
		$(".notice.popup").html(response);
		$(".floating.ui.red.label").text(response[0]);
		},
		complete: function(){
		/*$('.item.message')
					  .popup({
						popup : $('.message.popup'),
						on    : 'click',
						position : 'bottom center'
					  })
					;*/
		}
		});
}, 1000);
    /*$("#login").click(function () {

        $("#load").show();
        $("#login").hide();
		$("#register").hide();


        $.ajax({
            url: "php/login.php",
            type: "POST",


            data: {
                id: $("#id").val(),
                password: $("#password").val()
            },
            error: function (xhr) {
                $("#load").hide();
                alert('Ajax request 發生錯誤');
            },
            success: function (response) {
                $("#show").text(response).show();   
                $("#memdata").hide();
                $("#logout").hide();
                $("#logoutdata").hide();
                $("#load").hide();
                setTimeout(function () {
                    history.go(0);
                }, 500);

               
                
                
            }
           
           
        });
        
       
    });*/
    /*$("#logout").click(function () {
        $("#load").show();
        $("#login").hide();
		$("#register").hide();
        $.ajax({
            url: "php/logout.php",
            type: "POST",
            data: {},
            error: function (xhr) {
                $("#load").hide();
                alert('Ajax request 發生錯誤');
            },
            success: function (response) {
                $("#load").hide();           
                $("#show").hide();
                $("#memdata").hide();
                $("#logout").hide();
                $("#logoutdata").text(response).show();
                setTimeout(function () {
                    history.go(0);
                }, 500);
               
            }
        });
    });*/

});