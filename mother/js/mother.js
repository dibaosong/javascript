$(function(){
	var total = 8;
	var option = '';
	for(var i = 1; i <= total; i++){
		option += '<option value="'+ i +'">'+ i +'</option>';
	}
	$('.pageS').html(option);
	var loadText = function(page){
		$('html,body').animate({'scrollTop': 0}, 50);
		$.ajax({
			url: 'data/page'+page+'.json',
			type: 'get',
			success: function(data){
				$('.main h1').html(data.title);
				var tpl = '';
				$.each(data.con, function(i, t){
					tpl += '<p>'+ t +'</p>';
				});
				$('.con').html(tpl);
			}
		});
	};
	var loadPage = 1;
		pageStr = location.href.split('?')[1];
	if(!!pageStr){
		loadPage = pageStr.split('&')[0].split('=')[1];
	};
	$('.pageS option[value="'+ loadPage +'"]').prop('selected', true);
	loadText(loadPage);
	$('.page a').on('click', function(){
		var nowPage = parseInt($('.pageS').val());
		if($(this).hasClass('prev')){
			nowPage--;
		}else{
			nowPage++;
		};
		if(nowPage < 1 || nowPage > total){
			return;
		};
		$('.pageS option[value="'+ nowPage +'"]').prop('selected', true).trigger('change');
	});
	$('.pageS').on('change', function(){
		var page = parseInt($('.pageS').val());
		history.pushState(null, null, "?page="+page);
		loadText(page);
	});
})