var info
(function(){
	$.ajax({
                    url: "lib/mainpage.php",
                    dataType: 'json',
                    type: 'GET',
		success:function(data){
				var flag=0,colr;
				info=data["info"];				
				console.log(info[0].length);
				for(i=0;i< data["info"][0].length;i++){
				console.log(info[0][i] ,info[1][i], info[2][i], info[3][i], info [4][i]);
				var a='<h2><div class="columns medium-4 text-center postTitleImg"><img src="lib/uploads/'+info[0][i]+'" width="300" /></div></h2>';
				var b='<h2><div class="columns medium-4 left postTitle">'+info[2][i]+'</div></h2>';
				var c='<div class="columns medium-4 right postID">'+info[1][i]+'</div>';
				var d='<div class="columns medium-8 left description">'+info[3][i]+'</div>';
				var e='<div class="columns medium-8 post-bottom"><div class="columns medium-4 location">'+info[4][i]+'<div><div class="columns medium-4 sticker"><img src="img/green_marker.png" /></div></div>';
				switch(flag){
					case 0:
						colr="grey";
						break;
					case 1:
						colr="red";
						break;
					case 2:
						colr="yellow";
						break;
					case 3:
						break;
				}
			$("#list").append($('<div>').html(a+b+c+d+e).addClass("columns large-12 text-center post-card").css('border-left-color',colr));
				}
		}
		});
})();
function power(){
	$.ajax({
                    url: "lib/get_house.php?id="+$(".search_id").val(),
				    dataType: 'json',
                    type: 'GET',
		success:function(data){
				$("#list").html(" ");
				console.log(data);
				var a='<h2><div class="columns medium-4 text-center postTitleImg"><img src="lib/uploads/'+data["p1"]+'" width="300" /></div></h2>';
				var b='<h2><div class="columns medium-4 left postTitle">'+data["title"]+'</div></h2>';
				var c='<div class="columns medium-4 right postID">'+data["id"]+'</div>';
				var d='<div class="columns medium-8 left description">'+data["description"]+'</div>';
				var e='<div class="columns medium-8 post-bottom"><div class="columns medium-4 location">'+data["location"]+'<div><div class="columns medium-4 sticker"><img src="img/green_marker.png" /></div></div>';
				switch(1){
					case 0:
						colr="grey";
						break;
					case 1:
						colr="red";
						break;
					case 2:
						colr="yellow";
						break;
					case 3:
						break;
				}
			$("#list").append($('<div>').html(a+b+c+d+e).addClass("columns large-12 text-center post-card").css('border-left-color',colr));
}
});
}


