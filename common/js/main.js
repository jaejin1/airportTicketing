$(function() {
	var $video = document.getElementById('video'),
		$video02 = document.getElementById('video02'),
		$sky01 = document.getElementById('sky01'),
		$sky02 = document.getElementById('sky02'),
		windSet,
		timeinterval,
		lodinginterval,
		changeRoll,
		changeMo,
		changechiar,
		playTime,
		popupNum = 0,
		call = 1,
		moving = true,
		viseoStep = 0,
		popupNon = true,
		delta = 0,
		mouseInfo = true,
		justOne = true,
		countInfo = 0,
		playCheck = true,
		__startVr = false,
		__startChair = false,
		__movePoint,
		__mousex,
		/* 20170516 �섏젙 �쒖옉 */
		__contx,
		textWrapW = $('.popView .view').width(),
		titleW = $('.popView .view .in_text h3').width()+60,
		textW = (textWrapW - titleW)-32;
		/* 20170516 �섏젙 �� */
	$($video).on({
		play: function() {
			timego();
		},
		playing: function() {

		},
		pause: function() {
			clearInterval(timeinterval);
		},
		canplay: function() {

		},
		ended: function() {
			$video.currentTime = 43;
		},
		error: function() {
		}
	});
	$($video02).on({
		play: function() {
			timego02();
		},
		playing: function() {
		},
		pause: function() {
			$video02.pause();
			playCheck = false;
		},
		canplay: function() {
		},
		ended: function() {
			$video02.pause();
			playCheck = false;
		},
		error: function() {
		}
	});
	$('.infomation a').on('click', function () {
		if ($video.readyState == 4) {
			var thisIndex = $(this).attr('data-index');
			if (!$(this).hasClass('on')) {
				$('.infomation a.on').removeClass('on');
				$(this).addClass('on');
				if ((thisIndex != 1) && (thisIndex != 4)) {
					change(thisIndex, '', 'jump');
				} else {
					videoPlay(thisIndex);
				}
			}
		}
		return false;
	});
	$('.a350_end a.reStart').on('click', function () {
		change(0, '', 'jump');
		return false;
	});
	$('footer nav > ul a').on('click', function () {
		if ($video.readyState == 4) {
			var thisIndex = Math.abs($(this).attr('data-index'));
			if (countInfo != thisIndex) {
				if ((thisIndex != 1) && (thisIndex != 4)) {
					change(thisIndex, '', 'jump');
				} else {
					videoPlay(thisIndex);
				}
			} else if ((countInfo == 0) && (thisIndex == 0)) {
				change(thisIndex, '', 'jump');
			}
		}
		return false;
	});
	/* 20170516 �섏젙 �쒖옉 */
	$('.language li a').on('click', function () {
		var thisIndex = $(this).parent().index();
		var dataLang = $(this).data('lang');
		$('.language').each(function () {
			$(this).find('li').removeClass('curr');
			$(this).children('li').eq(thisIndex).addClass('curr');
		});
		if (thisIndex == 0) {
			$('#wrap').removeClass();
			$('.footer_box .banner_list li.last a').attr('href', './leaflet_a350.pdf');
			$('.air_reserve a').attr('href', 'https://flyasiana.com/I/ko/RevenueInternationalTravelRegist.do');
			$('.a350_end .btnArea a').attr('href', 'https://flyasiana.com/I/ko/RevenueInternationalTravelRegist.do');
			$('.navigation_line .in_title a').attr('href', 'https://flyasiana.com/I/ko/RevenueInternationalTravelRegist.do');
			$('.footer_logo a').attr('href', 'http://flyasiana.com/CW/ko/common/main.do');
			$('.footer_box .sns_list .fb > a').attr('href','https://www.facebook.com/flyasiana');
			$('.navigation_line  > ul > li > div.in_text > a').attr('href', 'https://flyasiana.com/I/ko/DefaultFlightScheduleSearch.do#none');
		} else {
			// engCheck();
			langCheck(dataLang);
		}
		if( $(this).data('lang') == 'zh' && $('.mediaDiv').hasClass('viewDivimg') ) change(0);
		return false;
	});
	/* 20170516 �섏젙 �� */
	$('h1 a').on('click', function () {
		change(0, '', 'jump');




		
		return false;
	});

	$('.infomation ul').hover(function () {
		$(this).addClass('hoveIn');
	}, function () {
		$(this).removeClass('hoveIn');
	});
	$('.a350_list li').hover(function () {
		var thisCount = $(this).index();
		$('.a350_view_list li').eq(thisCount).addClass('curr');
	}, function () {
		$('.a350_view_list li.curr').removeClass('curr');
	});

	$('header ul.btn_list li:last a').on('click', function () {
		$('footer').addClass('view');
		return false;
	});
	/* 20170511 �댄빆�몄꽑 �쒖꽦�� �쒖옉 */
	$('header ul.btn_list li:first a, .nav_head .airline').on('click', function () {
		$('#wrap > .allbg').fadeIn(500);
		$('.navigation_line').addClass('popView');
		$('#wrap').addClass('popUp');
		popresize();
		popupNon = false;
		return false;
	});
	/* 20170511 �댄빆�몄꽑 �쒖꽦�� �� */
	$('.airport_chair a').on('click', function () {
		$('#wrap > .allbg').fadeIn(500);
		$('.airport_popchair').addClass('popView');
		popupNon = false;
		return false;
	});
	$('.airport_popchair .text_box > a').on('click', function () {
		$('.airport_popchair_big').addClass('popView');
		popupNon = false;
		return false;
	});
	$('footer .close_gnb').on('click', function () {
		$('footer').removeClass('view');
		return false;
	});

	$('footer nav ul li').hover(function () {
		$(this).addClass('curr');
		if ($(this).parent().hasClass('sec')) {
			$(this).removeClass('curr').addClass('on');
		}
	}, function () {
		$(this).removeClass('curr');
		if ($(this).parent().hasClass('sec')) {
			$(this).removeClass('on');
		}
	});
	/* 20170516 �섏젙 �쒖옉 */
	$('footer a').on('click', function () {
		$('footer').removeClass('view');
	});
	/* 20170516 �섏젙 �� */

	$('html, body').on('mousewheel DOMMouseScroll', function(e) {
		var E = e.originalEvent;
		if (mouseInfo) {
			if (popupNon) {
				//�곸긽 �ъ깮
				if (E.detail) {
					delta = E.detail * -40;
				} else{
					delta = E.wheelDelta;
				}
				if ((viseoStep == 0)) {
					if ($('.infomation > ul > li:eq(0)').hasClass('curr') && $('.loading_end').hasClass('viewDivimg')) {
						if ((Math.abs(delta) > 100) && viseoStep < 3) {
							if (delta < 0) {
								$('header').addClass('view_logo');
								$('.full_video').removeClass('leftDiv').addClass('viewDiv');
								$('.viewDivimg').addClass('hideimg');
								$('.infomation').removeClass('viewInfo');
								clearTimeout(playTime);
								playTime = setTimeout(function(){
									$('.viewDivimg').removeClass('hideimg viewDivimg');
									$video.play();
									moveText(1);
								}, 1000);
								playCheck = false;
								mouseInfo = false;
							}
						}
					}
				} else {
					if ((!playCheck) && (Math.abs(delta) > 100) && viseoStep < 3) {
						if (delta < 0) {
							clearTimeout(playTime);
							playTime = setTimeout(function(){
								$('.viewDivimg').removeClass('hideimg viewDivimg');
								$video.play();
							}, 1000);
							$('.full_video').removeClass('leftDiv').addClass('viewDiv');
							$('.viewDivimg').addClass('hideimg');
							$('.infomation').removeClass('viewInfo');
							playCheck = true;
							mouseInfo = false;
						}
					} else if ((!playCheck) && (Math.abs(delta) > 100) && viseoStep == 3) {
						if (delta < 0) {
							clearTimeout(playTime);
							playTime = setTimeout(function(){
								$('.viewDivimg').removeClass('hideimg viewDivimg');
								$('.a350').removeClass('videoView');
								$video02.playbackRate = 2.0;
								$video02.play();
							}, 1000);
							$('.full_video02').removeClass('leftDiv').addClass('viewDiv');
							$('.a350').addClass('videoView');
							$('.viewDivimg').addClass('hideimg');
							$('.infomation').removeClass('viewInfo');
							playCheck = true;
							mouseInfo = false;
						}
					}

					if ((!playCheck) && (Math.abs(delta) > 100)) {
					 	if (delta > 0) {
					 		var thisIndex = Math.abs($('.infomation a.on').attr('data-index')) - 1;
							if (!(thisIndex < 0) && (thisIndex != 9)) {
								playCheck = true;
								if ((thisIndex != 1) && (thisIndex != 4)) {
									change(thisIndex, '', 'jump');
								} else {
									videoPlay(thisIndex);
								}
							}
					 	}
					}
				}
			} else {
				if (E.detail) {
					delta = E.detail * -40;
				} else{
					delta = E.wheelDelta;
				}
				if ((Math.abs(delta) > 100)) {
					popupMove('mouse');
				}
			}
		}
	});
	$(window).on('resize', function(e) {
		resizeFun();
	});

	$('.indicator > ul > li > a').on('click', function () {
		var canIndex = $(this).parent().index();
		popupMove('keybord', canIndex);
		return false;
	});
	$('.close_pop, .close').on('click', function () {
		if ($(this).parent().hasClass('airport_popchair_big')) {
			$(this).parent().removeClass('popView');
		} else {
			$('.popView').parents('section').find('.popBg').hide();

			if (!$('.popView').hasClass('navigation_line') && !$('.popView').hasClass('popup_num06')) {
				$('.popView > ul > li.view').removeClass('view');
				$('.popView .pop_info .indicator .curr').removeClass('curr');
			}
			$('.popView').removeClass('popView');
			$('#wrap').removeClass('popUp');
			$('#wrap > .allbg').fadeOut(500);
			popupNon = true;
		}
		return false;
	});
	$('.spot_list > li > a').on('click', function () {
		if ($(this).parents('section').children('div').eq(0).hasClass('viewDivimg')) {
			$('#wrap').addClass('popUp');
			var clickIndex = $(this).parent().index();
			$(this).parents('section').find('.popup_wrap').addClass('popView');
			$(this).parents('section').find('.popBg').show();
			popupNon = false;		
			popresize();
			popupMove('keybord', clickIndex);
		}
		return false;
	});
	$('.pop_info > ul.indicator > li > a').on('click', function () {
			var clickIndex = $(this).parent().index();
			popupNon = false;
			popupMove('keybord', clickIndex);
			poptextsize();//20170427 異붽�
		return false;
	});
	$('.pop_info > ul.btn_list > li > a').on('click', function () {
			var clickIndex = $(this).parent().index();
			popupNon = false;
			popupMove('updown', clickIndex);
			poptextsize();//20170427 異붽�
		return false;
	});
	$('.a350_popup .tabUl li a').on('click', function () {
		if (!$(this).parent().hasClass('curr')) {
			var thisNum = $(this).parent().index();
			$('.a350_popup .curr').removeClass('curr');
			$('.a350_popup .tabUl li').eq(thisNum).addClass('curr');
			$('.a350_popup .imgView li').eq(thisNum).addClass('curr');
		}
		return false;
	});
	$('.a350 .link_btn').on('click', function () {
		if ($(this).parents('section').children('div').eq(0).hasClass('viewDivimg')) {
			var clickIndex = $(this).parent().index() + 1;
			$(this).parents('section').find('.popup_wrap').addClass('popView');
			$(this).parents('section').find('.popBg').show();
			popupNon = false;
			popresize();
		}
		return false;
	});
	$('.vr360 a').on('click', function () {
		if (!$('.vr360box').is(':visible')) {
			$('.vr360box').fadeIn(500);
		}
		return false;
	});
	$('.close_frame').on('click', function () {
		$('.vr360box').fadeOut(500);
		return false;
	});
	$('.popup_num05 .mood_light').hover(function () {
		$('.popup_num05 .mood_light').addClass('over');
	}, function () {
		$('.popup_num05 .over').removeClass('over');
	});
	$('.popup_num05 .mode_select ul li a').on('click', function () {
		var thisIna = $(this).parent().index();
		if (!$(this).parent().hasClass('curr')) {
			$('.popup_num05 .mood_light ul li.curr').removeClass('curr');
			$('.popup_num05 .mode_select ul li.curr').removeClass('curr');
			$('.popup_num05 .mode_select p .on').removeClass('on');
			$('.popup_num05 .mood_light ul li').eq(thisIna).addClass('curr');
			$('.popup_num05 .mode_select ul li').eq(thisIna).addClass('curr');
			$('.popup_num05 .mode_select p span').eq(thisIna).addClass('on');
		}
	});
	$('.snsDiv .sns_div > a').on('click', function () {
		if ($(this).hasClass('prev')) {
			var countThis = $('.snsImg_list > ul.view').index();
			if (0 != countThis) {
				$('.snsImg_list > ul.view').addClass('nextIn');
				$('.snsImg_list > ul').eq(countThis-1).addClass('view');
				setTimeout(function(){
					$('.snsImg_list > ul.nextIn').removeClass('nextIn view');
				}, 1000);
			}
		} else {
			var all = $('.snsImg_list > ul').length - 1;
			var countThis = $('.snsImg_list > ul.view').index();
			if (all != countThis) {
				$('.snsImg_list > ul.view').addClass('prevIn');
				$('.snsImg_list > ul').eq(countThis+1).addClass('view');
				setTimeout(function(){
					$('.snsImg_list > ul.prevIn').removeClass('prevIn view');
				}, 1000);
			}
		}
		return false;
	});
	function popupMove(dom, check) {
		if (moving) {
			var allindx = $('.popView .pop_info > ul.indicator > li').length - 1,
				thisindx = $('.popView .pop_info > ul.indicator > li.curr').index();
			//�щ씪�대뱶 蹂���
			var recount = function () {
				$('.popView .pop_info > ul.indicator > li.curr').removeClass('curr');
				$('.popView .pop_info > ul.indicator > li').eq(thisindx).addClass('curr');
				if ($('.popView .pop_info > ul.indicator > li').eq(thisindx).hasClass('white')) {
					$('.popView .close_pop').addClass('white');
				} else {
					$('.popView .close_pop').removeClass('white');
				}
				if ($('.popView .pop_info > ul.indicator > li').eq(thisindx).hasClass('gray')) {
					$('.popView .pop_info').addClass('gray');
				} else {
					$('.popView .pop_info').removeClass('gray');
				}
				setTimeout(function(){
					$('.popView > ul > .view').removeClass();
					$('.popView > ul > li.next').addClass('view').removeClass('next');
					poptextsize();//20170427 異붽�
					setTimeout(function(){
						moving = true;
						$('.popView > ul').removeClass('up');
					}, 100);
				}, 500);
			}
			var recountUp = function () {
				setTimeout(function(){
					$('.popView > ul > .view').addClass('nextOn');
					$('.popView > ul > li').eq(thisindx).addClass('next');
					recount();
				}, 10);
			}
			var recountDown = function () {
				setTimeout(function(){
					$('.popView > ul > .view').addClass('prev');
					$('.popView > ul > li').eq(thisindx).addClass('next');
					recount();
				}, 10);
			}

			if (dom == 'mouse') {
				if (delta < 0) {
					$('.popView > ul').removeClass('up');
					moving = false;
					if (thisindx < allindx) {
						thisindx++;
						recountDown();
					} else {
						thisindx = 0;
						recountDown();
					}
				} else {
					$('.popView > ul').addClass('up');
					moving = false;
					if (thisindx > 0) {
						thisindx--;
						recountUp();
					} else {
						thisindx = allindx;
						recountUp();
					}
				}
			} else if (dom == 'keybord') {
				if (check != thisindx) {
					if (check > thisindx) {
						$('.popView > ul').removeClass('up');
						thisindx = check;
						recountDown();
					} else {
						$('.popView > ul').addClass('up');
						thisindx = check;
						recountUp();
					}
				}
			} else {
				if (check == 1) {
					$('.popView > ul').removeClass('up');
					moving = false;
					if (thisindx < allindx) {
						thisindx++;
						recountDown();
					} else {
						thisindx = 0;
						recountDown();
					}
				} else {
					$('.popView > ul').addClass('up');
					moving = false;
					if (thisindx > 0) {
						thisindx--;
						recountUp();
					} else {
						thisindx = allindx;
						recountUp();
					}
				}
			}
			if ($('.popView > ul > li').eq(thisindx).children('.pop_img').hasClass('monitor')) {
				var popW = $('.popView').width();
				$('.popup_num01 div.monitor .back02 div .big').css('background-size', popW);
				setTimeout(function(){
					clearTimeout(changeMo);
					$('.popup_num01 div.monitor .back02').removeClass('finish');
					monitorAni();
				}, 500);
			} else {
				clearTimeout(changeMo);
				$('.popup_num01 div.monitor .back02').removeClass('finish');
			}
			if ($('.popView > ul > li').eq(thisindx).children('.pop_img').hasClass('window')) {
				setTimeout(function(){
					if ($('.popView').hasClass('popup_num02')) {
						$sky01.play();
					} else {
						$sky02.play();
					}
				}, 500);

			}
			if ($('.popup_num05.popView > ul > li').eq(thisindx).children('.pop_img').hasClass('enter')) {
				changeRoll = setTimeout(function(){
					$('.popup_num05 .enter .roll_ul').addClass('step02');
					setTimeout(function(){
						$('.popup_num05 .enter .roll_ul').addClass('step03');
					}, 1000);
				}, 1500);
			} else {
				clearTimeout(changeRoll);
				$('.popup_num05 .enter .roll_ul').removeClass('step02 step03');
			}

			if ($('.popup_num01.popView > ul > li').eq(thisindx).children('.pop_img').hasClass('seat')) {
				clearInterval(changechiar);
				var countRe = 160;
				changechiar = setInterval(function(){
					countRe = countRe + 1;
					$('.popup_num01 .seat span.seat_size em').html(countRe + '.5cm');
					if (countRe == 195) {
						clearInterval(changechiar);
					}
				}, 40);
			} else if ($('.popup_num01').hasClass('popView')) {
				clearInterval(changechiar);
			}

			if ($('.popup_num05.popView > ul > li').eq(thisindx).children('.pop_img').hasClass('extra')) {
				clearInterval(changechiar);
				var countRe = 20;
				changechiar = setInterval(function(){
					countRe = countRe + 1;
					$('.popup_num05 .extra .move strong em').html(countRe);
					if (countRe == 45) {
						clearInterval(changechiar);
					}
				}, 80);
			} else if ($('.popup_num05').hasClass('popView')) {
				clearInterval(changechiar);
			}
		}
	}
	function monitorAni () {
		changeMo = setTimeout(function(){
			$('.popup_num01 div.monitor .back02').addClass('finish');
		}, 1500);

	}
	function popresize() {
		var popH = $('.popView').width() * 0.495 + 95;
		$('.popup_wrap.popView').css({'height':popH});
		$('.popup_wrap.popView > ul > li .pop_img').css({'height':popH - 95});
		$('.popup_wrap.popView > ul > li .navigation').css({'height':popH - 88});
		var mapH = $('.popup_wrap.navigation_line .service .map_info').height();
		var mappH = $('.popup_wrap.navigation_line .service .info_air > p').height() + 10;
		$('.popup_wrap.navigation_line .info_air').css('height', popH - mapH);
		$('.popup_wrap.navigation_line .info_air > ul').css('height', popH - mapH - 46 - mappH);
		if ($('.popup_num01').hasClass('popView')) {
			var popW = $('.popView').width();
			$('.popup_num01 div.monitor .back02 div .big').css('background-size', popW);
		}
	}
	/* 20170516 �섏젙 �쒖옉 */
	function poptextsize(){
		textWrapW = $('.popView .view').width();
		titleW = $('.popView .view .in_text h3').width()+60;
		textW = (textWrapW - titleW)-32;
		$('.popView .view .in_text p').css('width', textW);
	}
	function resizeFun() {
		var htmlWidrh = $(window).width();
		var htmlHeight = $(window).height();
		poptextsize();
		var resetCall = function () {
			$('#wrap, .sky img, header').attr('style', '');
		}
		if ((htmlWidrh / htmlHeight) < 1.77) {//媛�濡쒕え�� �쇰븣
			resetCall();
			$('.sky img').css({'height':htmlHeight, 'width':'auto'});
			var imgW = $('.sky img').width();
			var imgH = $('.sky img').height();
			$('#wrap').css({'marginLeft': -((imgW) / 2), 'left':'50%'});
		} else {
			resetCall();
			$('#wrap').css({'width':'100%'});
			$('.sky img').css({'height':'auto', 'width':'100%'});
			var imgH = $('.sky img').height();
			var minusH = (htmlHeight - imgH) / 2;
			$('#wrap').css({'marginTop':minusH});
		}
		$('header').css({'width': htmlWidrh, 'marginLeft':-(htmlWidrh/2), 'top': Math.abs(minusH)});
		infomation(countInfo);
		popresize();
		mediaCheck();
		if (justOne) {
			justOne = false;
			$('.sky, .skybox').addClass('fixed');
			setTimeout(function () {
				loading();
			}, 1000)

		}
	}
	/* 20170516 �섏젙 �� */
	function loading() {
		$('.loading').remove();
		$('.movesky01').addClass('remove');
		$('.movesky02').addClass('move');
		$('.infomation').addClass('viewInfo');
		$('.loading_end').addClass('viewDivimg');
		$('.full_video').addClass('ready leftDiv');
		$('.full_video02').addClass('ready leftDiv');
		windSet = setTimeout(function () {
			$('.wing_load').addClass('viewDivimg');
		}, 1000);

	}
	function timego() {
		playCheck = true;
		$video.playbackRate = 1.0;
		$('.btn_side').addClass('viewDiv');
		$('.btn_side li').eq(0).addClass('view');
		$('header').addClass('view_logo');
		timeinterval = setInterval(function(){
			var videoCurr = Math.round($video.currentTime);
			if ((videoCurr >= 1) && (videoCurr < 2)) {
				// moveText('1');
			} else if ((videoCurr >= 13) && (videoCurr < 14)) {
				clearInterval(timeinterval);
				$video.pause();
				playCheck = false;
				change('2');
			} else if ((videoCurr >= 21) && (videoCurr < 22)) {
				clearInterval(timeinterval);
				$video.pause();
				playCheck = false;
				change('3');
			} else if ((videoCurr >= 24) && (videoCurr < 25)) {
				moveText('4');
			} else if ((videoCurr >= 32) && (videoCurr < 33)) {
				clearInterval(timeinterval);
				$video.pause();
				playCheck = false;
				change('5');
			} else if ((videoCurr >= 41) && (videoCurr < 42)) {
				clearInterval(timeinterval);
				$video.pause();
				playCheck = false;
				change('6');
			} else if ((videoCurr >= 45) && (videoCurr < 56)) {
				clearInterval(timeinterval);
				$video.pause();
				playCheck = false;
				change('7');
			}
		},1000);
	}
	function timego02() {
		playCheck = true;
		$video02.playbackRate = 2.0;
		timeinterval = setInterval(function(){
			var videoCurr = Math.round($video02.currentTime);
			if ((videoCurr >= 18) && (videoCurr < 19)) {
				clearInterval(timeinterval);
				viseoStep = 3;
				$('.a350_end').addClass('viewDivimg');
			}
		},1000);
	}
	function videoPlay (time) {
		$('.full_video').removeClass('leftDiv').addClass('viewDiv');
		$('.viewDivimg').addClass('hideimg');
		$('.infomation').removeClass('viewInfo');
		$('.viewDivimg').removeClass('hideimg viewDivimg');
		$video.play();
		if (time == 1) {
			$video.currentTime = 0;
			moveText(1);
		} else if (time == 4) {
			$video.currentTime = 24;
			moveText(4);
		}
		playCheck = true;
	}
	function moveText(idm) {
			$('.viewDivimg').removeClass('viewDivimg hideimg');
			if (idm == 1) {
				$('.business00').addClass('viewDivimg');
			} else if (idm == 4) {
				$('.economy00').addClass('viewDivimg');
			}
			if ((idm >= 1) && (idm <= 3)) {
				$('.btn_side').addClass('viewDiv');
				$('.btn_side li.view').removeClass('view');
				$('.btn_side li').eq(0).addClass('view');
			} else if ((idm >= 4) && (idm <= 5)) {
				$('.btn_side').addClass('viewDiv');
				$('.btn_side li.view').removeClass('view');
				$('.btn_side li').eq(1).addClass('view');
			} else if ((idm == 6)) {
				$('.btn_side').addClass('viewDiv');
				$('.btn_side li.view').removeClass('view');
				$('.btn_side li').eq(2).addClass('view');
			} else {
				$('.btn_side').removeClass('viewDiv');
				$('.btn_side li.view').removeClass('view');
			}
	}
	function change(idx, word, info) {
		if ($video.readyState == 4) {
			clearTimeout(playTime);
			$('.full_video').removeClass('viewDiv');
			$('.full_video02').removeClass('viewDiv');
			$video02.currentTime = 0;
			$video.pause();
			$video02.pause();
			if (info != 'jump') {
				$('.viewDivimg').removeClass('viewDivimg hideimg');
			} else {
				$('.viewDivimg').removeClass('viewDivimg hideimg').addClass('jumpDiv');
			}
			clearTimeout(windSet);
			if (idx == 0) {
				viseoStep = 0;
				$('.loading_end').addClass('viewDivimg');
				$('.wing_load').addClass('viewDivimg');
				infomation(idx);
			}
			else if (idx == 2) {
				viseoStep = 1;
				$video.currentTime = 13;
				$('.business01').addClass('viewDivimg');
				infomation(idx);
			} else if (idx == 3) {
				viseoStep = 1;
				$video.currentTime = 21.2;
				$('.business02').addClass('viewDivimg');
				infomation(idx);
			}
			else if (idx == 5) {
				viseoStep = 2;
				$video.currentTime = 32;
				$('.economy02').addClass('viewDivimg');
				infomation(idx);
			} else if (idx == 6) {
				viseoStep = 2;
				$video.currentTime = 41;
				$('.economy03').addClass('viewDivimg');
				infomation(idx);
			} else if (idx == 7) {
				viseoStep = 3;
				$('.a350').addClass('viewDivimg');
				infomation(idx);
			} else if (idx == 8) {
				viseoStep = 3;
				$('.a350_end').addClass('viewDivimg');
			} else if (idx == 9) {
				// $video02.currentTime = 0;
				$('.snsDiv').addClass('viewDivimg');
				infomation(9);
			} else if (idx == 10) {
				viseoStep = 4;
				// $video02.currentTime = 0;
				$('.mediaDiv').addClass('viewDivimg');
				infomation(10);
				mediaCheck();
			}
			if ((idx >= 1) && (idx <= 3)) {
				$('.btn_side').addClass('viewDiv');
				$('.btn_side li.view').removeClass('view');
				$('.btn_side li').eq(0).addClass('view');
			} else if ((idx >= 4) && (idx <= 5)) {
				$('.btn_side').addClass('viewDiv');
				$('.btn_side li.view').removeClass('view');
				$('.btn_side li').eq(1).addClass('view');
			} else if ((idx == 6)) {
				$('.btn_side').addClass('viewDiv');
				$('.btn_side li.view').removeClass('view');
				$('.btn_side li').eq(2).addClass('view');
			} else {
				$('.btn_side').removeClass('viewDiv');
				$('.btn_side li.view').removeClass('view');
			}
			if (idx == 0) {
				$('header').removeClass('view_logo');
			} else {
				$('header').addClass('view_logo');
			}
			setTimeout(function(){
				$('.full_video').addClass('leftDiv');
				$('.full_video02').addClass('leftDiv');
				$('.jumpDiv').removeClass('jumpDiv');
				mouseInfo = true;
				if (info == 'jump') {
					playCheck = false;
				}
				if (idx == 0) {
					$video.currentTime = 0;
				} else if (idx == 7) {
					$video.currentTime = 45;
				}
			}, 1000);
		}
	}
	function infomation (lof) {
		countInfo = lof;
		$('.infomation').addClass('viewInfo');
		$('.infomation a.on').removeClass('on');
		$('.infomation a').each(function () {
			var indA = Math.abs($(this).attr('data-index'));
			if (indA == lof) {
				$(this).addClass('on');
				$('.infomation ul li.curr').removeClass('curr');
				if ($(this).parents('ul').hasClass('sec')) {
					$(this).parents('ul').parent().addClass('curr');
				} else {
					$(this).parent().addClass('curr');
				}
			}
		});

	}
	$('.popup_num01 .dragline > a').bind('mousedown touchstart', function (e) {
		e.preventDefault();
		__contx = $(this).position().left;
		__mousex = e.pageX;
		if (e.type == 'touchstart') {
			__mousex = e.originalEvent.touches[0].pageX;
		}
		$(this).blur();
		__startVr = true;
	});
	$('.popup_num01 .dragline > a').on('click', function (e) {
		return false;
	});
	$('.ie8 .popup_num01 .dragline > a').bind('dragstart mousedown', function () {
		$(this).blur();
		return false;
	});
	$('.airport_popchair .drag a').bind('mousedown touchstart', function (e) {
		e.preventDefault();
		__contx = $(this).position().left;
		__mousex = e.pageX;
		if (e.type == 'touchstart') {
			__mousex = e.originalEvent.touches[0].pageX;
		}
		$(this).blur();
		__startChair = true;
	});
	$('.airport_popchair .drag a').on('click', function (e) {
		return false;
	});
	$('.ie8 .airport_popchair .drag a').bind('dragstart mousedown', function () {
		$(this).blur();
		return false;
	});
	$(document).bind('mousemove touchmove', function (e) {
		var evType = e.pageX;
		if (__startVr) {
			if (e.type == 'touchmove') {
				evType = e.originalEvent.touches[0].pageX;
			}
			__movePoint = evType - __mousex;
			moveVr();
		} else if (__startChair) {
			if (e.type == 'touchmove') {
				evType = e.originalEvent.touches[0].pageX;
			}
			__movePoint = evType - __mousex;
			moveChair();

		}
	});
	$(document).bind('mouseup touchend', function (e) {
		__startVr = false;
		__startChair = false;
	});

	$('.popup_num01 .dragline > a').on('keydown', function (e) {
		__contx = $('.vrimg-dragee > div > a').position().left;
		if (e.keyCode == '37') {
			__movePoint = -20;
			moveVr();
		} else if (e.keyCode == '39') {
			__movePoint = 20;
			moveVr();
		}
	});

	function moveVr() {
		var poinleft = __contx + __movePoint;
		var max = $('.popup_num01 .dragline').width() + 40;
		var aniX = $('.popup_num01 .dragline > a').position().left;
		var zero = 0;
		var $panoramali = $('.popup_num01 .seat .img_box ul > li').length - 1;
		var moveControl = function () {
			var persent = Math.ceil(poinleft / max * 29) ;
			$('.popup_num01 .dragline > a').css('left', poinleft / (max) * 100 + '%');
			$('.popup_num01 .dragline .line').css('width', poinleft / (max) * 100 + '%');
			$('.popup_num01 .seat .img_box ul > li.curr').removeClass('curr');
			$('.popup_num01 .seat .img_box ul > li').eq(persent).addClass('curr');
		}
		if ((poinleft >= (zero)) && (poinleft <= max)) {
			moveControl();
		} else if (poinleft > max) {
			poinleft = max;
			moveControl();
		} else if (poinleft < zero) {
			poinleft = zero;
			moveControl();
		}
	}
	function moveChair() {
		var poinleft = __contx + __movePoint;
		var max = $('.airport_popchair .drag').width() - 24;
		var aniX = $('.airport_popchair .drag > a').position().left;
		var zero = 0;
		var moveControl = function () {
			var persent = poinleft / max;
			var popW = Math.ceil($('.airport_popchair').width());
			var airW = (Math.ceil($('.img_airport .img').width()) - popW + 420 ) * persent;
			if (Math.ceil(persent*100) >= 38 && Math.ceil(persent*100) <= 44) {
				$('.airport_popchair .img_airport .drag a').removeClass().addClass('type02');
				$('.airport_popchair .drag > a .on').removeClass('on');
				$('.airport_popchair .drag > a span').eq(1).addClass('on');
			} else if (Math.ceil(persent*100) >= 45 && Math.ceil(persent*100) <= 100) {
				$('.airport_popchair .img_airport .drag a').removeClass().addClass('type03');
				$('.airport_popchair .drag > a .on').removeClass('on');
				$('.airport_popchair .drag > a span').eq(2).addClass('on');
			} else {
				$('.airport_popchair .img_airport .drag a').removeClass().addClass('type01');
				$('.airport_popchair .drag > a .on').removeClass('on');
				$('.airport_popchair .drag > a span').eq(0).addClass('on');
			}

			$('.airport_popchair .img_airport .img').css('marginLeft', -airW);
			$('.airport_popchair .drag > a').css('left', poinleft);
			$('.airport_popchair .drag > .line').css('width', poinleft);
		}
		if ((poinleft >= (zero)) && (poinleft <= max)) {
			moveControl();
		} else if (poinleft > max) {
			poinleft = max;
			moveControl();
		} else if (poinleft < zero) {
			poinleft = zero;
			moveControl();
		}
	}
	resizeFun();
	var languageCheck;
	if (navigator.language) {
		languageCheck = navigator.language
	} else {
		languageCheck = navigator.userLanguage;
	}
	/* 20170516 �섏젙 �쒖옉 */
	if (languageCheck.slice(0, 2) != 'ko') {
		// engCheck();
		if(languageCheck.slice(0, 2) == 'en' || languageCheck.slice(0, 2) == 'ja' || languageCheck.slice(0, 2) == 'zh'){
			langCheck(languageCheck.slice(0, 2));
		}else{
			langCheck('en');
		}
	}
	/* 20170516 �섏젙 �� */

	$('.mediaDiv .media_scroll ul li > a').on('click', function () {
		var thisNum = $(this).parent().index(); //踰덊샇
		$('.mediaDiv .media_area li.curr').removeClass('curr');
		$('.mediaDiv .media_area li').eq(thisNum).addClass('curr'); //�좏깮�쒓굅�� curr (鍮꾨뵒��)
		$('.mediaDiv .media_scroll ul li.curr').removeClass('curr');
		$(this).parent().addClass('curr'); //�좏깮�쒓굅�� curr (�몃꽕�� 由ъ뒪��)
		$('.mediaDiv .youtube_box iframe').attr('src', '');
		$('.mediaDiv .youtube_box').addClass('left_back');
		$('.mediaDiv .media_list .check_num em').html(thisNum + 1); //�섏씠吏� �섎쾭
		return false;
	});
	/* 20170516 �섏젙 �쒖옉 */
	/*誘몃뵒�닿갇�щ━ �곸긽留곹겕 蹂�寃�*/
	$('.mediaDiv .media_video li button').on('click', function () {
		var thisUrl;
		if($("#wrap").hasClass("engmode") || $("#wrap").hasClass("jpnmode") || $("#wrap").hasClass("chnmode")){
			thisUrl = $(this).parent().attr('data-url-en');
		}else{
			thisUrl = $(this).parent().attr('data-url');
		}
		$('.mediaDiv .youtube_box iframe').attr('src', thisUrl);
		$('.mediaDiv .youtube_box').removeClass('left_back');
	});
	/* 20170516 �섏젙 �� */
	function mediaCheck() {
		var imgH = $('.mediaDiv .media_video li:eq(0) img').height();
		$('.mediaDiv .media_scroll').css('height', imgH - 73);
		$('.mediaDiv .youtube_box iframe').css('height', imgH);
		$('.media_area').css('height', imgH);
	}

	// function engCheck() {
	// 	$('#wrap').addClass('engmode');
	// 	$('.footer_box .banner_list li.last a').attr('href', './leaflet_a350_eng.pdf');
	// 	$('.air_reserve a').attr('href', 'https://us.flyasiana.com/I/en/RevenueInternationalTravelRegist.do');
	// 	$('.a350_end .btnArea a').attr('href', 'https://us.flyasiana.com/I/en/RevenueInternationalTravelRegist.do');
	// 	$('.navigation_line .in_title a').attr('href', 'http://kr.flyasiana.com/C/en/main.do');
	// 	$('.footer_logo a').attr('href', ' http://flyasiana.com/gateway.html');
	// 	$('.navigation_line  > ul > li > div.in_text > a').attr('href', 'https://us.flyasiana.com/I/en/DefaultFlightScheduleSearch.do?menuId=001007001000000&menuType=LINK');
	// 	$('.language .curr').removeClass('curr');
	// 	$('.language li').eq(1).addClass('curr');
	// }

	function langCheck(country){
		var langList = {
			en: {
				langCode : 'en',
				langClass : 'engmode',
				brochureLink : './leaflet_a350_eng.pdf',
				reserveLink : 'https://us.flyasiana.com/I/en/RevenueInternationalTravelRegist.do',
				navTitleLink : 'http://kr.flyasiana.com/C/en/main.do',
				footerLogoLink : 'http://flyasiana.com/gateway.html',
				scheduleLink : 'https://us.flyasiana.com/I/en/DefaultFlightScheduleSearch.do?menuId=001007001000000&menuType=LINK',
				fbLink : 'https://www.facebook.com/flyasiana'
			},
			ja: {
				langCode : 'ja',
				langClass : 'jpnmode',
				brochureLink : './leaflet_a350_jpn.pdf',
				reserveLink : 'https://jp.flyasiana.com/I/ja/RevenueInternationalTravelRegist.do',
				navTitleLink : 'http://kr.flyasiana.com/C/en/main.do',
				footerLogoLink : 'http://jp.flyasiana.com/C/ja/main.do',
				scheduleLink : 'https://jp.flyasiana.com/I/ja/DefaultFlightScheduleSearch.do?menuId=001007001000000&menuType=LINK#none',
				fbLink : 'https://www.facebook.com/asiana.jp/'
			},
			zh: {
				langCode : 'zh',
				langClass : 'chnmode',
				brochureLink : './leaflet_a350_chn.pdf',
				reserveLink : 'https://cn.flyasiana.com/I/ch/RevenueInternationalTravelRegist.do',
				navTitleLink : 'http://kr.flyasiana.com/C/en/main.do',
				footerLogoLink : 'http://cn.flyasiana.com/C/ch/main.do',
				scheduleLink : 'https://cn.flyasiana.com/I/ch/DefaultFlightScheduleSearch.do?menuId=001007001000000&menuType=LINK',
				fbLink : ''
			}
		};
		$('html').attr('lang',langList[country].langCode);
		$('#wrap').removeClass().addClass(langList[country].langClass);
		$('.footer_box .banner_list li.last a').attr('href', langList[country].brochureLink);
		$('.air_reserve a').attr('href', langList[country].reserveLink);
		$('.a350_end .btnArea a').attr('href', langList[country].reserveLink);
		$('.navigation_line .in_title a').attr('href', langList[country].navTitleLink);
		$('.footer_logo a').attr('href', langList[country].footerLogoLink);
		$('.footer_box .sns_list .fb > a').attr('href',langList[country].fbLink);
		$('.navigation_line  > ul > li > div.in_text > a').attr('href', langList[country].scheduleLink);
		$('.language .curr').removeClass('curr');
		$('.language [data-lang ='+langList[country].langCode+']').parent().addClass('curr');
		if(country == 'zh'){
			$('.footer_box .footer_logo img').attr('src','./images/asiana_footer_icon02_chn.gif');
		}else{
			$('.footer_box .footer_logo img').attr('src','./images/asiana_footer_icon02.gif');
		}
		/* 20170516 ��젣 �쒖옉
		$('#wrap').removeClass('event_on');
		$('.event_banner').css('height','0').addClass('up');
		20170516 ��젣 �� */
	}
});