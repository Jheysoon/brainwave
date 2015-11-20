//  $("#category").click(function(){
// 	// load about page on click
// 		$("#category").load("index.php?action=category");
// });

 // $("#user").click(function(){
	// // load about page on click
	// 	$("#user").load("index.php?action=view_user");
		// $(function() {
 	// 	$.ajax({
 	// 		url: "index.php?action=view_user"
 	// 	});

 // });



		$(function() {
				$("#submit").click(function() {
					var textcontent = $("#category").val();
					var dataString = 'category='+ textcontent;

								$("#flash").show();
								$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
								$.ajax({
								type: "POST",
								url: ".?action=add_category",
								data: dataString,
								cache: true,
								success: function(html){
								$("#show").after(html);
								document.getElementById('category').value='';
								$("#flash").hide();
								$("#content").focus();
								}
							});
					return false;
				});
		});


		(function() {

				function init() {
					var speed = 300,
						easing = mina.backout;

					[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-hover' )
							};

						el.addEventListener( 'mouseenter', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseleave', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );
					} );
				}

				init();

			})();
