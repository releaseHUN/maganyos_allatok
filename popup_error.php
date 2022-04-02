<?php //makes a popup dialog with the message that the sendError() function sends then unsets the session variables that the error uses
if ($_SESSION["error"] == 1) : ?>
	<dialog class='modal'>
		<ul>
			<li><?php echo("$_SESSION[error_message]") ?></li>
			<li class='center-button'><button class='button modal-button'>Rendben</button></li>
		</ul>
	</dialog>

	<script>
		const modal = document.querySelector(".modal");
		const closeModal = document.querySelector(".modal-button");
		modal.showModal();

		closeModal.addEventListener("click", () => {
			modal.close();
		})
	</script>
<?php endif;
	unset($_SESSION["error"]);
	unset($_SESSION["error_message"]);
?>