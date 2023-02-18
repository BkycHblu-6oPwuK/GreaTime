//прибавляем и убавляем кол-во товаров для корзины

$(document).off('click','.put_button_minus').on('click','.put_button_minus',function(e){
    console.log(1)
    e.preventDefault();
    let $input = $(this).parent().find('.amount');
    let count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
})
$(document).off('click','.put_button_plus').on('click','.put_button_plus',function(e){
    e.preventDefault();
    let $input = $(this).parent().find('.amount');
    let count = parseInt($input.val()) + 1;
    count = count > parseInt($input.data('max-count')) ? parseInt($input.data('max-count')) : count;
    $input.val(parseInt(count));
})
$(document).off("change keyup input click",'.amount').on("change keyup input click",'.amount',function(){
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
    if (this.value == "") {
        this.value = 1;
    }
    if (this.value > parseInt($(this).data('max-count'))) {
        this.value = parseInt($(this).data('max-count'));
    }   
})
//

//Удаляем GET параметр

const url = new URL(document.location);
const searchParams = url.searchParams;
// searchParams.delete("id_tovar");
// window.history.pushState({}, '', url.toString());
//

// страница профиля

const buttonMyProfile = document.querySelector('.myProfile_button');
const buttonMyOrders = document.querySelector('.myOrders_button');
const buttonUpdProfile = document.querySelector('.profileUpd_button');
const profileUpdNon_button = document.querySelector('.profileUpdNon_button');

const blockMyProfile = document.querySelector('.main_profile > nav');
const blockUpdProfile = document.querySelector('.updProfile_block');


if($('.myprofile').is(':visible')){
    console.log(1)
    buttonUpdProfile.addEventListener('click', function(){
        blockUpdProfile.style.display = "block";
        blockMyProfile.style.display = "none";
    });
    profileUpdNon_button.addEventListener('click', function(){
        window.location.href = 'myProfile.php';
    });
    locationMyProfile();
}

if($('.myorders').is(':visible')){
    locationMyOrders();
}

function locationMyOrders() {
    buttonMyOrders.style.color = "#FFFFFF";
    buttonMyOrders.style.background = '#4174CB';
    buttonMyOrders.style.boxShadow = '2px 0px 0px #FFB745';

    buttonMyProfile.style.color = "#333333";
    buttonMyProfile.style.background = '#ffffff';
    buttonMyProfile.style.boxShadow = 'none';

    buttonMyProfile.addEventListener('click', function(){
        window.location.href = 'myProfile.php';
    });
    buttonMyOrders.addEventListener('click', function(){
        window.location.href = 'myOrders.php';
    });
};
function locationMyProfile(){
    buttonMyProfile.style.color = "#FFFFFF";
    buttonMyProfile.style.background = '#4174CB';
    buttonMyProfile.style.boxShadow = '2px 0px 0px #FFB745';

    buttonMyOrders.style.color = "#333333";
    buttonMyOrders.style.background = '#ffffff';
    buttonMyOrders.style.boxShadow = 'none';

    buttonMyProfile.addEventListener('click', function(){
        window.location.href = 'myProfile.php';
    });
    buttonMyOrders.addEventListener('click', function(){
        window.location.href = 'myOrders.php';
    });
}
//



// Обновление данных в профиле

$('.form_profileUpd').submit(function (reg) {
    reg.preventDefault();
    let th = $(this);
    $.ajax({
        url: 'vendor/action/profile/update.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data) {
            if (data == 'error_email') {
                alert("Такая почта уже существует");
            }
            if (data == 'error_tel') {
                alert("Такой номер телефона уже существует");
            }
            if (data == 'error_emailerror_tel') {
                alert("Такая почта и номер телефона уже существуют");
            }
            if (data == 'success') {
                alert("Успех");
            }
            if (data == 'ssuccess') {
                alert("Успех, авторизуйтесь");
                window.location.href = 'login.php';
            }
            if (data == 'email_suc') {
                alert("Емаил изменен, авторизуйтесь");
                window.location.href = 'login.php';
            }
            if (data == 'tel_suc') {
                alert("Телефон изменен, авторизуйтесь");
                window.location.href = 'login.php';
            }
        },
    })
});
//

// Блок оформления заказа как юр.лица
// const inputLegalEntity = document.querySelectorAll('.block_input_legal_entity > input');
// const blockLegalEnity = document.querySelector('.legal_entity');
// $(function() { 
//     $(".legal_entity_check:checked").each(function() {
//         $(blockLegalEnity).show();
//     });
//     $(".legal_entity_check").click(function(){
//         if($(this).is(":checked")) {
//             $(blockLegalEnity).show();
//             $(inputLegalEntity).attr('required', true);
//             } else {
//             $(blockLegalEnity).hide();
//             $(inputLegalEntity).attr('required', false);
//         }
//     });
// });
//

// Блок с адресом в оформлении заказа
const inputLegalEntity = document.querySelectorAll('.buer_adress input');
const blockLegalEnity = document.querySelector('.buer_adress');
$(function() { 
    $(".inp_delivery:checked").each(function() {
        $(blockLegalEnity).show();
    });
    $(".inp_delivery").click(function(){
        $(blockLegalEnity).show();
        $(inputLegalEntity).attr('required', true);
    });
    $('.inp_sam').click(function(){
        $(blockLegalEnity).hide();
        $(inputLegalEntity).attr('required', false);
    })
});
//

// блок с товарами на странице оформсления заказа

const blockAboutOrderArrow = document.querySelector('.about_order_arrow');
const blockAboutOrderArrowImg = document.querySelector('.about_order_arrow>img');
const blockOrderDetailsProducts = document.querySelector('.order_details_products');
$(blockAboutOrderArrow).click(function(){
    if($(blockOrderDetailsProducts).is(':hidden')){
        $(blockOrderDetailsProducts).css({
            "display": "flex"
        });
        $(blockAboutOrderArrowImg).css({
            "transform": "rotate(180deg)"
        });
    } else {
        $(blockOrderDetailsProducts).hide();
        $(blockAboutOrderArrowImg).css({
            "transform": "rotate(0deg)"
        });
    }
});
//

// подсчет стоимости товаров на странце оформления заказа

function itogPrice(){
    let arrayAmount = $('.details_prod_title > p').toArray().map(item => $(item).html());
    let arrayPrice = $('.details_prod_price > input').toArray().map(item => $(item).val());
    let arraySpan = $('.details_prod_price > span').toArray().map(item => $(item));

    let multiplicationItog = [];
    for (let i = 0; i < arrayAmount.length; i++) {
        multiplicationItog[i] = arrayAmount[i] * arrayPrice[i];
    }

    let itog = "";
    jQuery.each(multiplicationItog, function summ() {
        itog = Number(itog) + Number(this);
    });

    for(i = 0; i < multiplicationItog.length; i++){
        $(arraySpan[i]).html(multiplicationItog[i])
    }
    $(".itog_price_order").html(itog);
    $(".itog_price_order_input").val(itog);
}
itogPrice();
//

//  блок с категориями 
$('.button_catalog_show').click(function(){
    if($('.menu_filter').is(':hidden')){
        $('.menu_filter').css({
            "display": "flex"
        });
    } else {
        $('.menu_filter').hide();
    }
});

$(document).ready(function(){
    $('.menu_item').mouseenter(function(e){
        e.preventDefault();
        let th = $(this).children().attr('href');
        $.ajax({
            url: 'vendor/action/catalog/visible.php',
            type: 'GET',
            dataType: 'html',
            data: "id_category="+th+"",
            success: function (data) {
                $('.menu_fulter_right').html(data);
            },
        });
    });
});
//


// Вывод карточек товара на странице каталог
if($('.filters_brand_form').is(':visible')){
    $(document).ready(function(){
        let th = $('.filters_brand_form');
        $.ajax({
            url: 'vendor/components/catalog_tovars.php',
            type: 'POST',
            data: th.serialize(),
            success: function(data){
                $('.catalog_tovars').html(data);
            }
        },)
        slider();
    });

    $('.filters_brand_form').submit(function(e){
        e.preventDefault();
        $('.page').val(1);
        const url = new URL(window.location);
        url.searchParams.set('page','1');
        history.pushState(null, null, url);
        let th = $(this);
        $.ajax({
            url: 'vendor/components/catalog_tovars.php',
            type: 'POST',
            data: th.serialize(),
            success: function(data){
                $('.catalog_tovars').html(data);
            }
        })
    })

    $(document).off('click', '.pagination > li > a').on('click', '.pagination > li > a', function(e) {
        e.preventDefault();
        let th = $(this).data('pageNumber');
        const url = new URL(window.location);
        url.searchParams.set('page',th);
        history.pushState(null, null, url);
        $.ajax({
            url: 'vendor/components/catalog_tovars.php',
            type: 'POST',
            dataType: 'html',
            data: "page="+th+"",
            success: function(data){
                $('.page').val(th);
                let tg = $('.filters_brand_form');
                $.ajax({
                    url: 'vendor/components/catalog_tovars.php',
                    type: 'POST',
                    data: tg.serialize(),
                    success: function(data){
                        $('.catalog_tovars').html(data);
                    }
                },)
            }
        },)
    });

    $('.sorting_select > select').change(function(e){
        e.preventDefault();
        let sorting = $(this).val();
        $('.sorting_input').val(sorting);
        $('.page').val(1);
        const url = new URL(window.location);
        url.searchParams.set('page','1');
        history.pushState(null, null, url);
        let th = $('.filters_brand_form');
        $.ajax({
            url: 'vendor/components/catalog_tovars.php',
            type: 'POST',
            data: th.serialize(),
            success: function(data){
                $('.catalog_tovars').html(data);
            }
        },)
    })
};
//

// Добавление товара в избранное
$(document).on('click','button[name="heart_tovar"]',function (e) {
    e.preventDefault();
    let th = $(this).closest('form');
    $.ajax({
        url: 'vendor/action/favourites/add.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data) {
            if (data == 'error') {
                alert("Вы уже добавляли этот товар в избранное");
            }
            if (data == 'success') {
                alert("Вы успешно добавили этот товар в избранное");
            }
        },
    })
});
//

// диапазон цен
function slider() {
    $("#slider").slider({
        animate: "slow",
        range: true,
        min: 0,
        max: $('#max-price_hidden').val(),
        values: [ $('#min-price').val(), $('#max-price').val() ],
        slide : function(event, ui) {    
        $('#min-price').val(ui.values[0]);
        $('#max-price').val(ui.values[1]);
        }
    });
}
$('.input_price > input').change(function(){
    slider();
})
//

// if(!!window.performance && window.performance.navigation.type == 2)
// {
//     window.location.reload();
// }

// скрытие фильтров на странице каталог
$('.filters_name').click(function(){
    let parentBlock = $(this).parent();
    let childrenBlocks = parentBlock.children();
    if($(childrenBlocks).hasClass('hide')){
        $(childrenBlocks).removeClass('hide');
        $(childrenBlocks).addClass('active');
        childrenBlocks.not(":first").show();
    } else {
        $(childrenBlocks).removeClass('active');
        $(childrenBlocks).addClass('hide');
        childrenBlocks.not(":first").hide();
    }
})
$(document).ready(function(){
    $('.filters_brand_form').children().children().addClass('active');
})
//

// выбрать все чекбоксы фильтров
$('.select_all_button').click(function(){
    let thisInput = $(this).children('.input_checbox');
    let filtersInput = $(this).parent().children('.filters_input').children().children('input');
    if($(thisInput).is(':checked',true)){
        $(filtersInput).prop('checked', true);
    }else{
        $(filtersInput).prop('checked', false);
    }
})
//

// блок заказа
const showDetailsOrder = (This,e) => {
    let orderBodyClick = $(This).closest('.block_my_order').children('.order_body_click');
    let orderDetails = $(This).closest('.block_my_order').children('.order_details');
    let aboutOrderArr = $(This).closest('.block_my_order').children('.my_order_header').children('.info_my_order').children('.about_order_arr');
    if($(orderBodyClick).is(':hidden')){
        $(orderDetails).hide();
        $(orderBodyClick).css({
            'display': 'flex',
        });
        $(aboutOrderArr).css({
            "transform": "rotate(0deg)"
        })
    } else {
        $(orderBodyClick).hide();
        $(orderDetails).css({
            'display': 'flex',
        });
        $(aboutOrderArr).css({
            "transform": "rotate(180deg)"
        })
    }
}
$(document).on('click','.about_order_arr',function(){
    showDetailsOrder(this);
})
$(document).on('click','.name_my_order',function(){
    showDetailsOrder(this);
})
$(document).on('click','.order_body_click',function(){
    showDetailsOrder(this);
})
// $('.about_order_arr').click(function(){
//     showDetailsOrder(this);
// })
// $('.name_my_order').click(function(){
//     showDetailsOrder(this);
// })
// $('.order_body_click').click(function(){
//     showDetailsOrder(this);
// })
//

// Добавление в корзину
$(document).on('click','button[name="add_basket"]',function(e){
    e.preventDefault();
    let th = $(this).closest('form');
    $.ajax({
        url: 'vendor/action/basket/add.php',
        type: 'POST',
        data: th.serialize(),
        success: function(data){
            if(data == 'upd'){
                alert('Количество товара в корзине увеличено');
            }
            if(data == 'insert'){
                alert('Товар успешно добавлен в корзину');
            }
            if(data == 'error'){
                alert('Такого количества товара нет в наличии');
            }
            if(data == 'auth'){
                alert('Авторизуйтесь для добавления товара в корзину');
            }
        }
    })
})
//

// переключение блоков на странице товара
$('.twoButton > button').click(function(){
    let buttons = $('.twoButton > button');
    $(buttons).removeClass('btn_not_active');
    $(buttons).removeClass('btn_active');
    $(buttons).addClass('btn_not_active');
    $(this).removeClass('btn_not_active');
    $(this).addClass('btn_active');
    $('.page_tovar_har').children().hide();
})
$('.button_visibleDesc').click(function(){
    $('.tovar_description').css({
        "display": "flex"
    });
})
$('.button_visibleHar').click(function(){
    $('.har').css({
        "display": "flex"
    });
})
$('.button_visibleRev').click(function(){
    $('.tovar_rev_block').css({
        "display": "flex"
    });
})
//

// размеры товара
if($('.block_sizes').is(':visible')){
    $('.block_sizes').children('.block_size').first().addClass('block_size_active');
    $('.input_size').val($('.block_size_active').text());
    $('.block_size').click(function(){
        $('.block_sizes').children('.block_size').removeClass('block_size_active');
        $(this).addClass('block_size_active');
        $('.input_size').val($('.block_size_active').text());
    })
}
//

// избранное (LocalStorage)

$(document).off('click','button[name="heart_tov"]').on('click','button[name="heart_tov"]',function (e){
    e.preventDefault();
    //localStorage.clear('idArray')
    let id =  $(this).closest('form').find('input[name="id_prod"]').val()
    console.log(id)
    let oldItems = JSON.parse(localStorage.getItem('idArray')) || [];
    let i = 0;
    let int = 0;
    if(localStorage.getItem('idArray') != null){
        for(i;i < oldItems.length;i++){
            if(oldItems[i]['id'] == id){
                alert('Вы уже добавляли этот товар в избранное')
                int = 1;
            }
        }
    }
    if(int == 0){
        let newItem = {
            'id': id,
        };
        oldItems.push(newItem);
        localStorage.setItem('idArray', JSON.stringify(oldItems));
        alert('Товар успешно добавлен в избранное')
    }
})

if($('.favouritess').is(':visible')){
    $(document).ready(function(e){
        uploadFav()
    })
}

$(document).off('click','button[name="heart_tovar_delete"]').on('click','button[name="heart_tovar_delete"]',function(e){
    e.preventDefault()
    let id =  $(this).closest('form').find('input[name="id_prod"]').val()
    let arr = localStorage.getItem('idArray')
    arr = JSON.parse(arr);
    let i = 0;
    let newArr = []
    for(i;i < arr.length;i++){
        if(arr[i]['id'] != id){
            newArr.push(arr[i])
        }
    }
    arr = JSON.stringify(newArr)
    localStorage.setItem('idArray', arr);
    uploadFav()
})

const uploadFav = () =>{
    let arr = localStorage.getItem('idArray')
    arr = JSON.parse(arr);
    $.ajax({
        url: 'vendor/action/favourites/add_json.php',
        type: 'POST',
        data: {array:arr},
        success: function(data){
            if(data != 'fav_null'){
                $('.basket_top').addClass('catalog_top_h1')
                $('.basket_top h1').html('Избранное')
                $('.catalog_tovars_two').html((data))
            } else {
                $('.basket_top').removeClass('catalog_top_h1')
                $('.basket_top h1').html('В избранном ничего нет')
                $('.catalog_tovars_two').empty(data)
            }
        }
    })
}
console.log(localStorage.getItem('idArray'))
//

// Поиск по товарам
$(document).ready(function() {	
	var $result = $('#search_box-result');
	
	$('#search').on('keyup', function(e){
        searhFunction(this, e)
	});
    $('#search').on('click', function(e){
        searhFunction(this, e)
	});
    const searhFunction = (This, e) => {
        var search = $(This).val();
		if ((search != '') && (search.length > 1)){
			$.ajax({
				type: "POST",
				url: "/tea/vendor/action/search/search.php",
				data: {'search': search},
				success: function(msg){
					$result.html(msg);
					if(msg != ''){	
						$result.fadeIn();
					} else {
						$result.fadeOut(100);
					}
                    $('#search_box-result').removeClass('search_overflow')
                    if($('.search_href_block').is(':visible')){
                        if($('#search_box-result').height() >= 205){
                            $('#search_box-result').addClass('search_overflow')
                        }
                    }
				}
			});
		 } else {
			$result.html('');
			$result.fadeOut(100);
		 }
    }

	$(document).on('click', function(e){
		if (!$(e.target).closest('.search_box').length){
			$result.html('');
			$result.fadeOut(100);
		}
	});
	
	$(document).on('click', '.search_result-name a', function(){
		$('#search').val($(this).text());
		$result.fadeOut(100);
		return false;
	});
	
	$(document).on('click', function(e){
		if (!$(e.target).closest('.search_box').length){
			$result.html('');
			$result.fadeOut(100);
		}
	});

    $('.pole_search').click(function(){
        if($('#search').is(':focus')){
            $('.presearch__overlay').show()
        }
    })

    $(document).on('click', function(e){
        if(!$('#search').is(':focus')){
            $('.presearch__overlay').hide()
        }
    });
});
//

// Применение промокода

$('.form_promo').submit(function(e){
    e.preventDefault();
    let th = $(this);
    $.ajax({
        type: "POST",
        url: "/tea/vendor/action/promokode/add.php",
        data: th.serialize(),
        success: function(data){
            if(data == 'suc'){
                $('#erconts').html('Промокод успешно применен')
                $('.basket_paga').empty()
                $.ajax({
                    url: "/tea/vendor/components/basket.php",
                    success: function(data){
                        $('.basket_paga').html(data);
                        sll();
                    }
                });
            }
            if(data == 'err'){
                $('#erconts').html('Промокода не существует')
            }
            if(data == 'serr'){
                $('#erconts').html('Вы уже применяли данный промокод')
            }
            setTimeout(function(){
                $('#erconts').empty()
            },2000)
        }
    });
})


if($('.basket_all').is(':visible')){
    $.ajax({
        url: "/tea/vendor/components/basket.php",
        success: function(data){
            $('.basket_paga').html(data);
            sll();
        }
    });
}

//подсчет и вывод стоимости товаров
showSumProducts = (This, e = false) => {
    if(e){
        e.preventDefault();
    }
    const summ = $(This).parent().parent().children('.tovar_basket_total').children('.p_t-b-t');
    let th = $(This);
    $.ajax({
        url: 'vendor/action/basket/summ.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data) {
                summ.html(data);
                sll();
        },
    })
}
$(document).on('change',".put_plus_basket",function(e){
    showSumProducts(this, e);
})
$(document).on('click',".put_plus_basket",function(e){
    showSumProducts(this, e);
})

let sum = $('.put_plus_basket');
sum.map(function (){
    showSumProducts(this);
});
//

// подсчет итоговой суммы в корзине:
function sll(){
    let array = $('.p_t-b-t').toArray().map(item => $(item).html());
    let itog = "";
    jQuery.each(array, function summ() {
        itog = Number(itog) + Number(this);
    });
    let nds = itog * 0.2;
    $('.itog_price > span').html(itog);
    $('.bottom_price-bot > span').html(itog);
    $('.summ_nds > span').html(parseInt(nds));
}
function summ_ready_basket(){
    let array = $('.p_t-b-t').toArray().map(item => $(item).html());
    let itog = "";
    jQuery.each(array, function summ() {
        itog = Number(itog) + Number(this);
    });
    let nds = itog * 0.2;
    $('.itog_price > span').html(itog);
    $('.bottom_price-bot > span').html(itog);
    $('.summ_nds > span').html(parseInt(nds));
}
//

// обновление колличества товаров в корзине
updAmountProd = (This, e = false) => {
    if(e){
        e.preventDefault();
    }
    let th = $(This);
    $.ajax({
        url: 'vendor/action/basket/update.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data) {
            if(data){
                alert('Товара нет в наличии');
                $(This).children('.amount').val(data);
                showSumProducts(This, e);
            }
        },
    })
}
$(document).on('change',".put_plus_basket",function(e){
    updAmountProd(this, e);
})
$(document).on('click',".put_plus_basket",function(e){
    updAmountProd(this, e);
})
//

$('.form_email_push').submit(function(e){
    e.preventDefault();
    let th = $(this)
    $.ajax({
        url: 'vendor/action/mailing/add.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data) {
            if(data == 'suc'){
                $('#erconts').html('Ваша почта успешно добавлена в рассылку')
            }
            if(data == 'err'){
                $('#erconts').html('Такая почта уже добавлена')
            }
            if(data == 'err_maiil'){
                $('#erconts').html('Вы ввели не верный email')
            }
            setTimeout(function(){
                $('#erconts').empty()
            },2000)
        },
    })
})

// Подгрузка отзывов
$('.button_visibleRev').click(function(){
    let id = $(this).data('id')
    let page = 1
    $.ajax({
        url: 'vendor/components/review.php',
        type: 'POST',
        data: {
            id:id,
            page:page,
        },
        success: function (data) {
            $('.tovar_rev_block').html(data)
        },
    })
})

if($('.button_visibleRev').is(':visible')){
    $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        let id = $('.button_visibleRev').data('id')
        let page = $(this).data('pageNumber')
        $.ajax({
            url: 'vendor/components/review.php',
            type: 'POST',
            data: {
                id:id,
                page:page,
            },
            success: function (data) {
                $('.tovar_rev_block').html(data)
                $('html, body').animate({scrollTop: 200},6);
                return false;
            },
        })
    })
}
//

// Страница "мои заказы" section 
if($('.my_orders').is(':visible')){
    $(document).ready(function(){
        $.ajax({
            url: 'vendor/components/section_myOrders.php',
            type: 'POST',
            data: {
                page:1,
            },
            success: function (data) {
                    $('.my_orders').html(data);
            },
        })
    })
    $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        let page = $(this).data('pageNumber')
        $.ajax({
            url: 'vendor/components/section_myOrders.php',
            type: 'POST',
            data: {
                page:page,
            },
            success: function (data) {
                $('.my_orders').html(data)
                $('html, body').animate({scrollTop: 200},6);
                return false;
            },
        })
    })
    $(document).on('click','.order_header_del_btn',function(e){
        e.preventDefault();
        let th = $(this);
        let page = $('.page').val();
        $.ajax({
            url: 'vendor/action/orders/del_canc.php',
            type: 'POST',
            data: th.serialize(),
            success: function (data) {
                $.ajax({
                    url: 'vendor/components/section_myOrders.php',
                    type: 'POST',
                    data: {
                        page:page,
                    },
                    success: function (data) {
                        $('.my_orders').html(data);
                    },
                })
            },
        })
    })
}
//
