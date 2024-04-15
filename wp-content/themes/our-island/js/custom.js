$ = jQuery;

$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};  

function sendEmail(block_name) {
    var form_data = $('form input, form textarea, form select, form radio, form checkbox').serialize();
    
    $('.pace, .pace-activity').show();

    $.ajax({
        type: 'POST',
        url: ajax_object.ajax_url,
        data: { action : 'send_email', block_name, form_data },
        success: function( response ) {
            alert(response);
        },
        complete: function( response ) {
           $('.pace, .pace-activity').hide();
        }
    });
  }
  

tailwind.config = {
    theme: {
        extend:{
            colors: {
                indigo: ajax_object.definitions,
                },  

        },
        fontFamily: {
            sans: [ajax_object.font, 'sans-serif'],
            serif: [ajax_object.font, 'serif'],
        }
    }
  }

function animateElements(animatable) {
    if (animatable) {
        animatable.each((i,el)=>{
            cont =150;
    
            if ($(el).isInViewport()){
                $(el).delay(cont).animate({'opacity':1})
            }
        })
    }
}


$(document).ready(function($){

    var $animatable = $('header h1, header h2,header h3,header h4,header p,header a[class*=bg], header img, header svg, section h1, section h2,section h3,section h4,section p,section a[class*=bg],section img, section svg,main h1, main h2,main h3,main h4,main p,main a[class*=bg],main img, main svg');
    //$animatable.css('opacity', 0);

    animateElements($animatable);
    
    $(window).on('scroll',()=>{
        animateElements()
            
    })

    alert = function(message) {
        $('header').append(`<div id="review_form">
        <div id="respond" class="comment-respond" style="max-width: 400px;">
          <span class="text-lg leading-6 font-medium text-black" id="reply-title">Info
          </span>
          <div class="text-sm text-gray-500 mt-2">${message}</div>
          <div id="commentform" class="comment-form">
            <p class="form-submit" style="padding-bottom: 40px;">
              <input name="submit" type="submit" id="submit" class="submit" value="Confirm">
            </p>
          </div>
        </div>
      </div>`);    
        
        $(document).on('click', '#review_form input', function() {
            $('#review_form').remove()
        });
    }

    confirm =  async function(message) {
        $('header').append(`<div id="review_form"><div id="respond" class="comment-respond" style="max-width: fit-content;"><span class="text-lg leading-6 font-medium text-black" id="reply-title">Confirmation<small><a rel="nofollow" id="cancel-comment-reply-link" href="/our-island/product/natural-aluminum-free-deodorant-grapefruit-geranium-best-deodorant-women-men-kids-deodorant-cream-for-underarm-private-parts/#respond" style="display:none;">Cancel reply</a></small></span><div class="text-sm text-gray-500 mt-2">${message}</div><div id="commentform" class="comment-form"><p class="form-submit" style="padding-bottom: 40px;"><a href="#" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4">Cancel</a><input name="submit" type="submit" id="submit" class="submit" value="Confirm"> </p></div></div></div>`)    
        $(document).on('click', '#review_form input', function() {
            window.confirmation === true;
            $('#review_form').addClass('true');
            $('#review_form').removeClass('false');
        });
    
        $(document).on('click', '#review_form a',function() {
            $('#review_form').addClass('false');
            $('#review_form').removeClass('true');
        });
    
        let observer;
        let config = {
            attributes: true,
            childList: true,
            characterData: true,
            values: true
        };
    
    
        function isItDone() {
            return new Promise(resolve => {
                observer = new MutationObserver(function(mutations) {
                    let result=$('#review_form').hasClass('true');
                    $('#review_form').remove();
                     resolve(result);
                    
                    ;
                });
                
                observer.observe($('#review_form')[0], config);
            });
    
    
        }
    
        let change = await isItDone();
        
        observer.disconnect();
        
        return change;
      }


    $('.single-product select').select2({    
        minimumResultsForSearch: -1
    });
    
    $('.button-variable-item').on('click', function(){
        $('.button-variable-item').removeClass('selected');
        $(this).addClass('selected');
    })
    
    $('.woocommerce-shop [id*="filter-"]').on('click', function(){
        var selected = !!$(this).parent().parent().find(':checked').length;
        var attribute = $(this).attr('data-attribute');
        
        if (selected) {
            $('#filters-'+attribute).toggle();
            
        } else {
            $('#filters-'+attribute).hide();
        }
        
        if (!$('[id*="filters-"]:visible').length==1 && $('.max-w-7xl.mx-auto.py-3.px-4').is(':visible')) {
            $('.max-w-7xl.mx-auto.py-3.px-4').hide();
        } else {
            $('.max-w-7xl.mx-auto.py-3.px-4').css('display', 'flex');

        }
        
    });
    
    $('.woocommerce-shop .flow-root button').on('click', function(event){
        event.stopPropagation()

       // var selected = !!$(this).parent().parent().find(':checked').length;
        $(this).parent().parent().find('.origin-top-right').hide();
        $(this).next().toggle();
        
    });
    
    $('.origin-top-right.absolute.right-0.mt-2.bg-white.rounded-md.shadow-2xl.p-4.ring-1.ring-black').on('click', function(event){
        event.stopPropagation();
    });
    
    $(document).on('click', function(){

       if ($('.origin-top-right.absolute.right-0.mt-2.bg-white.rounded-md.shadow-2xl.p-4.ring-1.ring-black').is(':visible')) {
        $('.origin-top-right.absolute.right-0.mt-2.bg-white.rounded-md.shadow-2xl.p-4.ring-1.ring-black').hide();
       }
        
    });
    
    $('[id*="filters-"] button').on('click', function(){

        
        var filter = $(this).parent().attr('data-filter');
        $('[data-attribute="'+filter+'"]').prop('checked', false).trigger('change');
        $(this).parent().hide();
        
        if (!$('[id*="filters-"]').is(':visible')) {
            
            $('.max-w-7xl.mx-auto.py-3.px-4').hide();
        }
        
    });
    
    $('[id*="filter-"]').on('click', function(){
        var total = 0;
        
        $(this).parent().parent().find('input:checked').each(function(i, el) {
          total += Number($(el).attr('data-count'))    ;
        });
        
        $(this).parent().parent().parent().prev().find('.tabular-nums').html(total>0?total:null);
        
        
        var arr=$('[id*=filter-]').serializeArray();

        var filters = arr.reduce(function (r, a) {
                a.name = a.name.toLowerCase().substring(a.name.length-2,0);
                r[a.name] = r[a.name] || [];
                r[a.name].push(a.value);
                return r;
            }, Object.create(null));

        $('.pace, .pace-activity').show();
        
        $.ajax({
             type: 'POST',
             url: ajax_object.ajax_url,
             dataType: "html",
             data: { action : 'load_posts', filters },
             success: function( response ) {
                 response = response.substring(response.length / 2);
                
                 $( 'form.woocommerce-ordering + div' ).html( response );
             },
             complete: function( response ) {
                $('.pace, .pace-activity').hide();
             }
         });
    });
    
    
    $('.woocommerce-shop .sorter').on('click', function(){

        $(this).find('.origin-top-left').toggle();
        
    });

    $('.woocommerce-shop [role="menuitem"]').on('click', function(event){
        event.preventDefault();
        $('.woocommerce-shop [role="menuitem"]').removeClass('text-gray-900 font-medium').addClass('text-gray-500');
        $(this).addClass('text-gray-900 font-medium');
        var sorting = $(this).attr('data-value');
        var attribute = '';
        var order = 'DESC';
        
        switch (sorting) {
            case 'popularity':
                attribute = 'data-units_sold';
                order = 'DESC';
                break;
            case 'rating':
                attribute = 'data-rate';
                order = 'DESC';
                break;                
            case 'date':
                attribute = 'data-date';
                order = 'DESC';
                break;                
            case 'price':
                order = 'ASC';
                attribute = 'data-price';
                break;                
        }

        var $wrapper = $('.loop-container');

        $wrapper.html($wrapper.find('.group').sort(function(a, b) {
            if (order === 'ASC') {
                return Number($(a).attr(attribute)) - Number($(b).attr(attribute));
            }

            return Number($(b).attr(attribute)) - Number($(a).attr(attribute));
        }))
    });
    
    $('.gallery-thumbnail').on('click',function () {
        $('#tabs-2-panel-1').attr('src', $(this).find('img').attr('src'));
    })
    
    $(document).on('click','.cart-icon a', function (event) {
        event.preventDefault();
        event.stopPropagation();
        
        if ($('[data-cart]').attr('data-cart') !== '0' ) {
            $('.mini-cart').toggleClass('hidden');
        }
    });
    
    $('.mini-cart').on('click',function (event) {
        event.stopPropagation();
    });
    
    $(document).on('click',function (event) {
        $('.mini-cart').addClass('hidden');
    });  

    var ajax = true;

    $('[id*=filter-]').on('change',function(){
        var arr = $('[id*=filter-]').serializeArray();

        if ($('body').hasClass('woocommerce-shop') && ajax && arr.length > 0) {
            ajax = false;

            var filters = arr.reduce(function (r, a) {
                    a.name = a.name.toLowerCase().substring(a.name.length-2,0);
                    r[a.name] = r[a.name] || [];
                    r[a.name].push(a.value);
                    return r;
                }, Object.create(null));
            
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                dataType: 'html',
                data: { 
                    action : 'load_products', 
                    filters, 
                    // sorting: $('.woocommerce-shop [role="menuitem"]').attr('data-value')
                },
                success: function( response ) {
                    $('.ajax-shortcode-wrapper').html(response);
                    $('.ajax-shortcode-wrapper').addClass('loop-container loop-container mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 pb-20');
                },
                complete: function( response ) {
                    ajax = true;
                }
            });
        }
    });


    $('.form-submit a').on('click', function(event){
        event.stopPropagation(); 
        event.preventDefault(); 
        $('#review_form_wrapper').hide();
    });
    

    if (!$('.woocommerce-store-notice').is(':visible')) {
        $('body').removeClass('woocommerce-demo-store');
    }

    $('a.woocommerce-store-notice__dismiss-link').on('click', function(){
        $('body').removeClass('woocommerce-demo-store');
     });

     $('#mobile-menu-toggle').on('click',function(){
        $('.mobile-menu').removeClass('hidden');
        $('.mobile-menu__overlay').toggleClass('bg-opacity-25');
        $('.mobile-menu__container').animate({left: 0});
     });

     $('#hide-mobile-menu').on('click',function(){
        $('.mobile-menu__overlay').toggleClass('bg-opacity-25');
        $('.mobile-menu__container').animate({left: -100+'%'})

        setTimeout(function() {
            $('.mobile-menu').addClass('hidden');
        },400);
     });

     $('#search-toggle').on('click',function(){
        $('#search-wrapper').animate({width: 'toggle',opacity:'toggle'})
     });

    $('.write-review-button').on('click', function(event){
        event.preventDefault();

        $('#review_form_wrapper').fadeIn();
    });


    $('#search').on('keydown', function() {
        var input = $('#search');

        $('.pace, .pace-activity').show();
    
        $.ajax({
             type: 'POST',
             url: ajax_object.ajax_url,
             dataType: "html",
             data: { action : 'search_products', s: input.val() },
             success: function( response ) {
                 response = response.substring(response.length / 2);
                
                 $( '.search-overlay' ).html( response );
             },
             complete: function( response ) {
                $('.pace, .pace-activity').hide();
             }
         });

        $( '.variations_form' ).each( function() {
    
            $(this).on( 'found_variation', function( event, variation ) {
                let price = variation.display_price;
                const currency = Array.from($('.custom-price-heading').text())[0];
                $('.custom-price-heading').text(`${currency}${price}`);
            });
        });
       });
       
        $('input[name]').each(function() {
           if ($(this).attr('name').toLowerCase().indexOf('color[]') > -1) {
            let color = $(this).attr('value');

            $(this).next().css('background-color', color);
           }
           
        });


        $('[role="menuitem"]').on('click', function() {
            var text = $(this).text();
            $('#menu-button').html(`${text}<svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="opacity: 1;"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>`);
        });

        if ( $('#step-0').hasClass('active') ) {
            $('#action-next').attr('value', 'Checkout as a guest')
        } else {
            $('#action-next').attr('value', 'Next')
        }

        $('#action-next, [data-step="0"]').on('click', function() {
            if ( $('#step-0').hasClass('active') ) {
                $('#action-next').attr('value', 'Skip')
            } else {
                $('#action-next').attr('value', 'Next')
            }
        });

        $(document).on('mouseover', '.product-item-custom, .add-to-cart-custom', function() {
            $(this).next().find('.add-to-cart-custom').css('opacity', 1);
         });

         $(document).on('mouseleave', '.custom-product-item-wrapper', function() {
            console.log('left');
            $(this).find('.add-to-cart-custom').css('opacity', 0);
            console.log($(this).find('.add-to-cart-custom'));
         });

         $('#tabs-2-panel-1').on('mousemove',function(e) {
            var x = (e.offsetX != null) ? e.offsetX : e.originalEvent.layerX;
            var y = (e.offsetY != null) ? e.offsetY : e.originalEvent.layerY;
            $('#tabs-2-panel-1').css('transform-origin', x + 'px ' + y + 'px');
        });

        $( '.variations_form' ).each( function() {
    
            $(this).on( 'found_variation', function( event, variation ) {
                let price = variation.display_price;
                const currency = Array.from($('.custom-price-heading').text())[0];
                $('.custom-price-heading').text(`${currency}${price}`);
            });
       });

       $('.woocommerce-edit-address .form-row label').each(function(e) {
            var tag = $(this).text();

            $(this).parent().find('input').wrap('<fieldset></fieldset>');
            $(this).parent().find('input').attr('placeholder', '');
            $(this).parent().find('fieldset').append('<label>' + tag + '</label>');
            $(this).remove();
        });


       $('body:not(.woocommerce-edit-address)').find('input[type="text"], input[type="password"], input[type="email"], input[type="tel"]').each(function(e) {
            $(this).wrap('<fieldset></fieldset>');
            var tag = $(this).attr("placeholder");
            $(this).attr('placeholder', '');
            $(this).after('<label for="name">' + tag + '</label>');
      });
      
      $('body:not(.woocommerce-edit-address)').find('input[type="text"], input[type="password"], input[type="email"], input[type="tel"]').on('blur', function() {
        if (!$(this).val() == '') {
          $(this).next().addClass('stay');
        } else {
          $(this).next().removeClass('stay');
        }
      });

      $( document.body ).on( 'added_to_cart', function(){
        $('.mini-cart').toggleClass('hidden');
      });

    $('.wishlist-items-wrapper td').on('mouseover', function() {
        $(this).parent().find('td').last().find('a').css('opacity', 1);
        $(this).parent().find('td').first().find('div').css('opacity', 1)
    });

    $('.wishlist-items-wrapper td').on('mouseleave', function() {
        $(this).parent().find('td').last().find('a').css('opacity', 0);
        $(this).parent().find('td').first().find('div').css('opacity', 0);
    });

    $(document).on('click', 'table.shop_table.woocommerce-checkout-review-order-table thead tr', function() {
        $('body').toggleClass('summary-visible');
     });

     
     function RemoveLastDirectoryPartOf(the_url) {
        var the_arr = the_url.split('/');
        the_arr.pop();

        return( the_arr.join('/') );
    }

     $(document).on('click', 'table.shop_table.woocommerce-checkout-review-order-table thead', function() {
        window.location = RemoveLastDirectoryPartOf(RemoveLastDirectoryPartOf(location.href)) + '/' + 'cart';
     });

     $('[for="billing_address_2"] + span fieldset').on('click', function() {
        $(this).find('label').hide();
        $(this).addClass('focus');
        $('#billing_address_2').css('visibility', 'visible');
        $('#billing_address_2').trigger('focus');
    });

    $('[for="shipping_address_2"] + span fieldset').on('click', function() {
        $(this).find('label').hide();
        $(this).addClass('focus');
        $('#shipping_address_2').css('visibility', 'visible');
        $('#shipping_address_2').trigger('focus');
    });

    $(document).on('click', '.pac-container', function() { 
        setTimeout(function() {
            $('[data-step="1"].active #billing_address_2').trigger('focus');
            $('[data-step="2"].active #shipping_address_2').trigger('focus');
        }, 400)
    });

    $('#billing_address_2').on('focus', function() { 
        $('#billing_address_2').attr('data-placeholder', '');
        $('#billing_address_2').attr('placeholder', '');
    });

    $('#shipping_address_2').on('focus', function() { 
        $('#shipping_address_2').attr('data-placeholder', '');
        $('#shipping_address_2').attr('placeholder', '');
    });

    $('#billing_address_2:not(:placeholder-shown), #shipping_address_2:not(:placeholder-shown)').parent().addClass('has');
    
});


