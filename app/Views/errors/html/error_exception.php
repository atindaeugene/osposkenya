<?php
/**
 * @var object $exception
 * @var string $message
 */
?>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>An uncaught Exception was encountered</h4>

<p>Type: <?php echo esc(get_class($exception)) ?></p>
<p>Message: <?php echo esc($message) ?></p>
<p>Filename: <?php echo esc($exception->getFile()) ?></p>
<p>Line Number: <?php echo $exception->getLine() ?></p>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

	<p>Backtrace:</p>
	<?php foreach ($exception->getTrace() as $error): ?>

		<?php if (isset($error['file']) && strpos($error['file'], realpath(ROOTPATH)) !== 0): ?>

			<p style="margin-left:10px">
			File: <?php echo esc($error['file']) ?><br />
			Line: <?php echo $error['line'] ?><br />
			Function: <?php echo esc($error['function']) ?>
			</p>
		<?php endif ?>

	<?php endforeach ?>

<?php endif ?>

</div>