(function ($) {

	$.fn.slider = function (settings) {

		var s = $.extend({
			data:'',			// Data provide from WP_Query
			rlBtns:true,		// Right and Left Buttons
			autoMove:true,		// Auto movement through items
			time:3,
		}, settings);

		var timer;

		return this.each(function(){

			this.appendChild(createSlider(s.data));

			$(document).on('ready',function(){

				autoMove();

				$('.thumb').on('click',function(){
					movement($(this).data('pos'));
					clearInterval(timer);
					autoMove();
				});

				$('.rbtn').on('click',function(){
					movement($(this).attr('data-nextmove'));
					clearInterval(timer);
					autoMove();
				});

				$('.lbtn').on('click',function(){
					movement($(this).attr('data-nextmove'));
					clearInterval(timer);
					autoMove();
				});

			});

		});

		function nextMovement(){

			var nextS = $('div[class="slide current"]');
			var p = parseInt(nextS.data('pos'));

			if (p==s.data.length-1){
				p = 0;
			} else {
				p = p + 1;
			}

			return p;

		}

		function autoMove(){

			if (s.autoMove===true) {
				timer = setInterval(function(){

					p = nextMovement();
					movement(p);

				},s.time*1000);
			}

		}

		function createSlider(d){

			var inner = document.createElement('div');
			inner.className = 'inner';

			var nav = document.createElement('div');
			nav.className = 'nav';

			var rlbtns = document.createElement('div');
			rlbtns.className = 'rlbtns';

			var rbtn = document.createElement('div');
			rbtn.className = 'rbtn';
			rbtn.setAttribute('data-nextmove','1');

			var lbtn = document.createElement('div');
			lbtn.className = 'lbtn';
			lbtn.setAttribute('data-nextmove',d.length-1);


			rlbtns.appendChild(rbtn);
			rlbtns.appendChild(lbtn);

			for (var i = 0; i < d.length; i++) {

				//Creación del SLIDE
				var slide = document.createElement('div');
				slide.id = 'slide-'+i;
				slide.className = (i==0)?'slide current':'slide';
				slide.setAttribute('data-pos',i);

				var info = document.createElement('div');
				info.className = 'info';

				// Creación de la Imagen con Link
				var aimg = document.createElement('a');
				aimg.href = d[i].link;
				aimg.innerHTML = d[i].img;

				// Creación del Título con Link
				var title = document.createElement('h1');
				title.className = 's-title';

				var atitle = document.createElement('a');
				atitle.href = d[i].link;
				atitle.appendChild(document.createTextNode(d[i].title));
				title.appendChild(atitle);

				// Creación del Sumario
				var excerpt = document.createElement('span');
				excerpt.className = 's-excerpt';
				excerpt.appendChild(document.createTextNode(d[i].excerpt));

				// Creación de la Fecha de Publicación
				var time = document.createElement('span');
				time.className = 's-time';
				time.appendChild(document.createTextNode(d[i].time));


				slide.appendChild(aimg);
				info.appendChild(title);
				info.appendChild(time);
				info.appendChild(excerpt);

				slide.appendChild(info);

				inner.appendChild(slide);

				var thumb = document.createElement('div');
				thumb.id = 'thumb-'+i;
				thumb.className = (i==0)?'thumb current':'thumb';
				thumb.setAttribute('data-pos',i);

				//thumb.innerHTML = d[i].thumb;
				thumb.appendChild(document.createTextNode(d[i].title));

				nav.appendChild(thumb);

			};

			inner.appendChild(nav);
			if (s.rlBtns===true) inner.appendChild(rlbtns);

			return inner;

		}

		function movement(p){

			var nextS = $('div[id="slide-'+p+'"]');
			var currentS = $('div[class="slide current"]');
			var nextT = $('div[id="thumb-'+p+'"]');
			var currentT = $('div[class="thumb current"]');

			if (!nextS.hasClass('current')){

				currentS.animate({opacity:0,},150,function() {
					$(this).removeClass('current');
				});

				currentT.animate({opacity:.6,},150,function() {
					$(this).removeClass('current');
				});

				nextS.animate({opacity:1},150,function(){
					$(this).addClass('current');
				});

				nextT.animate({opacity:1},150,function(){
					$(this).addClass('current');
				});

				if (s.rlBtns===true){

					pr = parseInt(p) + 1;
					pl = parseInt(p) - 1;

					if (pr > s.data.length-1) pr = 0;
					if (pl < 0) pl = s.data.length-1;

					$('.rlbtns .rbtn').attr('data-nextmove',pr);
					$('.rlbtns .lbtn').attr('data-nextmove',pl);

				}

			}

		}

	}

}(jQuery));