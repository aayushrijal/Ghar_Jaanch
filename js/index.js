				var info

(function(){
	$.ajax({
                    url: "lib/mainpage.php",
                    dataType: 'json',
                    type: 'GET',
		success:function(data){
				info=data["info"];				
				console.log(info[0].length);
				for(i=0;i< data["info"][0].length;i++){
				console.log(info[0][i] ,info[1][i], info[2][i], info[3][i], info [4][i]);
				var a='<h2><div class="columns medium-4 text-center postTitleImg"><img src="lib/uploads/'+info[0][i]+'" width="300" /></div></h2>';
				var b='<h2><div class="columns medium-4 left postTitle">'+info[2][i]+'</div></h2>';
				var c='<div class="columns medium-4 right postID">'+info[1][i]+'</div>';
				var d='<div class="columns medium-8 left description">'+info[3][i]+'</div>';
				var e='<div class="columns medium-8 post-bottom"><div class="columns medium-4 location">'+info[4][i]+'<div><div class="columns medium-4 sticker"><img src="asd"/></div></div>';
			$("#list").append($('<div>').html(a+b+c+d+e).addClass("columns large-12 text-center post-card"));
				}
		}
		});
	/*for(i=0;i<3;i++){
		id++;
		var a='<h2><div class="columns medium-4 text-center postTitleImg"><img src="'+img+'" width="300" /></div></h2>';
		var b='<h2><div class="columns medium-4 left postTitle">'+title+'</div></h2>';
		var c='<div class="columns medium-4 right postID">'+id+'</div>';
		var d='<div class="columns medium-8 left description">'+desc+'</div>';
		var e='<div class="columns medium-8 post-bottom"><div class="columns medium-4 location">'+locateion+'<div><div class="columns medium-4 sticker"><img src="'+sticker+'"/></div></div>';
		$("#list").append($('<div>').html(a+b+c+d+e).addClass("columns large-12 text-center post-card"));
	}*/
})();



