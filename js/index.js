var img="img/1.jpg";
var title="Hello"
var id =0;
desc="asdfasdfasdfsadfasdfasdf";
locateion="Kathmandu Nepal";
sticker="img/green.jpg";
(function(){
	for(i=0;i<3;i++){
		id++;
		var a='<h2><div class="columns medium-4 text-center postTitleImg"><img src="'+img+'" width="300" /></div></h2>';
		var b='<h2><div class="columns medium-4 left postTitle">'+title+'</div></h2>';
		var c='<div class="columns medium-4 right postID">'+id+'</div>';
		var d='<div class="columns medium-8 left description">'+desc+'</div>';
		var e='<div class="columns medium-8 post-bottom"><div class="columns medium-4 location">'+locateion+'<div><div class="columns medium-4 sticker"><img src="'+sticker+'"/></div></div>';
		$("#list").append($('<div>').html(a+b+c+d+e).addClass("columns large-12 text-center post-card"));
	}
})();


