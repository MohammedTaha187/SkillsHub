@extends('layout')
@section('title')
Contacts
@endsection
@section('main')
		
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{asset('./img/page-background.jpg')}})"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="index.html">Home</a></li>
							<li>Contact</li>
						</ul>
						<h1 class="white-text">Get In Touch</h1>

					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Contact -->
		<div id="contact" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- contact form -->
					<div class="col-md-6">
						<div class="contact-form">
							<h4>Send A Message</h4>
							@include('web.inc.messages-ajax')
							<form id="contact-form">
								@csrf
								<input class="input" type="text" name="name" placeholder="Name">
								<input class="input" type="email" name="email" placeholder="Email">
								<input class="input" type="text" name="subject" placeholder="Subject">
								<textarea class="input" name="body" placeholder="Enter your Message"></textarea>
								<button  id="contact-form-btn" type="submit" class="main-button icon-button pull-right">Send Message</button>
							</form>
						</div>
					</div>
					<!-- /contact form -->

					<!-- contact information -->
					<div class="col-md-5 col-md-offset-1">
						<h4>Contact Information</h4>
						<ul class="contact-details">
							<li><i class="fa fa-envelope"></i>Educate@email.com</li>
							<li><i class="fa fa-phone"></i>122-547-223-45</li>
						</ul>

					</div>
					<!-- contact information -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->
@endsection
@section('script')
<script>
	$('#success-div').hide()
	$('#errors-div').hide()

$('#contact-form-btn').click(function(e){
	$('#success-div').hide()
	$('#errors-div').hide()
	$('#success-div').empty()
	$('#errors-div').empty()
	e.preventDefault()
	let formData = new FormData($('#contact-form')[0]);

	$.ajax({
		type : 'POST',
		url : '{{url('/messages/send')}}',
		data : formData,
		contentType:false,
		processData:false,
		success: function(data)
		{
			$('#success-div').show()
			$('#success-div').text(data.success)
		},
		error:function(xhr , status ,error)
		{
			$('#errors-div').show()
			$.each(xhr.responseJSON.errors , function(key,item)
			{
				$('#errors-div').append("<p>" + item + "</p>")
			});
		}
	})
})
	

</script>

@endsection