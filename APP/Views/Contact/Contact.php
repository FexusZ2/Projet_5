<?php
	if (isset($_POST) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject'])  && !empty($_POST['content']))
	{
		$contact = new APP\Contact\Contact($_POST);
		$message = $contact->send();
	}
?>
<style type="text/css">
	.error
	{
		color:red;
	}

	.success
	{
		color:green;
	}
</style>
<div class="container container3">
	<ol class="breadcrumb">
		<li><a href="/home/index/">Home</a></li>
		<li class="active">Contact</li>
	</ol>
	<div class="row">
		<!-- Article main content -->
		<article class="col-sm-12 maincontent">
			<header class="page-header">
				<h1 class="page-title">Contact</h1>
			</header>
			<br>
				<form method="post">
					<div class="row">
						<div class="col-sm-6">
							<input class="form-control" type="text" name="name" placeholder="Nom/Prenom">
							<?php
							if (isset($message['name']) && !empty($message['name']))
							{
								echo $message['name'];
							}
							?>
						</div>
						<div class="col-sm-6">
							<input class="form-control" type="text"  name="email" placeholder="Email">
							<?php
							if (isset($message['email']) && !empty($message['email']))
							{
								echo $message['email'];
							}
							?>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<input class="form-control" type="text"  name="subject" placeholder="Sujet">
							<?php
							if (isset($message['subject']) && !empty($message['subject']))
							{
								echo $message['subject'];
							}
							?>
						</div>
					</div>

					<br>
					<div class="row">
						<div class="col-sm-12">
							<textarea placeholder="Ecrivez votre message ici..." name='content' class="form-control" rows="9"></textarea>
							<?php
							if (isset($message['content']) && !empty($message['content']))
							{
								echo $message['content'];
							}
							?>
						</div>
					</div>
					<br>
					<div class="row">
						<?php
							if (isset($message['success']) && !empty($message['success']))
							{
								echo $message['success'];
							}
							if (isset($message['error']) && !empty($message['error']))
							{
								echo $message['error'];
							}
						?>
						<div class="col-sm-6">
						</div>
						<div class="col-sm-6 text-right">
							<input class="btn btn-action" type="submit" value="Send message">
						</div>
					</div>
				</form>

		</article>
		<!-- /Article -->
	</div>
</div>	<!-- /container -->