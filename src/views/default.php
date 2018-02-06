<!doctype html>
<html>
	<head>
		<?php ob_start(); $solution = new Solution(false); $debug = ob_get_clean(); ?>

		<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" />
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-3">
					<figure class="figure">
						<img src="src/views/img/fig1.jpg" class="figure-img img-fluid rounded" alt="figure 1">
						<figcaption class="figure-caption">Figure 1</figcaption>
					</figure>

					<figure class="figure">
						<img src="src/views/img/fig2.jpg" class="figure-img img-fluid rounded" alt="figure 1">
						<figcaption class="figure-caption">Figure 2</figcaption>
					</figure>
				</div>

				<div class="col">
					<h1 class="display-1">House of Lines</h1>
					<div class="alert alert-info" role="alert">Time Taken: <?php echo floor($solution->timeTaken * 1000000); ?>μs</div>
					<table class="table">
						<thead>
							<tr>
								<th>Solution #</th>
								<th>Path</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($solution->paths as $key => $path): ?>
								<tr>
									<td><?php echo ($key + 1); ?></td>
									<td><?php echo implode('->', $path); ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<pre><?php print_r($debug); ?></pre>
	</body>
</html>
