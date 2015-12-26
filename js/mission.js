$(document).ready(function () {
  /* $.ajax({
    url: "./php/missionmem.php",
    type: "POST",
    data: {
    },
    error: function (xhr) {
    alert('Ajax request 發生錯誤');
    },
    success: function (response) {
    if (response) {
    ("#memid").text(response);
    }
    else {
    document.location.href = "index.html";//注意路徑有無錯誤
    alert("請先登入會員");
    }
    }
    }); */
    $.ajax({
      url: "./php/showM.php",
      type: "POST",
      dataType: "json",
      data: {
	value: "traffic"
      },
      error: function (xhr) {
	alert('Ajax request 發生錯誤');
      },
      success: function (response) {
	$.ajax({
	  url: "./php/showmsg.php",
	  type: "POST",
	  dataType: "json",
	  data: {
	    value:"traffic"
	  },
	  error: function (xhr) {
	    alert('Ajax request 發生錯誤');
	  },
	  success: function (response2) {
	    var misnum = response.length;//該類別任務數量
	    console.log(response.length);
	    var resnum = response2.length;//該類別所有回復
	    for (var i = 0; i < response.length; i++) {

	      var string1 = "<div class='item'> \
		<div class='ui small image'> \
		<img src='./pic/warrior.jpg'> \
		</div> \
		<div id='left-aligned' class='content'> \
		<div class='header'>"+ response[i]["name"] + "</div> \
		<div class='meta'> \
		<span>from "+ response[i]["who"] + "</span> \
		</div> \
		<div class='description'> \
		<div class='ui grid container'> \
		<div id='no-padding' class='sixteen wide column'> \
		<p>where:"+ response[i]["whereis"] + "</p> \
		</div> \
		<div id='no-padding' class='eight wide column'> \
		<p>when:"+ response[i]["whenis"] + "<p> \
		</div> \
		<div id='no-padding' class='four wide column'> \
		<p>pay:"+ response[i]["pay"] + "</p> \
		</div> \
		</div> \
		<p>content:"+ response[i]["what"] + "</p> \
		</div> \
		<div class='extra'> \
		<div class='ui right floated primary button trafficaccept' data-accept='"+ response[i]["type"] +"' data-num='"+ response[i]["num"] +"'>Accept<i class='right chevron icon'></i></div> \
		<div  class='ui grid'> \
		<div id='no-padding' class='sixteen wide column'> \
		<div class='ui styled accordion'> \
		<div class='title'> \
		<i class='dropdown icon'></i> \
		response.. \
		</div> \
		<div id='PaddingBottom' class='content'> \
		<div class='ui divided items'> ";
	      var string2='';
	      for (var k = 0; k < response2.length; k++) {
		if (response2[k]["num"] == response[i]["num"]) {
		  string2 = string2 + " <div class='item'> \
		    <div class='ui mini avatar image'> \
		    <img src='./pic/warrior.jpg'> \
		    </div> \
		    <div id='left-aligned-no-padding' class='content'> \
		    <div id='no-margin' class='description'> \
		    <p>"+ response2[k]["name"] + " : " + response2[k]["content"] + "</p> \
		    </div> \
		    <div class='meta'> \
		    <span>"+ response2[k]["time"] + "</span> \
		    </div> \
		    </div> \
		    </div> ";
		}
		else { }
	      }
	      var string3 = "</div> \
		<div class='ui form'> \
		<div class='field' id='"+response[i]["num"]+"'> \
		<textarea placeholder='response...' class='writecontent'></textarea> \
		</div> \
		<button  class='ui right floated submit button trafficleave' id='traffic'>leave</button> \
		</div> \
		</div> \
		</div> \
		</div> \
		</div> \
		</div> \
		</div> \
		</div>";
	      $('#trafficitem').append(string1 + string2 + string3);
	      string2 = '';
	    }
	    $(".trafficleave").click(function () {
	      $.ajax({
		url: "./php/message.php",
		type: "POST",
		data: {
		  types: $(this).attr("id"),
		  content: $(this).siblings(".field").find(".writecontent").val(),
		  num: $(this).siblings(".field").attr("id")
		},
		error: function (xhr) {
		  alert('Ajax request 發生錯誤');
		},
		success: function (response) {
		  if(response!='1'&&response!='3')
		    {alert("新增成功!");
		      document.location.href = "mission.html";}
		    else if(response==3){
		    alert("哎喲很會");
		    }
		    else
		      alert("請先登入!");
		}
	      });

	    });
	    $('.trafficaccept').click(function (){	
	      $.ajax({
		url: "./php/accept.php",
		type: "POST",
		data: {
		  type:$(this).data('accept'),
		  num:$(this).data('num')
		},
		error: function (xhr) {
		  alert('Ajax request 發生錯誤');
		},
		success: function (response) {
		  if(response=='3')
		    {alert('接到任務');
		      document.location.reload();}
		    else if(response=='0')
		      alert('請先登入');
		    else if(response=='5')
		      alert('以接受過任務');
		    else
		      alert(response);
		}
	      })

	    });

	  },
	  complete: function () {
	    $('.ui.accordion')
	    .accordion()
	    ;
	  }

	});

	//動態新增
      }

    });
    $(".missionclass").click(function () {
      var type = $(this).data("tab");
      console.log(type);
      var once = $('#' + type + 'item').text();
      console.log(once);
      if (once==0) {
	$.ajax({
	  url: "./php/showM.php",
	  type: "POST",
	  dataType: "json",
	  data: {
	    value: $(this).data("tab")
	  },
	  error: function (xhr) {
	    alert('Ajax request 發生錯誤showm');
	  },
	  success: function (response) {
	    console.log(response)
	    $.ajax({
	      url: "./php/showmsg.php",
	      type: "POST",
	      dataType: "json",
	      data: {
		value: type
	      },
	      error: function (xhr) {
		alert('Ajax request 發生錯誤msg');
	      },
	      success: function (response2) {
		var misnum = response.length;//該類別任務數量
		console.log(response.length);
		var resnum = response2.length;//該類別所有回復
		console.log(response2);
		for (var i = 0; i < response.length; i++) {
		  if(type=='accept')
		    {var string4 = "<div  class='ui right floated primary button'  >"+ response[i]["type"] + "</div>";}
		  else if(type=='mymission')
		  {
		    if(response[i]["acceptnum"]==0)
		      var string4 = "<div  class='ui right floated primary button'  >"+ response[i]["type"] + "</div>";
		    else
		      var string4 ="<div class='ui right floated primary button complete' data-complete='"+ response[i]["type"] +"' data-num='"+ response[i]["num"] +"'>complete<i class='right chevron icon'></i></div>";
		    var string5 ="<div class='ui page dimmer complete'> \
		      <div class='content'> \
		      <div class='center'>Give the score for performance: \
		      <div class='ui massive star confirm rating' data-rating='5'></div> \
		      <div  class='confirm ui primary button' data-complete='"+ response[i]["type"] +"' data-num='"+ response[i]["num"] +"'>Confirm!</div> \
		      </div> \
		      </div> \
		      </div>";
		  }
		  else
		    {var string4 ="<div class='ui right floated primary button " + type + "accept' data-accept='"+ response[i]["type"] +"' data-num='"+ response[i]["num"] +"'>Accept<i class='right chevron icon'></i></div>";}
		  var string1 = "<div class='item'> \
		    <div class='ui small image'> \
		    <img src='./pic/warrior.jpg'> \
		    </div> \
		    <div id='left-aligned' class='content'> \
		    <div class='header'>"+ response[i]["name"] + "</div> \
		    <div class='meta'> \
		    <span>from "+ response[i]["who"] + "</span> \
		    </div> \
		    <div class='description'> \
		    <div class='ui grid container'> \
		    <div id='no-padding' class='sixteen wide column'> \
		    <p>where:"+ response[i]["whereis"] + "</p> \
		    <p>content:"+ response[i]["what"] + "</p> \
		    </div> \
		    <div class='extra'> \
		    "+string4+string5+"\
		    <div  class='ui grid'> \
		    <div id='no-padding' class='sixteen wide column'> \
		    <div class='ui styled accordion'> \
		    <div class='title'> \
		    <i class='dropdown icon'></i> \
		    response.. \
		    </div> \
		    <div id='PaddingBottom' class='content'> \
		    <div class='ui divided items missionres'> ";
		  var string2='';
		  for (var k = 0; k < response2.length; k++) {
		    if (response2[k]["num"] == response[i]["num"]&&response2[k]["type"]==response[i]["type"]) {
		      var string2 = string2+" <div class='item'> \
			<div class='ui mini avatar image'> \
			<img src='./pic/warrior.jpg'> \
			</div> \
			<div id='left-aligned-no-padding' > \
			<div id='no-margin' class='description'> \
			<p>"+ response2[k]["name"] + " : " + response2[k]["content"] + "</p> \
			</div> \
			<div class='meta'> \
			<span>"+ response2[k]["time"] + "</span> \
			</div> \
			</div> \
			</div> ";
		    }
		    else { }
		  }
		  var string3 = "</div> \
		    <div class='ui form'> \
		    <div class='field' id='"+response[i]["num"]+"'> \
		    <textarea placeholder='response...' class='writecontent'></textarea> \
		    </div> \
		    <button  class='ui right floated submit button "+ type +"leave' id='"+ response[i]["type"] +"'>leave</button> \
		    </div> \
		    </div> \
		    </div> \
		    </div> \
		    </div> \
		    </div> \
		    </div> \
		    </div>";
		  $('#' + type + 'item').append(string1 + string2 + string3);
		  string2 = '';
		  $('.primary.button.complete').click(function(){//沒寫關閉 
		    $('.dimmer.complete').dimmer('show');});
		}
		$('.rating').rating({
		  initialRating:2,
		  maxRating:5
		});
		$('.'+ type + 'leave').click(function () {
		  console.log($(this).siblings(".field").attr("id"));
		  var num = $(this).siblings(".field").attr("id");
		  $.ajax({
		    url: "./php/message.php",
		    type: "POST",
		    data: {
		      types: $(this).attr("id"),
		      content: $(this).siblings(".field").find(".writecontent").val(),
		      num: num
		    },
		    error: function (xhr) {
		      alert('Ajax request 發生錯誤');
		    },
		    success: function (response) {
		      if(response!='1'&&response!='3')
			{alert("新增成功!");
			  document.location.href = "mission.html";}
			else if(response='3'){
			alert("唉呦很會");
			}
			else
			  alert("請先登入!");
		    }
		  });

		});
		if(type=='mymission'){
		  $('.confirm.button').click(function (){	
		  console.log($(this).siblings('.confirm.rating').rating('get rating'));
		  console.log($(this).parent('.dimmer').siblings('.floated.primary.button').data('num'));
		  console.log($(this).data('complete'));
		    $.ajax({
		      url: "./php/complete.php",
		      type: "POST",
		      data: {
			type:$(this).data('complete'),
			num:$(this).data('num'),
			score:$(this).siblings('.confirm.rating').rating('get rating')
		      },
		      error: function (xhr) {
			alert('Ajax request 發生錯誤');
		      },
		      success: function (response) {					
			alert(response);
			document.location.reload();
		      }
		    })

		  });}

		  $('.'+ type + 'accept').click(function (){	
		    $.ajax({
		      url: "./php/accept.php",
		      type: "POST",
		      data: {
			type:$(this).data('accept'),
			num:$(this).data('num')
		      },
		      error: function (xhr) {
			alert('Ajax request 發生錯誤');
		      },
		      success: function (response) {
			if(response=='3')
			  {alert('接到任務');
			    document.location.reload();}
			  else if(response=='0')
			    alert('請先登入');
			  else if(response=='5')
			    alert('以接受過任務');
			  else
			    alert(response);
		      }
		    })

		  });

	      },
	      complete: function () {
		$('.ui.accordion')
		.accordion()
		;
	      }

	    })
	  }
	});
      }
    });
    $("#create").click(function () {//登入才能按
      $.ajax({
	url: "./php/createM.php",
	type: "POST",
	data: {
	  type: $("#type").val(),
	  name:$("#missionname").val(),
	  what: $("#what").val(),
	  whereis: $("#whereis").val(),
	  whenis: $("#whenis").val(),
	  pay: $("#pay").val()
	},
	error: function (xhr) {
	  alert('Ajax request 發生錯誤');
	},
	success: function (response) {
	  if(response=='0')
	  {
	    alert('請登入');
	  }
	  else if(response=='1')
	  {
	    alert('輸入錯誤');
	  }
	  else if(response=='3')
	  {
	    alert('賣來亂!!!!!');
	  }
	  else{
	    alert('創建成功,請等待跳轉');
	    document.location.href = "mission.html";}
	}
      });

    });   
});
