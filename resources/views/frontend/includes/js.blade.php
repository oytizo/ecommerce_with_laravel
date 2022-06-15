	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="{{ asset('frontend/js/vendor/modernizr-3.6.0.min.js') }}"></script>
	<script src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('frontend/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
	<script src="{{ asset('frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/slick.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/jquery.syotimer.min.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/waypoints.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/wow.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/magnific-popup.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/select2.min.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/counterup.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/images-loaded.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/isotope.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/scrollup.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/jquery.vticker-min.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/jquery.theia.sticky.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins/jquery.elevatezoom.js') }}"></script>
	<!-- Template  JS -->
	<script src="{{ asset('frontend/js/main.js?v=5.2') }}"></script>
	<script src="{{ asset('frontend/js/shop.js?v=5.2') }}"></script>

	<script>
		 
		 Itemshow();
		function Itemshow() {			
			var uid = {{ Auth::user()->id }};
			jQuery('.allitems').html('');
			$.ajax({
				url: 'cart/show/'+uid,
				type: 'get',
				dataType: 'json',		
				success: function(result) {
					var totalprice=0;
					var count=0;
					var count1=0;
					
					if (result.status == "success") {
                             $.each(result.data,function(key,item){
								jQuery('.allitems').append('<li>\
                                                <div class="shopping-cart-img">\
                                                    <a href="shop-product-right.html"><img alt="Nest" src="{{ asset("backend/items") }}/'+item.pic+'"></a>\
                                                </div>\
                                                <div class="shopping-cart-title">\
                                                    <h4><a href="shop-product-right.html">'+item.name+'</a></h4>\
                                                    <h4><span>'+item.qty+' × </span>$'+item.price+'</h4>\
                                                </div>\
                                                <div class="shopping-cart-delete">\
                                                    <button class="itemdel" value="'+item.id+'"><i class="fi-rs-cross-small"></i></button>\
                                                </div>\
                                            </li>');
											totalprice=totalprice+(item.qty+item.price);
											count=count+item.qty;
											count1=count1+1;
							 });
							 jQuery(".totalprice").text(totalprice);
							 jQuery("#count1").text(count1);
                           
					}
				}
			})
		}
jQuery(document).on('click','.itemdel',function(e){
	e.preventDefault();
	var pid=jQuery(this).val();
	$.ajax({
		url:'cart/delete/'+pid,
		dataType:'json',
		type:'get',
		success:function(result){
			if(result.status=="success"){
				Itemshow();
			}
		}
	});

})

		@foreach($items as $items)

		jQuery('.addcart{{ $items->id }}').click(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			var name = jQuery('.name{{ $items->id }}').val();
			var pid = jQuery('.pid{{ $items->id }}').val();
			var price = jQuery('.price{{ $items->id }}').val();
			var disPrice = jQuery('.disPrice{{ $items->id }}').val();
			var qty = jQuery('.qty{{ $items->id }}').val();
			var pic = jQuery('.pic{{ $items->id }}').val();
			var user_id = {{ Auth::user()-> id }};

			$.ajax({

				url: 'cart/add',
				type: 'post',
				dataType: 'JSON',
				data: {
					name: name,
					pid: pid,
					price: price,
					disPrice: disPrice,
					qty: qty,
					user_id: user_id,
					pic: pic
				},
				success: function(result) {
					if (result.status == 'success') {
						alert("added");
						Itemshow();
					}

				}


			});
		});
		@endforeach
	</script>