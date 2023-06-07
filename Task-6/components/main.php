<main class="main">

	<div class="container">

		<p class="list_name-text">CПИСОК ВАШИХ ЗАДАЧ</p>

		<div class="tasklist_add">
			<form action="controllers/add.php" method="POST" class="tasklist_add_block">
				<input type="text" name="add_text" class="add_text" placeholder="Введите задачу" >
				<input type="submit" name="add_sub" value="Добавить" class="add_sub">
			</form>
			<div class="tasklist_add_block">
				<a href="controllers/delete.php?task_all=ALL" class="tasklist_btn">Удалить все</a>
				<a href="controllers/status.php?task_all=ALL" class="tasklist_btn">Выполнить все</a>
				<a href="controllers/exit.php" class="tasklist_btn">Выход</a>
			</div>
		</div>

		<?php
			echo $_SESSION['mess'];
			unset($_SESSION['mess']);
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		?>

		<div class="tasklist">

			<?php
				$user_id = $_SESSION['user']['id'];
				$int_user_id = settype($user_id, 'integer');

				if($int_user_id) {
					$str_out_tasks = "SELECT * FROM `tasks` WHERE user_id = $user_id";
					$run_out_tasks = mysqli_query($connect, $str_out_tasks);
					$num_tasks = mysqli_num_rows($run_out_tasks);
					if ($num_tasks !== 0) {
						while ($out_tasks = mysqli_fetch_array($run_out_tasks)) {

							if ($out_tasks['status'] == 1) {
								$status_img = "<img src='./img/no.png' alt=''>";
								$status_text = "Выполнено";
							} elseif ($out_tasks['status'] == 2) {
								$status_img = "<img src='./img/yes.png' alt=''>";
								$status_text = "Не выполнено";
							}

							echo "
							<div class='tasklist_items'>
								<div class='tasklist_item'> 
										<p class='tasklist_item_text'>$out_tasks[description]</p>
										<div class='tasklist_item_btn'>
											<a href='controllers/status.php?task_id=$out_tasks[id]' class='tasklist_btn'>$status_text</a>
											<a href='controllers/delete.php?task_id=$out_tasks[id]' class='tasklist_btn'>Удалить задачу</a>
										</div>
								</div>
								<div class='tasklist_status_img'>
									$status_img
								</div>
							</div>
							";
						}
					} else {
						echo "<p class='text_center'>НЕТ ЗАДАЧ</p>";
					}
				}
				
			?>

		</div>
	</div>
</main>