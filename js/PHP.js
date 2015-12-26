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
	    alert('已登出');
	    document.location.reload();
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
	      alert('成功登入');
	      document.location.reload();
	    }	
	    else if(response=='3')
	    {
	      alert('請勿用特殊字元');
	    }
	    else
	      {alert('帳號或密碼錯誤');}		   												
	  }				   				   
	});							   
      });
   /* $("#register").ajaxForm({
         data: {
	    id: $("input[name='id']").val(),
	    password: $("input[name='password']").val(),
	    password2: $("input[name='password2']").val(),
	    email: $("input[name='email']").val(),
	    FB: $("input[name='FB']").val()
	  },
	  error: function () {
	    alert('Ajax request 發生錯誤222');
	  },
	  success: function (response) {
	    console.log("LOGIN");
	    if(response=='1')
	    {
	      alert('註冊成功');
	      document.location.reload();
	    }	
	    else if(response=='2')
	      {alert('此帳號已有人申請 請再試一次');}	
	    else
	      {alert('輸入錯誤');}
	  }				   				   
      }); */
      $('#head').change(function () { //以下為檔案預覽
	$('#head').hide();
	var file = this.files[0];
	console.log(this.files.length);
	var filetype = file.type;
	var match = ['image/jpeg', 'image/png', 'image/jpg'];
	if (!((filetype == match[0]) || (filetype == match[1]) || (filetype == match[2]))) {
	  alert('不支援該檔案類型 請轉成jpeg,png,jpg形式');//等等來檢查有無錯誤
	  return false;
	}
	else {
	  var reader = new FileReader();
	  reader.onload = function (data) {
	    console.log("ININ");
	    console.log(file.name);
	    $('#filename').text(file.name);//檔案名稱
	    $('#fileimg').src = data.target.result;//預覽圖還沒完成
	    $('#fileimg').attr('width', '200px');
	    $('#fileimg').attr('height', '200px');//寫大小
	  };
	  reader.readAsDataURL(file);
	}
      });
     /* $('#confirm').click(function () { //檔案傳至Database 
	console.log('upload');
	$.ajax({
	  url: 'upload.php',
	  type: 'POST',
	  data: new FormData(this),
	  error: function (xhr) {
	    alert('Ajax request 發生上傳錯誤');
	  },
	  success: function(response){
	    alert('上傳成功');
	  }

	})
      });*/
      $('#register').click(function(){
	$('.register.page.dimmer')
	.dimmer('show')
	;
      })
      ;
    }
  });
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
